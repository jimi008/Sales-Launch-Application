<div class="list-group reminders">
<?php if(isset($reminders)): ?>
<?php foreach($reminders as $reminder): ?>
  <div href="#" class="list-group-item onhover-active-wrapper">
    <div class="pull-right"><div class="btn-group onhover-active">
	    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span></button>
	    <ul class="dropdown-menu" role="menu">
	    	<li><a href="#" class="reminder-status" id="DONE" reminder-id="<?php echo $reminder['id'] ?>">Taak Voltooid <span class="glyphicon glyphicon-check"></a></li>
	    	<li><a href="#" class="reminder-status" id="READ" reminder-id="<?php echo $reminder['id'] ?>">Gelezen <span class="glyphicon glyphicon-eye-open"></a></li>
	    	<li><a href="#" class="reminder-status" id="DEL" reminder-id="<?php echo $reminder['id'] ?>">Werwijderen <span class="glyphicon glyphicon-trash"></a></li>
	    </ul>
    </div>
    </div> 
    <div class="pull-left"><span class="sp-rating icon"></span></div> 
    <p class="list-group-item-text"><?php echo $reminder['reminder'] ?> <br/>
    <?php if( $reminder['status'] == 'READ'): ?>
    	<strong>Gelezen</strong>
    <?php endif; ?>
    </p>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>

