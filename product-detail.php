<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php" ?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
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
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <?php
                            $query = "SELECT * FROM product WHERE product_id = {$_GET['product_id']}";
                            $result = $mysqli->query($query);
                            while ($arProduct = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="product-slider-single">
                                    <img src="files/uploads/<?php echo $arProduct['picture'] ?>" alt="Product Image">
                                </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <form method="GET" action="cart.php">
                                    <div class="title">
                                        <h2><?php echo $arProduct['name'] ?></h2>
                                    </div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p><?php echo number_format($arProduct['price'] . '.') ?></p>
                                    </div>
                                    <div class="action">
                                        <input type="number" name="qty" value="1">
                                        <input type="hidden" name="product_id" value="<?php echo $arProduct['product_id'] ?>">
                                        <button class="btn" type="submit"><i class="fa fa-shopping-bag"></i>Buy Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active">
                                <h4>Product description</h4>
                                <p><?php echo $arProduct['content'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                            }
            ?>
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
                                <div class="product-price">
                                    <h3><?php echo number_format($arLienQuan['price'] . '.') ?></h3>
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
    </div>
</div>
<!-- Product Detail End -->

<!-- COMMENT -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7">
            <form id="form">
                <div class="inputBox">
                    <div class="col-md-6">
                        <label for="name">Name:</label>
                        </br>
                        <input type="text" id="name" class="form-control" placeholder="Nhập tên của bạn" required>
                    </div>
                </div>
                <div class="inputBox">
                    <div class="col-md-6">
                        <label for="msg">Message:</label>
                        </br>
                        <textarea id="msg" class="form-control" rows="5" cols="35" placeholder="Đánh giá sản phẩm" required></textarea>
                    </div>
                </div>
                <button id="btn" class="btn btn-info">SEND</button>
            </form>
            </br>
            <div id="content">
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadData() {
            $.ajax({
                url: 'select-data.php',
                type: 'POST',
                success: function(data) {
                    $("#content").html(data);

                }
            });
        }

        loadData();

        $("#btn").on("click", function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var msg = $("#msg").val();

            $.ajax({
                url: 'insert-data.php',
                type: 'POST',
                data: {
                    name: name,
                    msg: msg
                },
                success: function(data) {
                    if (data == 1) {
                        loadData();
                        alert('Comment thành công');
                        $("#form").trigger("reset");
                    } else {
                        alert("Lỗi khi comment");
                    }
                }
            });
        });
    });
</script>
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>