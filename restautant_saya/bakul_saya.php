<?php
include ("nav2.php");
include ("header.php");

//Dapatkan no_pesanan dari session
$no_pesanan = $_SESSION['noPesanan'];

date_default_timezone_set('Asia/Kuala_Lumpur');
$tarikh = date('Y-m-d');
?>
<html>
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
#tbl1, #tbl2 {
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
    margin: auto;
}
#tbl1 td {
    text-align: left;
    padding-top: 0px;
    padding-bottom: 2px;
}
#tbl2 th {
    color: White;
    background-color: Teal;
}
#tbl2 th, td {
    text-align: left;
    padding: 8px;
}
#tbl2 tr {
    border-bottom: 1px solid LightGray;
}
#tbl2 tr:hover {
    background-color: LightCyan;
}
#tbl2 tr {
    background-color: Ivory;
}
#tbl1 td:nth-child(2) { text-align: right; }
#tbl2 td:nth-child(3) { text-align: center; }
#tbl2 th:nth-child(3) { text-align: center; }
</style>
<body>

<div id="mainbody">
<div id="tajuk"><p>Bakul Pesanan Saya</p></div>

<?php
//Query SQL untuk paparkan rekod pesanan pelanggan
//Pengiraan jumlah harga berdasarkan kuantiti
$sql = "SELECT *,
    SUM(kuantiti * harga_makanan) AS Jumlah
    FROM pesanan
    INNER JOIN pelanggan USING (no_telefon)
    INNER JOIN maklumat_pesanan USING (no_pesanan)
    INNER JOIN makanan USING (kod_makanan)
    WHERE no_pesanan = '$no_pesanan'
    GROUP BY kod_makanan";

$result = mysqli_query($conn, $sql) or die(mysql_error());

$bil = 0;

if (mysqli_num_rows($result) > 0) 
{
    $jum = 0;
	
    while($row = mysqli_fetch_assoc($result)) {
        // kira jumlah harga keseluruhan dengan menambah jumlah harga bagi setiap makanan
        // proses mengira jumlah dibuat dalam SQL
        $jum += $row['Jumlah'];
    }
    // Reset $result kepada row pertama semula, untuk paparkan hasil query pada while loop dibaris 115
    mysqli_data_seek($result, 0);
?>

<table id="tbl1">
    <col width='230'>
    <col width='270'>
    <tr>
        <td><b>No Pesanan :</b><?php echo $no_pesanan; ?></td>
        <td><b>Tarikh :</b><?php echo $tarikh; ?></td>
    </tr>
    <tr>
        <td><b>Nama Pelanggan :</b><?php echo $nama; ?></td>
        <td><b>Jumlah Keseluruhan :</b>RM <?php echo number_format($jum, 2); ?></td>
    </tr>
</table>
<p>

<table id="tbl2">
<col width='50'>
<col width='200'>
<col width='100'>
<col width='130'>
<tr>
    <th>Bil</th>
    <th>Makanan</th>
    <th>Kuantiti</th>
	<th>Jumlah Harga</th>
    </tr>
	
<?php
while($row = mysqli_fetch_assoc($result)) 
{
    $bil++;
    $jum_harga = number_format($row['Jumlah'], 2);
	
    echo "<tr height='10'>";
    echo "<td>".$bil.".</td>";
    echo "<td>" .$row['nama_makanan']."</td>";
    echo "<td>" .$row['kuantiti']."</td>";
    echo "<td>RM ".$jum_harga."</td>";
    echo "</tr>";
}
echo "</table>";

//Butang cetak
echo "<center><button onclick='window.print()'>Cetak Pesanan</button></center>";

} 
else {
    echo "<center>Tiada rekod pesanan</center>";}
?>

</div>
<?php
include ("footer.php");
?>
</body>
</html>