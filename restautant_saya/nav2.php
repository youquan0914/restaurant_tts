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
    background-color: Navy;
    font-family: Trebuchet MS;
    font-weight: bold;
}
#navbar a {
    float: right;
    display: block;
    color: White; /* font color */
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
#navbar a:hover, #dropdown:hover #dropbtn {
    background-color: LightSkyBlue;
    color: black; /* font color semasa mouseover */
    font-weight: bold;
}
#dropdown {
    float: right;
    overflow: hidden;
}
#dropdown #dropbtn {
    font-size: 17px;
    border: none;
    outline: none;
    color: White;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    font-weight: bold;
    margin: 0;
}
#dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    right: 0;
}
#dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: right;
}
#dropdown-content a:hover {
    background-color: LightSkyBlue;
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
        <button id="dropbtn">Hai, <?php echo $nama; ?>
		</button>
        <div id="dropdown-content">
            <!-- Papar menu ikut kategori pengguna -->
			<?php	echo $menu1; 
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
