<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="./libs/bootstrap-5.0.1-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/assignment1.css">


    <link rel='stylesheet' id='ecommerce.css-css'  href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/compiled-ecommerce-4.18.0.min.css?ver=4.18.0' type='text/css' media='all' />



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

    }

    $id = $_GET['details'];
    $sql_txt = "select * from list_product where id = '$id'";
    $rs = $conn -> query($sql_txt);

    $product= null;
    if ($rs -> num_rows>0){
        while ($row = $rs -> fetch_assoc()){
            $product =$row;
        }
    }


?>
<div class="container">
    <!--Section: Block Content-->
    <section class="mb-5">

        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox">

                    <div class="row product-gallery mx-1">

                        <div class="col-12 mb-0">
                            <figure class="view overlay rounded z-depth-1 main-img">
                                <a href="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.QiNYgSkUpU3zmxqf_NVwLgHaHZ%26pid%3DApi&f=1"
                                   data-size="710x823">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.QiNYgSkUpU3zmxqf_NVwLgHaHZ%26pid%3DApi&f=1https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                         class="img-fluid z-depth-1">
                                </a>
                            </figure>

                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <h3 class="fw-bold"><?php echo $product['name']?></h3>
                <p class="mb-2 text-muted text-uppercase small"><?php echo $product['category']?></p>

                <p><span class="mr-1"><strong><?php echo "$".$product['price']?></strong></span></p>
                <p class="pt-1"><?php echo $product['describe_pr']?></p>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                            <td><?php echo $product['id']?></td>
                        </tr>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                            <td>Black</td>
                        </tr>
                        <tr>
                            <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                            <td>USA, Europe</td>
                        </tr>
                        </tbody>
                    </table>
                </div>


                <a href="ListProduct.php" class="btn btn-primary btn-md mr-1 mb-2">Danh Sách Sản Phẩm</a>
            </div>
        </div>

    </section>
    <!--Section: Block Content-->
</div>
<script>
    $(document).ready(function () {
        // MDB Lightbox Init
        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    });
</script>

<script type='text/javascript' src='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/js/bundles/4.18.0/compiled-ecommerce.min.js?ver=4.18.0' id='mdb-js2-js'></script>

</body>
</html>