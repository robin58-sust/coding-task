<?php
include 'connection.php';
$mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : "";
$os = isset($_POST['os']) ? mysqli_real_escape_string($conn, $_POST['os']) : "";
$token = isset($_POST['token']) ? mysqli_real_escape_string($conn, $_POST['token']) : "";

date_default_timezone_set("Asia/Dhaka");
$now = date("Y-m-d h:i:s");
$profile = null;
$userid = null;

if($mobile !=""){
	//check this mobile number exists in DB

	$sql_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `mobile` = '$mobile'");
	if(mysqli_num_rows($sql_check) > 0){
		while ($data_profile = mysqli_fetch_assoc($sql_check)) {
			$userid = $data_profile['user_id'];
			$profile = array(
            	"name" => $data_profile['name'], 
            	"mobile" => $data_profile['mobile'],
            	"is_verified" => (int)$data_profile['is_verified'],
            	"house" => $data_profile['house'],
            	"flat" => $data_profile['flat'],
            	"road" => $data_profile['road'],
            	"block" => $data_profile['block'],
            	"area" => $data_profile['area'],
            	"note" => $data_profile['instruction'],
            );
		}

		//update DB
		$sql_update = mysqli_query($conn, "UPDATE `users` SET `is_verified`='1',`push_token` = '$token',`os`='$os',`last_use`='$now' WHERE `mobile`='$mobile'");

		$result = array('status' => 200, "msg" => "user exists", "profile" => $profile, "userid" => (int)$userid);
		echo json_encode($result);
		mysqli_close($conn);
    	exit;

	}else{
		//insert into DB
		$sql_insert = mysqli_query($conn, "INSERT INTO `users` (`mobile`,`push_token`,`is_verified`,`os`,`install_date`,`last_use`) VALUES ('$mobile','$token','1','$os','$now','$now')");
    
    	if($sql_insert === TRUE){
        	$last_id = mysqli_insert_id($conn);
        	$result = array('status' => 201, "userid" => (int)$last_id, "msg" => "user insert success", "profile" =>$profile);
        	echo json_encode($result);
    	}
    
    	mysqli_close($conn);
    	exit;
	}

	

}else{
	$result = array('status' => 400, "msg" => "wrong entry");
		echo json_encode($result);
		mysqli_close($conn);
    	exit;
}


?>