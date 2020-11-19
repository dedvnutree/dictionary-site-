<script>
    function returnButtonText() {
        return text;
    }
    

    function showForm() {
        document.getElementById("takenBooks").hidden = document.getElementById("allBooks").hidden;
        document.getElementById("allBooks").hidden = !document.getElementById("takenBooks").hidden;
        if(document.getElementById("takenBooks").hidden)
            document.getElementById('link').innerHTML = "Показать взятые книги";
        else
            document.getElementById('link').innerHTML = "Показать все книги";
    }
</script>

<button class='button' id="link" onclick="showForm()"> Показать взятые книги </button>

<div id='allBooks'>
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
    ?>
</div>

<div id='takenBooks' hidden>
    <?php
    $sqlTakenBooks = 'SELECT  b.id, b.name as "Название книги", b.pub_date as "Дата публикации",
    lg.returned_at, lg.taken_at as "Дата взятия", r.last_name as "Фамилия читателя" 
    FROM books b 
    JOIN log_taking lg  on  b.id = lg.book_id
    JOIN readers r on lg.reader_id = r.id 
    WHERE lg.returned_at IS NULL';
    
    createTable(['id', "Название книги", "Дата публикации", "Фамилия читателя", "Дата взятия"],  $sqlTakenBooks);
    ?>
</div>