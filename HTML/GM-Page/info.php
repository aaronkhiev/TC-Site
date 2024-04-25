<!DOCTYPE html>

<?php
	// Include the database script
	require '../../includes/database-connection.php';

    // Grab the character ID from the URL.
    $select = $_GET['charID'];

	// Retrieve ALL character info from the characters table. Campaign info will be displayed on this page.
	$sql = "SELECT * 
			FROM characters
            JOIN campaign ON characters.campID = campaign.campID
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

        <!-- Using placeholders, this page will display all of the character info depending on the link that was clicked -->
        <h2>Character Details</h2>
        <h3><?= $details['name'] ?> - <?= $details['title'] ?></h3>
            <ul>
                <li><strong>Strength: </strong><?= $details['strength'] ?></li>
                <li><strong>Dexterity: </strong><?= $details['dexterity'] ?></li>
                <li><strong>Constitution: </strong><?= $details['constitution'] ?></li>
                <li><strong>Intelligence: </strong><?= $details['intelligence'] ?></li>
                <li><strong>Wisdom: </strong><?= $details['wisdom'] ?></li>
                <li><strong>Charisma: </strong><?= $details['charisma'] ?></li>
            </ul>

        <!-- The campaign info is also displayed in this section. Using the JOIN command and campID as the foreign key, we can retrieve the campaigns each character is assigned to -->
        <h3>Campaign Involvement</h3>
        <ul>
            <li><strong>Campaign Title: </strong><?= $details['campTitle'] ?></li>
            <li><strong>Theme: </strong><?= $details['theme'] ?></li>
            <li><strong>Sessions Played: </strong><?= $details['session'] ?></li>
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
</body>

</html>