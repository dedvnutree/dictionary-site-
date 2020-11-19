<a class='button' href="index.php?page=books">Увидеть все книги</a>

<?php
include 'createTable.php';

$sqlTakenBooks = 'SELECT  b.id, b.name as "Название книги", b.pub_date as "Дата публикации",
lg.returned_at, lg.taken_at as "Дата взятия", r.last_name as "Фамилия читателя" 
FROM books b 
JOIN log_taking lg  on  b.id = lg.book_id
JOIN readers r on lg.reader_id = r.id 
WHERE lg.returned_at IS NULL';

createTable(['id', "Название книги", "Дата публикации", "Фамилия читателя", "Дата взятия"],  $sqlTakenBooks);

// $result = mysqli_query($link, $sql);
// if (!$result ) {
//     printf("Error: %s\n", mysqli_error($link));
//     exit();
// }
// echo "<table>";
// echo '<tr><td>' .'id'. "</td><td>" . 'name' . "</td><td>" . 'pub_date' . "</td><td>" .'last_name'. "</td><td>" . "taken at". "</td></tr>" ;
// while ($row = mysqli_fetch_assoc($result))
// {
//     if($row['returned_at'] === NULL)
//     {
//         echo '<tr><td>' . $row['id']. "</td><td>" 
//         . $row['name'] . "</td><td>" 
//         . $row['pub_date'] . "</td><td>" 
//         . $row['last_name'] . "</td><td>" 
//         . $row['taken_at'] . "</td></tr>";
//     }
// }
// echo "</table>";

?>