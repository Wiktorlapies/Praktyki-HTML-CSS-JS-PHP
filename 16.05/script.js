//Funckje identyfikacji strony

document.addEventListener("DOMContentLoaded", checkPageId); 
//po zaladowaniu strony aktywuje funkcje uruchamiajaca funckje odpowiadajaca stronie

function checkPageId(){
    const pageId = document.body.id;    //Pobranie id strony
    switch(pageId){
        case "register-page":           
            isRegisterDataValid();      //Aktywacja funkcji dla strony
            break;
        case "login-page":
            isLoginDataValid();
            break;
        case "add-book-page":
            isBookDataValid();
            break;
        case "book-store-page":
            document.getElementById("currentDate").textContent = getCurrentDate();
            break;
        case "users-list-page":
            document.getElementById("currentDate").textContent = getCurrentDate();
            break;
    }

}




function getCurrentDate() {
    const months = ["Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwca", "Lipca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia"];
    let currentYear = new Date().getFullYear();
    let currentMonth = months[new Date().getMonth()];
    let currentDay = new Date().getDate();
    let currentDate = `${currentDay} ${currentMonth} ${currentYear}`;
    return currentDate;
}

//login.php

function toggleLoginScreens(){
    const loginForm = document.querySelector(".login-form");
    const registerForm = document.querySelector(".register-form");

    loginForm.classList.toggle("display-none");
    registerForm.classList.toggle("display-none");

    //zmiana ID strony w zależnosci od widocznego formularza
    if(registerForm.classList.contains("display-none")){
        document.body.id = "login-page";
    }else{
        document.body.id = "register-page";
    }
    checkPageId();  //uruchomienie funkcji ładującej funkcje dla stron
}

// form universal methods

function setInvalidInput(x){
    x.classList.add("invalid-input");
    x.classList.remove("valid-input");
}
function setValidInput(x){
    x.classList.remove("invalid-input");
    x.classList.add("valid-input");
}

function clearForm(){
    const formInputs = document.querySelectorAll(".form-input");
    formInputs.forEach(formInput => {
        formInput.classList.remove("invalid-input");
        formInput.classList.remove("valid-input");
        formInput.value = "";
    })

    const errorMessages = document.querySelectorAll(".error-message");

    errorMessages.forEach(errorMessage => {
        errorMessage.style.display = "none";
    });

    //Sprawdza id strony i odblokowuje dla niej przycisk submit
    const pageId = document.body.id;
    switch(pageId){
        case "register-page":
            document.querySelector("#registerSubmitButton").disabled = false;
            break;
        case "login-page":
            document.querySelector("#loginSubmitButton").disabled = false;
            break;
        case "add-book-page":
            document.querySelector("#addBookSubmitButton").disabled = false;
            break;

    }
}



// add_Book.php - validation

function isBookDataValid(){
   const bookTitleInput = document.querySelector("#bookTitle");
   const bookAuthorInput = document.querySelector("#bookAuthor");
   const bookPriceInput = document.querySelector("#bookPrice");
   const isbnInput = document.querySelector("#isbn");
   const bookPagesInput = document.querySelector("#bookPages");
   const bookDescriptionInput = document.querySelector("#bookDescription");
   const submitButton = document.querySelector("#addBookSubmitButton");

   bookTitleInput.addEventListener("blur", validateTitleInput);
   bookAuthorInput.addEventListener("blur", validateAuthorInput);
   bookPriceInput.addEventListener("blur", validatePriceInput);
   isbnInput.addEventListener("blur", validateIsbnInput);
   bookPagesInput.addEventListener("blur", validatePagesInput);
   bookDescriptionInput.addEventListener("blur", validateDescriptionInput);
   
   submitButton.addEventListener("click", function(){
        validateTitleInput();
        validateAuthorInput();
        validatePriceInput();
        validateIsbnInput();
        validatePagesInput();
        validateDescriptionInput();
        updateAddBookSubmitButtonState();
   })
}

