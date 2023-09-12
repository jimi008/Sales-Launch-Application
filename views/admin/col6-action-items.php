<div id="sale_fee_form" class="hide">
  <form role="form">
    <div>
      <label for"txt_sale">Sale</label>
      <input type="text" name="txt_sale" id="txt_sale" placeholder="Sale" class="form-control">
    </div>
    <div>
      <label for"txt_fee">Fee</label>
      <input type="text" name="txt_fee" id="txt_fee" placeholder="Fee" class="form-control">
    </div>
    <div>
      <button type="submit" name="submit_sale" id="submit_sale" class="btn btn-primary">Save Sale</button>
      <button type="button" data-dismiss="clickover" class="btn btn-default">Close</button>
    </div>
  </form>
</div>

<div id="offer_form" class="hide">
  <form role="form" id="offer" enctype="multipart/form-data">
    <div>
      <label for"txt_email">Email</label>
      <input type="text" name="txt_email" id="txt_email" placeholder="Email" class="form-control">
    </div>
    <div>
      <label for"txt_email">Message</label>
      <textarea name="txt_message" id="txt_message" placeholder="Message" class="form-control" rows="4" cols="50"></textarea>
    </div>
    <div>
      <label for"txt_file">Offer Document</label>
      <input type="file" name="txt_file" id="txt_file" class="form-control">
    </div>
    <div>
      <button type="submit" name="submit_offer" id="submit_offer" class="btn btn-primary">Send Offer</button>
      <button type="button" data-dismiss="clickover" class="btn btn-default">Close</button>
    </div>
  </form>
</div>

<div class="list-group myActionItems">
<?php if(isset($action_items)): ?>
<?php foreach($action_items as $action_item): ?>
  <div href="#" class="list-group-item onhover-active-wrapper">
  <div class="pull-right">
  <?php if($action_item['status'] === 'SALE'): ?>
    <span class="glyphicon glyphicon-euro"></span>
  <?php endif; ?>
  <?php if($action_item['status'] === 'OFFER'): ?>
    <a href="#" class="admin-action-item-sale" data-toggle="clickover" id="SALE" action-item-id="<?php echo $action_item['id'] ?>" contact-id="<?php echo $action_item['contact_id'] ?>" title="Sale Against <b><?php echo $action_item['business'] ?></b>"><span class="glyphicon glyphicon-hand-right"></span></a>
  <?php endif; ?>
  <?php if($action_item['status'] === 'PUSH'): ?>
    <a href="#" class="admin-action-item-offer" data-toggle="clickover" id="OFFER" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>" title="Send Offer To <b><?php echo $action_item['business'] ?></b>"><span class="glyphicon glyphicon-tags"></span></a>
  <?php endif; ?>
  <?php if($action_item['status'] === 'DONE'): ?>
    <span class="glyphicon glyphicon-ok"></span>
  <?php endif; ?>
  <?php if($action_item['status'] === 'DEL'): ?>
    <span class="glyphicon glyphicon-trash"></span>
  <?php endif; ?>
    <span class="glyphicon glyphicon-phone"></span>
  </div>
    <div class="pull-right"><div class="btn-group onhover-active">
	    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span></button>
	    <ul class="dropdown-menu" role="menu">
        <li><a href="#" class="admin-action-item-status" id="TRANSFER" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>">
          Actiepunten overdragen 
          <span class="glyphicon glyphicon-user"></span>
          <span class="glyphicon glyphicon-resize-horizontal"></span>
          <span class="glyphicon glyphicon-user"></span>
        </a></li>
<!--         <?php if($action_item['status'] === 'OFFER'): ?>
          <li><a href="#" class="admin-action-item-status" id="SALE" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>">Converteren naar sale <span class="glyphicon glyphicon-euro"></a></li>
        <?php endif; ?>
        <?php if($action_item['status'] === 'PUSH'): ?>
          <li><a href="#" class="admin-action-item-status" id="OFFER" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>">Converteren naar offerte <span class="glyphicon glyphicon-hand-right"></a></li>
        <?php endif; ?>
 -->	    	<li><a href="#" class="admin-action-item-status" id="DONE" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>">Taak Voltooid <span class="glyphicon glyphicon-check"></a></li>
	    	<li><a href="#" class="admin-action-item-status" id="DEL" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>">Verwijderen <span class="glyphicon glyphicon-trash"></a></li>
        <li><a href="#" class="admin-action-item-status" id="PEND" action-item-id="<?php echo $action_item['id'] ?>"  contact-id="<?php echo $action_item['contact_id'] ?>">Vernieuwen <span class="glyphicon glyphicon-repeat"></a></li>
	    </ul>
    </div>
   </div>
  <div class="pull-left"><span class="glyphicon glyphicon-star"></span></div>
  <h4 class="list-group-item-heading"><?php echo $action_item['moment'] ?></h4>
  <p class="list-group-item-text"><?php echo $action_item['apointment'] ?> <br/>
  <em><?php echo $action_item['comments'] ?></em>
  </p>
  </div> 
<?php endforeach; ?>
<?php endif; ?>
</div>