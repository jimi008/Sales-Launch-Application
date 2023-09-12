// =========== HOME =======================
// =========== COL 2 JS ===================

var $ = jQuery.noConflict();
$(document).ready(function() { $("#client-contacts").select2(); });


$( "#client-contacts" ).change(function(){
  	var clientid = $(this).val() ;
  	if(clientid)
  	{
  		load_client_data(clientid);
	    load_marketeer_profile(clientid);
  	}
});
// assign a marker pushpin, comment, call etc to a contact.. and reload the contacts
$("#myContacts").on('click', 'a[class="marker"]', (function(e){
	var marker = this.id
	var contactid = $(this).attr('contact-id');
	if(marker == 'comment'){
		bootbox.prompt("Please add some comments against this contact.", function(result){
			if(result !== null){
				$.getJSON("/home/set_contact_comments/"+ contactid+"/"+encodeURIComponent(result), function(jsonData){
			  		if(jsonData)
			        {
			        	load_contacts(jsonData);
			        }
			    });
			}
		});
	}else{
		$.getJSON("/home/set_contact_mark/"+ contactid+"/"+marker, function(jsonData){
	  		if(jsonData)
	        {
	        	load_contacts(jsonData);
	        }
	    });
	}
}));

// load contact moments.. and contact details
$("#myContacts").on('click', 'a[class="contactname"]', (function(e){
	e.preventDefault();
	var contactid = $(this).attr('contact-id');
	load_contact_data(contactid);
	return false;
}));

function load_contact_data(contactid){
	$.getJSON("/home/load_contact/"+ contactid, function(jsonData){
  		if(jsonData)
        {
          	$.each(jsonData['contactDetails'], function(i,data)
          	{
  				// setting up for saving contact moment
  				$("div .historie").html('Historie: '+data.business);
  				$("div .contact_id").val(data.id);
  				// setting up for saving contact detail
  				$("#business").val(data.business);
  				$("#contactname").val(data.contactname);
  				$("#phone").val(data.phone);
  				$("#email").val(data.email);
  				$("#interest").select2("val", data.interest);
  				if( data.interested == 1 )
  					$("#interested").bootstrapSwitch('state', true);
  				else
  					$("#interested").bootstrapSwitch('state', false);
  			});

      		var table = '<table class="table table-responsive table-striped table-hover">';
      		var found = false;
			var business = $("#business").val();
			load_contact_moments(jsonData['contactMoments']);
			$("#uninterested-log").html("");

    	}
    });	
}

function load_client_data(clientid){
  	$.getJSON("/home/client_contacts/"+ clientid, function(jsonData){
  		if(jsonData)
        {
        	
        	// loading contacts list
        	load_contacts(jsonData['contactsList']);
        	// loading action items
        	load_action_items(jsonData['actionItems']);
        	// loading other markteers
          	$.each(jsonData['clientMarketeers'], function(i,data)
          	{
          		//console.log(data);
				$('#other_marketeers')
				    .empty()
				    .append('<option selected="selected" value="">SELECT A MARKETEER</option>');
				$('#other_marketeers').append($('<option/>', { 
			        value: data.id,
			        text : data.username 
			    }));
  			});
        	// loading offers count
          	$.each(jsonData['contactOffers'], function(i,data)
          	{
			  	$("div.offers .active-offers").html(data.active_offers_count);
	  			$("div.offers .old-offers").html(data.old_offers_count);
  			});
    	}
    });
}

