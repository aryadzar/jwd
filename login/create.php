
<?php

include 'koneksi/koneksi.php';

if(isset($_POST['submit'])){
  $name = $_POST['name']; 
  $email = $_POST['email']; 
  $password = $_POST['password'];
  
  $hashed = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO users (email, name, password) VALUES('$email', '$name', '$hashed')");

  if(mysqli_affected_rows($conn) > 0 ){
    echo"
      <script>
      alert('Berhasil Membuat Akun');
      window.location.href = 'login.php';
      </script>
    ";
  }
  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create Account</title>
</head>
<body>
    
<div class="min-h-screen flex items-center justify-center bg-gray-50">
  <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Form Section -->
    <div class="w-full md:w-1/2 p-8 md:p-12">
      <div class="mb-4">
        <img src="https://glints.com/id/lowongan/wp-content/uploads/2020/08/logo3.png" alt="Logo" class="w-24 mx-auto md:mx-0">
      </div>
      <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center md:text-left">Create your account</h2>
      <div class="flex items-center justify-between mb-6">
        <hr class="w-full border-gray-300">
        <hr class="w-full border-gray-300">
      </div>
      <form action="" method="post" >
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Name</label>
          <input type="text" name="name" placeholder="Enter your name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Email</label>
          <input type="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Password</label>
          <input type="password" name="password" placeholder="Enter your password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button name="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Sign Up</button>
      </form>
      <p class="text-center text-gray-500 mt-6">Already have an account? <a href="login.php" class="text-blue-500 hover:underline">Log in</a></p>
    </div>
    <!-- Image Section -->
    <div class="w-full md:w-1/2 hidden md:flex items-center justify-center bg-cover bg-center" style="background-image: url('image.png');">
      <div class="p-8 bg-white bg-opacity-75 rounded-lg text-center">
        <h2 class="text-xl font-semibold text-gray-800">Discovering the Best Furniture for Your Home</h2>
        <p class="text-gray-600 mt-4">Our practice is designing complete environments exceptional buildings, communities, and places in special situations.</p>
        <div class="flex justify-center mt-6">
          <div class="bg-white rounded-full p-2 mx-2">
            <img src="https://asset-2.tstatic.net/medan/foto/bank/images/Contoh-gambar.jpg" alt="Guarantee" class="w-6 h-6">
          </div>
          <div class="bg-white rounded-full p-2 mx-2">
            <img src="https://i.pinimg.com/736x/fe/1e/ca/fe1eca1b1fa6164bb828d04c2aad7923.jpg" alt="Delivery" class="w-6 h-6">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</body>
</html>