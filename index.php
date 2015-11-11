<!--
*@ <brainse.info>
 *@copyright © Brainse.
 *@version 2.0
 *@category Expense manager <HRM Brainse ©>
 -->
<html>
<head>
<meta charset='UTF-8'>
<!-- CSS class for TABS used in HOME PAGE-->
<style>
.tabrow {
list-style: none;
margin: 30px 0 30px;
padding: 0;
line-height: 24px;
height: 26px;
overflow: hidden;
font-size: 15px;
font-family: verdana;
position: relative;
}
.tabrow li {
border: 1px solid #AAA;
background: #D1D1D1;
background: -o-linear-gradient(top, #ECECEC 50%, #D1D1D1 100%);
background: -ms-linear-gradient(top, #ECECEC 50%, #D1D1D1 100%);
background: -moz-linear-gradient(top, #ECECEC 50%, #D1D1D1 100%);
background: -webkit-linear-gradient(top, #ECECEC 50%, #D1D1D1 100%);
background: linear-gradient(top, #ECECEC 50%, #D1D1D1 100%);
display: inline-block;
position: relative;
z-index: 0;
border-top-left-radius: 6px;
border-top-right-radius: 6px;
box-shadow: 0 3px 3px rgba(0, 0, 0, 0.4), inset 0 1px 0 #FFF;
text-shadow: 0 1px #FFF;
margin: 0 -5px;
padding: 0 20px;
}
.tabrow a {
color: #555;
text-decoration: none;
}
.tabrow li.selected {
background: #FFF;
color: #333;
z-index: 2;
border-bottom-color: #FFF;
}
.tabrow:before {
position: absolute;
content: " ";
width: 100%;
bottom: 0;
left: 0;
border-bottom: 1px solid #AAA;
z-index: 1;
}
.tabrow li:before,
.tabrow li:after {
border: 1px solid #AAA;
position: absolute;
bottom: -1px;
width: 5px;
height: 5px;
content: " ";
}
.tabrow li:before {
left: -6px;
border-bottom-right-radius: 6px;
border-width: 0 1px 1px 0;
box-shadow: 2px 2px 0 #D1D1D1;
}
.tabrow li:after {
right: -6px;
border-bottom-left-radius: 6px;
border-width: 0 0 1px 1px;
box-shadow: -2px 2px 0 #D1D1D1;
}
.tabrow li.selected:before {
box-shadow: 2px 2px 0 #FFF;
}
.tabrow li.selected:after {
box-shadow: -2px 2px 0 #FFF;
}
iframe {
 -moz-border-radius: 12px;
  -webkit-border-radius: 12px; 
  border-radius: 12px; 

  -moz-box-shadow: 4px 4px 14px #000; 
  -webkit-box-shadow: 4px 4px 14px #000; 
  box-shadow: 4px 4px 14px #000;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>   <!--Source of JQUERY applied for the TABS in home page.-->

<script>
<!-- Function For the action of clicking in TABS.-->
$(function() {
$("li").click(function(e) {
$("li").removeClass("selected");
$(this).addClass("selected");
});
});
</script>		
</head>
<body>
<center>
<!--The home page menu-->
<ul class="tabrow">
	<a href="home.php" target="fr"><li class="selected">Home</li></a>
	<a href="add.php" target="fr"><li>Add Expenses</li></a>
	<a href="full_list_viewer.php" target="fr"><li>All Expenses Viewer</li></a>
	<a href="custom.php" target="fr"><li>Custom Expense Viewer</li></a>
	<a href="editor.php" target="fr"><li>Edit Expenses</li></a>
	<a href="graphs.php" target="fr"><li>Statistics</li></a>
	<a href="search.php" target="fr"><li>Search</li></a>
</ul>
<iframe width="1100" name="fr" src="home.php" height="520"></iframe>
<br>
<br>
<div class="container">
<font face=calibri>&copy; Copyright 2013 Brainse. All rights reserved.</font>
</div>
</form>
</center>
</body>
</html>