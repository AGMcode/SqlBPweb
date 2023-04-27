<?php
if (isset($_POST['build'])) {
  $columns = trim($_POST['select-columns']);
  $from = trim($_POST['from-table']);
  $where = trim($_POST['where-condition']);
  $groupBy = trim($_POST['group-by']);
  $having = trim($_POST['having']);
  $orderBy = trim($_POST['order-by']);
  $limit = trim($_POST['limit']);

  $query = "SELECT $columns FROM $from";
  
  if (!empty($where)) {
    $query .= " WHERE $where";
  }
  
  if (!empty($groupBy)) {
    $query .= " GROUP BY $groupBy";
  }
  
  if (!empty($having)) {
    $query .= " HAVING $having";
  }
  
  if (!empty($orderBy)) {
    $query .= " ORDER BY $orderBy";
  }
  
  if (!empty($limit)) {
    $query .= " LIMIT $limit";
  }
  
  $sqlQuery = $query;
}
?>

<form method="post">
  <h2>SQL builder</h2>
  
  <div>
    <label for="select-columns">Columns:</label>
    <input type="text" id="select-columns" name="select-columns" value="<?php echo isset($_POST['select-columns']) ? $_POST['select-columns'] : '' ?>">
 
    <label for="from-table">From:</label>
    <input type="text" id="from-table" name="from-table" value="<?php echo isset($_POST['from-table']) ? $_POST['from-table'] : '' ?>">

    <label for="where-condition">Where:</label>
    <input type="text" id="where-condition" name="where-condition" value="<?php echo isset($_POST['where-condition']) ? $_POST['where-condition'] : '' ?>">
  
    <label for="group-by">Group by:</label>
    <input type="text" id="group-by" name="group-by" value="<?php echo isset($_POST['group-by']) ? $_POST['group-by'] : '' ?>">

    <label for="having">Having:</label>
    <input type="text" id="having" name="having" value="<?php echo isset($_POST['having']) ? $_POST['having'] : '' ?>">
  
    <label for="order-by">Order by:</label>
    <input type="text" id="order-by" name="order-by" value="<?php echo isset($_POST['order-by']) ? $_POST['order-by'] : '' ?>">
  
    <label for="limit">Limit:</label>
    <input type="text" id="limit" name="limit" value="<?php echo isset($_POST['limit']) ? $_POST['limit'] : '' ?>">

    <input type="submit" value="Build" name="build">

  <?php if (isset($sqlQuery)): ?>
  <div>
    <label for="sql-query">SQL Query:</label>
    <textarea id="sql-query" name="sql-query" cols="100" rows="10"><?php echo $sqlQuery ?></textarea>
  </div>
  <?php endif; ?>
</form>
