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
	  animation: fadeIn 0.5s ease;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }

    td {
      padding: 12px;
      text-align: left;
    }

    td:nth-child(2) {
      text-align: right;
    }

    /* 输入框样式 */
    input[type="text"],
    input[type="password"] {
      width: 50%;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #1976D2;
      outline: none;
    }

    /* 按钮样式 */
    input[type="submit"] {
      background-color: #1976D2;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
	  
    }

    input[type="submit"]:hover {
      background-color: #1565C0;
    }

    /* 动画效果 */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
  <body>
  
    <div id="mainbody">
      <!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit -->
      <form action="proses_login.php?kat=1" method="POST">

    <div id="tajuk">Log Masuk Admin</div>
	
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
        <td style="text-align: left;"><input type="submit" name="btnLog" value="Log Masuk"></td>
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

