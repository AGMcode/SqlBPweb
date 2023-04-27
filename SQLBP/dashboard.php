<?php
include_once "header.php";
?>

<head>
    <title>SqlBP: Dashboard</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- send AJAX request to PHP script -->

<body>
    <main class="main-content">
        <nav>
            <?php
            include_once "get_tablesList.php";
            ?>
        </nav>
        
        <div class="content"></div>
        <?php
            include_once "get_tableContent.php";
            ?>
    </main>
</body>

<?php
include_once "footer.php";
?>