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

    /* 表格样式 */
    table {
        border: 2px solid #333;
        border-collapse: collapse;
        margin: auto;
        font-weight: bold;
        background-color: #f9f5d2; /* 调整背景颜色 */
        border-radius: 8px;
        overflow: hidden;
    }

    /* 表格单元格样式 */
    td {
        vertical-align: top;
        padding: 10px;
    }

    /* 第二列单元格样式 */
    td:nth-child(2) {
        text-align: right;
        color: #555;
    }

    /* 表格行样式 */
    tr {
        height: 20px;
        transition: background-color 0.3s ease;
    }

    /* 表格行悬停效果 */
    tr:hover {
        background-color: #e0e0e0;
    }

    /* 输入框样式 */
    input {
        width: 300px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s ease;
    }

    /* 输入框聚焦效果 */
    input:focus {
        border-color: #66afe9;
        outline: 0;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    }

    /* 提交按钮样式 */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* 提交按钮悬停效果 */
    input[type="submit"]:hover {
        background-color: #45a049;
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