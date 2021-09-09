<?php
include '../db.php';

if (isset($_GET['id'])) {
   $stmt = $conn->prepare("DELETE FROM tasks WHERE id=?");
   $stmt->bind_param('i', $_GET['id']);
   $stmt->execute();
   $stmt->close();
}

?>
