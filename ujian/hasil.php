<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $nama_pemesan =  $_POST['nama_pemesan'];
       $jenis_kelamin = $_POST["gender"];
       $no_identitas = $_POST["no_identitas"];
       $tipe_kamar = $_POST["tipe_kamar"];
       $harga_kamar = $_POST["harga_kamar"];
       $tanggal_pesan = $_POST["tanggal_pesan"];
       $durasi_nginap = $_POST["durasi_nginap"];
       $breakfast = isset($_POST["breakfast"]) ?  "Ya" : "Tidak";
       $total_harga = $_POST["total_harga"];
       $diskon = $_POST["diskon"];


    }else{
        echo "Illegal Request";
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v20.0" nonce="jjUSuSov"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-blue-700">
<div class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md text-gray-600">
        <img src="https://img.freepik.com/premium-vector/hotel-icon-logo-vector-design-template_827767-3569.jpg" class="w-16 h-16 mr-3 rounded-full shadow-md  items-center mt-5" alt="">
        <div class="mt-3">
            <span class="font-semibold">Nama Pemesan</span> : <?= htmlspecialchars($nama_pemesan) ?>
        </div>
        <div class="mt-3">
            <span class="font-semibold">Nomor Identitas</span> : <?= htmlspecialchars($no_identitas) ?>
        </div>
        <div class="mt-3">
            <span class="font-semibold">Jenis Kelamin</span> : <?= htmlspecialchars($jenis_kelamin) ?>
        </div>
        <div class="mt-3">
            <span class="font-semibold">Tipe Kamar</span> : <?= htmlspecialchars($tipe_kamar) ?>
        </div>
        <div class="mt-3">
            <span class="font-semibold">Durasi Penginapan</span> : <?= htmlspecialchars($durasi_nginap) ?> Hari
        </div>
        <div class="mt-3">
            <span class="font-semibold">Diskon</span> : 
            <?= $durasi_nginap > 3 ? '10%' : '0%' ?>
        </div>
        <div class="mt-3">
            <span class="font-semibold">Total Bayar</span> : <?= htmlspecialchars($total_harga) ?>
        </div>
        <div class="mt-3">
            <span class="font-semibold">Video dan Foto Kamar</span> : <?php if($tipe_kamar == "Standar" ){?>
                <div class="bg-gray-200 p-4 rounded-lg shadow-md ">
                    <img src="https://www.pantaimentari.com/upload/2021/09/Pencahayaan_kamar-2.jpg" alt="Kamar Standar" class="w-full h-48 object-cover rounded">
                    <iframe width="560" class="mt-5" height="315" src="https://www.youtube.com/embed/5jsAsamJeWE?si=1kjlyuPRN82c0gqN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>            
            <?php }else if ($tipe_kamar == "Deluxe"){ ?>
                <div class="bg-gray-200 p-4 rounded-lg shadow-md">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSG-cBjE2ce-NQGLtdJ2gDA6QJtHu82PGplVw&s" alt="Kamar Standar" class="w-full h-48 object-cover rounded">
                    <div class="fb-post mt-5" data-href="https://www.facebook.com/watch/?v=10159234865157438" data-width="500" data-show-text="false"><blockquote cite="https://www.facebook.com/cambridgehotelmedan/videos/10159234865157438/" class="fb-xfbml-parse-ignore"><p>Superior Deluxe Room Cambridge Hotel Medan.
.
                    Ini nih salah satu tipe kamar favorit netizen di Cambridge Hotel...</p>Dikirim oleh <a href="https://facebook.com/cambridgehotelmedan">Cambridge Hotel Medan</a> pada&nbsp;<a href="https://www.facebook.com/cambridgehotelmedan/videos/10159234865157438/">Selasa, 25 Mei 2021</a></blockquote></div>
                </div>
            <?php } else { ?>
                <div class="bg-gray-200 p-4 rounded-lg shadow-md">
                    <img src="https://i2.wp.com/www.emporiointerior.com/upload/blog/model-interior-rumah-sultan-super-mewah-di-jambi-review-desain-interior-kamar-tidur-utama-klasik-part-16-180323014657366237.jpg" alt="Kamar Standar" class="w-full h-48 object-cover rounded">
                    <iframe width="560" class="mt-5" height="315" src="https://www.youtube.com/embed/EErZn6qz1ZU?si=Gl7CXZ146WDdKRrx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <?php }?>
        </div>
    </div>
</div>
</body>
</html>