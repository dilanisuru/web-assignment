<?php
include 'config.php';
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$cid= $_POST['cid'];
    $officer= $_POST['officer'];
   
$sql = 
"INSERT INTO `case_officer` 
(`cid`, `oid`) 
VALUES 
('$cid', '$officer') 

";
if(mysqli_query($conn, $sql)){
    echo "1";	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    echo "0";
}
mysqli_close($conn);


?>
