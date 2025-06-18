<html>
<style>
    body {
        margin: 0;
    }

    #navbar {
        position: sticky;
        top: 0;
        overflow: hidden;
        background-color: Navy;
        font-family: 'Trebuchet MS', sans-serif;
        font-weight: bold;
		border-radius: 15px 15px 0px 0px;
        animation: slideDown 0.5s ease-out; /* 添加动画 */
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
        float: right;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        border-radius: 10px; /* 添加圆角 */
        margin: 5px; /* 添加外边距 */
        transition: all 0.3s ease; /* 添加过渡效果 */
    }

    #navbar a:hover {
        background-color: LightSkyBlue;
        color: black;
        font-weight: bold;
        transform: scale(1.05); /* 鼠标悬停时稍微放大 */
    }

    #navbar a img {
        vertical-align: middle;
    }
</style>
<body>
    <div id="navbar">
        <a href="borang_loginAdmin.php">
            <img src="gambar/admin.png" width="20" height="20" title="Log Masuk Admin">
        </a>
        <a href="borang_login.php">Log Masuk</a>
        <a href="index.php">Utama</a>
    </div>
</body>
</html>