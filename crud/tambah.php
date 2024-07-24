<?php

include 'layout/header.php';
include 'controller/controller.php';

if(isset($_POST["tambah_pegawai"])){
    if(tambah_pegawai($_POST, $_FILES) > 0){
        echo "
        <script>
            alert('berhasil ditambah');
        </script>
        ";

    }else{
        echo "
        <script>
            alert('gagal ditambah;);
            window.location.href = 'tambah.php';
        </script>
        "; 
    }
}



?>

<form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto mt-10">
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="nama_pegawai" maxlength="255" id="nama_pegawai" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="nama_pegawai" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Pegawai</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="bidang_pegawai" id="bidang_pegawai" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="bidang_pegawai" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bidang Pegawai</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="number" name="no_telepon" id="no_telepon" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="no_telepon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No Telepon</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
      <input type="file" name="foto" id="no_telepon" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="no_telepon" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No Telepon</label>
  </div>
  <button type="submit" id="submit_button" name="tambah_pegawai" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 disabled:opacity-50 disabled:cursor-not-allowed" disabled>Submit</button>
</form>

<script>
  const namaPegawai = document.getElementById('nama_pegawai');
  const bidangPegawai = document.getElementById('bidang_pegawai');
  const noTelepon = document.getElementById('no_telepon');
  const submitButton = document.getElementById('submit_button');

  function validateForm() {
    if (namaPegawai.value && bidangPegawai.value && noTelepon.value) {
      submitButton.disabled = false;
      submitButton.classList.remove('disabled:cursor-not-allowed');
    } else {
      submitButton.disabled = true;
      submitButton.classList.add('disabled:cursor-not-allowed');
    }
  }

  namaPegawai.addEventListener('input', validateForm);
  bidangPegawai.addEventListener('input', validateForm);
  noTelepon.addEventListener('input', validateForm);
</script>
<?php

include 'layout/footer.php';

?>
