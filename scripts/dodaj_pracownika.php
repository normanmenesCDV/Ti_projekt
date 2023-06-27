<?php
// Pobierz wartości przesłane przez żądanie POST
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$dataUrodzenia = $_POST['dataUrodzenia'];
$telefon = $_POST['telefon'];
$mail = $_POST['mail'];
$adres = $_POST['adres'];
$szefId = $_POST['szefId'];
$dzialId = $_POST['dzialId'];

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
$stmt = $conn->prepare("INSERT INTO `pracownicy` (Imie, Nazwisko, Data_Urodzenia, Telefon, Mail, Adres, Szef_Id, Dzial_Id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Przypisz wartości do parametrów
$stmt->bind_param(
  "ssssssii",
  $imie,
  $nazwisko,
  $dataUrodzenia,
  $telefon,
  $mail,
  $adres,
  $szefId,
  $dzialId
);
    
// Wykonaj zapytanie
if ($stmt->execute()) {
  // Aktualizacja zakończona sukcesem
  echo "Dodano pracownika.";
} else {
  // Wystąpił błąd podczas aktualizacji
  echo "Błąd podczas dodawania pracownika: " . $stmt->error;
}

// Zamknij połączenie z bazą danych
$stmt->close();
$conn->close();
?>
