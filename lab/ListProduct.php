<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="libs/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/assignment1.css">

</head>
<body>

<?php

$severname = "localhost";
$username = "root";
$password = "";
$dbname = "product_database";
$conn = new mysqli($severname,$username,$password,$dbname);

if($conn -> connect_error){
    die("connect error");
}else{
        echo "<script>alert('ket noi thanh cong')</script>";
    }
$id_d = $_GET['delete_pr'];
$sql_txt = "select * from list_product";
$rs = $conn -> query($sql_txt);
$list_product = [];
if ($rs -> num_rows>0) {
    while ($row = $rs->fetch_assoc()) {
        $list_product[] = $row;
    }
}
?>
<div class="container">
    <h1 class="text-center font-weight-bold">Danh Sách Sản Phẩm</h1>

<table class="table">

    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Thể Loại</th>
            <th scope="col">Giá Sản Phẩm</th>
            <th scope="col">Xem Chi Tiết</th>
            <th scope="col">Chức Năng</th>
        </tr>
    </thead>
    <tbody id="#tbody">

    <?php foreach ($list_product as $item) {?>
    <tr >

        <th  scope="row"><?php echo $item["stt"];?></th>
        <td ><?php echo $item["name"];?></td>
        <td ><?php echo $item["category"];?></td>
        <td ><?php echo "$".$item["price"];?></td>

        <td >
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="productDetails.php?details=<?php echo $item['id']; ?>"   class="btn btn-info ">
                    Xem Chi Tiết
                </a>

            </div>
        </td>
        <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">

            <a    class="btn edit-btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-product-<?php echo $item['id']; ?>" >Sửa</a>
            <a    class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product-<?php echo $item['id']; ?>">
               Xóa
            </a>
        </div>

            <div class="modal fade" id="delete_product-<?php echo $item['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn Muốn Xóa Sản Phẩm <?php echo $item['name'] ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a  href="deleteProduct.php?delete= <?php echo $item['id']?>" class="btn btn-danger">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit-product-<?php echo $item['id'];?>" class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title fw-bolder justify-content-center" id="exampleModalLabel">Sửa Sản Phẩm <?php echo $item['name']?></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="editProduct.php" method="post">
                                <div class="mb-3">
                                    <label for="edit-id" class="fw-bolder col-form-label">ID</label>
                                    <input type="text" name='id_edit' class="form-control" value="<?php echo $item['id']?>" id="edit-id" >
                                </div>
                                <div class="mb-3">
                                    <label for="edit-name" class="fw-bolder col-form-label">Tên Sản Phẩm</label>
                                    <input type="text" name="name_edit" class="form-control"  value="<?php echo $item['name']?>" id="edit-name" >
                                </div>
                                <div class="mb-3">
                                    <label for="edit-price" class="fw-bolder col-form-label">Giá Sản Phẩm</label>
                                    <input type="text" name="price_edit" class="form-control" value="<?php echo $item['price']?>" id="edit-price" >
                                </div>

                                <div class="mb-3">
                                    <label for="edit-category" class="fw-bolder col-form-label">Thể Loại</label>
                                    <input type="text" name="category_edit" class="form-control" value="<?php echo $item['category']?>" id="edit-category" >
                                </div>
                                <div class="mb-3">
                                    <label for="edit-describe" class="fw-bolder col-form-label">Mô Tả Sản Phẩm</label>
                                    <textarea type="text" name="describe_edit" class="form-control"   id="edit-describe"  required></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit"  onclick="window.location.href='editProduct.php?edit_pr=<?php echo $item['id']?>'" class="btn btn-primary">Sửa Sản Phẩm</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </td>

    </tr>

    <?php }?>


    </tbody>
</table>
    <div class="justify-content-center d-grid gap-2">
        <button type="button" class="btn edit-btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#add-product" >Thêm Sản Phẩm</button>


    </div>
    <!-- Thêm Sản Phẩm-->

    <div id="add-product" class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bolder " id="exampleModalLabel">Thêm Sản Phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="productStorage.php" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">ID:</label>
                            <input type="text" name='id-product' class="form-control" id="recipient-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Tên Sản Phẩm:</label>
                            <input type="text" name="name-product" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Thể Loại Sản Phẩm:</label>
                            <input type="text" name="category-product" class="form-control" id="recipient-name" required>
                            <div class="valid-feedback">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Giá Sản Phẩm:</label>
                            <input type="text" name="price-product" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Mô Tả Sản Phẩm</label>
                            <textarea type="text" name="describe-product" class="form-control" id="recipient-name" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div id="edit-product" class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fw-bolder justify-content-center" id="exampleModalLabel">Sửa Sản Phẩm</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editProduct.php" method="post">
                        <div class="mb-3">
                            <label for="edit-id" class="fw-bolder col-form-label">ID</label>
                            <input type="text" name='id_edit' class="form-control" id="edit-id" >
                        </div>
                        <div class="mb-3">
                            <label for="edit-name" class="fw-bolder col-form-label">Tên Sản Phẩm</label>
                            <input type="text" name="name_edit" class="form-control" id="edit-name" >
                        </div>
                        <div class="mb-3">
                            <label for="edit-price" class="fw-bolder col-form-label">Giá Sản Phẩm</label>
                            <input type="text" name="price_edit" class="form-control" id="edit-price" >
                        </div>

                        <div class="mb-3">
                            <label for="edit-category" class="fw-bolder col-form-label">Thể Loại</label>
                            <input type="text" name="category_edit" class="form-control" id="edit-category" >
                        </div>
                        <div class="mb-3">
                            <label for="edit-describe" class="fw-bolder col-form-label">Mô Tả Sản Phẩm</label>
                            <textarea type="text" name="describe_edit" class="form-control"  id="edit-describe"  required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button  type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="libs/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
</body>
</html>