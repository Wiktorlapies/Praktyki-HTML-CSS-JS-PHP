<?php
    include "tools/files_paths.php";
    function renderLoggedUser(){
        $userName = $_SESSION["userName"];
        $isAdmin = $_SESSION["isAdmin"];
        if($userName == ""){
            echo "<a href='login.php' class='login-button'>Zaloguj/Zarejestruj</a>";
        }else{
            echo "<div class='logged-in-user-container'>";
            echo "<p class='logged-in-user'>Witaj! $userName</p>";
            echo "<a href='logout.php' class='logout-button'>Wyloguj się</a>";
            if($userName != "" && $isAdmin == 0){
                echo "<a href='cart.php?username={$userName}' class='cart-button'>";
                echo "<img src='" . getImagePath("cart.png") . "' alt='cart-image'>";
                echo "</a>";

            }
            echo "</div>";

        }
    }
    function renderNavMenu(){
        if($_SESSION["isAdmin"] == 1){
            echo "<a href='add_book.php'>Dodaj książkę </a>";
            echo "<a href='store.php'>Magazyn</a>";
            echo "<a href='users.php'>Użytkownicy</a> ";
        }
    }


?>