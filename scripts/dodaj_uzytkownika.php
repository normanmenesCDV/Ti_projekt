<?php
// Pobierz wartości przesłane przez żądanie POST
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$pracownikId = $_POST['pracownikId'];
$rolaId = $_POST['rolaId'];

// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Funkcja zamieniająca puste wartości na NULL
function emptyToNull($value) {
    return $value !== '' ? $value : null;
  }
  
  // Modyfikuj wartości pustych pól
  $login = emptyToNull($login);
  $haslo = emptyToNull($haslo);
  $pracownikId = emptyToNull($pracownikId);
  $rolaId = emptyToNull($rolaId);

  // Hashowanie hasła
  $hashedHaslo = password_hash($haslo, PASSWORD_DEFAULT);

// Wykonaj zapytanie SQL, aby zaktualizować dane użytkownika
$stmt = $conn->prepare("INSERT INTO `uzytkownicy` (Login, Haslo, Pracownik_Id, Rola_Id, Aktywowane, TokenAktywacyjny) Values (?, ?, ?, ?, 0, null)");

// Przypisz wartości do parametrów
$stmt->bind_param(
  "ssii",
  $login,
  $hashedHaslo,
  $pracownikId,
  $rolaId
);
    
// Wykonaj zapytanie
if ($stmt->execute()) {
  // Aktualizacja zakończona sukcesem
  echo "Dane użytkownika zostały zaktualizowane.";
} else {
  // Wystąpił błąd podczas aktualizacji
  echo "Błąd podczas aktualizacji danych użytkownika: " . $stmt->error;
}

// Zamknij połączenie z bazą danych
$stmt->close();
$conn->close();
?>
