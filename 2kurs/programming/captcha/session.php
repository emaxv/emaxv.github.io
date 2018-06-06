<?php
session_start(); 
header("Access-Control-Allow-Origin: *");
if($_SESSION["cap"]==$_GET["N"]) { echo '<font>Верно</font>'; }
else {echo '<font>Не верно</font>'; }
?>