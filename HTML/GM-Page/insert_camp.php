<!DOCTYPE html>

<?php
	// Include the database script
	require '../../includes/database-connection.php';
 
    if (isset($_POST['submit'])) {
        $title = $_POST['campTitle'];
        $theme = $_POST['theme'];
        $sessions = $_POST['session'];
        $id = $_POST['campID'];

        $data = [
            'campID' => $id,
            'campTitle' => $title,
            'theme' => $theme,
            'session' => intval($sessions),
        ];

        $sql = "UPDATE campaign 
        SET campTitle= :campTitle, theme= :theme, session= :session 
        WHERE campID=:campID";
        $vals = $pdo->prepare($sql);
        $vals->execute($data);

        $upd = $vals->rowCount();
    }
?>
<!--PHP above will update the campaign entry depending on the ID entered.-->

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
        <!--This form will update the campaign in the database and print the rows updated-->
        <h2>Update a campaign yourself~!</h2>
            <form method='POST'>
                Campaign Title: <input type='text' name ='campTitle'><br>
                Campaign Theme: <input type='text' name ='theme'><br>
                Number of Sessions: <input type='text' name ='session'><br>
                Campaign ID: <input type='text' name ='campID'><br>
                <button type='submit' name='submit'>Submit</button>
            </form>
            <p><?= $upd ?> row(s) were changed...</p>
        
        <h2>External Resources</h2>
            <p>
                Do you still feel unprepared? Need DM resources not for players? No worries! Check out this site for more~! <a id="comp" href="https://www.dnd-compendium.com/">The DND Compendium.</a>
            </p>

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