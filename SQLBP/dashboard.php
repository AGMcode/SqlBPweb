<?php
include_once "header.php";
?>

<head>
    <title>SqlBP: Dashboard</title>
</head>

<body>
    <main class="main-content">
        <nav>
            <?php
            include_once "get_tablesList.php";
            ?>
        </nav>
        
        <div class="content"> 
            <?php
            include_once "get_tableContent.php";
            ?>
        </div>   

      <!--  <div class="builder">
            <?php
            include_once "builder.php";
            ?>
        </div> -->
    </main>
</body>

<?php
include_once "footer.php";
?>