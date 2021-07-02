<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php";
?>
<script type="text/javascript">
          document.title = 'Thanh Toán | VinaEnter Edu';
      </script>
<?php
$user = $_SESSION['user'];
if (isset($_POST['name'])) {
    $user_id = $user['users_id'];
    $total = total_price($cart);
    // var_dump($total);exit();
    $note = $_POST['note'];
    $address = $_POST['address'];

    $query = mysqli_query($mysqli, "INSERT INTO `transaction`(`users_id`,`total`, `note`, `address`) 
                                        VALUES ('{$user_id}','{$total}','{$note}','{$address}')");
    if ($query) {
        $transaction_id = mysqli_insert_id($mysqli);
        foreach ($cart as $value) {
            mysqli_query($mysqli, "INSERT INTO `orders`(`transaction_id`, `product_id`, `users_id` , `qty`, `price`) 
                                        VALUES ('{$transaction_id}','{$value['product_id']}', '{$user_id}' ,'{$value['qty']}','{$value['price']}')");
        }
        unset($_SESSION['cart']);
        header('location:index.php?msg= mua hàng thành công');
    }
}
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Start -->
<div class="checkout">
    <?php if (isset($_SESSION['user'])) { ?>
        <form method="POST" action="">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" type="text" value="<?php echo $user['username'] ?>" placeholder="Họ và tên" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" type="text" value="<?php echo $user['email'] ?>" placeholder="E-mail" name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" value="<?php echo $user['phone'] ?>" placeholder="Số điện thoại" name="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input class="form-control" type="text" placeholder="Địa chỉ giao hàng" value="<?php echo $user['address'] ?>" name="address">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Note</label>
                                        <textarea name="note" id="input" class="font-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h4>Information Order</h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name Product</th>
                                    <th>Number</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['qty'] ?></td>
                                        <td><?php echo number_format($value['price'] * $value['qty']); ?> VNĐ</td>
                                    </tr>
                                <?php endforeach ?>
                                <td>Total</td>
                                <td colspan="4" class="text-center"><?php echo number_format(total_price($cart)) ?> VNĐ</td>
                            </tbody>
                        </table>
                        <button class="btn btn-info">Pay</button>
                            <div id="paypal-payment-button"></div>
                    </div>
                </div>
            </div>
</div>
</div>
</form>
<?php } else { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Please login to pay</strong><a href="login.php?action=checkout" title="">Login</a>
    </div>
<?php } ?>
<script src="https://www.paypal.com/sdk/js?client-id=AWk1PWohUy6BDaK3s33vLOQsm_i8gED5h7THFvmGb1Q64dyx6ZlhyPpUrVryRzUX4vH3nffxeQj4u7Z7&disable-funding=credit,card"></script>
<script src="./paypal/index.js"></script>

<!-- Checkout End -->
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>