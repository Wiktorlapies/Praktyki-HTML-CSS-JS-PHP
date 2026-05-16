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
            Księgarnia
            <a href="login.php" class="login-button">Zaloguj/Zarejestruj</a>
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <a href="add_book.php">Dodaj książkę </a>
            <a href="store.php">Magazyn</a>
            <a href="users.php">Użytkownicy</a>
        </nav>
        <h2 class="subpage-title">Dodaj książkę</h2>
    </header>
    <main>
        <form action="" method="post" class="book-data-form">
            <div class="book-data-inputs">
                <p>
                    <label for="bookTitle">Tytuł</label>
                    <input type="text" name="bookTitle" id="bookTitle" class="form-input" placeholder="Wpisz tytuł książki"><br>
                    <span id="titleError" class="error-message"></span>
                </p>
                <p>
                    <label for="bookAuthor">Autor</label>
                    <input type="text" name="bookAuthor" id="bookAuthor" class="form-input" placeholder="Wpisz autora książki"><br>
                    <span id="authorError" class="error-message"></span>
                </p>
                <p>
                    <label for="bookPrice">Cena</label>
                    <input type="number" step="0.01" name="bookPrice" id="bookPrice" class="form-input" placeholder="Wpisz cenę książki"><br>
                    <span id="priceError" class="error-message"></span>
                </p>
                <p>
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-input" placeholder="Wpisz nr ISBN książki"><br>
                    <span id="isbnError" class="error-message"></span>
                </p>
                <p>
                    <label for="bookPages">Strony</label>
                    <input type="number" name="bookPages" id="bookPages" class="form-input" placeholder="Wpisz ilość stron książki"><br>
                    <span id="pagesError" class="error-message"></span>
                </p>
                <p>
                    <label for="bookDescription">Opis</label>
                    <textarea name="bookDescription" id="bookDescription" class="form-input" placeholder="Wpisz opis książki"></textarea>
                    <span id="descriptionError" class="error-message"></span>
                </p>
            </div>
            <div class="operations">
                <input type="reset" value="Wyczyść" class="operation-button" onclick="clearForm()">
                <input type="submit" value="Dodaj" class="operation-button submit-button" id="addBookSubmitButton" onclick="return isBookDataValid()">
            </div>

        </form>
    </main>
</body>
</html>