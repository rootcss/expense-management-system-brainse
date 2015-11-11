<!--
 *@ <brainse.info>
 *@copyright © Brainse.
 *@category Expense manager <HRM Brainse ©>
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
td{padding:2px;height:5px;overflow:hidden;font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color:#474747;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	/*text-align: right;*/
	padding: 6px 6px 6px 12px;
	background: #E6E6E6;}
#spec td {	
	border-left: 1px solid #C1DAD7;
	background: #f5fafa;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
}</style>
<body bgcolor="#FAFAF8">
<center>
<form action="" method="POST">		<!--Storing Fetched Value by POST Method-->
<div id="x">
<table border=0 cellpadding=7>
	<tr><td align="center" colspan=2><font size=5>CUSTOM VIEWER</font><br><br>
		Select Table : <select name="table">
		<option value=official>official</option>			<!--For Official Expenses-->
		<option value=unofficial>unofficial</option>		<!--For Unofficial Expenses Which includes Offical Expenses too-->
		</select>
		</td>
		</tr>
		<tr>				<!-- Selecting date from which date to which the date to be displayed-->
		<td align="center">
		<font size=4>FROM</td></font>
		<td align="center"><font size=4>TO</font></td></tr>
		<!--Include Date From and Date To DropDown-->
		<tr><td><?php include('datefrom.php'); ?> &nbsp; &nbsp; &nbsp;</td><td>&nbsp; &nbsp; &nbsp;<?php include('dateto.php'); ?></td></tr>
		<tr align="right"><td colspan=2><input type=submit></td></tr>
	
</table></div>	
</center><hr>
</body>
<?php
if(isset($_POST['table']) && $_POST['table'] != '')
{
$table=$_POST["table"];
$ddf=$_POST["ddf"];
$mmf=$_POST["mmf"];
$yyf=$_POST["yyf"];
$ddt=$_POST["ddt"];
$datef=$yyf."-".$mmf."-".$ddf;
$mmt=$_POST["mmt"];
$yyt=$_POST["yyt"];
$dateto=$yyt."-".$mmt."-".$ddt;
include('authen.php');					// Connect To Database by checking username and password
mysql_select_db('expenses');
$query = "SELECT * FROM `$table` WHERE date BETWEEN '$datef' AND '$dateto'";
$result=mysql_query($query);
$i=1;
echo'<div align="right"><form id="printMe" name="printMe"><INPUT onclick=printSpecial() type="image" src="print.gif" alt="Submit" name=printMe ></form></div><div id="printReady" style="font-family:arial;font-size=3px;">';
echo "<center><table border=1>";
	echo"<tr id='spec'><td>S.No.</td><td>Date</td><td>Title</td><td>Details</td><td>Paid To</td> <td>Rate</td><td>Quantity</td><td>Total</td></tr>";
	while( ($fetch=mysql_fetch_array($result)) )
	{									// Fetching All Contents Of The Table Selected From Selected Date To Selected Date
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$fetch['date']."</td>";
		echo "<td>".$fetch['title']."</td>";
		echo "<td>".$fetch['details']."</td>";
		echo "<td>".$fetch['paidto']."</td>";
		echo "<td>".$fetch['rate']."</td>";
		echo "<td>".$fetch['quantity']."</td>";
		echo "<td>".$fetch['total']."</td>";
		echo"</tr>";
		$i++;
	}
	echo"</table></center>";
	echo"</div>";
}
?>
