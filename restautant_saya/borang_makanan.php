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
</style>
<body>

<div id="mainbody">
  <form action="proses_makanan.php" method="POST" enctype="multipart/form-data">
    <div id="tajuk">Borang Tambah Makanan</div>
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
        <td>Kod Makanan :</td>
        <td><input type="text" name="kd" required></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>Nama Makanan :</td>
        <td><input type="text" name="nm" required></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>Harga (RM) :</td>
        <td><input type="number" name="hg" step="any" required></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>Gambar :</td>
        <td><input type="file" name="gmbr" accept=".png, .jpg, .jpeg" required></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="simpan" value="SIMPAN"></td>
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
