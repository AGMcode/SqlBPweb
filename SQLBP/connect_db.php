<?php
include_once "header.php";
?>
<head>
    <title>SqlBP: ConnectDB</title>
</head>
<body>
    <main>
        <form action="connect_db.inc.php" method="post">
            <h2>Connect</h2>
            <label for="usernamedb">Username:</label>       <input type="text" id="usernamedb" name="usernamedb" required>
            <label for="serveripdb">Servername/IP:</label>  <input type="text" id="serveripdb" name="serveripdb" required>
            <label for="namedb">Database name:</label>      <input type="text" id="namedb" name="namedb" >
            <label for="passworddb">Password:</label>       <input type="password" id="passworddb" name="passworddb" required>
            <button id="button_green" type="submit">Create Connection</button>
            <div></div>
        </form>
        <?php 
        if (isset($_GET["error"])) {
           if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill all the fields!</p>";
           }else if ($_GET["error"] == "none") {
            echo "<p>Connection Created!</p>";
           }
        }
        ?>
    </main>
</body>
<?php
include_once "footer.php";
?>