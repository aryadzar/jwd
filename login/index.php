<?php 

session_start();

if (!isset($_SESSION["akses"])){
    header('Location: login.php');
}




?>

<h1>HEHEHEHEHHEHEEH
<a href="logout.php">Log Out</a>
</h1>