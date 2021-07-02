<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php" ?>
<?php require_once "../nightwingshop/templates/nightwingshop/inc/leftbar.php" ?>
<script type="text/javascript">
          document.title = 'Trang Chủ | VinaEnter Edu';
      </script>
<!-- Featured Product Start -->
<div class="featured-product product">
    <div class="container">
        <div class="section-header">
            <h1>Featured Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            <?php
            $queryProduct = "SELECT * FROM product";
            $resultProduct = $mysqli->query($queryProduct);
            while ($arProduct = mysqli_fetch_assoc($resultProduct)) {
                $product_id = $arProduct['product_id'];
                $Name = $arProduct['name'];
                $replace = utf8ToLatin($Name);
                $URL = $replace . '-' . $product_id . '.html';
            ?>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="<?php echo $URL?>"><?php echo $arProduct['name'] ?></a>
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
                                <img src="files/uploads/<?php echo $arProduct['picture'] ?>" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="cart.php?product_id=<?php echo $arProduct['product_id']?>"><i class="fa fa-cart-plus"></i></a>
                                <a href="<?php echo $URL?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><?php echo number_format($arProduct['price'] . '.') ?></h3>
                            <a class="btn" href="cart.php?product_id=<?php echo $arProduct['product_id']?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Featured Product End -->
<!-- Recent Product Start -->
<div class="recent-product product">
    <div class="container">
        <div class="section-header">
            <h1>Recent Product</h1>
        </div>
        <div class="row align-items-center product-slider product-slider-4">
            <?php
            $queryProduct = "SELECT * FROM product";
            $resultProduct = $mysqli->query($queryProduct);
            while ($arProduct = mysqli_fetch_assoc($resultProduct)) {
            ?>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#"><?php echo $arProduct['name'] ?></a>
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
                                <img src="files/uploads/<?php echo $arProduct['picture'] ?>" alt="Product Image">
                            </a>
                            <div class="product-action">
                                <a href="cart.php?product_id=<?php echo $arProduct['product_id']?>"><i class="fa fa-cart-plus"></i></a>

                                <a href="product-detail.php?product_id=<?php echo $arProduct['product_id'] ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-price">
                            <h3><?php echo number_format($arProduct['price'] . '.') ?></h3>
                            <a class="btn" href="cart.php?product_id=<?php echo $arProduct['product_id']?>"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Recent Product End -->
<?php
require_once "../nightwingshop/templates/nightwingshop/inc/footer.php"
?>