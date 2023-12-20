<?php
// Assuming you have established a database connection
require_once('../connect.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>User List</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    .table {
      background-color: #F0F3EB;
    }

    th {
      background-color: olive;
      color: white;
    }

    .table tbody tr:nth-child(even) {
      background-color: #D1E2C4;
    }

    .table tbody tr:hover {
      background-color: #BED1A4;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User List</h1>
    <?php
    // Query to fetch all users from the database
    $query = "SELECT * FROM users";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
      // Check if there are any users in the database
      if (mysqli_num_rows($result) > 0) {
        // Start the HTML table
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Department</th>
                        <th>Year Level</th>
                        <th>Age</th>
                        <th>Barangay</th>
                        <th>Street</th>
                        <th>Municipality</th>
                        <th>House #</th>
                        <th>Nationality</th>
                        <th>Image Path</th>
                        <th>Image Preview</th>
                    </tr>
                </thead>
                <tbody>';

        // Fetch and display each user row
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['UserID'] . '</td>';
          echo '<td>' . $row['firstname'] . '</td>';
          echo '<td>' . $row['lastname'] . '</td>';
          echo '<td>' . $row['middlename'] . '</td>';
          echo '<td>' . $row['department'] . '</td>';
          echo '<td>' . $row['yearlevel'] . '</td>';
          echo '<td>' . $row['age'] . '</td>';
          echo '<td>' . $row['barangay'] . '</td>';
          echo '<td>' . $row['street'] . '</td>';
          echo '<td>' . $row['municipality'] . '</td>';
          echo '<td>' . $row['housenumber'] . '</td>';
          echo '<td>' . $row['nationality'] . '</td>';
          echo '<td>' . $row['imagepath'] . '</td>';

          // Display image preview
          echo '<td><img src="' . $row['imagepath'] . '" alt="Image Preview" height="50"></td>';

          echo '</tr>';
        }

        // End the HTML table
        echo '</tbody>
            </table>';
      } else {
        echo 'No users found in the database.';
      }

      // Free the result set
      mysqli_free_result($result);
    } else {
      echo 'Error executing the query: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
