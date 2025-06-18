<?php
// 引入导航和头部文件
include("nav2.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Staf</title>
    <style>
        /* 定义淡入动画 */
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

        /* 整体内容区域样式 */
        #mainbody {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
            animation: fadeIn 0.8s ease-out; /* 添加淡入动画 */
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

        /* 表格样式 */
        .table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            background-color: #fce4ec;
            border-radius: 10px;
            overflow: hidden;
        }

        .table td,
        .table th {
            height: 30px;
            padding: 8px;
        }

        .table th {
            font-weight: bold;
            color: black;
            background-color: #f06292;
        }

        .table th:nth-child(2),
        .table td:nth-child(2) {
            text-align: left;
        }

        /* 表格行交替颜色 */
        .table tr:nth-child(even) {
            background-color: #f8bbd0;
        }

        .table tr:nth-child(odd) {
            background-color: #fce4ec;
        }

        /* 表单样式 */
        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div id="mainbody">
        <div id="tajuk">
            <p>Senarai Staf</p>
        </div>

        <?php
        // 从数据库中获取员工信息
        $sql = "SELECT * FROM admin ORDER BY nama";
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $bil = 0;

        if (mysqli_num_rows($result) > 0) {
            // 显示数据的表格
            echo "<table class='table'>";
            echo "<colgroup>";
            echo "<col width='80'>"; // 列1宽度
            echo "<col width='200'>"; // 列2宽度
            echo "</colgroup>";
            echo "<tr>";
            echo "<th>Bil</th>"; // 列1标题
            echo "<th>Nama Staf</th>"; // 列2标题
            echo "</tr>";

            // 显示数据库中的所有数据
            while ($row = mysqli_fetch_assoc($result)) {
                $bil++;
                echo "<tr>";
                echo "<td>{$bil}.</td>";
                echo "<td>{$row['nama']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<center>Tiada rekod</center>";
        }
        ?>

        <div id="tajuk">
            <h5>Muat Naik Data Staf</h5>
        </div>

        <!-- 上传数据的表单 -->
        <form action="proses_muatnaik.php" method="POST" enctype="multipart/form-data">
            <p>
                Pilih fail untuk dimuat naik (Fail excel .csv sahaja) :
                <input type="file" name="file_csv" accept=".csv" required>
            </p>
            <p>
                <input type="submit" name="upload" value="Muat Naik">
            </p>
        </form>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>