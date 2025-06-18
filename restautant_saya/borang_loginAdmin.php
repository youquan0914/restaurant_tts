<?php
// Navigasi dan banner
include("nav.php");
include("header.php");
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
      background-color: gainsboro;
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
      <!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit -->
      <form action="proses_login.php?kat=1" method="POST">

    <div id="tajuk">Log Masuk Admin</div><p>
	
    <table cellpadding='5px'>
      <tr>
        <td style="width: 20px"></td>
        <td></td>
		<td></td>
        <td style="width: 20px"></td>
      </tr>
      <tr>
        <td></td>
        <td>Login ID :</td>
        <td><input type="text" name="logid" required>
		</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td>Kata Laluan :</td>
        <td><input type="password" name="klaluan" pattern=".{5,8}" required></td>
		<!-- pattern: untuk setkan had bawah(min) dan had atas(max)-->
        <td></td>
      </tr>
      <tr>
        <td></td>
		<td></td>
        <td style="text-align: right;"><input type="submit" name="btnLog" value="Log Masuk"></td>
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

