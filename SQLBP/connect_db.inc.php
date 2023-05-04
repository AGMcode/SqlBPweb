<?php

if (isset($_POST["submit"])) {
    $usernamedb = $_POST["usernamedb"];
    $serveripdb = $_POST["serveripdb"];
    $namedb = $_POST["namedb"];
    $passworddb = $_POST["passworddb"];
 
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createDbConnection($conn, $usernamedb, $serveripdb, $namedb, $passworddb);
    header("location: connect_db.php?error=none");
}
?>