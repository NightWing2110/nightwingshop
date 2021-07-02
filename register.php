<?php require_once "../nightwingshop/templates/nightwingshop/inc/header.php";
require_once "./util/dbConnect.php";

?>
<script type="text/javascript">
          document.title = 'Đăng Kí | VinaEnter Edu';
      </script>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Login & Register</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $result = $mysqli->query($query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "Trùng tên đăng nhập";
                    } else {
                        $query = "INSERT INTO users(username,password,fullname,email,phone,address,status)
                                                    VALUES ('{$username}', '{$password}','{$fullname}','{$email}','{$phone}','{$address}',1)";
                        $result = $mysqli->query($query);
                        if ($result) {
                            header("location:login.php?msg=Thêm người dùng thành công");
                            die();
                        } else {
                            echo "Có lỗi khi thêm người dùng";
                            die();
                        }
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" placeholder="Nhập Username" required>
                        </div>
                        <div class="col-md-6">
                            <label>Họ và tên</label>
                            <input class="form-control" type="text" name="fullname" placeholder="Nhập Họ và tên" required>
                        </div>
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="Nhập E-mail" required>
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Nhập Password" required>
                        </div>
                        <div class="col-md-6">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="number" name="phone" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="col-md-6">
                            <label>Địa chỉ</label>
                            <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="col-md-12">
                            <button class="btn" type="submit" name="submit">Đăng kí</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>