function load_contacts(jsonData){
	var table = '<div class="list-group">';
    $.each(jsonData, function(i,data)
    {

        table +='<div class="onhover-active-wrapper list-group-item"><a href="#" class="contactname" contact-id="'+data.id+'">'+data.business+'</a>';
        table +='<div class="pull-right">';
	    if(data.pushpin == 1)
		    table +=' <span class="sp-pingrey icon"></span>';
	    if(data.call == 1)
		    table +=' <span class="sp-clockgrey icon"></span>';
		if(data.notes_count !== null || data.notes_count !== '')
		    table +=' <span class="badge sp-messagegrey icon">'+ data.notes_count +'</span>';
        table +='</div>';
        table +='<div class="pull-right">';
        table +='	<div class="btn-group onhover-active">';
	    table +='	<button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="sp-editorgrey icon"></span></button>';
	    table +='	<ul class="dropdown-menu" role="menu">';
	    table +='		<li><a href="#" class="marker" id="pushpin" contact-id="'+data.id+'">Bovenaan <span class="sp-pinwhite icon"></a></li>';
	    table +='		<li><a href="#" class="marker" id="call" contact-id="'+data.id+'">Terugbellen <span class="sp-clockwhite icon"></a></li>';
	    table +='		<li><a href="#" class="marker" id="comment" contact-id="'+data.id+'">Opmerking <span class="glyphicon glyphicon-comment"></a></li>';
	    table +='	</ul>';
	    table +='	</div>';
        table +='</div>';
	    if(data.comments !== null){
	        table +='<br/><br/>';
		    table +='<div class="list-group-item-text text-left"><em>'+ data.comments +'</em></div>';
	    }
        table +='</div>';

            
    });
    table += '</div>';
    $("#myContacts").html(table);
}

function load_action_items(jsonData){
	var table = '';

    $.each(jsonData, function(i,data)
    {
		table += '  <div href="#" class="list-group-item onhover-active-wrapper">';
		table +='  <div class="pull-right"><span class="glyphicon glyphicon-phone"></span></div>';
		table += '    <div class="pull-right"><div class="btn-group onhover-active">';
		table += '	    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span></button>';
		table += '	    <ul class="dropdown-menu" role="menu">';
		table += '	    	<li><a href="#" class="action-item-status" id="PUSH" action-item-id="'+ data.id +'">Duw voor offerte <span class="glyphicon glyphicon-tags"></a></li>';
		table += '	    	<li><a href="#" class="action-item-status" id="DONE" action-item-id="'+ data.id +'">Taak Voltooid <span class="glyphicon glyphicon-check"></a></li>';
		table += '	    	<li><a href="#" class="action-item-status" id="DEL" action-item-id="'+ data.id +'">Werwijderen <span class="glyphicon glyphicon-trash"></a></li>';
		table += '	    </ul>';
		table += '    </div>';
		table += '   </div>';
		table +='  <div class="pull-left"><span class="glyphicon glyphicon-star"></span></div>';
		table +='  <h4 class="list-group-item-heading">'+data.moment+'</h4>';
		table +='  <p class="list-group-item-text">'+data.apointment+' <br/>';
		table +='  <em>'+data.comments+'</em>';
		table +='  </p>';
		table += '  </div> ';
    });
    $("span.action_items_count").html(jsonData.length);
    $("div.myActionItems").html(table);
}


function load_marketeer_profile(clientid){
  	$.getJSON("/home/marketeer_profile/"+ clientid, function(jsonData){
  		if(jsonData)
        {
        	load_sales_performance(jsonData);

        	load_weekly_contact_moments(jsonData.weekly_contact_moments_count);

        	load_weekly_sales(jsonData.weekly_sales)

        	load_monthly_sales(jsonData.monthly_sales)
    	}
    });

}

function load_admin_marketeer_profile(marketeerid){
  	$.getJSON("/admin/home/admin_marketeer_profile/"+ marketeerid, function(jsonData){
  		if(jsonData)
        {
        	load_sales_performance(jsonData);

        	load_weekly_contact_moments(jsonData.weekly_contact_moments_count);

        	load_weekly_sales(jsonData.weekly_sales)

        	load_monthly_sales(jsonData.monthly_sales)
    	}
    });

}

