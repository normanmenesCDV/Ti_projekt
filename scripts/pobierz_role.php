<?php
// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Wykonaj zapytanie SQL, aby pobrać dane działów
$sql = "SELECT Id, Nazwa FROM role";
$result = $conn->query($sql);

// Sprawdź, czy zapytanie zwróciło wyniki
if ($result && $result->num_rows > 0) {
  // Pobierz dane działów jako tablicę asocjacyjną
  $role = [];
  while ($row = $result->fetch_assoc()) {
    $role[] = $row;
  }

  // Zwróć dane działów w formacie JSON
  header('Content-Type: application/json');
  echo json_encode($role);
} else {
  // Zwróć pustą tablicę JSON, jeśli nie znaleziono działów
  echo json_encode([]);
}

// Zamknij połączenie z bazą danych
$conn->close();
?>
