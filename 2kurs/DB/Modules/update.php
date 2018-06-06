<?php
require_once '../connect.php';
require_once '../Classes/option.class.php';
options::update();
header('Location: ../db.php');
?>