<?php
//session
include('session.php');
?>
<html>
<style>
    body {
        margin: 0;
    }

    #navbar {
        position: sticky;
        top: 0;
        min-height: 47.7px;
        background-color: #001f3f; /* 更深的海军蓝色 */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 添加阴影 */
        animation: slideDown 0.5s ease-out; /* 下拉动画 */
		border-radius: 15px 15px 0px 0px;

    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    #navbar a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        border-radius: 10px; /* 添加圆角 */
        margin: 5px; /* 添加外边距 */
        transition: all 0.3s ease; /* 过渡效果 */
    }

    #navbar a:hover {
        background-color: #7FDBFF; /* 更亮的蓝色 */
        color: black;
        font-weight: bold;
        transform: scale(1.05); /* 鼠标悬停时稍微放大 */
    }

    #dropdown {
        position: relative;
        margin: 5px; /* 添加外边距 */
    }

    #dropdown #dropbtn {
        font-size: 17px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        font-weight: bold;
        border-radius: 10px; /* 添加圆角 */
        transition: all 0.3s ease; /* 过渡效果 */
    }

    #dropdown #dropbtn:hover {
        background-color: #7FDBFF; /* 更亮的蓝色 */
        color: black;
        font-weight: bold;
        transform: scale(1.05); /* 鼠标悬停时稍微放大 */
    }

    #dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        right: 0;
        border-radius: 10px; /* 添加圆角 */
        overflow: hidden; /* 隐藏溢出内容 */
    }

    #dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: right;
        transition: all 0.3s ease; /* 过渡效果 */
    }

    #dropdown-content a:hover {
        background-color: #7FDBFF; /* 更亮的蓝色 */
    }

    #dropdown:hover #dropdown-content {
        display: block;
    }
</style>
<body>

<?php
if ($kat == 1) //Menu Admin
{
    $utama = '<a href="senarai_makanan.php">';
    $menu1 = '<a href="senarai_makanan.php">Senarai Makanan</a>';
    $menu2 = '<a href="borang_makanan.php">Tambah Makanan</a>';
    $menu3 = '<a href="senarai_pesanan.php">Senarai Pesanan</a>';
    $menu4 = '<a href="senarai_staf.php">Senarai Staf</a>';
    $menu5 = '';
}
else //Menu Pelanggan
{
    $utama = '<a href="menu.php">';
    $menu1 = '';
    $menu2 = '';
    $menu3 = '';
    $menu4 = '';
    $menu5 = '<a href="bakul_saya.php">Bakul Saya</a>';
}
?>

<div id="navbar">
    <div id="dropdown">
        <button id="dropbtn">Hai, <?php echo $nama; ?></button>
        <div id="dropdown-content">
            <!-- Papar menu ikut kategori pengguna -->
            <?php echo $menu1;
                  echo $menu2;
                  echo $menu3;
                  echo $menu4; ?>
            <a href="logout.php">Log Keluar</a>
        </div>
    </div>
    <?php echo $menu5; ?>
    <?php echo $utama; ?>Utama</a>
</div>
</body>
</html>