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
    background-color: #f29797;
}
table, td {
    text-align: right;
}
tr {
    height: 20px;
}
</style>
<body>

<div id="mainbody">
<!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit-->
<form action="proses_daftar.php" method="POST">
<div id="tajuk">Daftar Pelanggan Baharu</div><p>

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
      <td><input type="text" name="notel" pattern="[0-9]{3}-[0-9]{7,8}" 
	  placeholder="000-0000000" required></td>
      <td></td>
    </tr>
    <tr>
	  <td></td>
      <td>Nama :</td>
      <td><input type="text" name="nama" required></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><input type="submit" name="btnDaf" value="Daftar"></td>
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
