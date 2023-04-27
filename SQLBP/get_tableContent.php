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

$selected_database = $_GET["database"];
$selected_table = $_GET["table"];

// Build the SQL query
if (empty($selected_database)) {
    // Show all tables in the selected database
    $sql = "SHOW TABLES";
} else
if (empty($selected_table)) {
    // Show all tables in the selected database
    $sql = "SHOW TABLES";
} else {
    // Show the selected table
    $sql = "SELECT * FROM $selected_table";
}

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Generate the table header
echo "<table>";
echo "<thead><tr>";
while ($fieldinfo = mysqli_fetch_field($result)) {
    echo "<th>".$fieldinfo->name."<input type='checkbox' name='selected_columns[]' value='".$fieldinfo->name."'></th>";
}
echo "</tr></thead>";

// Generate the table content
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $field) {
        echo "<td>".$field."</td>";
    }
    echo "</tr>";
}
echo "</tbody>";

// Close the table
echo "</table>";

// Pass the selected columns to the Select statement builder
if (!empty($_POST["selected_columns"])) {
    $selected_columns = $_POST["selected_columns"];
    $selected_columns_str = implode(", ", $selected_columns);
    // Modify the SQL query to include only the selected columns
    $sql = "SELECT $selected_columns_str FROM $selected_table";
    // Execute the modified SQL query
    $result = mysqli_query($conn, $sql);
    // ... do something with the modified query results ...
}
?>