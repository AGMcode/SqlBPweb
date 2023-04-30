<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputResgister($username, $email, $password, $confirm_password) !== false) {
        header("location: register.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: register.php?error=invalidusername");
        exit();
    }
    if (userExists($conn, $username, $email) !== false) {
        header("location: register.php?error=alreadyexistsusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: register.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password, $confirm_password) !== false) {
        header("location: register.php?error=passwordsdontmatch");
        exit();
    }
    else{
    createUser($conn, $username, $email, $username, $password);
    header("location: register.php?error=none");
}
}
?>