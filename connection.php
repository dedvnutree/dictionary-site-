<?php
$link = mysqli_connect('localhost', "root", "root");
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
// else {
//     print("Соединение установлено успешно <br>");
// }

mysqli_set_charset($link, "utf8");
mysqli_select_db($link,'php_tkachuk');
