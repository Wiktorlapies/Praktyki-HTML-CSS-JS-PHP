<?php
    session_start();
    $isAdmin = $_SESSION["isAdmin"];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="book-details-page">
    <header class="head-container">
        <h2 class="page-title">
            Księgarnia
            <?php
                if($_SESSION["isAdmin"] == 1){
                    echo " - Administracja";
                }
                include "handlers/render_header_sections.php";

                renderLoggedUser();
            ?>        
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <?php
                renderNavMenu();
            ?>
        </nav>
        <h2 class="subpage-title">Szczegóły książki</h2>
    </header>
    <main>
        
            <div class='book-details-container'>
                <?php
                    include "DB_tools/DB_manager.php";
                    include "DB_tools/DB_queries.php";
                    include "handlers/error_handler.php";

                    $bookId = $_GET["book_id"];



                    $bookFromDB = manageDB(getBookQuery($bookId));
                    if($bookFromDB == "error"){
                        connectionErrorHandler();
                    } else {
                        $book_authors = manageDB(getBookAuthorsByIdQuery($bookId));

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
                                    if($isAdmin == 0){
                                        echo "<form action='handlers/basket-handler.php' method='post' class='add-to-cart-form $isAvailable'>";
                                            echo "<input type='hidden' name='productToCartBookId' value='{$bookId}'>";
                                            echo "<input type='number' name='productToCartQt' id='productToCartQt' min='1' max='{$book['ilosc']}' value='1' placeholder='Ile?'>";
                                            echo "<input type='submit' value='Dodaj do koszyka' class='add-to-cart-sumbit'>";

                                        echo "</form>";
                                    }
                                    
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