<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firma_projekt_ti";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $data = $_POST['data'];
    $godziny = $_POST['godziny'];
    $komentarz = $_POST['komentarz'];

    $sql = "INSERT INTO godziny_pracownikow (imie, nazwisko, data, godziny, komentarz) VALUES ('$imie', '$nazwisko', '$data', '$godziny', '$komentarz')";

    if ($conn->query($sql) === TRUE) {
        echo "Godziny pracownika zostały dodane.";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM godziny_pracownikow";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php include './navbar.html'; ?>
    <?php include './sidebar.html'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Godziny Pracowników</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="imie">Imię:</label>
                                        <input type="text" class="form-control" id="imie" name="imie">
                                    </div>
                                    <div class="form-group">
                                        <label for="nazwisko">Nazwisko:</label>
                                        <input type="text" class="form-control" id="nazwisko" name="nazwisko">
                                    </div>
                                    <div class="form-group">
                                        <label for="data">Data:</label>
                                        <input type="date" class="form-control" id="data" name="data">
                                    </div>
                                    <div class="form-group">
                                        <label for="godziny">Liczba godzin:</label>
                                        <input type="number" class="form-control" id="godziny" name="godziny">
                                    </div>
                                    <div class="form-group">
                                        <label for="komentarz">Komentarz:</label>
                                        <textarea class="form-control" id="komentarz" name="komentarz"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Dodaj</button>
                                </form>

                                <h2>Tabela z dodanymi godzinami</h2>
                                <table>
                                    <tr>
                                        <th>Imię</th>
                                        <th>Nazwisko</th>
                                        <th>Data</th>
                                        <th>Godziny</th>
                                        <th>Komentarz</th>
                                    </tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>".$row['imie']."</td>";
                                            echo "<td>".$row['nazwisko']."</td>";
                                            echo "<td>".$row['data']."</td>";
                                            echo "<td>".$row['godziny']."</td>";
                                            echo "<td>".$row['komentarz']."</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>Brak danych</td></tr>";
                                    }
                                    ?>
                                </table>
<?php
$conn->close();
?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Footer</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
