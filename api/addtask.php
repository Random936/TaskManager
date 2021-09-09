<?php
include '../db.php';

if (isset($_POST['proj']) && isset($_POST['name'])) {
   $stmt = $conn->prepare("INSERT INTO tasks (name, project, col) VALUES (?, ?, 1)");
   $stmt->bind_param('si', $_POST['name'], $_POST['proj']);
   $stmt->execute();
   $stmt->close();
}

header("Location: /tasks.php?proj=" . $_POST['proj']);
?>
