<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Styl dedykowny do projektu -->
  <link rel="stylesheet" href="../../css/Ti.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include './navbar.html'; ?>
<?php include './sidebar.html'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Użytkownicy</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <button class="button-add" data-toggle="modal" data-target="#modal-add">
        <i class="fas fa-plus" style="margin-right: 5px;"></i>
        <span style="flex: 1;">Dodaj</span>
      </button>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista użytkowników</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="col-3">Login</th>
                    <th class="col-3">Osoba</th>
                    <th class="col-3">Rola</th>
                    <th class="col-3">Akcje</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once "../../scripts/connect.php";
                  $sql = "SELECT u.Id, u.Login, p.Imie, p.Nazwisko, r.Nazwa as NazwaRoli FROM `uzytkownicy` u
                  LEFT JOIN `pracownicy` p on p.Id = u.Pracownik_Id
                  LEFT JOIN `role` r on r.Id = u.Rola_Id;";
                  $result = $conn->query($sql);
                  while ($uzytkownik = $result->fetch_assoc()) {
                    echo <<< TABELAUZYTKOWNIKOW
                    <tr>
                        <td><strong>$uzytkownik[Login]</strong></td>
                        <td>$uzytkownik[Imie] $uzytkownik[Nazwisko]</td>
                        <td>$uzytkownik[NazwaRoli]</td>
                        <td>
                          <button class="button-details" data-toggle="modal" data-target="#modal-details" data-uzytkownik-id="$uzytkownik[Id]"><i class="fas fa-info-circle"></i>Szczegóły</button>
                          <button class="button-edit" data-toggle="modal" data-target="#modal-edit" data-uzytkownik-id="$uzytkownik[Id]"><i class="fas fa-pencil-alt"></i>Edytuj</button>
                        </td>
                    </tr>
                    TABELAUZYTKOWNIKOW;
                  }
                  ?>
                <tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<!-- Modale -->
<?php include '../modal/uzytkownik_szczegoly.html'; ?>
<?php include '../modal/uzytkownik_edytuj.html'; ?>
<?php include '../modal/uzytkownik_dodaj.html'; ?>

<script src="../../js/funkcje.js"></script>
<script src="../../js/modal/uzytkownik_szczegoly.js"></script>
<script src="../../js/modal/uzytkownik_edytuj.js"></script>
<script src="../../js/modal/uzytkownik_dodaj.js"></script>
<!-- /.Modale -->

<?php include './footer.html'; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
