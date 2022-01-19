<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");
$app_info = [];

  // app info section
    $sql_get_info = mysqli_query($conn, "SELECT * FROM `app` WHERE 1 ");
    if (mysqli_num_rows($sql_get_info) > 0) {
        while ($data_info = mysqli_fetch_assoc($sql_get_info)) {
            $info = array(
            "android_app_version" => $data_info['android_app_version'],
            "android_app_id" => $data_info['android_app_id'],
            "ios_app_version" => $data_info['ios_app_version'],
            "ios_app_id" => $data_info['ios_app_id'],
            );
        }
    }       

$result = array('status' => 200, "msg" => "success",  "app-info" => $info);
echo json_encode($result);

mysqli_close($conn);
//echo "hello";
exit;