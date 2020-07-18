<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    

    <!-- Bootstrap -->
  
		<link rel="stylesheet" href="css/bootstrap.min.css" media="all">

<style>
body {
			background-color: #d7d6d3 !important;
			font-family:'verdana' !important;
		}
		.id-card-holder {
			width: 250px !important;
			padding: 4px !important;
		    margin: 0 auto !important;
		    background-color: #1f1f1f !important;
		    border-radius: 5px !important;
		    position: relative !important;
		}
		.id-card-holder:after {
		    content: '';
		    width: 7px !important;
		    display: block !important;
		    background-color: #0a0a0a !important;
		    height: 100px !important;
		    position: absolute !important;
		    top: 200px !important;
		    border-radius: 0 5px 5px 0 !important;
		}
		.id-card-holder:before {
		    content: '';
		    width: 7px !important;
		    display: block !important;
		    background-color: #0a0a0a !important;
		    height: 100px !important;
		    position: absolute !important;
		    top: 200px !important;
		    left: 250px !important;
		    border-radius: 0 5px 5px 0 !important;
		    <!-- border-radius: 5px 0 0 5px; -->
		}
		.id-card {
			
			background-color: #fff !important;
			padding: 10px !important;
			border-radius: 10px !important;
			text-align: center !important;
			box-shadow: 0 0 1.5px 0px #b9b9b9 !important;
		}
		.id-card img {
			margin: 0 auto !important;
		}
		.header img {
			width: 100px !important;
    		margin-top: 15px !important;
		}
		.photo img {
			width: 80px !important;
    		margin-top: 15px !important;
		}
		h2 {
			font-size: 15px !important;
			margin: 5px 0 !important;
		}
		h3 {
			font-size: 12px !important;
			margin: 2.5px 0 !important;
			font-weight: 300 !important;
		}
		.qr-code img {
			width: 50px;
		}
		p {
			font-size: 5px !important;
			margin: 2px !important;
		}
		.id-card-hook {
			background-color: #000 !important;
		    width: 70px !important;
		    margin: 0 auto !important;
		    height: 15px !important;
		    border-radius: 5px 5px 0 0 !important;
		}
		.id-card-hook:after {
			content: '';
		    background-color: #d7d6d3 !important;
		    width: 47px !important;
		    height: 6px !important;
		    display: block !important;
		    margin: 0px auto !important;
		    position: relative !important;
		    top: 6px !important;
		    border-radius: 4px !important;
		}
		.id-card-tag-strip {
			width: 45px !important;
		    height: 40px !important;
		    background-color: #607d8b !important;
		    margin: 0 auto !important;
		    border-radius: 5px !important;
		    position: relative !important;
		    top: 9px !important;
		    z-index: 1 !important;
		    border: 1px solid #607d8b !important;
		}
		.id-card-tag-strip:after {
			content: '';
		    display: block !important;
		    width: 100% !important;
		    height: 1px !important;
		    background-color: #c1c1c1 !important;
		    position: relative !important;
		    top: 10px !important;
		}
		.id-card-tag {
			width: 0 !important;
			height: 0 !important;
			border-left: 100px solid transparent !important;
			border-right: 100px solid transparent !important;
			border-top: 100px solid #607d8b !important;
			margin: -10px auto -30px auto !important;
		}
		.id-card-tag:after {
			content: '';
		    display: block;
		    width: 0;
		    height: 0;
		    border-left: 50px solid transparent !important;
		    border-right: 50px solid transparent !important;
		    border-top: 100px solid #d7d6d3 !important;
		    margin: -10px auto -30px auto !important;
		    position: relativ !importante;
		    top: -130px !important;
		    left: -50px !important;
		}
		


* {
    -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
    color-adjust: exact !important;                 /*Firefox*/
}
</style>
    
  </head>
  <body>
    <div class="id-card-tag"></div>
	<div class="id-card-tag-strip"></div>
	<div class="id-card-hook"></div>
	
	 	
		<?php 
					include("config.php");
					$id = $_GET['id']; 
					$query = mysqli_query($connection, "SELECT * FROM request_idcard INNER JOIN student_reg INNER JOIN course_master ON request_idcard.stu_uniqueidfk = student_reg.stu_uniqueid AND student_reg.course = course_master.course_Id WHERE request_idcard.Req_id='$id'");
					$query1 = mysqli_query($connection, "SELECT * FROM request_idcard INNER JOIN design_patterns ON request_idcard.stu_year = design_patterns.desg_yearwise WHERE request_idcard.Req_id='$id'");	
				?>
	<div class="id-card-holder" id="printTable">
	     <?php foreach($query1 as $img):?>
			<div class="id-card" style="background-image:url(images/DesPatterns/<?php echo $img['desg_pattern'];?>) !important;background-repeat:no-repeat !important;">
		 <?php endforeach; ?>
			<div class="header" style="margin-top:-3% !important;">
				
										
				<div class="col-xs-12">
					<img src="images/cpc.png" class="img-responsive">
				</div>
				
				<span style="color:#009688 !important;font-weight:900 !important;">Govt CPC Polytechnic<br/>Mysore</span>
				
			</div>
			<?php
			foreach($query as $row):
			?>
			<div class="photo">
				<img src='uploads/<?php echo $row['image'] ?>' class="img-thumbnail"> 
			</div>
					
			
			<h2 style="color:#22a6b3 !important;font-weight:900 !important;"><?php echo $row['name'];?></h2>&nbsp;
			
				<img style="height:80px;width:80px;" src='<?php echo $row['filename'] ?>' class="img-thumbnail"> 
	       
			
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">ID :</b> <?php echo $row['stu_uniqueid'];?></h6>
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">COURSE :</b> <?php echo $row['Courses'];?></h6>
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">Year :</b> <?php echo $row['year'];?></h6>
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">MOBILE :</b> <?php echo $row['mobile'];?></h6>
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">D.O.B :</b> <?php echo $row['dob'];?></h6>
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">Blood Group :</b> <?php echo $row['blood_group'];?></h6>
			<h6 style="font-weight:900 !important;color:#879688 !important;"><b style="color:#000 !important;">Address :</b> <?php echo $row['address'];?></h6>
			
			<?php endforeach;?>
			<div style="clear:both;"></div>
			<hr>
			
			<div>
				<h6 class="text-right" style="font-weight:900 !important;color:#000 !important;"><i>B Kodandaramu</i></h6>
				<h5 class="text-right" style="font-weight:900 !important;color:#ff0000 !important;"><i>Principal</i></h5>
			</div>

		</div>
	</div>
<div class="container">
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="button" class="btn btn-info" onclick="window.print()">Download</button>
				</div>
			</div>
		</div>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
            $(document).ready(function () {
                				
				$("#print-btn").click(function(){
					if($("#printTable").length > 0){
						printData();
					}
					else{
						alert("No Data To Print");
					}
				});

            });
			
			
			function printData()
			{
			   var divToPrint=document.getElementById("printTable");
			   newWin= window.open("");
			   newWin.document.write(divToPrint.outerHTML);
			   newWin.print();
			   newWin.close();
			}
			
			
        </script>

  </body>
</html>