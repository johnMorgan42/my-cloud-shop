<?php
declare(strict_types=1);

// Start session if you intend to store user data or flash messages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect direct GET access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.html");
    exit();
}

// Helper redirect function
function redirect_with_error(string $message): void {
    header("Location: register.html?error=" . urlencode($message));
    exit();
}

// Sanitize & capture inputs
$name     = trim((string)($_POST['name'] ?? ''));
$email    = trim((string)($_POST['email'] ?? ''));
$password = (string)($_POST['password'] ?? '');

// Validation
if ($name === '' || $email === '' || $password === '') {
    redirect_with_error("Please fill in all required fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_with_error("Please provide a valid email address.");
}

if (strlen($password) < 8) {
    redirect_with_error("Password must be at least 8 characters long.");
}

// Database configuration
// Best practice: Use getenv() or an external config file outside web root
$serverName = getenv('DB_SERVER') ?: "tcp:mycardiffmet.database.windows.net,1433";
$connectionOptions = [
    "Database"               => getenv('DB_NAME') ?: "myDatabase",
    "Uid"                    => getenv('DB_USER') ?: "myadmin",
    "PWD"                    => getenv('DB_PASS') ?: "Abcdefgh0!",
    "Encrypt"                => 1,
    "TrustServerCertificate" => 0,
    "CharacterSet"           => "UTF-8"
];

// Connect to Azure SQL Database
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    // Log the actual system errors securely on the server
    error_log("DB Connection Failure: " . print_r(sqlsrv_errors(), true));
    
    // Return a safe, generic message to the client
    redirect_with_error("Unable to connect to the service. Please try again shortly.");
}

// Check if user already exists
$checkSql = "SELECT id FROM shopusers WHERE email = ?";
$checkParams = [$email];
$checkStmt = sqlsrv_query($conn, $checkSql, $checkParams);

if ($checkStmt && sqlsrv_has_rows($checkStmt)) {
    sqlsrv_free_stmt($checkStmt);
    sqlsrv_close($conn);
    redirect_with_error("An account with that email already exists.");
}

if ($checkStmt) {
    sqlsrv_free_stmt($checkStmt);
}

// Hash password with strong default (bcrypt / argon2 depending on PHP runtime)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Parameterized Insert
$insertSql = "INSERT INTO shopusers (name, email, password) VALUES (?, ?, ?)";
$insertParams = [$name, $email, $hashed_password];
$insertStmt = sqlsrv_query($conn, $insertSql, $insertParams);

if ($insertStmt === false) {
    // Log real SQL errors server-side
    error_log("DB Insert Error: " . print_r(sqlsrv_errors(), true));
    
    sqlsrv_close($conn);
    redirect_with_error("Registration failed due to a server error. Please try again.");
}

// Cleanup resources
sqlsrv_free_stmt($insertStmt);
sqlsrv_close($conn);

// Redirect to success page
header("Location: success.php");
exit();
