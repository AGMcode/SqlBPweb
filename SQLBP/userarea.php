<?php
include_once "header.php";
?>

<head>
    <title>SqlBP: User Area</title>
</head>

<body>
    <main>
        <?php
            echo "<H1>Hello ". $_SESSION["username"] ."</h1>";
        ?>
    </main>
</body>

<?php
include_once "footer.php";
?>