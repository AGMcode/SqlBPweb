<?php 

function emptyInputResgister($username, $email, $password, $confirm_password) {
    if(empty($username) ||empty($email) || empty($password) || empty($confirm_password)){
        $result = true;
    }else {
        $result = false;
    }
    return $result; 
}

function invalidUsername($username) {
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else {
        $result = false;
    }
    return $result; 
}

function invalidEmail($email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else {
        $result = false;
    }
    return $result; 
}

function passwordMatch($password, $confirm_password) {
    if($password !== $confirm_password){
        $result = true;
    }else {
        $result = false;
    }
    return $result; 
}

function userExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss",  $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password) {
    $sql = "INSERT INTO users (usersUsername, usersEmail, usersPassword) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=createuserstmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss",  $username, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: resgister.php?error=none");
}

function emptyInputLogin($username, $password)  {
    if(empty($username) || empty($password)){
        $result = true;
    }else {
        $result = false;
    }
    return $result; 
}

function loginUser($conn, $username, $password){
    $userExists = userExists($conn, $username, $username);

    if ($userExists === false) {
        header("location: login.php?error=wronglogin"); 
        exit();
    }

    $hashedPassword = $userExists["usersPassword"];
    $checkPassword = password_verify($password, $hashedPassword);

    if ($checkPassword === false) {
        header("location: login.php?error=wronglogin"); 
        exit();
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["usersId"] = $userExists["usersId"];
        $_SESSION["usersUsername"] = $userExists["usersUsername"];
        header("location: dashboard.php"); 
        exit();
    }
}
?>