<?php
// Assuming you have established a database connection
require_once('../connect.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Candidates List</title>
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
    <h1>Candidates List</h1>
    <?php
    // Query to fetch candidates with position and party names
    $query = "SELECT c.CandidateID, c.candidatename, p.positionname, pt.partyname
              FROM candidate c
              INNER JOIN positions p ON c.positionid = p.positionid
              INNER JOIN partylist pt ON c.partylistid = pt.partylistid";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
      // Check if there are any candidates in the database
      if (mysqli_num_rows($result) > 0) {
        // Start the HTML table
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>Candidate ID</th>
                        <th>Candidate Name</th>
                        <th>Position</th>
                        <th>Party</th>
                    </tr>
                </thead>
                <tbody>';

        // Fetch and display each candidate row
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['CandidateID'] . '</td>';
          echo '<td>' . $row['candidatename'] . '</td>';
          echo '<td>' . $row['positionname'] . '</td>';
          echo '<td>' . $row['partyname'] . '</td>';
          echo '</tr>';
        }

        // End the HTML table
        echo '</tbody>
            </table>';
      } else {
        echo 'No candidates found in the database.';
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
