<?php
include 'config.php';
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$name= $_POST['name'];
    $uname= $_POST['uname'];
    $pass= $_POST['pw'];
    

$sql = 
"INSERT INTO `user` 
(`id`, `name`, `uname`, `pass`) 
VALUES 
('AUTO_INCREMENT', '$name', '$uname', '$pass') 

";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);


header("Location: ../users.html"); /* Redirect browser */
exit();

?>
