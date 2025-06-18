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
    <title>Kemaskini Maklumat Makanan</title>
    <style>
        /* 主体内容区域样式 */
        #mainbody {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
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
        table {
            border: 2px solid black;
            border-collapse: collapse;
            margin: 0 auto;
            font-weight: bold;
            background-color: Khaki;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
        }

        /* 表格单元格样式 */
        td {
            vertical-align: top;
            padding: 8px;
        }

        /* 表格第二列单元格样式，文本右对齐 */
        td:nth-child(2) {
            text-align: right;
        }

        /* 表格行样式 */
        tr {
            height: 20px;
        }

        /* 输入框样式 */
        input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* 表格第七行样式，按钮右对齐 */
        tr:nth-child(7) {
            text-align: right;
        }

        /* 返回按钮样式 */
        input[type=button] {
            width: 100px;
            padding: 8px;
            background-color: #ccc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type=button]:hover {
            background-color: #999;
        }

        /* 更新按钮样式 */
        input[type=submit] {
            width: 100px;
            padding: 8px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type=submit]:hover {
            background-color: #0056b3;
        }
		
		img {
		border-radius: 10px; /* 可以根据需要调整弧边的大小 */
}
    </style>
</head>

<body>
    <?php
    // 获取要更新的菜品代码
    $kod = $_GET['kod'];

    // 当用户点击“KEMASKINI”（更新）按钮时，执行更新操作
    if (isset($_POST['edit'])) {
        $sql = "UPDATE makanan
                SET nama_makanan = '" . $_POST["nm"] . "',
                    harga_makanan = '" . $_POST["hg"] . "'
                WHERE kod_makanan = '$kod'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Berjaya Kemaskini Makanan!");
                  window.location.href="senarai_makanan.php";
                  </script>';
        } else {
            echo "Error ; " . mysqli_error($conn);
        }
    }

    // 从数据库中获取要更新的菜品数据
    $sql2 = "SELECT * FROM makanan
             WHERE kod_makanan = '$kod'";
    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error());
    $row2 = mysqli_fetch_array($result2);

    // 获取菜品图片的路径
    $gmbr = "gambar/" . $row2['gambar'];
    ?>

    <div id="mainbody">
        <form action="edit_makanan.php?kod=<?php echo $kod; ?>" method="POST">
            <div id="tajuk">Kemaskini Maklumat Makanan</div>
            <p>
                <table cellpadding='5px'>
                    <!-- 空行 -->
                    <tr>
                        <td style="width: 30px"></td>
                        <td></td>
                        <td></td>
                        <td style="width: 40px"></td>
                    </tr>
                    <!-- 显示菜品图片 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="<?php echo $gmbr; ?>" width="200px" height="200px"></td>
                        <td></td>
                    </tr>
                    <!-- 显示菜品代码 -->
                    <tr>
                        <td></td>
                        <td>Kod Makanan :</td>
                        <td><?php echo $row2['kod_makanan']; ?></td>
                        <td></td>
                    </tr>
                    <!-- 显示并可编辑菜品名称 -->
                    <tr>
                        <td></td>
                        <td>Nama Makanan :</td>
                        <td><input type="text" name="nm" value="<?php echo $row2['nama_makanan']; ?>" required></td>
                        <td></td>
                    </tr>
                    <!-- 显示并可编辑菜品价格 -->
                    <tr>
                        <td></td>
                        <td>Harga :</td>
                        <td><input type="number" name="hg" value="<?php echo $row2['harga_makanan']; ?>" step="any" required></td>
                        <td></td>
                    </tr>
                    <!-- 返回和更新按钮 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="button" name="back" value="KEMBALI" onClick="javascript:history.go(-1)">
                            <input type="submit" name="edit" value="KEMASKINI">
                        </td>
                        <td></td>
                    </tr>
                    <!-- 空行 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </p>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>