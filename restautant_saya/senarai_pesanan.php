<?php
include ("nav2.php");
include ("header.php");
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
#notis {
    text-align: center;
    color: Red;
    font-size: 15px;
    font-weight: bold;
    background-color: yellow;
    padding: 10px;
}
table {
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
    margin: auto;
}
th {
    color: White;
    background-color: Crimson;
}
th, td {
    text-align: center;
    padding: 8px;
}
tr {
    border-bottom: 1px solid LightGray;
}
tr:hover {
    background-color: LavenderBlush;
}
tr {
    background-color: Ivory;
}
td:nth-child(3) { text-align: left; }
th:nth-child(3) { text-align: left; }
a { text-decoration: none; }
a:link { color: Black; }
a:hover { color: Red; font-weight: bold; }
</style>
<body>

<div id="mainbody">
<div id="tajuk">
	<p>Senarai Pesanan Pelanggan</p></div>
<p id="notis">** Klik no pesanan untuk melihat maklumat pesanan pelanggan **</p>

<?php
//Query SQL untuk paparkan semua pesanan pelanggan
$sql = "SELECT *,
    SUM(kuantiti * harga_makanan) AS Jumlah
    FROM pesanan
    INNER JOIN pelanggan USING (no_telefon)
    INNER JOIN maklumat_pesanan USING (no_pesanan)
    INNER JOIN makanan USING (kod_makanan)
    GROUP BY no_pesanan, tarikh_pesanan
    ORDER BY no_pesanan DESC";
$result = mysqli_query($conn, $sql) or die(mysql_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
?>

<table class="tbl2">
<col width='50'>
<col width='150'>
<col width='150'>
<col width='130'>
<col width='130'>
<tr>
	<th>Bil</th>
	<th>No Pesanan</th>
	<th>Nama Pelanggan</th>
	<th>Tarikh Pesanan</th>
	<th>Jumlah Harga</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
	$bil++;

	$jum_harga = number_format($row['Jumlah'], 2);

	echo "<tr height='10'>";
	echo "<td>".$bil."</td>";
	echo "<td><a href='maklumat_pesanan.php?no=".$row['no_pesanan']."'>".$row['no_pesanan']."</a></td>";
	echo "<td>".$row['nama']."</td>";
	echo "<td>".$row['tarikh_pesanan']."</td>";
	echo "<td>RM ".$jum_harga."</td>";
	echo "</tr>";
}
	echo "</table>";
}
else {
	echo "<center>Tiada rekod pesanan</center>"; }
?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>