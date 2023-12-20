<?php
// Process vote submission and logout
// Process vote submission and logout
require_once 'connect.php';
require_once 'function.php';

// Function to get the list of candidates
function getCandidates()
{
    global $conn;

    $query = "
    SELECT candidate.CandidateID, candidate.candidatename, positions.positionname, partylist.partyname
    FROM candidate
    JOIN positions ON candidate.positionid = positions.positionid
    JOIN partylist ON candidate.partylistid = partylist.partylistid
    ORDER BY positions.positionid ASC
    ";

    $result = $conn->query($query);

    if ($result) {
        $candidates = $result->fetch_all(MYSQLI_ASSOC);
        return $candidates;
    } else {
        return [];
    }
}

// Check if the user is logged in
session_start();
if (!isset($_SESSION['userID'])) {
    // User is not logged in, redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['candidate'])) {
        // Get the selected candidates from the form

        $selectedCandidates = $_POST['candidate'];

        // Check if the user has already voted
        $hasVoted = checkIfUserVoted($userID);
        if ($hasVoted) {
            echo "Error ! You have already voted!";
            exit();
        }

        // Store the votes in the database
        foreach ($selectedCandidates as $positionID => $candidateID) {
            storeVote($userID, $candidateID);
        }

        // Logout the user
        session_destroy();

        echo "Thank you for voting! You have been logged out.";
        exit();
    } else {
        echo "Please select a candidate!";
        exit();
    }
}

// Fetch the list of candidates from the database
$candidates = getCandidates();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Voting System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .center-table {
            margin: 0 auto;
        }
        .btn-olive {
            background-color: olive;
            color: #FFFFFF;
            border-color: olive;
        }

        .btn-olive:hover {
            background-color: sagegreen;
            border-color: sagegreen;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Voting System</h1>
        <div class="center-table">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Candidate</th>
                            <th>Party</th>
                            <th>Vote</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $currentPosition = '';
                        $count = 0;
                        foreach ($candidates as $candidate) :
                            if ($currentPosition !== $candidate['positionname']) {
                                $currentPosition = $candidate['positionname'];
                                echo '<tr><td colspan="4"><h3>' . $currentPosition . '</h3></td></tr>';
                                $count = 0;
                            }
                            if ($count % 4 === 0) {
                                echo '</tr><tr>';
                            }
                            ?>
                            <tr>
                                <td><?php echo $candidate['positionname']; ?></td>
                                <td><?php echo $candidate['candidatename']; ?></td>
                                <td><?php echo $candidate['partyname']; ?></td>
                                <td>
                                    <input type="radio" name="candidate[<?php echo $candidate['positionname']; ?>]" value="<?php echo $candidate['CandidateID']; ?>" required>
                                </td>
                            </tr>
                            <?php
                            $count++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" class="btn btn-olive">Vote</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

