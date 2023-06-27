var detailsButtons = document.querySelectorAll(".button-details");
var modalDetails = document.querySelector("#modal-details");
var formDetails = modalDetails.querySelector("form");

// Pobierz element <select> dla osoby
var inputOsobaDetails = formDetails.querySelector("#inputOsobaDetails");
inputOsobaDetails = addOsobyToSelect(inputOsobaDetails);

// Pobierz element <select> dla roli
var inputRolaDetails = formDetails.querySelector("#inputRolaDetails");
inputRolaDetails = addRoleToSelect(inputRolaDetails);

// Iteruj przez wszystkie przyciski "Szczegóły"
detailsButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    var uzytkownikDetailsId = button.dataset.uzytkownikId; // Pobierz ID pracownika z atrybutu danych

    // Wywołaj żądanie AJAX do pobrania danych pracownika
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
      if (xhr.status === 200) {
        var uzytkownikDetails = JSON.parse(xhr.responseText); // Przetwórz otrzymane dane JSON

        /// Uzupełnij pola formularza danymi pracownika
        formDetails.querySelector("#inputLoginDetails").value = uzytkownikDetails.Login;
        inputOsobaDetails.value = uzytkownikDetails.Pracownik_Id;
        inputRolaDetails.value = uzytkownikDetails.Rola_Id;
      }
    };
    xhr.open(
      "GET",
      "../../scripts/pobierz_dane_uzytkownika.php?uzytkownikId=" + uzytkownikDetailsId,
      true
    );
    xhr.send();
  });
});
