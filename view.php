<?php
include "db.php";

$sql = "SELECT id, first_name, last_name, phone, email FROM users ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IPT SYSTEM - Records</title>
<style>
  body { font-family: Georgia, serif; background:#dfe7ef; padding:40px; }
  table { width:100%; border-collapse: collapse; background:#eef2f6; }
  th, td { border:1px solid #9aa7b5; padding:10px; text-align:left; }
  th { background: #5f7bab; color:#eef2f6; }
  a { display:inline-block; margin-bottom:15px; color:#4c638f; }
</style>
</head>
<body>
<a href="ipt_system.html">&larr; Back to form</a>
<h2>Registered Users</h2>
<table>
  <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th></tr>
  <?php while ($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?= htmlspecialchars($row['id']) ?></td>
    <td><?= htmlspecialchars($row['first_name']) ?></td>
    <td><?= htmlspecialchars($row['last_name']) ?></td>
    <td><?= htmlspecialchars($row['phone']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>
