<?php
include('dbconnect.php');
$id=mysqli_real_escape_string($link,$_POST['app_id']);
mysqli_query($link,"UPDATE `user_details` SET `status`='APPROVED' WHERE user_id='".$id."'");
?>