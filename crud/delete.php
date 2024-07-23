<?php

include 'controller/controller.php';


$id = (int)$_GET['id'];

if (delete_pegawai($id) > 0){
    echo "
    <script>
        alert('berhasil dihapus');
        window.location.href = 'index.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('gagal dihapus');
        window.location.href = 'index.php';
    </script>
    ";
}