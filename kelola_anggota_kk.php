<!DOCTYPE html>

<?php
    require "koneksi.php";

    // $nomor = "";
    $nama_lengkap = "";
    $nik = "";
    $jenis_kelamin = "";
    $tempat_lahir = ""; 
    $tanggal_lahir = ""; 
    $agama = "";
    $pendidikan = "";
    $jenis_pekerjaan = "";
    // $id_acara = ;
    
    if(isset($_GET['ubah'])){
        $id = $_GET['ubah'];
    
        $query = "SELECT * FROM anggota_kk WHERE id = '$id'";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nama_lengkap = $result['nama_lengkap'];
        $nik = $result['nik'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $tempat_lahir = $result['tempat_lahir'];
        $tanggal_lahir = $result['tanggal_lahir'];
        $agama = $result['agama'];
        $pendidikan = $result['pendidikan'];
        $jenis_pekerjaan = $result['jenis_pekerjaan'];
    }
?>

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

<div class="container">
    <figure style="margin-top: 10px;">
      <blockquote class="blockquote">
        <h4>Anggota Keluarga</h4>
      </blockquote>
      </figure>
      <?php
    if(isset($_GET['ubah'])){
        ?>
    <form action="proses_anggota_kk.php?no_kk=<?php echo $no_kk?>" method="POST" enctype="multipart/form-data">
    <?php }else{
    ?>
        <form action="proses_anggota_kk.php" method="POST" enctype="multipart/form-data">
    <?php
    } ?>
        <input type="hidden" value="<?php echo $id ?>" name="id" class="mt-4">
         <div class="mb-3 row mt-4">
                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap; ?>">
                </div>
            </div>
         <div class="mb-3 row mt-4">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="number" name="nik" class="form-control" value="<?php echo $nik; ?>">
                </div>
            </div>
        <div class="mb-3 row mt-4">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3 row mt-4">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="text" name="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>">
                </div>
            </div>
        <div class="mb-3 row mt-4">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="date" name="tanggal_lahir" class="form-control" value="<?php echo $tanggal_lahir; ?>">
                </div>
            </div>
        <div class="mb-3 row mt-4">
                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                <select name="agama" id="agama" class="form-control" required>
                    <option value="" disabled selected>Pilih Agama</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                </div>
            </div>
        <div class="mb-3 row mt-4">
                <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control" required>
                    <option value="" disabled selected>Pilih Pendidikan</option>
                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                    <option value="Diploma 1-3">Diploma 1-3</option>
                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                </select>
            </div>
            <div class="row">
                <label for="jenis_pekerjaan" class="col-sm-2 col-form-label mt-3">Jenis Pekerjaan</label>
                <div class="col-md-10 form-group mt-3">
                    <input class="form-control" style="height: 45px" list="jenis_pekerjaan" name="jenis_pekerjaan" id="jenis_kerja" placeholder="Pilih Pekerjaan" required>
                    <datalist id="jenis_pekerjaan">
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                        <option value="Tidak Petani">Tidak Petani</option>
                        <option value="Buruh Tani">Buruh Tani</option>
                        <option value="Buruh Bangunan">Buruh Bangunan</option>
                        <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                        <option value="Nelayan">Nelayan</option>
                        <option value="Guru">Guru</option>
                        <option value="Pedagang Besar">Pedagang Besar</option>
                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                        <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                        <option value="PNS">PNS</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Perangkat">Perangkat Desa</option>
                        <option value="TKI">TKI</option>
                        <option value="Polri">POLRI</option>
                        <option value="TNI">TNI</option>
                        <option value="Lainnya">Lainnya</option>
                    </datalist>
                </div>
            </div>

            <div class="mb-3 row mt-4">
                <label for="nomor_kk" class="col-sm-2 col-form-label">Kartu Keluarga</label>
                <select name="no_kk" class="form-control">
            <?php
            $queryKK = "SELECT * FROM kartu_keluarga";
            $sqlKK = mysqli_query($conn, $queryKK);

            if ($sqlKK) {
                while ($row = mysqli_fetch_assoc($sqlKK)) {
                    // Inside this loop, $row represents a single row of the result set
                    echo '<option value="' . $row['no_kk'] . '">' . $row['kepala_keluarga'] . '</option>';
                }
            } else {
                // Handle the case where the query fails
                echo "Error: " . mysqli_error($conn);
            }

            // Don't forget to free the result set when you're done with it
            mysqli_free_result($sqlKK);
            ?>
            </select>
                
            </div>
                


           
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                            ?>
                        <button type="submit" name="ubah" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                        <?php
                        }else{
                            ?>
                            <button type="submit" name="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Tambahkan
                            </button>
                            <?php
                        }
                        ?>
                        <?php
                        if(isset($_GET['ubah'])){
                            ?>
                       <a href="data_kegiatan.php?id=<?php echo $id_acara ?>" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                        </a>
                        <?php
                        }else{
                            ?>
                             <a href="data_acara.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                         </a>
                            <?php
                        }
                        ?>
                   
            </div>
            
        </div>
        
    </form>
    
</div>
    
    
    
    
    
    
</body>
</html>