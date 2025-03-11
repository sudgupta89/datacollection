<?php
include("dbconfig.php");

$a=$_GET['q'];
// Perform query
$sql = "SELECT * FROM datastore where link='$a'";
$result = mysqli_query($con,$sql);


$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$photo1 = $row["mrphoto1"];
$photo2 = $row["mrphoto2"];
$photo3 = $row["mrphoto3"];
$photo4 = $row["mrphoto4"];
$photo5 = $row["mrphoto5"];
$photo6 = $row["mrphoto6"];

  $mrname1 = $row["mrname1"];
  $mrname2 = $row["mrname2"];
  $mrname3 = $row["mrname3"];
  $mrname4 = $row["mrname4"];
  $mrname5 = $row["mrname5"];
  $mrname6 = $row["mrname6"];
  
  
  $mrdiffentiator1 = $row["mrdiffentiator1"];
  $mrdiffentiator2 = $row["mrdiffentiator2"];
  $mrdiffentiator3 = $row["mrdiffentiator3"];
  $mrdiffentiator4 = $row["mrdiffentiator4"];
  $mrdiffentiator5 = $row["mrdiffentiator5"];
  $mrdiffentiator6 = $row["mrdiffentiator6"];
  
  
?>
<!DOCTYPE html>
<html>
	<head>
		
		 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html-to-image/1.11.11/html-to-image.min.js" integrity="sha512-7tWCgq9tTYS/QkGVyKrtLpqAoMV9XIUxoou+sPUypsaZx56cYR/qio84fPK9EvJJtKvJEwt7vkn6je5UVzGevw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
		
		<style>
			p{
			  line-height:0.5em;
			}

		.image_area {
		  position: relative;
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

	

		.modal-lg{
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #000;
		  font-size:22px;
		  text-transform: capitalize;
		  text-align: center;
		}
		
		.text11 {
		  color: #000;
		  font-size:14px;
		  text-transform: capitalize;
		  text-align: center;
		  line-height:1.1;
		}
		
			.text12 {
            		color: #fff;
                font-size: 7px;
                text-transform: capitalize;
                text-align: center;
                line-height: 1.1;
		}
		
		
.parent{
  position: relative;
  width:100%;
}
.parent img {
    width:100%;
}
.child{
     position: absolute;
    top: 31%;
    left: 6%;
    transform: translate(0%, -38%);
    z-index: -1;
    width: 89%;
}

.child img {
    border-top-left-radius: 85px;
    border-top-right-radius: 85px;
}
			
.textchild1{
   position: absolute;
    top: 71%;
      right: 0px;
    /* transform: translate(50%, 50%); */
    color: #000;
    width: 100%;
    font-weight: bold;
    text-align: center;
}

.textchild2{
   position: absolute;
    top: 76%;
      right: 0px;
    /* transform: translate(50%, 50%); */
    color: #000;
    width: 100%;
    font-weight: bold;
    text-align: center;
}

.textchild3{
    position: absolute;
    top: 65%;
    right: 58px;
    /* transform: translate(50%, 50%); */
    color: #000;
    width: 20%;
    font-weight: bold;
    text-align: center;
}

@media only screen and (max-width: 981px) and (min-width: 701px){
  .text {
		  color: #000;
		  font-size:24px;
		  
		  text-align: center;
		}
	.text11 {
		  color: #000;
		  font-size:24px;
		  text-align: center;
	    font-weight:700;
	     line-height:1;
		}	
	
       
    .child {
            position: absolute;
            top: 29.8%;
            left: 7%;
            transform: translate(0%, -38%);
            z-index: -1;
            width: 86%;
    } 
    
    .child img {
            border-top-left-radius: 185px;
            border-top-right-radius: 185px;
        }
     
}

@media only screen and (max-width: 700px) and (min-width: 501px){
  .text {
		  color: #000;
		  font-size:42px;
		  
		  text-align: center;
		}
	.text11 {
		  color: #000;
		  font-size:28px;
		  text-align: center;
	    font-weight:700;
	     line-height:1;
		}
		
			.text12 {
            		color: #fff;
                font-size: 14px;
                text-transform: capitalize;
                text-align: center;
                line-height: 1.1;
                        word-wrap: break-word;
		}
		
		
	.col-xs-12{
    padding-right:0px;
    padding-left:0px;
     }	
     
  
    .child {
            position: absolute;
            top: 29.8%;
            left: 7%;
            transform: translate(0%, -38%);
            z-index: -1;
            width: 86%;
    } 
    
    .child img {
            border-top-left-radius: 180px;
            border-top-right-radius: 180px;
        }
        
     .textchild3{      
   position: absolute;
    top: 65%;
    right: 115px;
    /* transform: translate(50%, 50%); */
    color: #000;
    width: 19%;
    font-weight: bold;
    text-align: center;
     
  }	    
     
     
}

@media only screen and (max-width: 490px) and (min-width: 300px){
 .text {
		  color: #000;
		  font-size:28px;
		  
		  text-align: center;
		}
	.text11 {
		  color: #000;
		  font-size:20px;
		  text-align: center;
	    font-weight:700;
	     line-height:1;
		}	
		
			.text12 {
            		color: #fff;
                font-size: 10px;
                text-transform: capitalize;
                text-align: center;
                line-height: 1.1;
                        word-wrap: break-word;
		}
		
	.col-xs-12{
    padding-right:0px;
    padding-left:0px;
     }	
     
     
     
    .child {
            position: absolute;
            top: 29.8%;
            left: 7%;
            transform: translate(0%, -38%);
            z-index: -1;
            width: 86%;
    } 
    
    .child img {
            border-top-left-radius: 125px;
            border-top-right-radius: 125px;
        }
        
  .textchild3{      
   position: absolute;
    top: 65%;
    right: 85px;
    /* transform: translate(50%, 50%); */
    color: #000;
    width: 19%;
    font-weight: bold;
    text-align: center;
     
  }	

}

  </style>
 <script type="text/javascript">

        function downloadimage1() {
              var node = document.getElementById('htmltoimage1'); 
              htmlToImage.toPng(node,{ quality: 1, dpi:300})
                  .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                  var img2 = document.body.appendChild(img);
                	
                	
                	 var link = document.createElement('a');
                    link.download = 'my-image-name1.jpg';
                    link.href = img2.src;
                    link.click();
                //	 download(dataUrl, 'my-node.png');
                  })
                  .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                  });
        }
        
        
          function downloadimage2() {
              var node = document.getElementById('htmltoimage2'); 
              htmlToImage.toPng(node,{ quality: 1, dpi:300})
                  .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                  var img2 = document.body.appendChild(img);
                	
                	
                	 var link = document.createElement('a');
                    link.download = 'my-image-name2.jpg';
                    link.href = img2.src;
                    link.click();
                //	 download(dataUrl, 'my-node.png');
                  })
                  .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                  });
        }
        
        
          function downloadimage3() {
              var node = document.getElementById('htmltoimage3'); 
              htmlToImage.toPng(node,{ quality: 1, dpi:300})
                  .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                  var img2 = document.body.appendChild(img);
                	
                	
                	 var link = document.createElement('a');
                    link.download = 'my-image-name3.jpg';
                    link.href = img2.src;
                    link.click();
                //	 download(dataUrl, 'my-node.png');
                  })
                  .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                  });
        }
        
        
          function downloadimage4() {
              var node = document.getElementById('htmltoimage4'); 
              htmlToImage.toPng(node,{ quality: 1, dpi:300})
                  .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                  var img2 = document.body.appendChild(img);
                	
                	
                	 var link = document.createElement('a');
                    link.download = 'my-image-name4.jpg';
                    link.href = img2.src;
                    link.click();
                //	 download(dataUrl, 'my-node.png');
                  })
                  .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                  });
        }
        
        
          function downloadimage5() {
              var node = document.getElementById('htmltoimage5'); 
              htmlToImage.toPng(node,{ quality: 1, dpi:300})
                  .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                  var img2 = document.body.appendChild(img);
                	
                	
                	 var link = document.createElement('a');
                    link.download = 'my-image-name5.jpg';
                    link.href = img2.src;
                    link.click();
                //	 download(dataUrl, 'my-node.png');
                  })
                  .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                  });
        }
        
        
          function downloadimage6() {
              var node = document.getElementById('htmltoimage6'); 
              htmlToImage.toPng(node,{ quality: 1, dpi:300})
                  .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                  var img2 = document.body.appendChild(img);
                	
                	
                	 var link = document.createElement('a');
                    link.download = 'my-image-name6.jpg';
                    link.href = img2.src;
                    link.click();
                //	 download(dataUrl, 'my-node.png');
                  })
                  .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                  });
        }
        
        

    </script>
	</head>
	<body>
		<div class="container" align="center">
		
			<div class="row">
			
				<div class="col-md-3 col-sm-3 col-xs-12"  style="padding:0px">
					
						<div class="parent" id="htmltoimage1">
						    <img src='images/frame/Oval_Frame.png' class="img-responsive" ></img>
					            <div class="child">
					           	       <img src="<?php echo $photo1;?>" class="img-responsive" />
						    	</div>
					        
					            <div class="textchild1">
					                 <p class="text"><?php echo $mrname1; ?></p>
						    	</div>
						      <div class="textchild2">
					                 <p class="text11">2M Discovery Mankind</p>
						    	</div>
						        <div class="textchild3">
					                 <p class="text12"><?php echo $mrdiffentiator1; ?></p>
						    	</div>
						</div>
						 <button onclick="downloadimage1()" class="clickbtn" style="width:200px;height:50px;background-color:#000;color:#fff;padding:10px;margin-top:50px">Download</button>
			    </div>
			    
			    
			    <div class="col-md-3 col-sm-3 col-xs-12"  style="padding:0px">
					
						<div class="parent" id="htmltoimage2">
						   <img src='images/frame/Oval_Frame.png' class="img-responsive" ></img>
					            <div class="child">
					           	       <img src="<?php echo $photo2;?>" class="img-responsive" />
						    	</div>
					        
					            <div class="textchild1">
					                 <p class="text"><?php echo $mrname2; ?></p>
						    	</div>
						      <div class="textchild2">
					                 <p class="text11">2M Discovery Mankind</p>
						    	</div>
						        <div class="textchild3">
					                 <p class="text12"><?php echo $mrdiffentiator2; ?></p>
						    	</div>
						</div>
						 <button onclick="downloadimage2()" class="clickbtn" style="width:200px;height:50px;background-color:#000;color:#fff;padding:10px;margin-top:50px">Download</button>
			    </div>
			    
			    
			    <div class="col-md-3 col-sm-3 col-xs-12"  style="padding:0px">
					
						<div class="parent" id="htmltoimage3">
						    <img src='images/frame/Oval_Frame.png' class="img-responsive" ></img>
					            <div class="child">
					           	       <img src="<?php echo $photo3;?>" class="img-responsive" />
						    	</div>
					        
					            <div class="textchild1">
					                 <p class="text"><?php echo $mrname3; ?></p>
						    	</div>
						    	  <div class="textchild2">
					                 <p class="text11">2M Discovery Mankind</p>
						    	</div>
						        <div class="textchild3">
					                 <p class="text12"><?php echo $mrdiffentiator3; ?></p>
						    	</div>
						</div>
						 <button onclick="downloadimage3()" class="clickbtn" style="width:200px;height:50px;background-color:#000;color:#fff;padding:10px;margin-top:50px">Download</button>
			    </div>
			    
			    
			    <div class="col-md-3 col-sm-3 col-xs-12"  style="padding:0px">
					
						<div class="parent" id="htmltoimage4">
						     <img src='images/frame/Oval_Frame.png' class="img-responsive" ></img>
					            <div class="child">
					           	       <img src="<?php echo $photo4;?>" class="img-responsive" />
						    	</div>
					        
					            <div class="textchild1">
					                 <p class="text"><?php echo $mrname4; ?></p>
						    	</div>
						      <div class="textchild2">
					                 <p class="text11">2M Discovery Mankind</p>
						    	</div>
						        <div class="textchild3">
					                 <p class="text12"><?php echo $mrdiffentiator4; ?></p>
						    	</div>
						</div>
						 <button onclick="downloadimage4()" class="clickbtn" style="width:200px;height:50px;background-color:#000;color:#fff;padding:10px;margin-top:50px">Download</button>
			    </div>
			    
			    
			    <div class="col-md-3 col-sm-3 col-xs-12"  style="padding:0px">
					
						<div class="parent" id="htmltoimage5">
						    <img src='images/frame/Oval_Frame.png' class="img-responsive" ></img>
					            <div class="child">
					           	       <img src="<?php echo $photo5;?>" class="img-responsive" />
						    	</div>
					        
					            <div class="textchild1">
					                 <p class="text"><?php echo $mrname5; ?></p>
						    	</div>
						      <div class="textchild2">
					                 <p class="text11">2M Discovery Mankind</p>
						    	</div>
						        <div class="textchild3">
					                 <p class="text12"><?php echo $mrdiffentiator5; ?></p>
						    	</div>
						</div>
						 <button onclick="downloadimage5()" class="clickbtn" style="width:200px;height:50px;background-color:#000;color:#fff;padding:10px;margin-top:50px">Download</button>
			    </div>
			    
			    
			    <div class="col-md-3 col-sm-3 col-xs-12"  style="padding:0px">
					
						<div class="parent" id="htmltoimage6">
						     <img src='images/frame/Oval_Frame.png' class="img-responsive" ></img>
					            <div class="child">
					           	       <img src="<?php echo $photo6;?>" class="img-responsive" />
						    	</div>
					        
					            <div class="textchild1">
					                 <p class="text"><?php echo $mrname6; ?></p>
						    	</div>
						    	   <div class="textchild2">
					                 <p class="text11">2M Discovery Mankind</p>
						    	</div>
						        <div class="textchild3">
					                 <p class="text12"><?php echo $mrdiffentiator6; ?></p>
						    	</div>
						</div>
						 <button onclick="downloadimage6()" class="clickbtn" style="width:200px;height:50px;background-color:#000;color:#fff;padding:10px;margin-top:50px">Download</button>
			    </div>
			    
			   
			    
		    </div>
		</div>


	</body>
</html>



