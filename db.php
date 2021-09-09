<?php

$server = "172.17.0.2";
$username = "root";
$password = "secret";
$database = "scrum";

$conn = new mysqli($server, $username, $password);
if ($conn->connect_error) {
   die("Database connection failed: " . $conn->connect_error);
}

// If database doesn't exist
$conn->query("CREATE DATABASE IF NOT EXISTS " . $database);
$conn->select_db($database);

// If tasks table doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS tasks (
   id INT AUTO_INCREMENT PRIMARY KEY,
   project INT NOT NULL,
   name VARCHAR(100) NOT NULL,
   col INT NOT NULL
   )");

// If projects table doesn't exist
$conn->query("CREATE TABLE IF NOT EXISTS projects (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL
   )");

?>
