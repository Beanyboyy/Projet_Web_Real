<?php
include '../database.php';
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href= "../adminMenu.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    </head>
    <body>
        <header>
        <nav>
         <div class="left">
            <a href="../index.php"><img src="../Logo.png" alt="logo" width="200px"></a>
        </div>
        <div class="header-right">
        <button type="button" class="button" <input type="submit" onclick="window.location.href='../index.php'">
          <span style="font-size: small;">Disconnect</span>
        </button>
        </div>
        </nav>
</header>
<main>
    <div class="about">
    <p>StageFinder is an ambitious  and successful corporation, who started recently. 
        Our goal is mainly to help and support students, all over Cesi, to search and find the corresponding internship. 
        With our close relationships with the firms, we assure you to have the best experience with our contacts. 
        If you want to be part of this experiment, ask your pilot about it !
    </div>
</p> 


<footer id="footer">
<div class="footer-basic">
    <ul class="list-inline">
    <li class="list-inline-item"><a href="about.php">About</a></li>
    <li class="list-inline-item"><a href="privacy.php">Privacy policy</a></li>
    <li class="list-inline-item"><a href="terms.php">Terms</a></li>
    </ul>
    <p class="copyright">StageFinder © 2022</p>
</div>
</footer>
</body>
</html>