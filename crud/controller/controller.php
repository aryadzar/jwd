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

function tambah_pegawai($post){
    global $conn;

    $nama = $post['nama_pegawai'];
    $bidang = $post['bidang_pegawai'];
    $no_telpon = $post['no_telepon'];

    mysqli_query($conn, "INSERT INTO pegawai (nama_pegawai, bidang_pegawai, no_telpon) VALUES('$nama', '$bidang', '$no_telpon')");


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