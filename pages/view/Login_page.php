<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "firma_projekt_ti";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM uzytkownicy WHERE Login=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['Haslo'];
        $rola_id = $row['Rola_Id'];

        if (password_verify($password, $hashedPassword)) {
            $query_role = "SELECT Nazwa FROM role WHERE Id=?";
            $stmt_role = mysqli_prepare($connection, $query_role);
            mysqli_stmt_bind_param($stmt_role, "i", $rola_id);
            mysqli_stmt_execute($stmt_role);
            $result_role = mysqli_stmt_get_result($stmt_role);
            $row_role = mysqli_fetch_assoc($result_role);
            $rola_nazwa = $row_role['Nazwa'];

            $_SESSION['username'] = $username;
            $_SESSION['rola_nazwa'] = $rola_nazwa;

            if (isset($_SESSION["username"])) {
                switch ($_SESSION["rola_nazwa"]) {
                    case 'Administrator systemu':
                        header("Location: pulpit.php");
                        exit();
                    case 'Kierownik':
                        header("Location: pulpit.php");
                        exit();
                    case 'Pracownik':
                        header("Location: pulpit.php");
                        exit();
                    default:
                        $error = "Nieprawidłowy login lub hasło.";
                        break;
                }
            }
        }
    } else {
        $error = "Nieprawidłowy login lub hasło.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <?php
    if (isset($_SESSION['error_message'])){
        echo <<< ERROR
        <div class="callout callout-danger">
           <h5>Błąd!</h5>
           <p>$_SESSION[error_message]</p>
        </div>
ERROR;

        unset($_SESSION['error_message']);
    }

    if (isset($_SESSION['success'])){
        echo <<< ERROR
        <div class="callout callout-success">
           <h5>Gratulacje!</h5>
           <p>$_SESSION[success]</p>
        </div>
ERROR;

        unset($_SESSION['success']);
    }
    ?>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <span class="h1"><b>Szpaki</b> i Tupaki</span>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Zaloguj się</p>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Login" name="username" id="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Hasło" name="password" id="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Zapamiętaj
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password.php">Zapomniałem hasła</a>
            </p>
            <p class="mb-0">
                <a href="register.php" class="text-center">Zarejestruj nowego użytkownika</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

