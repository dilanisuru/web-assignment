<?php

include 'config.php';

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$oid= $_POST['dOid'];
    
	
$sql = 
"DELETE FROM `officer` WHERE `officer`.`oID` = $oid

";
if(mysqli_query($conn, $sql)){
    echo "Records Deleted successfully. $oid";	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: ../officer.html"); /* Redirect browser */
 exit();

?>
