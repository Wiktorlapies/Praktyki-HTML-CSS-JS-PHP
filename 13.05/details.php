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
        <h2 class="subpage_title">Szczegóły książki</h2>
    </header>
    <main>
        <!-- <div class="book_details_container">
            <section class="book_details">
                <img src="images/raspberry_pi_iot_projects.jpg" alt="okładka">
                <div class="data_container">
                    <section class="book_data">
                            <header class="book_title">Raspberry Pi IoT Projects</header>
                            <p class="author"><strong>Autor: </strong>John C. Shovic</p>
                            <p class="price"><strong>Cena: </strong>35.50zł</p>
                    </section>
                    <section class="detailed_data">
                            <p class="isbn"><strong>ISBN: </strong>978-1-484213-78-0</p>
                            <p class="amount"><strong>Ilość: </strong>13</p>
                            <p class="pages"><strong>Strony: </strong>256</p>
                            <p class="description"><strong>Opis: </strong>This book is designed for entry-through-intermediate-level device designers who want to build their own Internet of Things (IoT) projects for prototyping and proof-of-concept purposes. Expert makers may also find interesting new approaches. Raspberry Pi IoT Projects contains the tools needed to build a prototype of your design, sense the environment, communicate with the Internet (over the Internet and Machine to Machine communications) and display the results.</p>
                    </section>
                </div>
                <a class="come-back-button" href="index.html">&#8630;</a>
            </section>
        </div> -->

        <div class="book_details_container">

                <?php
                    include "connection_DB.php";
                    include "DBqueries.php";
                    include "files_paths.php";

                    $bookId = $_GET["book_id"];



                    $bookFromDB = getDataFromDB(GET_BOOK_QUERY($bookId));

                    $book_authors = getDataFromDB(GET_BOOK_AUTHORS_BY_ID_QUERY($bookId));


                    foreach($bookFromDB as $book){
                        if ($book["ilosc"] == 0){
                            echo "<section class='book_details unavailable'>";

                        }else{
                            echo "<section class='book_details'>";
                        }
                        echo "<img src='{$imagesDir}{$book['okladka']}' alt='okladka-{$book['tytul']}'>";
                        echo "<div class='data_container'>";
                            echo "<section class='book_data'>";
                                echo "<header class='book_title'>{$book['tytul']}</header>";

                                echo "<p class='author'><strong>Autor: </strong>";
                                foreach($book_authors as $book_author){
                                echo "{$book_author['imie']} {$book_author['nazwisko']}, ";
                                }
                                echo "</p>";

                                echo "<p class='price'><strong>Cena: </strong>{$book['cena']}zł</p>";

                            echo "</section>";
                            echo "<section class='detailed_data'>";
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
                    }
                
                ?>
                <a class="come-back-button" href="index.php">&#8630;</a>
            </section>
        </div>

    </main>
</body>
</html>