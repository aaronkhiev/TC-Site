<?php
	// Include the database connection script
	require 'includes/database-connection.php';

    //Get the character name from the query string.
	$character = $_GET['charID'];

	// Retrieve info on the character from the URL query string name
	$sql = "SELECT *
			FROM characters
			WHERE charID = :charID";

	// Execute the SQL query using the pdo function w/arg for sign and fetch the result
	$charInfo = pdo($pdo, $sql, ['charID' => $character])->fetch();
?> 

    <!-- Display name and title of the character -->
    <h2><?= $charInfo['name'] ?> - <?= $charInfo['title'] ?></h2>
    <!-- Display character scores -->
    <h3>Ability Score</h3>
    <ul>
        <li>Strength: <?= $charInfo['strength'] ?></li>
        <li>Dexterity: <?= $charInfo['dexterity'] ?></li>
        <li>Constitution: <?= $charInfo['constitution'] ?></li>
        <li>Intelligence: <?= $charInfo['intelligence'] ?></li>
        <li>Wisdom: <?= $charInfo['wisdom'] ?></li>
        <li>Charisma: <?= $charInfo['charisma'] ?></li>
    </ul>