<?php require_once "../inc/header.php" ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">Edit Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin/index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="admin/product/index.php">Product</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="clearfix"></div>
        <div class="form-group row">
            <div class="form-group col-md-12">
                <?php
                $product_id = $_GET['product_id'];
                $select = "SELECT * FROM product WHERE product_id = {$product_id}";
                if ($mysqli->query($select)) {
                    $infoProduct = mysqli_fetch_assoc($mysqli->query($select));
                }
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $cat_id = $_POST['cat_id'];
                    $price = $_POST['price'];
                    $content = $_POST['content'];
                    $count = $_POST['count'];
                    if ($_FILES['picture']['name']) {
                        $fileName = $_FILES['picture']['name'];
                        $arFile = explode('.', $fileName);
                        $typeFile = end($arFile);
                        $newFileName = 'Product_' . time() . '.' . $typeFile;
                        $tmpName = $_FILES['picture']['tmp_name'];
                        $resultUpload = move_uploaded_file($tmpName, '../../files/uploads/' . $newFileName);
                        if ($resultUpload) {
                            echo "thêm thành công";
                        }
                    }
                    $query = "UPDATE `product` SET name ='{$name}', cat_id={$cat_id}, price ='{$price}', content='{$content}',count = '{$count}', picture='{$newFileName}' WHERE product_id = '{$product_id}'";
                    $result = $mysqli->query($query);
                    if ($result) {
                        header('location:index.php?msg= Cập nhật sản phẩm thành công');
                    } else { {
                            echo "Lỗi";
                        }
                    }
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <label for="exampleInputEmail1">Cat</label>
                        <select class="form-control" name="cat_id">
                            <option value="">Cat</option>
                            <?php
                            $queryCat = "SELECT * FROM cat";
                            $resultCat = $mysqli->query($queryCat);
                            while ($arCat = mysqli_fetch_assoc($resultCat)) {
                            ?>
                                <option value="<?php echo $arCat['cat_id'] ?>"><?php echo $arCat['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <p class="text-danger"></p>
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm" value="<?php echo $infoProduct['name']?>">
                        <p class="text-danger"></p>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" name="price" id="exampleInputEmail1" placeholder="1.000.000" value="<?php echo $infoProduct['price']?>">
                                <p class="text-danger"></p>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="exampleInputEmail1">Number</label>
                                <input type="number" class="form-control " name="count" value="<?php echo $infoProduct['count']?>">
                                <p class="text-danger"></p>
                            </div>
                        </div>
                        <label for="exampleInputEmail1">Picture</label>
                        <input type="file" class="form-control " name="picture">
                        <p class="text-danger"></p>
                        <label for="exampleInputEmail1">Content</label>
                        <textarea class="form-control ckeditor" name="content" rows="4" ><?php echo htmlspecialchars($infoProduct['content']); ?></textarea>
                        <p class="text-danger"></p>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php require_once "../inc/footer.php" ?>
</div>