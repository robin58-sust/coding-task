<?php

require_once 'connection.php';

$userid = isset($_POST['userid']) ? mysqli_real_escape_string($conn, $_POST['userid']) : "";
$orderid = isset($_POST['orderid']) ? mysqli_real_escape_string($conn, $_POST['orderid']) : "";

if($userid && $orderid) {
    //echo "userid ace";
    $sql_update = mysqli_query($conn, "UPDATE `orders` SET `status`='41' WHERE `id`='$orderid' AND `user_id`='$userid'");
    
    if($sql_update === TRUE){
        $result = array('status' => 200, "userid" => (int)$userid, "msg" => "order cancel success");
        echo json_encode($result);
    }   
    mysqli_close($conn);
    exit;
}else {
	//echo "userid nai";
	$result = array('status' => 400, "userid" => (int)$userid, "msg" => "order cancel fail");
	echo json_encode($result);
	mysqli_close($conn);
	exit; 
    
}

?>