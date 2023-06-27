// Pobierz element do wyświetlania komunikatu
var messageElementAdd = document.getElementById("messageAdd");

// Pobierz wszystkie przyciski "Dodaj" z klasą .btn-outline-success
var addButtons = document.querySelectorAll(".button-add");

// Pobierz modal edycji użytkownika
var modalAdd = document.querySelector("#modal-add");

// Pobierz formularz wewnątrz modala
var formAdd = modalAdd.querySelector("form");

// Pobierz przycisk "Dodaj"
var saveButton = modalAdd.querySelector(".btn-primary");

// Pobierz element <select> dla szefa
var inputSzefAdd = formAdd.querySelector("#inputSzefAdd");
inputSzefAdd = addSzefowieToSelect(inputSzefAdd);

// Pobierz element <select> dla działu
var inputDzialAdd = formAdd.querySelector("#inputDzialAdd");
inputDzialAdd = addDzialyToSelect(inputDzialAdd);


// Utwórz funkcję obsługującą zdarzenie kliknięcia przycisku "Dodaj"
saveButton.addEventListener("click", function () {
  // Pobierz wartości pól formularza
  var imie = formAdd.querySelector("#inputImieAdd").value;
  var nazwisko = formAdd.querySelector("#inputNazwiskoAdd").value;
  var dataUrodzenia = formAdd.querySelector("#inputDataUrodzeniaAdd").value;
  var telefon = formAdd.querySelector("#inputTelefonAdd").value;
  var mail = formAdd.querySelector("#inputMailAdd").value;
  var adres = formAdd.querySelector("#inputAdresAdd").value;
  var szefId = formAdd.querySelector("#inputSzefAdd").value;
  var dzialId = formAdd.querySelector("#inputDzialAdd").value;

  // Sprawdź poprawność pól formularza
  var isValid = true;

  if (imie.trim() === "") {
    // Pole imię jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formAdd.querySelector("#inputImieAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputImieAdd").classList.remove("is-invalid");
  }

  if (nazwisko.trim() === "") {
    // Pole nazwisko jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola nazwisko
    formAdd.querySelector("#inputNazwiskoAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputNazwiskoAdd").classList.remove("is-invalid");
  }

  var mailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

  if (mail.trim() !== "" && !mailRegex.test(mail)) {
    // Pole mail nie zawiera poprawnego adresu email
    isValid = false;
    // Wyświetl komunikat błędu dla pola mail
    formAdd.querySelector("#inputMailAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputMailAdd").classList.remove("is-invalid");
  }

  var telefonRegex = /^[\d+]+$/;

  if (telefon.trim() !== "" && !telefonRegex.test(telefon)) {
    // Pole telefon zawiera niedozwolone znaki
    isValid = false;
    // Wyświetl komunikat błędu dla pola telefon
    formAdd.querySelector("#inputTelefonAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputTelefonAdd").classList.remove("is-invalid");
  }

  if (isValid) {
    // Wywołaj żądanie AJAX do aktualizacji danych użytkownika
    var xhrAdd = new XMLHttpRequest();
    xhrAdd.onload = function () {
      if (xhrAdd.status === 200) {
        // Aktualizacja zakończona sukcesem
        showMessage(messageElementAdd, "Dodano nową pozycję", true);
        // Tutaj możesz dodać dodatkową logikę lub odświeżyć stronę, aby odzwierciedlić zmiany
      } else {
        // Wystąpił błąd podczas aktualizacji
        showMessage(messageElementAdd, "Wystąpił błąd podczas dodawania nowej pozycji", false);
      }
    };
    showMessage(messageElementAdd, "Trwa zapisywanie zmian...", true);
    xhrAdd.open("POST", "../../scripts/dodaj_pracownika.php", true); // Plik powinien obsługiwać aktualizację danych w bazie danych
    xhrAdd.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    xhrAdd.send(
      "&imie=" +
        encodeURIComponent(imie) +
        "&nazwisko=" +
        encodeURIComponent(nazwisko) +
        "&dataUrodzenia=" +
        encodeURIComponent(dataUrodzenia) +
        "&telefon=" +
        encodeURIComponent(telefon) +
        "&mail=" +
        encodeURIComponent(mail) +
        "&adres=" +
        encodeURIComponent(adres) +
        "&szefId=" +
        encodeURIComponent(szefId) +
        "&dzialId=" +
        encodeURIComponent(dzialId)
    );
  }
});
