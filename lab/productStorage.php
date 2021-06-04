<?php
$id = $_POST['id-product'];
$name = $_POST['name-product'];
$category = $_POST['category-product'];
$price = $_POST['price-product'];
$describe_pr = $_POST['describe-product'];

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "product_database";
$conn = new mysqli($severname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connect error");
}
$sql_txt = "insert into list_product (id,name,category,price,describe_pr) values ('$id','$name','$category',$price,'$describe_pr')";
if ($conn->query($sql_txt) === true) {
    header("location:ListProduct.php");
} else {
    echo "thêm thất bại";
}