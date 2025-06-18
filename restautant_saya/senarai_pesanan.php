<?php
include ("nav2.php");
include ("header.php");
?>
<html>
<style>
    /* 整体主体样式 */
    #mainbody {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease;
    }

    /* 标题样式 */
    #tajuk {
        font-size: 30px;
        font-family: Tw Cen MT Condensed;
        font-weight: bold;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    /* 通知样式 */
    #notis {
        text-align: center;
        color: red;
        font-size: 15px;
        font-weight: bold;
        background-color: yellow;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* 表格样式 */
    table.tbl2 {
        margin-left: auto;
        margin-right: auto;
        border-collapse: collapse;
        width: 80%; /* 设置表格宽度 */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* 表格表头样式 */
    th {
        color: white;
        background-color: crimson;
        padding: 12px;
        text-align: center;
    }

    /* 表格单元格样式 */
    td {
        text-align: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    /* 第三列单元格左对齐 */
    td:nth-child(3) {
        text-align: left;
    }

    /* 第三列表头左对齐 */
    th:nth-child(3) {
        text-align: left;
    }

    /* 表格行悬停效果 */
    tr:hover {
        background-color: lavenderblush;
    }

    /* 表格行默认背景颜色 */
    tr {
        background-color: ivory;
        transition: background-color 0.3s ease;
    }

    /* 链接样式 */
    a {
        text-decoration: none;
        color: black;
        transition: color 0.3s ease;
    }

    /* 链接悬停样式 */
    a:hover {
        color: red;
        font-weight: bold;
    }

    /* 淡入动画效果 */
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
    <div id="tajuk">
        <p>Senarai Pesanan Pelanggan</p>
    </div>
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

    if (mysqli_num_rows($result) > 0) {
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
        while ($row = mysqli_fetch_assoc($result)) {
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
    } else {
        echo "<center>Tiada rekod pesanan</center>";
    }
    ?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>