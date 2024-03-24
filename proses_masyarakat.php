<?php
require "koneksi.php";

if(isset($_POST['aksi']) && ($_POST['aksi']) == "add"){

    // $id = $_POST['id'];
    $no_kk = $_POST['no_kk'];
    $kepala_keluarga = $_POST['kepala_keluarga'];
    $alamat = $_POST['alamat'];
    $rt_rw = $_POST['rt_rw'];
    $kode_pos = $_POST['kode_pos'];

    // echo json_encode($_POST);

    try{
        $query = "INSERT INTO kartu_keluarga (no_kk, kepala_keluarga, alamat, rt_rw, kode_pos) VALUES ('$no_kk', '$kepala_keluarga', '$alamat', '$rt_rw', '$kode_pos')";
        $sql = mysqli_query($conn, $query);

        header("Location: data_masyarakat.php");
    }catch(mysqli_sql_exception $e){
        // echo "Gagal: " . $e->getMessagge();
        $errorMessage = $e->getMessage(); // Perhatikan penulisan yang benar di sini
        echo "Error: $errorMessage";
        // $_SESSION['failed-alert'] = 'Gagal';
        header("Location: data_masyarakat.php");
        exit();
    }


}elseif(isset($_GET['kk_id'])){
                $kk_id = $_GET['kk_id'];

                // $id = $_POST['id'];
                $no_kk = $_POST['no_kk'];
                $kepala_keluarga = $_POST['kepala_keluarga'];
                $alamat = $_POST['alamat'];
                $rt_rw = $_POST['rt_rw'];
                $kode_pos = $_POST['kode_pos'];

                // echo json_encode($_POST);
                
                try{
                    $query = "UPDATE kartu_keluarga SET no_kk = '$no_kk', kepala_keluarga = '$kepala_keluarga',
                    alamat = '$alamat', rt_rw = '$rt_rw', kode_pos = '$kode_pos' WHERE kk_id = '$kk_id'";
                    $sql = mysqli_query($conn, $query);

                    header("Location: data_masyarakat.php");
                    // echo json_encode($_POST);
                }catch(mysqli_sql_exception $e){
                    // echo "Gagal: " . $e->getMessagge();
                    $errorMessage = $e->getMessage(); // Perhatikan penulisan yang benar di sini
                    echo "Error: $errorMessage";
                    // $_SESSION['failed-alert'] = 'Gagal';
                    header("Location: data_masyarakat.php");
                    exit();
                }
             
            }
    

    /*        */


/* DELETE data */

    if(isset($_GET['hapus'])){
        $kk_id = $_GET['hapus'];

        echo json_encode($_GET);
        try{
            $query = "DELETE FROM kartu_keluarga WHERE kk_id = '$kk_id'";
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

?>