<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php";
require_once "./util/dbConnect.php";
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php
                                if (isset($_GET['product_id'])) {
                                    $product_id = $_GET['product_id'];
                                }
                                $action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
                                $qty = (isset($_GET['qty'])) ? $_GET['qty'] :1;
                                if($qty <= 0){
                                    $qty = 1;
                                }
                                //  session_destroy();
                                //  die();
                                // echo $action;
                                //   var_dump($action);
                                //    die();

                                $query = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
                                if ($query) {
                                    $product = mysqli_fetch_assoc($query);
                                }
                                $item = [
                                    'product_id' => $product['product_id'],
                                    'name' => $product['name'],
                                    'picture' => $product['picture'],
                                    'price' => $product['price'],
                                    'qty' => $qty
                                ];
                                if ($action == 'add') {
                                    if (isset($_SESSION['cart'][$product_id])) {
                                        $_SESSION['cart'][$product_id]['qty'] += $qty;
                                    } else {
                                        $_SESSION['cart'][$product_id] = $item;
                                    }
                                }
                                if($action == 'update'){
                                    $_SESSION['cart'][$product_id]['qty'] = $qty;
                                }
                                if($action == 'delete'){
                                    unset($_SESSION['cart'][$product_id]);
                                }
                                header('location: view-cart.php');
                                echo "<pre>";
                                print_r($_SESSION['cart']);
                                echo "</pre>";
                                // Thêm mới giỏ hàng
                                // Cập nhật giỏ hàng
                                //Xóa sản phẩm trong giỏ hàng
                                ?>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="templates/nightwingshop/img/tv1.jpg" alt="Image"></a>
                                            <p>Product Name</p>
                                        </div>
                                    </td>
                                    <td>10.000.000VNđ</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>10.000.000VNđ</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="templates/nightwingshop/img/maygiac.png" alt="Image"></a>
                                            <p>Product Name</p>
                                        </div>
                                    </td>
                                    <td>5.000.000VNĐ</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>5.000.000VNĐ</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="templates/nightwingshop/img/bephongngoaico.png" alt="Image"></a>
                                            <p>Product Name</p>
                                        </div>
                                    </td>
                                    <td>3.000.000VNĐ</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>3.000.000VNĐ</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="templates/nightwingshop/img/tulanh.png" alt="Image"></a>
                                            <p>Product Name</p>
                                        </div>
                                    </td>
                                    <td>6.000.000VNĐ</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>6.000.000VNĐ</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="templates/nightwingshop/img/noicomdien.png" alt="Image"></a>
                                            <p>Product Name</p>
                                        </div>
                                    </td>
                                    <td>4.000.000VNĐ</td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>4.000.000VNĐ</td>
                                    <td><button><i class="fa fa-trash"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon">
                                <input type="text" placeholder="Coupon Code">
                                <button>Apply Code</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>$99</span></p>
                                    <p>Shipping Cost<span>$1</span></p>
                                    <h2>Grand Total<span>$100</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <button>Update Cart</button>
                                    <button>Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>