<?php
// Pobierz wartości przesłane przez żądanie POST
$uzytkownikId = $_POST['uzytkownikId'];
$login = $_POST['login'];
$pracownikId = $_POST['pracownikId'];
$rolaId = $_POST['rolaId'];

// Sprawdź i zabezpiecz wartość identyfikatora użytkownika (np. przed atakami SQL Injection)
$uzytkownikId = intval($uzytkownikId);

// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Funkcja zamieniająca puste wartości na NULL
function emptyToNull($value) {
    return $value !== '' ? $value : null;
  }
  
  // Modyfikuj wartości pustych pól
  $login = emptyToNull($login);
  $pracownikId = emptyToNull($pracownikId);
  $rolaId = emptyToNull($rolaId);

// Wykonaj zapytanie SQL, aby zaktualizować dane użytkownika
$stmt = $conn->prepare("UPDATE `uzytkownicy` SET Login = ?, Pracownik_Id = ?, Rola_Id = ? WHERE Id = ?");

// Przypisz wartości do parametrów
$stmt->bind_param(
  "siii",
  $login,
  $pracownikId,
  $rolaId,
  $uzytkownikId
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
