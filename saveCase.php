<?php
include 'config.php';
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 	$oDate= $_POST['oDate'];
    $id= $_POST['cid'];
    $type= $_POST['type'];
    $description= $_POST['des'];
    $caseProcess= $_POST['caseProcess'];
    $ineStDate= $_POST['ineStDate'];
    $suspect= $_POST['suspect'];
    $officer= $_POST['officer'];

$sql = 
"INSERT INTO `case` 
(`id`, `oDate`,`caseType`, `description`, `caseProcess`, `ineStDate`, `suspect` ,`officer`) 
VALUES 
($id, '$oDate', '$type', '$description', '$caseProcess', '$ineStDate', '$suspect', '$officer') 
ON DUPLICATE KEY UPDATE 
`oDate`='$oDate', 
`caseType`='$type',
`description`='$description', 
`caseProcess`='$caseProcess', 
`ineStDate`='$ineStDate',
`suspect`='$suspect',
`officer`='$officer'


";
echo $sql;
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);


$target_dir = "uploads/case/";
$target_file = $target_dir . $id.".rar";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["dp"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["dp"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" && $imageFileType != "rar" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["dp"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["dp"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




header("Location: ../case.html"); /* Redirect browser */
exit();

?>
