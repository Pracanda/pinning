<div role="tabpanel">
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="#income" data-toggle="tab">Income</a></li>
		<li role="presentation"><a href="#distribution" data-toggle="tab">Fund Distribution</a></li>
		<li role="presentation" class="active"><a href="#expenses" data-toggle="tab">Expenses</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane" id="income">
			<?php echo anchor("Home/add_income", "Add Income"); ?>
			<div id="client">
				<table class="table table-condensed">
			  		<tr>
			  			<th>S.N.</th>
			  			<th>Client Name</th>
			  			<th>Dealed Price</th>
			  			<th>Advance Amount</th>
			  			<th>Received By</th>
			  			<th>Due Amount</th>
			  		</tr>
					<?php $i=1; foreach($income as $row): ?>
					<?php $cid=$this->db->get_where('client',array('org'=>$row->client_name))->result(); ?>
			  		<tr>
			  			<td><?php echo $i++; ?></td>
			  			<td><?php echo anchor("home/edit_client/".$cid[0]->id, $row->client_name); ?></td>
			  			<td><?php echo $row->dealed_price; ?></td>
			  			<td><?php echo $row->advance_amount; ?></td>
			  			<td><?php echo $row->received_by; ?></td>
			  			<td><?php echo $row->due_amount; ?></td>
			  		</tr>
			  		<?php endforeach; ?>
				</table>	
			</div>
		</div>
		<div class="tab-pane" id="distribution">
			<?php echo anchor("Home/fund", "Add Distribution"); ?>
			<div id="fund">
				<table class="table table-condensed">
			  		<tr>
			  			<th>S.N.</th>
			  			<th>Taken By</th>
			  			<th>Amount</th>
			  			<th>Date</th>
			  		</tr>
					<?php $i=1; foreach($fund as $row): ?>
			  		<tr>
			  			<td><?php echo $i++; ?></td>
			  			<td><?php echo $row->taken_by; ?></td>
			  			<td><?php echo $row->amount; ?></td>
			  			<td><?php echo $row->date; ?></td>
			  		</tr>
			  		<?php endforeach; ?>
				</table>	
			</div>
		</div>
		<div class="tab-pane active" id="expenses">
			<?php echo form_open_multipart('Home/add_expense', array('role'=>'form', 'class'=>'form-horizontal', 'data-toggle'=>'validator')); ?>
					<div class="form-group">
						<label class="col-sm-2 control-label">Expense Category :</label>
						<div class="col-sm-10">
							<select name="expense">
								<option value="tiffin">Tiffin</option>
								<option value="waterjar">Water Jar</option>
								<option value="electricity">Electricity</option>
								<option value="rent">Rent</option>
								<option value="internet">Internet</option>
								<option value="additionla">Additional</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Amount :</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="amount" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Date :</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" name="date" required>
						</div>
					</div>
					<div class="submit">
						<button type="submit" class="btn btn-default btn-raised">Add Expense</button>
					</div>
			<?php echo form_close(); ?>
			</hr>
			<div>
				<?php $expenses=$this->db->order_by("id","desc")->get("expense")->result(); ?>
				<div id="expense">
				<table class="table table-condensed">
			  		<tr>
			  			<th>S.N.</th>
			  			<th>Category</th>
			  			<th>Amount</th>
			  			<th>Date</th>
			  		</tr>
					<?php $i=1; foreach($expenses as $row): ?>
			  		<tr>
			  			<td><?php echo $i++; ?></td>
			  			<td><?php echo $row->expense; ?></td>
			  			<td><?php echo $row->amount; ?></td>
			  			<td><?php echo $row->date; ?></td>
			  		</tr>
			  		<?php endforeach; ?>
				</table>	
			</div>
			</div>
		</div>
	</div>
</div>