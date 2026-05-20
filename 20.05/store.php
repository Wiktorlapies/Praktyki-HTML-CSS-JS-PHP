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
<body id="book-store-page">
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
        <h2 class="subpage-title">Magazyn</h2>
    </header>
    <main>
        <div class="store-container">
            
                <?php
                    include "DB_tools/DB_manager.php";
                    include "DB_tools/DB_queries.php";
                    include "handlers/error_handler.php";

                    $storeDataFromDB = manageDB($GET_BOOKS_STORE_QUERY);
                    if($storeDataFromDB == "error"){
                        connectionErrorHandler();
                    }else{
                        echo "<table class='store'>";
                        echo "<tr>";
                        echo "<th class='store-header' colspan='4'>Stan magazynu na dzień: <span id='currentDate'></span></th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th class='book-id-column'>ID</th>";
                        echo "<th class='book-title-column'>Tytuł</th>";
                        echo "<th class='book-isbn-column'>ISBN</th>";
                        echo "<th class='book-amount-column'>Ilość</th>";
                        echo "</tr>";
                        foreach($storeDataFromDB as $storeData){
                            echo "<tr>";
                                $isAvailable = "";
                                if($storeData["ilosc"] == 0){            
                                    $isAvailable = "unavailable";
                                }
                                    echo "<td class='$isAvailable'>{$storeData['id']}</td>";
                                    echo "<td class='$isAvailable'>{$storeData['tytul']}</td>";
                                    echo "<td class='$isAvailable'>{$storeData['isbn']}</td>";
                                    echo "<td class='$isAvailable'>{$storeData['ilosc']}";
                                    echo "<a href='change_book_qt.php?bookId={$storeData['id']}' class='change-book-quantity-button'>&#8644;</a>";
                                    echo "</td>";

                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<div class='store-operations'>";
                        echo "<button class='update-store-button operation-button' onclick='window.location.reload()'>Aktualizuj</button>";
                        echo "</div>";
                    }
                ?>
            
        </div>
    </main>
    
    
</body>
</html>