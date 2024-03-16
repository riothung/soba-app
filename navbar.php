
<?php
require "koneksi.php";

?>

<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> 

<nav id="navbar-example2" class="navbar navbar-expand-lg" style="background-color: #763c00" class="shadow-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="halaman_admin.php">
        <img src="assets/img/soba.png" style="border-radius: 50%;" alt="Logo" width="50px" height="50px"
          class="d-inline-block align-text-top">
        </a>
        <span class="" style="color: #fbe3a9">DATA MASYARAKAT SOBA</span>
      <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" style="color: #fbe3a9" aria-current="page" href="halaman_admin.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #fbe3a9" href="data_masyarakat.php">Data Masyarakat</a>
            </li>
          </ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: #fbe3a9" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
              if ($_SESSION['level'] == "admin"){
                echo "Admin";
              }elseif($_SESSION['level'] == "adminbayangan"){
                echo "Rio";
              }
              ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </div>
      </div>
    </div>
  </nav>