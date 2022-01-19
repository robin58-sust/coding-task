<?php
include 'connection.php';

//header('Access-Control-Allow-Origin: *');
// error_reporting(E_ALL);
// ini_set('display_errors', 'on');
echo phpinfo();
//require_once 'connection.php';
/*date_default_timezone_set("Asia/Dhaka");
$orderDate = date("Y-m-d H:i:s");
$date1 = new DateTime('2020-11-06');
//$date2 = new DateTime('2010-07-07');
$date2 = DateTime::createFromFormat('Y-m-d H:i:s', $orderDate);
//$date2 = DateTime($orderDate);

$days  = $date2->diff($date1)->format('%a');

echo $days." days";*/



/*$json = file_get_contents('php://input');

// Converts it into a PHP object
//$data = json_decode($json, true);
//print_r($data);

$userId = 0;
$productPrice = 0;
$deliveryCharge = 0;
$subTotal = 0;
$discount = 0;
$totalPrice = 0;
$name = "";
$mobile = "";
$house = "";
$flat = "";
$road = "";
$block = "";
$area = "";
$instruction = "";
$deliveryNote = "";
$os = 0;
$orderId = 0;
$pushToken = "";


$insertOrder = 0;


echo "orderDate=".$orderDate;



foreach($data as $key => $value){
	matchKey($key, $value);
	if(is_array($value)){
		foreach($value as $key1 => $value1){
			
			if(is_array($value1)){
				$productId = 0;
				$price = 0;
				$productSalePrice = 0;
				$productUnit = "";
				$productQty = 0;
				foreach($value1 as $key2 => $value2){
					//echo "$key2: $value2\n";
					matchKey($key2, $value2);
				}
				if($insertOrder == 0){
					$insertOrder = 1;
					// check for new user, if new user then insert into users table and get userId
					if($userId == 0){
						$sql_insert_user = mysqli_query($conn, "INSERT INTO `users` (`mobile`,`name`,`house`,`flat`,`road`,`block`,`area`,`instruction`,`os`,`push_token`)
     VALUES ('$mobile','$name','$house','$flat','$road', '$block','$area','$instruction','$os','$pushToken')");
						// check insert into users table is success or fail, if success then get userId
						if($sql_insert_user === TRUE){
							$userId = mysqli_insert_id($conn);
						}
					}
					//insert data into order table and get orderId
					$sql_insert_order = mysqli_query($conn, "INSERT INTO `orders` (`user_id`,`order_date`,`product_price`,`delivery_charge`,`sub_total`,`discount`,`total_price`,`name`,`mobile`,`house`,`flat`,`road`,`block`,`area`,`instruction`,`delivery_note`)
     VALUES ('$userId','$name','$productPrice','$deliveryCharge','$subTotal', '$discount','$totalPrice','$name','$mobile','$house','$flat','$road','$block','$area','$instruction','$deliveryNote')");
					// check insert into orders table is success or fail, if success then get orderId
						if($sql_insert_order === TRUE){
							$orderId = mysqli_insert_id($conn);
						}
				}
				//insert into order details table
				$sql_insert_order_details = mysqli_query($conn, "INSERT INTO `order_details` (`order_id`,`product_id`,`price`,`sale_price`,`unit`,`quantity`)
     VALUES ('$orderId','$productId','$price','$productSalePrice','$productUnit', '$productQty')");
				//echo "productId=".$productId." price=".$price." productSalePrice=".$productSalePrice." productUnit=".$productUnit." productQty=".$productQty."\n";
			}
		}
	}
}
if($sql_insert_order_details && $sql_insert_order){
	$result = array('status' => 200, "userid" => (int)$userId, "msg" => "order insert success");
    echo json_encode($result);
}


function matchKey($key, $value){
	global $userId, $productPrice, $deliveryCharge, $subTotal, $discount, $totalPrice, $name, $mobile, $house, $flat, $road, $block, $area, $instruction, $deliveryNote, $os, $pushToken;
	global $productId, $price, $productSalePrice, $productUnit, $productQty;
	switch ($key) {
		case 'userId':
			$userId = $value;
			break;
		case 'productPrice':
			$productPrice = $value;
			break;
		case 'deliveryCharge':
			$deliveryCharge = $value;
			break;
		case 'subTotal':
			$subTotal = $value;
			break;
		case 'discount':
			$discount = $value;
			break;
		case 'totalPrice':
			$totalPrice = $value;
			break;
		case 'name':
			$name = $value;
			break;
		case 'mobile':
			$mobile = $value;
			break;
		case 'house':
			$house = $value;
			break;
		case 'flat':
			$flat = $value;
			break;
		case 'road':
			$road = $value;
			break;
		case 'block':
			$block = $value;
			break;
		case 'area':
			$area = $value;
			break;
		case 'deliveryNote':
			$deliveryNote = $value;
			break;
		case 'instruction':
			$instruction = $value;
			break;
		case 'os':
			$os = $value;
			break;
		case 'pushToken':
			$pushToken = $value;
			break;
		case 'productId':
			$productId = $value;
			break;
		case 'price':
			$price = $value;
			break;
		case 'productSalePrice':
			$productSalePrice = $value;
			break;
		case 'productUnit':
			$productUnit = $value;
			break;
		case 'productQty':
			$productQty = $value;
			break;
		
		default:
			break;
	}

}*/



//echo "hello";

?>