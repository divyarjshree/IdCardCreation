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
					<li><i class="fa fa-user" aria-hidden="true"></i>Admin Dashboard</li>
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
<?php 
                  include("config.php");
				   if(isset($_POST['submit'])){
					   
					   $course = $_POST['Courses'];
					   
					   mysqli_query($connection, "insert into course_master(Courses) values('$course')");
					   print '<script>alert("Successfully Added");</script>';
					   print '<script>window.location.assign("admindashboard.php");</script>';
				   }
				?>
	<div class="welcome">
		  <div class="container">
			
			<div class="col-md-6">
				<h2>Add Courses</h2>
								
				             <form action="admindashboard.php" method="post">
							
								<div class="form-group">
							
                                    <div style="margin-top:2%;">
                                        <input type="text" class="form-control" name="Courses" placeholder="Ex : Automobile Engineering">
                                    </div>
                               
                                    <div style="margin-top:3%;">
                                        <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                                    </div>
                               </div> 

                            </form>
			</div>			
			
			<div class="col-md-6">
			<h2>View Courses</h2>&nbsp;
			<form action="admindashboard.php" method="post">
			   <table id="myTable" class="table table-bordered table-hover table-striped">

                            <thead style="background:rgba(22, 160, 133, 0.5);">
							<th class="idwcol">Sl No</th>
                            <th class="idwcol">Course Name</th>
                            <th class="idwcol">Action</th>
														
                            </thead>

                            <tbody>

                                <?php
                                include("config.php");
								
								       if (isset($_POST['delete'])) {
											
												$id=$_POST['delete'];
												mysqli_query($connection, "DELETE from course_master WHERE course_Id='$id'");
											
										}
										
								$slno = 1;
                                $query = mysqli_query($connection, "SELECT * from course_master;");
                                while ($row = mysqli_fetch_array($query)) {

                                    print '<tr>';
									
                                    print '<td>' .$slno. '</td>';
									

                                    print '<td>' . $row['Courses'] . '</td>';
									
									print '<td><button type="submit" name="delete" class="btn btn-danger" onClick="return doconfirm();" value='.$row['course_Id'].'>Delete</button></td>';
									
									print '</tr>';
									
									$slno++;
									
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
			</div>
				            
				
				<div class="clearfix"> </div>
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