<?php

class Master extends SQLite3
{
	public $rootPage;
	public $cssFile;
	public $pageTitle;
	public $errorMessage;

	public function __construct()
	{
		$this->open("order.db");
	}

	public function getCSS()
	{
		$html = "<link rel='stylesheet' type='text/css' href='{$this->cssFile}'/>";
		return $html;
	}

	public function getForm()
	{
		$html = "<form class='form' method='post' action='./index.php?p=order&submit'><label>No Bilik</label><br/><input type='text' name='room'/><br/><label>Quantity</label><br/><input type='number' name='quantity'/><br/><input type='submit' class='btn' value='PESAN'/></form>";
		echo $html;
	}

	public function getHeader()
	{
		$html = "<div class='header title-header'>{$this->pageTitle}</div>";
		return $html;
	}

	public function orderAdd($room, $quantity)
	{
		$sql = "INSERT INTO pesanan (id, room, quantity) VALUES(NULL, '$room', '$quantity');";
		$res = $this->query($sql);
		return $res;
	}

	public function showTableData()
	{
		$sql = "SELECT * FROM pesanan ORDER BY id DESC;";
		$res = $this->query($sql);
		$i = 1;
		while($row = $res->fetchArray())
		{
			echo "<tr><td align='center'>" .$i. "</td><td>" .$row['room']. "</td><td align='center'>" .$row['quantity']. "</td></tr>";
			$i++;
		}
	}

	public function redirect($url)
	{
		header("location: $url");
	}

	public function error($msg)
	{
		$html = "<div class='alert'>{$msg}</div>";
		$this->errorMessage = $html;
	}

	public function showErrorLog()
	{
		return $this->errorMessage;
	}

	public function page()
	{
		if(isset($_GET['p']))
		{
			$file = $_GET['p'] .".php";
			if(file_exists($file))
			{
				include($file);
			}
			else
			{
				echo "<div class='subcontent'><div class='alert'>Halaman tidak dijumpai!</div></div>";
			}
		}
		else
		{
			include($this->rootPage);
		}
	}
}

?>