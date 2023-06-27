<?php
// Inicjalizuj sesję, jeśli jeszcze nie jest inicjalizowana
session_start();

// Wyloguj użytkownika - np. usuń dane sesji
session_unset();
session_destroy();

// Przekieruj użytkownika na stronę logowania lub inną stronę po wylogowaniu
header("Location: Login_page.php");
exit;
?>