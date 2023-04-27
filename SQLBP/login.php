<?php
include_once "header.php";
?>
<head>
    <title>SqlBP: Login</title>
</head>
<body>
    <main>
        <form action="../PHP/connect_db.php" method="post">
            <h2>Login</h2>
            <label for="username">Username:</label>     <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>     <input type="password" id="password" name="password" required>
            <button id="button_green" type="submit">Login</button>
        </form>
    </main>
</body>
<?php
include_once "footer.php";
?>