<?php
include_once "header.php";
?>
<head>
    <title>SqlBP: Register</title>
</head>

<body>
    <main>
        <form action="register.inc.php" method="post">
            <h2>Register</h2>
            <label for="username">Username:</label>                     <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>                           <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>                     <input type="password" id="password" name="password" required>
            <label for="comfirm_password">Comfirm Password:</label>     <input type="password" id="confirm_password" name="confirm_password" required>
            <button id="button_green" type="submit" name="submit">Register</button>
            <div></div>
        </form>
        <?php 
        if (isset($_GET["error"])) {
           if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill all the fields!</p>";
           } else if ($_GET["error"] == "invalidusername") {
            echo "<p>Invalid User!</p>";
           }else if ($_GET["error"] == "alreadyexistsusername") {
            echo "<p>User already exists!</p>";
           }else if ($_GET["error"] == "invalidemail") {
            echo "<p>Invalid Email!</p>";
           }else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords don't match!</p>";
           }else if ($_GET["error"] == "none") {
            echo "<p>Account Created!</p>";
           }
        }
        ?>
    </main>
</body>

<?php
include_once "footer.php";
?>