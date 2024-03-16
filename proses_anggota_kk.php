<?php

    require "koneksi.php";

    $no_kk = $_GET['id'];

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
                    header("Location: anggota_kk.php?id=$no_kkx");
                }catch(Exception $e){
                    echo "Gagal: " . $e->getMessagge();
                    
                    // $_SESSION['failed-alert'] = 'Gagal';
                    header("Location: anggota_kk.php?id=$no_kkx");
                    exit();
                }

              
/*        */

/* UPDATE data */

            }elseif(isset($_POST['ubah'])){

                $id = $_POST['id'];
                $nama_lengkap = $_POST['nama_lengkap'];
                $nik = $_POST['nik'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $tempat_lahir = $_POST['tempat_lahir'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $agama = $_POST['agama'];
                $pendidikan = $_POST['pendidikan'];
                $jenis_pekerjaan = $_POST['jenis_pekerjaan'];

                // echo json_encode($_POST);

                try{
                    $queryShow = "SELECT * FROM anggota_kk WHERE id = '$id'";
                    $sqlShow = mysqli_query($conn, $queryShow);
                    $result = mysqli_fetch_assoc($sqlShow);
                    
                    $query = "UPDATE anggota_kk SET id = '$id', nama_lengkap = '$nama_lengkap', nik = '$nik', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', agama = '$agama', pendidikan = '$pendidikan', jenis_pekerjaan = '$jenis_pekerjaan' WHERE id = '$id'";
                    $sql = mysqli_query($conn, $query);
                    header("Location: anggota_kk.php?id=$no_kk");
                }catch(Exception $e){
                    echo "Gagal: " . $e->getMessagge();
                    
                    // $_SESSION['failed-alert'] = 'Gagal';
                    header("Location: anggota_kk.php?id=$no_kk");
                    exit();
                }
            }
    

    /*        */


/* DELETE data */

    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];


        try{
            $query = "DELETE FROM anggota_kk WHERE id = '$id'";
            $sql = mysqli_query($conn, $query);
            
            header("Location: anggota_kk.php?id=$no_kk");
        }catch(Exception $e){
            echo "Gagal: " . $e->getMessagge();
            
            // $_SESSION['failed-alert'] = 'Gagal';
            header("Location: anggota_kk.php?id=$no_kk");
            exit();
        } 
    }

/*        */



?>