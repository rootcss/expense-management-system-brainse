<body bgcolor="#FAFAF8">
<center>
<form action="" method="POST">
Query : <input type=text name=search required>
  Search in : <select name=table>
<option value="official">official</option>
 <option value="unofficial">unofficial</option>
</select>
<input type=submit value=Search>
</form>
</center>
<style>
td{padding:2px;height:5px;overflow:hidden;font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color: #6D929B;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #CAE8EA url(images/bg_header.jpg) no-repeat;}
#spec td {	
	border-left: 1px solid #C1DAD7;
	border-top: 0;
	background: #f5fafa;
	font: bold 10px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
}</style>
<?php
if(isset($_POST['search']) && $_POST['search'] != "")
{
	$search = htmlentities($_POST['search']); 
	$table = $_POST['table'];
	//$search=str_replace('>','',$search);
	//$search=str_replace('<','',$search);
	echo"<font face=calibri size=4>Showing results for : $search<br>Table : $table</font>";
	include('authen.php');
	mysql_select_db('expenses');
	$query="SELECT * FROM `$table` WHERE `details` LIKE '%".$search."%' OR `title` LIKE '%".$search."%' OR `date` LIKE '%".$search."%' OR `paidto` LIKE '%".$search."%' OR `total` LIKE '%".$search."%'";	
	
	$res = mysql_query($query);	
	
	echo "<center><table border=1>";
	echo"<tr id='spec'><td>Date</td><td>Title</td><td>Details</td><td>Paid To</td><td>Rate</td><td>Quantity</td><td>Total</td></tr>";
	while(($fetch=mysql_fetch_array($res)))
	{
	echo "<tr>";
	echo "<td>".$fetch['date']."</td>";
	echo "<td>".$fetch['title']."</td>";
	echo "<td>".$fetch['details']."</td>";
	echo "<td>".$fetch['paidto']."</td>";
	echo "<td>".$fetch['rate']."</td>";
	echo "<td>".$fetch['quantity']."</td>";
	echo "<td>".$fetch['total']."</td></tr>";
	}
	echo"</table></center>";
}
?>
</body>
