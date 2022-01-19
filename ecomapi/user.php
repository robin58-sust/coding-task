<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");
$profile = [];

$userid = isset($_POST['userid']) ? mysqli_real_escape_string($conn, $_POST['userid']) : "";

$sql_get_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '$userid'");
if (mysqli_num_rows($sql_get_profile) > 0) {
    while ($data_profile = mysqli_fetch_assoc($sql_get_profile)) {
        $offer_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $data_profile['offer_start_date']);
        $today_date =  new DateTime(date("Y-m-d H:i:s"));
        $days  = $today_date->diff($offer_start_date)->format('%a');

        //checking where 30 days free delivery available or not
        if($days <= 30){
            $isFreeDelivery = 1;
        }
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
    
}

$result = array('status' => 200, "msg" => "success",  "profile" => $profile);
echo json_encode($result);

mysqli_close($conn);
//echo "hello";
exit;