function load_sales_performance(jsonData){
	$.each(jsonData.profile, function(i,data){
		$("#sales-performance .profile h4").html(data.fullname);
	});
	if(jsonData.contacted_count){
		var contact_percent = jsonData.contact_percent;
		var offers_percent = jsonData.offers_percent;
		var offers_ratio =  jsonData.offers_ratio;
		var sales_percent = jsonData.sales_percent;
		var sales_ratio =  jsonData.sales_ratio;
		var conversion_percent = jsonData.conversion_percent;
		var conversion_ratio =  jsonData.conversion_ratio;

		$("#sales-performance .contact-percent h4").html(contact_percent + '%');
		$("#sales-performance .offers-ratio h4").html(offers_ratio + ' / ' + offers_percent.toFixed(2) + '%');
		$("#sales-performance .sales-ratio h4").html(sales_ratio + ' / ' + sales_percent.toFixed(2) + '%');
		$("#sales-performance .conversion-ratio h4").html(conversion_ratio + ' / ' + conversion_percent.toFixed(2) + '%');
	}
}
function load_weekly_contact_moments(jsonData){
	var table = '';
	$.each(jsonData, function(i,data){
		table += '<div class="row">';
		table += '	<div class="col-md-3">';
		table += '		<div class="week-number text-center">'+ data.week +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-9">';
		table += '	<div class="week-minibox">';
		table += '	<div class="row">';
		table += '	<div class="faceicon"></div>';
		table += '<div class="boxedstripped-pbar">'+ data.weekly_count +'</div>';
		table += '	</div>';
		table += '	<div class="row">';
		table += '		<div class="week-bar">';
		table += '			<div class="progress progress-striped">';
		table += '			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'+ data.weekly_count +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ data.weekly_count +'%">';
		table += '			    <span class="sr-only">'+ data.weekly_count +'% Complete (success)</span>';
		table += '			  </div>';
		table += '			</div>	';
		table += '		</div>';
		table += '	</div>';
		table += '</div>';
		table += '</div>';
		table += '</div>';


	});
	$("#weekly-contact-moments").html(table);
}
function load_weekly_sales(jsonData){
	var table = '';
	$.each(jsonData, function(i,data){
		table += '<div class="row">';
		table += '	<div class="col-md-3">';
		table += '		<div class="week-number text-center">'+ data.week +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-3">';
		table += '		<div class="week-number text-center">'+ data.offer +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-3">';
		table += '		<div class="week-number text-center">'+ data.sale +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-3">';
		table += '		<div class="week-number text-center">'+ data.fee +'</div>';
		table += '	</div>';
		table += '</div>';

	});
	$("#weekly-sales").html(table);
}

function load_monthly_sales(jsonData){

	var table = '';
	$.each(jsonData, function(i,data){
		table += '<div class="row">';
		table += '	<div class="col-md-3">';
		table += '		<div class="month text-center">'+ data.month +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-3">';
		table += '		<div class="month text-center">'+ data.offer +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-3">';
		table += '		<div class="month text-center">'+ data.sale +'</div>';
		table += '	</div>';
		table += '	<div class="col-md-3">';
		table += '		<div class="month text-center">'+ data.fee +'</div>';
		table += '	</div>';
		table += '</div>';

	});
	$("#monthly-sales").html(table);
}

// ============ COL 3 JS ====================
$(document).ready(function() { $("#client-belscripts").select2(); });

var j = jQuery.noConflict();
j( "#client-belscripts" ).change(function() 
  {
  	var belscript_id = j(this).val() ;
  	if(belscript_id)// && belscript_id != j('#selected-belscript').val())
  	{
	  	j.getJSON("/home/client_belscript/"+ belscript_id, function(jsonData){
	  		if(jsonData)
	        {

	        	table = '<div>';
		          j.each(jsonData, function(i,data)
		          {
		                table +='<div class="row"><div  class="col-md-12 mbox '+data.color+' "><div class="titlemsg"><div class="msgnumbers">'+data.sequence+'</div> <div class="msgbody"> '+data.title+' </div> </div><div class="moremsg"><div class="icon sp-quoteswhite"></div><div class="moremsgbody"> '+data.message+'</div></div></div></div>';
		                if(data.yes_message != null && data.yes_message != '')
		                	table +='<div class="row"><div class="col-md-5 yesmbutton mbox">'+data.yes_message+'</div>';
		                if(data.no_message != null && data.no_message != '')
		                	table +='<div class="col-md-5 col-md-offset-1 nombutton mbox">'+data.no_message+'</div></div>';
		           });
		        table += '</div>';
		        j("#myBelscripts").html(table);
	    	}
	    });
  	}
 });

