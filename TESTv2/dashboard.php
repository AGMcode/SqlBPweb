<?php
include_once "header.php";
?>

<head>
    <title>SqlBP: Dashboard</title>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- send AJAX request to PHP script -->
<script>
    $(document).ready(function() {
        // Parse the URL to get the parameter values
        var params = new URLSearchParams(window.location.search);
        var database = params.get('database');
        var table = params.get('table');
        
        // Send the AJAX request with the parameters
        $.ajax({
            url: "../PHP/get_content.php",
            type: "GET",
            data: {
                database: database,
                table: table
            },
            success: function(response) {
                $('.content').html(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
</script>

<body>
    <main class="main-content">
        <?php
        include_once "../PHP/get_tables.php";
        ?>
        <div class="content"></div>
    </main>
</body>

<?php
include_once "footer.php";
?>