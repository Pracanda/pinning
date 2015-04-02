
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/Chart.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
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