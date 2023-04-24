<?php
include_once "header.php";
?>
<head>
    <title>SqlBP: ConnectDB</title>
</head>
<body>
    <main>
        <form action="../PHP/connect_db.php" method="post">
            <h2>Connect</h2>
            <label for="username">Username:</label>     <input type="text" id="username" name="username" required>
            <label for="servername">Servername/IP:</label> <input type="text" id="servername" name="servername" required>
            <label for="dbname">Database name:</label>   <input type="text" id="dbname" name="dbname" >
            <label for="password">Password:</label>     <input type="password" id="password" name="password" required>
            <button id="button_green" type="submit">Create Connection</button>
        </form>
    </main>
</body>
<?php
include_once "footer.php";
?>