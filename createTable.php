<?php

function createTable($tableColumns, $sql)
{
    include 'connection.php';

    $result = mysqli_query($link, $sql);
    if (!$result ) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }

    echo "<div class='table'><table>";

    echo '<tr>';
    foreach($tableColumns as $column) {  echo '<td>' . $column . '</td>'; }
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        foreach( $tableColumns as $field) {
            echo "<td>" . $row[$field]. "</td>";
        }
        echo "</tr>";
    }
    echo "</table></div>";
}