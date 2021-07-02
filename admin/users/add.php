<?php require_once "../inc/header.php" ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">Add Member</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin/index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="admin/users/index.php">Member</a>
            </li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            <?php
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $role = $_POST['role'];
                    $query = "SELECT * FROM users WHERE username = '$username'";
                    $result = $mysqli->query($query);
                    if (mysqli_num_rows($result) > 0) {
                        echo "Trùng tên đăng nhập";
                    } else {
                        $query = "INSERT INTO users(username,password,fullname,email,phone,address,role)
                                                VALUES ('{$username}', '{$password}','{$fullname}','{$email}','{$phone}','{$address}','{$role}')";
                        $result = $mysqli->query($query);
                        if ($result) {
                            header("location:index.php?msg=Thêm thành công");
                            die();
                        } else {
                            echo "Có lỗi khi thêm người dùng";
                            die();
                        }
                    }
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập" required>
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Nhập họ và tên" required>
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"  required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Phone</label>
                                    <input type="text" class="form-control " name="phone" placeholder="Nhập số điện thoại" required>
                                </div>
                            </div>
                            <label>Address</label>
                            <input type="text" class="form-control " name="address" placeholder="Nhập địa chỉ" required>
                            <label>Role</label>
                            <input type="text" class="form-control " name="role" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-md">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/footer.php" ?>
</div>