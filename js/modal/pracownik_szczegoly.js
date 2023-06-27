var detailsButtons = document.querySelectorAll(".button-details");
var modalDetails = document.querySelector("#modal-details");
var formDetails = modalDetails.querySelector("form");

// Pobierz element <select> dla szefa
var inputSzefDetails = formDetails.querySelector("#inputSzefDetails");
inputSzefDetails = addOsobyToSelect(inputSzefDetails);

// Pobierz element <select> dla działu
var inputDzialDetails = formDetails.querySelector("#inputDzialDetails");
inputDzialDetails = addDzialyToSelect(inputDzialDetails);

// Iteruj przez wszystkie przyciski "Szczegóły"
detailsButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    var pracownikDetailsId = button.dataset.pracownikId; // Pobierz ID pracownika z atrybutu danych

    // Wywołaj żądanie AJAX do pobrania danych pracownika
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status === 200) {
        var pracownikDetails = JSON.parse(xhr.responseText); // Przetwórz otrzymane dane JSON

        /// Uzupełnij pola formularza danymi pracownika
        formDetails.querySelector("#inputImieDetails").value = pracownikDetails.Imie;
        formDetails.querySelector("#inputNazwiskoDetails").value = pracownikDetails.Nazwisko;
        formDetails.querySelector("#inputDataUrodzeniaDetails").value = pracownikDetails.Data_Urodzenia;
        formDetails.querySelector("#inputTelefonDetails").value = pracownikDetails.Telefon;
        formDetails.querySelector("#inputMailDetails").value = pracownikDetails.Mail;
        formDetails.querySelector("#inputAdresDetails").value = pracownikDetails.Adres;
        inputSzefDetails.value = pracownikDetails.Szef_Id;
        inputDzialDetails.value = pracownikDetails.Dzial_Id;
      }
    };
    xhr.open(
      "GET",
      "../../scripts/pobierz_dane_pracownika.php?pracownikId=" + pracownikDetailsId,
      true
    );
    xhr.send();
  });
});
