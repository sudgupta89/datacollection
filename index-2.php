<?php
include("dbconfig.php");

$sql = "SELECT * FROM data";
$result = mysqli_query($con,$sql);

$sql1 = "SELECT * FROM data";
$result1 = mysqli_query($con,$sql1);

$sql2 = "SELECT * FROM data";
$result2 = mysqli_query($con,$sql2);

$sql3 = "SELECT * FROM data";
$result3 = mysqli_query($con,$sql3);

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Mankind </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <style>
        /* Optional: Style to adjust the width of Select2 */
        .select2-container {
            width: 200px !important;
        }
    </style>
  
 </head>
 <body>
  <div class="">
   
   <h2 align="center" style="background:purple; color:#fff;padding:20px">Doctor Data</h2>
   <br />
   
    <div class="section" style="background:#f5f5f5;padding:20px">
        
        <div class="row">
            
            <div class="col-md-3 col-xs-6">
                <label for="vsoname" class="form-label">VSO Name:</label><br>
                <select id="vsoname" name="vsoname" class="form-control vsoname" >
                    <option value="">Select VSO Name</option>
                    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){?>
                        <option value="<?=$row["dvsoname"]?>"><?=$row["dvsoname"]?></option>
                    <?php } ?>
                </select>
                <br> <br>
            </div>
            <div class="col-md-3 col-xs-6">
                 <label for="vsocode" class="form-label">VSO Code:</label><br>
                <select id="vsocode" name="vsocode" class="form-control vsocode" >
                    <option value="">Select VSO Code</option>
                    <?php while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){?>
                        <option value="<?=$row1["dvsocode"]?>"><?=$row1["dvsocode"]?></option>
                    <?php } ?>
                </select>
                    <br> <br>
            </div>
            <div class="col-md-3 col-xs-6">
                   <label for="vsohq" class="form-label">VSO HQ:</label><br>
                    <select id="vsohq" name="vsohq" class="form-control vsohq" >
                        <option value="">Select VSO HQ</option>
                        <?php while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){?>
                            <option value="<?=$row2["dhq"]?>"><?=$row2["dhq"]?></option>
                        <?php } ?>
                    </select>
                        <br> <br>
            </div>
            <div class="col-md-3 col-xs-6">
                   <label for="vsophone" class="form-label">VSO Phone:</label><br>
                    <select id="vsophone" name="vsophone" class="form-control vsophone" >
                        <option value="">Select VSO Phone</option>
                        <?php while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){?>
                            <option value="<?=$row3["dphone"]?>"><?=$row3["dphone"]?></option>
                        <?php } ?>
                    </select>
                        <br> <br>
            </div>
        </div>
                    

    </div> 
    
    <br><br>
   <div class="table-responsive"  style="background:#f5f5f5;padding:20px" >
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
  
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='dr_name'></td>";
   html_code += "<td contenteditable='true' class='dr_phone'></td>";
   html_code += "<td contenteditable='true' class='dr_designation'></td>";
   html_code += "<td><input type='file' class='dr_photo' accept='image/*' onchange='uploadImage(this)'><img src='' width='50' style='display: none;'></td>";
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
    var dr_name = [];
    var dr_phone = [];
    var dr_designation = [];
    var dr_photo = [];
   
   // Single values (not array)
    var vsoname = $('.vsoname').val(); 
    var vsocode = $('.vsocode').val(); 
    var vsophone = $('.vsophone').val(); 
    var vsohq = $('.vsohq').val(); 



    $('.dr_name').each(function(){ dr_name.push($(this).text()); });
    $('.dr_phone').each(function(){ dr_phone.push($(this).text()); });
    $('.dr_designation').each(function(){ dr_designation.push($(this).text()); });

    $('.dr_photo').each(function(){
        var imageUrl = $(this).attr("data-url"); // Get the image URL from the data-url attribute
        dr_photo.push(imageUrl ? imageUrl : ""); // Store empty string if no image
    });

    $.ajax({
        url: "insert.php",
        method: "POST",
        data: { dr_name: dr_name, dr_phone: dr_phone, dr_designation: dr_designation, dr_photo: dr_photo, vsocode: vsocode, vsoname: vsoname, vsohq: vsohq, vsophone: vsophone  },
        success: function(data){
            alert(data);
            location.reload();
        }
    });
});

 

function uploadImage(input) {
    var file = input.files[0];
    var formData = new FormData();
    formData.append("image", file);

    $.ajax({
        url: "upload.php", // Create this file to handle image uploads
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response !== "error") {
                $(input).next("img").attr("src", response).show();
                $(input).attr("data-url", response); // Store the image URL in the input
            } else {
                alert("Image upload failed. Try again.");
            }
        }
    });
}


        $(document).ready(function () {
            // Initialize Select2 for searchable dropdown
            $("#vsoname").select2({
                placeholder: "Select an VSO NAME",
                allowClear: true
            });
        });
        
        
           $(document).ready(function () {
            // Initialize Select2 for searchable dropdown
            $("#vsocode").select2({
                placeholder: "Select an VSO CODE",
                allowClear: true
            });
        });
        
           $(document).ready(function () {
            // Initialize Select2 for searchable dropdown
            $("#vsohq").select2({
                placeholder: "Select an HQ",
                allowClear: true
            });
        });
        
           $(document).ready(function () {
            // Initialize Select2 for searchable dropdown
            $("#vsophone").select2({
                placeholder: "Select an VSO PHONE",
                allowClear: true
            });
        });


</script>