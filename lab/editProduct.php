<?php
$id_e = $_GET['edit'];
$id = $_POST['id-edit-product'];
$name = $_POST['name-edit-product'];
$category = $_POST['category-edit-product'];
$price = $_POST['price-edit-product'];
$describe = $_POST['describe-edit-product'];
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "product_database";
$conn = new mysqli($severname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connect error");
}
echo($id);
echo($name);
echo($category);
echo($describe);
$sql_txt = "update list_product set id='$id',stt= null, name='$name',category='$category', price=$price, describe_pr='$pescribe' where id = '$id_e' ";

if ($conn->query($sql_txt) === true) {
    header("location:listProduct.php");
} else {
    echo "xửa thất bại";
}