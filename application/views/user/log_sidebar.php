<div class="widget widget-nopad">
	<div class="widget-header"> <i class="icon-list-alt"></i>
	    <h3><?php echo $heading; ?></h3>
	</div>
	  <!-- /widget-header -->
	<div class="widget-content">
	    <div class="widget big-stats-container">
	      <div class="widget-content">
	        <div id="big_stats" class="cf">

	        	<?php $projects = $this->db->where_not_in("id", $id)->get("client")->result() ?>
	        	<table class="table">
		        	<?php foreach($projects as $project): ?>

		        		<tr>
		        			<td colspan="2">
		        				<?php echo ucfirst($project->client); ?>
		        				<div>
		        					<a href="<?php echo base_url('log/work/'.$project->id) ?>" class="link-inverse">Work Log</a>
		        					<a href="<?php echo base_url('log/income/'.$project->id) ?>" class="link-inverse">Income Log</a>
		        				</div>
		        			</td>
		        		</tr>

		        	<?php endforeach; ?>
	        	</table>
	        </div>
	      </div>
	    </div>
	</div>
</div>