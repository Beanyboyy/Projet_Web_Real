<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';

// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $user_id = isset($_POST['User_ID']) && !empty($_POST['User_ID']) && $_POST['User_ID'] != 'auto' ? $_POST['User_ID'] : NULL;
    // Check if POST variable exists, if not default the value to blank
    $first_name = isset($_POST['First_Name']) ? $_POST['First_Name'] : 'Jean';
    $last_name = isset($_POST['Last_Name']) ? $_POST['Last_Name'] : '';
    $username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $campus = isset($_POST['Campus']) ? $_POST['Campus'] : '';
    $promotion = isset($_POST['Promotion']) ? $_POST['Promotion'] : '';

    // Insert new record into the users table
    $stmt = $pdo->prepare("INSERT INTO user (User_Id, First_Name, Last_Name, Username, Password, Campus, Promotion, Status) VALUES (?, ?, ?, ?, ?, ?, ?, '3')");
    $stmt->execute([$user_id, $first_name, $last_name, $username, $password, $campus, $promotion]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Representant</title>
    <link rel="stylesheet" href= "adminMenu.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    </head>
    <body>
        <header>
        <nav>
         <div class="left">
            <a href="menuAdmin.php"><img src="Logo.png" alt="logo" width="200px"></a>
        </div>
        
        <div class="header-right">
        <button type="button" class="button" <input type="submit" onclick="window.location.href='index.php'">
          <span style="font-size: small;">Disconnect</span>
        </button>
        </div>
        </nav>
    </header>

<main>
<div class="content update">
    <div class="back" <input type="submit" value="Back" onclick="window.location.href='manageRepresentant.php'"><span>Back</span></div>
	<h2>CREATE REPRESENTANT</h2>
    <form action="createRepresentant.php" method="post">
        <div class="entities">
            <label for="User_ID">ID</label>
            <label for="First_Name">First Name</label>
            <label for="Last_Name">Last Name</label>
            <label for="Username">Username</label>
            <label for="Password">Password</label>
            <label for="Campus">Campus</label>
            <label for="Promotion">Promotion</label>
        </div>
        <div class = "textbox">
            <input type="text" name="User_ID" placeholder="26" value="auto" id="User_ID">
            <input type="text" name="First_name" placeholder="Jean" id="First_Name">
            <input type="text" name="Last_Name" placeholder="Art" id="Last_Name">
            <input type="text" name="Username" placeholder="jeanart@example.com" id="Username">
            <input type="text" name="Password" placeholder="azerty" id="Password">
            <input type="text" name="Campus" placeholder="Bordeaux" id="Campus">
            <input type="text" name="Promotion" placeholder="IT" id="Promotion">
            <input type="submit" value="Create">      
        </div> 
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</main>


<?=template_footer()?>