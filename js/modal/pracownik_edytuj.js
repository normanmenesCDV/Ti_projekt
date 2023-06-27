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

// Utwórz funkcję obsługującą zdarzenie kliknięcia przycisku "Zapisz zmiany"
saveButton.addEventListener("click", function () {
  // Pobierz wartości pól formularza
  var pracownikId = formEdit.dataset.pracownikId;
  var imie = formEdit.querySelector("#inputImieEdit").value;
  var nazwisko = formEdit.querySelector("#inputNazwiskoEdit").value;
  var dataUrodzenia = formEdit.querySelector("#inputDataUrodzeniaEdit").value;
  var telefon = formEdit.querySelector("#inputTelefonEdit").value;
  var mail = formEdit.querySelector("#inputMailEdit").value;
  var adres = formEdit.querySelector("#inputAdresEdit").value;
  var szefId = formEdit.querySelector("#inputSzefEdit").value;
  var dzialId = formEdit.querySelector("#inputDzialEdit").value;

  // Sprawdź poprawność pól formularza
  var isValid = true;

  if (imie.trim() === "") {
    // Pole imię jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola imię
    formEdit.querySelector("#inputImieEdit").classList.add("is-invalid");
  } else {
    formEdit.querySelector("#inputImieEdit").classList.remove("is-invalid");
  }

  if (nazwisko.trim() === "") {
    // Pole nazwisko jest puste
    isValid = false;
    // Wyświetl komunikat błędu dla pola nazwisko
    formEdit.querySelector("#inputNazwiskoEdit").classList.add("is-invalid");
  } else {
    formEdit.querySelector("#inputNazwiskoEdit").classList.remove("is-invalid");
  }

  var mailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

  if (mail.trim() !== "" && !mailRegex.test(mail)) {
    // Pole mail nie zawiera poprawnego adresu email
    isValid = false;
    // Wyświetl komunikat błędu dla pola mail
    formEdit.querySelector("#inputMailEdit").classList.add("is-invalid");
  } else {
    formEdit.querySelector("#inputMailEdit").classList.remove("is-invalid");
  }

  var telefonRegex = /^[\d+]+$/;

  if (telefon.trim() !== "" && !telefonRegex.test(telefon)) {
    // Pole telefon zawiera niedozwolone znaki
    isValid = false;
    // Wyświetl komunikat błędu dla pola telefon
    formEdit.querySelector("#inputTelefonEdit").classList.add("is-invalid");
  } else {
    formEdit.querySelector("#inputTelefonEdit").classList.remove("is-invalid");
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
    xhrEdit.open("POST", "../../scripts/edytuj_pracownika.php", true); // Plik powinien obsługiwać aktualizację danych w bazie danych
    xhrEdit.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    xhrEdit.send(
      "pracownikId=" +
        encodeURIComponent(pracownikId) +
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

// Iteruj przez wszystkie przyciski "Edytuj"
editButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    var pracownikEditId = button.dataset.pracownikId; // Pobierz ID pracownika z atrybutu danych

    // Wywołaj żądanie AJAX do pobrania danych pracownika
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status === 200) {
        var pracownikEdit = JSON.parse(xhr.responseText); // Przetwórz otrzymane dane JSON

        // Uzupełnij pola formularza danymi pracownika
        formEdit.dataset.pracownikId = pracownikEditId;
        formEdit.querySelector("#inputImieEdit").value = pracownikEdit.Imie;
        formEdit.querySelector("#inputNazwiskoEdit").value = pracownikEdit.Nazwisko;
        formEdit.querySelector("#inputDataUrodzeniaEdit").value = pracownikEdit.Data_Urodzenia;
        formEdit.querySelector("#inputTelefonEdit").value = pracownikEdit.Telefon;
        formEdit.querySelector("#inputMailEdit").value = pracownikEdit.Mail;
        formEdit.querySelector("#inputAdresEdit").value = pracownikEdit.Adres;

        // Pobierz element <select> dla szefa
        var inputSzefEdit = formEdit.querySelector("#inputSzefEdit");
        inputSzefEdit = addSzefowieToSelect(inputSzefEdit);
        inputSzefEdit.value = pracownikEdit.Szef_Id;

        // Pobierz element <select> dla działu
        var inputDzialEdit = formEdit.querySelector("#inputDzialEdit");
        inputDzialEdit = addDzialyToSelect(inputDzialEdit);
        inputDzialEdit.value = pracownikEdit.Dzial_Id;
        
      }
    };
    xhr.open(
      "GET",
      "../../scripts/pobierz_dane_pracownika.php?pracownikId=" + pracownikEditId,
      true
    );
    xhr.send();
  });
});
