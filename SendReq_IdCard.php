<?php
session_start();
if ($_SESSION['user']) {
    
} else {
    header("location:index.php");
}
$user = $_SESSION['user'];
 
?>


<?php include('studentheader.php');?>

	<!-- banner -->
	<div class="w3ls-banner-1">
	</div>	
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="studentProfile.php">Home</a><span>/</span></li>
					<li><i class="fa fa-user" aria-hidden="true"></i>Student Dashboard <span>/</span> Request Id Card</li>
				</ul>
			</div>
			
			<div class="w3layouts_breadcrumbs_right">
				<ul>
					<li style="list-style:none;"><h3>Welcome <span style="color:#eb5425;">"<?php echo $user;?>"</span></h3></li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->

<?php
				include("config.php");
				$sql = "SELECT Req_id FROM  request_idcard ORDER BY Req_id DESC LIMIT 1";
				$sql1 = "SELECT * FROM request_idcard INNER JOIN student_reg ON request_idcard.stu_email = student_reg.email";
				$ww = mysqli_query($connection,$sql);
				if(mysqli_num_rows($ww) > 0){
					while($row = mysqli_fetch_array($ww)){
						$newusn = $row["Req_id"]+1;
					}
				}

				else{
					$newusn = 1;
				}

		?>
		
		<?php 
				include("config.php");
					$que = mysqli_query($connection, "select * from student_reg where student_reg.email = '$user'");
					while($row1 = mysqli_fetch_array($que,MYSQL_ASSOC)):
											
				?>
    <?php
    include('config.php');
					
    if (isset($_POST['submit'])) {
						                        
  					
					 $stu_email = $_POST['stu_email'];
                        $stu_uniqueidfk = $_POST['stu_uniqueidfk'];
                        $Req_idcard = $_POST['Req_idcard'];
                        $stu_year = $_POST['stu_year'];
                        
						date_default_timezone_set('Asia/Kolkata');
                        $Req_date = date('Y-m-d H:i:s');
					     $bool = true;
						
						
	 //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);
	//count
	//$fileCount=1;
	 //$fileCount++;
	
	//End count
    //$filename = $PNG_TEMP_DIR.'456.png';
    $filename = $newusn.'.png';
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    if (trim($_REQUEST['data']) == '')
    die('data cannot be empty! <a href="?">back</a>');
            
    //$filename = $PNG_TEMP_DIR.'456'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    $filename = $PNG_TEMP_DIR.'$newusn'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
   
    echo QRcode::png($row1['name'], $filename,$errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
	 
    //display generated file
    echo '<img style="display:none;" src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
						
	 					
						
						
						
	$querychk = mysqli_query($connection, "Select * from request_idcard");
    while ($row = mysqli_fetch_array($querychk)) {
    $table_reg = $row['stu_uniqueidfk'];
    if ($stu_uniqueidfk == $table_reg) {
    $bool = false;
    Print '<script>alert("'. $row['stu_uniqueidfk'] .' has already requested for Id Card...");</script> ';
    Print '<script>window.location.assign("SendReq_IdCard.php");</script>';
    }
                }
				if ($bool) {
				mysqli_query($connection, "insert into request_idcard(stu_email,stu_uniqueidfk,Req_idcard,stu_year,Req_date,filename) 
				values ('$stu_email','$stu_uniqueidfk','$Req_idcard','$stu_year','$Req_date','$filename')");
                Print '<script>alert("Successfully Request Sent to admin!...");</script>';
                Print '<script>window.location.assign("SendReq_IdCard.php");</script>';			
			}
					}							
			?>	
		<?php endwhile;?>
<!-- about -->



	<div class="welcome">
		  <div class="container">
		 
			  <div class="col-md-6">
			  <h3 style="color:#607d8b;font-weight:900;">Request ID Card</h3>&nbsp;
			  
			  <form action="SendReq_IdCard.php"  method="post">
			  <div class="form-group">
			  <label>Student Id</label>
				<?php
                     include("config.php");
									
                       $query = mysqli_query($connection, "select *from student_reg where student_reg.email='$user'");
					   while ($row = mysqli_fetch_array($query)) {
						 print '<input type="text" class="form-control hidden-md hidden-lg" value='. $row['email'] .' name="stu_email">';  
						 print '<input type="text" class="form-control hidden-md hidden-lg" value='. $row['year'] .' name="stu_year">';  
						
						 print '<input type="text" class="form-control" value='. $row['stu_uniqueid'] .' name="stu_uniqueidfk" readonly>';  
					   
					   }
                  ?>                 
					
				</div>
			       			  
				<div class="form-group">
				
				  <label>Request for Id Card</label>
				  <textarea rows="2" cols="2" class="form-control" name="Req_idcard" placeholder="Message" required></textarea>
				</div>

				<div class="form-group">
				   <button type="submit" class="btn btn-primary" name="submit" Value="GENERATE">Send</button>
				</div>				
						
				</form>
			  </div>
			  
			  <div class="col-md-6">
			       <h3 style="color:#607d8b;font-weight:900;">View Request ID Card</h3>&nbsp;
				   <table class="table table-bordered table-hover table-striped">

                            <thead style="background:rgba(22, 160, 133, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Student Id</th>
                            <th class="idwcol">Req Id Card</th>
                            <th class="idwcol">Req Date</th>
														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
										
								$slno = 1;
                                $query = mysqli_query($connection, "SELECT * from request_idcard where request_idcard.stu_email='$user'");
                                while ($row = mysqli_fetch_array($query)) {

                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									
                                    print '<td>' . $row['stu_uniqueidfk'] . '</td>';
                                    
									print '<td>' . $row['Req_idcard'] . '</td>';
                                    
									print '<td>' . $row['Req_date'] . '</td>';
									
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
			  </div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->

		
	<?php include('footer.php');?>