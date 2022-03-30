<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $Offer_id = isset($_POST['Offer_ID']) && !empty($_POST['Offer_ID']) && $_POST['Offer_ID'] != 'auto' ? $_POST['Offer_ID'] : NULL;
    // Check if POST variable exists, if not default the value to blank
    $Offer_title = isset($_POST['Offer_Title']) ? $_POST['Offer_Title'] : 'Jean';
    $Abilities = isset($_POST['Abilities']) ? $_POST['Abilities'] : '';
    $Internship_duration = isset($_POST['Internship_Duration']) ? $_POST['Internship_Duration'] : '';
    $Base_remuneration = isset($_POST['Base_Remuneration']) ? $_POST['Base_Remuneration'] : '';
    $Offer_date = isset($_POST['Offer_Date']) ? $_POST['Offer_Date'] : date('Y-m-d H:i:s');
    $Number_of_places = isset($_POST['Number_Of_Places']) ? $_POST['Number_Of_Places'] : '';
    $Company_email = isset($_POST['Company_Email']) ? $_POST['Company_Email'] : '';
    $Company_id = isset($_POST['Company_ID']) ? $_POST['Company_ID'] : '';
    $Address_id = isset($_POST['Address_ID']) ? $_POST['Address_ID'] : '';


    // Insert new record into the Companies table
    $stmt = $pdo->prepare("INSERT INTO offer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$Offer_id, $Offer_title, $Abilities, $Internship_duration, $Base_remuneration, $Offer_date, $Number_of_places, $Company_email, $Company_id, $Address_id]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Offer</title>
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
    <div class="back" <input type="submit" value="Back" onclick="window.location.href='manageOffer.php'"><span>Back</span></div>
	<h2>CREATE OFFER</h2>
    <form action="createOffer.php" method="post">
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
            <input type="text" name="Offer_ID" placeholder="26" value="auto" id="Offer_ID">
            <input type="text" name="Offer_Title" placeholder="Backend internship (PHP)" id="Offer_Title">
            <input type="text" name="Abilities" placeholder="Bac+2" id="Abilities">
            <input type="text" name="Internship_Duration" placeholder="4 months" id="Internship_Duration">
            <input type="text" name="Base_Remuneration" placeholder="2000" id="Base_Remuneration">
            <input type="datetime-local" name="Offer_Date" value="<?=date('Y-m-d\TH:i')?>" id="Offer_Date">
            <input type="text" name="Number_Of_Places" placeholder="2" id="Number_Of_Places">
            <input type="text" name="Company_Email" placeholder="company@example.com" id="Company_Email">
            <input type="text" name="Company_ID" placeholder="5" id="Company_ID">
            <input type="text" name="Address_ID" placeholder="5" id="Address_ID">
            <input type="submit" value="Create">      
        </div> 
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</main>


<?=template_footer()?>