<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-r from-blue-500 to-blue-700">
    <div class="max-w-md mx-auto bg-white p-8 border border-gray-200 mt-10 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Form Pemesanan</h2>

        <form action="hasil.php" method="post" class="mt-6">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Nama Pemesan</label>
                <input type="text" placeholder="Nama Pemesan" class="block w-full p-2 border rounded border-gray-200" name="nama_pemesan" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Jenis Kelamin</label>
                <div class="flex items-center">
                    <input type="radio" name="gender" id="laki" value="Laki-Laki" class="mr-2" required> Laki-laki
                    <input type="radio" name="gender" id="perempuan" value="Perempuan" class="ml-6 mr-2" required> Perempuan
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Nomor Identitas</label>
                <input type="number" id="No Identitas" placeholder="Nomor Identitas" name="no_identitas" class="block w-full p-2 border rounded border-gray-200">
                <div id="error_message"></div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Tipe Kamar</label>
                <select class="block w-full p-2 border rounded border-gray-200" name="tipe_kamar" required id="tipe_kamar">
                    <option disabled selected>Silahkan Pilih Kamar</option>
                    <option value="Standar">STANDAR</option>
                    <option value="Deluxe">DELUXE</option>
                    <option value="Family">FAMILY</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Harga</label>
                <input type="text" id="harga"  disabled class="block w-full p-2 border rounded border-gray-200 bg-gray-100">
                <input type="hidden" id="harga_hidden" name="harga_kamar" class="block w-full p-2 border rounded border-gray-200 bg-gray-100">
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Tanggal Pesan</label>
                <input type="date" min="<?php echo date("Y-m-d") ?>" name="tanggal_pesan" placeholder="DD/MM/YYYY" class="block w-full p-2 border rounded border-gray-200">
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Durasi Menginap</label>
                <input type="text" id="nginap" name="durasi_nginap" class="block w-full p-2 border rounded border-gray-200">
                <label >Hari</label>
                <div id="nginap_error"></div>
            </div>

            <div class="flex items-center mb-4">
                <input type="checkbox" id="breakfast" name="breakfast" class="mr-2"> Termasuk Breakfast
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2">Total Bayar</label>
                <input type="text" id="total_harga" disabled class="block w-full p-2 border rounded border-gray-200 bg-gray-100">
                <input type="hidden" name="total_harga" id="total_harga_hidden"  class="block w-full p-2 border rounded border-gray-200 bg-gray-100">
                <input type="hidden" name="diskon" id="diskon">
            </div>

            <div class="flex justify-between items-center">
                <button type="button" id="tombol_hitung" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Hitung Total Bayar
                </button>
                <div>
                    <button type="submit" id="submit_button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" disabled>
                        Simpan
                    </button>
                    <button type="reset" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>

        var no_identitas = document.getElementById('No Identitas');
        var errorContainer = document.getElementById('error_message'); // Tempat untuk menampilkan pesan error
        var submitButton = document.getElementById('submit_button'); // Tombol submit
        var hasErrorNoIdentitas = false;
        var hasErrorNginap = false;

        no_identitas.addEventListener('change', (e)=>{
            var inputLength = e.target.value.length
            console.log(inputLength);
            if(inputLength != 16){
                errorContainer.innerHTML = "<div class='text-red-500'>Isian salah.. data harus 16 digit.</div>"
                hasErrorNoIdentitas = true
            }else{
                errorContainer.innerHTML = ""
                hasErrorNoIdentitas = false

            }
            checkFormValidity()
        })

        function checkFormValidity() {
            if (hasErrorNoIdentitas || hasErrorNginap ) {
                submitButton.disabled = true; // Disable tombol submit jika ada error
            } else {
                submitButton.disabled = false; // Enable tombol submit jika tidak ada error
            }
        }
        var nginap = document.getElementById('nginap');
        var error_nginap = document.getElementById('nginap_error')

        nginap.addEventListener('change', (e)=>{
            var input = parseInt(e.target.value, 10)
            if(isNaN(input) || input <= 0){
                error_nginap.innerHTML = "<div class='text-red-500'>Harus berupa angka</div>"
                hasErrorNginap = true
            }else{
                error_nginap.innerHTML = ""
                hasErrorNginap = false
            }
            checkFormValidity()
        })
        var tipeKamar = document.getElementById('tipe_kamar');
        var hargaInput = document.getElementById('harga');
        var hargaHiddenInput = document.getElementById('harga_hidden');

        tipeKamar.addEventListener('change', () =>{
            var harga
            switch(tipeKamar.value){
                case "Standar" :
                    harga = 500000
                    break;
                case "Deluxe" : 
                    harga = 750000
                    break
                case "Family" :
                    harga = 1000000
                    break
                default :
                    harga = 0
            }

            var formattedHarga = harga.toLocaleString('id-ID', {style: 'currency', currency: "IDR"})

            hargaInput.value = formattedHarga
            hargaHiddenInput.value = harga
            console.log(hargaHiddenInput.value)
        })

        tipeKamar.dispatchEvent(new Event('change'));

        var tombolHitung =document.getElementById('tombol_hitung')

        tombolHitung.addEventListener('click', (e)=>{
            var hargaKamar = {
                "Standar" : 500000,
                "Deluxe" : 750000,
                "Family" : 1000000
            }

            var tipe_kamar_value = tipeKamar.value;
            var durasi_nginap_value = parseInt(nginap.value)
            var breakfast = document.getElementById("breakfast").checked


            var hargaPerMalam =hargaKamar[tipe_kamar_value]

            var totalHarga = hargaPerMalam * durasi_nginap_value
            var is_diskon = document.getElementById('diskon').value
            if(durasi_nginap_value > 3){
                totalHarga = totalHarga * 0.9                
            }

            if (breakfast){
                totalHarga += 80000
            }

            var formattedTotalHarga = totalHarga.toLocaleString('id-ID', {style: 'currency', currency: "IDR"})
            document.getElementById('total_harga').value = formattedTotalHarga
            document.getElementById('total_harga_hidden').value = formattedTotalHarga
            console.log(document.getElementById('total_harga_hidden').value)
        })
    </script>
</body>
</html>