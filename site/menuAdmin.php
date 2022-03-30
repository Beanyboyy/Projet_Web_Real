<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link rel="stylesheet" href= "adminMenu.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
          <div class="all">
            <div class="student">
              <div class="b" <input type="submit" value="Manage Students" onclick="window.location.href='ManageStudent.php'"><span class="text-content">Manage Students</span></div>
            </div>   
          <div class="representant">
              <div class="c" <input type="submit" value="Manage Representants" onclick="window.location.href='ManageRepresentant.php'"><span class="text-content">Manage Representants</span></div>
            </div>
            <div class="pilot">
              <div class="d" <input type="submit" value="Manage Pilots" onclick="window.location.href='ManagePilot.php'"><span class="text-content">Manage Pilots</span></div>
            </div>
            <div class="company">
              <div class="e" <input type="submit" value="Manage Companies" onclick="window.location.href='ManageCompany.php'"><span class="text-content">Manage Companies</span></div>
            </div>
            <div class="offer">
              <div class="f" <input type="submit" value="Manage Offers" onclick="window.location.href='ManageOffer.php'"><span class="text-content">Manage Offers</span></div>
            </div>
            <div class="application">
              <div class="g" <input type="submit" value="Manage Applications" onclick="window.location.href='ManageApplication.php'"><span class="text-content">Manage Applications</span></div>
            </div>
          </div>
        </main>

<?=template_footer()?>