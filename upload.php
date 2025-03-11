<?php
if (!empty($_FILES['image']['name'])) {
    $folder = "images/doctor/";
    if (!is_dir($folder)) mkdir($folder, 0777, true);
    $file_path = $folder . basename($_FILES["image"]["name"]);
    echo move_uploaded_file($_FILES["image"]["tmp_name"], $file_path) ? $file_path : "error";
}
?>
