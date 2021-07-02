<?php
require_once "../../util/dbConnect.php";
$users_id = $_GET['users_id'];
$query = "SELECT * FROM users WHERE users_id = {$users_id}";
$result = $mysqli->query($query);
$arActive = mysqli_fetch_assoc($result);
$active = $arActive['status'] == 0 ? 1 : 0;

$queryUpdate = "UPDATE `users` SET`status`='{$active}' WHERE users_id = {$users_id}";
$resultUpdate = $mysqli->query($queryUpdate);
if($resultUpdate>0){
    header('location:index.php?msg= cập nhật thành công');
}else{
    echo "cập nhật lỗi";
}
?>