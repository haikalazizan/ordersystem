<?php include("header.php"); ?>
<?php

$master = new Master();
$master->rootPage = "main.php";
$master->cssFile = "hklazizan.css";
$master->pageTitle = "SISTEM PESANAN ONLINE";

?>
<html>
<head>
	<title>Order System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<?php echo $master->getCSS(); ?>
</head>
<body>
<?php echo $master->getHeader(); ?>
<div id="container">
	<?php

		$master->page();

	?>
</div>
</body>
</html>