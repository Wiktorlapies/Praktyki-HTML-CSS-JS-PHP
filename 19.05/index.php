<?php
    session_start();
    if(!isset($_SESSION["userName"])){
        $_SESSION["userName"] = "";
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="main-page">
    <header class="head-container">
        <h2 class="page-title">
            Księgarnia
            <?php
                include "handlers/render_login_menu.php";
                renderLoggedUser();
            ?>
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <a href="add_book.php">Dodaj książkę </a>
            <a href="store.php">Magazyn</a>
            <a href="users.php">Użytkownicy</a>
        </nav>
        <h2 class="subpage-title">Dostępne książki</h2>
    </header>
    <main>
        <section class="books">
            
            <?php
                include "DB_tools/DB_manager.php";
                include "DB_tools/DB_queries.php";
                include "tools/files_paths.php";
                include "handlers/error_handler.php";

                $booksFromDB = manageDB($GET_BOOKS_QUERY);

                if($booksFromDB == "error"){
                    connectionErrorHandler();
                } else {

                    foreach($booksFromDB as $book){

                        $book_authors = manageDB(getBookAuthorsByIdQuery($book["id"]));
                        $isAvailable = "";
                        if ($book["ilosc"] == 0){
                            $isAvailable = "unavailable";    

                        }
                            echo "<article class='book-product $isAvailable'>";
                            echo "<img src='" . getImagePath($book['okladka']) . "' alt='okladka-{$book['tytul']}'>";
                            echo "<section class='book-data'>";
                                echo "<header class='book-title'>{$book['tytul']}</header>";

                                echo "<p class='author'><strong>Autor: </strong>";
                                foreach($book_authors as $book_author){
                                    echo "{$book_author['imie']} {$book_author['nazwisko']}, ";
                                }
                                echo "</p>";

                                echo "<p class='price'><strong>Cena: </strong>{$book['cena']}zł</p>";

                                echo "<p class='details-link'><a href='details.php?book_id={$book['id']}'>Szczegóły >>></a></p>";

                            echo "</section>";
                        echo "</article>";
                    }
                }
            ?>
            
            
            
            
        </section>
    </main>
</body>
</html>