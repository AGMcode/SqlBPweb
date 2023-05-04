<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h1>SQL Builder</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php 
                if (isset($_SESSION["userid"])) {
                    echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                    echo "<li><a href='connect_db.php'>ConnectDB</a></li>";
                    echo "<li><a href='userarea.php'>".$_SESSION["username"]."</a></li>";      
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }else {
                    echo "<li><a href='Register.php'>Register</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>