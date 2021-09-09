<?php
include '../db.php';

if (isset($_GET['col']) && isset($_GET['id'])) {
   $stmt = $conn->prepare("UPDATE tasks SET col=? WHERE id=?");
   $stmt->bind_param('ii', $_GET['col'], $_GET['id']);
   $error = $stmt->execute();
   $stmt->close();
}

?>
