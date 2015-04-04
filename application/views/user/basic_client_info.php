<table class="table">
	<tr>
		<th>Dealing Price</th>
		<td><?php echo $client->dealing_price; ?></td>
	</tr>
	<tr>
		<th>Dealed By</th>
		<td>
			<?php $user = $this->db->get_where("user", array("id"=>$client->dealer))->result(); ?>
			<?php echo ucfirst($user[0]->username); ?>
		</td>
	</tr>
	<tr>
		<th>Dealed On</th>
		<td><?php echo date("d M Y", strtotime($client->date_deal)); ?></td>
	</tr>
	<tr>
		<th>Phone</th>
		<td>
			<?php echo $client->contact; ?>
		</td>
	</tr>
	<tr>
		<th>Email</th>
		<td><?php echo $client->email; ?></td>
	</tr>
	<tr>
		<th>Website</th>
		<td><a href="<?php echo $client->website; ?>" target="_blank"><?php echo $client->website; ?></a></td>
	</tr>
</table>