<?php
// Connect to the database
$servername = "192.168.1.69"; // replace with your XAMPP server IP address
$username = "SQLBP_ADMIN"; // replace with your database username
$password = "pass123"; // replace with your database password
$dbname = "sqlbp_test"; // replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a database parameter is set
if (isset($_GET['database'])) {
    $selected_database = $_GET['database'];
} else {
    $selected_database = $dbname;
}

// Check if a table parameter is set
if (isset($_GET['table'])) {
    $selected_table = $_GET['table'];
} else {
    $selected_table = null;
}

// Retrieve and display table names for the selected database
$sql = "SHOW TABLES IN $selected_database";
$result = $conn->query($sql);
$all = "All";
// Display the content found from query
if ($result->num_rows > 0) {
    echo  "Tables:<ul><li><a href=\"?database=$selected_database&table=\">$all</a></li>";
    while ($row = $result->fetch_assoc()) {
        foreach ($row as $value) {
            if ($selected_table == null) {
                echo "<li><a href=\"?database=$selected_database&table=$value\">$value</a></li>";
            } else if ($selected_table == $value) {
                echo "<li><strong>$value</strong></li>";
            } else {
                echo "<li><a href=\"?database=$selected_database&table=$value\">$value</a></li>";
            }
        }
    }
    echo "</ul>";
} else {
    echo "0 results";
}
$conn->close();
?>
