<?php
//start session
session_start();

include('db_conn.php');

//Dapatkan data session selepas pengguna Login
$nama = $_SESSION['nama'];
$kat = $_SESSION['kat'];
$id = $_SESSION['id'];

//jika data session tidak dijumpai dalam jadual
//$id utk admin : login_id
//$id utk pelanggan : no_telefon
if(!isset($id))
{
    //redirect pengguna kembali ke paparan utama
    header("Location: index.php");
}
?>
