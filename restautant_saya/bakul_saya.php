<?php
// 引入导航和头部文件
include("nav2.php");
include("header.php");

// 从会话中获取订单编号
$no_pesanan = $_SESSION['noPesanan'];

// 设置时区并获取当前日期
date_default_timezone_set('Asia/Kuala_Lumpur');
$tarikh = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakul Pesanan Saya</title>
    <style>
        /* 主体内容区域样式 */
        #mainbody {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
        }

        /* 标题样式 */
        #tajuk {
            font-size: 30px;
            font-family: 'Tw Cen MT Condensed', sans-serif;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* 表格通用样式 */
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 100%;
            border-radius: 10px; 
            overflow: hidden; 
        }

        /* 第一个表格样式 */
        #tbl1 td {
            text-align: left;
            padding-top: 0px;
            padding-bottom: 2px;
        }

        #tbl1 td:nth-child(2) {
            text-align: right;
        }

        /* 第二个表格样式 */
        #tbl2 th {
            color: white;
            background-color: teal;
        }

        #tbl2 th,
        #tbl2 td {
            text-align: left;
            padding: 8px;
        }

        #tbl2 tr {
            border-bottom: 1px solid lightgray;
        }

        #tbl2 tr:hover {
            background-color: lightcyan;
            transition: background-color 0.3s ease;
        }

        #tbl2 tr {
            background-color: ivory;
        }

        #tbl2 td:nth-child(3),
        #tbl2 th:nth-child(3) {
            text-align: center;
        }

        /* 按钮样式 */
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* 无记录提示样式 */
        center {
            color: #777;
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- 主体内容区域 -->
    <div id="mainbody">
        <!-- 标题 -->
        <div id="tajuk">
            <p>Bakul Pesanan Saya</p>
        </div>

        <?php
        // SQL查询语句，用于显示顾客订单记录，根据数量计算总价
        $sql = "SELECT *,
                SUM(kuantiti * harga_makanan) AS Jumlah
                FROM pesanan
                INNER JOIN pelanggan USING (no_telefon)
                INNER JOIN maklumat_pesanan USING (no_pesanan)
                INNER JOIN makanan USING (kod_makanan)
                WHERE no_pesanan = '$no_pesanan'
                GROUP BY kod_makanan";

        // 执行SQL查询
        $result = mysqli_query($conn, $sql) or die(mysql_error());

        // 初始化计数器
        $bil = 0;

        if (mysqli_num_rows($result) > 0) {
            // 初始化总金额
            $jum = 0;

            // 遍历结果集，计算总金额
            while ($row = mysqli_fetch_assoc($result)) {
                $jum += $row['Jumlah'];
            }

            // 将结果集指针重置到第一行
            mysqli_data_seek($result, 0);
        ?>
            <!-- 第一个表格，显示订单基本信息 -->
            <table id="tbl1">
                <colgroup>
                    <col width="230">
                    <col width="270">
                </colgroup>
                <tr>
                    <td><b>No Pesanan :</b> <?php echo $no_pesanan; ?></td>
                    <td><b>Tarikh :</b> <?php echo $tarikh; ?></td>
                </tr>
                <tr>
                    <td><b>Nama Pelanggan :</b> <?php echo $nama; ?></td>
                    <td><b>Jumlah Keseluruhan :</b> RM <?php echo number_format($jum, 2); ?></td>
                </tr>
            </table>
            <p></p>

            <!-- 第二个表格，显示订单详细信息 -->
            <table id="tbl2">
                <colgroup>
                    <col width="50">
                    <col width="200">
                    <col width="100">
                    <col width="130">
                </colgroup>
                <tr>
                    <th>Bil</th>
                    <th>Makanan</th>
                    <th>Kuantiti</th>
                    <th>Jumlah Harga</th>
                </tr>

                <?php
                // 再次将结果集指针重置到第一行
                mysqli_data_seek($result, 0);

                // 遍历结果集，显示订单详细信息
                while ($row = mysqli_fetch_assoc($result)) {
                    $bil++;
                    $jum_harga = number_format($row['Jumlah'], 2);
                ?>
                    <tr height="10">
                        <td><?php echo $bil; ?>.</td>
                        <td><?php echo $row['nama_makanan']; ?></td>
                        <td><?php echo $row['kuantiti']; ?></td>
                        <td>RM <?php echo $jum_harga; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <!-- 打印按钮 -->
            <div style="text-align: center; margin-top: 20px;">
                <button onclick="window.print()">Cetak Pesanan</button>
            </div>

        <?php
        } else {
            // 若没有订单记录，显示提示信息
            echo "<center>Tiada rekod pesanan</center>";
        }
        ?>
    </div>

    <?php
    // 包含页脚文件
    include("footer.php");
    ?>
</body>

</html>