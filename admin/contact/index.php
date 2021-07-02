<?php require_once "../inc/header.php" ?>
<script type="text/javascript">
          document.title = 'Contact | VinaEnter Edu';
      </script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 class="page-header">List Contact</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Content</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM contact";
                    $result = $mysqli->query($query);
                    while($arContact = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                      <td><?php echo $arContact['contact_id']?></td>
                      <td><?php echo $arContact['name']?></td>
                      <td><?php echo $arContact['email']?></td>
                      <td><?php echo $arContact['subject']?></td>
                      <td><?php echo $arContact['content']?></td>
                      <td>
                        <a class="btn btn-xs btn-danger" href="admin/contact/del.php?contact_id=<?php echo $arContact['contact_id'] ?>" onclick="return confirm('Bạn có thực sự muốn xóa danh mục này không?')"><i class="fa fa-times"></i></a>
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