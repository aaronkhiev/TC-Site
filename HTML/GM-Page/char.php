<!DOCTYPE html>

<?php
	// Include the session script
	require '../../includes/database-connection.php';

	// Retrieve ALL character info from the characters table. Campaign info will be displayed on another page.
	$sql = "SELECT * 
			FROM characters;";

	// Execute the SQL query using the pdo function and fetch the result
	$chara = pdo($pdo, $sql)->fetchAll();
 
    if (isset($_POST['submit'])) {
        $title = $_POST['campTitle'];
        $theme = $_POST['theme'];
        $sessions = $_POST['session'];

        $data = [
            'campTitle' => $title,
            'theme' => $theme,
            'session' => intval($sessions),
        ];

        $sql = "INSERT INTO campaign (campTitle, theme, session)
        VALUES (:campTitle, :theme, :session)";

        $vals = $pdo->prepare($sql);
        $vals->execute($data);
    }
?>

<?php
    // Greetings based on whether this page was visited or not. Cookies set to expire in 1 hour.
    $visitor = $_COOKIE['visitor'] ?? 0;
    $visitor = $visitor + 1;

    setcookie('visitor', htmlspecialchars($visitor), time() + (60 * 60), "/");

    if ($visitor == 1) {
        $greeting = 'Welcome New Adventurer! Feel free to look around.';
    }
    else {
        $greeting = 'Welcome Back Adventurer!';
    }
?>

