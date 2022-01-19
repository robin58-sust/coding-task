<?php
require_once 'connection.php';

//echo "hi";

$userid = isset($_POST['userid']) ? mysqli_real_escape_string($conn, $_POST['userid']) : "";
$name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : "";
$mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : "";
$house = isset($_POST['house']) ? mysqli_real_escape_string($conn, $_POST['house']) : "";
$flat = isset($_POST['flat']) ? mysqli_real_escape_string($conn, $_POST['flat']) : "";
$road = isset($_POST['road']) ? mysqli_real_escape_string($conn, $_POST['road']) : "";
$block = isset($_POST['block']) ? mysqli_real_escape_string($conn, $_POST['block']) : "";
$area = isset($_POST['area']) ? mysqli_real_escape_string($conn, $_POST['area']) : "";
$instruction = isset($_POST['instruction']) ? mysqli_real_escape_string($conn, $_POST['instruction']) : "";
$os = isset($_POST['os']) ? mysqli_real_escape_string($conn, $_POST['os']) : "";

//echo "\nname =".$name, " mobile =".$mobile, " house =".$house, " flat =".$flat, " road =".$road, " block =".$block, " area =".$area, " instruction =".$instruction;

if($userid == 0 || $userid =="") {
    //echo "userid nai";
    $sql_insert = mysqli_query($conn, "INSERT INTO `users` (`mobile`,`name`,`house`,`flat`,`road`,`block`,`area`,`instruction`,`os`)
     VALUES ('$mobile','$name','$house','$flat','$road', '$block','$area','$instruction','$os')");
    
    if($sql_insert === TRUE){
        $last_id = mysqli_insert_id($conn);
        $result = array('status' => 200, "userid" => (int)$last_id, "msg" => "user insert success");
        echo json_encode($result);
    }
    //$result = array('status' => "400", "msg" => "parameter missing");
    //echo json_encode($result);
    mysqli_close($conn);
    exit;
}else {
//echo "userid ace";
$sql_update = mysqli_query($conn, "UPDATE `users` SET `mobile`='$mobile', `name`='$name', `house`='$house', `flat`='$flat',`road`='$road', `block`='$block', `area`='$area', `instruction`='$instruction' WHERE `user_id`='$userid' ");
    /*$sql_get_category = mysqli_query($conn, "SELECT * FROM `category` WHERE `is_active` = '1' ORDER BY `ranking`");
    while ($data = mysqli_fetch_array($sql_get_category)) {
        $categories[] = array(
            "id" => $data['id'], 
            "index" => $data['ranking'],
            "name_en" => $data['name_en'],
            "name_bn" => htmlentities($data['name_bn']),
            "app_image" => $data['app_image']
            );
    }

    $result = array('status' => "200", "msg" => "success", "categories" => $categories);
    echo json_encode($result);*/
    if($sql_update){
        $result = array('status' => 200, "userid" => (int)$userid, "msg" => "user update success");
        echo json_encode($result);
        mysqli_close($conn);
        exit; 
    }
    mysqli_close($conn);
    exit;
}
    
//}
?>