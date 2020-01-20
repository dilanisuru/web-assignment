<?php

include 'config.php';

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$sid= $_POST['sid'];
    
	
$sql = 
"DELETE FROM `suspect` WHERE `suspect`.`sID` = $sid

";
if(mysqli_query($conn, $sql)){
    echo "Suspect Deleted successfully.";	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
//header("Location: ../officer.html"); /* Redirect browser */
// exit();

?>
