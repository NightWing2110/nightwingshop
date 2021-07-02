<?php require_once "../inc/header.php" ?>
<script type="text/javascript">
          document.title = 'User | VinaEnter Edu';
      </script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 class="page-header">List Member</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Member</li>
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
            <a href="admin/users/add.php">
              <button class="btn btn-primary float-right">Add</button>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Fullname</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM users";
                  $result = $mysqli->query($query);
                  while ($arUser = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo $arUser['users_id'] ?></td>
                      <td><?php echo $arUser['username'] ?></td>
                      <td><?php echo $arUser['email'] ?></td>
                      <td><?php echo $arUser['phone'] ?></td>
                      <td><?php echo $arUser['address'] ?></td>
                      <td><?php echo $arUser['fullname'] ?></td>
                      <td><a class="btn btn-xs <?php echo $arUser['status'] == 1 ? "btn-primary" : "btn-danger" ?>" href="admin/users/active.php?users_id=<?php echo $arUser['users_id']?>"><?php echo $arUser['status'] == 1 ? "True" : "FALSE" ?></a></td>
                      <td><?php echo $arUser['role']?></td>
                      <td>
                        <a class="btn btn-xs btn-primary" href="admin/users/edit.php?users_id=<?php echo $arUser['users_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                        <a class="btn btn-xs btn-danger" href="admin/users/del.php?users_id=<?php echo $arUser['users_id'] ?>" onclick="return confirm('Bạn có thực sự muốn xóa danh mục này không?')"><i class="fa fa-times"></i></a>
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