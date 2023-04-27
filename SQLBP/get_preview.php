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

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Generate the table header and form
echo "<form method='POST'>";
echo "<table>";
echo "<thead><tr>";
while ($fieldinfo = mysqli_fetch_field($result)) {
    $isChecked = in_array($fieldinfo->name, $_POST['selected_columns'] ?? []);
    echo "<th>" . $fieldinfo->name . "</th>";
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

// Close the table and form
echo "</table>";
echo "</form>";

?>