function updateAddBookSubmitButtonState() {
    const submitButton = document.querySelector("#addBookSubmitButton");
    const titleInput = document.querySelector("#bookTitle");
    const authorInput = document.querySelector("#bookAuthor");
    const priceInput = document.querySelector("#bookPrice");
    const isbnInput = document.querySelector("#isbn");
    const pagesInput = document.querySelector("#bookPages");
    const descriptionInput = document.querySelector("#bookDescription");

    const isValid = 
        titleInput.classList.contains("valid-input") &&
        authorInput.classList.contains("valid-input") &&
        priceInput.classList.contains("valid-input") &&
        isbnInput.classList.contains("valid-input") &&
        pagesInput.classList.contains("valid-input") &&
        descriptionInput.classList.contains("valid-input");

    submitButton.disabled = !isValid;
}


function validateTitleInput(){
    const maxTitleLength = 40;
    const bookTitleInput = document.querySelector("#bookTitle");
    const titleInputValue = bookTitleInput.value;
    const titleError = document.querySelector("#titleError");

    if (titleInputValue.trim() == "" || titleInputValue.length > maxTitleLength){

        setInvalidInput(bookTitleInput);
        titleError.style.display = "block";

        let titleErrorMessage = `Nazwa tytułu jest wymagana i nie może być dłuższa niż ${maxTitleLength} znaków\n\n`;
        titleError.textContent = titleErrorMessage;
        updateAddBookSubmitButtonState();
    }else{
        setValidInput(bookTitleInput);
        titleError.style.display = "none";
        updateAddBookSubmitButtonState();

    }
}   

function validateAuthorInput(){
    const maxAuthorLength = 30;
    const bookAuthorInput = document.querySelector("#bookAuthor");
    const authorInputValue = bookAuthorInput.value;
    const authorError = document.querySelector("#authorError");


    if (authorInputValue.trim() == "" || authorInputValue.length > maxAuthorLength){

        setInvalidInput(bookAuthorInput);
        authorError.style.display = "block";

        let authorErrorMessage = `Nazwa autora jest wymagana i nie może być dłuższa niż ${maxAuthorLength} znaków\n\n`;
        authorError.textContent = authorErrorMessage;

        updateAddBookSubmitButtonState();
    }else{
        setValidInput(bookAuthorInput);
        authorError.style.display = "none";
        updateAddBookSubmitButtonState();

    }
}


function validatePriceInput(){

    const bookPriceInput = document.querySelector("#bookPrice");
    const priceError = document.querySelector("#priceError");
    const priceInputValue = bookPriceInput.value;

    if (priceInputValue == "" || priceInputValue < 0){

        setInvalidInput(bookPriceInput);
        priceError.style.display = "block";

        let priceErrorMessage = "Cena jest wymagana i nie może być liczbą ujemną\n\n";
        priceError.textContent = priceErrorMessage;

        updateAddBookSubmitButtonState();
    }else{
        setValidInput(bookPriceInput);
        priceError.style.display = "none";
        updateAddBookSubmitButtonState();

    }
}

function validateIsbnInput(){

    const isbnInput = document.querySelector("#isbn");
    const isbnInputValue = isbnInput.value;
    const isbnError = document.querySelector("#isbnError");

    if (isbnInputValue.trim() == "" || isbnInputValue.length != 17 || (isbnInputValue.substring(0,4) != "978-" && isbnInputValue.substring(0,4) != "979-")){

        setInvalidInput(isbnInput);
        isbnError.style.display = "block";

        let isbnErrorMessage = "Numer ISBN należy zapisać zgodnie z przykładem '978-x-xxx-xxxxx-x' lub '979-x-xxx-xxxxx-x', musi on mieć dokładnie 13 liczb i 4 myślniki\n\n";
        isbnError.textContent = isbnErrorMessage;

        updateAddBookSubmitButtonState();
    }else{
        setValidInput(isbnInput);
        isbnError.style.display = "none";
        updateAddBookSubmitButtonState();

    }
}

function validatePagesInput(){

    const bookPagesInput = document.querySelector("#bookPages");
    const pagesInputValue = bookPagesInput.value;
    const pagesError = document.querySelector("#pagesError");



    if (pagesInputValue < 0){

        setInvalidInput(bookPagesInput);
        pagesError.style.display = "block";

        let pagesErrorMessage = "Liczba stron nie może być ujemna\n\n";
        pagesError.textContent = pagesErrorMessage;

        updateAddBookSubmitButtonState();
    }else{
        setValidInput(bookPagesInput);
        pagesError.style.display = "none";
        updateAddBookSubmitButtonState();

    }
}

