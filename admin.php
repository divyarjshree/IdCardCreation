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
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-user" aria-hidden="true"></i>Admin</li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- about -->
	<div class="welcome">
		<div class="container">
			<h2 class="agileits-title">Admin Login</h2>
			
				               <div class="col-md-12">
																		
									<form action="chklogin_admin.php" method="post">
											<div class="col-md-12">	
											
												<div class="col-md-4"></div>
												
												<div class="col-md-4 margin-bottom-mob-50">
													<label style="color:#eb5480;">Admin UserName</label>
													<input type="text" class="form-control" name="username" id="uid" placeholder="Enter UserName">
												</div> 
												
											</div>	
										
										<div class="col-md-12" style="margin-top:1%;">	
										
											<div class="col-md-4"></div>	
											
											<div class="col-md-4 margin-bottom-mob-50">
												 <label style="color:#eb5480;">Admin Password</label>
												<input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password">
												
											</div> 
										</div>
						
										<div class="col-md-12" style="margin-top:2%;">	
											 <div class="col-md-4"></div>						
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<button type="submit" name="submit" onclick="log()" class="btn btn-info" value="Login">Login</button>
											</div> 
											
										</div>
								 </form>
							</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->

		<script>

            function log() {

                var username = $("#uid").val();
                var password = $("#pass").val();


                if (username == "" || username == null)
                {
                    alert("Please enter username");
                }
                else if (password == "" || password == null)
                {
                    alert("Please enter Password");
                }
            }



        </script>
	<?php include('footer.php');?>