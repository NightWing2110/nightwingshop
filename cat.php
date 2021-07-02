<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php" ?>
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
                    $query = "SELECT * FROM product WHERE cat_id = {$_GET['cat_id']}";
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
                                    <div class="product-action">                                        <a href="product-detail.php?product_id=<?php echo $arDetailProduct['product_id'] ?>"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><?php echo number_format($arDetailProduct['price'] . '.') ?></h3>
                                    <a class="btn" href="product-detail.php?product_id=<?php echo $arDetailProduct['product_id'] ?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Side Bar Start -->
    <div class="col-lg-20 sidebar">
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
                    if ($arCat['active'] == 1) {
                ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $url?>"><?php echo $arCat['name'] ?></a>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </nav>
        </div>
    </div>
    <!-- Side Bar End -->
    <!-- Product List End -->
    <?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>