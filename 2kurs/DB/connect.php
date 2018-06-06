<?php
include 'Config/config.inc.php';
require 'Classes/connection.class.php';
Connection::$user=$username;
Connection::$pass=$password;
Connection::$host=$hosting;
Connection::$dbname=$DataBaseName;
?>