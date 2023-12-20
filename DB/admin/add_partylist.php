<?php
require_once '../connect.php';

if (isset($_POST['submit'])) {
    $partyname = $_POST['partyname'];
    $motto = $_POST['motto'];

    // Prepare the SQL statement to insert the partylist into the partylist table
    $query = "INSERT INTO partylist (partyname, motto) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $partyname, $motto);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Partylist added successfully.";
    } else {
        echo "Failed to add partylist.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Partylist</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>

        .btn-custom {
  background-color: olive;
  color: white;
  border-color: olive;
}

.btn-custom:hover {
  background-color: sage;
  border-color: sage;
}
</style>
</head>
<body>
  <div class="container">
    <h1>Add Partylist</h1>
    <form action="add_partylist.php" method="POST">
      <div class="form-group">
        <label for="partyname">Partylist Name:</label>
        <input type="text" id="partyname" name="partyname" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="motto">Motto:</label>
        <input type="text" id="motto" name="motto" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-custom">Add Partylist</button>

    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

