<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
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
        <h2 class="subpage_title">Magazyn</h2>
    </header>
    <main>
        <div class="store_container">
            <table class="store">
                <tr>
                    <th class="store_header" colspan="4">Stan magazynu na dzień: <span id="currentDate"></span></th>
                </tr>
                <tr>
                    <th class="bookIdColumn">ID</th>
                    <th class="bookTitleColumn">Tytuł</th>
                    <th class="bookIsbnColumn">ISBN</th>
                    <th class="bookAmountColumn">Ilość</th>
                </tr>
                <?php
                    include "connection_DB.php";
                    include "DBqueries.php";
                    $storeDataFromDB = getDataFromDB($GET_BOOKS_STORE_QUERY);

                    foreach($storeDataFromDB as $storeData){
                        echo "<tr>";

                            if($storeData["ilosc"] == 0){            
                                echo "<td class='unavailable'>{$storeData['id']}</td>";
                                echo "<td class='unavailable'>{$storeData['tytul']}</td>";
                                echo "<td class='unavailable'>{$storeData['isbn']}</td>";
                                echo "<td class='unavailable'>{$storeData['ilosc']}</td>";
                            }else{
                                echo "<td>{$storeData['id']}</td>";
                                echo "<td>{$storeData['tytul']}</td>";
                                echo "<td>{$storeData['isbn']}</td>";
                                echo "<td>{$storeData['ilosc']}</td>";
                            }
                        echo "</tr>";
                    }
                
                ?>
            </table>
            <div class="store_operations">
                
                <button type="submit" class="updateStoreButton operation-button" onclick="window.location.reload()">Aktualizuj</button>
                
            </div>
        </div>
    </main>
    
    <script>
        document.getElementById("currentDate").textContent = getCurrentDate();
    </script>
</body>
</html>