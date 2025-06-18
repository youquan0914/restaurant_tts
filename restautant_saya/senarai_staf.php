<?php
include ("nav2.php");
include ("header.php");
?>
<html>
<head>
<style>
#mainbody {
    background-color: white;
    padding: 20px;
}
#tajuk {
    font-size: 30px;
    font-family: Tw Cen MT Condensed;
    font-weight: bold;
    text-align: center;
}
.table {
    margin-left: auto;
    margin-right: auto;
    border-collapse: collapse;
    margin: auto;
    text-align: center;
    background-color: LavenderBlush;
}
.table td, th {
    height: 30px;
}
.table th {
    font-weight: bold;
    color: black;
    background-color: HotPink;
}
table th:nth-child(2), td:nth-child(2) {
	text-align: left;
}
</style>
</head>
<body>

<div id="mainbody">
<div id="tajuk">Senarai Staf<p></div>

<?php
//dapatkan maklumat staf dari jadual
$sql = "SELECT * FROM admin
        ORDER BY nama";
$result = mysqli_query($conn, $sql) or die(mysqli_error());

$bil = 0;

if (mysqli_num_rows($result) > 0)
{
    //table untuk paparan data
    echo "<table class='table'>";
    echo "<col width='80'>"; //saiz column 1
    echo "<col width='200'>"; //saiz column 2
    echo "<tr>";
    echo "<th>Bil</th>"; // column 1
    echo "<th>Nama Staf</th>"; // column 2
    echo "</tr>";

    //papar semua data dari jadual
    while($row = mysqli_fetch_assoc($result))
    {
    $bil++;
    echo "<tr height='10'>";
    echo "<td>".$bil.".</td>";
    echo "<td>".$row['nama']."</td>";
    echo "</tr>";
    }
      echo "</table>";
    }
    else { echo "<center>Tiada rekod</center>"; }
    ?>

<div id="tajuk"><h5>Muat Naik Data Staf</h5></div>

<!-- borang untuk muatnaik -->
<form action="proses_muatnaik.php" method="POST" enctype="multipart/form-data">
<center>
Pilih fail untuk dimuat naik (Fail excel .csv sahaja) :
<input type="file" name="file_csv" accept=".csv" required>
<p>
<input type="submit" name="upload" value="Muat Naik">
</p></center>
</form>

</div>
<?php include ("footer.php"); ?>
</body>
</html>