<?php

include 'db.php';

function printColumn($conn, $col, $proj) {
   $stmt = $conn->prepare("SELECT * FROM tasks WHERE col=? AND project=?");
   $stmt->bind_param('ii', $col, $proj);
   $stmt->execute();
   $tasks = $stmt->get_result();

   while ($row = $tasks->fetch_assoc()) {
      echo '<div id="' .
         $row["id"] .
         '" class="grid-node" draggable="true">' .
         str_replace("\n", '<br>', htmlspecialchars($row["name"])) . '</div>';
   }

   $stmt->close();
}

?>
<html>
<head>
   <title>Task Manager</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/grid.css">
</head>
<body>
   <div class="wrapper">
      <h3 style="grid-column: 1;">Todo</h3>
      <h3 style="grid-column: 2;">In Progress</h3>
      <h3 style="grid-column: 3;">Done</h3>

      <div class="drop-area" style="grid-column: 1;"><?php printColumn($conn, 1, $_GET['proj']); ?></div>
      <div class="drop-area" style="grid-column: 2;"><?php printColumn($conn, 2, $_GET['proj']); ?></div>
      <div class="drop-area" style="grid-column: 3;"><?php printColumn($conn, 3, $_GET['proj']); ?></div>
   </div>

   <div class="wrapper">
      <h3 style="grid-column: 1;">Add task</h3>
      <h3 style="grid-column: 2;">Delete task</h3>

      <div style="grid-column: 1;">
         <form class="grid-form" action="api/addtask.php" method="post">
            <textarea name="name"></textarea>
            <br>
            <input type="hidden" name="proj" value="<?php echo htmlspecialchars($_GET['proj']); ?>">
            <input class="button" type="submit">
         </form>
      </div>

      <div style="grid-column: 2;">
         <form class="grid-form" action="api/deltask.php">
            <div id="garbage" class="drop-area" ondrop="deleteNodes(event)"></div>
            <a class="button" href="/">Home</a>
         </form>
      </div>
   </div>

   <script src="js/other.js"></script>
   <script src="js/tasks.js"></script>
   <script src="js/drag.js"></script>
   <script src="js/key.js"></script>
<body>
</html>
