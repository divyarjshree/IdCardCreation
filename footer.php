<!-- footer -->
	<div class="footer">
		<div class="container">
				
			<div class="w3agile_footer_copy">
				<p style="color:#fff;font-weight:700;">© 2018 ID Card Creation.</p>
			</div>
		</div>
	</div>
	<!-- //footer -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
	<!-- FlexSlider --> 
	<script defer src="js/jquery.flexslider.js"></script>
	<script defer src="js/jquery-ui.js"></script>
	<script defer src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	</script>
	
	<script>
	   $(document).ready(function(){
			$('#myTable').DataTable();
			$('#myTable1').DataTable();
		});
	</script>
	
	<!-- End-slider-script -->

</body>
</html>