// =========== COL 4 JS ===================
var contact_moments = [];
contact_moments['NOTE'] = 'Aantekening maken';
contact_moments['CALL'] = 'Terugbel verzoek';
contact_moments['VISIT'] = 'Aafsprak maken';
contact_moments['OFFER'] = 'Doorzetten naar offerte';
contact_moments['SEND'] = 'Sales Materiaal sturen';
contact_moments['UNINTER'] = 'Not Interested';
var $ = jQuery.noConflict();

$(function () {
    $('div .date').datetimepicker({
	    icons : {
	        time: 'glyphicon glyphicon-time',
	        date: 'glyphicon glyphicon-calendar',
	        up:   'glyphicon glyphicon-chevron-up',
	        down: 'glyphicon glyphicon-chevron-down'
	    },
	    useStrict: "strict"
    });
});


$(document).ready(function() { $("#interest").select2(); });
$(function(){
	// for interested part
	$(".checkbox-active").bootstrapSwitch();
	// for recording contact moments part
	$("#contact_moments").popover({
		html: true,
		content: function(){
			return $('#hidden_menu').html();
		}
	});
	// make checkboxes work as radiobuttons
	$("#contact_moments").on('shown.bs.popover', function () {
		var selected = false;
		var bsPopoverHtml=$(this).data("bs.popover").$tip;
		var checkboxes=bsPopoverHtml.find("input");
		var button=bsPopoverHtml.find("button");
		checkboxes.bootstrapSwitch().on('switchChange.bootstrapSwitch', function(event, state) {
			if(state){
				//$("#save_contact_moment").html();
				//if($(this).bootstrapSwitch('state'))
				selected = true;
				var contact_type = $(this).bootstrapSwitch().val();
				$("#save_contact_moment").html(contact_moments[contact_type]);
				$("#contact_moment_type").val(contact_type);
				checkboxes.not(this).each(function(){
					$(this).bootstrapSwitch('state',false);
				});	
			}  		
		});
		button.on('click', function(){
			var contact_id = $("div .contact_id").val();
			if(contact_id){
				if(selected){
					$("#contact_moments").popover('hide');
					$("#hidden_contact_moment_form").removeClass('hide')
				}else{
					bootbox.alert('Select an Action');
				}
			}else{
				$("#contact_moments").popover('hide');
				bootbox.alert("Please select a contact to save contact moment.");
			}
		});		
	});
});

$("#save_contact_detail").click(function(e){
	e.preventDefault;
	var contact_id = $("contact_id").val();
	if(contact_id){

		// save contact detail
		// variable to hold request
		var request;
		// bind to the submit event of our form
		$("#contact_detail_form").submit(function(event){
		    // abort any pending request
		    if (request) {
		        request.abort();
		    }
		    // setup some local variables
		    var $form = $(this);
		    // let's select and cache all the fields
		    var $inputs = $form.find("input, select, button, textarea");
		    // serialize the data in the form
		    var serializedData = $form.serialize();
		    
		    // let's disable the inputs for the duration of the ajax request
		    // Note: we disable elements AFTER the form data has been serialized.
		    // Disabled form elements will not be serialized.
		    $inputs.prop("disabled", true);

		    // fire off the request to /form.php
		    request = $.ajax({
		        url: "/home/save_contact_detail/",
		        type: "post",
		        data: serializedData
		    });

		    // callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		        // log a message to the console
		    });

		    // callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		        // log the error to the console
		        console.error(
		            "The following error occured: "+
		            textStatus, errorThrown
		        );
		    });

		    // callback handler that will be called regardless
		    // if the request failed or succeeded
		    request.always(function () {
		        // reenable the inputs
		        $inputs.prop("disabled", false);
		    });

		    // prevent default posting of form
		    event.preventDefault();
		});		
	}else{
		bootbox.alert("Please select a contact to save.");
		return false;
	}
});

