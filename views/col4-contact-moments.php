<!-- By default, show current logged in user's log | later replace by contact moment data of a selected contact -->
<div id="contact-moment-log">
	<table class="table table-responsive table-striped table-hover">
	<?php if(isset($contact_moments)): 
	  foreach($contact_moments as $contact_moment): ?>
	  <?php  $style_part = $contact_moment['moment_type'] === 'UNINTER' ? 'col4-contact-moments-uninterested' : 'col4-contact-moments-interested' ?>
	  <tr>
	  	<td>
	    <div class="pull-left"><span class="sp-pencilblue icon"></span></div>
	    <div class="pull-right <?php echo $style_part ?>-date"><?php echo $contact_moment['created_at'] ?></div>
	    <span class="list-group-item-heading <?php echo $style_part ?>-title"><?php echo strtoupper($CONTACT_MOMENTS[$contact_moment['moment_type']]) ?>: <?php echo strtoupper($contact_moment['business']) ?></span>
	    <span class="<?php echo $style_part ?>-text"><br/><?php echo $contact_moment['apointment'] ?> at <?php echo $contact_moment['moment'] ?><br/><?php echo $contact_moment['comments'] ?></span>
	    
	    </td>
	  </tr>
	  <?php endforeach;
	endif; ?>
	</table>
</div>
