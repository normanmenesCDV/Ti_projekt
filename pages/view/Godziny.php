<?php
require_once "../../scripts/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pracownikId = $_POST['pracownikId'];
    $data = $_POST['data'];
    $godziny = $_POST['godziny'];
    $komentarz = $_POST['komentarz'];

    $sql = "INSERT INTO godziny_pracownikow (Pracownik_Id, data, godziny, komentarz) VALUES ('$pracownikId', '$data', '$godziny', '$komentarz')";

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
                        <h1 class="m-0">Godziny pracowników</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Godziny pracowników</li>
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
                                        <label for="pracownik">Pracownik:</label>
                                        <select type="text" class="form-control" id="pracownikId" name="pracownikId">
                                            <option></option>
                                            <?php
	                                            require_once "../../scripts/connect.php";
                                                $sql = "SELECT id, imie, nazwisko FROM pracownicy;";
                                                $result = $conn->query($sql);
                                                while ($pracownicy = $result->fetch_assoc()){
                                                    echo "<option value='$pracownicy[id]'>$pracownicy[imie] $pracownicy[nazwisko]</option>";
                                                }
	                                        ?>
                                        </select>
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

                                

                            </div>
                            <br><br>
                            <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabela z dodanymi godzinami</h3>
                            </div>
                            <!-- /.card-body -->
                                <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th class="col-3">Imie i Nazwisko</th>
                                    <th class="col-1">Data</th>
                                    <th class="col-1">Godziny</th>
                                    <th class="col-6">Komentarz</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  require_once "../../scripts/connect.php";
                                  $sql = "SELECT g.Id, p.Imie, p.Nazwisko, g.Data, g.Godziny, g.Komentarz FROM `godziny_pracownikow` g
                                  LEFT JOIN `pracownicy` p on p.Id = g.Pracownik_Id;";
                                  $result = $conn->query($sql);
                                  while ($wartosc = $result->fetch_assoc()) {
                                    echo <<< TABELA
                                    <tr>
                                        <td>$wartosc[Imie] $wartosc[Nazwisko]</td>
                                        <td>$wartosc[Data]</td>
                                        <td>$wartosc[Godziny]</td>
                                        <td>$wartosc[Komentarz]</td>
                                    </tr>
                                    TABELA;
                                  }
                                  ?>
                                <tbody>
                                </table>
                                </div>
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
    <?php $conn->close(); ?>
    <?php include './footer.html'; ?>
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
