<!DOCTYPE html>

<?php
    require "koneksi.php";

    // $nomor = "";
    $no_kk = "";
    $kepala_keluarga = "";
    $alamat = "";
    $rt_rw = "";
    $kode_pos = "";
    $dusun = "";

    if(isset($_GET['ubah'])){
        $no_kk = $_GET['ubah'];
        
        $query = "SELECT * FROM kartu_keluarga WHERE no_kk = '$no_kk'";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $kepala_keluarga = $result['kepala_keluarga'];
        $alamat = $result['alamat'];
        $rt_rw = $result['rt_rw'];
        $kode_pos = $result['kode_pos'];
        $dusun = $result['dusun'];
       
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
    <?php if(isset($_GET['ubah'])){
    ?>
    <form action="proses_masyarakat.php?no_kk=<?php echo $no_kk ?>" method="POST" enctype="multipart/form-data">
    <?php }else{ ?>
       <form action="proses_masyarakat.php" method="POST" enctype="multipart/form-data"> 
    <?php } ?>

        <input type="hidden" value="add" name="no_kk" class="mt-4">

     <figure style="margin-top: 20px;">
      <blockquote class="blockquote">
        <h4>Kartu Keluarga</h4>
      </blockquote>
      </figure>
                <div class="mb-3 row mt-4">
                <label for="no_kk" class="col-sm-2 col-form-label">No. KK</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="number" name="no_kk" class="form-control" id="no_kk" placeholder="Masukan Nomor Kartu Keluarga" value="<?php echo $no_kk; ?>">
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <label for="kepala_keluarga" class="col-sm-2 col-form-label">Nama Kepala Keluarga</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="text" name="kepala_keluarga" class="form-control" id="kepala_keluarga" placeholder="Masukan Kepala Keluarga" value="<?php echo $kepala_keluarga; ?>">
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <label for="alamat" class="col-sm-2 col-form-label" placeholder="Masukan Alamat">Alamat</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>
            
    <div class="row">
    <label for="rt_rw" class="col-sm-2 col-form-label mt-3">Pilih RT/RW</label>
    <div class="col-md-10 form-group mt-3">
        <input class="form-control" style="height: 45px" list="daftar_rt_rw" name="rt_rw" id="rt_rw" placeholder="Pilih RT/RW">
        <datalist id="daftar_rt_rw">
            <option value="01/01">
            <option value="02/01">
            <option value="03/02">
            <option value="04/02">
            <option value="05/02">
            <option value="06/02">
            <option value="07/02">
            <option value="08/02">
            <option value="09/02">
            <option value="10/02">
            <option value="11/02">
            <option value="12/02">
            <option value="13/02">
            <option value="14/02">
            <option value="15/02">
            <option value="16/02">
        </datalist>  
    </div>
    </div>
            <div class="mb-3 row mt-4">
                <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                <div class="col-sm-10">
                    <input autocomplete="off" required type="number" name="kode_pos" class="form-control" id="kode_pos" placeholder="Masukan Kode Pos" value="<?php echo $kode_pos; ?>">
                </div>
            </div>
            <div class="mb-3 row mt-4">
            <label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
            <select name="dusun" id="dusun" class="form-control" required>
                <option value="" disabled selected>Pilih Dusun</option>
                <option value="04">Dusun 04</option>
                <option value="03">Dusun 03</option>
                <option value="02">Dusun 02</option>
                <option value="01">Dusun 01</option>
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
                            <button type="submit" name="aksi" value="add" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Tambahkan
                            </button>
                            <?php
                        }
                        ?>
                    <a href="data_masyarakat.php" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Batal
                    </a>
            </div>
            
        </div>
        
    </form>
    
</div>
    
</body>
</html>