<?php
session_start();
require_once '../connect.php';
//include '../sidebar.php';

if (isset($_POST['submit'])) {
    $userID = $_POST['userID'];

    // Check if the UserID exists in the users table
    $query = "SELECT * FROM users WHERE UserID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // UserID is verified, grant access to vote
        $_SESSION['userID'] = $userID;
        header("Location: ../voting.php");
        exit();
    } else {
        // Invalid UserID, show an error message
        $error = "Invalid UserID";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Voter Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #EBEBE8;
    }

    .container {
      text-align: center;
      margin-top: 150px;
      color: #31352E;
    }

    h1 {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    input[type="text"] {
      padding: 10px;
      font-size: 16px;
      width: 300px;
      border-radius: 4px;
      border: 1px solid #556B2F;
    }

    .error {
      color: red;
      margin-top: 10px;
    }

    button {
      display: inline-block;
      padding: 12px 24px;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      background-color: olive;
      color: #D1E2C4;
      border-radius: 4px;
      transition: background-color 0.3s;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #778A35;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Voter Login</h1>
    <form action="login.php" method="POST">
      <label for="userID">UserID:</label>
      <input type="text" id="userID" name="userID" required>

      <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
      <?php } ?>

      <button type="submit" name="submit">Login</button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
