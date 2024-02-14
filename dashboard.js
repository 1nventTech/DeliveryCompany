function qs(i) { return document.querySelector(i); }
function qsa(i) { return document.querySelectorAll(i); }

class Oddzial {
     constructor(nazwa, ulica, nrDomu, nrLokalu, kodPocztowy, miejscowosc, telefon, email) {
         this.name = nazwa;
         this.street = ulica;
         this.houseNumber = nrDomu;
         this.apartmentNumber = nrLokalu;
         this.postalCode = kodPocztowy;
         this.city = miejscowosc;
         this.phone = telefon;
         this.email = email;
     }
 }
 

let rno = qs("input[value='Zarejstruj odzział']");

rno.addEventListener('click', (e) => {
     senddata();
     e.preventDefault();
});

function senddata() {
     let vals = document.querySelectorAll("#oddzialdiv form > input[type='text']");
     let oddzialObj = {};
 
     vals.forEach(input => {
         let attributeName = input.getAttribute('name');
         let inputValue = input.value;
         console.log(inputValue);
         oddzialObj[attributeName] = inputValue;
     });
 
     let jsonData = JSON.stringify(oddzialObj);
 
     let xhttp = new XMLHttpRequest();
 
     xhttp.open("POST", "createbranch.php", true);
 
     xhttp.setRequestHeader("Content-Type", "application/json");
 
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4) {
             if (this.status == 200) {
                 console.log("Odpowiedź serwera:", this.responseText);
                 let response = JSON.parse(this.responseText);
                 if (response.success) {
                     alert("Pomyślnie zarejestrowano oddział!");
                     refreshTable();
                 } else {
                     alert("Wystąpił błąd podczas rejestracji oddziału.");
                 }
             } else {
                 alert("Wystąpił problem podczas wysyłania danych.");
             }
         }
     };
 
     xhttp.send(jsonData);
 }
 
 // Funkcja odświeżająca dane w tabeli
 function refreshTable() {
     let branchTable = document.getElementById("branchTable");
 
     let xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             branchTable.innerHTML = this.responseText;
         }
     };
     xhttp.open("GET", "get_branches.php", true);
     xhttp.send();
 }
 
 
 

qs(".close-btn").addEventListener('click', function () {
     qs('.settings').style.display = 'none';
});