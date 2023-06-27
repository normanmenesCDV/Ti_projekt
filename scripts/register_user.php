<?php
function sanitizeInput($input){
    $input = htmlentities(stripslashes(trim($input)));
    return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $requiredFields = ["Login", "Haslo", "Imie", "Nazwisko", "Mail"];
    $activationToken = uniqid();

    $errors = [];
    foreach ($requiredFields as $key => $value){
        if (empty($_POST[$value])){
            $errors[] = "Pole <b>$value</b> jest wymagane";
        }
    }

    if (!empty($errors)){
        print_r($errors);
        echo "test: ".$errors[0];
        $_SESSION['error_message'] = implode("<br>", $errors);
        echo "<script>history.back();</script>";
        exit();
    }

    foreach ($_POST as $key => $value){
        ${$key} = sanitizeInput($value);
    }
    require_once "./connect.php";

    $hashedPassword = password_hash($Haslo, PASSWORD_DEFAULT);

    try{
        $stmt = $conn->prepare("INSERT INTO `uzytkownicy` (`Login`, `Haslo`) VALUES (?, ?)");
        $stmt->bind_param("ss", $Login, $hashedPassword);
        if ($stmt->execute()){
            $stmt = $conn->prepare("INSERT INTO `pracownicy` (`Imie`, `Nazwisko`, `Mail`) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $Imie, $Nazwisko, $Mail);
            $stmt->execute();
            $stmt = $conn->prepare("UPDATE `uzytkownicy` SET `TokenAktywacyjny` = ? WHERE `Login` = ?");
            $stmt->bind_param("ss", $activationToken, $Login);
            $stmt->execute();

            $activationLink = "https://example.com/activate.php?token=$activationToken";
            $message = "Witaj $Imie,\n\nAby aktywować swoje konto, kliknij w poniższy link:\n\n$activationLink";
            $headers = "From: [adres email nadawcy]";

            mail($Mail, "Aktywacja konta", $message, $headers);
            $_SESSION["success"] = "Prawidłowo dodano użytkownika $Login wiadomość z aktywacją konta została wysłana na Twój email.";
            header("location: ../pages/view/Login_page.php");
            exit();
        }

    } catch(mysqli_sql_exception $e){
        $_SESSION["error_message"] = "Error: ".$e->getMessage();
        echo "<script>history.back();</script>";
        exit();
    }

}else{
    header("location: ../pages/view/register.php");
}
