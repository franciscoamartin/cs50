<p>
    Welcome back, <strong><?= $username ?>!</strong> Your current deposit is <strong>$<?= number_format($cash, 2) ?></strong>
</p>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<div>
	</div>
	<div id="middle">
		<table class="table table-striped">
	    <thead>
	        <tr>
	            <th>Symbol</th>
	            <th>Name</th>
	            <th>Shares</th>
	            <th>Price</th>
	            <th>TOTAL</th>
	        </tr>
	    </thead>
	    <tbody>
	    <tr>
		<?php
			foreach ($positions as $position)
			{	  
				print("<tr>");
				print("<td>" . $position["symbol"] . "</td>");
				print("<td>" . $position["name"] . "</td>");
				print("<td>" . $position["shares"] . "</td>");
				print("<td>" . $position["price"] . "</td>");
				print("<td>" . $position["shares"] * $position["price"] . "</td>");
				print("</tr>");
			}
		?>	
	    </tr>
	    </tbody>
		</table>
	</div>
</div>