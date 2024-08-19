<?php 

include 'koneksi/koneksi.php';
include 'controller/controller.php';
include "layout/header.php";


$data_pegawai = select("SELECT * FROM pegawai");
?>


    



<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 container mx-auto">
    <a href="tambah.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-5">Tambah</a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    NIP Pegawai
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar Pegawai
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Pegawai
                </th>
                <th scope="col" class="px-6 py-3">
                    Bidang Pegawai
                </th>
                <th scope="col" class="px-6 py-3">
                    No telpon
                </th>
                <th scope="col" class="px-6 py-3">
                    Dibuat pada tanggal 
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($data_pegawai as $datum) : ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $datum["id"]?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src="./foto/<?=$datum["foto"]?>" width="30%" height="30%" alt="">
                </th>
                <td class="px-6 py-4">
                <?= $datum["nama_pegawai"]?>
                </td>
                <td class="px-6 py-4">
                <?= $datum["bidang_pegawai"]?>
                </td>
                <td class="px-6 py-4">
                    <?= $datum["no_telpon"]?>
                </td>
                <td class="px-6 py-4">
                <?= date('d/m/Y H:i:s', strtotime($datum["created_at"])) ?>
                </td>
                <td class="px-6 py-4">
                    <a href="edit.php?id=<?=$datum["id"]?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="delete.php?id=<?=$datum['id']?>" onclick="return confirm('Yakin mau menghapus data <?=$datum['nama_pegawai']?>');" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>




<?php 

include "layout/footer.php";

?>
