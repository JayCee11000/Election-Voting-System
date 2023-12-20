<?php
// Include the database connection
require_once 'connect.php';

// Function to check if a user has already voted
function checkIfUserVoted($userID)
{
    global $conn;

    $query = "SELECT COUNT(*) AS count FROM results WHERE votersid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['count'] > 0;
}

function storeVote($userID, $candidateID)
{
    global $conn;

    $query = "INSERT INTO results (votersid, candidateid, remarks) VALUES (?, ?, 'yes')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userID, $candidateID);
    $stmt->execute();
}
?>


