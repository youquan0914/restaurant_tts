<?php
include ("db_conn.php");

//dapatkan input dari borang
$notel = $_POST['notel'];
$nama = $_POST['nama'];

//semak jika no_telefon telah wujud dalam PD
$semak = "SELECT no_telefon FROM pelanggan
          WHERE no_telefon = '$notel'";
$result = mysqli_query($conn, $semak) or die(mysqli_error());

//jika no_telefon sudah wujud, papar mesej popup
if (mysqli_num_rows($result) > 0)
{
    echo '<script>
    alert("No Telefon anda telah didaftarkan!!");
    window.location.href="borang_daftar.php";
    </script>';
}
else{
//jika no_telefon belum wujud, simpan data dalam PD
    $mysql = "INSERT INTO pelanggan
              (no_telefon, nama)
              VALUES ('$notel', '$nama')";

    if (mysqli_query($conn, $mysql))
    {
        echo '<script>
        alert("Berjaya Daftar Pelanggan!!");
        window.location.href="borang_login.php";
        </script>';
    }else{
	echo "Error ; " . mysqli_error($conn); }
}
mysqli_close($conn);
?>
