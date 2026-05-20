<?php
    session_start();
    if($_SESSION["isAdmin"] != 1){
        header("Location: index.php?ACCESS_DENIED");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body id="add-book-page">
    <header class="head-container">
        <h2 class="page-title">
            Księgarnia - Administracja
            <?php
                include "handlers/render_header_sections.php";
                renderLoggedUser();
            ?>        
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <a href="add_book.php">Dodaj książkę </a>
            <a href="store.php">Magazyn</a>
            <a href="users.php">Użytkownicy</a>
        </nav>
        <h2 class="subpage-title">Modyfikuj stan magazynowy książki</h2>
    </header>
    <main>
        <form action='handlers/chg_book_qt_handler.php' method='post' class='book-data-form'>
            <section class='book-qt-data'>
                <?php
                    include "DB_tools/DB_manager.php";
                    include "DB_tools/DB_queries.php";
                    include "handlers/error_handler.php";

                    if(isset($_GET["bookId"])){
                        $bookId = $_GET["bookId"];
                        $bookData = manageDB(getBookQuery($bookId));
                        if($bookData == "error"){
                            connectionErrorHandler();
                        }else{
                            foreach($bookData as $book){
                                echo "<p><strong>Tytuł:</strong> {$book['tytul']}</p>";
                                echo "<p><strong>ISBN:</strong> {$book['isbn']}</p>";
                                echo "<p><strong>Aktualna ilość:</strong> {$book['ilosc']}</p>";
                                echo "<input type='hidden' name='bookId' value='{$bookId}'>";
                                echo "<p>";
                                echo "<label for='newBookQt'><strong>Nowa ilość: <strong></label>";
                                echo "<input type='number' id='newBookQt' name='newBookQt' min='0' value='{$book['ilosc']}'>";
                                echo "</p>";
                            }
                        }
                    }
                    if(isset($_GET["connError"])){
                        echo "<p class='error-message' style='display:block;'>Błąd połączenia z bazą danych! Spróbuj ponownie później</p>";

                    }
                ?>
            </section>
            <section class="operations">
                <input type="reset" value="Wyczyść" class="operation-button">
                <input type="submit" value="Aktualizuj" class="operation-button submit-button">
            </section>
        </form>
    </main>
</body>
</html>