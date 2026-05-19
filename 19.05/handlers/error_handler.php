<?php
    function connectionErrorHandler(){
        echo "<div class='conn-error-container'>";
        echo "<p class='conn-error'>Ups! Coś poszło nie tak:<br> Błąd połączenia z bazą danych</p>";
        echo "<button onclick='window.location.reload()' class='operation-button'>Spróbuj ponownie</button>";
        echo "</div>";
    }

    function connectionErrorAddBookSendBack(){
        header("Location: ../add_book.php?connError=1");
        exit();
    }
    function connectionErrorLoginSendBack(){
        header("Location: ../login.php?connError=1");
        exit();
    }
    function connectionErrorBookQtSendBack(){
        header("Location: ../change_book_qt.php?connError=1");
        exit();
    }
?>