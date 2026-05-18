<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body id="login-page">
    <header class="head-container">
        <h2 class="page-title">
            Księgarnia
        </h2>
        <nav>
            <a href="index.php">Dostępne książki </a>
            <a href="add_book.php">Dodaj książkę </a>
            <a href="store.php">Magazyn</a>
            <a href="users.php">Użytkownicy</a>
        </nav>
        <h2 class="subpage-title">Logowanie/Rejestracja</h2>
    </header>
    <main>
        
        <form action="login.php" method="post" class="login-form">
            <section class="login-inputs">
                <p>
                    <label for="emailLoginInput">Adres e-mail</label>
                    <input type="email" name="emailLoginInput" id="emailLoginInput" class="form-input" placeholder="Wpisz adres E-mail">
                    <span id="emailLoginError" class="error-message">Email jest wymagany, musi zawierać znak '@'!</span>
                </p>
                <p>
                    <label for="passwordLoginInput">Hasło</label>
                    <input type="password" name="passwordLoginInput" id="passwordLoginInput" class="form-input" placeholder="Wpisz hasło">
                    <span id="passwordLoginError" class="error-message">Hasło jest wymagane!</span>
                </p>
                <p class="toggle-login-screens-button" onclick="clearForm();toggleLoginScreens()">Nie masz jeszcze konta? Zarejestruj się.</p>
            </section>
            <section class="operations">
                <input type="reset" value="Wyczyść" class="operation-button" onclick="clearForm()">
                <input type="button" value="Zaloguj" class="operation-button submit-button" id="loginSubmitButton">
            </section>
            <?php
                include "DB_manager.php";
                include "DB_queries.php";
                include "error_handler.php";

                if(isset($_POST["emailLoginInput"]) && isset($_POST["passwordLoginInput"])){
                    $emailInput = $_POST["emailLoginInput"];
                    $passwordInput = $_POST["passwordLoginInput"];
                    $userLoginOutput = getDataFromDB(getLoginUserData($emailInput, $passwordInput));
                    if($userLoginOutput == "error"){
                        connectionErrorHandler();
                    } else {
                        if(mysqli_num_rows($userLoginOutput) == 0){
                            echo "<p class='error-message' style='display:block;'>Nieprawidłowy e-mail lub hasło</p>";
                        }else{
                            foreach($userLoginOutput as $userData){
                                $userName = $userData["user_name"];
                                $_SESSION["userName"] = $userName;
                                header("Location: index.php");                        
                            }
                        }
                    }                                                           
                }

            ?>
        </form>
        
        
        <form action="login.php" method="post" class="register-form display-none">
            <section class="register-inputs">
                <p>
                    <label for="userNameInput">Nazwa użytkownika</label>
                    <input type="text" name="userNameInput" id="userNameInput" class="form-input" placeholder="Wpisz nazwę użytkownika">
                    <span id="userNameError" class="error-message"></span>
                </p>
                <p>
                    <label for="emailRegisterInput">Adres e-mail</label>
                    <input type="email" name="emailRegisterInput" id="emailRegisterInput" class="form-input" placeholder="Wpisz adres E-mail">
                    <span id="emailRegisterError" class="error-message"></span>
                </p>
                <p>
                    <label for="passwordRegisterInput">Hasło</label>
                    <input type="password" name="passwordRegisterInput" id="passwordRegisterInput" class="form-input" placeholder="Wpisz hasło">
                    <span id="passwordRegisterError" class="error-message"></span>
                </p>
                <p>
                    <label for="passwordRepeatInput">Powtórz hasło</label>
                    <input type="password" name="passwordRepeatInput" id="passwordRepeatInput" class="form-input" placeholder="Wpisz hasło">
                    <span id="passwordRepeatError" class="error-message">Podane hasła muszą być takie same!</span>
                </p>

                <p class="toggle-login-screens-button" onclick="clearForm();toggleLoginScreens()">Masz już konto? Zaloguj się.</p>
            </section>
            <section class="operations">
                <input type="reset" value="Wyczyść" class="operation-button" onclick="clearForm()">
                <input type="button" value="Zarejestruj" class="operation-button submit-button" id="registerSubmitButton">
            </section>
            <?php
               

                if(isset($_POST["userNameInput"]) && isset($_POST["emailRegisterInput"]) && isset($_POST["passwordRegisterInput"]) && !empty($_POST["userNameInput"]) && !empty($_POST["emailRegisterInput"]) && !empty($_POST["passwordRegisterInput"])){
                    $userNameInput = $_POST["userNameInput"];
                    $emailInput = $_POST["emailRegisterInput"];
                    $passwordInput = $_POST["passwordRegisterInput"];
                    if(isUserNameNotUsed($userNameInput) && isEmailNotUsed($emailInput)){
                        $addUser = getDataFromDB(insertNewUserIntoDB($userNameInput, $emailInput, $passwordInput));
                        echo "<p class='success-message' style='display:block;'>Konto zostało pomyślnie utworzone! <em onclick='clearForm();toggleLoginScreens()'>Zaloguj się!</em></p>";
                        
                    }
                }

                function isUserNameNotUsed($userName){
                    $userNameOutput = getDataFromDB(checkUserName($userName));
                    if($userNameOutput == "error"){
                        connectionErrorHandler();
                    }else{
                        if(mysqli_num_rows($userNameOutput) != 0){
                            echo "<p class='error-message' style='display:block;'>Nazwa użytkownika jest już zajęta!</p>";
                            return false;
                        }
                        return true; 
                    }
                    return false;                                                            
                    
                }
                function isEmailNotUsed($email){
                    $emailOutput = getDataFromDB(checkEmail($email));
                    if($emailOutput == "error"){
                        connectionErrorHandler();
                    }else{
                        if(mysqli_num_rows($emailOutput) != 0){
                            echo "<p class='error-message' style='display:block;'>Email jest już użyty!</p>";
                            return false;
                        }
                        return true;
                    }
                    return false;                   
                    
                }
            
            ?>
        </form>
    </main>
</body>
</html>
