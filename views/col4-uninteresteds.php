<!-- Show log of uninterested contacts only for logged in user's log -->
<div id="uninterested-log">
	<table class="table table-responsive table-striped table-hover">
	<?php if(isset($uninteresteds)): 
	  foreach($uninteresteds as $uninterested): ?>
	  <tr>
	  	<td>
	    <div class="pull-left"><span class="glyphicon glyphicon-phone"></span></div>
	    <div class="pull-right"><?php echo $uninterested['created_at'] ?></div>
	    <span class="list-group-item-heading"><?php echo strtoupper($uninterested['business']) ?></span>
	    <br/><?php echo $uninterested['phone'] ?> <em><?php echo $uninterested['contactname'] ?></em>
	    
	    </td>
	  </tr>
	  <?php endforeach;
	endif; ?>
	</table>
</div>
