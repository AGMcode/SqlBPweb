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
            <label for="username">Email:</label>         <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>     <input type="password" id="password" name="password" required>
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