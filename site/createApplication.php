<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $Application_id = isset($_POST['Application_ID']) && !empty($_POST['Application_ID']) && $_POST['Application_ID'] != 'auto' ? $_POST['Application_ID'] : NULL;
    // Check if POST variable exists, if not default the value to blank
    $Application_step = isset($_POST['Application_Step']) ? $_POST['Application_Step'] : '';
    $Offer_id = isset($_POST['Offer_ID']) ? $_POST['Offer_ID'] : '';
    $User_id = isset($_POST['User_ID']) ? $_POST['User_ID'] : '';

    // Insert new record into the Companies table
    $stmt = $pdo->prepare("INSERT INTO application VALUES (?, ?, ?, ?)");
    $stmt->execute([$Application_id, $Application_step, $Offer_id, $User_id]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Application</title>
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
    <div class="back" <input type="submit" value="Back" onclick="window.location.href='manageApplication.php'"><span>Back</span></div>
	<h2>CREATE APPLICATION</h2>
    <form action="createApplication.php" method="post">
        <div class="entities">
            <label for="Application_ID">ID</label>
            <label for="Application_Step">Application Step</label>
            <label for="Offer_ID">Offer ID</label>
            <label for="User_ID">User ID</label>
        </div>
        <div class = "textbox">
            <input type="text" name="Application_ID" placeholder="26" value="auto" id="Application_ID">
            <input type="text" name="Application_Step" placeholder="3" id="Application_Step">
            <input type="text" name="Offer_ID" placeholder="24" id="Offer_ID">
            <input type="text" name="User_ID" placeholder="24" id="User_ID">
            <input type="submit" value="Create">      
        </div> 
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</main>


<?=template_footer()?>