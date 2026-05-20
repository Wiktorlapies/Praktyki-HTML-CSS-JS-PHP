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
<body id="users-list-page">
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
        <h2 class="subpage-title">Użytkownicy</h2>
    </header>
    <main>
        <div class="store-container">
            
                <?php
                    include "DB_tools/DB_manager.php";
                    include "DB_tools/DB_queries.php";
                    include "handlers/error_handler.php";

                    $usersDataFromDB = manageDB($GET_USERS_QUERY);
                    if($usersDataFromDB == "error"){
                        connectionErrorHandler();
                    }else{
                        echo "<table class='store'>";
                        echo "<tr>";
                        echo "<th class='store-header' colspan='4'>Lista użytkowników na dzień: <span id='currentDate'></span></th>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th class='username-column'>Nazwa użytkownika</th>";
                        echo "<th class='email-column'>Email</th>";
                        echo "<th class='admin-column'>Administrator</th>";
                        echo "</tr>";
                        foreach($usersDataFromDB as $userData){
                            echo "<tr>";
                                $isAdminClass = "";
                                $isAdmin = "Nie";
                                if($userData["is_admin"] == 1){
                                    $isAdminClass = "admin-cell";
                                    $isAdmin = "Tak";                        
                                }
                                echo "<td class='$isAdminClass'>{$userData['user_name']}</td>";
                                echo "<td class='$isAdminClass'>{$userData['email']}</td>";
                                echo "<td class='$isAdminClass'>{$isAdmin}</td>";
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