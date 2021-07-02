<?php
require_once "../../util/dbConnect.php";
$cat_id = $_GET['cat_id'];
$query = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
$result = $mysqli->query($query);
$arActive = mysqli_fetch_assoc($result);
$active = $arActive['active'] == 0 ? 1 : 0;

$queryUpdate = "UPDATE `cat` SET`active`='{$active}' WHERE cat_id = {$cat_id}";
$resultUpdate = $mysqli->query($queryUpdate);
if($resultUpdate>0){
    header('location:index.php?msg= cập nhật thành công');
}else{
    echo "cập nhật lỗi";
}
?>