$("#save_contact_moment").click(function(){
	// save contact moment
	
	// variable to hold request
	var request;
	// bind to the submit event of our form
	$("#contact_moment_form").submit(function(event){
	    // abort any pending request
	    if (request) {
	        request.abort();
	    }
	    // setup some local variables
	    var $form = $(this);
	    // let's select and cache all the fields
	    var $inputs = $form.find("input, select, button, textarea");
	    var contact_date = $form.find('input[name="contact_moment"]');

	    if(contact_date.val() == ''){
	    	bootbox.alert("Date is mandatory.");
	    	return false;
	    }
	    // serialize the data in the form
	    var serializedData = $form.serialize();
	    // let's disable the inputs for the duration of the ajax request
	    // Note: we disable elements AFTER the form data has been serialized.
	    // Disabled form elements will not be serialized.
	    $inputs.prop("disabled", true);

	    // fire off the request to /form.php
	    request = $.ajax({
	        url: "/home/save_contact_moment/",
	        type: "post",
	        data: serializedData
	    });

	    // callback handler that will be called on success
	    request.done(function (response, textStatus, jqXHR){
	        // log a message to the console
	        //console.log(response);
	        var obj = $.parseJSON(response);
	        load_contact_moments(obj);
	        $("#hidden_contact_moment_form").addClass('hide');
	    });

	    // callback handler that will be called on failure
	    request.fail(function (jqXHR, textStatus, errorThrown){
	        // log the error to the console
	        console.error(
	            "The following error occured: "+
	            textStatus, errorThrown
	        );
	    });

	    // callback handler that will be called regardless
	    // if the request failed or succeeded
	    request.always(function () {
	        // reenable the inputs
	        $inputs.prop("disabled", false);
	    });

	    // prevent default posting of form
	    event.preventDefault();
	});		
});

$("#close_contact_moment").click(function(){
	$("#hidden_contact_moment_form").addClass('hide');
});
function load_contact_moments(obj)
{
	//console.log(jsonData);
	var table = '<table class="table table-responsive table-striped table-hover">';
	var found = false;
	var style_part = '';
  	$.each(obj, function(i,data)
  	{
  		if(data.moment_type == 'UNINTER'){
  			style_part = 'col4-contact-moments-uninterested' ;
  		}else{
  			style_part = 'col4-contact-moments-interested' ;
  		}
		found = true;
		table += '<tr>';
		table += '	<td>';
		table += '  	<div class="pull-left"><span class="glyphicon glyphicon-phone"></span></div>';
		table += '  	<div class="pull-right '+style_part+'-date">'+data.created_at+'</div>';
		table += '  	<span class="list-group-item-heading '+style_part+'-title">'+contact_moments[data.moment_type].toUpperCase()+': '+data.business.toUpperCase()+'</span>';
		table += '  	<span class="'+style_part+'-text">'+data.apointment+' at '+data.moment+'<br/>';
	    if(data.comments !== null){
			table += '		'+data.comments;
		}
		table += '</span>'
		table += '	</td>';
		table += '</tr>';
   	});
	if(found == true){
		table += '</table>';		      				
		$("#contact-moment-log").html(table);
	}else{
	  	table += '<tr>';
	  	table += '	<td><em>no data found</em></td>';
	  	table += '</tr>';
		table += '</table>';		      				
		$("#contact-moment-log").html(table);
	}
}

// ============== COL 6 JS =============

$("div .myActionItems").on('click', 'a[class="action-item-status"]', (function(e){
	e.preventDefault();
	var action_item_status = this.id
	var action_item_id = $(this).attr('action-item-id');
	bootbox.confirm("Are you sure you want to change the action item status?", function(result){
		if(result){
			$.getJSON("/home/set_action_item_status/"+ action_item_id+"/"+action_item_status, function(jsonData){
		        {
		        	if(jsonData['success'] == true)
		        		load_action_items(jsonData['action_items']);
		        	else
		        		$("div .myActionItems").html('');

		        	
		        }
		    });
		}
	});
    return false;
}));

