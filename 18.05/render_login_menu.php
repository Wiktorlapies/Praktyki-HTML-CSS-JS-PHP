<?php
    function renderLoggedUser(){
        $userName = $_SESSION["userName"];

        if($userName == ""){
            echo "<a href='login.php' class='login-button'>Zaloguj/Zarejestruj</a>";
        }else{
            echo "<div class='logged-in-user-container'>";
            echo "<p class='logged-in-user'>Witaj! $userName";
            
            echo "</p>";
            echo "<a href='logout.php' class='logout-button'>Wyloguj się</a>";
            echo "</div>";

        }
    }

?>