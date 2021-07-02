<?php require_once  "../inc/header.php" ?>
<script type="text/javascript">
          document.title = 'Product | VinaEnter Edu';
      </script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 class="page-header">List Product</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Product</li>
    </ol>
    <?php
    if (isset($_GET['msg']) && $_GET['msg']) {
      echo $_GET['msg'];
    }
    ?>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <a href="admin/product/add.php">
              <button class="btn btn-primary float-right">Add</button>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Cat_id</th>
                    <th>Count</th>
                    <th>Picture</th>
                    <th>Created</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT product.*, cat.name AS cat_name FROM product INNER JOIN cat ON product.cat_id = cat.cat_id ";
                  $result = $mysqli->query($query);
                  while ($arProduct = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $arProduct['product_id'] ?></td>
                      <td><?php echo $arProduct['name'] ?></td>
                      <td><?php echo number_format($arProduct['price'] . '.') ?></td>
                      <td><?php echo $arProduct['cat_id'] ?></td>
                      <td><?php echo $arProduct['count'] ?></td>
                      <td>
                        <img src="files/uploads/<?php echo $arProduct['picture'] ?>" alt="" width="250px">
                      </td>
                      <td><?php echo $arProduct['created_at'] ?></td>
                      <td>
                        <a class="btn btn-xs btn-primary" href="admin/product/edit.php?product_id=<?php echo $arProduct['product_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                        <a class="btn btn-xs btn-danger" href="admin/product/del.php?product_id=<?php echo $arProduct['product_id'] ?>" onclick="return confirm('Bạn có thực sự muốn xóa danh mục này không?')"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once  "../inc/footer.php" ?>
</div>