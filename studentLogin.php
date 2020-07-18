<?php include('header.php');?>
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
			<h2 class="agileits-title">Student Login</h2>
			
				               <div class="col-md-12">
																		
									<form action="chklogin_student.php" method="post">
											<div class="col-md-12">	
											
												<div class="col-md-4"></div>
												
												<div class="col-md-4 margin-bottom-mob-50">
													<label style="color:#eb5480;">Student UserName</label>
													<input type="text" class="form-control" name="email" placeholder="Enter UserName">
												</div> 
												
											</div>	
										
										<div class="col-md-12" style="margin-top:1%;">	
										
											<div class="col-md-4"></div>	
											
											<div class="col-md-4 margin-bottom-mob-50">
												 <label style="color:#eb5480;">Student Password</label>
												<input type="password" class="form-control" name="password" placeholder="Enter Password">
												
											</div> 
										</div>
						
										<div class="col-md-12" style="margin-top:2%;">	
											 <div class="col-md-4"></div>						
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<button type="submit" name="submit" class="btn btn-warning" value="Login">Login</button>
											</div> 
											
										</div>
								 </form>
							</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->

	<?php include('footer.php');?>