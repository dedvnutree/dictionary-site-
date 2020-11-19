<?php
include 'createTable.php';

$sqlReaders =  'SELECT  *
                FROM readers r ';

createTable(['id', 'first_name', 'last_name'],  $sqlReaders);
?>
