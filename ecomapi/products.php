<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");
$products = [];

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

$result = array('status' => 200, "msg" => "success", 'categories' => $categories, "products" => $products);
echo json_encode($result);

mysqli_close($conn);
//echo "hello";
exit;