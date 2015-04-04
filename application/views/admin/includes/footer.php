				</div>
			</div>
		</div>	
	</div>
	<div class="footer">
	  <div class="footer-inner">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12"> &copy; 2015 <a href="http://www.pinesofts.com/" target="_blank">PineSofts</a>.</div>
	      </div>
	      <!-- /row --> 
	    </div>
	    <!-- /container --> 
	  </div>
	  <!-- /footer-inner --> 
	</div>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/Chart.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo base_url('assets/js/validator.min.js') ?>"></script>
	 <script type="text/javascript" src="<?php echo base_url('assets/js/user.js') ?>"></script>
	 <script>
			var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
			var lineChartData = {
				labels : ["January","February","March","April","May","June","July","August"],
				datasets : [
					{
						label: "My First dataset",
						fillColor : "rgba(220,220,220,0.2)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "rgba(220,220,220,1)",
						data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
					}
				]

			}

			window.onload = function(){
				var ctx = document.getElementById("canvas").getContext("2d");
				window.myLine = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});
			}
		</script>
 </body>
</html>