<?php 
    //Creating a session and storing the previous character's name.
    session_start(); 
    if( isset( $_SESSION['counter'] ) ) { 
        $_SESSION['counter'] += 1; 
    }
    else { 
        $_SESSION['counter'] = 1; 
    } 

    $my_Msg = " Character data will be cleared after 5 uses so please backup your scores!";

    //If there has yet to be a character name set then create set a session variable with a blank name.
    if( isset($_SESSION['charn'] ) == false ) { 
        $_SESSION['charn'] = '';
    }

    //Automatically terminate the session after the page is accessed 5 times.
    if ($_SESSION['counter'] == 5) {
        $_SESSION = [];
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        session_destroy();
        $my_Msg = "Clearing character data...";
    }
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

        <h2>Running A Campaign</h2>
            <p>
                 You have your character but now what? Well you now need to establish a group to play with!
                 This can range from just 3 people to even 6 or more! Each group needs a Dungeon Master also known as a DM.
                 This person will be in charge of running and narrating the majority of the story. Do note that it is still a collaborative
                 effort on both ends. Players need to put in their two cents for a functioning and long running campaign. 
            </p>
        <hr />

        <section id="divide">
            <div id="container">
                <h2 class="center">Character Examples</h2>  
                <div class="char-layout">
                    <div id="char">
                        <img id="thistle" src="../../Images/Thistle.png" alt="Thistle Sprouts The Druid" width="200" height="200"/>
                        <img id="verdan" src="../../Images/Verdan.png" alt="Verdan The Ghastly" width="200" height="200"/>
                    </div>
                </div>
                <div class="char-layout">
                    <div id="details">
                        <p>Learn more about these two characters by clicking their portraits!</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
            <div>
                <h2 class="center">NPC Examples</h2>  
                <div class="npc-layout">
                    <div id="npc">
                        <img id="nora" src="../../Images/Nora.png" alt="Dr. Rosenbridge" width="100" height="100"/>
                        <img id="finn" src="../../Images/Finn.png" alt="Finn The Elder" width="100" height="100"/>
                        <img id="tenti" src="../../Images/Tenti.png" alt="Tenti The Jelly" width="100" height="100"/>
                    </div>
                </div>
                <div class="npc-layout">
                    <div id="ndetails">
                        <p>Learn more about these three npcs by clicking their portraits!</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2 class="center">Basic Character Profiles</h2>
            <p>
                After looking at the profiles above, let's break some characters to the barest features and look at it with only ability scores!
            </p>
            <h2><?= $thistle->name ?></h2>
            <ul>
                <li>Strength:<?= ' ', $thistle->strength ?></li>
                <li>Dexterity:<?= ' ', $thistle->dexterity ?></li>
                <li>Constitution:<?= ' ', $thistle->constitution ?></li>
                <li>Intelligence:<?= ' ', $thistle->intelligence ?></li>
                <li>Wisdom:<?= ' ', $thistle->wisdom ?></li>
                <li>Charisma:<?= ' ', $thistle->charisma ?></li>
            </ul>

            <p>
                Having trouble doing the math? This page will instantly generate scores for you~!
                Just enter a name and hit submit. Your character name will appear above the scores
                past the name box. If you're unsatisfied with your scores, just refresh the page for
                a new set. You're character name will stay on the page.
            </p>
        </section>

        <h2><?= $greeting ?></h2>

        <?php 
            // Code that will set values for the character name, character title, and favored dice type/modifier for that character.
            require '../../validate.php';

            $user = [
                'name' => '',
                'title' => '',
                'dice' => '',
            ];

            $errors = [
                'name' => '',
                'title' => '',
                'dice' => '',
            ];

            $message = '';

            // Validation that uses functions from the lecture slides and example
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user['name'] = $_POST['name'];
                $user['title'] = $_POST['title'];
                $user['dice'] = $_POST['dice'];

                $errors['name'] = is_text($user['name'], 2, 20) ? '' : 'Must be 2-20 characters';
                $errors['title'] = is_text($user['title'], 2, 20) ? '' : 'Must be 2-20 characters';
                $errors['dice'] = is_number($user['dice'], 1, 20) ? '' : 'Must be 1-20 characters';
                
                $invalid = implode($errors);
                if ($invalid) {
                    $message = 'Please correct the following errors:';
                } else {
                    $message = 'Character Created!';
                }
                $_SESSION['charn'] = $user['name'];
            }
            ?>
            
            <p><?= $my_Msg ?></p>

            <?= $message ?>
            
            <form action="char.php" method="POST">
            <strong>Name:</strong> <input type='text' name='name' value='<?= htmlspecialchars($user['name']) ?>'>
                    <span class='error'><?= $errors['name'] ?></span><br>
            <strong>Title:</strong> <input type='text' name='title' value='<?= htmlspecialchars($user['title']) ?>'>
                    <span class='error'><?= $errors['title'] ?></span><br>
            <strong>Random Number/Modifier (1-20):</strong> <input type='text' name='dice' value='<?= htmlspecialchars($user['dice']) ?>'>
                <span class='error'><?= $errors['dice'] ?></span><br>
                    <input type='submit' value='Save'>
            </form>

            <p><strong>Name: </strong><?= $user['name'] ?></p>
            <p><strong>Title: </strong><?= $user['title'] ?></p>
            <p><strong>Dice: </strong><?= $user['dice'] ?></p>

        <section>
            <?= $custom->displayStat() ?>
            <ul>
                <li>Strength:<?= ' ', $custom->strength ?></li>
                <li>Dexterity:<?= ' ', $custom->dexterity ?></li>
                <li>Constitution:<?= ' ', $custom->constitution ?></li>
                <li>Intelligence:<?= ' ', $custom->intelligence ?></li>
                <li>Wisdom:<?= ' ', $custom->wisdom ?></li>
                <li>Charisma:<?= ' ', $custom->charisma ?></li>
            </ul>
        </section>

        <hr />
        <h2>What's the difference</h2>
            <p>
                After looking through the characters and NPCs (Non-Playable Characters), you may ask what the difference is. Well for one Characters are controlled by
                the players whereas the Dungeon Master controls the NPCs. This explains why you get so little information about them when you
                first meet them. All of the juicy backstory and dangerous secrets are all tucked away with the DM and drip fed to the players 
                depending on what you do. The players also do not know the ability scores of NPCs. This knowledge regarding Non-Playable characters
                makes a nice surprise when you least expect it. Imagine trying to rob a store only to realize the clerk/NPC standing on the other side
                of the counter is a retired Gladiator. 
            </p>

        <hr />
        <h2>Check out our Character Database here!</h2>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[0]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[0]['name'] ?> - <?= $chara[0]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[1]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[1]['name'] ?> - <?= $chara[1]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[2]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[2]['name'] ?> - <?= $chara[2]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[3]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[3]['name'] ?> - <?= $chara[3]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[4]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[4]['name'] ?> - <?= $chara[4]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[5]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[5]['name'] ?> - <?= $chara[5]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[6]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[6]['name'] ?> - <?= $chara[6]['title'] ?></h3>
					</a>
            </div>
            <div class="characters">
					<!-- Create a hyperlink to info.php page with name as parameter -->
					<a href="info.php?charID=<?= htmlspecialchars($chara[7]['charID']) ?>">
						<!-- Display the name of the character -->
						<h3><?= $chara[7]['name'] ?> - <?= $chara[7]['title'] ?></h3>
					</a>
            </div>
        <hr />

        <h2>Create a campaign yourself~!</h2>
            <form method='POST'>
                Campaign Title: <input type='text' name ='campTitle'><br>
                Campaign Theme: <input type='text' name ='theme'><br>
                Number of Sessions: <input type='text' name ='session'><br>
                <button type='submit' name='submit'>Submit</button>
            </form>

        <h2>Update a campaign~!</h2>
        <a class='corr' href="insert_camp.php"> Update Here!</a>

        <h2>Remove a campaign....</h2>
        <a class='corr' href="remove_camp.php"> Remove Here...</a>

        <hr />
        <h2>External Resources</h2>
            <p>
                Do you still feel unprepared? Need DM resources not for players? No worries! Check out this site for more~! <a id="comp" href="https://www.dnd-compendium.com/">The DND Compendium.</a>
            </p>
        <hr />

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