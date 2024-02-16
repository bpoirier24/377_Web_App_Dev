<?php

if (!function_exists('get_database_connection')) {

    extract($_REQUEST);

    if (!isset($content) || $content == '' || strpos($content, '://') || !file_exists($content . '.php'))
    {
        $content = 'menu-list';
    }

    function get_database_connection()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = 'Indians2016!';
        $dbname = 'mcdonalds-items'; 

        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($connection->connect_error)
        {
            trigger_error('Connection failed: ' . $connection->connect_error, E_USER_ERROR);
        }

        return $connection;
    }
}

?>
