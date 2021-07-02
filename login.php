<?php
require_once "../nightwingshop/templates/nightwingshop/inc/header.php";
require_once "./util/dbConnect.php";
?>
<script type="text/javascript">
          document.title = 'Đăng Nhập | VinaEnter Edu';
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
                    //kiểm tra tài khoản
                    $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
                    $result = $mysqli->query($query);
                    $infoUser = mysqli_fetch_assoc($result);
                    if ($infoUser) {
                        if ($infoUser['status'] == 1) {
                            //lưu session
                            $_SESSION['user'] = $infoUser;
                            if(isset($_GET['action'])){
                                $action = $_GET['action'];
                                header("location: " .$action. '.php');
                            }else{
                                header("location:index.php");
                            }                          
                        }else{
                            echo "Tk chưa đc kích hoạt";
                        }
                    } else {
                        echo "Sai tk mk";
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username</label>
                            <input class="form-control" name="username" type="text" placeholder="Nhập Username" required>
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Nhập Password" required>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="submit" class="btn">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
<?php require_once "../nightwingshop/templates/nightwingshop/inc/footer.php" ?>