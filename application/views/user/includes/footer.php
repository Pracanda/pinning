
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/Chart.js' ?>"></script>
	 <script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>

	 <!-- Office Income and Expense -->
		 <script>
			var doughnutData = [
					{
						value: parseInt($("#total_income").attr("value")),
						color:"#F7464A",
						highlight: "#FF5A5E",
						label: "Income Generated"
					},
					{
						value: parseInt($("#total_distribution").attr("value")),
						color: "#46BFBD",
						highlight: "#5AD3D1",
						label: "Distribution"
					},
					{
						value: parseInt($("#total_expenses").attr("value")),
						color: "#4D5360",
						highlight: "#616774",
						label: "Office Expenses"
					}

				];

				window.onload = function(){
					var ctx = document.getElementById("chart-area").getContext("2d");
					window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
				};
		</script>
	<!-- //office income chart -->
 </body>
</html>