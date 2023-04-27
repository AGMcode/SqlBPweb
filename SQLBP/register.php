<?php
include_once "header.php";
?>
<head>
    <title>SqlBP: Register</title>
</head>

<body>
    <main>
        <form action="../PHP/connect_db.php" method="post">
            <h2>Register</h2>
            <label for="username">Username:</label>     <input type="text" id="username" name="username" required>
            <label for="email">Email:</label> <input type="text" id="email" name="email" required>
            <label for="password">Password:</label>     <input type="password" id="password" name="password" required>
            <label for="comfirm_password">Comfirm Password:</label>     <input type="comfirm_password" id="comfirm_password" name="comfirm_password" required>
            <button id="button_green" type="submit">Register</button>
        </form>
    </main>
</body>

<?php
include_once "footer.php";
?>