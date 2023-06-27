<?php
// Pobierz identyfikator pracownika z parametru GET
$uzytkownikId = $_GET['uzytkownikId'];

// Sprawdź i zabezpiecz wartość identyfikatora (np. przed atakami SQL Injection)
$uzytkownikId = intval($uzytkownikId);

// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Wykonaj zapytanie SQL, aby pobrać dane pracownika na podstawie identyfikatora
$sql = "SELECT Login, Pracownik_Id, Rola_Id FROM uzytkownicy WHERE Id = $uzytkownikId";
$result = $conn->query($sql);

// Sprawdź, czy zapytanie zwróciło wyniki
if ($result && $result->num_rows > 0) {
  // Pobierz dane pracownika jako tablicę asocjacyjną
  $uzytkownik = $result->fetch_assoc();

  // Zwróć dane pracownika w formacie JSON
  header('Content-Type: application/json');
  echo json_encode($uzytkownik);
} else {
  // Zwróć pusty obiekt JSON, jeśli nie znaleziono pracownika
  echo json_encode([]);
}

// Zamknij połączenie z bazą danych
$conn->close();
?>

