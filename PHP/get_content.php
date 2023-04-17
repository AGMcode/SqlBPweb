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

// Check if a table name is submitted
$table_name = isset($_POST['table_name']) ? $_POST['table_name'] : '';

// Select all tables in the database
$sql = "SHOW TABLES";
$result = $conn->query($sql);

// Create a dropdown list of tables
echo '<form method="POST">';
echo '<select name="table_name" onchange="this.form.submit();">';
while ($row = $result->fetch_row()) {
    $selected = ($table_name == $row[0]) ? 'selected' : '';
    echo '<option value="'.$row[0].'" '.$selected.'>'.$row[0].'</option>';
}
echo '</select>';
echo '</form>';

// Display the content of the selected table
if (!empty($table_name)) {
    $sql = "SELECT * FROM ".$table_name;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        // Output table header row
        $header_row = '<tr>';
        while ($field_info = $result->fetch_field()) {
            $header_row .= '<th>'.$field_info->name.'</th>';
        }
        $header_row .= '</tr>';
        echo $header_row;
        
        // Output table data rows
        while ($row = $result->fetch_assoc()) {
            $data_row = '<tr>';
            foreach ($row as $value) {
                $data_row .= '<td>'.$value.'</td>';
            }
            $data_row .= '</tr>';
            echo $data_row;
        }
        echo '</table>';
    } else {
        echo 'No records found';
    }
}

// Close the database connection
$conn->close();
?>