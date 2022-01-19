<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");
$isFreeDelivery = 0;
$delivery_charge = 0;
$offer = null;
$profile = null;
$orders = null;
$notifications = null;
$offer_list = null;
$products = [];

$categories = [];

//echo "hi";

/*$leagueid = isset($_POST['leagueid']) ? mysql_real_escape_string($_POST['leagueid']) : "";
if($leagueid =="") {
    //echo "email=".$email." vcode=".$vcode."leagueid=".$leagueid."os=".$os;
    $result = array('status' => "400", "msg" => "parameter missing");
    echo json_encode($result);
    exit;
}else {*/
//echo "hello1";

    $userid = isset($_POST['userid']) ? mysqli_real_escape_string($conn, $_POST['userid']) : "";

    //mysqli_query($conn,'SET CHARACTER SET utf8'); mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
 
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

$sql_get_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `is_active` = '1' ORDER BY `category_id`,`ranking`");
while ($data = mysqli_fetch_array($sql_get_products)) {
    $products[] = array(
        "product_id" => (int)$data['product_id'],
        "category_id" => (int)$data['category_id'],
        "index" => (int)$data['ranking'],
        "name_en" => $data['name_en'],
        "name_bn" => $data['name_bn'],
        "description_en" => $data['description_en'],
        "description_bn" => $data['description_bn'],
        "price" => (int)$data['price'],
        "sale_price" => (int)$data['sale_price'],
        "is_discount" => (int)$data['is_discount'],
        "amount" => (int)$data['amount'],
        "is_percentage" => (int)$data['is_percentage'],
        "unit" => $data['unit'],
        "picture" => $data['picture'],
        "slider_image" => $data['slider_image'],
        "image2" => $data['image2'],
        "image3" => $data['image3'],
        "stock" => (int)$data['stock'],
        "status" => (int)$data['status'],
        );
}
    // offers and discount section
    $sql_get_offer = mysqli_query($conn, "SELECT * FROM `offers` WHERE (`is_active` = '1' AND `start_date` <= '$today' AND `end_date` >= '$today')");
    if (mysqli_num_rows($sql_get_offer) > 0) {
        while ($data_offer = mysqli_fetch_assoc($sql_get_offer)) {
            $min_amount = $data_offer['min_amount'];
            $max_amount = $data_offer['max_amount'];
            $amount = rand($min_amount,$max_amount);
            $offer = array(
            "is_first_install" => (int)$data_offer['is_first_install'], 
            "is_all_product" => (int)$data_offer['is_all_product'],
            "is_category" => (int)$data_offer['is_category'],
            "category_id" => (int)$data_offer['category_id'],
            "is_single_product" => (int)$data_offer['is_single_product'],
            "product_id" => (int)$data_offer['product_id'],
            "amount" => $amount,
            );
        }       
    }

    //mobile phone number from database
    $sql_get_contact = mysqli_query($conn, "SELECT * FROM `contact_office` ORDER BY RAND() LIMIT 1");
    if (mysqli_num_rows($sql_get_contact) > 0) {
        while ($data_contact = mysqli_fetch_assoc($sql_get_contact)) {
            $contact = $data_contact['mobile'];
        }       
    }


    //delivery charge section
    if($isFreeDelivery == 0){
        $sql_get_dc = mysqli_query($conn, "SELECT * FROM `delivery_charge` LIMIT 1");
        if (mysqli_num_rows($sql_get_dc) > 0) {
            while ($data_dc = mysqli_fetch_assoc($sql_get_dc)) {
                $delivery_charge = (int)$data_dc['dc'];
                }
        }
    }

  

    //offer_list section    
    $sql_get_offer_list = mysqli_query($conn, "SELECT * FROM `offer_list` WHERE `is_active`=1 ORDER BY `offer_start` DESC");
        if (mysqli_num_rows($sql_get_offer_list) > 0) {
            while ($data_offer_list = mysqli_fetch_assoc($sql_get_offer_list)) {
                $offer_list[] = array(
                    "id" => (int)$data_offer_list['id'], 
                    "title" => $data_offer_list['title'], 
                    "description" => $data_offer_list['description'],
                    "image" => $data_offer_list['image'],
                    "product_id" => $data_offer_list['product_id'],
                    "category_id" => $data_offer_list['category_id'], 
                    "offer_start" => date_format(date_create($data_offer_list['offer_start']),'D, j M \'y'), //D, j M g:i a
                    "offer_end" => date_format(date_create($data_offer_list['offer_end']),'D, j M \'y'),
                    "amount" => (int)$data_offer_list['amount'],
                    "is_percentage" => (bool)$data_offer_list['is_percentage'],
                );
            }
        }
         

    $result = array('status' => 200, "msg" => "success", "contact" => $contact, "delivery_charge" => $delivery_charge, "products" => $products, 'categories' => $categories, "orders" => $orders, "profile" => $profile, "offer" => $offer, "offer_list" => $offer_list);
    echo json_encode($result);

    mysqli_close($conn);
    //echo "hello";
    exit;
//}
?>