<?php
require_once '../connect.php';
require_once '../Classes/option.class.php';
options::send();
header('Location: ../db.php');
?>/