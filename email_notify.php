<?php
function sendNotification($discord_id, $reason) {
    $to = 'admin@example.com';
    $subject = "A new entry to the Global Blacklist: $discord_id";
    $message = "A new form has been submitted.\n\nDiscord ID: $discord_id\nReason: $reason";
    $headers = 'From: no-reply@example.com';

    mail($to, $subject, $message, $headers);
}
?>

