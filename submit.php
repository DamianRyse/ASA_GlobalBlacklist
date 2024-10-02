<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Discord Info</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Submit Your Information</h1>
    <form action="submission.php" method="POST" id="infoForm">
        <label for="discord_id">Discord User ID (required):</label>
        <input type="text" name="discord_id" required><br>

        <label for="steam_id">Steam ID (optional):</label>
        <input type="text" name="steam_id"><br>

        <label for="console_id">Console ID (optional):</label>
        <input type="text" name="console_id"><br>

        <label for="reason">Reason (required):</label>
        <textarea name="reason" required></textarea><br>

        <label for="captcha">Captcha:</label>
        <img src="captcha.php" alt="captcha">
        <input type="text" name="captcha" required><br>

        <button type="submit">Submit</button>
    </form>
    <p><a href=index.php>Return to main page</a></p>
</body>
</html>

