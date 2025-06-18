<?php
include ("nav2.php");
include ("header.php");

date_default_timezone_set('Asia/Kuala_Lumpur');
$tarikh = date('Y-m-d');

//Dapatkan no_pesanan dari session
$no_pesanan = $_SESSION['noPesanan'];

//Semak jika no_pesanan telah wujud
$semak = "SELECT * FROM pesanan WHERE no_pesanan = '$no_pesanan'";
$result = mysqli_query($conn, $semak);
$no_wujud = mysqli_num_rows($result) > 0;

#### Proses masuk pesanan makanan dalam bakul ####
#### Proses berlaku selepas pelanggan klik butang/ikon bakul ####
if (isset($_GET['btn']))
{
//Dapatkan kuantiti pesanan dan kod_makanan
$qty = $_POST['qty'];
$kodM = $_GET['kod'];

//Papar mesej popup jika pelanggan masukkan kuantiti <= 0
if ($qty <= 0) {
    echo '<script>alert("Masukkan kuantiti yang betul");</script>';
} else {
    // Jika pelanggan masukkan kuantiti yang betul,
    // semak jika makanan tersebut sudah wujud dalam bakul dengan no_pesanan yang sama
    $semak2 = "SELECT * FROM maklumat_pesanan
               WHERE no_pesanan = '$no_pesanan' AND kod_makanan = '$kodM'";
    $result2 = mysqli_query($conn, $semak2);

    if (mysqli_num_rows($result2) > 0) 
	{
        echo '<script>alert("Makanan sudah ADA dalam bakul");</script>';
    } else {
        // Simpan no_pesanan dalam jadual pesanan jika nombor belum wujud
        if (!$no_wujud) 
		{
            $simpan = "INSERT INTO pesanan
                       (no_pesanan, tarikh_pesanan, no_telefon)
                       VALUES
                       ('$no_pesanan', '$tarikh', '$id')";
            mysqli_query($conn, $simpan);
            $no_wujud = true;
        }

        // Simpan maklumat makanan yang dipesan
        $simpan2 = "INSERT INTO maklumat_pesanan
                    (no_pesanan, kod_makanan, kuantiti)
                    VALUES
                    ('$no_pesanan', '$kodM', '$qty')";
        mysqli_query($conn, $simpan2);

        echo '<script>alert("Berjaya masuk bakul");</script>';
		}
    }
}
?>
<style>
#mainbody {
    background-color: white;
    padding: 20px;
}
#tajuk {
    font-size: 30px;
    font-family: Tw Cen MT Condensed;
    font-weight: bold;
    text-align: center;
}
table {
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
    margin: auto;
    cellpadding: 5px;
}
td {
    text-align: center;
    height: 30px;
    width: 250px;
    padding: 20px;
    vertical-align: top;
}
input[type="number"] {
    width: 40px;
    text-align: center;
}
</style>
<body>

<div id="mainbody">
<br><div id="tajuk"><p>Menu Makanan</p></div>

<!-- BORANG CARIAN -->
<form action="" method="post">
<p><center>
<select name="kategori">
  <option>Pilih Carian</option>
  <option value="nama">Nama Makanan</option>
  <option value="harga">Harga Makanan</option>
</select>
: <input type="text" name="carian">
<input type="submit" value="Cari" name="cari">
</p></center>
</form>

<!-- QUERY UNTUK CARIAN -->
<?php
//Jika user klik butang "Cari" dan input carian tidak empty
if(isset($_POST['cari']) && !empty($_POST['carian']))
{
  //Kenalpasti dropdown list apa yang dipilih
  switch ($_POST["kategori"])
  {
    case "nama": //Jika pilih carian nama makanan
      $query = "SELECT *
                FROM makanan
                WHERE nama_makanan LIKE '%$_POST[carian]%'
                ORDER BY kod_makanan";
    break;
    default: //Jika pilih carian harga makanan
      $query = "SELECT *
                FROM makanan
                WHERE harga_makanan LIKE '$_POST[carian]%'
                ORDER BY kod_makanan";
  }
} else {
  //Jika pengguna tak buat carian, papar semua menu
  $query = "SELECT * FROM makanan
            ORDER BY kod_makanan";
}
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());
//Dapatkan jumlah rekod dalam jadual
$jumlah = mysqli_num_rows($result);

if ($jumlah > 0)
{
    echo "<table><tr>";

    foreach($result as $i => $row)
    {
        //Dapatkan gambar makanan dari folder
        $gmbr = "gambar/".$row['gambar'];

        $kod = $row['kod_makanan'];

        //format decimal untuk harga
        $harga = number_format($row['harga_makanan'], 2);

        //Papar maklumat makanan
        echo "<td>";
        echo "<img src=".$gmbr." width='150px' height='150px'>";
        echo "<p>".$row['nama_makanan'];
        echo "<p>RM".$harga;

        //Form untuk input kuantiti pesanan
        echo "<form method='post' action='menu.php?kod=$kod&btn=1'>";
        echo "<p><input type='number' name='qty' value='0'>&emsp;";
        echo "<input type='image' src='gambar/bakul.png' title='Masuk Bakul' width='30' height='25'>";
        echo "</form>";
        echo "<hr></td>";

        //Hadkan data yang dipaparkan,3 rekod dalam 1 baris
        $i++;
        $lajur = 3;
        if($i != $jumlah && $i >= $lajur && $i % $lajur == 0)
	echo "</tr><tr>";
    }
	echo "</tr></table>";
}
	else { echo "<center>Tiada rekod</center>"; }
?>
</div>
<?php include ("footer.php"); ?>
</body>
</html>

<?
 //Tutup sambungan pangkalan data
mysqli_close($conn);
?>


