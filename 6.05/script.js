
function getCurrentDate() {
    const months = ["Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwca", "Lipca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia"];
    let currentYear = new Date().getFullYear();
    let currentMonth = months[new Date().getMonth()];
    let currentDay = new Date().getDate();
    let currentDate = `${currentDay} ${currentMonth} ${currentYear}`;
    return currentDate;
}


function setInvalidInput(x){
    x.value = "";
    x.classList.add("invalid-input");
    x.classList.remove("valid-input");
}
function setValidInput(x){
    x.classList.remove("invalid-input");
    x.classList.add("valid-input");
}

function clearForm(){
    let formInputs = document.querySelectorAll(".form-input");

    formInputs.forEach(formInput => {
        formInput.classList.remove("invalid-input");
        formInput.classList.remove("valid-input");
    })

    let errorMessages = document.querySelectorAll(".error-message");

    errorMessages.forEach(errorMessage => {
        errorMessage.style.display = "none";
    });
}


function isDataValid(){
   


    let titleValid = validateTitleInput();
    let authorValid = validateAuthorInput();
    let priceValid = validatePriceInput();
    let isbnValid = validateIsbnInput();
    let pagesValid = validatePagesInput();
    let descriptionValid = validateDescriptionInput();

    if (!titleValid || !authorValid || !priceValid || !isbnValid || !pagesValid || !descriptionValid){
        
        return false;
    }
    return true;
}


function validateTitleInput(){
    const maxTitleLength = 40;
    let bookTitleInput = document.getElementById("bookTitle");
    let titleInputValue = bookTitleInput.value;
    let titleError = document.getElementById("titleError");

    if (titleInputValue.trim() == "" || titleInputValue.length > maxTitleLength){

        setInvalidInput(bookTitleInput);
        titleError.style.display = "block";

        let titleErrorMessage = `Nazwa tytułu jest wymagana i nie może być dłuższa niż ${maxTitleLength} znaków\n\n`;
        titleError.textContent = titleErrorMessage;
        return false;
    }else{
        setValidInput(bookTitleInput);
        titleError.style.display = "none";
        return true;

    }
}   

function validateAuthorInput(){
    const maxAuthorLength = 30;
    let bookAuthorInput = document.getElementById("bookAuthor");
    let authorInputValue = bookAuthorInput.value;
    let authorError = document.getElementById("authorError");


    if (authorInputValue.trim() == "" || authorInputValue.length > maxAuthorLength){

        setInvalidInput(bookAuthorInput);
        authorError.style.display = "block";

        let authorErrorMessage = `Nazwa autora jest wymagana i nie może być dłuższa niż ${maxAuthorLength} znaków\n\n`;
        authorError.textContent = authorErrorMessage;

        return false;
    }else{
        setValidInput(bookAuthorInput);
        authorError.style.display = "none";
        return true;

    }
}


function validatePriceInput(){

    let bookPriceInput = document.getElementById("bookPrice");
    let priceError = document.getElementById("priceError");
    let priceInputValue = bookPriceInput.value;

    if (priceInputValue == "" || priceInputValue < 0){

        setInvalidInput(bookPriceInput);
        priceError.style.display = "block";

        let priceErrorMessage = "Cena jest wymagana i nie może być liczbą ujemną\n\n";
        priceError.textContent = priceErrorMessage;

        return false;
    }else{
        setValidInput(bookPriceInput);
        priceError.style.display = "none";
        return true;

    }
}

function validateIsbnInput(){

    let isbnInput = document.getElementById("isbn");
    let isbnInputValue = isbnInput.value;
    let isbnError = document.getElementById("isbnError");

    if (isbnInputValue.trim() == "" || isbnInputValue.length != 17 || (isbnInputValue.substring(0,4) != "978-" && isbnInputValue.substring(0,4) != "979-")){

        setInvalidInput(isbnInput);
        isbnError.style.display = "block";

        let isbnErrorMessage = "Numer ISBN należy zapisać zgodnie z przykładem '978-x-xxx-xxxxx-x' lub '979-x-xxx-xxxxx-x', musi on mieć dokładnie 13 liczb i 4 myślniki\n\n";
        isbnError.textContent = isbnErrorMessage;

        return false;
    }else{
        setValidInput(isbnInput);
        isbnError.style.display = "none";
        return true;

    }
}

function validatePagesInput(){

    let bookPagesInput = document.getElementById("bookPages");
    let pagesInputValue = bookPagesInput.value;
    let pagesError = document.getElementById("pagesError");


    if (pagesInputValue < 0){

        setInvalidInput(bookPagesInput);
        pagesError.style.display = "block";

        let pagesErrorMessage = "Liczba stron nie może być ujemna\n\n";
        pagesError.textContent = pagesErrorMessage;

        return false;
    }else{
        setValidInput(bookPagesInput);
        pagesError.style.display = "none";
        return true;

    }
}

function validateDescriptionInput(){

    let bookDescriptionInput = document.getElementById("bookDescription");
    let descriptionInputValue = bookDescriptionInput.value;
    let descriptionError = document.getElementById("descriptionError");


    if(descriptionInputValue.length > 1000){

        setInvalidInput(bookDescriptionInput);
        descriptionError.style.display = "block";

        let descriptionErrorMessage = "Opis nie może mieć więcej niż 1000 znaków\n\n";
        descriptionError.textContent = descriptionErrorMessage;

        return false;
    }else{
        setValidInput(bookDescriptionInput);
        descriptionError.style.display = "none";
        return true;
    }
}