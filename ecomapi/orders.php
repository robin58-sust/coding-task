<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");
$orders = [];

$userid = isset($_POST['userid']) ? mysqli_real_escape_string($conn, $_POST['userid']) : "";

$sql_get_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE `user_id` = '$userid' ORDER BY `order_date` DESC");
while ($order_data = mysqli_fetch_array($sql_get_orders)) {
    
    $orderId = $order_data['id'];
    $time = strtotime($order_data['order_date']);
    $sql_get_ordered_products = mysqli_query($conn, "SELECT * FROM `order_details` WHERE `order_id` = '$orderId' ORDER BY `order_id`");
    $ordered_products = [];
    while($product_data = mysqli_fetch_array($sql_get_ordered_products)){
        
        $order_product_id = $product_data['product_id'];
        $sql_temp = mysqli_query($conn, "SELECT * FROM `products` WHERE `product_id` = '$order_product_id'");
        if(mysqli_num_rows($sql_temp) > 0){
            while ($sql_get_product_detail = mysqli_fetch_assoc($sql_temp)) {
                $ordered_products[] = array(
                    "product_id" => (int)$order_product_id,
                    "name_en" => $sql_get_product_detail['name_en'],
                    "name_bn" => $sql_get_product_detail['name_bn'],
                    "description_en" => $sql_get_product_detail['description_en'],
                    "description_bn" => $sql_get_product_detail['description_bn'],
                    "picture" => $sql_get_product_detail['picture'],
                    "price" => (int)$product_data['price'],
                    "sale_price" => (int)$product_data['sale_price'],
                    "unit" => $product_data['unit'],
                    "qty" => (int)$product_data['quantity'],
                    "is_delivered" => (int)$product_data['is_delivered'],            
                );                    
            }
        }

        

    }
    $orders[] = array(
        "order_id" => (int)$orderId,
        "order_date" => date("j M, yy", $time),
        "product_price" => (int)$order_data['product_price'],
        "delivery_charge" => (int)$order_data['delivery_charge'],
        "total_price" => (int)$order_data['sub_total'],
        "discount" => (int)$order_data['discount'],
        "payable_price" => (int)$order_data['total_price'],
        "due" => (int)$order_data['due'], 
        "order_status" => (int)$order_data['status'],
		"name" => $order_data['name'],
        "house" => $order_data['house'],
        "flat" => $order_data['flat'],
        "road" => $order_data['road'],
        "block" => $order_data['block'],
        "area" => $order_data['area'],
        "instruction" => $order_data['instruction'],
        "delivery_note" => $order_data['delivery_note'],
        "delivery_date" => $order_data['delivery_date'],
        "cancel_note" => $order_data['cancel_note'],
        "admin_msg" => $order_data['admin_msg'],
        "product_list" => $ordered_products,
        );
}

$result = array('status' => 200, "msg" => "success",  "orders" => $orders);
echo json_encode($result);

mysqli_close($conn);
//echo "hello";
exit;