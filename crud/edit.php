<?php

include 'layout/header.php';
include 'controller/controller.php';
include 'koneksi/koneksi.php';

$id = $_GET['id'];

$result = mysqli_query( $conn, "SELECT * FROM pegawai WHERE id = '$id'");

$result = mysqli_fetch_assoc($result);

if(isset($_POST["edit_pegawai"])){
    if(edit_pegawai($_POST) > 0){
        echo "
        <script>
            alert('berhasil diedit');
            window.location.href = 'index.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('gagal diedit;);
            window.location.href = 'tambah.php';
        </script>
        "; 
    }
}



?>

<form action="" id="pegawaiForm" method="post" class="max-w-md mx-auto">
  <div class="relative z-0 w-full mb-5 group">
      <input  type="hidden" value="<?=$id?>"  name="id" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Pegawai</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input  type="text" value="<?=$result["nama_pegawai"]?>" id="namaPegawai" name="nama_pegawai" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Pegawai</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" value="<?=$result["bidang_pegawai"]?>" id="bidangPegawai"  name="bidang_pegawai" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bidang Pegawai</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" value="<?=$result["no_telpon"]?>" id="noTelepon"  name="no_telepon" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No Telepon</label>
  </div>
  <button type="submit" id="submitBtn" name="edit_pegawai" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pegawaiForm');
    const submitBtn = document.getElementById('submitBtn');

    const originalValues = {
      namaPegawai: document.getElementById('namaPegawai').value,
      bidangPegawai: document.getElementById('bidangPegawai').value,
      noTelepon: document.getElementById('noTelepon').value
    };

    form.addEventListener('input', function() {
      const currentValues = {
        namaPegawai: document.getElementById('namaPegawai').value,
        bidangPegawai: document.getElementById('bidangPegawai').value,
        noTelepon: document.getElementById('noTelepon').value
      };

      const isChanged = Object.keys(originalValues).some(key => originalValues[key] !== currentValues[key]);

      submitBtn.disabled = !isChanged;
    });
  });
</script>
<?php

include 'layout/footer.php';

?>
