<?php

$itm_name = '';
$itm_price = '';
$protein_count = '';
$taste = '';
$calories = '';
$sodium = '';
$sugar = '';
$fat = '';
$health = '';

include('library.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (isset($id)) {
    $connection = get_database_connection();

    $sql =<<<SQL
    SELECT itm_id, itm_name, itm_price, protein_count, taste, calories, sodium, sugar, fat, health
    FROM items
    WHERE itm_id = $id
    SQL;

    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $itm_name = $row['itm_name'];
    $itm_price = $row['itm_price'];
    $protein_count = $row['protein_count'];
    $taste = $row['taste'];
    $calories = $row['calories'];
    $sodium = $row['sodium'];
    $sugar = $row['sugar'];
    $fat = $row['fat'];
    $health = $row['health'];
}

?>
<form action="save-menu-item.php" method="post">
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($id) ? $id : '' ?>" />

    <div class="mb-3">
        <label for="itm_name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="itm_name" name="itm_name" value="<?php echo $itm_name ?>" />
    </div>

    <div class="mb-3">
        <label for="itm_price" class="form-label">Item Price</label>
        <input type="text" class="form-control" id="itm_price" name="itm_price" value="<?php echo $itm_price ?>" />
    </div>

    <div class="mb-3">
        <label for="protein_count" class="form-label">Protein Count</label>
        <input type="text" class="form-control" id="protein_count" name="protein_count" value="<?php echo $protein_count ?>" />
    </div>


<div class="mb-3">
    <label for="taste" class="form-label">Taste</label>
    <input type="text" class="form-control" id="taste" name="taste" value="<?php echo $taste ?>" />
</div>

<div class="mb-3">
    <label for="calories" class="form-label">Calories</label>
    <input type="text" class="form-control" id="calories" name="calories" value="<?php echo $calories ?>" />
</div>

<div class="mb-3">
    <label for="sodium" class="form-label">Sodium</label>
    <input type="text" class="form-control" id="sodium" name="sodium" value="<?php echo $sodium ?>" />
</div>

<div class="mb-3">
    <label for="sugar" class="form-label">Sugar</label>
    <input type="text" class="form-control" id="sugar" name="sugar" value="<?php echo $sugar ?>" />
</div>

<div class="mb-3">
    <label for="fat" class="form-label">Fat</label>
    <input type="text" class="form-control" id="fat" name="fat" value="<?php echo $fat ?>" />
</div>

<div class="mb-3">
    <label for="health" class="form-label">Health</label>
    <input type="text" class="form-control" id="health" name="health" value="<?php echo $health ?>" />
</div>


    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php?content=menu-list" class="btn btn-secondary" role="button" aria-disabled="true">Cancel</a>
<?php if (isset($id)) { ?>
    <button type="button" class="btn btn-danger" onclick="deleteMenuItem()">Delete</button>
    <script>

    function deleteMenuItem() {
        if (confirm('Are you sure you want to delete this menu item?')) {
            location.href = 'delete-menu-item.php?id=<?php echo isset($id) ? $id : '' ?>';
        }
    }

    </script>
<?php } ?>
</form>
