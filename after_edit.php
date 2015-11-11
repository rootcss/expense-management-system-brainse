<?php
/*
 *@ <brainse.info>
 *@copyright © Brainse.
 *@category Expense manager <HRM Brainse ©>
 */
if( isset($_POST["dd"]) && $_POST["dd"] !='' && isset($_POST["mm"]) && $_POST["mm"] !='' && isset($_POST["yy"]) && $_POST["yy"] !='' && isset($_POST["title"]) && $_POST["title"] !='' && isset($_POST["details"]) && $_POST["details"] !='' && isset($_POST["paidto"]) && $_POST["paidto"] !='' && isset($_POST["rate"]) && $_POST["rate"] !='' && isset($_POST["quantity"]) && $_POST["quantity"] !='' && isset($_POST["total"]) && $_POST["total"] !='' && isset($_POST["code"]) && $_POST["code"] !='')
{	
	/*
     *after_edit.php will show the edited Records.
     **/
	 
	$code = $_POST["code"];
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
	include('authen.php');					// Connect To Database by checking username and password
	mysql_select_db('expenses');	
	if($table == "official")				//Delete The Record from Official.
	{		
		$del=mysql_query("DELETE FROM `official` WHERE code=".$code."");		
		$query= "INSERT INTO `$table`  (`code`,`date`,`title`,`details`,`paidto`,`rate`,`quantity`,`total`) VALUES ('$code','$date','$title','$details','$paidto','$rate','$quantity','$total')";
		mysql_query($query);
	}
	//Delete the Record From Unoficial Table.
	$del=mysql_query("DELETE FROM `unofficial` WHERE code=".$code."");	
	$query= "INSERT INTO `unofficial`  (`code`,`date`,`title`,`details`,`paidto`,`rate`,`quantity`,`total`) VALUES ('$code','$date','$title','$details','$paidto','$rate','$quantity','$total')";
	mysql_query($query);
	echo'<script>alert("Expense successfully edited..!!\nDate : '.$date.'\nTitle : '.$title.'\nDetails : '.$details.'\nPaid To : '.$paidto.'\nRate : '.$rate.'\nQuantity : '.$quantity.'\nTotal : '.$total.'\n\n\nNote : Official Expenses will be added into Unofficial Expenses also.") </script>';
	echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=editor.php">';
}
else
	echo"hiii";

?>