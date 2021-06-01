<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="libs/bootstrap-4.0.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/category.css">
</head>
<body>
<?php
$category = [];
$category[] = [
    "id" =>1,
    "name" =>"Galaxy fold 2",
    "price" =>30.000,

];
$category[1] = [
    "id" =>2,
    "name" =>"Galaxy z fold 2",
    "price" =>50.000,

];

$category[] = [
    "id" =>3,
    "name" =>"Galaxy s20",
    "price" =>20.000,

];
$category[] = [
    "id" =>4,
    "name" =>"Galaxy note 20",
    "price" =>25.000,

];
$category[] = [
    "id" =>5,
    "name" =>"Galaxy note 10",
    "price" =>18.000,

];

$category[] = [
    "id" =>6,
    "name" =>"Galaxy s10",
    "price" =>13.000,

];



?>
<table class="table">

    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            </th>
            <th scope="col">Price</th>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($category as $key => $value) {?>
    <tr >
        <th scope="row"><?php echo $value["id"];?></th>
        <td><?php echo $value["name"];?></td>
        <td><?php echo $value["price"];?></td>
    </tr>
    <?php }?>
    </tbody>

</table>
</body>
</html>