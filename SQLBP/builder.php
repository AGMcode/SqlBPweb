<div class="parent">
  <div class="child" style="width: 45%;">
    <h2>SQL Builder: </h2>
    <textarea id='sql-query-builder' style="resize:none; max-width:100%;" name='sql-query-builder' cols='100' rows='10'>
    <?php echo $sql; ?>
    </textarea>
  </div>
  <div class="child container" style="width: 45%;">
    <h2>SQL Preview: </h2>
    <?php include_once 'get_preview.php'; ?>
  </div>
</div>