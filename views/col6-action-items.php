<div class="list-group myActionItems">
  <?php if(isset($action_items)): ?>
    <?php foreach($action_items as $action_item): ?>
      <div href="#" class="list-group-item onhover-active-wrapper">
        <div class="row">
          <div class="col-md-1">
            <span class="sp-rating icon"></span>
          </div>
          <div class="col-md-10">
            <div class="row">
              <div class="pull-left">
                <h4 class="list-group-item-heading"><?php echo $action_item['moment'] ?></h4>
              </div>
              <div class="pull-right">
                <h4 class="list-group-item-heading">AFSPAK</h4>
              </div>
            </div>
            <div class="row">
            <div class="pull-left">
              <p class="list-group-item-text"><?php echo $action_item['apointment'] ?> <br/>
                <em><?php echo $action_item['comments'] ?></em>
              </p>
              </div>
              <div class="pull-right">
              <span class="sp-carblue icon"></span>
              </div>
            </div>
            <div class="pull-right"><div class="btn-group onhover-active">
             <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span></button>
             <ul class="dropdown-menu" role="menu">
              <li><a href="#" class="action-item-status" id="PUSH" action-item-id="<?php echo $action_item['id'] ?>">Duw voor offerte <span class="glyphicon glyphicon-tags"></a></li>
              <li><a href="#" class="action-item-status" id="DONE" action-item-id="<?php echo $action_item['id'] ?>">Taak Voltooid <span class="glyphicon glyphicon-check"></a></li>
              <li><a href="#" class="action-item-status" id="DEL" action-item-id="<?php echo $action_item['id'] ?>">Werwijderen <span class="glyphicon glyphicon-trash"></a></li>
            </ul>
          </div>
        </div>


      </div>
    </div>
  </div>

<?php endforeach; ?>
<?php endif; ?>
</div>