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
    font-family: Trebuchet MS;
    font-weight: bold;
}
#navbar a {
    float: right;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
#navbar a:hover {
    background-color: LightSkyBlue;
    color: black;/* font color semasa mouseover*/
    font-weight: bold;
}
</style>
<body>

    <div id="navbar">
      <a href="borang_loginAdmin.php">
	   <img src="gambar/admin.png" width="20"
			height="20" title="Log Masuk Admin">
		</a>
        <a href="borang_login.php">Log Masuk</a>
        <a href="index.php">Utama</a>
    </div>
</body>
</html>
