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

// Pobierz element <select> dla osoby
var inputOsobaAdd = formAdd.querySelector("#inputOsobaAdd");
inputOsobaAdd = addOsobyToSelect(inputOsobaAdd);

// Pobierz element <select> dla roli
var inputRolaAdd = formAdd.querySelector("#inputRolaAdd");
inputRolaAdd = addRoleToSelect(inputRolaAdd);


// Utwórz funkcję obsługującą zdarzenie kliknięcia przycisku "Dodaj"
saveButton.addEventListener("click", function () {
  // Pobierz wartości pól formularza
  var login = formAdd.querySelector("#inputLoginAdd").value;
  var haslo = formAdd.querySelector("#inputHasloAdd").value;
  var pracownikId = formAdd.querySelector("#inputOsobaAdd").value;
  var rolaId = formAdd.querySelector("#inputRolaAdd").value;

  // Sprawdź poprawność pól formularza
  var isValid = true;

  if (login.trim() === "") {
    // Pole login jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formAdd.querySelector("#inputLoginAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputLoginAdd").classList.remove("is-invalid");
  }

  if (haslo.trim() === "") {
    // Pole haslo jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formAdd.querySelector("#inputHasloAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputHasloAdd").classList.remove("is-invalid");
  }

  if (rolaId.trim() === "") {
    // Pole rolaId jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formAdd.querySelector("#inputRolaAdd").classList.add("is-invalid");
  } else {
    formAdd.querySelector("#inputRolaAdd").classList.remove("is-invalid");
  }

  if (isValid) {
    // Wywołaj żądanie AJAX do aktualizacji danych użytkownika
    var xhrAdd = new XMLHttpRequest();
    xhrAdd.onload = function () {
      if (xhrAdd.status === 200) {
        // Aktualizacja zakończona sukcesem
        showMessage(messageElementAdd, "Zmiany zostały zapisane.", true);
        // Tutaj możesz dodać dodatkową logikę lub odświeżyć stronę, aby odzwierciedlić zmiany
      } else {
        // Wystąpił błąd podczas aktualizacji
        showMessage(messageElementAdd, "Wystąpił błąd podczas zapisywania zmian.", false);
      }
    };
    showMessage(messageElementAdd, "Trwa zapisywanie zmian...", true);
    xhrAdd.open("POST", "../../scripts/dodaj_uzytkownika.php", true); // Plik powinien obsługiwać aktualizację danych w bazie danych
    xhrAdd.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    xhrAdd.send(
        "login=" +
        encodeURIComponent(login) +
        "&haslo=" +
        encodeURIComponent(haslo) +
        "&pracownikId=" +
        encodeURIComponent(pracownikId) +
        "&rolaId=" +
        encodeURIComponent(rolaId)
    );
  }
});
