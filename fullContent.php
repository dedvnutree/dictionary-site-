<html>
<head>
<link rel="stylesheet" href="styles.css">
<title> Библиотека </title>
</head>
<body>
<header>
    <nav class = 'nav'>
        <a href="index.php?page=main">Главная страница</a> | 
        <a href="index.php?page=readers">Читатели</a> |
        <a href="index.php?page=books">Книги</a>
    </nav>

</header>
<?php  
$page = (isset($_GET['page']) ? $_GET['page'] : 'main');
include basename($page).'.php'; ?>

<footer>
    <?php include 'config.php';
    echo $city .$year. $mail. $number?>
</footer>
</body>
</html>