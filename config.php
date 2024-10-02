<?php
// config.php
$host = 'HOST';
$db   = 'DATABSE_NAME';
$user = 'DATABASE_USER';
$pass = 'DATABSE_PASS';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>

