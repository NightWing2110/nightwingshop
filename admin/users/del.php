<?php
    require_once "../inc/header.php";
    $user_id = $_GET['users_id'];
    $query = "DELETE FROM users WHERE users_id = {$user_id}";
    $result = $mysqli->query($query);
    if($result){
        header("LOCATION:index.php?msg= xóa thành công");
    }else{
        echo "Có lỗi";
    }
?>