<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php" ?>
<script type="text/javascript">
          document.title = 'Sản Phẩm | VinaEnter Edu';
      </script>
<?php
$row_count = 10;
$query1 = mysqli_query($mysqli, "SELECT * FROM product");
$tongsodong = mysqli_num_rows($query1);
$sotrang = ceil($tongsodong / $row_count);
if (isset($_GET['page'])) {
    $curent_page = $_GET['page'];
} else {
    $curent_page = 1;
}
$offset = ($curent_page - 1) * $row_count;
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Product List</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    $query = "SELECT * FROM product LIMIT $offset,$row_count";
                    $resultDetailProduct = $mysqli->query($query);
                    while ($arDetailProduct = mysqli_fetch_assoc($resultDetailProduct)) {
                    ?>
                        <div class="col-md-4">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="product-detail.php?product_id=<?php echo $arDetailProduct['product_id'] ?>"><?php echo $arDetailProduct['name'] ?></a>
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
                                        <img src="files/uploads/<?php echo $arDetailProduct['picture'] ?>" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="product-detail.php?product_id=<?php echo $arDetailProduct['product_id'] ?>"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><?php echo number_format($arDetailProduct['price'] . '.') ?></h3>                        
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- Pagination Start -->
                    <div class="col-md-10">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php
                                for ($i = 1; $i <= $sotrang; $i++) {
                                    $active = '';
                                    if ($i == $curent_page) {
                                        $active = 'active';
                                    }
                                ?>
                                    <li class="page-item active"><a class="page-link" href="product-list.php?page=<?php echo $i ?>"><?php echo 'Trang' . $i ?></a></li>
                                    <?php
                                }
                        ?>
                            </ul>
                        
                        </nav>
                    </div>
                    <!-- Pagination Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- Product List End -->
    <?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>