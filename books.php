<a class='button' href="index.php?page=takenBooks">Увидеть только взятые книги</a>

<?php
include 'createTable.php';

$sqlAllBooks = 'SELECT  b.id, b.name as "Название книги", b.pub_date as "Дата публикации",
                    lg.taken_at as "Дата взятия", r.last_name as "Фамилия читателя", 
                    CASE 
                    WHEN lg.returned_at IS NULL
                    THEN "taken" 
                    ELSE "available"
                    END as "Наличие"
                    FROM books b 
                    JOIN log_taking lg  on  b.id = lg.book_id
                    JOIN readers r on lg.reader_id = r.id';

createTable(['id', "Название книги", "Дата публикации", "Наличие", "Фамилия читателя", "Дата взятия"],  $sqlAllBooks);


// echo "<table>";
// echo '<tr><td>' .'id'. "</td><td>" . 'name' . "</td><td>" . 'pub_date' . "</td><td>" . "taken" . "</td><td>" .'last_name'. "</td><td>" . "taken at". "</td></tr>" ;
// $result = mysqli_query($link, $sql);
// if (!$result ) {
//     printf("Error: %s\n", mysqli_error($link));
//     exit();
// }

// while ($row = mysqli_fetch_assoc($result))
// {
//     if($row['returned_at'] !== NULL)
//     {
//         echo '<tr><td>' . $row['id']. "</td><td>" 
//         . $row['name'] . "</td><td>" 
//         . $row['pub_date'] . "</td><td>" 
//         . 'NO'. "</td><td>" 
//         . "</td><td>" 
//         . "</td></tr>";
//     }
//     else
//     {
//         echo '<tr><td>' . $row['id']. "</td><td>" 
//         . $row['name'] . "</td><td>" 
//         . $row['pub_date'] . "</td><td>" 
//         . 'YES'. "</td><td>" 
//         . $row['last_name'] . "</td><td>" 
//         . $row['taken_at'] . "</td></tr>";
//     }
// }
// echo "</table>";

?>