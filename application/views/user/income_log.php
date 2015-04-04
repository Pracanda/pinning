<div class="row">
	<div class="col-md-9 col-sm-9">
		
		<div class="widget widget-nopad">
			<div class="widget-header"> <i class="icon-list-alt"></i>
			    <h3><?php echo "Income Log of ".ucfirst($client->client); ?></h3>
			    <h3><a href="<?php echo base_url('log/work/'.$client->id) ?>">Work Log</a></h3>
			</div>
			  <!-- /widget-header -->
			<div class="widget-content">
			    <div class="widget big-stats-container">
			      <div class="widget-content">
			        <div id="big_stats" class="cf">

			        	<?php $this->load->view("user/basic_client_info") ?>
			        	<hr>
			        	<?php if(!empty($income)): ?>
			        		<table class="table table-bordered table-striped">
			        			<thead>
			        				<tr>
				        				<th>Date</th>
				        				<th>Amount</th>
				        				<th>Remarks</th>
				        			</tr>
			        			</thead>
			        			<tbody>
					        		<?php $total = 0; foreach($income as $income): ?>

					        			<tr>
					        				<td><?php echo date("d M Y", strtotime($income->received_date)); ?></td>
					        				<td>
					        					<?php echo $income->received_amount; ?>
					        					<?php $user = $this->db->get_where("user", array("id"=>$income->received_by))->result(); ?>
					        					<small><?php echo "(".$user[0]->username.")"; ?></small>
					        				</td>
					        				<td><?php echo $income->remarks; ?></td>
					        			</tr>
					        			<?php $total = (int)$total + (int)$income->received_amount; ?>
					        		<?php endforeach; ?>
					        		<tr>
					        			<th style="float:right;">
					        				Total
					        			</th>
					        			<td>
					        				<?php echo $total; ?>
					        			</td>
					        		</tr>
					        		<tr>
					        			<th style="float:right;">Due</th>
					        			<td>
					        				<?php $due = 0; $due = $client->dealing_price - $total; ?>
					        				<?php if($due < 0): ?>
					        					--
					        				<?php else: ?>
					        					<?php echo $due; ?>
					        				<?php endif; ?>
					        			</td>
					        		</tr>
					        		<tr>
					        			<th style="float:right;">Extra</th>
					        			<td>
					        				<?php $extra = 0; $extra = $total - $client->dealing_price; ?>
					        				<?php if($extra > 0): ?>
					        					<?php echo $extra; ?>
					        				<?php else: ?>
					        					--
					        				<?php endif; ?>
					        			</td>
					        		</tr>
				        		</tbody>
			        		</table>

			        	<?php else: ?>
			        		<div class="empty-content">Empty Log</div>

			        	<?php endif; ?>

			        </div>
			      </div>
			    </div>
			</div>
		</div>

	</div>

	<div class="col-md-3 col-sm-3">
		<?php $this->load->view("user/log_sidebar",array("id"=>$this->uri->segment(3), "heading"=>"Other Projects")) ?>
	</div>
</div>