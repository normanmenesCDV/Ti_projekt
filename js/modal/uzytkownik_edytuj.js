// Pobierz element do wyświetlania komunikatu
var messageElementEdit = document.getElementById("messageEdit");

// Pobierz wszystkie przyciski "Edytuj" z klasą .button-edit
var editButtons = document.querySelectorAll(".button-edit");

// Pobierz modal edycji użytkownika
var modalEdit = document.querySelector("#modal-edit");

// Pobierz formularz wewnątrz modala
var formEdit = modalEdit.querySelector("form");

// Pobierz przycisk "Zapisz zmiany"
var saveButton = modalEdit.querySelector(".btn-primary");

// Pobierz element <select> dla Osoby
var inputOsobaEdit = formEdit.querySelector("#inputOsobaEdit");
inputOsobaEdit = addOsobyToSelect(inputOsobaEdit);

// Pobierz element <select> dla Roli
var inputRolaEdit = formEdit.querySelector("#inputRolaEdit");
inputRolaEdit = addRoleToSelect(inputRolaEdit);

// Utwórz funkcję obsługującą zdarzenie kliknięcia przycisku "Zapisz zmiany"
saveButton.addEventListener("click", function () {
  // Pobierz wartości pól formularza
  var uzytkownikId = formEdit.dataset.uzytkownikId;;
  var login = formEdit.querySelector("#inputLoginEdit").value;
  var pracownikId = formEdit.querySelector("#inputOsobaEdit").value;
  var rolaId = formEdit.querySelector("#inputRolaEdit").value;

  // Sprawdź poprawność pól formularza
  var isValid = true;

  if (login.trim() === "") {
    // Pole login jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formEdit.querySelector("#inputLoginEdit").classList.add("is-invalid");
  } else {
    formEdit.querySelector("#inputLoginEdit").classList.remove("is-invalid");
  }

  if (rolaId.trim() === "") {
    // Pole rolaId jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formEdit.querySelector("#inputRolaEdit").classList.add("is-invalid");
  } else {
    formEdit.querySelector("#inputRolaEdit").classList.remove("is-invalid");
  }

  if (isValid) {
    // Wywołaj żądanie AJAX do aktualizacji danych użytkownika
    var xhrEdit = new XMLHttpRequest();
    xhrEdit.onload = function () {
      if (xhrEdit.status === 200) {
        // Aktualizacja zakończona sukcesem
        showMessage(messageElementEdit, "Zmiany zostały zapisane.", true);
        // Tutaj możesz dodać dodatkową logikę lub odświeżyć stronę, aby odzwierciedlić zmiany
      } else {
        // Wystąpił błąd podczas aktualizacji
        showMessage(messageElementEdit, "Wystąpił błąd podczas zapisywania zmian.", false);
      }
    };
    
    showMessage(messageElementEdit, "Trwa zapisywanie zmian...", true);
    xhrEdit.open("POST", "../../scripts/edytuj_uzytkownika.php", true); // Plik powinien obsługiwać aktualizację danych w bazie danych
    xhrEdit.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    xhrEdit.send(
      "uzytkownikId=" +
        encodeURIComponent(uzytkownikId) +
        "&login=" +
        encodeURIComponent(login) +
        "&pracownikId=" +
        encodeURIComponent(pracownikId) +
        "&rolaId=" +
        encodeURIComponent(rolaId)
    );
  }
});

// Iteruj przez wszystkie przyciski "Edytuj"
editButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    var uzytkownikEditId = button.dataset.uzytkownikId; // Pobierz ID pracownika z atrybutu danych

    // Wywołaj żądanie AJAX do pobrania danych pracownika
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status === 200) {
        var uzytkownikEdit = JSON.parse(xhr.responseText); // Przetwórz otrzymane dane JSON        

        // Uzupełnij pola formularza danymi pracownika
        formEdit.dataset.uzytkownikId = uzytkownikEditId;
        formEdit.querySelector("#inputLoginEdit").value = uzytkownikEdit.Login;
        inputOsobaEdit.value = uzytkownikEdit.Pracownik_Id;
        inputRolaEdit.value = uzytkownikEdit.Rola_Id;
      }
    };
    xhr.open(
      "GET",
      "../../scripts/pobierz_dane_uzytkownika.php?uzytkownikId=" + uzytkownikEditId,
      true
    );
    xhr.send();
  });
});
