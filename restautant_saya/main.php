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
  animation: fadeIn 0.5s ease;
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
.food-image-container {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.food-image-container:hover {
    transform: scale(1.05);
}

.food-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>
<body>

<div id="mainbody">
<br><div id="tajuk">Menu Makanan<p></div>

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
        echo "<div class='food-image-container'>";
        echo "<img src=".$gmbr." width='150px' height='150px' class='food-image'>";
        echo "</div>";
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