<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>Protein Count</th>
            <th>Taste</th>
            <th>Calories</th>
            <th>Sodium</th>
            <th>Sugar</th>
            <th>Fat</th>
            <th>Health</th>
        </tr>
    </thead>

    <tbody>
<?php

$connection = get_database_connection();

$sql =<<<SQL
SELECT itm_id, itm_name, itm_price, protein_count, taste, calories, sodium, sugar, fat, health
  FROM items
 ORDER BY itm_name
SQL;

$result = $connection->query($sql);
while ($row = $result->fetch_assoc())
{
    echo '<tr>';
    echo '<td>';
    echo '<a href="index.php?content=menu-detail&id=' . $row['itm_id'] . '">' . $row['itm_name'] . '</a>';
    echo '</td>';
    echo '<td>' . $row['itm_price'] . '</td>';
    echo '<td>' . $row['protein_count'] . '</td>';
    echo '<td>' . $row['taste'] . '</td>';
    echo '<td>' . $row['calories'] . '</td>';
    echo '<td>' . $row['sodium'] . '</td>';
    echo '<td>' . $row['sugar'] . '</td>';
    echo '<td>' . $row['fat'] . '</td>';
    echo '<td>' . $row['health'] . '</td>';
    echo '</tr>';
}

?>
    </tbody>
</table>

<a href="index.php?content=menu-detail" class="btn btn-primary" role="button" aria-disabled="true">Add a Menu Item</a>
