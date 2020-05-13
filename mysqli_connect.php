<?php
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'registration');

    $dbc = @mysqli_connect(DB_HOST, DB_NAME)
    OR die('Could not connect to MYSQL ' .
           mysqli_connect_error());
?>