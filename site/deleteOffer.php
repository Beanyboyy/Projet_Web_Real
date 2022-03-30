<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the Offer ID exists
if (isset($_GET['Offer_ID'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM offer WHERE Offer_ID = ?');
    $stmt->execute([$_GET['Offer_ID']]);
    $Offer = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$Offer) {
        exit('Offer doesn\'t exist with that ID!');
    }
    // Make sure the User confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM Offer WHERE Offer_ID = ?');
            $stmt->execute([$_GET['Offer_ID']]);
            $msg = 'You have deleted the Offer!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: manageOffer.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Offer</title>
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
<main>
<div class="content delete">
<div class="back" <input type="submit" value="Back" onclick="window.location.href='manageOffer.php'"><span>Back</span></div>
	<h2>Delete Offer '<?=$Offer['Offer_Title']?>'</h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
    <div class="delete-message">
	<p>You are about to delete the account of <?=$Offer['Offer_Title']?>.<br/> Continue ? </p>
    </div>
    <div class="yesno">
        <a href="deleteOffer.php?Offer_ID=<?=$Offer['Offer_ID']?>&confirm=yes">Yes</a>
        <a href="deleteOffer.php?Offer_ID=<?=$Offer['Offer_ID']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>
</main>

<?=template_footer()?>