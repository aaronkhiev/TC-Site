<!DOCTYPE html>

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

            <form action="" method="post">
                <strong>Character Name:</strong> <input type="text" name="textVal"/>
                <input type="submit" name='submit' value='Submit'/>
            </form>

            <p>
                Having trouble doing the math? This page will instantly generate scores for you~!
                Just enter a name and hit submit. Your character name will appear above the scores
                past the name box. If you're unsatisfied with your scores, just refresh the page for
                a new set. You're character name will stay on the page.
            </p>

            <h2>
                <?php 
                    if (isset($_POST['submit'])) {
                        $custom->setName($_POST['textVal']);
                        echo $custom->name;
                    }
                ?>
            </h2>
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

</html>