<?php

ini_set('memory_limit', '500M');
ini_set('post_max_size', '500M');
ini_set('upload_max_filesize', '500M');

?>

<?php include('header.php');?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- banner -->
	<div class="w3ls-banner-1">
	</div>	
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>/</span></li>
					<li><i class="fa fa-users" aria-hidden="true"></i>Student Login</li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- about -->
	<div class="welcome">
		<div class="container">
			<h2 class="agileits-title">Student Registration</h2>
			 <?php
                    include('config.php');
					
                    if (isset($_POST['submit'])) {
						
                        
                        $stu_uniqueid = $_POST['stu_uniqueid'];
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $blood_group = $_POST['blood_group'];
                        $course = $_POST['course'];
                        $dob = $_POST['dob'];
                        $address = $_POST['address'];
                        $year = $_POST['year'];
						
                        date_default_timezone_set('Asia/Kolkata');
                        $created_date = date('Y-m-d H:i:s');
						
						$bool = true;
						
						/* image upload */
						
							if(isset($_FILES['folder'])){
							   
							  $errors= array();
							  $file_name = $_FILES['folder']['name'];
							  $file_size =$_FILES['folder']['size'];
							  $file_tmp =$_FILES['folder']['tmp_name'];
							  $file_type=$_FILES['folder']['type'];
							 
							  $exploded = explode('.',$_FILES['folder']['name']);
							  $file_ext=strtolower(end($exploded));
							  
							  $new_name= "StudProf_".time().".".$file_ext;		  
							  $er =$_FILES['folder']['error'];
							  print_r($er);	
                         	  
							  if($file_size > 800000000){
								 $errors[]='File size must be excately 10 MB';
								 print_r($errors);
							  }
																  
							  if(empty($errors)==true){
								 move_uploaded_file($file_tmp,"uploads/".$new_name);
														  
							  }else{
								 print_r($errors);
							  } 
							  
						   }

						/* image upload */
                        
                        $query = mysqli_query($connection, "Select * from student_reg");
                        while ($row = mysqli_fetch_array($query)) {
                            $table_reg = $row['email'];
                            if ($email == $table_reg) {
                                $bool = false;
                                Print '<script>alert("'. $row['email'] .' has already in our database .. Please try another email");</script> ';
                                Print '<script>window.location.assign("studentReg.php");</script>';
                            }
                        }
						
						if ($bool) {
                            mysqli_query($connection, "insert into student_reg(stu_uniqueid,name,mobile,email,password,blood_group,course,dob,address,created_date,year,image) 
						      values ('$stu_uniqueid','$name','$mobile','$email','$password','$blood_group','$course','$dob','$address','$created_date','$year','$new_name')");
                           
         				      if(mail("$email","Successfully Registered","Dear $name, You are successfully registered...  Your login details are UserName: '$email' and Password is '$password'")){
									echo '<script>alert("After Registration ...Please Check Your mail id.. "");</script>';
								}else{
									echo '<script>alert("Unable to send email. Please try again");</script>';
								}    
							Print '<script>alert("Successfully Registered!...Please Check Your mail id");</script>';
                            Print '<script>window.location.assign("studentReg.php");</script>';
						}
                    }
          ?>
				<div class="col-md-12">
		<?php

				$sql = "SELECT stu_id FROM  student_reg ORDER BY stu_id DESC LIMIT 1";
				$stu_uniqueid = mysqli_query($connection,$sql);
				if(mysqli_num_rows($stu_uniqueid) > 0){
					while($row = mysqli_fetch_array($stu_uniqueid)){
						$newusn = $row["stu_id"]+1;
					}
				}

				else{
					$newusn = 1;
				}

		?>		
									
					<form action="studentReg.php" method="post" enctype="multipart/form-data">
					
					   <div class="col-md-12">
					   
						  <div class="col-md-2"></div>
						  
						  <div class="col-md-4"><label>Student Id</label>
							<input type="text" class="form-control" value="<?php echo "CPC-Polytechnic-2018-".$newusn; ?>" name="stu_uniqueid" readonly>
						  </div>
						  
						   <div class="col-md-1"></div>
						   
						  <div class="col-md-4">
						     <label>Password</label>
								<input type="text" class="form-control" name="password" placeholder="Password" required>
						  </div>
						  
						</div>
						&nbsp;
						<div class="col-md-12">
						  <div class="col-md-2"></div>
						  
						  <div class="col-md-4"><label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
						  </div>
						   <div class="col-md-1"></div>
						  <div class="col-md-4">
						    <label>D.O.B</label>
							<input type="text" class="form-control" name="dob" placeholder="Enter your D.O.B" id="datepicker" required>
						  </div>
						</div> 
						&nbsp;
						<div class="col-md-12" style="margin-top:1%;">
						  <div class="col-md-2"></div>
						  
						  <div class="col-md-4">
							<label>Course</label>
													
							    <select name="course" class="form-control" required="">
											<option>--Select Course--</option>
												<?php 
													include('config.php');
												$sql = mysqli_query($connection, "SELECT course_Id,Courses FROM course_master where isActive=1;");
												while ($row = $sql->fetch_assoc()){
													
													echo "<option value=". $row['course_Id'] .">" . $row['Courses'] . "</option>";
												
												}
											?>		
								</select>
						  </div>
						  
						   <div class="col-md-1"></div>
						   
						  <div class="col-md-4">
						    <label>Year</label>
							<select name="year" class="form-control">
							    <option>---- Select Year ----</option>
							    <option value="1st">1st Year</option>
							    <option value="2nd">2nd Year</option>
							    <option value="3rd">3rd Year</option>
							    
							</select>
						  </div>
						  						  
						</div> 
						&nbsp;
						<div class="col-md-12" style="margin-top:1%;">
						  <div class="col-md-2"></div>
						  
						  <div class="col-md-4">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						  </div>
						  
						   <div class="col-md-1"></div>
						    <div class="col-md-4">
							<label>Blood Group</label>
														
							<select name="blood_group" class="form-control">
							    <option>---- Select Blood Group ----</option>
							    <option value="O positive">O+ve</option>
							    <option value="O negative">O-ve</option>
							    <option value="A negative">A-ve</option>
							    <option value="A positive">A+ve</option>
							    <option value="B negative">B-ve</option>
							    <option value="B positive">B+ve</option>
							    <option value="AB negative">AB-ve</option>
							    <option value="AB positive">AB+ve</option>
							</select>
							
						  </div>
						  
						</div> 
											
						
						&nbsp;
						<div class="col-md-12" style="margin-top:1%;">
						  <div class="col-md-2"></div>
						   
						 <div class="col-md-4">
						 <label>Phone Number</label>
							<input type="text" class="form-control" name="mobile" placeholder="Mobile Number" required>
							
							
						  </div>
						  <div class="col-md-1"></div>
						  <div class="col-md-4">
						    <label>Upload Image</label>
							<input type="file" name="folder" id="image">
						  </div>
						  
						</div> 
						&nbsp;
						<div class="col-md-12" style="margin-top:1%;">
						  <div class="col-md-2"></div>
						   
						 <div class="col-md-9">
							<label>Address</label>
							<textarea rows="3" cols="6" class="form-control" name="address" placeholder="Fill Your Address" required></textarea>
						  </div>
						  
						</div> 
						
						&nbsp;
						
						<div class="col-md-12" style="margin-top:2%;">
						   <div class="col-md-4"></div>
						   
						   <div class="col-md-4" style="text-align:center;">
						   
							<button type="submit" name="submit" class="btn btn-lg btn-info" onclick="reg()" >Register</button>
							
						   </div>
						   
						  <div class="col-md-4"></div>
						</div>
						 
			
					</form>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->

	<?php include('footer.php');?>
	
	<script>
	 $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
	</script>