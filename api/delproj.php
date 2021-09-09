<?php

include '../db.php';

if (isset($_GET['proj'])) {
   $stmt = $conn->prepare("DELETE FROM projects WHERE id=?");
   $stmt->bind_param('i', $_GET['proj']);
   $stmt->execute();
   $stmt->close();
}

?>
