<?php
function pdo_connect_mysql() {
    try {
    	return new PDO('mysql:host=localhost;dbname=project;charset=utf8','root','sudo');
        //protect against sql injections
        setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $exception) {
    	// database error message
    	exit('Failed to connect to database!');
    }
}

function template_footer() {
echo <<<EOT
<footer id="footer">
<div class="footer-basic">
    <ul class="list-inline">
    <li class="list-inline-item"><a href="footerPages/about.php">About</a></li>
    <li class="list-inline-item"><a href="footerPages/privacy.php">Privacy policy</a></li>
    <li class="list-inline-item"><a href="footerPages/terms.php">Terms</a></li>
    </ul>
    <p class="copyright">StageFinder © 2022</p>
</div>
</footer>
</body>
</html>
EOT;
}
?>