<?php
// Process vote count
require_once '../connect.php';
require_once '../function.php';

// Function to get the vote count for each candidate with positions
function getVoteCount()
{
    global $conn;

    $query = "
    SELECT c.CandidateID, c.candidatename, p.positionname, COUNT(*) AS vote_count
    FROM results r
    JOIN candidate c ON r.candidateid = c.CandidateID
    JOIN positions p ON c.positionid = p.positionid
    GROUP BY c.CandidateID, c.candidatename, p.positionname
    ORDER BY p.positionid ASC
    ";

    $result = $conn->query($query);

    if ($result) {
        $voteCount = $result->fetch_all(MYSQLI_ASSOC);
        return $voteCount;
    } else {
        return [];
    }
}

// Fetch the vote count for each candidate with positions
$voteCount = getVoteCount();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vote Count</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #EBEBE8;
        }

        .container {
            background-color: #EBEBE8;
            padding: 20px;
            margin-top: 50px;
            border-radius: 5px;
        }

        table {
            background-color: #778A35;
            color: #EBEBE8;
            border-radius: 5px;
        }

        th {
            background-color: #D1E2C4;
            color: #31352E;
        }

        td {
            background-color: #EBEBE8;
            color: #31352E;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vote Count</h1>
        <?php if (!empty($voteCount)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Candidate</th>
                        <th>Vote Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($voteCount as $count) : ?>
                        <tr>
                            <td><?php echo $count['positionname']; ?></td>
                            <td><?php echo $count['candidatename']; ?></td>
                            <td><?php echo $count['vote_count']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No votes recorded yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>
