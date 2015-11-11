<html>
<!--
 *@ <brainse.info>
 *@copyright © Brainse.
 *@category Expense manager <HRM Brainse ©>
 -->
 <body bgcolor="#FAFAF8">
<center>
<form action="" method="POST">                   <!-- A form for getting the name of table-->
Select Table : <select name=table>
<option value="official">official</option>			
<option value="unofficial">unofficial</option>
</select>
<input type=submit>
</form>
</center>
</body>
<style>     
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
}</style>
<?php
	if(isset($_POST['table']) && $_POST['table'] != '')		 
	{
	$table = $_POST['table'];		//Getting the name of table
	include('authen.php');			//Fetches username and password from the link @authen.php
	mysql_select_db('expenses');	//Selecting database expenses
	$result= mysql_query("SELECT * FROM `$table` ORDER BY code DESC");	//Selecting all rows from the above table selected and sorting it in descending order
	echo "<center><table border=1 cellpadding=4>"; $i=1;		//Creating a table for printing contents of above table selected
	echo"<tr id='spec'><td>S.No.</td><td>Date</td><td>Title</td><td>Details</td><td>Paid To</td> <td>Rate</td><td>Quantity</td><td>Total</td><td>Edit</td></tr>";
	while( ($fetch=mysql_fetch_array($result)) )		//Fetching the data from the table
	{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$fetch['date']."</td>";
		echo "<td>".$fetch['title']."</td>";
		echo "<td>".$fetch['details']."</td>";
		echo "<td>".$fetch['paidto']."</td>";
		echo "<td>".$fetch['rate']."</td>";
		echo "<td>".$fetch['quantity']."</td>";
		echo "<td>".$fetch['total']."</td>";
		$code_edit = $fetch['code']; $i++;
		echo"<td><form action='editor_submit.php' method=POST><input type=hidden name=edit value=".$code_edit."|".$table.">
		     <input type=submit value=edit></form></td></tr>";	
	}
	echo"</table></center>";
	}
?>
</html>