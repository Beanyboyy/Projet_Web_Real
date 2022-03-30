<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the Company id exists, for example update.php?id=1 will get the Company with the id of 1
 if (isset($_GET['Company_ID'])) {
    if (!empty($_POST)) {  
        $Company_id = isset($_POST['Company_ID']) ? $_POST['Company_ID'] : NULL;
        $Company_Name = isset($_POST['Company_Name']) ? $_POST['Company_Name'] : 'Jean';
        $Business_Line = isset($_POST['Business_Line']) ? $_POST['Business_Line'] : '';
        $Students_Amount = isset($_POST['Students_Amount']) ? $_POST['Students_Amount'] : '';
        $Students_Score = isset($_POST['Students_Score']) ? $_POST['Students_Score'] : '';
        $Pilot_Trust = isset($_POST['Pilot_Trust']) ? $_POST['Pilot_Trust'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE Company SET Company_ID = ?, Company_Name = ?, Business_Line = ?, Students_Amount = ?, Students_Score = ?, Pilot_Trust = ? WHERE Company_ID = ?');
        $stmt->execute([$Company_id, $Company_Name, $Business_Line, $Students_Amount, $Students_Score, $Pilot_Trust, $_GET['Company_ID']]);
        $msg = 'Updated Successfully!';
    } 
    // Get the Company from the Companys table
    $stmt = $pdo->prepare('SELECT * FROM Company WHERE Company_ID = ?');
    $stmt->execute([$_GET['Company_ID']]);
    $Company = $stmt->fetch(PDO::FETCH_ASSOC);
     if (!$Company) {
        exit('Company doesn\'t exist with that ID!');
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
    <title>Update Company</title>
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
<div class="back" <input type="submit" value="Back" onclick="window.location.href='manageCompany.php'"><span>Back</span></div>
	<h2>Update Company #<?=$Company['Company_ID']?></h2>
        <form action="updateCompany.php?Company_ID=<?=$Company['Company_ID']?>" method="post">
            <div class="entities">
                <label for="Company_ID">ID</label>
                <label for="Company_Name">Company Name</label>
                <label for="Business_Line">Business Line</label>
                <label for="Students_Amount">Students Amount</label>
                <label for="Students_Score">Students Score</label>
                <label for="Pilot_Trust">Pilot Trust</label>
            </div>
            <div class = "textbox">
                <input type="text" name="Company_ID" placeholder="26" value="<?=$Company['Company_ID']?>" id="Company_ID">
                <input type="text" name="Company_Name" placeholder="Cesi" value="<?=$Company['Company_Name']?>" id="Company_Name">
                <input type="text" name="Business_Line" placeholder="IT" value="<?=$Company['Business_Line']?>" id="Business_Line">
                <input type="text" name="Students_Amount" placeholder="2" value="<?=$Company['Students_Amount']?>" id="Students_Amount">
                <input type="text" name="Students_Score" placeholder="5" value="<?=$Company['Students_Score']?>" id="Students_Score">
                <input type="text" name="Pilot_Trust" placeholder="5" value="<?=$Company['Pilot_Trust']?>" id="Pilot_Trust">
                <input type="submit" value="Update">
            </div>
        </form>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>