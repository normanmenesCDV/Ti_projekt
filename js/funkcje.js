function showMessage(messageElement, message, isSuccess) {
    // Funkcja do wyświetlania komunikatu
    messageElement.textContent = message;
    if (isSuccess) {
      messageElement.classList.remove("text-danger");
      messageElement.classList.add("text-success");
    } else {
      messageElement.classList.remove("text-success");
      messageElement.classList.add("text-danger");
    }
  }

function addDzialyToSelect(input){
    // Wywołaj żądanie AJAX do pobrania danych działów
    var xhrDzialy = new XMLHttpRequest();
    xhrDzialy.onload = function () {
      if (xhrDzialy.status === 200) {
        var dzialy = JSON.parse(xhrDzialy.responseText); // Przetwórz otrzymane dane JSON
    
        // Utwórz opcje dla pola <select> na podstawie danych działów
        dzialy.forEach(function (dzial) {
          var option = document.createElement("option");
          option.value = dzial.Id;
          option.textContent = dzial.Nazwa;
          input.appendChild(option);
        });
      }
    };
    xhrDzialy.open("GET", "../../scripts/pobierz_dzialy.php", true); // Plik powinien zwracać dane działów w formacie JSON
    xhrDzialy.send();
    return input;
};

function addSzefowieToSelect(input) {
    // Wywołaj żądanie AJAX do pobrania danych działów
    var xhrSzefowie = new XMLHttpRequest();
    xhrSzefowie.onload = function () {
      if (xhrSzefowie.status === 200) {
        var szefowie = JSON.parse(xhrSzefowie.responseText); // Przetwórz otrzymane dane JSON

        // Utwórz opcje dla pola <select> na podstawie danych działów
        szefowie.forEach(function (szef) {
          var option = document.createElement("option");
          option.value = szef.Id;
          option.textContent = szef.Nazwa;
          input.appendChild(option);
        });
      }
    };
    xhrSzefowie.open("GET", "../../scripts/pobierz_pracownika.php", true); // Plik powinien zwracać dane działów w formacie JSON
    xhrSzefowie.send();
    return input;
}
