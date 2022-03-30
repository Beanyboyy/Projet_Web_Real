<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the Offer id exists, for example update.php?id=1 will get the Offer with the id of 1
 if (isset($_GET['Offer_ID'])) {
    if (!empty($_POST)) {  
        $Offer_id = isset($_POST['Offer_ID']) ? $_POST['Offer_ID'] : NULL;
        $Offer_title = isset($_POST['Offer_Title']) ? $_POST['Offer_Title'] : '';
        $Abilities = isset($_POST['Abilities']) ? $_POST['Abilities'] : '';
        $Internship_duration = isset($_POST['Internship_Duration']) ? $_POST['Internship_Duration'] : '';
        $Base_remuneration = isset($_POST['Base_Remuneration']) ? $_POST['Base_Remuneration'] : '';
        $Offer_date = isset($_POST['Offer_Date']) ? $_POST['Offer_Date'] : date('Y-m-d H:i:s');
        $Number_of_places = isset($_POST['Number_Of_Places']) ? $_POST['Number_Of_Places'] : '';
        $Company_email = isset($_POST['Company_Email']) ? $_POST['Company_Email'] : '';
        $Company_id = isset($_POST['Company_ID']) ? $_POST['Company_ID'] : '';
        $Address_id = isset($_POST['Address_ID']) ? $_POST['Address_ID'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE offer SET Offer_ID = ?, Offer_Title = ?, Abilities = ?, Internship_Duration = ?, Base_Remuneration = ?, Offer_Date = ?, Number_Of_Places = ?, Company_Email = ?, Company_ID = ?, Address_ID = ? WHERE Offer_ID = ?');
        $stmt->execute([$Offer_id, $Offer_title, $Abilities, $Internship_duration, $Base_remuneration, $Offer_date, $Number_of_places, $Company_email, $Company_id, $Address_id, $_GET['Offer_ID']]);
        $msg = 'Updated Successfully!';
    } 
    // Get the Offer from the Offer table
    $stmt = $pdo->prepare('SELECT * FROM offer WHERE Offer_ID = ?');
    $stmt->execute([$_GET['Offer_ID']]);
    $Offer = $stmt->fetch(PDO::FETCH_ASSOC);
     if (!$Offer) {
        exit('Offer doesn\'t exist with that ID!');
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
    <title>Update Offer</title>
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
<div class="back" <input type="submit" value="Back" onclick="window.location.href='manageOffer.php'"><span>Back</span></div>
	<h2>Update Offer #<?=$Offer['Offer_ID']?></h2>
        <form action="updateOffer.php?Offer_ID=<?=$Offer['Offer_ID']?>" method="post">
            <div class="entities">
                <label for="Offer_ID">ID</label>
                <label for="Offer_Title">Offer Title</label>
                <label for="Abilities">Abilities</label>
                <label for="Internship_Duration">Internship Duration</label>
                <label for="Base_Remuneration">Base Remuneration</label>
                <label for="Offer_Date">Offer Date</label>
                <label for="Number_Of_Places">Number Of Places</label>
                <label for="Company_Email">Company Email</label>
                <label for="Company_ID">Company ID</label>
                <label for="Address_ID">Address ID</label>
            </div>
            <div class = "textbox">
                <input type="text" name="Offer_ID" placeholder="26" value="<?=$Offer['Offer_ID']?>" id="Offer_ID">
                <input type="text" name="Offer_Title" placeholder="Backend internship (PHP)" value="<?=$Offer['Offer_Title']?>" id="Offer_Title">
                <input type="text" name="Abilities" placeholder="Bac+2" value="<?=$Offer['Abilities']?>" id="Abilities">
                <input type="text" name="Internship_Duration" placeholder="4 months" value="<?=$Offer['Internship_Duration']?>" id="Internship_Duration">
                <input type="text" name="Base_Remuneration" placeholder="2000" value="<?=$Offer['Base_Remuneration']?>" id="Base_Remuneration">
                <input type="datetime-local" name="Offer_Date" value="<?=date('Y-m-d\TH:i', strtotime($Offer['Offer_Date']))?>"  id="Offer_Date">
                <input type="text" name="Number_Of_Places" placeholder="2" value="<?=$Offer['Number_Of_Places']?>" id="Number_Of_Places">
                <input type="text" name="Company_Email" placeholder="5" value="<?=$Offer['Company_Email']?>" id="Company_Email">
                <input type="text" name="Company_ID" placeholder="5" value="<?=$Offer['Company_ID']?>" id="Company_ID">
                <input type="text" name="Address_ID" placeholder="5" value="<?=$Offer['Address_ID']?>" id="Address_ID">
                <input type="submit" value="Create">      
            </div>
        </form>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>