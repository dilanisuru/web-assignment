<?php
include_once "config.php";
$sql = "SELECT * FROM `suspect` ";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sid= $row["sID"];
        $nic= $row["nic"];
        $name= $row["name"];
        echo "<option value='$sid'> $name $nic </option>";
    }
} else {

}
$conn->close();

?>