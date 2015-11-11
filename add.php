<html>
<!--
 *@ <brainse.info>
 *@copyright © Brainse.
 *@version 2.0
 *@category Expense manager <HRM Brainse ©>
 -->
<style type="text/css">
table{border:0px solid black;}
td{padding:2px;height:5px;overflow:hidden;font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
	sans-serif;
	color:#474747;
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	border-top: 1px solid #C1DAD7;
	letter-spacing: 2px;
	text-transform: uppercase;
	text-align: left;
	padding: 6px 6px 6px 12px;
	background: #E6E6E6;}
</style>
<body bgcolor="#FAFAF8">
	<form action="" method="POST"><center> 			<!-- POST Method on the Same Page.-->
	<table border=0 cellpadding=7>
	<tr><td colspan=2><center><font size=6>ADD A NEW EXPENSE</font></center></td></tr>
	<tr>
		<td colspan=2><center><input type="radio" value="official" name="table" checked> OFFICIAL	<!--For Official Expenses-->
			<input type="radio" value="unofficial" name="table" >UNOFFICIAL</center>	<!--For Unofficial Expenses Which includes Offical Expenses too-->
		</td>
	</tr>
	<tr><td colspan=2> <?php include('date.php'); ?> </td></tr>					<!--Include Date DropDown-->
	<tr><td>TITLE:</td><td><input type="text" name="title"></td></tr>
	<tr><td>DETAILS: </td><td><textarea rows=3 cols=25 name="details"></textarea></td></tr>		<!--Textarea have default width height , can be changed.-->
	<tr><td>PAID TO:</td><td><input type="text" name="paidto"></td></tr>
	<tr><td>RATE:</td><td><input type="text" name="rate"></td></tr>
	<tr><td>QUANTITY:</td><td><input type="text" name="quantity"></td></tr>
	<tr><td>TOTAL:</td><td><input type="text" name="total"></td></tr>
	<tr><td colspan=2><center><input type="submit" value="SUBMIT"><input type="reset" value="RESET"></center></td></tr>
	</table></form></center>
</body></html>
<?php
/**
  *Global variable declaration
  *@global integer
  *@name $table,$dd,$mm,$yy,$date,$details,$title,$details,$paidto,$rate,$quantity,$total
  */
if( isset($_POST["dd"]) && $_POST["dd"] !='' && isset($_POST["mm"]) && $_POST["mm"] !='' && isset($_POST["yy"]) && $_POST["yy"] !='' && isset($_POST["title"]) && $_POST["title"] !='' && isset($_POST["details"]) && $_POST["details"] !='' && isset($_POST["paidto"]) && $_POST["paidto"] !='' && isset($_POST["rate"]) && $_POST["rate"] !='' && isset($_POST["quantity"]) && $_POST["quantity"] !='' && isset($_POST["total"]) && $_POST["total"] !='') //if the id values are not NULL
{
	/**
     *@global integer
     *Storing Fetched Value by POST Method -> in Global Variables
    */
	$table=$_POST["table"];
	$dd=$_POST["dd"];
	$mm=$_POST["mm"];
	$yy=$_POST["yy"];
	$date=$yy."-".$mm."-".$dd;
	$title =htmlentities($_POST["title"]);
	$details=htmlentities($_POST["details"]);
	$paidto=htmlentities($_POST["paidto"]);
	$rate=htmlentities($_POST["rate"]);
	$quantity=htmlentities($_POST["quantity"]);
	$total=htmlentities($_POST["total"]);
	$code=1;						//@name $code
	include('authen.php');			// Fetches Username and Password for Authentication from @link authen.php
	mysql_select_db('expenses');	
	if($table == "official")		// Checkes If Radio Button Selected has value @official then INSERT into official and if code==1 then add to unofficial table also.
	{
		$code = time();				// Time Stamp @future -> Useful for Graphs & Timelines.
               /**
                 * @sql query to INSERT  into table_name=official
                 * with fields = @global variables
                 * with value = @assigned values
                 */
		$query= "INSERT INTO `$table`  (`code`,`date`,`title`,`details`,`paidto`,`rate`,`quantity`,`total`) VALUES ('$code','$date','$title','$details','$paidto','$rate','$quantity','$total')";
		mysql_query($query);		// It fetches the recordset automatically
	}
	if($code == 1)
		$code = time();// Time Stamp @future -> Useful for Graphs & Timelines.
		/**
                 * @sql query to INSERT  into table_name=unofficial and official
                 * with fields = @global variables
                 * with value = @assigned values
                 */
	$query= "INSERT INTO `unofficial`  (`code`,`date`,`title`,`details`,`paidto`,`rate`,`quantity`,`total`) VALUES ('$code','$date','$title','$details','$paidto','$rate','$quantity','$total')";
	mysql_query($query);
				/**
                 * @java script to create alert box and print Entered Details.
                 */
	echo'<script>alert("Expense successfully added..!!\nDate : '.$date.'\nTitle : '.$title.'\nDetails : '.$details.'\nPaid To : '.$paidto.'\nRate : '.$rate.'\nQuantity : '.$quantity.'\nTotal : '.$total.'\n\n\nNote : Official Expenses will be added into Unofficial Expenses also.") </script>';
	echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=add.php">';		//Redirects Refreshes 
}
?>