<?php
    require_once "../inc/header.php";
    $product_id = $_GET['product_id'];
    $query = "DELETE FROM product WHERE product_id = {$product_id}";
    $result = $mysqli->query($query);
    if($result){
        header('location:index.php?msg= Xóa thành công');
    }else{
        echo "Lỗi";
    }
?>