$("div .reminders").on('click', 'a[class="reminder-status"]', (function(e){
	e.preventDefault();
	var reminder_status = this.id
	var reminderid = $(this).attr('reminder-id');
	bootbox.confirm("Are you sure you want to change the reminder status?", function(result){
		if(result){
			$.getJSON("/home/set_reminder_status/"+ reminderid+"/"+reminder_status, function(jsonData){
		  		if(jsonData)
		        {
		        	if(jsonData['success'] == true)
		        		load_reminders(jsonData['reminders']);
		        	else
		        		$("div .reminders").html('');
		        }
		    });
		}
	});
    return false;
}));

function load_reminders(jsonData){
	var table = '';
    $.each(jsonData, function(i,data)
    {
		table += '  <div href="#" class="list-group-item onhover-active-wrapper">';
		table += '    <div class="pull-right"><div class="btn-group onhover-active">';
		table += '	    <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span></button>';
		table += '	    <ul class="dropdown-menu" role="menu">';
		table += '	    	<li><a href="#" class="reminder-status" id="DONE" reminder-id="'+ data.id +'">Taak Voltooid <span class="glyphicon glyphicon-check"></a></li>';
		table += '	    	<li><a href="#" class="reminder-status" id="READ" reminder-id="'+ data.id +'">Gelezen <span class="glyphicon glyphicon-eye-open"></a></li>';
		table += '	    	<li><a href="#" class="reminder-status" id="DEL" reminder-id="'+ data.id +'">Werwijderen <span class="glyphicon glyphicon-trash"></a></li>';
		table += '	    </ul>';
		table += '    </div>';
		table += '  </div> ';
		table += '  <div class="pull-left"><span class="glyphicon glyphicon-star"></span></div> ';
		table += '    <p class="list-group-item-text">'+ data.reminder+' <br/>';
		if(data.status == 'READ'){
			table += '    <strong>Gelezen</strong>';
		}
		table += '    </p>';
		table += '  </div>';
    });
    table += '';
    $("div .reminders").html(table);

}

$(function(){
	$("#assign_marketeer").popover({
		html: true,
		content: function(){
			return $('#hidden_marketeers').html();
		}
	});
});
$("#assign_marketeer").on('shown.bs.popover', function () {
	var bsPopoverHtml=$(this).data("bs.popover").$tip;
	var select=bsPopoverHtml.find("select");
	select.select2();
	var button=bsPopoverHtml.find("button");
	button.on('click', function(){
		var contact_id = $("div .contact_id").val();
		var marketeer_id = select.val();
		if(contact_id && marketeer_id){
			bootbox.confirm("This action will also transfer all the history. Are you sure you want to make this transfer?", function(result){
				if(result){
				  	$.getJSON("/home/transfer_contact/"+ contact_id +"/"+marketeer_id, function(jsonData){
				  		if(jsonData.success)
				        {

				        	var clientid = $("#client-contacts").val();
				        	if(clientid){
					        	unload_contact();
					        	load_client_data(clientid);
					        }
							$.getJSON("home/load_all_contact_moments/", function(jsonData){
						  		if(jsonData)
						        {
						    		load_all_contact_moments(jsonData["contactMoments"]);
								}
							});		
				        	$("#assign_marketeer").popover("hide");
				        }else{
				        	bootbox.alert("Transfer failed.")
				        }
				    });
				} // if result
			}) // if bootbox.confirm
		  }else{
			bootbox.alert('Please select a Contact and then a Marketeer.');
		  }

	});
});

