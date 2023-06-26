<?php
// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Wykonaj zapytanie SQL, aby pobrać dane działów
$sql = "SELECT Id, CONCAT(Imie, ' ', Nazwisko) as Nazwa FROM pracownicy";
$result = $conn->query($sql);

// Sprawdź, czy zapytanie zwróciło wyniki
if ($result && $result->num_rows > 0) {
  // Pobierz dane działów jako tablicę asocjacyjną
  $pracownicy = [];
  while ($row = $result->fetch_assoc()) {
    $pracownicy[] = $row;
  }

  // Zwróć dane działów w formacie JSON
  header('Content-Type: application/json');
  echo json_encode($pracownicy);
} else {
  // Zwróć pustą tablicę JSON, jeśli nie znaleziono działów
  echo json_encode([]);
}

// Zamknij połączenie z bazą danych
$conn->close();
?>
