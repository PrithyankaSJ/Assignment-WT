<?php
// Database credentials
$servername = "localhost";
$username = "root";      // default in XAMPP
$password = "";          // default in XAMPP (empty)
$dbname = "assignment_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server-Side Scripting Demo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #0f1724;
      color: #f0f0f0;
      margin: 0;
      padding: 2rem;
    }
    h1 {
      color: #4a90e2;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }
    th, td {
      border: 1px solid rgba(255,255,255,0.3);
      padding: 0.75rem;
      text-align: left;
    }
    th {
      background: rgba(255,255,255,0.1);
    }
  </style>
</head>
<body>
  <h1>👩‍💻 User List from Database</h1>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row["id"] ?></td>
          <td><?= $row["name"] ?></td>
          <td><?= $row["email"] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>

</body>
</html>
<?php
$conn->close();
?>
