<?php

  require "koneksi.php";

  $no_kk = $_GET['id'];

  $query = "SELECT * FROM anggota_kk WHERE no_kk = '$no_kk'";
  $query2 = "SELECT * FROM kartu_keluarga JOIN anggota_kk ON anggota_kk.no_kk = kartu_keluarga.no_kk";
  // $query3 = "SELECT * FROM kegiatan WHERE id_acara = $id_acara"; 
  // $query4 = "SELECT * FROM acara";
  
  $sql = mysqli_query($conn, $query);
  $sql2 = mysqli_query($conn, $query2);
  // $sql3 = mysqli_query($conn, $query3);
  // $sql4 = mysqli_query($conn, $query4);

  // echo json_encode(mysqli_fetch_array($sql2));

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
      <h1 class="mt-4" style="color: #763c00">DAFTAR ANGGOTA KELUARGA</h1>
      <figure>
      <blockquote class="blockquote">
        <p>Berikut adalah data yang telah disimpan di database.</p>
      </blockquote>
      </figure>
      <blockquote class="blockquote">
        <p>Anggota Keluarga</p>
      </blockquote>
      <a href="kelola_anggota_kk.php" type="button" class="btn btn-outline-warning mb-3">
        <i class="fa fa-plus"></i>
        Tambah Anggota Keluarga
      </a>
      <div class="table-responsive">
          <table class="table align-middle table-bordered table-hover">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Jenis Pekerjaan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while($result = mysqli_fetch_array($sql)){

              ?>
              <tr>
                <td><center>
                  <?php echo ++$no; ?>.
                </center></td>
                <td><?php echo $result['nama_lengkap']; ?></td>
                <td><?php echo $result['nik']; ?></td>
                <td><?php echo $result['jenis_kelamin']; ?></td>
                <td><?php echo $result['tempat_lahir']; ?></td>
                <td><?php echo $result['tanggal_lahir']; ?></td>
                <td><?php echo $result['agama']; ?></td>
                <td><?php echo $result['pendidikan']; ?></td>
                <td><?php echo $result['jenis_pekerjaan']; ?></td>
                <td>
                  <a href="kelola_anggota_kk.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                    Edit
                  </a>
                  <a href="proses_anggota_kk.php?hapus=<?php echo $result['id']; ?>&id=<?php echo $id; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr>
                <?php
                }
                ?>
          </tbody>
          </table>

        </div>
        
  </div>

  <script>
    const pekerja = document.getElementById('pekerja');
    const button = document.getElementById('tambah_pekerja');

    button.addEventListener('click', () => {
      pekerja.style.display = pekerja.style.display === 'none' ? 'block' : 'none';
    })

   const select = document.getElementsByClassName('absenSelect')
   Array.from(select).forEach(s=>{
     s.addEventListener('change', function() {
        var selectedValue = this.value;
        console.log(selectedValue)
  
        const data = this.getAttribute('data-id-pekerja');
  
        const bodyData = 'id_pekerja=' + encodeURIComponent(data) + '&absen=' + encodeURIComponent(selectedValue);
  
        fetch('submit_pekerja.php?type=absen&id_acara=<?php echo $id_acara; ?>', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: bodyData
        }).then(data=> location.reload(true))
      })

   })
  </script>

</body>
</html>