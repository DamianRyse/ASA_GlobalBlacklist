<?php
include('config.php');

// Function to get the user's IP address
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from a proxy
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Default IP address
        return $_SERVER['REMOTE_ADDR'];
    }
}



// Captcha verification
session_start();
if ($_POST['captcha'] !== $_SESSION['captcha']) {
    die("Invalid Captcha");
}

// Sanitize form data

$discord_id = filter_input(INPUT_POST, 'discord_id', FILTER_SANITIZE_STRING);
$steam_id = filter_input(INPUT_POST, 'steam_id', FILTER_SANITIZE_STRING);
$console_id = filter_input(INPUT_POST, 'console_id', FILTER_SANITIZE_STRING);
$reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING);
$submitted_by_ip = getUserIP();

$steam_id = !empty(trim($steam_id)) ? $steam_id : null;
$console_id = !empty(trim($console_id)) ? $console_id : null;

try {
    $stmt = $pdo->prepare("INSERT INTO submissions (discord_id, steam_id, console_id, reason, submitted_by_ip) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$discord_id, $steam_id, $console_id, $reason, $submitted_by_ip]);

    // Notify admin
    //include('email_notify.php');
    //sendNotification($discord_id, $reason);

    echo "<h3>Form submitted successfully!</h3>";
    echo "<p><strong>Your blacklisting will be reviewed by an administrator soon and if found valid, it'll be approved.</strong></p>";
    echo "<p><a href=index.php>Return to main page</a> or <a href=submit.php>submit another</a></p>";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

