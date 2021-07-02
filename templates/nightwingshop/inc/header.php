<?php
    ob_start();
    ob_flush();
    require_once "./util/dbConnect.php";
    require_once "./cart-function.php";
    require_once "./utf8ToLatinUtil.php";
    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">
    <!-- Favicon -->
    <link href="templates/nightwingshop/img/dc.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="templates/nightwingshop/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="trang-chu.html" class="nav-item nav-link active">Home</a>
                        <a href="san-pham.html" class="nav-item nav-link">Products</a>
                        <a href="gio-hang.html" class="nav-item nav-link">Cart(<?php echo total_item($cart)?>)</a>
                        <a href="thanh-toan.html" class="nav-item nav-link">Checkout</a>
                                <a href="lien-he.html" class="dropdown-item">Contact Us</a>
                        </div>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <?php 
                                if(isset($_SESSION['username'])){
                                    $name = $_SESSION['username'];
                                    echo $name;
                                }
                            ?>
                            </a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="register.php" class="dropdown-item">Register</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->
    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="trang-chu.html">
                            <img src="templates/nightwingshop/img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                <form method="GET" action="">
                    <div class="search">
                        <input type="text" name="timkiem" placeholder="Search">
                        <button name="search"><i class="fa fa-search"></i></button>
                        <div style="clear:both"></div>
                    </div>
                </form>
                <?php
                if(isset($_GET['search'])){
                    $search = $_GET['timkiem'];
                }else{
                    $search = "";
                }
                $query = "SELECT * FROM product WHERE name LIKE '%$search%'";
                $result = $mysqli->query($query);
                $ar = mysqli_fetch_assoc($result);
                if(isset($_GET['search'])){
                    header('location:product-detail.php?' . 'product_id=' . $ar['product_id']);
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->