function load_all_contact_moments(jsonData){
	var table = '<table class="table table-responsive table-striped table-hover">';
	var found = false;
	var business = $("#business").val();
  	$.each(jsonData, function(i,data)
  	{
		found = true;
		table += '<tr>';
		table += '	<td>';
		table += '  	<div class="pull-left"><span class="glyphicon glyphicon-phone"></span></div>';
		table += '  	<div class="pull-right">'+data.created_at+'</div>';
		table += '  	<span class="list-group-item-heading">'+contact_moments[data.moment_type].toUpperCase()+': '+data.business.toUpperCase()+'</span>';
		table += '  	<br/>'+data.moment+'<br/><em>'+data.comments+'</em>';
		table += '	</td>';
		table += '</tr>';
		});
	if(found == true){
		table += '</table>';		      				
		$("#contact-moment-log").html(table);
	}else{
	  	table += '<tr>';
	  	table += '	<td><em>no data found</em></td>';
	  	table += '</tr>';
		table += '</table>';		      				
		$("#contact-moment-log").html(table);
//		$("#uninterested-log").html("");
	}
}

function unload_contact(){
	
	$("div .historie").html('Historie: ');
	$("div .contact_id").val("");
	
	$("#business").val("");
	$("#contactname").val("");
	$("#phone").val("");
	$("#email").val("");
	$("#interest").select2("val", "");
	$("#interested").bootstrapSwitch('state', false);
	$("#contact-moment-log").html('');
}
// variable to hold request
var request;
$("#reminder_form").submit(function(event){
    // abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = $form.serialize();
    
    // let's disable the inputs for the duration of the ajax request
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // fire off the request to /form.php
    request = $.ajax({
        url: "/home/create_reminder/",
        type: "post",
        data: serializedData
    });

    // callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // log a message to the console
        var obj = $.parseJSON(response);
        var div = "" ;
        load_reminders(obj);
        $("#myreminder").modal('hide');
    });

    // callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // log the error to the console
        console.error(
            "The following error occured: "+
            textStatus, errorThrown
        );
    });

    // callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // reenable the inputs
        $inputs.prop("disabled", false);

    });

    // prevent default posting of form
    event.preventDefault();
});

// =============== COL 7 JS =====================


function formatSelect(state){
	var originalId = state.element;
	if (!$(originalId).data('thumbnail')) return state.text; // optgroup
    return '<img src="'+ $(originalId).data('thumbnail')+'" height="40"/><br/>' + state.text;
}

$('.send-sales-material').clickover({
	content: function(){
		return $("#sales_material_form").html();
	},
	placement: 'left',
	html: true,
	tip_id:'sales_material_id',
	onShown: function(){

		$('#sales_material_id').find('select').select2({
		    formatResult: formatSelect,
		    formatSelection: formatSelect,
		    escapeMarkup: function(m) { return m; }
		});	

		var request;
		$('#sales_material_id').find('form').submit(function(event){
			event.preventDefault();
		    if (request) {
		        request.abort();
		    }
		    // setup some local variables
		    var $form = $(this);
			bootbox.confirm("Are you sure you want to send this Sales Material?", function(result){
				if(result){
				    // let's select and cache all the fields
				    var $selects = $form.find("select");
				    var $seldata = $selects.val();

				    var $inputs = $form.find("input, textarea");

				    // serialize the data in the form
				    var serializedData = $inputs.serialize();
				    $.each($seldata, function(k,v){
				    	serializedData = serializedData + '&cbo_salesmaterial[]=' + v;
				    })

				    $inputs.prop("disabled", true);
				    
				    request = $.ajax({
				        url: "/home/send_sales_material/",
				        type: "post",
				        data: serializedData,
				        dataType: "jsonp"
				    });

				    // callback handler that will be called on success
				    request.done(function (response, textStatus, jqXHR){
				        var obj = $.parseJSON(response);
				        if(obj['success'])
				        	console.log('Sales Material Sent.');
				        else
				        	console.log('Sales Material could not be sent.')
				    });

				    // callback handler that will be called on failure
				    request.fail(function (jqXHR, textStatus, errorThrown){
				        console.error(
				            "The following error occured: "+
				            textStatus, errorThrown
				        );
				    });

				    request.always(function () {
				        // reenable the inputs
				        $inputs.prop("disabled", false);
				        $('#sales_material_id').clickover('hide');
				    });
				
				

				}// if result
			});// bootbox.confirm
			return false;
		});// submit
	}
});