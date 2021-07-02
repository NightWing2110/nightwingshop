<?php require_once  "../inc/header.php" ?>
<script type="text/javascript">
  document.title = 'Transaction | VinaEnter Edu';
</script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 class="page-header">Transaction </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Order</li>
    </ol>
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
                    <th>Product Name</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Note</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                
                if(isset($_GET['transaction_id'])){
                  $transation_id = $_GET['transaction_id'];
                
                $query = "SELECT orders.*, transaction.*, product.name as product_name FROM orders INNER JOIN transaction ON orders.transaction_id = transaction.transaction_id
                INNER JOIN product ON orders.product_id = product.product_id
                 WHERE order_id = '$transation_id'";
                $result = $mysqli->query($query);
                while ($arOrder = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                      <td><?php echo $arOrder['order_id']?></td>
                      <td><?php echo $arOrder['product_name']?></td>
                      <td><?php echo $arOrder['qty']?></td>
                      <td><?php echo number_format($arOrder['price'])?></td>
                      <td><?php echo number_format($arOrder['total'])?></td>
                      <td><?php echo $arOrder['note']?></td>
                    </tr>
                    <?php }}?>
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