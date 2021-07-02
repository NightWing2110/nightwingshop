<?php
    require_once "../inc/header.php";
    $cat_id = $_GET['cat_id'];
    $query = "DELETE FROM cat WHERE cat_id = {$cat_id}";
    $result = $mysqli->query($query);
    if($result){
        header("location:index.php?msg= Xóa thành công");
    }else{
        echo "Lỗi! Không thể xóa danh mục";
    }
?>