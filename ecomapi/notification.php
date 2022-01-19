<?php

include 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$today = date("Y-m-d");

$notification = [];

  //notification section    
  $sql_get_notification = mysqli_query($conn, "SELECT * FROM `notifications` WHERE `is_active`=1 ORDER BY `publish_date` DESC");
  if (mysqli_num_rows($sql_get_notification) > 0) {
      while ($data_notifications = mysqli_fetch_assoc($sql_get_notification)) {
          $notifications[] = array(
              "id" => (int)$data_notifications['id'], 
              "title" =>  $data_notifications['title'],
              "description" => $data_notifications['description'],
              "publish_date" => date_format(date_create($data_notifications['publish_date']),'D, j M yy'),
              "image" => $data_notifications['image'],
              
          );
      }
  }

$result = array('status' => 200, "msg" => "success",  "notification" => $notifications,);
echo json_encode($result);

mysqli_close($conn);
//echo "hello";
exit;