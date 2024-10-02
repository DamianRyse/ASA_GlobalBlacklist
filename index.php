<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Submissions | ASA Global Blacklist</title>
    <script src="script.js"></script>
</head>
<body>
    <h1>ARK: Survival Ascendend Global Blacklist</h1>
    <p>The <i>Global Blacklist</i> is a database that'll help you as a tribe leader in the infamous video game 'ARK: Survival Ascendend' to be aware of players which may want to join your tribe but being blacklisted in other tribes before.</p>

    <p>This tool is free to use and also offers an API which you can use for your own programs, bots, etc.<br>
Call <a href=api.php?discord_id=DISCORD_ID>/api.php?discord_id=DISCORD_ID</a> to get a JSON response of a blacklisted user. If the user-id isn't on the global blacklist, the JSON response will be empty.</p>

    <p><strong>To submit a new blacklisting, please fill out the form on <a href=submit.php>this page.</a></strong> Before you submission is listed here or requestable via the API, an administrator must review and approve your submission first.</p>

<p>On a side note: We understand that you're angry on the person who insided you. But please keep it professional and don't try to leak personal information like real name, addresses, birthdays, etc. We won't approve those entries anyway.</p>
    <h3>Most recent 100 blacklisted users</h3>
    <input type="text" id="search" placeholder="Search by ID, Reason, or Username">
    <table border="1" id="submissionsTable">
        <thead>
	    <tr>
		<th>Discord Username</th>
                <th>Discord ID</th>
                <th>Steam ID</th>
                <th>Console ID</th>
                <th>Reason</th>
                <th>Timestamp (UTC)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM submissions WHERE approved=1 ORDER BY timestamp DESC LIMIT 100");
            while ($row = $stmt->fetch()) {
		echo "<tr>";
		echo "  <td>{$row['discord_username']}";
                echo "  <td>{$row['discord_id']}</td>";
                echo "  <td>{$row['steam_id']}</td>";
                echo "  <td>{$row['console_id']}</td>";
                echo "  <td>{$row['reason']}</td>";
                echo "  <td>{$row['timestamp']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

