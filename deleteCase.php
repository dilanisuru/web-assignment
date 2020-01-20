<?php

include 'config.php';

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$cid= $_POST['cid'];
    
	
$sql = 
"
DELETE FROM `case_officer` WHERE `case_officer`.`cid` = $cid;
";
if(mysqli_query($conn, $sql)){
  
} else{
  
}

//header("Location: ../officer.html"); /* Redirect browser */
 //exit();

 $sql = 
"
DELETE FROM `case_suspeect` WHERE `case_suspeect`.`cid` = $cid;
";
if(mysqli_query($conn, $sql)){
   
} else{
    
}

//header("Location: ../officer.html"); /* Redirect browser */
 //exit();


 $sql = 
"DELETE FROM `case` WHERE `case`.`id` = $cid;
";
if(mysqli_query($conn, $sql)){
    echo "Case Deleted successfully";	
} else{
    echo "ERROR";
}
mysqli_close($conn);
//header("Location: ../officer.html"); /* Redirect browser */
 //exit();


?>
