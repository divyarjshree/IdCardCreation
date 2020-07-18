<?php
session_start();

if ($_SESSION['user']) {
    
} else {
    header("location:index.php");
}
$user = $_SESSION['user'];
?>

<?php include('adminheader.php');?>

	<!-- banner -->
	<div class="w3ls-banner-1">
	</div>	
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-user" aria-hidden="true"></i>Admin Dashboard / Create ID Card</li>
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
			<?php 
			    include("config.php");
				
				  if(isset($_POST['submit'])){
					  					  
					  $desg_yearwise = $_POST['desg_yearwise'];
					  date_default_timezone_set('Asia/Kolkata');
                      $desg_cre_date = date('Y-m-d H:i:s');
					  
					  /* image upload */
						
							if(isset($_FILES['folder'])){
							   
							  $errors= array();
							  $file_name = $_FILES['folder']['name'];
							  $file_size =$_FILES['folder']['size'];
							  $file_tmp =$_FILES['folder']['tmp_name'];
							  $file_type=$_FILES['folder']['type'];
							 
							  $exploded = explode('.',$_FILES['folder']['name']);
							  $file_ext=strtolower(end($exploded));
							  
							  //$new_name= "StudProf_".time().".".$file_ext;		  
							  $er =$_FILES['folder']['error'];
							  print_r($er);	
                         	  
							  if($file_size > 800000000){
								 $errors[]='File size must be excately 10 MB';
								 print_r($errors);
							  }
																  
							  if(empty($errors)==true){
								 move_uploaded_file($file_tmp,"images/DesPatterns/".$file_name);
														  
							  }else{
								 print_r($errors);
							  } 
							  
						   }

						/* image upload */
						
						mysqli_query($connection, "insert into design_patterns(desg_pattern,desg_yearwise,desg_cre_date) values('$file_name','$desg_yearwise','$desg_cre_date')");
					    print '<script>alert("Successfully Added Year Wise Design Patterns....");</script>';
						print '<script>window.location.assign("createID.php");</script>';
				  }
			
			?>
		
			   <?php
				/* 	include("config.php");	
					  if(isset($_POST["update"])){									
							$Req_id = $_POST["update"];
							
							$query1 = mysqli_query($connection, "update request_idcard set Confirm_Req=1 where Req_id='$Req_id'");
								
							
							date_default_timezone_set('Asia/Kolkata');
							$Cre_date = date('Y-m-d H:i:s');							
						} */
					  
				?>
				
				<?php
					include("config.php");	
					  if(isset($_POST["update"]))
					  {									
							$Req_id = $_POST["update"];
							
							$query1 = mysqli_query($connection, "update request_idcard set Confirm_Req=1 where Req_id='$Req_id'");
									
						}
					  
				?>
			
			
			  <!--View Student Request-->
			<div class="col-md-12">
				<h2>View Student Request</h2>&nbsp;
				
				<form action="createID.php" method="post">
				
				 <table id="myTable" class="table table-bordered table-hover table-striped">

                            <thead style="background:rgba(22, 160, 133, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Student Id</th>
                            <th class="idwcol">Year</th>
                            <th class="idwcol">Req Id Card</th>
                            <th class="idwcol">Req Date</th>
                            <th class="idwcol">Action</th>
														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
										
								$slno = 1;
                                $query = mysqli_query($connection, "SELECT * FROM request_idcard INNER JOIN design_patterns ON request_idcard.stu_year = design_patterns.desg_yearwise AND request_idcard.Confirm_Req = 0
								ORDER BY request_idcard.Req_id ASC");
								
                                while ($row = mysqli_fetch_array($query)) {
																		
                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									
                                    print '<td>' . $row['stu_uniqueidfk'] . '</td>';
									
                                    print '<td>' . $row['stu_year'] . '</td>';
                                    
									print '<td>' . $row['Req_idcard'] . '</td>';
                                    
									print '<td>' . $row['Req_date'] . '</td>';
																											
									print '<td><button type="submit" class="btn btn-warning" name="update" value='.$row['Req_id'].' onClick="return idconfirm();">Create</button></td>'; 
									/* print '<td><a href="idcard.php?id=' . $row['Req_id'] . '" target="_blank" class="btn btn-warning" name="update" value='.$row['Req_id'].'>Create</a></td>'; */ 
																											
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
					</form>	             
			</div>
			
			 <!--View Student Request-->
			<div style="clear:both;"></div>
				<hr>
			 
	
			    <!--Add Create Design-->
				<div class="col-md-6">
					<h2>ID Card Design Patterns</h2>&nbsp;        

						<form action="createID.php" method="post" enctype="multipart/form-data">
							<div class="col-md-12">	
														
								<div class="col-md-12">
									<label style="color:#eb5480;">Design Pattern</label><br>
									<input type="file" name="folder" id="desg_pattern">
								</div> 
								 
								<div class="col-md-8" style="margin-top:2%;">
									<label style="color:#eb5480;">Design Pattern YearWise</label>
									
									<select name="desg_yearwise" class="form-control">
										<option>---- Select Year ----</option>
										<option value="1st">1st Year</option>
										<option value="2nd">2nd Year</option>
										<option value="3rd">3rd Year</option>
										
									</select>
								</div> 
								
							</div>	&nbsp;

								<div class="col-md-12">
									<div class="col-md-6">
										<button type="submit" name="submit" class="btn btn-info">Add</button>								
									</div> 						
								</div> 						
						</form>
				</div>
				<!--Add Create Design-->
				
				<!--View Create Design-->
			
			<div class="col-md-6">
			    <h2>View ID Card Design Patterns</h2>&nbsp;
				<form action="createID.php" method="post">
				 <table class="table table-bordered table-hover table-striped">

                            <thead style="background:rgba(22, 160, 133, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Design Pattern</th>
                            <th class="idwcol">Design Pattern Year Wise</th>
                            <th class="idwcol">Design Date</th>
                            <th class="idwcol">Action</th>
														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
								
								if(isset($_POST['delete'])){
									$id = $_POST['delete'];
									mysqli_query($connection, "delete from design_patterns where desg_id='$id'");
								}
										
								$slno = 1;
                                $query = mysqli_query($connection, "SELECT * FROM design_patterns");
								
                                while ($row = mysqli_fetch_array($query)) {
																		
                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									
                                    print "<td> <img src='images/DesPatterns/".$row['desg_pattern']."' width=\"100\" height=\"200\"> </td>";
									
                                    print '<td>' . $row['desg_yearwise'] . '</td>';
                                    
									print '<td>' . $row['desg_cre_date'] . '</td>';
                                    
									print '<td><button type="submit" name="delete" class="btn btn-danger" onClick="return doconfirm();" value='.$row['desg_id'].'>Delete</button></td>';
																											
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
						 </form>		
			</div>
			<!--View Create Design-->
	
			
							
				<div class="clearfix"> </div>
			</div>
			</div>
		</div>
	</div>
<!-- //about -->

		
	<?php include('footer.php');?>
	
	<script>
	function doconfirm()
	{
	    job = confirm("Are you sure want to delete permanently?");
	    if(job != true)
	    {
	        return false;
	    }
	}
	</script>
	
	<script>
	function idconfirm()
	{
	    job = confirm("Are you sure want to Create ID Card");
	    if(job != true)
	    {
	        return false;
	    }
	}
	</script>



	