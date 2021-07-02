<?php require_once  "../inc/header.php" ?>
<script type="text/javascript">
  document.title = 'Transaction | VinaEnter Edu';
</script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 class="page-header">List Transaction </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Transaction</li>
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
                    <th>Transaction ID</th>
                    <th>User ID</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Detail</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  $query = "SELECT orders.*, users.* FROM orders 
                  INNER JOIN users ON orders.users_id = users.users_id ";
                  $result = $mysqli->query($query);
                  while ($arTransaction = mysqli_fetch_assoc($result)) {
                    $total = ($arTransaction['price'] * $arTransaction['qty']);
                  ?>
                    <tr>
                      <td><?php echo $arTransaction['order_id'] ?></td>
                      <td><?php echo $arTransaction['users_id'] ?></td>
                      <td><?php echo $arTransaction['username'] ?></td>
                      <td><?php echo number_format($total)?></td>
                      <td><a href="admin/transaction/order.php?transaction_id=<?php echo $arTransaction['order_id']?>">View Detail</a></td>
                      <td>
                        
                        <a class="btn btn-xs btn-danger" href="admin/transaction/del.php?transaction_id=<?php echo $arTransaction['transaction_id'] ?>" onclick="return confirm ('Bạn có thực sự muốn xóa giao dịch này không?')"><i class="fa fa-times"></i></a>

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