<?php
 require "vendor/autoload.php";
 use \Firebase\JWT\JWT;


header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



 //Put your own hosting server HOST name here.
 $HostName = "localhost";
 
 //Put your own MySQL database name here.
 $DatabaseName = "react_native_test_database";
 
 //Put your own MySQL database User Name here.
 $HostUser = "root";
 
 //Put your own MySQL database Password here.
 $HostPass = "";
 
 // Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $Received_JSON variable.
 $Received_JSON = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($Received_JSON,true);
 
 // Populate User email from JSON $obj array and store into $user_email variable.
 $user_email = $obj['user_email'];
 
 // Populate Password from JSON $obj array and store into $user_password variable.
 $user_password = $obj['user_password'];

  //Checking User entered Email is already exist or not in MySQL database using SQL query.
 $sql = "SELECT * FROM user_data_table WHERE user_email = '$user_email'";
if ($result=mysqli_query($con,$sql))
{
	// Return the number of rows in result set
	$rowcount=mysqli_num_rows($result);

	if($rowcount > 0){
		$row = $result -> fetch_assoc();

		if($row['user_password'] == $user_password)
    	{
    		$secret_key = "12345";	//"YOUR_SECRET_KEY";
	        $issuer_claim = "THE_ISSUER"; // this can be the servername
	        $audience_claim = "THE_AUDIENCE";
	        $issuedat_claim = time(); // issued at
	        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
	        $expire_claim = $issuedat_claim + 60; // expire time in seconds
	        $token = array(
	            "iss" => $issuer_claim,
	            "aud" => $audience_claim,
	            "iat" => $issuedat_claim,
	            "nbf" => $notbefore_claim,
	            "exp" => $expire_claim,
	            "data" => array(
	                "id" => $id,
	                "firstname" => $firstname,
	                "lastname" => $lastname,
	                "email" => $email
	        ));

	        http_response_code(200);

	        $jwt = JWT::encode($token, $secret_key);
	        echo json_encode(
	            array(
	                "message" => "Successful login.",
	                "jwt" => $jwt,
	                "email" => $email,
	                "expireAt" => $expire_claim
	            ));
    	} else{
	        http_response_code(401);
	        echo json_encode(array("message" => "Login failed.", "password" => $password));
    	}
	}
}
  mysqli_close($con);