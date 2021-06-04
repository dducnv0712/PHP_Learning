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
$sql_txt = "select * from list_product";
$rs = $conn -> query($sql_txt);

$list_product = [];

if ($rs -> num_rows>0){
    while ($row = $rs -> fetch_assoc()){
        $list_product[] =$row;
    }
}
if(isset($_GET['edit'])){
    $id_e =$_GET['edit'];
    $resurt = $mysqli -> query("select * from list_product where id = $id_e") or die($mysqli -> error());
    if(count($resurt)==1){
        $row_e = $resurt -> fetch_array();
        $id = $row_e['id-edit-product'];
        $name = $row_e['name-edit-product'];
        $category = $row_e['category-edit-product'];
        $price = $row_e['price-edit-product'];
        $describe_pr = $row_e['describe-edit-product'];
    }
}

$id = '';
$name = '';
$category = '';
$price = '';
$describe_pr = '';
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

            <a href="editProduct.php?edit=<?php echo $item['id']; ?>"  class="btn edit-btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-product" >Sửa</a>
            <a href="editProduct.php?delete=<?php echo $item['id']; ?>"   class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_product">
               Xóa
            </a>
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
    <!-- Xóa Sản Phẩm -->
    <div class="modal fade" id="delete_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn Muốn Xóa Sản Phẩm này
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a  href="deleteProduct.php?delete=<?php echo $item['id']; ?>"   class="btn btn-danger">Xóa</a>
                </div>
            </div>
        </div>
    </div>

<!-- Sửa Sản Phẩm -->
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
                            <label for="recipient-name" class="fw-bolder col-form-label">ID</label>
                            <input type="text" name='id-edit-product' class="form-control" id="recipient-name" value="<?php  echo $id ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Tên Sản Phẩm</label>
                            <input type="text" name="name-edit-product" class="form-control" id="recipient-name" value="<?php  echo $name ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Giá Sản Phẩm</label>
                            <input type="text" name="price-edit-product" class="form-control" id="recipient-name" value="<?php  echo $price ?>">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Thể Loại</label>
                            <input type="text" name="category-edit-product" class="form-control" id="recipient-name" value="<?php  echo $category ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="fw-bolder col-form-label">Mô Tả Sản Phẩm</label>
                            <textarea type="text" name="describe-edit-product" class="form-control"  id="recipient-name"  required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    function displayData(e){
        let  id = 0;
        const  td = ("#tbody tr td");
        let  textvalues =[];
        for (const value of td){
            if(value.dataset.id == 2){
                console.log(value);
            }
        }
    }
   $(".edit-btn").click(e =>{


       let textvalues = displayData(e);
       let  id =$("input[name*='id-product']");
       let  name =$("input[name*='name-product']");
       let  price =$("input[name*='price-product']");
       id.val(textvalues[0]);
       name.val(textvalues[1])
       price.val(textvalues[1]);
   })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="libs/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
</body>
</html>