<?php

  require "koneksi.php";

  $query = "SELECT * FROM kartu_keluarga";
  $sql1 = mysqli_query($conn, $query);
  
  $no = 0;
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOBA APP</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="icon" href="assets/img/soba.png">
    <!-- <link rel="stylesheet" href="halaman_admin.css"> -->
</head>

<style>
  .search-bar{
    display: flex;
    justify-content: end;
    align-items: end;
    margin-bottom: 10px;
    border-radius: 6px;
  }
  #searchInput{
    margin-left: 10px;
  }
</style>


<body>

<?php
  session_start();

  //  navbar
  require "navbar.php";

  if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal untuk login");
  }
  ?>
  
  <!-- Judul -->
  <div class="container">
      <h1 class="mt-4" style="color: #763c00">DAFTAR DATA <B>KK</B> MASYRARAKAT SOBA</h1>
      <figure>
      <blockquote class="blockquote">
        <p>Berikut adalah data yang telah disimpan di database.</p>
      </blockquote>
      </figure>
      <a href="kelola_data_m.php" type="button" class="btn btn-outline-warning mb-3">
        <i class="fa fa-plus"></i>
        Tambah Data KK
      </a>
      <div class="search-bar">
        Cari Data: <input type="text" name="rt_rw" id="searchInput" placeholder="Cari Data">
      </div>
      <div class="table-responsive">
          <table class="table align-middle table-bordered table-hover" id="dataTable">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th>No. KK</th>
                <th>Kepala Keluarga</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Kode Pos</th>
                <th>Desa/Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kabupaten/Kota</th>
                <th>Provinsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody?>
              <?php
            while($result = mysqli_fetch_assoc($sql1)){

              ?>
              <tr>
                <td><center>
                  <?php echo ++$no; ?>.
                </center></td>
                <td><a href="anggota_kk.php?id=<?php echo $result['no_kk']; ?>"><?php echo $result['no_kk']; ?></a></td>
                <td><?php echo $result['kepala_keluarga']; ?></td>
                <td><?php echo $result['alamat']; ?></td>
                <td><?php echo $result['rt_rw']; ?></td>
                <td><?php echo $result['kode_pos']; ?></td>
                <td>Desa Soba</td>
                <td>Amarasi Barat</td>
                <td>Kabupaten Kupang</td>
                <td>NTT</td>
                <td>
                  <a href="kelola_data_m.php?ubah=<?php echo $result['no_kk']; ?>" type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                    Edit
                  </a>
                  <a href="proses_masyarakat.php?hapus=<?php echo $result['no_kk']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                    <i class="fa fa-trash"></i>
                  </a>
                    <!-- <a href="cetak_acara.php?id=<?php echo $result['no_kk']; ?>" type="button" class="btn btn-secondary btn-sm" target="_blank">
                    <i class="fa fa-print"></i>
                    Cetak
                  </a> -->
                </td>
              </tr>
                <?php
                }
                ?>
          </tbody>
          </table>

        <a href="kelola_anggota_kk.php" type="button" class="btn btn-outline-warning mb-3">
        <i class="fa fa-plus"></i>
        Tambah Anggota Keluarga
        </a>
        </div>

        
  </div>

  <script>
      document.getElementById('searchInput').addEventListener('input', function() {
      let searchText = this.value.toLowerCase();
      let rows = document.querySelectorAll('#dataTable tbody tr');

      rows.forEach(row => {
        let rowText = row.textContent.toLowerCase();
        if (rowText.includes(searchText)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>