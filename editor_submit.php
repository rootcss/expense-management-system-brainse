<!--
/*
 *@<brainse.info>
 *@copyright © Brainse.
 *@version 2.0
 *@category Expense manager <HRM Brainse ©>
 **/
 -->
<style type="text/css">
table{border:1px solid black;}
td{padding:2px;height:5px;overflow:hidden;font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color: #474747;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #e6e6e6;}
#spec td {	
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
}
</style>
<body bgcolor="#FAFAF8">
<?php
	if(isset($_POST['edit'])) //this loop 
	{
		$edit = $_POST['edit'];		//passing the combination of code & table name through hidden field
		$arr = explode('|',$edit);
		$table = $arr[1];
		$code = $arr[0];
		include('authen.php'); //Fetches Username and Password for Authentication from @link authen.php
		mysql_select_db('expenses');
		$result= mysql_query("SELECT * FROM `$table` WHERE code='".$code."'");
		echo "<center><table border=1>";
		echo"<tr><td colspan=8><center>Details Of Previous Entry</center></td></tr>";
		echo"<tr id='spec'><td>Date</td><td>Title</td><td>Details</td><td>Paid To</td><td>Rate</td><td>Quantity</td><td>Total</td></tr>";
		while( ($fetch=mysql_fetch_array($result)) ) // storing all the values of query in variable fetch.
		{
			echo "<tr>";
			echo "<td>".$fetch['date']."</td>";	
			echo "<td>".$fetch['title']."</td>";
			echo "<td>".$fetch['details']."</td>";
			echo "<td>".$fetch['paidto']."</td>";
			echo "<td>".$fetch['rate']."</td>";
			echo "<td>".$fetch['quantity']."</td>";
			echo "<td>".$fetch['total']."</td></tr>";
			echo"</table></center>";
			echo'<form action="after_edit.php" method="POST"><center>
			<table border=0 cellpadding=7>
			<tr><td colspan=2><center><font size=6>EXPENSE EDITOR</font></center></td></tr>
			<tr><td colspan=2>
				<input type="hidden" name="code" value="'.$fetch['code'].'">
				<center><input type="radio" value="official" name="table" checked> OFFICIAL
				<input type="radio" value="unofficial" name="table" >UNOFFICIAL</center></td>
			</tr>
			<tr><td colspan=2>'; include('date.php'); echo'</td></tr>'; //includes file date.php which contains DropDown Box For Date Month Year
			echo'<tr><td>TITLE:</td><td><input type="text" name="title" value="'.$fetch["title"].'"></td></tr>
			<tr><td>DETAILS: </td><td><textarea rows=3 cols=25 name="details">'.$fetch["details"].'</textarea></td></tr>
			<tr><td>PAID TO:</td><td><input type="text" name="paidto" value="'.$fetch["paidto"].'"></td></tr>
			<tr><td>RATE:</td><td><input type="text" name="rate" value="'.$fetch["rate"].'"></td></tr>
			<tr><td>QUANTITY:</td><td><input type="text" name="quantity" value="'.$fetch["quantity"].'"></td></tr>
			<tr><td>TOTAL:</td><td><input type="text" name="total" value="'.$fetch["total"].'"></td></tr>
			<tr><td colspan=2><center><input type="submit" value="SUBMIT"><input type="reset" value="RESET"></center></td></tr>
			</table></form></center>';
}
}	
?>
</body>
