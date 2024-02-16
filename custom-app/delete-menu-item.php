<?php

include('library.php');

$connection = get_database_connection();

$id = $_GET['id'];

$sql =<<<SQL
DELETE FROM items WHERE itm_id = $id
SQL;

$connection->query($sql);

header('Location: index.php?content=menu-list');
?>
