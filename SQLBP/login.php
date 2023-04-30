<?php
include_once "header.php";
?>
<head>
    <title>SqlBP: Login</title>
</head>
<body>
    <main>
        <form action="login.inc.php" method="post">
            <h2>Login</h2>
            <label for="usersId">Email:</label>         <input type="text" id="usersId" name="usersId" required>
            <label for="usersPassword">Password:</label>     <input type="password" id="usersPassword" name="usersPassword" required>
            <button id="button_green" type="submit" name="submit">Login</button>
        </form>
        <?php 
        if (isset($_GET["error"])) {
           if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill all the fields!</p>";
           }
           if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect Login!</p>";
           }
           else{
            
           }
        }
        ?>
    </main>
</body>
<?php
include_once "footer.php";
?>