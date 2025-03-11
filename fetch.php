<?php
include("dbconfig.php");


    $query = "SELECT drphoto FROM `datacollection` order by dcid desc limit 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['drphoto']) {
       // header("Content-type: image/jpeg");
     //   echo $row['drphoto'];
        echo "<img src=".$row['drphoto']." width='100'>";
    } else {
        echo "No Image Available";
    }


?>
