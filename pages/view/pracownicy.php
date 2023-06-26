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
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pracownicy</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista pracowników</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="col-3">Imię i Nazwisko</th>
                    <th class="col-3">Dział</th>
                    <th class="col-3">Szef</th>
                    <th class="col-3">Akcje</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once "../../scripts/connect.php";
                  $sql = "SELECT p.Id, p.Imie, p.Nazwisko, s.Imie as SzefImie, s.Nazwisko as SzefNazwisko, d.Nazwa as NazwaDzialu FROM `pracownicy` p
                  LEFT JOIN `pracownicy` s on p.Szef_Id = s.Id
                  LEFT JOIN `dzialy` d on d.Id = p.Dzial_Id;";
                  $result = $conn->query($sql);
                  while ($pracownik = $result->fetch_assoc()) {
                    echo <<< TABELAPRACOWNIKOW
                    <tr>
                        <td><strong>$pracownik[Imie] $pracownik[Nazwisko]</strong></td>
                        <td>$pracownik[NazwaDzialu]</td>
                        <td>$pracownik[SzefImie] $pracownik[SzefNazwisko]</td>
                        <td>
                          <button class="button-details" data-toggle="modal" data-target="#modal-details" data-pracownik-id="$pracownik[Id]"><i class="fas fa-info-circle"></i>Szczegóły</button>
                          <button class="button-edit" data-toggle="modal" data-target="#modal-edit" data-pracownik-id="$pracownik[Id]"><i class="fas fa-pencil-alt"></i>Edytuj</button>
                        </td>
                    </tr>
                    TABELAPRACOWNIKOW;
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
<!-- Modal szczegółów pracownika -->
<div class="modal fade" id="modal-details">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Podgląd pracownika</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="get" action="">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="inputImieDetails">Imię</label>
            <input type="text" class="form-control" id="inputImieDetails" readonly>
            <br/>
            <label for="inputNazwiskoDetails">Nazwisko</label>
            <input type="text" class="form-control" id="inputNazwiskoDetails" readonly>
            <br/>
            <label for="inputDataUrodzeniaDetails">Data urodzenia</label>
            <input type="date" class="form-control" id="inputDataUrodzeniaDetails" readonly>
            <br/>
            <label for="inputTelefonDetails">Telefon</label>
            <input type="tel" class="form-control" id="inputTelefonDetails" readonly>
            <br/>
            <label for="inputMailDetails">Mail</label>
            <input type="email" class="form-control" id="inputMailDetails" readonly>
            <br/>
            <label for="inputAdresDetails">Adres</label>
            <input type="text" class="form-control" id="inputAdresDetails" readonly>
            <br/>
            <label for="inputSzefDetails">Szef</label>
            <select disabled class="form-control" id="inputSzefDetails"></select>
            <br/>
            <label for="inputDzialDetails">Dział</label>
            <select disabled class="form-control" id="inputDzialDetails"></select>
            <br/>
            <br/>
          </div>
        </div>
      </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

  <!-- Modal edycji pracownika -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edycja pracownika</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="../../script/edytuj_pracownika.php">
          <div class="col-sm-6">
            <div class="form-group">
            <label for="inputImieEdit">Imię</label>
            <input type="text" class="form-control" id="inputImieEdit">
            <br/>
            <label for="inputNazwiskoEdit">Nazwisko</label>
            <input type="text" class="form-control" id="inputNazwiskoEdit">
            <br/>
            <label for="inputDataUrodzeniaEdit">Data urodzenia</label>
            <input type="date" class="form-control" id="inputDataUrodzeniaEdit">
            <br/>
            <label for="inputTelefonEdit">Telefon</label>
            <input type="tel" class="form-control" id="inputTelefonEdit">
            <br/>
            <label for="inputMailEdit">Mail</label>
            <input type="email" class="form-control" id="inputMailEdit">
            <br/>
            <label for="inputAdresEdit">Adres</label>
            <input type="text" class="form-control" id="inputAdresEdit">
            <br/>
            <label for="inputSzefEdit">Szef</label>
            <select class="form-control" id="inputSzefEdit"></select>
            <br/>
            <label for="inputDzialEdit">Dział</label>
            <select class="form-control" id="inputDzialEdit"></select>
            <br/>
            </div>
          </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
          <button type="button" class="btn btn-primary">Zapisz zmiany</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Skrypt do modala szczegółów -->
<script>
  var detailsButtons = document.querySelectorAll('.button-details');
  var modalDetails = document.querySelector('#modal-details');
  var formDetails = modalDetails.querySelector('form');
  // Iteruj przez wszystkie przyciski "Szczegóły"
  detailsButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      var pracownikId = button.dataset.pracownikId; // Pobierz ID pracownika z atrybutu danych

      // Wywołaj żądanie AJAX do pobrania danych pracownika
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        if (xhr.status === 200) {
          var pracownik = JSON.parse(xhr.responseText); // Przetwórz otrzymane dane JSON
          
          /// Uzupełnij pola formularza danymi pracownika
          formDetails.querySelector('#inputImieDetails').value = pracownik.Imie;
          formDetails.querySelector('#inputNazwiskoDetails').value = pracownik.Nazwisko;
          formDetails.querySelector('#inputDataUrodzeniaDetails').value = pracownik.Data_Urodzenia;
          formDetails.querySelector('#inputTelefonDetails').value = pracownik.Telefon;
          formDetails.querySelector('#inputMailDetails').value = pracownik.Mail;
          formDetails.querySelector('#inputAdresDetails').value = pracownik.Adres;

          // Pobierz element <select> dla szefa
          var inputSzefDetails = formDetails.querySelector('#inputSzefDetails');

          // Wywołaj żądanie AJAX do pobrania danych działów
          var xhrSzefowie = new XMLHttpRequest();
          xhrSzefowie.onload = function() {
            if (xhrSzefowie.status === 200) {
              var szefowie = JSON.parse(xhrSzefowie.responseText); // Przetwórz otrzymane dane JSON
            
              // Utwórz opcje dla pola <select> na podstawie danych działów
              szefowie.forEach(function(szef) {
                var option = document.createElement('option');
                option.value = szef.Id;
                option.textContent = szef.Nazwa;
                inputSzefDetails.appendChild(option);
              });
            
              // Ustaw wartość pola <select> na ID szefa pracownika
              inputSzefDetails.value = pracownik.Szef_Id;
            }
          };
          xhrSzefowie.open('GET', '../../scripts/pobierz_pracownika.php', true); // Plik powinien zwracać dane działów w formacie JSON
          xhrSzefowie.send();

          // Pobierz element <select> dla działu
          var inputDzialDetails = formDetails.querySelector('#inputDzialDetails');

          // Wywołaj żądanie AJAX do pobrania danych działów
          var xhrDzialy = new XMLHttpRequest();
          xhrDzialy.onload = function() {
            if (xhrDzialy.status === 200) {
              var dzialy = JSON.parse(xhrDzialy.responseText); // Przetwórz otrzymane dane JSON
            
              // Utwórz opcje dla pola <select> na podstawie danych działów
              dzialy.forEach(function(dzial) {
                var option = document.createElement('option');
                option.value = dzial.Id;
                option.textContent = dzial.Nazwa;
                inputDzialDetails.appendChild(option);
              });
            
              // Ustaw wartość pola <select> na ID działu pracownika
              inputDzialDetails.value = pracownik.Dzial_Id;
            }
          };
          xhrDzialy.open('GET', '../../scripts/pobierz_dzialy.php', true); // Plik powinien zwracać dane działów w formacie JSON
          xhrDzialy.send();
        }
      };
      xhr.open('GET', '../../scripts/pobierz_dane_pracownika.php?pracownikId=' + pracownikId, true);
      xhr.send();
    });
  });
