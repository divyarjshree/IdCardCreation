<?php
session_start();

if ($_SESSION['user']) {
    
} else {
    header("location:index.php");
}
$user = $_SESSION['user'];
include("config.php");	
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
					<li><i class="fa fa-user" aria-hidden="true"></i>Admin Dashboard / View Students</li>
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
					<?php
						include("config.php");	
					  if(isset($_POST["update"])){									
							$stu_id = $_POST["update"];
							$query1 = mysqli_query($connection, "update student_reg set isactive=0 where stu_id='$stu_id'");
							//echo $stud_id;
						
						}
					  
					  ?>
			  <div class="col-md-12">
				<h2>View Students</h2>&nbsp;
				  <div class="table-responsive">
			<form action="ViewStudent.php" method="post">
				<table id="myTable" class="table table-bordered table-hover table-striped ">

                            <thead style="background:rgba(22, 160, 133, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Student Id</th>
                            <th class="idwcol">Name</th>
                            <th class="idwcol">Mobile</th>
                            <th class="idwcol">Email</th>
                            <th class="idwcol">Password</th>
                            <th class="idwcol">Blood Group</th>
                            <th class="idwcol">Course</th>
                            <th class="idwcol">Year</th>
                            <th class="idwcol">D.O.B</th>
                            <th class="idwcol">Address</th>
                            <th class="idwcol">Reg Date</th>
                            <th class="idwcol">Action</th>
                                                      														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
								
								       if (isset($_POST['delete'])) {
											
												$id=$_POST['delete'];
												mysqli_query($connection, "DELETE from student_reg WHERE stu_id='$id'");
											
										}
										
								$slno = 1;
                                $query = mysqli_query($connection, "SELECT * from student_reg INNER JOIN course_master ON student_reg.course = course_master.course_Id where student_reg.isActive=1");
                                while ($row = mysqli_fetch_array($query)) {

                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									
                                    print '<td>' . $row['stu_uniqueid'] . '</td>';
                                    print '<td>' . $row['name'] . '</td>';
                                    print '<td>' . $row['mobile'] . '</td>';
                                    print '<td>' . $row['email'] . '</td>';
                                    print '<td>' . $row['password'] . '</td>';
                                    print '<td>' . $row['blood_group'] . '</td>';
                                    print '<td>' . $row['Courses'] . '</td>';
                                    print '<td>' . $row['year'] . '</td>';
                                    print '<td>' . $row['dob'] . '</td>';
                                    print '<td>' . $row['address'] . '</td>';
                                    print '<td>' . $row['created_date'] . '</td>';
									
									print '<td>
									<button type="submit" name="update" class="btn btn-primary" onClick="return block();" value='.$row['stu_id'].'>Block</button>
									&nbsp;&nbsp;&nbsp;
									<button type="submit" name="delete" class="btn btn-danger" onClick="return doconfirm();" value='.$row['stu_id'].'>Delete</button>
									</td>';
																		
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
						</form>
						</div>
			  </div>
				
				<div class="clearfix"> </div>
				<hr>
				<?php 
				   include("config.php");
				  if(isset($_POST["updateact"])){									
									$stu_id = $_POST["updateact"];
									$query2 = mysqli_query($connection, "update student_reg set isactive=1 where stu_id='$stu_id'");
							//echo $stud_id;
						
						}
				?>
				<div class="col-md-12" style="margin-top:2%;">
				<h2>View Blocked Students</h2>&nbsp;
				  <div class="table-responsive">
			<form action="ViewStudent.php" method="post">
				<table id="myTable1" class="table table-bordered table-hover table-striped">

                            <thead style="background:rgba(52, 152, 219, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Student Id</th>
                            <th class="idwcol">Name</th>
                            <th class="idwcol">Mobile</th>
                            <th class="idwcol">Email</th>
                            <th class="idwcol">Password</th>
                            <th class="idwcol">Blood Group</th>
                            <th class="idwcol">Course</th>
                            <th class="idwcol">Year</th>
                            <th class="idwcol">D.O.B</th>
                            <th class="idwcol">Address</th>
                            <th class="idwcol">Reg Date</th>
                            <th class="idwcol">Action</th>
                           
                           														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
								
								$slno = 1;
                                $query3 = mysqli_query($connection, "SELECT * from student_reg INNER JOIN course_master ON student_reg.course = course_master.course_Id where student_reg.isActive=0");
                                while ($row = mysqli_fetch_array($query3)) {

                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									
                                    print '<td>' . $row['stu_uniqueid'] . '</td>';
                                    print '<td>' . $row['name'] . '</td>';
                                    print '<td>' . $row['mobile'] . '</td>';
                                    print '<td>' . $row['email'] . '</td>';
                                    print '<td>' . $row['password'] . '</td>';
                                    print '<td>' . $row['blood_group'] . '</td>';
                                    print '<td>' . $row['Courses'] . '</td>';
                                    print '<td>' . $row['year'] . '</td>';
                                    print '<td>' . $row['dob'] . '</td>';
                                    print '<td>' . $row['address'] . '</td>';
                                    print '<td>' . $row['created_date'] . '</td>';
									
									print '<td><button type="submit" name="updateact" class="btn btn-primary" onClick="return Active();" value='.$row['stu_id'].'>Active</button></td>';
									
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
						</form>
						</div>
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
	function block()
	{
	    job = confirm("Are you sure want to Block permanently?");
	    if(job != true)
	    {
	        return false;
	    }
	}
	
	function Active()
	{
	    job = confirm("Are you sure want to Active");
	    if(job != true)
	    {
	        return false;
	    }
	}
</script>