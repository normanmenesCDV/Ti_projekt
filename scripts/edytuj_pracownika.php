<?php
// Pobierz wartości przesłane przez żądanie POST
$pracownikId = $_POST['pracownikId'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$dataUrodzenia = $_POST['dataUrodzenia'];
$telefon = $_POST['telefon'];
$mail = $_POST['mail'];
$adres = $_POST['adres'];
$szefId = $_POST['szefId'];
$dzialId = $_POST['dzialId'];

// Sprawdź i zabezpiecz wartość identyfikatora użytkownika (np. przed atakami SQL Injection)
$pracownikId = intval($pracownikId);

// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Funkcja zamieniająca puste wartości na NULL
function emptyToNull($value) {
    return $value !== '' ? $value : null;
  }
  
  // Modyfikuj wartości pustych pól
  $imie = emptyToNull($imie);
  $nazwisko = emptyToNull($nazwisko);
  $dataUrodzenia = emptyToNull($dataUrodzenia);
  $telefon = emptyToNull($telefon);
  $mail = emptyToNull($mail);
  $adres = emptyToNull($adres);
  $szefId = emptyToNull($szefId);
  $dzialId = emptyToNull($dzialId);

// Wykonaj zapytanie SQL, aby zaktualizować dane użytkownika
$stmt = $conn->prepare("UPDATE `pracownicy` SET Imie = ?, Nazwisko = ?, Data_Urodzenia = ?, Telefon = ?, Mail = ?, Adres = ?, Szef_Id = ?, Dzial_Id = ? WHERE Id = ?");

// Przypisz wartości do parametrów
$stmt->bind_param(
  "ssssssiii",
  $imie,
  $nazwisko,
  $dataUrodzenia,
  $telefon,
  $mail,
  $adres,
  $szefId,
  $dzialId,
  $pracownikId
);
    
// Wykonaj zapytanie
if ($stmt->execute()) {
  // Aktualizacja zakończona sukcesem
  echo "Dane pracownika zostały zaktualizowane.";
} else {
  // Wystąpił błąd podczas aktualizacji
  echo "Błąd podczas aktualizacji danych pracownika: " . $stmt->error;
}

// Zamknij połączenie z bazą danych
$stmt->close();
$conn->close();
?>
