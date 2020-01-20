<?php
include 'config.php';
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$cid= $_POST['cid'];
    $suspect= $_POST['suspect'];
   
$sql = 
"INSERT INTO `case_suspeect` 
(`cid`, `sid`) 
VALUES 
('$cid', '$suspect') 

";
if(mysqli_query($conn, $sql)){
    echo "1";	
} else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

    echo "0";
}
mysqli_close($conn);


?>
