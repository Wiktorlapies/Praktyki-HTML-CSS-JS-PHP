<?php
    session_start();
    session_unset();
    session_destroy();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <style>
        h3{
            font-size: 2rem;
            font-weight: bold;
            margin-top: 100px;
            text-align:center;
            color: green;
            display:flex;
            justify-content:center;
            height: 25px;
        }
        #comebackCountdown{
            margin-top: 10px;
            font-size: 1.5rem;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body id="logout-page">
    <header class="head-container">
        <h2 class="page-title">
            Księgarnia
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
        </nav>
        <h2 class="subpage-title">Zostałeś wylogowany</h2>
    </header>
    <main>
    <h3>Wylogowano pomyślnie!</h3>
    <h3 id="comebackCountdown">Za 5s powrócisz do strony głównej</h3>

    
    </main>
</body>
</html>