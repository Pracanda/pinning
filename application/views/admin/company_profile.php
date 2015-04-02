<div>
	<?php echo form_open_multipart('Home/company_record', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Select Year :</label>
			<div class="col-sm-10">
				<select name="year">
					<?php $date=date('Y'); ?>
					<?php for ($i=$date; $i >'2009'; $i--) { ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php } ?>			
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<button type="submit" class="btn btn-default btn-raised">view</button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>

<div>	
	<?php if(!empty($expense)): ?>
		<?php print_r($expense); ?>
	<?php else: ?>
		<?php $year=date('Y'); ?>
		<?php echo $year; ?>
		<div style="width:30%">
			<div>
				<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>
		
	<?php endif; ?>
</div>
