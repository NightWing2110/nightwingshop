<?php
    require_once "../inc/header.php";
    $contact_id = $_GET['contact_id'];
    $query = "DELETE FROM contact WHERE contact_id = {$contact_id}";
    $result = $mysqli->query($query);
    if($result){
        header("location:index.php?msg= Xóa thành công");
    }else{
        echo "Lỗi! Không thể xóa danh mục";
    }
?>