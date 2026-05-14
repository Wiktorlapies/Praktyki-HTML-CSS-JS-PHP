<?php
    function connectionErrorHandler(){
        echo "<div class='conn-error-container'>";
        echo "<p class='conn-error'>Ups! Coś poszło nie tak:<br> Błąd połączenia z bazą danych</p>";
        echo "<button onclick='window.location.reload()' class='operation-button'>Spróbuj ponownie</button>";
        echo "</div>";
    }
?>