</script>
<!-- Skrypt do modala edycji -->
<script>
  var editButtons = document.querySelectorAll('.button-edit');
  var modalEdit = document.querySelector('#modal-edit');
  var formEdit = modalEdit.querySelector('form');
  // Iteruj przez wszystkie przyciski "Edytuj"
  editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      var pracownikId = button.dataset.pracownikId; // Pobierz ID pracownika z atrybutu danych
      
      // Wywołaj żądanie AJAX do pobrania danych pracownika
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        if (xhr.status === 200) {
          var pracownik = JSON.parse(xhr.responseText); // Przetwórz otrzymane dane JSON
          
          // Uzupełnij pola formularza danymi pracownika
          formEdit.querySelector('#inputImieEdit').value = pracownik.Imie;
          formEdit.querySelector('#inputNazwiskoEdit').value = pracownik.Nazwisko;
          formEdit.querySelector('#inputDataUrodzeniaEdit').value = pracownik.Data_Urodzenia;
          formEdit.querySelector('#inputTelefonEdit').value = pracownik.Telefon;
          formEdit.querySelector('#inputMailEdit').value = pracownik.Mail;
          formEdit.querySelector('#inputAdresEdit').value = pracownik.Adres;

          // Pobierz element <select> dla szefa
          var inputSzefEdit = formEdit.querySelector('#inputSzefEdit');

          // Wywołaj żądanie AJAX do pobrania danych działów
          var xhrSzefowie = new XMLHttpRequest();
          xhrSzefowie.onload = function() {
            if (xhrSzefowie.status === 200) {
              var szefowie = JSON.parse(xhrSzefowie.responseText); // Przetwórz otrzymane dane JSON
            
              // Utwórz opcje dla pola <select> na podstawie danych działów
              szefowie.forEach(function(szef) {
                var option = document.createElement('option');
                option.value = szef.Id;
                option.textContent = szef.Nazwa;
                inputSzefEdit.appendChild(option);
              });
            
              // Ustaw wartość pola <select> na ID szefa pracownika
              inputSzefEdit.value = pracownik.Szef_Id;
            }
          };
          xhrSzefowie.open('GET', '../../scripts/pobierz_pracownika.php', true); // Plik powinien zwracać dane działów w formacie JSON
          xhrSzefowie.send();

          // Pobierz element <select> dla działu
          var inputDzialEdit = formEdit.querySelector('#inputDzialEdit');

          // Wywołaj żądanie AJAX do pobrania danych działów
          var xhrDzialy = new XMLHttpRequest();
          xhrDzialy.onload = function() {
            if (xhrDzialy.status === 200) {
              var dzialy = JSON.parse(xhrDzialy.responseText); // Przetwórz otrzymane dane JSON
            
              // Utwórz opcje dla pola <select> na podstawie danych działów
              dzialy.forEach(function(dzial) {
                var option = document.createElement('option');
                option.value = dzial.Id;
                option.textContent = dzial.Nazwa;
                inputDzialEdit.appendChild(option);
              });
            
              // Ustaw wartość pola <select> na ID działu pracownika
              inputDzialEdit.value = pracownik.Dzial_Id;
            }
          };
          xhrDzialy.open('GET', '../../scripts/pobierz_dzialy.php', true); // Plik powinien zwracać dane działów w formacie JSON
          xhrDzialy.send();
        }
      };
      xhr.open('GET', '../../scripts/pobierz_dane_pracownika.php?pracownikId=' + pracownikId, true);
      xhr.send();
    });
  });
</script>

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