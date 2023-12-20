<?php
require_once '../connect.php';
//include '../sidebar.php'; 


// Retrieve the available partylists from the partylist table
$partylistStmt = $conn->prepare("SELECT partylistid, partyname FROM partylist");
$partylistStmt->execute();
$partylistResult = $partylistStmt->get_result();
$partylists = $partylistResult->fetch_all(MYSQLI_ASSOC);
$partylistStmt->close();

// Retrieve the available positions from the positions table
$positionStmt = $conn->prepare("SELECT positionid, positionname FROM positions");
$positionStmt->execute();
$positionResult = $positionStmt->get_result();
$positions = $positionResult->fetch_all(MYSQLI_ASSOC);
$positionStmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidateName = $_POST['candidate_name'];
    $positionId = $_POST['position'];
    $partylistId = $_POST['partylist'];

    // Insert the candidate into the candidates table
    $insertStmt = $conn->prepare("INSERT INTO candidate (candidatename, positionid, partylistid) VALUES (?, ?, ?)");
    $insertStmt->bind_param("sss", $candidateName, $positionId, $partylistId);
    $insertStmt->execute();
    $insertStmt->close();

    // Redirect to a success page or any other page you desire
    header("Location: success.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Candidate</title>
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
        <h1>Add Candidate</h1>
        <form action="add_candidate.php" method="POST">
            <div class="form-group">
                <label for="candidate_name">Candidate Name:</label>
                <input type="text" id="candidate_name" name="candidate_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="position">Position:</label>
                <select id="position" name="position" class="form-control" required>
                    <?php foreach ($positions as $position) { ?>
                        <option value="<?php echo $position['positionid']; ?>"><?php echo $position['positionname']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="partylist">Partylist:</label>
                <select id="partylist" name="partylist" class="form-control" required>
                    <?php foreach ($partylists as $partylist) { ?>
                        <option value="<?php echo $partylist['partylistid']; ?>"><?php echo $partylist['partyname']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-custom">Add Candidate</button>

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

