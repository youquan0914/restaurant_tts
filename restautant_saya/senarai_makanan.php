<?php
// nav2 : menu navigasi baru selepas login
include("nav2.php");
include("header.php");
?>
<html>
  <style>
    #mainbody {
      background-color: white;
      padding: 20px;
      animation: fadeIn 0.5s ease;
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
      margin: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	  border-radius: 10px; 
      overflow: hidden; 
    }
    th {
      height: 30px;
      text-align: center;
      font-weight: bold;
      color: white;
      background-color: #1976D2;
      padding: 12px;
    }
    td {
      text-align: center;
      height: 30px;
      padding: 12px;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:nth-child(odd) {
      background-color: #e0e0e0;
    }
    td:nth-child(4) {
      text-align: left;
    }
    th:nth-child(4) {
      text-align: left;
    }
    tr:hover {
      background-color: #cfd8dc;
    }
    a img {
      transition: transform 0.3s ease;
    }
    a img:hover {
      transform: scale(1.2);
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
      <div id="tajuk"><p>Senarai Makanan</p></div>
      <!-- Papar senarai makanan -->
      <?php
      $query = "SELECT * FROM makanan ORDER BY kod_makanan";
      $result = mysqli_query($conn, $query) or die(mysqli_error());

      $bil = 0;

      if (mysqli_num_rows($result) > 0) {
        // table untuk paparan data
        echo "<table>";
        echo "<col width='10'>"; // saiz column 1
        echo "<col width='50'>"; // saiz column 2
        echo "<col width='150'>"; // saiz column 3
        echo "<col width='230'>"; // saiz column 4
        echo "<col width='150'>"; // saiz column 5
        echo "<col width='80'>"; // saiz column 6
        echo "<col width='80'>"; // saiz column 7
        echo "<tr>";
        echo "<th></th>"; // column 1
        echo "<th>Bil</th>"; // column 2
        echo "<th>Kod Makanan</th>"; // column 3
        echo "<th>Nama Makanan</th>"; // column 4
        echo "<th>Harga (RM)</th>"; // column 5
        echo "<th>Edit</th>"; // column 6
        echo "<th>Padam</th>"; // column 7
        echo "</tr>";

        // Papar semua data dari jadual PD
        while ($row = mysqli_fetch_assoc($result)) {
          $bil++;
          $harga = number_format($row['harga_makanan'], 2);

          echo "<tr height='10'>";
          echo "<td></td>";
          echo "<td>".$bil.".</td>";
          echo "<td>".$row['kod_makanan']."</td>";
          echo "<td>".$row['nama_makanan']."</td>";
          echo "<td>".$harga."</td>";
          echo "<td><a href='edit_makanan.php?kod=".$row['kod_makanan']."'>
                <img src='gambar/edit.png' width='15' height='15' title='Edit'></a></td>";
          echo "<td><a href='padam_makanan.php?kod=".$row['kod_makanan']."'>
                <img src='gambar/delete.png' width='15' height='15' title='Padam'></a></td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "<center>Tiada rekod</center>";
      }
      ?>
    </div>
    <?php
    include("footer.php");
    ?>
  </body>
</html>