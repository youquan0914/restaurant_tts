<?php
//Sambungan ke pangkalan data
include ('db_conn.php');
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
#notis {
  text-align: center;
  color: Red;
  font-size: 15px;
  font-weight: bold;
  background-color: yellow;
  padding: 10px;
}
</style>
<body>

<div id="mainbody">
<br><div id="tajuk"><p>Menu Makanan</p></div>

<?php
//Query SQL untuk dapatkan data dari pangkalan data 
$mysql = "SELECT * FROM makanan ORDER BY kod_makanan";
$result = mysqli_query($conn, $mysql) or die(mysql_error());

//Dapatkan jumlah rekod dalam jadual
$jumlah = mysqli_num_rows($result);

if ($jumlah > 0)
{
    echo "<p id='notis'>** Sila log masuk untuk membuat tempahan makanan **</p>";
    echo "<table><tr>";

    foreach($result as $i => $row)
    {
        // Dapatkan gambar makanan dari folder
        $gmbr = "gambar/".$row['gambar'];

        // Format decimal untuk harga
        $harga = number_format($row['harga_makanan'], 2);

        // Papar maklumat makanan
        echo "<td>";
        echo "<img src=".$gmbr." width='150px' height='150px'>";
        echo "<p>".$row['nama_makanan'];
        echo "<p>RM ".$harga;
        echo "<p><hr></td>";

        // Hadkan data yang dipaparkan, 3 rekod dalam 1 baris
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
</body>
</html>
<?php
// Tutup sambungan pangkalan data
mysqli_close($conn);
?>
