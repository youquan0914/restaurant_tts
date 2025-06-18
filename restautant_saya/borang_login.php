<?php
// Navigasi dan banner
include ("nav.php");
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
    input[type="text"] {
      width: 50%;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus {
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

    /* 注册按钮样式 */
    a img {
      transition: transform 0.3s ease;
      vertical-align: middle; /* 使图片垂直居中对齐 */
      margin-left: 10px; /* 给注册按钮添加一些左边距 */
    }

    a img:hover {
      transform: scale(1.1);
    }
  </style>
  <body>
  
    <div id="mainbody">
      <!-- form action akan bawa pengguna untuk proses seterusnya selepas pengguna klik butang submit -->
      <form action="proses_login.php?kat=2" method="POST">

        <div id="tajuk">Log Masuk Pelanggan</div>

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
            <td>
              <input type="text" name="notel" pattern="[0-9]{3}-[0-9]{7,8}" placeholder="000-0000000" required>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td style="text-align: left;">
              <input type="submit" name="btnLog" value="Log Masuk">
              <!-- Butang untuk pelanggan baharu daftar masuk -->
              <a href="borang_daftar.php">
                <img src="gambar/daftar.png" width="30" height="30" title="Daftar Pelanggan Baharu">
              </a>
            </td>
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