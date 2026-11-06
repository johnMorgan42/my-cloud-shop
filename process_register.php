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

// 1. Check if the Microsoft SQLSRV driver is even installed in this PHP environment
if (!function_exists('sqlsrv_connect')) {
    redirect_with_error("Driver Error: The PHP 'sqlsrv' extension is not installed or enabled.");
}

$name     = trim((string)($_POST['name'] ?? ''));
$email    = trim((string)($_POST['email'] ?? ''));
$password = (string)($_POST['password'] ?? '');

if ($name === '' || $email === '' || $password === '') {
    redirect_with_error("Please fill in all required fields.");
}

// 2. REPLACE THESE WITH YOUR REAL AZURE SQL DETAILS
$serverName = "tcp:st20299011cardiffmet.database.windows.net,1433";
$connectionOptions = [
    "Database"               => "myDatabase",
    "Uid"                    => "myadmin",
    "PWD"                    => "Abcdefgh0!",
    "Encrypt"                => 1,
    "TrustServerCertificate" => 0,
    "CharacterSet"           => "UTF-8",
    "LoginTimeout"           => 10
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    $errors = sqlsrv_errors();
    $msg = "DB Connection Failed: ";
    if ($errors !== null) {
        foreach ($errors as $error) {
            $msg .= "[" . $error['SQLSTATE'] . "] " . $error['message'] . " ";
        }
    }
    redirect_with_error($msg);
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO shopusers (name, email, password) VALUES (?, ?, ?)";
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

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

header("Location: success.php");
exit();
