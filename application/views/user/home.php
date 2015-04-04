<?php $projects=$this->db->get('client')->result(); ?>

</hr>
	<div id="total_income" value="2500"></div>

	<div id="total_distribution" value="3000"></div>

	<div id="total_expenses" value="3500"></div>
	<div id="canvas-holder">
		<canvas id="chart-area" width="500" height="200"/>
	</div>