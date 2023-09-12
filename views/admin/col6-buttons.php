<div class="row">
	<p class="col-md-12">
		<button type="button" class="btn btn-primary form-control">Bekijk alle actiepunten 
		<span class="glyphicon glyphicon-star"></span>
		</button>
	</p>
</div>
<div class="row">
	<p class="col-md-12">
		<button type="button" class="btn btn-primary form-control" id="admin-assign_marketeer" data-container="body" data-toggle="popover" data-placement="top">
			Actiepunten overdragen 
		<span class="glyphicon glyphicon-user"></span>
		<span class="glyphicon glyphicon-resize-horizontal"></span>
		<span class="glyphicon glyphicon-user"></span>
		</button>
	</p>
</div>
<div class="row">
	<p class="col-md-12">
		<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myreminder">Reminder maken 
		<span class="glyphicon glyphicon-star"></span>
		</button>
	</p>
</div>
<!-- POPOVER FOR TRANSFERRING CONTACTS TO OTHER MARKETEERS -->
<div class="hide" id="hidden_marketeers">
	<div style="width:200px; padding:10px;">
	<form>
		<div class="row">
			<div class="col-md-12 text-center">
			<select id="other_marketeers" name="other_marketeers" class="form-control">
				<option value="">SELECT A MARKETEER</option>
			</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"><button type="button" class="btn btn-primary" name="assign_contact">Overdragen</button></div>
		</div>
	</div>
	</form>
	<input type="hidden" class="contact_id" value="">
</div>
<!-- MODAL FOR CREATING REMINDERS -->
<div class="modal fade" id="myreminder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
		<form id="reminder_form">
		<div style="padding:10px; background-color:#07b">
			<div class="row">
				<div class="col-md-12">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Reminder Maken</h4>
				</div>
			</div>	
			<div class="row">
				<div class="col-md-12"><textarea name="reminder" class="form-control" rows="6" cols="50"></textarea></div>
			</div>	
			<div class="row">
				<div class='col-sm-6'>
	            <div class="form-group">
	                <div class='input-group date' id='reminder_date'>
	                    <input type='text' name="reminder_date" class="form-control" />
	                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
	        </div>
	        
	        <div class="col-md-3">
	        	<button type="button" class="btn btn-default form-control" data-dismiss="modal">Annuleren</button> 
	        </div>
	        <div class="col-md-3">
	        	<button type="submit" class="btn btn-primary form-control" id="save_reminder">Sturen</button></div>
			</div>	
		</div>
		</form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


