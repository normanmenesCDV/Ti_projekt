<?php
// Pobierz identyfikator pracownika z parametru GET
$pracownikId = $_GET['pracownikId'];

// Sprawdź i zabezpiecz wartość identyfikatora (np. przed atakami SQL Injection)
$pracownikId = intval($pracownikId);

// Utwórz połączenie z bazą danych
require_once "./connect.php";

// Wykonaj zapytanie SQL, aby pobrać dane pracownika na podstawie identyfikatora
$sql = "SELECT Imie, Nazwisko, Data_Urodzenia, Telefon, Mail, Adres, Szef_Id, Dzial_Id FROM pracownicy WHERE Id = $pracownikId";
$result = $conn->query($sql);

// Sprawdź, czy zapytanie zwróciło wyniki
if ($result && $result->num_rows > 0) {
  // Pobierz dane pracownika jako tablicę asocjacyjną
  $pracownik = $result->fetch_assoc();

  // Zwróć dane pracownika w formacie JSON
  header('Content-Type: application/json');
  echo json_encode($pracownik);
} else {
  // Zwróć pusty obiekt JSON, jeśli nie znaleziono pracownika
  echo json_encode([]);
}

// Zamknij połączenie z bazą danych
$conn->close();
?>

