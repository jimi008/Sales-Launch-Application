<!-- 
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mySalesMaterialModal">
  Sales Material <span class="glyphicon glyphicon-cloud"></span>
</button>


<div class="modal fade" id="mySalesMaterialModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Send Sales Material</h4>
      </div>
      <div class="modal-body">
        
		<form role="form">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">File input</label>
		    <input type="file" id="exampleInputFile">
		    <p class="help-block">Example block-level help text here.</p>
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox"> Check me out
		    </label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<div id="sales_material_form" class="hide">
  <form role="form" id="offer">
    <div class="row">
      <div class="row-md-12">
	      <label for"txt_email">Email</label>
	      <input type="text" name="txt_email" id="txt_email" placeholder="Email" class="form-control">
	      <input type="hidden" name="txt_marketeer_id" id="txt_marketeer_id" value="<?php echo $current_marketeer_id ?>">
      </div>
    </div>
    <div class="row">
	    <div class="row-md-6">
	      <label for"txt_email">Sales Material</label>
	      <select multiple name="cbo_salesmaterial" id="cbo_salesmaterial" data-placeholder="Selecteer sales materiaal" class="form-control">
			<?php foreach($sales_material as $material): ?>  
			    <option value="<?php echo $material->id ?>" data-thumbnail="<?php echo asset_url().$material->thumbnail ?>"><?php echo $material->filename ?></div>
			<?php endforeach ?>
	      </select>
	    </div>
	    <div class="row-md-6">
	      <button type="submit" name="submit_offer" id="submit_offer" class="btn btn-primary">Send Sales Material</button>
	      <button type="button" data-dismiss="clickover" class="btn btn-default">Close</button>
	    </div>
    </div>
  </form>
</div>
<div class="list-group offers">
  <li href="#" class="list-group-item text-center">
	  <a href="#" class="btn btn-primary send-sales-material" rel="clickover" data-toggle="clickover">
	    Selecteer sales materiaal <span class="glyphicon glyphicon-cloud"></span>
	  </a>
  </li>

  <?php foreach($sales_material as $material): ?>
  <li href="#" class="list-group-item text-center">
    <img style="position:relative;" src='<?php echo asset_url().$material->filepath ?>'>

    <div class="list-group-item-text"><?php echo $material->filename ?></div>
    <div class="clearfix visible-xs"></div> 
  </li>

  <?php endforeach ?>

</div>