<?php
//Navigasi dan banner
include ("nav.php");
include ("header.php");
?>
<html>
<style>
#mainbody {
    background-color: White;
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
    background-color: Gainsboro;
}
td:nth-child(2) {
    text-align: right;
}
tr {
    height: 20px;
}
</style>
<body>
<div id="mainbody">
<!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit-->

<form action="proses_login.php?kat=2" method="POST">
<div id="tajuk">Log Masuk Pelanggan</div><p>

<table cellpadding='5px'>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td>No Telefon :</td>
	<td><input type="text" name="notel" pattern="[0-9]{3}-[0-9]{7,8}" placeholder="000-0000000" required>
	</td>
	<!-- pattern untuk format no_telefon:
	[0-9]{3}- = 3 nombor awal, simbol dash,
	[0-9]{7,8} = diikuti dengan 7-8 digit nombor cth:000-0000000-->
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td style="text-align: right;">
	<input type="submit" name="btnLog" value="Log Masuk"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td colspan="2"><!-- Butang untuk pelanggan baharu daftar masuk -->
	<a href="borang_daftar.php">
	<img src="gambar/daftar.png" width="30" height="30" title="Daftar Pelanggan Baharu">
	</a></td>
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