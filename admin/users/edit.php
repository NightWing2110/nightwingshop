<?php require_once "../inc/header.php" ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">Edit Member</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin/index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="admin/users/index.php">Member</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <?php
                $user_id = $_GET['users_id'];
                $select = "SELECT * FROM users WHERE users_id = {$user_id}";
                if ($mysqli->query($select)) {
                    $infoUser = mysqli_fetch_assoc($mysqli->query($select));
                }
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $fullname = $_POST['fullname'];
                    $role = $_POST['role'];
                    $query = "UPDATE `users` SET `username`='{$username}',`password`='{$password}',`email`='{$email}',`phone`='{$phone}',`address`='{$address}',`fullname`='{$fullname}',role = '{$role}' WHERE users_id = {$user_id}";
                    $result = $mysqli->query($query);
                    if ($result) {
                        header("location:index.php?msg= Cập nhật thành công");
                    } else {
                        echo "Lỗi";
                    }
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Nhập username" value="<?php echo $infoUser['username'] ?>">
                            <div class="row">
                                <label>FullName</label>
                                <input type="text" class="form-control" name="fullname" value="<?php echo $infoUser['fullname'] ?>" placeholder="Nhập tên" value="">
                                <label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Nhập email" value="<?php echo $infoUser['email'] ?>">
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" value="<?php echo $infoUser['password'] ?>">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Phone</label>
                                            <input type="text" class="form-control " name="phone" placeholder="Nhập số điện thoại" value="<?php echo $infoUser['phone'] ?>">
                                        </div>
                                    </div>
                                    <label>Address</label>
                                    <input type="text" class="form-control " name="address" placeholder="Nhập địa chỉ" value="<?php echo $infoUser['address'] ?>">
                                    <label>Role</label>
                                    <input type="text" class="form-control " name="role" value="<?php echo $infoUser['role'] ?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "../inc/footer.php" ?>
</div>