function validateDescriptionInput(){

    const bookDescriptionInput = document.querySelector("#bookDescription");
    const descriptionInputValue = bookDescriptionInput.value;
    const descriptionError = document.querySelector("#descriptionError");
    const maxDescriptionLength = 2000;

    if(descriptionInputValue.length > maxDescriptionLength){

        setInvalidInput(bookDescriptionInput);
        descriptionError.style.display = "block";

        let descriptionErrorMessage = `Opis nie może mieć więcej niż ${maxDescriptionLength} znaków\n\n`;
        descriptionError.textContent = descriptionErrorMessage;

        updateAddBookSubmitButtonState();
    }else{
        setValidInput(bookDescriptionInput);
        descriptionError.style.display = "none";
        updateAddBookSubmitButtonState();
    }
}

// login.php - register validation

function isRegisterDataValid(){
    const userNameInput = document.querySelector("#userNameInput");
    const emailInput = document.querySelector("#emailRegisterInput");
    const passwordInput = document.querySelector("#passwordRegisterInput");
    const passwordRepeatInput = document.querySelector("#passwordRepeatInput");
    const submitButton = document.querySelector("#registerSubmitButton");

    //Wykrywanie odklikniec na poszczegolnych inputach, nastepnie uruchamianie walidacji dla inputow
    userNameInput.addEventListener("blur", validateRegisterUserNameInput);  
    emailInput.addEventListener("blur", validateRegisterEmailInput);
    passwordInput.addEventListener("blur", validateRegisterPasswordInput);
    passwordRepeatInput.addEventListener("blur", validateRegisterPasswordInput);
    
    submitButton.addEventListener("click", function(){                  
        //Po kliknieciu "submit" najpierw sprawdzi czy wszystko jest 
        // poprawnie wpisane i ewentualnie zablokuje przycisk
        validateRegisterUserNameInput();
        validateRegisterEmailInput();
        validateRegisterPasswordInput();
        updateRegisterSubmitButtonState();
    })

}

function updateRegisterSubmitButtonState() {
    //Detekcja obecnosci klasy "valid-input", jezeli choc jeden input jej nie ma, blokuje submita
    const submitButton = document.querySelector("#registerSubmitButton");
    const userNameInput = document.querySelector("#userNameInput");
    const emailInput = document.querySelector("#emailRegisterInput");
    const passwordInput = document.querySelector("#passwordRegisterInput");
    const passwordRepeatInput = document.querySelector("#passwordRepeatInput");

    const isValid = 
        userNameInput.classList.contains("valid-input") &&
        emailInput.classList.contains("valid-input") &&
        passwordInput.classList.contains("valid-input") &&
        passwordRepeatInput.classList.contains("valid-input");

    submitButton.disabled = !isValid;
}



function validateRegisterUserNameInput(){
    const userNameInput = document.querySelector("#userNameInput");
    const userNameInputValue = userNameInput.value;
    const userNameError = document.querySelector("#userNameError");
    
    const userNameMaxLength = 50;
    
    if(userNameInputValue.trim() == "" || userNameInputValue.length > userNameMaxLength){
        setInvalidInput(userNameInput);
        userNameError.textContent = `Nazwa użytkownika jest wymagana i nie może mieć więcej niż ${userNameMaxLength} znaków`;
        userNameError.style.display = "block";
        updateRegisterSubmitButtonState();
    }else{
        setValidInput(userNameInput);
        userNameError.style.display = "none";
        updateRegisterSubmitButtonState();
    }
}

function validateRegisterEmailInput(){
    const emailInput = document.querySelector("#emailRegisterInput");
    const emailInputValue = emailInput.value;
    const emailError = document.querySelector("#emailRegisterError");
    
    const emailMaxLength = 100;

    if(emailInputValue.trim() == "" || emailInputValue.length > emailMaxLength || !emailInputValue.includes("@")){
        setInvalidInput(emailInput);
        emailError.textContent = `Email jest wymagany, musi zawierać znak '@' i nie może mieć więcej niż ${emailMaxLength} znaków`;
        emailError.style.display = "block";
        updateRegisterSubmitButtonState();

    }else{
        setValidInput(emailInput);
        emailError.style.display = "none";
        updateRegisterSubmitButtonState();
    }
}



