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

function addOsobyToSelect(input) {
    // Wywołaj żądanie AJAX do pobrania danych działów
    var xhrOsoby = new XMLHttpRequest();
    xhrOsoby.onload = function () {
      if (xhrOsoby.status === 200) {
        var osoby = JSON.parse(xhrOsoby.responseText); // Przetwórz otrzymane dane JSON

        // Utwórz opcje dla pola <select> na podstawie danych działów
        osoby.forEach(function (osoba) {
          var option = document.createElement("option");
          option.value = osoba.Id;
          option.textContent = osoba.Nazwa;
          input.appendChild(option);
        });
      }
    };
    xhrOsoby.open("GET", "../../scripts/pobierz_pracownika.php", true); // Plik powinien zwracać dane działów w formacie JSON
    xhrOsoby.send();
    return input;
}

function addRoleToSelect(input){
    // Wywołaj żądanie AJAX do pobrania danych działów
    var xhrRole = new XMLHttpRequest();
    xhrRole.onload = function () {
      if (xhrRole.status === 200) {
        var role = JSON.parse(xhrRole.responseText); // Przetwórz otrzymane dane JSON
    
        // Utwórz opcje dla pola <select> na podstawie danych działów
        role.forEach(function (rola) {
          var option = document.createElement("option");
          option.value = rola.Id;
          option.textContent = rola.Nazwa;
          input.appendChild(option);
        });
      }
    };
    xhrRole.open("GET", "../../scripts/pobierz_role.php", true); // Plik powinien zwracać dane działów w formacie JSON
    xhrRole.send();
    return input;
};
