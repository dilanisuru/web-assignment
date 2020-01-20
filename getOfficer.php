<?php

session_start();

$nic=$_REQUEST["nic"];
include_once "config.php";
$sql = "SELECT * FROM `officer` WHERE `nic`='$nic'";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $oid= $row["oID"];
        $nic= $row["nic"];
        $name= $row["name"];
        $gender= $row["gender"];  
        $contactNo= $row["contactNo"];
        $gender= $row["gender"];
        $dob= $row["dob"];
        $address= $row["address"];
              
        $myProfile=new \stdClass();
        $myProfile->success = true;
        $myProfile->oid = $oid;
        $myProfile->name = $name;
      
        $myProfile->nic = $nic; 
        $myProfile->gender = $gender;
        $myProfile->contactNo = $contactNo;
        $myProfile->dob = $dob;
        $myProfile->address = $address;
       
        $myJSON = json_encode($myProfile);

echo $myJSON;
    }
} else {

   
    $myProfile=new \stdClass();
    $myProfile->success = false;
  
    $myJSON = json_encode($myProfile);

echo $myJSON;
}
$conn->close();


// $myProfile=new \stdClass();
// $myProfile->name = "John";
// $myProfile->age = $_SESSION["uniId"];
// $myProfile->city = "New York";

// $myJSON = json_encode($myProfile);

// echo $myJSON;

?>