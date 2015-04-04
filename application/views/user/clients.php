<div class="widget widget-nopad">
  <div class="widget-header"> <i class="icon-list-alt"></i>
    <h3>Select Project</h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="widget big-stats-container">
      <div class="widget-content">
        <div id="big_stats" class="cf">
          <table class="table">
          <?php foreach($clients as $client): ?>
              <tr>
                <th>
                    <a href="<?php echo base_url('log/work/'.$client->id) ?>"><?php echo ucfirst($client->client); ?></a>
                    <span style="float: right;">
                        <small class="badge"><a href="<?php echo base_url('log/work/'.$client->id) ?>" class="cw">Work Logs</a></small>
                        <small class="badge"><a href="<?php echo base_url('log/income/'.$client->id) ?>" class="cw">Income Logs</a></small>
                    </span>
                </th>
              </tr>
          <?php endforeach; ?>
          </table>
        </div>
      </div>
      <!-- /widget-content --> 
      
    </div>
  </div>
</div>