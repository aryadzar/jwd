<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "crud_pegawai_jws";

$conn = mysqli_connect($server, $user, $password, $db);

if(!$conn){
    echo "Error SQL : ". mysqli_connect_error();
    return;
}





?>