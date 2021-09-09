<?php
include 'db.php';
?>

<html>
<head>
   <title>SCRUM</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/table.css">
</head>
<body>
   <script src="js/other.js"></script>
   <script src="js/project.js"></script>

   <h2>Projects</h2>
   <table>
   <thead>
      <th>Name</th>
      <th style="width: 5rem;">Remove</th>
   </thead>
   <tbody>
<?php
$result = $conn->query("SELECT id,name FROM projects");
while ($row = $result->fetch_assoc()) {
   echo '<tr id=' . htmlspecialchars($row['id']) . '>' .
      '<td><a href="/tasks.php?proj=' . htmlspecialchars($row['id']) . '">' .
      htmlspecialchars($row['name']) . '</a></td>' .
      '<td style="width: 5rem; cursor: pointer;" onclick="removeRow(this)">&times;</td>' .
      '</tr>';
}

?>
   </tbody>
   </table>
   
   <form action="api/addproj.php" method="post">
      <button type="button" onclick="inputDropdown('name-input')" class="add-button">&plus;</button>
      <input id="name-input" class="input" name="name" hidden="true">
   </div>

</body>
</html>
