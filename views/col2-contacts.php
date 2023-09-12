<form id="form-clients-contacts" class="form text-center" role="form">
	<select id="client-contacts" name="client" class="form-control">
		<option value="">Select a Client</option>
	<?php if( isset($clients) ): ?>
		<?php foreach($clients as $client): ?>
		<option value="<?php echo $client->id ?>"><?php echo $client->username ?></option>
		<?php endforeach; ?>
	<?php endif; ?>
	</select>
</form>
<div id="myContacts"></div>


