<?php

session_start();

$cid=$_REQUEST["cid"];
include_once "config.php";
$suspect="";
$officer="";
$sql = "SELECT `suspect`.`name` FROM `suspect` ,`case_suspeect` WHERE `case_suspeect`.`sid`=`suspect`.`sid` AND `case_suspeect`.`cid`='$cid'";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //$cid= $row["cid"];
        $sid= $row["name"];
        $suspect=$suspect.$sid."</br>";
    }
} else {
    $suspect = "0 Suspects";

}


$sql = "SELECT `officer`.`name`  FROM  `officer` , `case_officer` WHERE `case_officer`.`oid`=`officer`.`oid` AND `cid`='$cid'";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //$cid= $row["cid"];
        $oid= $row["name"];
        $officer=$officer.$oid."</br>";
    }
} else {
    $suspect = "0 Suspects";

}


$sql = "SELECT * FROM `case` WHERE `id`='$cid'";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $cid= $row["id"];
        $oDate= $row["odate"];
        $description= $row["description"];
        $caseProcess= $row["caseProcess"];  
        $ineStDate= $row["ineStDate"];
   
              
        $myProfile=new \stdClass();
        $myProfile->success = true;
        $myProfile->cid = $cid;
        $myProfile->oDate = $oDate;
      
        $myProfile->description = $description; 
        $myProfile->caseProcess = $caseProcess;
        $myProfile->ineStDate = $ineStDate;
        $myProfile->suspect = $suspect;
        $myProfile->officer = $officer;
       
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

?>