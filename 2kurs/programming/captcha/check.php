<?php 
header("Access-Control-Allow-Origin: *");
if($_COOKIE['cap']===$_GET["N"]) { echo '<font>&#1042;&#1077;&#1088;&#1085;&#1086;</font>'; }
else {echo '<font>&#1053;&#1077; &#1074;&#1077;&#1088;&#1085;&#1086;</font>'; }
?>