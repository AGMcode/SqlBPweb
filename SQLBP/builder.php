<div class="parent">
  <div class="child" style="width: 49%;">
    <h2>SQL Builder: </h2>
    <textarea id='sql-query-builder' style="resize:none; max-width:100%;" name='sql-query-builder' cols='100' rows='10'>
    <?php echo $sql; ?>
    </textarea>
    <div class="child container" style="width: 10%;">
      <h1>Menu </h1>
      <input type='submit' value='Build'>
      
      </form>
    </div>
  </div>
  <div class="child container" style="width: 40%;">
    <h2>SQL Preview: </h2>
    <div class="child container">
    <?php include_once 'get_preview.php'; ?>
    </div>
  </div>
</div>