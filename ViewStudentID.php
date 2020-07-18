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
					<li><i class="fa fa-user" aria-hidden="true"></i>Student Dashboard / View Created ID Card</li>
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
<!-- about -->
	<div class="welcome">
		  <div class="container">
		  <div class="row">
			
			  <!--View Student Request-->
			<div class="col-md-12">
				<h2>View Id Card</h2>&nbsp;
				
				 <table class="table table-bordered table-hover table-striped">

                            <thead style="background:rgba(22, 160, 133, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Student Id</th>
                            <th class="idwcol">Name</th>
                            <th class="idwcol">Year</th>
                            <th class="idwcol">Action</th>
														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
										
								$slno = 1;
                                $query = mysqli_query($connection, "SELECT * FROM request_idcard INNER JOIN design_patterns INNER JOIN student_reg ON request_idcard.stu_year = design_patterns.desg_yearwise AND request_idcard.stu_email = student_reg.email WHERE request_idcard.stu_email = '$user' ");
								
                                while ($row = mysqli_fetch_array($query)) {
																		
                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									
                                    print '<td>' . $row['stu_uniqueidfk'] . '</td>';
                                    print '<td>' . $row['name'] . '</td>';
									
                                    print '<td>' . $row['stu_year'] . ' year</td>';
                                    																																				
									print '<td><a href="idcard.php?id=' . $row['Req_id'] . '" class="btn btn-warning" target="_blank">View</a></td>'; 
																											
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
						             
			</div>
			
			 <!--View Student Request-->
					
							
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>
	</div>
<!-- //about -->

		
	<?php include('footer.php');?>
	
	