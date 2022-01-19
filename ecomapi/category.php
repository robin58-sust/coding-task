<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");

$categories = [];

$sql_get_category = mysqli_query($conn, "SELECT * FROM `category` WHERE `is_active` = '1' ORDER BY `ranking`");
while ($data = mysqli_fetch_array($sql_get_category)) {
    $isSelected = false;
    if($data['ranking'] == 1){
        $isSelected = true;
    }

    $categories[] = array(
        "id" => (int)$data['id'], 
        "index" => (int)$data['ranking'],
        "name_en" => $data['name_en'],
        "name_bn" => $data['name_bn'],
        "app_image" => $data['app_image'],
        "is_selected" => $isSelected,
        );
}

$result = array('status' => 200, "msg" => "success", 'categories' => $categories);
echo json_encode($result);

mysqli_close($conn);
//echo "hello";
exit;