<?php
/*
 *@ <brainse.info>
 *@copyright © Brainse.
 *@version 2.0
 *@category Expense manager <HRM Brainse ©>
 **/
include('authen.php'); //Fetches Username and Password for Authentication from @link authen.php
mysql_select_db('expenses');
$y=array(0,0,0,0,0,0,0,0,0,0,0,0);// all values in this array has been assigned 0 so that if any null values arises then it will be saved as 0. 
for($i=1;$i<13;$i++) // this loop is being used to change the value of month in date. 
{
	$query[$i]="SELECT total FROM `unofficial` WHERE `date` BETWEEN '2013-$i-01' AND '2013-$i-31'"; // selects total from unofficial
	$t[$i]=mysql_query($query[$i]);
	$y[$i]=0;
	while($x[$i]=mysql_fetch_array($t[$i]))
	{
		$v[$i]=$x[$i]['total'];// storing values of total per month in an array 
		$y[$i]=$y[$i]+$v[$i];	
	}
}
/* 
these set of statements forms the graph using phpMyGraph5.0.php API
*/
include_once('phpMyGraph5.0.php');
header("Content-type: image/png");		
$cfg['title'] = 'ExPENSES';
$cfg['width'] = 900;
$cfg['height'] = 550;
$cfg['column-color-random'] = 1;
$cfg['jpg-quality'] = 600;
$cfg['title-font-size']=6;
$cfg['title-color']='#754719';
$cfg['key-color']='#OOOOOO';
$cfg['key-font-size']=6;
$data = array // forms the graph showing total according to its month 
(
	'JAN'=>$y[1],
	'FEB'=>$y[2],
	'MAR'=>$y[3],
	'APR'=>$y[4],
	'MAY'=>$y[5],
	'JUN'=>$y[6],
	'JULY'=>$y[7],
	'AUG'=>$y[8],
	'SEP'=>$y[9],
	'OCT'=>$y[10],
	'NOV'=>$y[11],
	'DEC'=>$y[12],
);
$graph = new phpMyGraph();
$graph->parseVerticalColumnGraph($data,$cfg);	
?>