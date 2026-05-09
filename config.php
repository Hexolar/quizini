<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');           // Laragon default is empty
define('DB_NAME', 'quizini');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Set charset
mysqli_set_charset($conn, "utf8mb4");
?>