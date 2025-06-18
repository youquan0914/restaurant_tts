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
table {
    border: 2px solid black;
    border-collapse: collapse;
    margin: auto;
    font-weight: bold;
    background-color: Khaki;
}
td {
    vertical-align: top;
}
td:nth-child(2) {
    text-align: right;
}
tr {
    height: 20px;
}
input {
    width: 300px; /* saiz untuk kotak input */
}
tr:nth-child(7) { /* align butang ke kanan */
    text-align: right;
}
input[type=button] {
    width: 100px; /* saiz untuk butang kembali */
}
input[type=submit] {
    width: 100px; /* saiz untuk butang kemaskini */
}
</style>
<body>
<?php
//Dapatkan kod_makanan untuk dikemaskini
$kod = $_GET['kod'];

########## Jika user klik butang KEMASKINI, ##########
########## update rekod dalam jadual ##########
if(isset($_POST['edit']))
{
$sql = "UPDATE makanan
        SET nama_makanan = '".$_POST["nm"]."',
            harga_makanan = '".$_POST["hg"]."'
        WHERE kod_makanan = '$kod'";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Berjaya Kemaskini Makanan!");
          window.location.href="senarai_makanan.php";
          </script>';
    } else {
        echo "Error ; " . mysqli_error($conn);}
}
########## PROSES UPDATE TAMAT ##########

//Dapatkan data makanan dari jadual
//untuk diletakkan dalam textbox
$sql2 = "SELECT * FROM makanan
         WHERE kod_makanan = '$kod'";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error());
$row2 = mysqli_fetch_array($result2);

//Dapatkan gambar dari folder
$gmbr = "gambar/".$row2['gambar'];
?>

<div id="mainbody">
<form action="edit_makanan.php?kod=<?php echo $kod; ?>" method="POST">
<div id="tajuk">Kemaskini Maklumat Makanan</div>
<p>
<table cellpadding='5px'>
<tr>
    <td style="width: 30px"></td>
    <td></td>
    <td></td>
    <td style="width: 40px"></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td><img src="<?php echo $gmbr;?>" width="200px" height="200px"></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>Kod Makanan :</td>
    <td><?php echo $row2['kod_makanan']; ?></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>Nama Makanan :</td>
    <td><input type="text" name="nm" value="<?php echo $row2['nama_makanan']; ?>" required></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td>Harga :</td>
    <td><input type="number" name="hg" value="<?php echo $row2['harga_makanan']; ?>" step="any" required></td>
	<td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td><input type="button" name="back" value="KEMBALI" onClick="javascript:history.go(-1)">
        <input type="submit" name="edit" value="KEMASKINI"></td>
	<td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</table>

</form>
</div>
<?php include ("footer.php"); ?>
</body>
</html>
