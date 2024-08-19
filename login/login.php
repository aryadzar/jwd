
<?php 

include 'koneksi/koneksi.php';
session_start();


if (isset($_SESSION["akses"])){
    header('Location: index.php');
}


if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($result) === 1){
        $res_user = mysqli_fetch_assoc($result);
        if(password_verify($password, $res_user["password"])){
            $_SESSION["akses"] = true;
            header("Location: index.php");
            exit;
          }
          
    }else{
            $error_message = "Username atau password salah";
            $error = true;
        }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body>
    
<div class="min-h-screen flex items-center justify-center bg-gray-50">
  <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Form Section -->
    <div class="w-full md:w-1/2 p-8 md:p-12">
      <div class="mb-4">
        <img src="https://glints.com/id/lowongan/wp-content/uploads/2020/08/logo3.png" alt="Logo" class="w-24 mx-auto md:mx-0">
      </div>
      <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center md:text-left">Log In</h2>
      <p class="text-gray-500 mb-6 text-center md:text-left">Let's get started with your 30 days free trial</p>
      <div class="flex items-center justify-between mb-6">
        <hr class="w-full border-gray-300">
        <hr class="w-full border-gray-300">
      </div>
      <form action="" method="post"> 
        <?php if(isset($error)){ ?>
        <div class="mb-4">
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Danger alert!</span> <?= $error_message?>.
            </div>
            </div>
        </div>
        <?php }?>
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Email</label>
          <input type="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 mb-2">Password</label>
          <input type="password" name="password" placeholder="Enter your password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button name="login" class="w-full py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Log In</button>
      </form>
      <p class="text-center text-gray-500 mt-6">Belum punya akun ? <a href="create.php" class="text-blue-500 hover:underline">Sign in</a></p>
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