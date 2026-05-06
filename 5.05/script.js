
function getCurrentDate() {
    const months = ["Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwca", "Lipca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia"];
    let currentYear = new Date().getFullYear();
    let currentMonth = months[new Date().getMonth()];
    let currentDay = new Date().getDate();
    let currentDate = `${currentDay} ${currentMonth} ${currentYear}`;
    return currentDate;
}

const bookTitleInput = document.getElementById("bookTitle");
const bookAuthorInput = document.getElementById("bookAuthor");
const bookPriceInput = document.getElementById("bookPrice");
const isbnInput = document.getElementById("isbn");
const bookPagesInput = document.getElementById("bookPages");
const bookDescriptionInput = document.getElementById("bookDescription");
let inputErrors = "";
function invalidInput(x){
    x.value = "";
    x.classList.add("invalid-input");
    x.placeholder = "Niepoprawne dane";
}
function isDataValid(){
   

    let titleInputValue = bookTitleInput.value;
    let authorInputValue = bookAuthorInput.value;
    let priceInputValue = bookPriceInput.value;
    let isbnInputValue = isbnInput.value;
    let pagesInputValue = bookPagesInput.value;
    let descriptionInputValue = bookDescriptionInput.value;

    let titleValid = validateTitleInput(titleInputValue);
    let authorValid = validateAuthorInput(authorInputValue);
    let priceValid = validatePriceInput(priceInputValue);
    let isbnValid = validateIsbnInput(isbnInputValue);
    let pagesValid = validatePagesInput(pagesInputValue);
    let descriptionValid = validateDescriptionInput(descriptionInputValue);

    if (!titleValid || !authorValid || !priceValid || !isbnValid || !pagesValid || !descriptionValid){
        alert(inputErrors);
        inputErrors = "";
        return false;
    }
    return true;
}


function validateTitleInput(titleInputValue){
    const maxTitleLength = 10;
    if (titleInputValue == "" || titleInputValue.length > maxTitleLength){
        invalidInput(bookTitleInput);
        inputErrors += `Nazwa tytułu jest wymagana i nie może być dłuższa niż ${maxTitleLength} znaków\n\n`;
        return false;
    }else{
        return true;
    }
}   

function validateAuthorInput(authorInputValue){
    const maxAuthorLength = 10;
    if (authorInputValue == "" || authorInputValue.length > maxAuthorLength){
        invalidInput(bookAuthorInput);
        inputErrors += `Nazwa autora jest wymagana i nie może być dłuższa niż ${maxAuthorLength} znaków\n\n`;
        return false;
    }else{
        return true;
    }
}


function validatePriceInput(priceInputValue){
    if (priceInputValue == "" || priceInputValue < 0){
        invalidInput(bookPriceInput);
        inputErrors += "Cena jest wymagana i nie może być liczbą ujemną\n\n";
        return false;
    }else{
        return true;
    }
}

function validateIsbnInput(isbnInputValue){
    if (isbnInputValue == "" || isbnInputValue.length != 17 || (isbnInputValue.substring(0,4) != "978-" && isbnInputValue.substring(0,4) != "979-")){
        invalidInput(isbnInput);
        inputErrors += "Numer ISBN należy zapisać zgodnie z przykładem '978-x-xxx-xxxxx-x' lub '979-x-xxx-xxxxx-x', musi on mieć dokładnie 13 liczb i 4 myślniki\n\n";
        return false;
    }else{
        return true;
    }
}

function validatePagesInput(pagesInputValue){
    if (pagesInputValue < 0){
        invalidInput(bookPagesInput);
        inputErrors += "Liczba stron nie może być ujemna\n\n";
        return false;
    }else{
        return true;
    }
}

function validateDescriptionInput(descriptionInputValue){
    if(descriptionInputValue.length > 1000){
        invalidInput(bookDescriptionInput);
        inputErrors += "Opis nie może mieć więcej niż 1000 znaków\n\n"
        return false;
    }else{
        return true;
    }
}