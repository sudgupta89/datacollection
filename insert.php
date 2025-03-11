<?php
include("dbconfig.php");

if (!empty($_POST["dr_name"])) {
    $vsocode = mysqli_real_escape_string($con, $_POST["vsocode"]);
    $vsoname = mysqli_real_escape_string($con, $_POST["vsoname"]);
    $vsophone = mysqli_real_escape_string($con, $_POST["vsophone"]);
    $vsohq = mysqli_real_escape_string($con, $_POST["vsohq"]);
    $link = rand(10000, 10000000);

    $sql1 = "INSERT INTO list (vsocode, vsoname, vsophone, vsohq, link, date) VALUES ('$vsocode', '$vsoname', '$vsophone', '$vsohq', '$link', NOW())";
    if (mysqli_query($con, $sql1)) {
        $id = mysqli_insert_id($con);

        for ($i = 0; $i < count($_POST["dr_name"]); $i++) {
            $dr_name = mysqli_real_escape_string($con, $_POST["dr_name"][$i]);
            $dr_phone = mysqli_real_escape_string($con, $_POST["dr_phone"][$i]);
            $dr_designation = mysqli_real_escape_string($con, $_POST["dr_designation"][$i]);
            $dr_photo = mysqli_real_escape_string($con, $_POST["dr_photo"][$i]);

            $sql = "INSERT INTO datacollection (id, drname, drphone, drdesignation, drphoto, dcdate) 
                    VALUES ('$id', '$dr_name', '$dr_phone', '$dr_designation', '$dr_photo', NOW())";
            mysqli_query($con, $sql);
        }
        echo "Doctor Data Inserted Successfully!";
    }
}
?>