function validateRegisterPasswordInput(){
    const passwordInput = document.querySelector("#passwordRegisterInput");
    const passwordInputValue = passwordInput.value;
    const passwordError = document.querySelector("#passwordRegisterError");
    const passwordMinLength = 8;
    const passwordMaxLength = 50;

    if(passwordInputValue.trim() == "" || passwordInputValue.length < passwordMinLength || passwordInputValue.length > passwordMaxLength){
        setInvalidInput(passwordInput);
        passwordError.textContent = `Hasło jest wymagane i musi mieć od ${passwordMinLength} do ${passwordMaxLength} znaków`;
        passwordError.style.display = "block";
        updateRegisterSubmitButtonState();
    }else{
        passwordError.style.display = "none";
        
        const passwordRepeatInput = document.querySelector("#passwordRepeatInput");
        const passwordRepeatInputValue = passwordRepeatInput.value;
        const passwordRepeatError = document.querySelector("#passwordRepeatError");
        
        if(passwordInputValue == passwordRepeatInputValue){
            passwordRepeatError.style.display = "none";
            setValidInput(passwordInput);
            setValidInput(passwordRepeatInput);
            updateRegisterSubmitButtonState();

        }else{
            passwordRepeatError.style.display = "block";
            passwordRepeatInput.value = "";
            setInvalidInput(passwordInput);
            setInvalidInput(passwordRepeatInput);
            updateRegisterSubmitButtonState();

    }
    }
}

//login.php - login validation



function isLoginDataValid(){
    const emailInput = document.querySelector("#emailLoginInput");
    const passwordInput = document.querySelector("#passwordLoginInput");
    const submitButton = document.querySelector("#loginSubmitButton");

    //Wykrywanie odklikniec na poszczegolnych inputach, nastepnie uruchamianie walidacji dla inputow
    emailInput.addEventListener("blur", validateLoginEmailInput);
    passwordInput.addEventListener("blur", validateLoginPasswordInput);
    
    submitButton.addEventListener("click", function(){                  
        //Po kliknieciu "submit" najpierw sprawdzi czy wszystko jest 
        // poprawnie wpisane i ewentualnie zablokuje przycisk
        validateLoginEmailInput();
        validateLoginPasswordInput();
        updateLoginSubmitButtonState();
    })

}

function updateLoginSubmitButtonState() {
    //Detekcja obecnosci klasy "valid-input", jezeli choc jeden input jej nie ma, blokuje submita
    const submitButton = document.querySelector("#loginSubmitButton");
    const emailInput = document.querySelector("#emailLoginInput");
    const passwordInput = document.querySelector("#passwordLoginInput");

    const isValid = 
        emailInput.classList.contains("valid-input") &&
        passwordInput.classList.contains("valid-input");

    submitButton.disabled = !isValid;
}

function validateLoginEmailInput(){
    const emailInput = document.querySelector("#emailLoginInput");
    const emailInputValue = emailInput.value;
    const emailError = document.querySelector("#emailLoginError");

    if(emailInputValue.trim() == "" || !emailInputValue.includes("@")){
        setInvalidInput(emailInput);
        emailError.style.display = "block";
        updateLoginSubmitButtonState();

    }else{
        setValidInput(emailInput);
        emailError.style.display = "none";
        updateLoginSubmitButtonState();
    }
}

function validateLoginPasswordInput(){
    const passwordInput = document.querySelector("#passwordLoginInput");
    const passwordInputValue = passwordInput.value;
    const passwordError = document.querySelector("#passwordLoginError");
    if(passwordInputValue.trim() == ""){
        setInvalidInput(passwordInput);
        passwordError.style.display = "block";
        updateLoginSubmitButtonState();
    }else{
        setValidInput(passwordInput);
        passwordError.style.display = "none";
        updateLoginSubmitButtonState();
    }

}