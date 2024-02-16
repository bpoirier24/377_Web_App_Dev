<?php

include('library.php');

$connection = get_database_connection();

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$itm_name = isset($_POST['itm_name']) ? mysqli_real_escape_string($connection, $_POST['itm_name']) : '';
$itm_price = isset($_POST['itm_price']) ? mysqli_real_escape_string($connection, $_POST['itm_price']) : '';
$protein_count = isset($_POST['protein_count']) ? mysqli_real_escape_string($connection, $_POST['protein_count']) : '';
$taste = isset($_POST['taste']) ? mysqli_real_escape_string($connection, $_POST['taste']) : '';
$calories = isset($_POST['calories']) ? mysqli_real_escape_string($connection, $_POST['calories']) : '';
$sodium = isset($_POST['sodium']) ? mysqli_real_escape_string($connection, $_POST['sodium']) : '';
$sugar = isset($_POST['sugar']) ? mysqli_real_escape_string($connection, $_POST['sugar']) : '';
$fat = isset($_POST['fat']) ? mysqli_real_escape_string($connection, $_POST['fat']) : '';
$health = isset($_POST['health']) ? mysqli_real_escape_string($connection, $_POST['health']) : '';


if ($id) {
    $sql =<<<SQL
    UPDATE items
       SET itm_name = '$itm_name',
           itm_price = '$itm_price',
           protein_count = '$protein_count',
           taste = '$taste',
           calories = '$calories',
           sodium = '$sodium',
           sugar = '$sugar',
           fat = '$fat',
           health = '$health'
     WHERE itm_id = $id
    SQL;
} else {
    $sql =<<<SQL
    INSERT INTO items (itm_name, itm_price, protein_count, taste, calories, sodium, sugar, fat, health)
    VALUES ('$itm_name', '$itm_price', '$protein_count', '$taste', '$calories', '$sodium', '$sugar', '$fat', '$health')
    SQL;
}

$connection->query($sql);

header('Location: index.php?content=menu-list');
exit();

?>
