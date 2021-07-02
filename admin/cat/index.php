<?php require_once  "../inc/header.php" ?>
<script type="text/javascript">
          document.title = 'Cat | VinaEnter Edu';
      </script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 class="page-header">List Cat</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Cat</li>
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
            <a href="admin/cat/add.php">
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
                    <th>Active</th>
                    <th>Parent_id</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM cat";
                  $result = $mysqli->query($query);
                  while ($arCat = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $arCat['cat_id'] ?></td>
                      <td><?php echo $arCat['name'] ?></td>
                      <td><a class="btn btn-xs <?php echo $arCat['active'] ==1 ? "btn-primary" : "btn-danger"?>" href="admin/cat/active.php?cat_id=<?php echo $arCat['cat_id']?>"><?php echo $arCat['active'] == 1 ? "True" : "FALSE" ?></a></td>
                      <td><?php echo $arCat['parent_id']?></td>
                      <td>
                        <a class="btn btn-xs btn-primary" href="admin/cat/edit.php?cat_id=<?php echo $arCat['cat_id']?>"><i class="fa fa-edit"></i>Edit</a>
                        <a class="btn btn-xs btn-danger" href="admin/cat/del.php?cat_id=<?php echo $arCat['cat_id']?>" onclick="return confirm('Bạn có thực sự muốn xóa danh mục này không?')"><i class="fa fa-times"></i></a>
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
  <?php require_once "../inc/footer.php" ?>
</div>