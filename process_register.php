<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit();
}

function redirect_with_error(string $message): void {
    header("Location: register.php?error=" . urlencode($message));
    exit();
}

if (!function_exists('sqlsrv_connect')) {
    redirect_with_error("Driver Error: The PHP 'sqlsrv' extension is not installed or enabled.");
}

$name     = trim((string)($_POST['name'] ?? ''));
$email    = trim((string)($_POST['email'] ?? ''));
$password = (string)($_POST['password'] ?? '');

if ($name === '' || $email === '' || $password === '') {
    redirect_with_error("Please fill in all required fields.");
}

// Connected specifically to your st20299011cardiffmet server
$serverName = "tcp:st20299011cardiffmet.database.windows.net,1433";
$connectionOptions = [
    "Database"               => "myDatabase",
    "Uid"                    => "myadmin",     // Double-check if your admin username is different!
    "PWD"                    => "Abcdefgh0!",  // Double-check if your password is different!
    "Encrypt"                => 1,
    "TrustServerCertificate" => 0,
    "CharacterSet"           => "UTF-8",
    "LoginTimeout"           => 10
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    $errors = sqlsrv_errors();
    $msg = "DB Connection Failed (st20299011cardiffmet): ";
    if ($errors !== null) {
        foreach ($errors as $error) {
            $msg .= "[" . $error['SQLSTATE'] . "] " . $error['message'] . " ";
        }
    }
    redirect_with_error($msg);
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Explicitly targeting dbo.shopusers
$sql = "INSERT INTO dbo.shopusers (name, email, password) VALUES (?, ?, ?)";
$params = [$name, $email, $hashed_password];
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    $errors = sqlsrv_errors();
    $msg = "SQL Insert Failed: ";
    if ($errors !== null) {
        foreach ($errors as $error) {
            $msg .= "[" . $error['SQLSTATE'] . "] " . $error['message'] . " ";
        }
    }
    sqlsrv_close($conn);
    redirect_with_error($msg);
}

// Verify that 1 row was actually written to the table
$rowsAffected = sqlsrv_rows_affected($stmt);
if ($rowsAffected === false || $rowsAffected < 1) {
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
    redirect_with_error("Query ran, but 0 rows were inserted into dbo.shopusers.");
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// Pass a verification flag in the URL so you know the new script ran
header("Location: success.php?verified=1");
exit();
