<?php
include '../database.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our users table, LIMIT will determine the page
$stmt = $pdo->prepare("SELECT * FROM offer ORDER BY Offer_ID LIMIT :current_page, :record_per_page");
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$Offers = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of users, this is so we can determine whether there should be a next and previous button
$num_offers = $pdo->query('SELECT COUNT(*) FROM offer')->fetchColumn();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Offers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">                                                                                                 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">   
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
        <link rel="stylesheet" href="../adminMenu.css">
    </head>
    <body>
        <header>
            <nav>
            <div class="left">
            <a href="menuStudent.php"><img src="../Logo.png" alt="logo" width="200px"></a>
            </div>
            <div class="header-right">
            <button type="button" class="button" <input type="submit" onclick="window.location.href='../index.php'">
              <span style="font-size: small;">Disconnect</span>
            </button>
            </div>
            </nav>
        </header>

        <main>
        <div class="content read">
            <div class="back" <input type="submit" value="Back" onclick="window.location.href='menuStudent.php'"><span>Back</span></div>
                <h2>OFFERS LIST</h2>
                <table>
                    <thead>
                        <tr>
                        <td>#</td>
                            <td>Offer_Title</td>
                            <td>Abilities</td>
                            <td>Internship_Duration</td>
                            <td>Base_Remuneration</td>
                            <td>Offer_Date</td>
                            <td>Number_Of_Places</td>
                            <td>Company_Email</td>
                            <td></td>                                        
                        </tr>
                    </thead>

                     <tbody>
                        <?php foreach ($Offers as $Offer): ?>
                        <tr>
                            <td><?=$Offer['Offer_ID']?></td>
                            <td><?=$Offer['Offer_Title']?></td>
                            <td><?=$Offer['Abilities']?></td>
                            <td><?=$Offer['Internship_Duration']?></td>
                            <td><?=$Offer['Base_Remuneration']?></td>
                            <td><?=$Offer['Offer_Date']?></td>
                            <td><?=$Offer['Number_Of_Places']?></td>
                            <td><?=$Offer['Company_Email']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="pagination">
                    <?php if ($page > 1): ?>
                    <a href="viewOffer.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                    <?php endif; ?>
                    <?php if ($page*$records_per_page < $num_offers): ?>
                    <a href="viewOffer.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
                    <?php endif; ?>
                </div>
            
        </div>
        </main>