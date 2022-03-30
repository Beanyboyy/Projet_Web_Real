<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $Company_id = isset($_POST['Company_ID']) && !empty($_POST['Company_ID']) && $_POST['Company_ID'] != 'auto' ? $_POST['Company_ID'] : NULL;
    // Check if POST variable exists, if not default the value to blank
    $Company_Name = isset($_POST['Company_Name']) ? $_POST['Company_Name'] : 'Jean';
    $Business_Line = isset($_POST['Business_Line']) ? $_POST['Business_Line'] : '';
    $Students_Amount = isset($_POST['Students_Amount']) ? $_POST['Students_Amount'] : '';
    $Students_Score = isset($_POST['Students_Score']) ? $_POST['Students_Score'] : '';
    $Pilot_Trust = isset($_POST['Pilot_Trust']) ? $_POST['Pilot_Trust'] : '';

    // Insert new record into the Companies table
    $stmt = $pdo->prepare("INSERT INTO Company VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$Company_id, $Company_Name, $Business_Line, $Students_Amount, $Students_Score, $Pilot_Trust]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company</title>
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
    <div class="back" <input type="submit" value="Back" onclick="window.location.href='manageCompany.php'"><span>Back</span></div>
	<h2>CREATE COMPANY</h2>
    <form action="createCompany.php" method="post">
        <div class="entities">
            <label for="Company_ID">ID</label>
            <label for="Company_Name">Company Name</label>
            <label for="Business_Line">Business Line</label>
            <label for="Students_Amount">Students Amount</label>
            <label for="Students_Score">Students Score</label>
            <label for="Pilot_Trust">Pilot Trust</label>
        </div>
        <div class = "textbox">
            <input type="text" name="Company_ID" placeholder="26" value="auto" id="Company_ID">
            <input type="text" name="Company_Name" placeholder="Cesi" id="Company_Name">
            <input type="text" name="Business_Line" placeholder="IT" id="Business_Line">
            <input type="text" name="Students_Amount" placeholder="2" id="Students_Amount">
            <input type="text" name="Students_Score" placeholder="5" id="Students_Score">
            <input type="text" name="Pilot_Trust" placeholder="5" id="Pilot_Trust">
            <input type="submit" value="Create">      
        </div> 
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</main>


<?=template_footer()?>