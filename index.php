<!-- Database Connection-->

<?php

	include('db.php');

	$product_present = 0;
	if(isset($_GET['product'])){
		$product = 	mysqli_real_escape_string($GLOBALS["con"],$_GET['product']);
		$p = mysqli_query($GLOBALS["con"],"select * from products where link = '$product'");
		if(mysqli_num_rows($p)>0){ 
			$product_present = 1;
			$p = mysqli_fetch_assoc($p);
		}

	}


	function getProduct($data) {
		$product = 	mysqli_real_escape_string($GLOBALS["con"],$data);
		$product_id = $product;
		$p = mysqli_query($GLOBALS["con"],"select * from products where link = '$product'");
		if(mysqli_num_rows($p)==0)
			return null;
		else 
			return mysqli_fetch_assoc($p);
	}

?>

<html>
  <head>  

 <!-- Meta Tags with added information for databse-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Content-Language" content="en">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  if($product_present == 1){
  	?>
  	<meta name="keywords" content="<?php echo $p['Tags'];?>">
  	<meta name="description" content="<?php echo $p['Description'];?>">
  	<meta name="author" content="<?php echo $p['Creator'];?>">
  	<?php
  }
  ?>

   
   <title>Intelligent Identification Toolkit for 3D Printing</title>
   	 <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	 	 <script src="./scripts/html5-qrcode.min.js"></script>
	 	 <script>






			$(document).ready(function(){

				$('#reader').html5_qrcode(function(data){
						var trimmedData = data.substr(17)

						console.log(trimmedData);
						$('#read').html(trimmedData);


				        $("#refresh").load('data.php?product='+trimmedData);



					},
					function(error){
						$('#read_error').html(error);
					}, function(videoError){
						$('#vid_error').html(videoError);
					}
				);
			});

	 	 </script>
	 <!-- Latest compiled and minified CSS -->
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	 <link rel="stylesheet" href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css">
	 <style type="text/css">
	 img{
	 	max-height: 200px;
	 }
	 .btn-primary {
	color: #ffffff;
	background-color: #ee8226;
	border-color: #aeaeae;
	}


	.container .text-muted {
	  margin: 20px 0;
	}

	.container {
		width: 80% !important;
	}


	 </style>
  </head>


   <!-- BODY -->
	<body>
		<div class="container">
			<div class="row">
					<h1><img src="./img/logo.png" style="margin-right: 15px;">Intelligent Identification Toolkit for 3D Printing</h1>
			</div>
      


	<div class="row">
        <div class="text-left" style="width:630px; float:left;">
            <h2>Scan QR Code</h2>
            <div class="panel panel-default">
                <div class="panel-body">	
					 <div id="reader" style="width:600px;height:450px"></div>
					 <!--<div id="reader" style="width:300px;height:250px"></div>-->
		 			 </div>
            </div>
            <h2 class="text-center"><span id="read">Scanning...</span></h2>
        </div>

        <div class="text-left" style="margin-left: 660px; padding-right: 0px;">
            <h2>Result</h2>
            <div class="panel panel-default">
                <div class="panel-body" style="padding-bottom: 0px;;">

                    <div class="table">
                      
                      <div id="refresh">
                      </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

	  