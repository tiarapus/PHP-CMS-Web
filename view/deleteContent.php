<?php

include "../config/app.php";
session_start();
if(!isset($_SESSION["login"])){
    echo "<script>
    alert('Login untuk mengakses halaman');
    document.location.href = 'login.php'
    </script>";
    exit;
}

$articleId = (int)$_GET['articleId'];

if(delete($articleId)>0){
    echo "<script>
        alert('Data Barang Berhasil Dihapus');
        document.location.href = 'adminDashboard.php'
        </script>";
} else {
    echo "<script>
        alert('Data Barang Gagal Dihapus');
        document.location.href = 'adminDashboard.php'
        </script>";
}