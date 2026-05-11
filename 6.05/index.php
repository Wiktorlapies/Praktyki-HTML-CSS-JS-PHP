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
                $imagesDir = "images/";
                $host = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ksiegarnia";
                $connDB = new mysqli($host, $username, $password, $dbname, 3310);
                
                $GET_BOOKS_QUERY = "SELECT k.id, k.tytul, m.cena, m.ilosc, si.okladka FROM ksiazki k INNER JOIN magazyn m ON k.id = m.id_ksiazki INNER JOIN szczegoloweinformacje si ON k.id = si.id_ksiazki;";

                $booksFromDB = $connDB -> query($GET_BOOKS_QUERY);

                foreach($booksFromDB as $book){
                    $GET_BOOK_AUTHORS_BY_ID_QUERY = "SELECT a.imie, a.nazwisko FROM autorzy a INNER JOIN ksiazki_autorzy ka ON a.id = ka.id_autora INNER JOIN ksiazki k ON ka.id_ksiazki = k.id WHERE k.id = {$book['id']};";
                    $book_authors = $connDB -> query($GET_BOOK_AUTHORS_BY_ID_QUERY);

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

                $connDB -> close();
            ?>
            
            
            
            
        </section>
    </main>
</body>
</html>