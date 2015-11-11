<!--
/*
 *@ <brainse.info>
 *@copyright © Brainse.
 *@version 2.0
 *@category Expense manager <HRM Brainse ©>
 **/
 -->
<script language="JavaScript">
var gAutoPrint = true; // Flag for whether or not to automatically call the print function
function printSpecial()
{	if (document.getElementById != null)
	{	var html = '<HTML>\n<HEAD>\n';
		if (document.getElementsByTagName != null)
		{
			var headTags = document.getElementsByTagName("head");
			if (headTags.length > 0)
				html += headTags[0].innerHTML;
		}
		html += '\n</HE' + 'AD>\n<BODY>\n';
		var printReadyElem = document.getElementById("printReady");		
		if (printReadyElem != null)
		{
				html += printReadyElem.innerHTML;
		}
		else
		{
			alert("Could not find the printReady section in the HTML");
			return;
		}			
		html += '\n</BO' + 'DY>\n</HT' + 'ML>';		
		var printWin = window.open("","printSpecial");
		printWin.document.open();
		printWin.document.write(html);
		printWin.document.close();
		if (gAutoPrint)
			printWin.print();
	}
	else
	{
		alert("Sorry, the print ready feature is only available in modern browsers.");
	}
}
</script>
<style>
table{border-collapse:collapse;table-layout:fixed;}
td{padding:2px 4px;height:5px;overflow:hidden;font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color: #474747;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	/*text-align: left;*/
	padding: 6px 1px 6px 12px;
	background: #e6e6e6;}
#spec td {	
	border-left: 1px solid #C1DAD7;
	background: #f5fafa;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
}
</style>
<center>
<form action="" method="POST">
Select Table : <select name=table                             <!--selects the type of list ie., official and unofficial-->
<option value="official">official</option>
<option value="unofficial">unofficial</option>
</select>
<input type=submit>
</form>
</center>
<?php
	if(isset($_POST['table']) && $_POST['table'] != '') 
	{
	$table=$_POST['table'];
	include('authen.php');  //Fetches Username and Password for Authentication from @link authen.php
	mysql_select_db('expenses');	
	$y=0;
	$res = mysql_query("SELECT total FROM `$table`"); // calculates the whole total of all expenses
	while( ($fetch=mysql_fetch_array($res)) )
		$y=$y+$fetch['total'];		
	$result= mysql_query("SELECT * FROM `$table` ORDER BY code DESC");  //selects all the records of the table
	
	echo'<div align="right"><form id="printMe" name="printMe"><INPUT onclick=printSpecial() type="image" src="print.gif" alt="Submit" name=printMe ></form></div><div id="printReady" style="font-family:arial;font-size=3px;">';
	$i=1;
	echo "<center><table border=1 cellspacing=15 rules=all>";
	echo"<tr id='spec' style='font-weight:bold;'><td>S.No.</td><td width=90px>Date</td><td>Title</td><td>Details</td><td>Paid To</td><td>Rate</td><td>Quantity</td><td>Total</td></tr>";
	while(($fetch=mysql_fetch_array($result)))// displays all the values of selected list
	{
		echo "<tr><td>".$i."</td>";
		echo "<td>".$fetch['date']."</td>"; // this statement dislays all the values in date column
		echo "<td>".$fetch['title']."</td>";
		echo "<td>".$fetch['details']."</td>";
		echo "<td>".$fetch['paidto']."</td>";
		echo "<td>".$fetch['rate']."</td>";
		echo "<td>".$fetch['quantity']."</td>";
		echo "<td>".$fetch['total']."</td></tr>";
		$i++;		
	}
	echo"<tr align=right><td colspan=8>Total : ".$y."</td></tr>";
	echo"</table></center>";
	echo"</div>";
	}
?>
