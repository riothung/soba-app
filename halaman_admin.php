<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOBA APP</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> 
    <!-- <link rel="stylesheet" href="halaman_admin.css"/> -->
    <link rel="icon" href="assets/img/soba.png"/>
  </head>
  <style>

.landing {
        width: 80%;
        margin: auto;
        padding: 50px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: left;

      }

      .text {
        flex: 1;
        padding-right: 20px;
        margin-right: 100px;
      }

      .text h1 {
        color: #333;
      }

      .text p {
        color: #666;
        font-size: 18px;
        line-height: 1.6;
      }

      .image-container img {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }

  .profile {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    /* margin-top: 20px; */
    padding-top: 80px;
    padding-bottom: 4rem;
  }
  
  .profileImage {
    width: 300px;
    padding-bottom: 3rem;
  }


  .mps{
    display: flex;
  justify-content: center; /* Posisi horizontal */
  align-items: center; /* Posisi vertical */
  background-color: #763C00;
  width:80px;
  height: 40px;
  padding: 20px;
  border-radius: 6px;
  position: absolute; /* Posisi tengah dengan absolute */
  left: 50%;
  transform: translateX(-50%);
  margin-top: 10px;
  }
  .maps {
          text-decoration: none;
          transition: color 0,3s;
          color: #fbe3a9;
          text-weight: bold;
          text-align: center;s
        }

        
        .mps:hover {
            background-color: #BF6100;
            color: #763c00
        }

        footer {
          /* position: fixed; */
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #763c00;
            color: #fbe3a9;
            text-align: center;
            margin-top:200px;
            padding: 20px 0;
        }

        .lead{
          text-align: justify;
        }

  </style>

  <body>
  <?php
  session_start();
  require "navbar.php";
  
  if ($_SESSION['level'] == ""){
    header("location:index.php?pesan=gagal untuk login");
    // session_abort();
  }
  ?>

  
<?php
  // Path untuk gambar
  $soba = 'assets/img/soba.png';
  $maps ='assets/img/soba-map.jpg';
  $gmr2 ='assets/img/47.jpg';
  $gmr3 ='assets/img/49.jpg';
  ?>


<!-- deskripsi soba -->
<div class="landing">
      <div class="text">
        <h1 style="color:#763C00">Selamat Datang di <b style="color:#bf6100">SOBA APP</b></h1>
        <p style="color:#763C00" class="lead">Desa Soba adalah salah satu desa yang terletak di Kecamatan Amarasi Barat, Kabupaten Kupang, Provinsi Nusa Tenggara Timur.
Desa soba memiliki 4 dusun dan 16 RT dan 7 RW. App ini digunakan untuk menginput data masyarakat Desa Soba berdasarkan kartu keluarga. Dibawah ini adalah lokasi Desa Soba di Google Maps</p>
      </div>
      <div class="image-container">
        <img src="<?= $soba ?>" alt="Foto Menarik" />
      </div>
    </div>
<!-- deskripsi akhir soba -->

    <!-- maps -->
<div class="card text-center">
  <div class="card-header">
    <h4 style="color:#763C00"> <b>MAPS</b></h4>
  </div>
  <div class="card-body">
  <img style="width: 800px; border-radius: 6px;" src="<?= $maps ?>" alt="Foto Maps Desa Soba">

  </div>
</div>
<div class="mps">
  <a class="maps" href="https://maps.app.goo.gl/yMLokTaVGcoaP8XL8">LINK</a>
</div>
    <!-- akhir maps -->


<footer>
  <p>&copy; 2024 TI UCB ANGKATAN 2. All rights reserved.</p>
</footer>
 <!-- Akhir Beranda -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
