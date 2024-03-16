<?php
require "koneksi.php";


if(isset($_POST['aksi']) && ($_POST['aksi']) == "add"){

    $no_kk = $_POST['no_kk'];
    $kepala_keluarga = $_POST['kepala_keluarga'];
    $alamat = $_POST['alamat'];
    $rt_rw = $_POST['rt_rw'];
    $kode_pos = $_POST['kode_pos'];
    $dusun = $_POST['dusun'];

    try{
        $query = "INSERT INTO kartu_keluarga (no_kk, kepala_keluarga, alamat, rt_rw, kode_pos, dusun) VALUES ('$no_kk', '$kepala_keluarga', '$alamat', '$rt_rw', '$kode_pos', '$dusun')";
        // $query2 = "INSERT INTO acara VALUES('$id_acara')";
        $sql = mysqli_query($conn, $query);
        // $sql = mysqli_query($conn, $query2);
        header("Location: data_masyarakat.php");
    }catch(Exception $e){
        echo "Gagal: " . $e->getMessagge();
        
        // $_SESSION['failed-alert'] = 'Gagal';
        header("Location: data_masyarakat.php");
        exit();
    }


}elseif(isset($_GET['no_kk'])){
                $no_kk = $_GET['no_kk'];

                $kepala_keluarga = $_POST['kepala_keluarga'];
                $alamat = $_POST['alamat'];
                $rt_rw = $_POST['rt_rw'];
                $kode_pos = $_POST['kode_pos'];
                $dusun = $_POST['dusun'];
                
                try{
                    $query = "UPDATE kartu_keluarga SET no_kk = '$no_kk', kepala_keluarga = '$kepala_keluarga',
                    alamat = '$alamat', rt_rw = '$rt_rw', kode_pos = '$kode_pos', dusun = '$dusun' WHERE no_kk = '$no_kk'";
                    $sql = mysqli_query($conn, $query);
                    header("Location: data_masyarakat.php");
                }catch(Exception $e){
                    echo "Gagal: " . $e->getMessagge();
                    
                    // $_SESSION['failed-alert'] = 'Gagal';
                    header("Location: data_masyarakat.php");
                    exit();
                }
            }
    

    /*        */


/* DELETE data */

    if(isset($_GET['hapus'])){
        $no_kk = $_GET['hapus'];

        try{
            $query = "DELETE FROM kartu_keluarga WHERE no_kk = '$no_kk'";
            $sql = mysqli_query($conn, $query);
            
            header("Location: data_masyarakat.php?no_kk=$no_kk");
        }catch(Exception $e){
            echo "Gagal: " . $e->getMessagge();
            
            // $_SESSION['failed-alert'] = 'Gagal';
            header("Location: data_masyarakat.php?no_kk=$no_kk");
            exit();
        } 
    }

/*        */

?>