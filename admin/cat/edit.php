<?php require_once  "../inc/header.php" ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">Edit Cat</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.php">CAt</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            <?php
                $cat_id = $_GET['cat_id'];
                $select = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
                if($mysqli->query($select)){
                    $infoCat = mysqli_fetch_assoc($mysqli->query($select));
                }
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $parent_id = $_POST['parent_id'];
                    $query = "UPDATE `cat` SET `name`='{$name}', `parent_id`='{$parent_id}' WHERE cat_id = {$cat_id}";
                    $result = $mysqli->query($query);
                    if($result){
                        header("location:index.php?msg= Cập nhật danh mục thành công");
                    }else{
                        echo "Lỗi!Không thể cập nhật danh mục";
                    }
                }
            ?>
                <form action="" method="POST">
                    <div class="form-group col-sm-8">
                        <label for="exampleInputEmail1">Cat Name</label>
                        <input type="text" class="form-control" value="<?php echo $infoCat['name']?>" name="name" placeholder="Nhập tên danh mục" required>
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="exampleInputEmail1">Cat Name</label>
                        <input type="text" class="form-control" value="<?php echo $infoCat['parent_id']?>" name="parent_id" placeholder="Nhập tên danh mục" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Edit</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php require_once "../inc/footer.php" ?>
</div>