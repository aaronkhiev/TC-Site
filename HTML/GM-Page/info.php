<!DOCTYPE html>

<?php
	// Include the session script
	require '../../includes/database-connection.php';

	// Retrieve ALL character info from the characters table. Campaign info will be displayed on another page.
	$sql = "SELECT * 
			FROM characters;";

	// Execute the SQL query using the pdo function and fetch the result
	$chara = pdo($pdo, $sql)->fetchAll();
?> 

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fantasy Table Top Compendium Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CSS/myStyle.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/navigation.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/character.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/npc.css">
    <?php include '../../character.php'; ?>
</head>

<body>
    <div id="content">
        <div id="logo">
            <img src="../../Images/LogoCrop.png" alt="Site Logo" style="width: 100%;" height="240">
        </div>
        <hr />

        <h1 id="title">The Table Top Compendium</h1>
        <hr />

        <div class="topnav">
            <a href="../index.html">Home</a>
            <a href="../DD-Page/index.html">The Dungeon Delver's Guide</a>
            <a href="../Generators-Page/index.html">Generators</a>
            <a class="active" href="char.php">Game Master's World Anvil</a>
            <a href="../about.html">About</a>
        </div>
        <hr />
</body>

</html>