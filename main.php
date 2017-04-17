<?php

$master = new Master();
?>

<div class="subcontent">
	<ul class="list">
		<li><a href="./index.php?p=order">BUAT PESANAN</a></li>
	</ul>
</div>
<div class="subcontent">
	<table class="table">
		<tr>
			<th>#</th>
			<th class="text-left">Bilik</th>
			<th>Kuantiti</th>
		</tr>
		<?php
			$master->showTableData();
		?>
	</table>
</div>