<?php
include 'connection.php';
$mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : "";
$otp = isset($_POST['otp']) ? mysqli_real_escape_string($conn, $_POST['otp']) : "";
//$name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : "";
//echo "hi";
if($mobile !=""){
	//echo "mobile=".$mobile." otp= ".$otp;

	//Send OTP SMS through MuthoFun
	/*$username = "KenaKeta";
	$password = "Sms4TFol@1!";
	$mobiles = $mobile;
	$originator = "01844016400";
	$message  = "Your TazaFol One-Time PIN is ".$otp."\nThank You!\nTazaFol";
	$message = rawurlencode($message);
	$url = "http://clients.muthofun.com:8901/esmsgw/sendsms.jsp?user=$username&password=$password&mobiles=$mobiles&sms=$message&unicode=1";			

	$c = curl_init(); 
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($c, CURLOPT_URL, $url); 
	$response = curl_exec($c);*/
	//echo $response;

	//Send OTP SMS through Onnorokom SMS
	try{
 		$soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
 		$paramArray = array(
 			'userName' => "01612426024",
 			'userPassword' => "SMS@Gate!W@y324",
 			'mobileNumber' => $mobile,
 			'smsText' => "Your TazaFol One-Time PIN is ".$otp."\nThank You!\nTazaFol",
 			'type' => "TEXT",
 			'maskName' => '',
 			'campaignName' => '',
 		);
 		$value = $soapClient->__call("OneToOne", array($paramArray));
 		//echo $value->OneToOneResult;
	} catch (Exception $e) {
 		//echo $e->getMessage();
	}
}

?>