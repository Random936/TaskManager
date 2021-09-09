<?php

include '../db.php';

if (isset($_POST['name'])) {
   $stmt = $conn->prepare("INSERT INTO projects (name) VALUES (?)");
   $stmt->bind_param('s', $_POST['name']);
   $stmt->execute();
   $stmt->close();
}

header("Location: /");
?>
