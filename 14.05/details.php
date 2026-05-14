<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="head-container">
        <h2 class="page-title">
            Księgarnia
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <a href="add_book.php">Dodaj książkę </a>
            <a href="store.php">Magazyn</a>
        </nav>
        <h2 class="subpage-title">Szczegóły książki</h2>
    </header>
    <main>
        
            <div class='book-details-container'>
                <?php
                    include "DB_manager.php";
                    include "DB_queries.php";
                    include "files_paths.php";
                    include "error_handler.php";

                    $bookId = $_GET["book_id"];



                    $bookFromDB = getDataFromDB(getBookQuery($bookId));
                    if($bookFromDB == "error"){
                        connectionErrorHandler();
                    } else {
                        $book_authors = getDataFromDB(getBookAuthorsByIdQuery($bookId));

                        foreach($bookFromDB as $book){
                            $isAvailable = "";
                            if ($book["ilosc"] == 0){
                                $isAvailable = "unavailable";

                            }
                            echo "<section class='book-details $isAvailable'>";

                                echo "<img src='" . getImagePath($book['okladka']) . "' alt='okladka-{$book['tytul']}'>";
                                echo "<div class='data-container'>";
                                    echo "<section class='book-data'>";
                                        echo "<header class='book-title'>{$book['tytul']}</header>";

                                        echo "<p class='author'><strong>Autor: </strong>";
                                        foreach($book_authors as $book_author){
                                        echo "{$book_author['imie']} {$book_author['nazwisko']}, ";
                                        }
                                        echo "</p>";

                                        echo "<p class='price'><strong>Cena: </strong>{$book['cena']}zł</p>";

                                    echo "</section>";
                                    echo "<section class='detailed-data'>";
                                        echo "<p class='isbn'><strong>ISBN: </strong>{$book['isbn']}</p>";
                                        if ($book["ilosc"] == 0){
                                            echo "<p class='amount'><strong>Ilość: </strong>Niedostępne</p>";                                    
                                        }else{
                                            echo "<p class='amount'><strong>Ilość: </strong>{$book['ilosc']}</p>";
                                        }                            
                                        echo "<p class='pages'><strong>Strony: </strong>{$book['strony']}</p>";

                                        echo "<p class='description'><strong>Opis: </strong>{$book['opis']}</p>";
                                    echo "</section>";
                                echo "</div>";
                                echo "<a class='come-back-button' href='index.php'>&#8630;</a>";
                            echo "</section>";
                        }
                    }
                ?>
            </div>
        
    </main>
</body>
</html>