<?php
$master = new Master();

if(isset($_GET['submit']))
{
	$room = $_POST['room'];
	$quantity = $_POST['quantity'];

	$process = $master->orderAdd($room, $quantity);
	if($process)
	{
		$master->redirect("index.php");
	}
	else
	{
		$master->error("Tidak dapat berkomunikasi dengan pangkalan data. Sila cuba lagi!");
	}
}

?>
<div class='subcontent'>
<h2 class='title'>BORANG PESANAN</h2>
<?php

if(isset($_GET['submit']))
{
	echo $master->showErrorLog();
}

$master->getForm();

?>
</div>