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

// Retrieve and display database names
$sql = "SHOW DATABASES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div id=\"database-list\"><table><th>Database</th>";
    $i = 0;
    while ($row = $result->fetch_row()) {
        $database_name = $row[0];
        if ($i % 1 == 0) {
            echo "<tr>";
        }
        echo "<td><a href=\"?database=$database_name\">$database_name</a></td>";
        $i++;
        if ($i % 1 == 0) {
            echo "</tr>";
        }
    }
    if ($i % 1 != 0) {
        echo "</tr>";
    }
    echo "</table></div>";
} else {
    echo "0 results";
}

$conn->close();
?>
