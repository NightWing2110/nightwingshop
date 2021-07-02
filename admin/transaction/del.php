<?php
    require_once "../inc/header.php";
    $transaction_id = $_GET['transaction_id'];
    $query = "DELETE FROM orders WHERE transaction_id = {$transaction_id}";
    $result = $mysqli->query($query);
    if($result){
        header("LOCATION:index.php?msg= xóa thành công");
    }else{
        echo "Có lỗi";
    }
?>