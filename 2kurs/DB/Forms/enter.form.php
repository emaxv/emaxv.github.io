<?php
session_start();
if(!empty($_SESSION['username']))
{
    header('Location: ../db.php');
}
?>
<html>
<head>
    <title>Enter</title>
    <meta name="author" content="Eryomenko Maksim">
    <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../JS/signin.js"></script>
</head>
<body>

<div class="container">

    <form class="form-signin">
        <input type="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-success btn-block" type="submit" id="submitbtn">Sign in</button>
        <a href="signup.form.php" class="btn btn-primary btn-block" role="button">Sign up</a>
    </form>

</div>

</body>
</html>