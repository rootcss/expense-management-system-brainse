<?php
/*
 *@ <brainse.info>
 *@copyright © Brainse.
 *@version 2.0
 *@category Expense manager <HRM Brainse ©>
 **/
//error_reporting(0);
if(isset($_POST['month']) && $_POST['month'] != '')
{
	$m=$_POST['month'];
	mysql_connect('localhost','root','password'); //Fetches Username and Password for Authentication from @link authen.php
	mysql_select_db('expenses');
	$query = mysql_query("SELECT `total`,`title` FROM `unofficial` WHERE `date` BETWEEN '2013-".$m."-01' AND '2013-".$m."-31'");
	// this selects values in total and title from unofficial table
	$i=0;
	while($fetch = mysql_fetch_array($query)) // puts all the selected values from query in fetch varibles.
	{
		$data[$fetch['title']]=$fetch['total'];// in this array total values are getting stored with thier respective title.
		$i++;
	}	
	if($i > 0)	
	{	include_once('phpMyGraph5.0.php');  
		header("Content-type: image/png");		
		$cfg['width'] = 1000;    // this cfg function is used to modify the look of graph.
		$cfg['height'] = 450;
		$cfg['key-font-size']=6;
		$cfg['column-color-random']=1;
		$cfg['key-font-size']=6;
		$cfg['title-color']='#754719';
		$cfg['key-color']='#OOOOOO';
		$graph = new phpMyGraph();
		$graph-> parseVerticalColumnGraph($data,$cfg);	
	}
	else
	{
		echo"<script>alert('The month you have selected has no entry.')</script>";
		echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=graph_monthly.php">';
	}
}	
else
{
	echo'
	<center>
	<form action="" method=POST>
	Select Month : <select name="month">	
	<option value="01">Jan</option>
	<option value="02">Feb</option>
	<option value="03">Mar</option>
	<option value="04">Apr</option>
	<option value="05">May</option>
	<option value="06">Jun</option>
	<option value="07">Jul</option>
	<option value="08">Aug</option>
	<option value="09">Sep</option>
	<option value="10">Oct</option>
	<option value="11">Nov</option>	
	<option value="12">Dec</option>
</select>
<input type="submit" value="Submit">
</form></center>
';
}
?>
