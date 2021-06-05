<?php
$id_e = $_GET['edit_pr'];
$id = $_POST['id_edit'];
$name = $_POST['name_edit'];
$category = $_POST['category_edit'];
$price = $_POST['price_edit'];
$describe = $_POST['describe_edit'];

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "product_database";
$conn = new mysqli($severname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connect error");
}

$sql_txt = "UPDATE list_product SET id ='$id', name= '$name',category ='$category',describe_pr ='$describe',price =$price WHERE id='$id_e' ";
if ($conn->query($sql_txt) === true) {
    header("location:ListProduct.php");
} else {
    echo "Sửa thất bại";
}


