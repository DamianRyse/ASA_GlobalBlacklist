<?php
include('config.php');

// Set the content type to JSON
header('Content-Type: application/json');

// Retrieve the 'discord_id' from the query parameters
$discord_id = filter_input(INPUT_GET, 'discord_id', FILTER_SANITIZE_STRING);

if (!$discord_id) {
    echo json_encode([
        'error' => 'Discord ID is required'
    ]);
    exit;
}

try {
    // Prepare the SQL query to fetch the record
	$stmt = $pdo->prepare("SELECT discord_id, discord_username, steam_id, console_id, reason, timestamp FROM submissions WHERE discord_id = ? AND approved=1;");
    $stmt->execute([$discord_id]);

    // Fetch the record from the database
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
	// If the record exists, return it as a JSON object
	$date = new DateTime($row['timestamp']);
	    
	echo json_encode([
            'Discord ID' => (string)$row['discord_id'],
            'Discord Username' => $row['discord_username'],
            'Steam ID' => $row['steam_id'],
            'Console ID' => $row['console_id'],
            'Reason' => $row['reason'],
            'Timestamp' => $date->format(DateTime::RFC3339)
        ]);
    } else {
        // If no record exists, return an error message
        echo json_encode([
        ]);
    }
} catch (PDOException $e) {
    // If there is a database error, return the error message
    echo json_encode([
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?>

