<?php

include 'koneksi/koneksi.php';

function select($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
      }
    
      return $rows;
}

function tambah_pegawai($post, $files){
    global $conn;
    
    if (empty($post['nama_pegawai']) || empty($post['bidang_pegawai']) || empty($post['no_telepon'])) {
        return 'Semua field harus diisi';
    }

    $nama = $post['nama_pegawai'];
    $bidang = $post['bidang_pegawai'];
    $no_telpon = $post['no_telepon'];

    if($files["foto"]["error"] === 4){
        echo"
            <script>
              alert('Gambar Teknisi Belum Di Upload');
            </script>
  
          ";
          return false;
      }
    $fileName = $files["foto"]["name"];
    $fileSize = $files["foto"]["size"];
    $tmpName =  $files["foto"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if(!in_array($imageExtension, $validImageExtension)){
      echo "
        <script>
        alert('Gambar harus jpg, jpeg, png');
      </script>
      ";

      return false;
    }

    if($fileSize > 5000000){
      echo "
      <script>
        alert('Gambar tidak boleh lebih dari 5MB');
      </script>
    ";

    return false;
    }

    $newImageName = uniqid();
    $newImageName .= ".".$imageExtension;

    move_uploaded_file($tmpName, "./foto/".$newImageName );
    mysqli_query($conn, "INSERT INTO pegawai (foto,nama_pegawai, bidang_pegawai, no_telpon) VALUES( '$newImageName', '$nama', '$bidang', '$no_telpon')");


    return mysqli_affected_rows($conn);
}
function edit_pegawai($post){
    global $conn;

    $id = $post['id'];
    $nama = $post['nama_pegawai'];
    $bidang = $post['bidang_pegawai'];
    $no_telpon = $post['no_telepon'];

    mysqli_query($conn, "UPDATE pegawai SET nama_pegawai = '$nama', bidang_pegawai = '$bidang', no_telpon = '$no_telpon' WHERE id = '$id'");


    return mysqli_affected_rows($conn);
}
function delete_pegawai($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM pegawai WHERE id = '$id'");

    return mysqli_affected_rows($conn);
}