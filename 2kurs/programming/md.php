<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
echo json_encode(Array("md5"=>md5($_GET["key"]),"sha1"=>sha1($_GET["key"]))) ;
?>