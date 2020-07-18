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
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-user" aria-hidden="true"></i>Student Dashboard <span>/</span> Profile</li>
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
					
			  <div class="col-md-12">
			       			  
				<h2 style="text-align:center;">Dear <span style="color:#2e71a5;">"<?php echo $user;?>"</span> your Profile</h2>&nbsp;
				
				<table class="table table-bordered table-hover">
								   <tbody>
							<?php
							include("config.php");
							
							$query = mysqli_query($connection, "SELECT * from student_reg INNER JOIN course_master ON student_reg.course = course_master.course_Id where student_reg.email ='$user'");
							while ($row = mysqli_fetch_array($query)) {
								
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Image</strong> </td> ';
								
								
								print "<td> <img src='uploads/".$row['image']."' width=\"250\" height=\"100\"> </td>";
								
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Student ID </strong></td>';
								
								print '<td>'.$row['stu_uniqueid'].'</td>';
								
								print '</tr>'; 
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Name</strong> </td>';
								
								print '<td>'.$row['name'].'</td>';
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Mobile</strong> </td>';
								
								print '<td>'.$row['mobile'].'</td>';
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Email</strong> </td>';
								
								print '<td>'.$row['email'].'</td>';
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Password</strong> </td>';
								
								print '<td>'.$row['password'].'</td>';
								
								print '</tr>';
								
								 print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Blood Group</strong> </td>';
								
								print '<td>'.$row['blood_group'].'</td>';
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Course</strong> </td>';
								
								print '<td>'.$row['Courses'].'</td>';
								
								print '</tr>';
								
								print '<tr/>';
								
								print '<td class="idwbackcol"> <strong>Year</strong> </td>';
								
								print '<td>'.$row['year']. '</td>';
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>D.O.B</strong> </td>';
								
								print '<td>'.$row['dob'].'</td>';
								
								print '</tr>';
								
								 print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Address</strong> </td>';
								
								print '<td>'.$row['address'].'</td>';
								
								print '</tr>';
								
								print '<tr>';
								
								print '<td class="idwbackcol"> <strong>Reg Date</strong> </td>';
								
								print '<td>'.$row['created_date'].'</td>';
								
								print '</tr>';
							}
							?>
							</table>	
				
				
			  </div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->

		
	<?php include('footer.php');?>