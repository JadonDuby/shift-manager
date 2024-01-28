<?php
include_once "config.php";
include_once "databaseConnection.php";

$db = new DatabaseConnection(HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$passwordHash = password_hash("password", PASSWORD_BCRYPT);
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    hashed_password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'employee') NOT NULL)";
$db->query($sql);
$sql = " CREATE TABLE IF NOT EXISTS shifts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id))";
$db->query($sql);
$sql = "INSERT INTO users (id, username, hashed_password, role) VALUES
    (1, 'admin', ?, 'admin'),
    (2, 'emp1', ?, 'employee'),
    (3, 'emp2', ?, 'employee')";
$db->query($sql, [$passwordHash, $passwordHash, $passwordHash]);
$sql = "INSERT INTO shifts (start_time, end_time, user_id) VALUES
    ('2024-01-01 08:00:00', '2024-01-01 16:00:00', 2),
    ('2024-01-02 12:00:00', '2024-01-02 20:00:00', 3)";
$db->query($sql);
?>

