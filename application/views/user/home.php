<?php $projects=$this->db->get('client')->result(); ?>
<div class="heading">
	<h1>Create log</h1>
</div>
<div style="text-align:center">
	<h2>Select Project</h2>
	<?php echo form_open_multipart('log', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		<select name="project">
			<?php foreach($projects as $row): ?>
				<option value="<?php echo $row->id; ?>"><?php echo $row->org; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="form-group">
			<button type="submit" class="btn btn-default btn-raised">View</button>
		</div>
	<?php echo form_close(); ?>
</div>
<div>
	<!-- TEST TIME -->
	<?php $date=strtotime(date('Y-m-d')); ?>
	<?php $due= strtotime("2015-04-8"); ?>
	<?php echo $due-$date; ?>
</div>

</hr>
	<div style="text-align:Center;">
		<h2>Economy Of the Company</h2>
	</div>
		<?php $income=$this->db->get('income')->result(); ?>
		<?php $total_income=0; ?>
		<?php foreach($income as $row): ?>	
			<?php $total_income=$total_income + $row->dealed_price; ?>
		<?php endforeach; ?>
	<div id="total_income" value="<?php echo $total_income; ?>"></div>
		<?php $distribution=$this->db->get('funding')->result(); ?>
		<?php $total_distribution=0; ?>
		<?php foreach($distribution as $row): ?>	
			<?php $total_distribution=$total_distribution + $row->amount; ?>
		<?php endforeach; ?>
	<div id="total_distribution" value="<?php echo $total_distribution; ?>"></div>
	<?php $expenses=$this->db->get('expense')->result(); ?>
		<?php $total_expense=0; ?>
		<?php foreach($expenses as $row): ?>	
			<?php $total_expense=$total_expense + $row->amount; ?>
		<?php endforeach; ?>
	<div id="total_expenses" value="<?php echo $total_expense; ?>"></div>
	<div id="canvas-holder">
		<canvas id="chart-area" width="500" height="200"/>
	</div>