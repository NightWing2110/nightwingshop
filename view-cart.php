<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php";


// echo "<pre>";
// print_r($_SESSION['cart']);
?>
<script type="text/javascript">
    document.title = 'Giỏ Hàng | VinaEnter Edu';
</script>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="product-list.php">Products</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Picture</th>
                            <th>Number</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $key => $value) : ?>
                            <tr>
                                <td><?php echo $key++ ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><img src="files/uploads/<?php echo $value['picture'] ?>" alt="" width="100px"></td>
                                <form action="cart.php">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                    <td><input type="text" name="qty" value="<?php echo $value['qty'] ?>">
                                        <button type="submit">Update</button>
                                </form>

                                </td>
                                <td><?php echo number_format($value['price'] * $value['qty']); ?> VNĐ</td>
                                <td><a href="cart.php?product_id=<?php echo $value['product_id'] ?>&action=delete" title="" class="btn btn-danger">Delete</a></td>
                            </tr>
                        <?php endforeach ?>
                        <td>Total</td>
                        <td colspan="4" class="text-center"><?php echo number_format(total_price($cart)) ?> VNĐ</td>
                        <td><a href="checkout.php?product_id=<?php echo $value['product_id'] ?>" title="" class="btn btn-info">Pay</a></td>
                    </tbody>
                </table>


                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>
                    <div class="row align-items-center product-slider product-slider-3">
                        <?php
                        $queryLienQuan = "SELECT * FROM product";
                        $resultLienQuan = $mysqli->query($queryLienQuan);
                        while ($arLienQuan = mysqli_fetch_assoc($resultLienQuan)) {
                        ?>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?product_id=<?php echo $arLienQuan['product_id'] ?>"><?php echo $arLienQuan['name'] ?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="files/uploads/<?php echo $arLienQuan['picture'] ?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="product-detail.php?product_id=<?php echo $arLienQuan['product_id'] ?>"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Side Bar Start -->
            <div class="col-lg-3 sidebar">
                <div class="left-sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <?php
                        $queryCat = "SELECT * FROM cat";
                        $resultCat = $mysqli->query($queryCat);
                        while ($arCat = mysqli_fetch_assoc($resultCat)) {
                            $cat_id = $arCat['cat_id'];
                            $name = $arCat['name'];
                            $replaceName = utf8ToLatin($name);
                            $url = $replaceName . '-' . $cat_id;
                        ?>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $url?>"><?php echo $arCat['name'] ?></a>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </nav>
                </div>
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>