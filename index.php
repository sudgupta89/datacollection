<?php
include("dbconfig.php");

// Fetch all data once
$sql = "SELECT * FROM data";
$result = mysqli_query($con, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mankind</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <style>
        .select2-container { width: 200px !important; }
    </style>
</head>
<body>
    <h2 align="center" style="background:purple; color:#fff; padding:20px">Doctor Data</h2>
    
    <div class="section" style="background:#f5f5f5; padding:20px">
        <div class="row">
            <?php
            $fields = ["dvsoname" => "VSO Name", "dvsocode" => "VSO Code", "dhq" => "VSO HQ", "dphone" => "VSO Phone"];
            foreach ($fields as $key => $label) {
            ?>
                <div class="col-md-3 col-xs-6">
                    <label for="<?= $key ?>" class="form-label"><?= $label ?>:</label><br>
                    <select id="<?= $key ?>" name="<?= $key ?>" class="form-control select2">
                        <option value="">Select <?= $label ?></option>
                        <?php foreach ($data as $row) { ?>
                            <option value="<?= $row[$key] ?>"><?= $row[$key] ?></option>
                        <?php } ?>
                    </select><br><br>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="table-responsive" style="background:#f5f5f5; padding:20px">
        <table class="table table-bordered" id="crud_table">
            <tr>
                <th width="30%">Dr Name</th>
                <th width="10%">Dr Phone</th>
                <th width="45%">Dr Designation</th>
                <th width="10%">Dr Photo</th>
                <th width="5%"></th>
            </tr>
            <tr>
                <td contenteditable="true" class="dr_name"></td>
                <td contenteditable="true" class="dr_phone"></td>
                <td contenteditable="true" class="dr_designation"></td>
                <td>
                    <input type="file" class="dr_photo" accept="image/*" onchange="uploadImage(this)">
                    <img src="" width="50" style="display: none;">
                </td>
                <td></td>
            </tr>
        </table>
        <div align="right">
            <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
        </div>
        <div align="center">
            <button type="button" name="save" id="save" class="btn btn-info">Save</button>
        </div>
        <br />
        <div id="inserted_item_data"></div>
    </div>

    <script>
        $(document).ready(function(){
            $(".select2").select2();
            var count = 1;

            $('#add').click(function(){
                count++;
                var html_code = `<tr id="row${count}">
                    <td contenteditable="true" class="dr_name"></td>
                    <td contenteditable="true" class="dr_phone"></td>
                    <td contenteditable="true" class="dr_designation"></td>
                    <td><input type="file" class="dr_photo" accept="image/*" onchange="uploadImage(this)"><img src="" width="50" style="display: none;"></td>
                    <td><button type="button" name="remove" data-row="row${count}" class="btn btn-danger btn-xs remove">-</button></td>
                </tr>`;
                $('#crud_table').append(html_code);
            });

            $(document).on('click', '.remove', function(){
                $('#' + $(this).data("row")).remove();
            });

            $('#save').click(function(){
                var dr_name = [], dr_phone = [], dr_designation = [], dr_photo = [];

                $('.dr_name').each(function(){ dr_name.push($(this).text()); });
                $('.dr_phone').each(function(){ dr_phone.push($(this).text()); });
                $('.dr_designation').each(function(){ dr_designation.push($(this).text()); });

                $('.dr_photo').each(function(){
                    dr_photo.push($(this).attr("data-url") || "");
                });

                $.post("insert.php", {
                    dr_name, dr_phone, dr_designation, dr_photo,
                    vsocode: $('#dvsocode').val(),
                    vsoname: $('#dvsoname').val(),
                    vsohq: $('#dhq').val(),
                    vsophone: $('#dphone').val()
                }, function(data){
                    alert(data);
                    location.reload();
                });
            });
        });

        function uploadImage(input) {
            var formData = new FormData();
            formData.append("image", input.files[0]);

            $.ajax({
                url: "upload.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response !== "error") {
                        $(input).next("img").attr("src", response).show();
                        $(input).attr("data-url", response);
                    } else {
                        alert("Image upload failed.");
                    }
                }
            });
        }
    </script>
</body>
</html>
