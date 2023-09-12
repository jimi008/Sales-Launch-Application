<form id="form-clients-belscripts" class="form text-center" role="form">
	<select id="client-belscripts" name="client" class="form-control">
		<option value="">Select a Belscript</option>
	<?php if( isset($belscripts) ): ?>
		<?php foreach($belscripts as $belscript): ?>
		<option value="<?php echo $belscript->id ?>"><?php echo $belscript->username ?>: <?php echo $belscript->title ?></option>
		<?php endforeach; ?>
	<?php endif; ?>
	</select>
	<input type="hidden" value="" id="selected-belscript">
</form>
<div id="myBelscripts"></div>

