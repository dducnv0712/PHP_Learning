<?php
$id = $_GET['delete'];
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "product_database";
$conn = new mysqli($severname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connect error");
}else{

}
$sql_txt = "DELETE FROM list_product WHERE id ='$id'";
if ($conn->query($sql_txt) === true) {
    header("location: ListProduct.php");
} else{
    echo "<script>alert('Xóa Thất Bại')</script>";

}