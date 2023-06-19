<?php
$server = "localhost";
$user = "kristus1_FP_Pweb";
$password = "dxZct5FB2PSyreP";
$nama_database = "kristus1_swiftair";

$db = mysqli_connect($server, $user, $password, $nama_database);

if(!$db){
    die("Gagal terhubung dengan database: ".mysqli_connect_error());
}

