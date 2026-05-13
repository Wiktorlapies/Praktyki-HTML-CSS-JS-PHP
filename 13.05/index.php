<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="head-container">
        <h2 class="page_title">
            Księgarnia
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <a href="add_book.php">Dodaj książkę </a>
            <a href="store.php">Magazyn</a>
        </nav>
        <h2 class="subpage_title">Dostępne książki</h2>
    </header>
    <main>
        <section class="books">
            <!-- <article class="book_product">
                <img src="images/pro_asp.net_web_api_security.jpg" alt="okladka">
                <section class="book_data">
                    <header class="book_title">Pro ASP.NET Web API Security</header>
                    <p class="author"><strong>Autor: </strong>Badrinarayanan Lakshmiraghavan</p>
                    <p class="price"><strong>Cena: </strong>157.00zł</p>
                    <p class="details_link"><a href="details2.html">Szczegóły >>></a></p>
                </section>
            </article> -->
            <?php
                include "connection_DB.php";
                include "DBqueries.php";
                include "files_paths.php";
                

                $booksFromDB = getDataFromDB($GET_BOOKS_QUERY);

                foreach($booksFromDB as $book){
                    
                    $book_authors = getDataFromDB(GET_BOOK_AUTHORS_BY_ID_QUERY($book["id"]));

                    if ($book["ilosc"] == 0){
                        echo "<article class='book_product unavailable'>";

                    }else{
                        echo "<article class='book_product'>";
                    }
                        echo "<img src='{$imagesDir}{$book['okladka']}' alt='okladka-{$book['tytul']}'>";
                        echo "<section class='book_data'>";
                            echo "<header class='book_title'>{$book['tytul']}</header>";

                            echo "<p class='author'><strong>Autor: </strong>";
                            foreach($book_authors as $book_author){
                                echo "{$book_author['imie']} {$book_author['nazwisko']}, ";
                            }
                            echo "</p>";

                            echo "<p class='price'><strong>Cena: </strong>{$book['cena']}zł</p>";

                            echo "<p class='details_link'><a href='details.php?book_id={$book['id']}'>Szczegóły >>></a></p>";

                        echo "</section>";
                    echo "</article>";
                }

            ?>
            
            
            
            
        </section>
    </main>
</body>
</html>