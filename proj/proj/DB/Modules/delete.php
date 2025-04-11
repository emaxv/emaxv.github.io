<?php
require_once '../connect.php';
require_once '../Classes/option.class.php';
options::delete();
header('Location: ../db.php');
?>