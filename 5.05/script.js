const storeHeader = document.querySelector("#store_header");
const months = ["Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwca", "Lipca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia"];
let currentYear = new Date().getFullYear();
let currentMonth = months[new Date().getMonth()];
let currentDay = new Date().getDate();
let currentDate = `${currentDay} ${currentMonth} ${currentYear}`;
storeHeader.textContent += currentDate;