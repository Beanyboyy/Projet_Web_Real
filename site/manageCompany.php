<?php
include 'database.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our Company table, LIMIT will determine the page
$stmt = $pdo->prepare("SELECT * FROM company ORDER BY Company_ID LIMIT :current_page, :record_per_page");
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$Companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of Companies, this is so we can determine whether there should be a next and previous button
$num_Companies = $pdo->query("SELECT COUNT(*) FROM company")->fetchColumn();
?>

<!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Company</title>
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
	<div class="content read">
    <div class="back" <input type="submit" value="Back" onclick="window.location.href='menuAdmin.php'"><span>Back</span></div>
    <h2>COMPANIES LIST</h2>
	<a href="createCompany.php" class="create-into">Create Company</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Company_Name</td>
                <td>Business_Line</td>
                <td>Students_Amount</td>
                <td>Students_Score</td>
                <td>Pilot_Trust</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Companies as $Company): ?>
            <tr>
                <td><?=$Company['Company_ID']?></td>
                <td><?=$Company['Company_Name']?></td>
                <td><?=$Company['Business_Line']?></td>
                <td><?=$Company['Students_Amount']?></td>
                <td><?=$Company['Students_Score']?></td>
                <td><?=$Company['Pilot_Trust']?></td>
                <td class="actions">
                    <a href="updateCompany.php?Company_ID=<?=$Company['Company_ID']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="deleteCompany.php?Company_ID=<?=$Company['Company_ID']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="manageCompany.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_Companies): ?>
		<a href="manageCompany.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>
</main>
<?=template_footer()?>