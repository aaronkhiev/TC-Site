<?php
	// Include the database connection script
	require 'includes/database-connection.php';

    //Get the character name from the query string.
	$character = $_GET['charID'];

	// Retrieve info on the character from the URL query string name
	$sql = "SELECT *
			FROM characters
			WHERE name = :charID";

	// Execute the SQL query using the pdo function w/arg for sign and fetch the result
	$charInfo = pdo($pdo, $sql, ['charID' => $character])->fetch();
?> 

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
        
        <hr />
        <h2>External Resources</h2>
            <p>
                Do you still feel unprepared? Need DM resources not for players? No worries! Check out this site for more~! <a id="comp" href="https://www.dnd-compendium.com/">The DND Compendium.</a>
            </p>
        <hr />

        <h2>Find Players Near You~!</h2>
            <p>
                Need people to play with? Use the geolocation tool to grab your location.
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