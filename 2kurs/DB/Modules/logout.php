<?php
session_start();
session_destroy();
header("Location: ../Forms/enter.form.php");
?>