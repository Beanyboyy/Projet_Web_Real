<?php
include 'database.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the user id exists, for example update.php?id=1 will get the user with the id of 1
 if (isset($_GET['User_ID'])) {
    if (!empty($_POST)) {  
        $user_id = isset($_POST['User_ID']) ? $_POST['User_ID'] : NULL;
        $first_name = isset($_POST['First_Name']) ? $_POST['First_Name'] : 'Jean';
        $last_name = isset($_POST['Last_Name']) ? $_POST['Last_Name'] : '';
        $username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $password = isset($_POST['Password']) ? $_POST['Password'] : '';
        $campus = isset($_POST['Campus']) ? $_POST['Campus'] : '';
        $promotion = isset($_POST['Promotion']) ? $_POST['Promotion'] : '';
        $status = isset($_POST['Status']) ? $_POST['Status'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE user SET User_ID = ?, First_Name = ?, Last_Name = ?, Username = ?, Password = ?, Campus = ?, Promotion = ?, Status = ? WHERE User_ID = ?');
        $stmt->execute([$user_id, $first_name, $last_name, $username, $password, $campus, $promotion, $status, $_GET['User_ID']]);
        $msg = 'Updated Successfully!';
    } 
    // Get the user from the user table
    $stmt = $pdo->prepare('SELECT * FROM user WHERE User_ID = ?');
    $stmt->execute([$_GET['User_ID']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
     if (!$user) {
        exit('User doesn\'t exist with that ID!');
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
    <title>Update Student</title>
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
<div class="back" <input type="submit" value="Back" onclick="window.location.href='manageStudent.php'"><span>Back</span></div>
	<h2>Update User #<?=$user['User_ID']?></h2>
        <form action="updateStudent.php?User_ID=<?=$user['User_ID']?>" method="post">
            <div class="entities">
                <label for="User_ID">ID</label>
                <label for="First_Name">First Name</label>
                <label for="Last_Name">Last Name</label>
                <label for="Username">Username</label>
                <label for="Password">Password</label>
                <label for="Campus">Campus</label>
                <label for="Promotion">Promotion</label>
                <label for="Status">Status</label>
            </div>
            <div class = "textbox">
                <input type="text" name="User_ID" placeholder="26" value="<?=$user['User_ID']?>" id="User_ID">
                <input type="text" name="First_name" placeholder="Jean" value="<?=$user['First_Name']?>" id="First_Name">
                <input type="text" name="Last_Name" placeholder="Art" value="<?=$user['Last_Name']?>" id="Last_Name">
                <input type="text" name="Username" placeholder="jeanart@example.com" value="<?=$user['Username']?>" id="Username">
                <input type="text" name="Password" placeholder="azerty" value="<?=$user['Password']?>" id="Password">
                <input type="text" name="Campus" placeholder="Bordeaux" value="<?=$user['Campus']?>" id="Campus">
                <input type="text" name="Promotion" placeholder="IT" value="<?=$user['Promotion']?>" id="Promotion">
                <input type="text" name="Status" placeholder="4" value="<?=$user['Status']?>" id="Status">
                <input type="submit" value="Update">
            </div>
        </form>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>