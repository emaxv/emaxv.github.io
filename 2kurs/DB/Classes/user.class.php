<?php
class User
{
    public static function login()
    {
        session_start();
        $dbh = Connection::getInstance()->connect();
        if (isset($_POST['username']) && ($_POST['password'])) {
            $username = $_POST['username'];
            $password = filter_var($_POST['password'],FILTER_SANITIZE_NUMBER_INT);
            $stmt = $dbh->query("SELECT password FROM users WHERE username='$username'");
            $row = $stmt->fetch();
            if ($row['password']==$password) {
                echo "ok";
                $_SESSION['username'] = $username;
                header("Location: ../db.php");
            } else {
                echo "username or password does not exist.";
            }
        }
    }
    public static function signup()
    {
        $dbh = Connection::getInstance()->connect();
        if (isset($_POST['email']) && !isset($_POST['username'])) {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "invalid";
            } else {
                $stmt = $dbh->prepare("SELECT id FROM users WHERE email=:email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $stmt = $stmt->fetch();
                if ($stmt) {
                    echo "exist";
                } else {
                    echo "ok";
                }
            }
        }
        if (isset($_POST['username']) &&
            isset($_POST['email']) &&
            isset($_POST['password'])
        ) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = filter_var($_POST['password'],FILTER_SANITIZE_NUMBER_INT);
            $stmt = $dbh->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        }
    }
}