<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the Application id exists, for example update.php?id=1 will get the Application with the id of 1
 if (isset($_GET['Application_ID'])) {
    if (!empty($_POST)) {  
        $Application_id = isset($_POST['Application_ID']) ? $_POST['Application_ID'] : NULL;
        $Application_step = isset($_POST['Application_Step']) ? $_POST['Application_Step'] : '';
        $Offer_id = isset($_POST['Offer_ID']) ? $_POST['Offer_ID'] : '';
        $User_id = isset($_POST['User_ID']) ? $_POST['User_ID'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE application SET Application_ID = ?, Application_Step = ?, Offer_ID = ?, User_ID = ? WHERE Application_ID = ?');
        $stmt->execute([$Application_id, $Application_step, $Offer_id, $User_id, $_GET['Application_ID']]);
        $msg = 'Updated Successfully!';
    } 
    // Get the Application from the Application table
    $stmt = $pdo->prepare('SELECT * FROM application WHERE Application_ID = ?');
    $stmt->execute([$_GET['Application_ID']]);
    $Application = $stmt->fetch(PDO::FETCH_ASSOC);
     if (!$Application) {
        exit('Application doesn\'t exist with that ID!');
    }
} 
  else {
    exit('No ID specified!');
} 
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Application</title>
    <link rel="stylesheet" href= "adminMenu.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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

<div class="content update">
<div class="back" <input type="submit" value="Back" onclick="window.location.href='manageApplication.php'"><span>Back</span></div>
	<h2>Update Application #<?=$Application['Application_ID']?></h2>
        <form action="updateApplication.php?Application_ID=<?=$Application['Application_ID']?>" method="post">
            <div class="entities">
                <label for="Application_ID">ID</label>
                <label for="Application_Step">Application Step</label>
                <label for="Offer_ID">Offer ID</label>
                <label for="User_ID">User ID</label>
            </div>
            <div class = "textbox">
                <input type="text" name="Application_ID" placeholder="26" value="<?=$Application['Application_ID']?>" id="Application_ID">
                <input type="text" name="Application_Step" placeholder="3" value="<?=$Application['Application_Step']?>" id="Application_Step">
                <input type="text" name="Offer_ID" placeholder="24" value="<?=$Application['Offer_ID']?>" id="Offer_ID">
                <input type="text" name="User_ID" placeholder="24" value="<?=$Application['User_ID']?>" id="User_ID">
                <input type="submit" value="Create">      
            </div>
        </form>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>