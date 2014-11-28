<?php  
   
/* 
 * Following code will create a new product row 
 * All product details are read from HTTP Post Request 
 */  
   
// array for JSON response  
$response = array();  
   
// check for required fields  
if (isset($_REQUEST['phoneNumber']) && isset($_REQUEST['cipherNumber'])) {  
   
    $phone = $_REQUEST['phoneNumber'];  
    $cipher = $_REQUEST['cipherNumber'];  
    
	
    // include db connect class  
    require_once __DIR__ .'/db_connect.php';  
   
    // connecting to db  
    $db = new DB_CONNECT();  
	$query = $db->prepare("SELECT cipher FROM transportboy WHERE phoneNumber=?");
	if (!$query) {
		return FALSE;
	}
	$query->bind_param("s", $userid);
	$query->execute();
	$result = $query->get_result();
	$row = $result->fetch_array();
	$query->close();
	$db->close();
    // mysql inserting a new row  
   
   
    // check if row inserted or not  
    if ($row[0] === $cipher) {  
        // successfully inserted into database  
        $response["success"] = 1;  
        $response["message"] = "restaurant successfully created.";  
   
        // echoing JSON response  
        echo json_encode($response);  
    } else {  
        // failed to insert row  
        $response["success"] = 0;  
        $response["message"] = "Oops! An error occurred.";  
   
        // echoing JSON response  
        echo json_encode($response);  
    }  
} else {  
    // required field is missing  
    $response["success"] = 0;  
    $response["message"] = "Required field(s) is missing";  
   
    // echoing JSON response  
    echo json_encode($response);  
}  
?>  