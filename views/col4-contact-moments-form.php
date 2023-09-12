<div>
<form id="contact_detail_form">
	<div class="row">
	  <div class="col-xs-6">
	    <input type="text" class="form-control" placeholder="Bedrijf" id="business" name="business">
	  </div>
	  <div class="col-xs-6">
	    <input type="text" class="form-control" placeholder="Naam Contactpersoon" id="contactname" name="contactname">
	  </div>
	</div>						
	<div class="row">
	  <div class="col-xs-6">
	    <input type="text" class="form-control" placeholder="Telfoon Nummer" id="phone" name="phone">
	  </div>
	  <div class="col-xs-6">
	    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
	  </div>
	</div>						
	<div class="row row3">
	  <div class="col-xs-6">
	    <div class="chkbox"><input type="checkbox" class="checkbox-active" value="1" id="interested" name="interested"> <span>Er is interesse</span></div>
	  </div>
	  <div class="col-xs-6">
	    <select class="form-control" id="interest" name="interest">
	  	<?php foreach($interests as $interest): ?>
	  		<option value="<?php echo $interest->id ?>"><?php echo $interest->interest ?></option>
	  	<?php endforeach ?>	
	  	</select>
	  </div>
	</div>						
	<div class="row row4">
	  <div class="col-xs-6">
	    <button type="submit" class="btn btn-primary form-control" id="save_contact_detail">OPSLAAN</button>
	  </div>
	  <div class="col-xs-6">
	    <button type="button" id="contact_moments" class="btn btn-primary form-control" data-container="body" data-toggle="popover" data-placement="bottom">
	      Voeg een Actie toe
	      <span class="caret"></span>
	    </button>
  	  </div>
	</div>						
	<input type="hidden" name="contact_id" class="contact_id" value="">
</form>
</div>
<hr/>
<div class="hide" id="hidden_contact_moment_form">
	<form id="contact_moment_form">
	<div style="padding:10px; background-color:#07b">
		<div class="row">
			<div class="col-md-10 historie">Historie: </div>
			<div class="col-md-2"><button type="button" class="close" id="close_contact_moment">&times;</button></div>
		</div>	
		<div class="row">
			<div class="col-md-12"><textarea name="apointment" class="form-control" rows="6" cols="50"></textarea></div>
		</div>	
		<div class="row">
			<div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="contact_moment" class="form-control" readonly="readonly" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6"><button type="submit" class="btn btn-default" id="save_contact_moment">Save</button></div>
		</div>	
	</div>
	<input type="hidden" name="contact_moment_type" id="contact_moment_type" value="">
	<input type="hidden" name="contact_id" class="contact_id" value="">
	</form>
</div>
<div class="hide" id="hidden_menu">
	<div style="width:350px; padding:10px;">
	<?php foreach($CONTACT_MOMENTS as $moment_type => $description): ?>
		<div class="row">
			<div class="col-md-8"><?php echo $description ?></div><div class="col-md-4"><input type="checkbox" value="<?php echo $moment_type?>"></div>
		</div>	
	<?php endforeach; ?>
		<div class="row">
			<div class="col-md-12 text-center"><button type="button" class="btn btn-primary" id="start_contact_moment">Start</button></div>
		</div>
	</div>
</div>

