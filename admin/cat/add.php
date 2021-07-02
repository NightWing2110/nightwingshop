<?php require_once  "../inc/header.php" ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">New Cat</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin/index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="admin/cat/index.php">Cat</a>
            </li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $parent_id = $_POST['parent_id'];
                    $query = "INSERT INTO cat(name,parent_id) VALUES ('{$name}','{$parent_id}')";
                    $result = $mysqli->query($query);
                    if ($result) {
                        header("location:index.php?msg= Thêm danh mục thành công");
                        die();
                    } else {
                        echo "Lỗi! Không thể thêm danh mục";
                        die();
                    }
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group col-sm-8">
                        <label for="exampleInputEmail1">Cat Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" required>
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="exampleInputEmail1">Parent</label>
                        <input type="text" class="form-control" name="parent_id" placeholder="" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-md">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php require_once  "../inc/footer.php" ?>
</div>