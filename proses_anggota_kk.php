<?php

    require "koneksi.php";

    // $no_kk = $_GET['id_kk'];
    // $kepala_keluarga = $_GET['kepala_keluarga'];
    // echo json_encode($_POST);
    // echo json_encode($_GET);

/* CREATE data */

    if(isset($_POST['add'])){
                // $no_kk = $_GET['id'];
                // $id = $_POST['id'];
                $nama_lengkap = $_POST['nama_lengkap'];
                $nik = $_POST['nik'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $tempat_lahir = $_POST['tempat_lahir'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $agama = $_POST['agama'];
                $pendidikan = $_POST['pendidikan'];
                $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
                $no_kkx = $_POST['no_kk'];

                // echo json_encode($_POST);

                try{
                   $query = "INSERT INTO anggota_kk (nama_lengkap, nik, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, pendidikan, jenis_pekerjaan, no_kk) VALUES('$nama_lengkap', '$nik', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$pendidikan', '$jenis_pekerjaan', '$no_kkx')";
                    
                    $sql = mysqli_query($conn, $query);
                    header("Location: anggota_kk.php?id_kk=$no_kkx");
                }catch(Exception $e){
                    echo "Gagal: " . $e->getMessagge();
                    
                    // $_SESSION['failed-alert'] = 'Gagal';
                    header("Location: anggota_kk.php?id_kk=$no_kkx");
                    exit();
                }
            }
              
// /*        */

// /* UPDATE data */

            elseif(isset($_GET['id_kk'])){
                $id_kk = $_GET['id_kk'];

                // $no_kk = $_GET['id_kk'];
                
                $id = $_POST['id'];
                $nama_lengkap = $_POST['nama_lengkap'];
                $nik = $_POST['nik'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $tempat_lahir = $_POST['tempat_lahir'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $agama = $_POST['agama'];
                $pendidikan = $_POST['pendidikan'];
                $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
                $no_kk = $_POST['no_kk'];

                // echo json_encode($_POST);

                try{
                    // $queryShow = "SELECT * FROM anggota_kk WHERE id = '$id'";
                    // $sqlShow = mysqli_query($conn, $queryShow);
                    // $result = mysqli_fetch_assoc($sqlShow);

                    $query = "UPDATE anggota_kk SET nama_lengkap = '$nama_lengkap', nik = '$nik', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', agama = '$agama', pendidikan = '$pendidikan', jenis_pekerjaan = '$jenis_pekerjaan', no_kk = '$no_kk' WHERE id = '$id'";
                    $sql = mysqli_query($conn, $query);

                    // echo json_encode($sql);

                    header("Location: anggota_kk.php?id_kk=$no_kk");
                }catch(mysqli_sql_exception $e){
                    // echo "Gagal: " . $e->getMessagge();
                    $errorMessage = $e->getMessage(); // Perhatikan penulisan yang benar di sini
                    echo "Error: $errorMessage";
                    
                    // $_SESSION['failed-alert'] = 'Gagal';
                    header("Location: anggota_kk.php?id_kk=$no_kk");
                    exit();
                }
}        
    
//     /*        */

// /* DELETE data */

        elseif(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        // $no_kk = $_GET['id_kk'];
        // $no_kk = $_POST['no_kk'];
        // echo json_encode($_GET);
        try{
            $query = "DELETE FROM anggota_kk WHERE id = '$id'";
            $sql = mysqli_query($conn, $query);
            // $redirect = true;

            // echo '<script>

            //         // if(confirm){
            //         //     alert("Data Berhasil Dihapus!");
            //         // }else{
            //         //     alert("Penghapusan Data Dibatalkan!");
            //         // }

            //     if(confirm("Data berhasil dihapus. Apakah Anda ingin kembali ke halaman anggota keluarga?")) 
            //     } else {
            //         window.location.href = "anggota_kk.php?id_kk='.$_GET['no_kk'].'";
            //     }
            // </script>';
            
            header("Location: data_masyarakat.php");
        }catch(mysqli_sql_exception $e){
            // echo "Gagal: " . $e->getMessagge();
            $errorMessage = $e->getMessage(); // Perhatikan penulisan yang benar di sini
            echo "Error: $errorMessage";
            
            // $_SESSION['failed-alert'] = 'Gagal';
            header("Location: anggota_kk.php?id_kk=$no_kk");
            exit();
        }
    }

/*        */



?>