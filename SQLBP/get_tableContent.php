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

// cuz empty == display all, keeps poping out warning UNASSIGNED VAR
error_reporting(E_ERROR);

$selected_database = $_GET["database"];
$selected_table = $_GET["table"];

// Check if there is an existing SQL statement in the textarea
if (isset($_POST['sql_statement'])) {
    $sql = $_POST['sql_statement'];
  } else {
    // Build the SQL query based on the selected database and table
    if (empty($selected_table)) {
        // Show all tables in the selected database
        $sql = "SHOW TABLES";
    } else {
        // Show the selected table
        $sql = "SELECT * FROM $selected_table";
    }
  }
  

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Generate the table header and form
echo "<form method='POST'>";
echo "<table>";
echo "<thead><tr>";
if ($selected_table != null) {
    while ($fieldinfo = mysqli_fetch_field($result)) {
        $isChecked = in_array($fieldinfo->name, $_POST['selected_columns'] ?? []);
        echo "<th>" . $fieldinfo->name . "<input type='checkbox' name='selected_columns[]' value='" . $fieldinfo->name . "'" . ($isChecked ? 'checked' : '') . "></th>";
    }
} else {
    $fieldinfo = mysqli_fetch_field($result);
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


// Check if any columns were selected
if(isset($_POST['selected_columns'])) {
    $selectParams = array(
        'columns' => $_POST['selected_columns'],
        'from' => $selected_table,
        'where' => $where,
        'groupby' => $group_by,
        'having' => $having,
        'orderby' => $order_by,
        'limit' => $limit
    );

    // Update the existing SQL statement with the selected columns
    $sql = str_replace("*", implode(", ", $selectParams['columns']), $sql);

    // Update the existing SQL statement with the WHERE clause
    if (!empty($selectParams['where'])) {
        $sql = preg_replace("/WHERE (.*)/", "WHERE " . $selectParams['where'], $sql);
    }

    // Update the existing SQL statement with the GROUP BY clause
    if (!empty($selectParams['groupby'])) {
        $sql = preg_replace("/GROUP BY (.*)/", "GROUP BY " . $selectParams['groupby'], $sql);
    }

    // Update the existing SQL statement with the HAVING clause
    if (!empty($selectParams['having'])) {
        $sql = preg_replace("/HAVING (.*)/", "HAVING " . $selectParams['having'], $sql);
    }

    // Update the existing SQL statement with the ORDER BY clause
    if (!empty($selectParams['orderby'])) {
        $sql = preg_replace("/ORDER BY (.*)/", "ORDER BY " . $selectParams['orderby'], $sql);
    }

    // Update the existing SQL statement with the LIMIT clause
    if (!empty($selectParams['limit'])) {
        $sql = preg_replace("/LIMIT (.*)/", "LIMIT " . $selectParams['limit'], $sql);
    }
}
?>