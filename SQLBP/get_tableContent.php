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

// Build the SQL query
if (empty($selected_table)) {
    // Show all tables in the selected database
    $sql = "SHOW TABLES";
} else {
    // Show the selected table
    $sql = "SELECT * FROM $selected_table";
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
echo "<input type='submit' value='Select'>";
echo "</form>";

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
  
      $sql = 'SELECT ';
  
      if(!empty($selectParams['columns'])) {
          $sql .= implode(', ', $selectParams['columns']);
      } else {
          $sql .= '*';
      }
  
      $sql .= '
    FROM '.$selectParams['from'];
  
      if(!empty($selectParams['where'])) {
          $sql .= ' 
    WHERE '.$selectParams['where'];
      }
  
      if(!empty($selectParams['groupby'])) {
          $sql .= ' 
    GROUP BY '.$selectParams['groupby'];
      }
  
      if(!empty($selectParams['having'])) {
          $sql .= ' 
    HAVING '.$selectParams['having'];
      }
  
      if(!empty($selectParams['orderby'])) {
          $sql .= ' 
    ORDER BY '.$selectParams['orderby'];
      }
  
      if(!empty($selectParams['limit'])) {
          $sql .= ' 
    LIMIT '.$selectParams['limit'];
      } 
  } 
?>