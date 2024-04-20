<!DOCTYPE html>

<?php
	// Include the session script
	require '../../includes/database-connection.php';

    $select = $_GET['charID'];

	// Retrieve ALL character info from the characters table. Campaign info will be displayed on another page.
	$sql = "SELECT * 
			FROM characters
            WHERE characters.charID= :charID;";

	// Execute the SQL query using the pdo function and fetch the result
	$details = pdo($pdo, $sql, ['charID' => $select])->fetch();
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

        <h2>Character Details</h2>
        <h3><?= $details['name'] ?> - <?= $details['title'] ?></h3>
            <ul>
                <ol>Strength: <?= $details['strength'] ?></ol>
                <ol>Dexterity: <?= $details['dexterity'] ?></ol>
                <ol>Constitution: <?= $details['constitution'] ?></ol>
                <ol>Intelligence: <?= $details['intelligence'] ?></ol>
                <ol>Wisdom: <?= $details['wisdom'] ?></ol>
                <ol>Charisma: <?= $details['charisma'] ?></ol>
            </ul>
        <hr />
        
        <h2>External Resources</h2>
            <p>
                Do you still feel unprepared? Need DM resources not for players? No worries! Check out this site for more~! <a id="comp" href="https://www.dnd-compendium.com/">The DND Compendium.</a>
            </p>
        <hr />

        <h2>Learn More Here</h2>
        <div class="subnav">
            <a href="skills.html"> Skills, Skill Checks, and Success</a>
            <a href="action.html"> Taking Initiative</a>
            <a href="spell.html"> Spellcasting 101</a>
        </div>

        <br />
        <div id="Contact">
            <hr />
            <h3>Contact Us!</h3>
            <address>
                <p>
                    Aaron Khiev:
                    <a href="mailto:aaron_khiev@uri.edu">aaron_khiev@uri.edu</a>
                </p>
            </address>
        </div>
    </div>
    <script src="../../Javascript/ajax-html.js"></script>
    <script src="../../Javascript/ajax-json.js"></script>
</body>

</html>