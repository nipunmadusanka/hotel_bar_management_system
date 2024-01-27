<?php
include "db_config.php";


$sql2 = "SELECT * FROM admin where id='1' ";
$result2 = mysqli_query($conn, $sql2); 

foreach ($result2 as $row) {
   // $Company_name = $row['business_name'];
    $name = $row['name'];
    $profile = $row['profile'];
    $brandColor = $row['brandColor'];
}


?>