<?php include("includes/header.php"); ?>
		<div class="row top-infobar">
			<div class="col-md-2 text-center">
				<span class="glyphicon glyphicon-user"></span> Sales Performance
			</div>
			<div class="col-md-2 text-center">
				<span class="glyphicon glyphicon-briefcase"></span> Prospect Contacten
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6 text-center">
						<span class="glyphicon glyphicon-comment"></span> Mijn Belscript: 
					</div>
					<div class="col-md-3 text-center">
						<span class="glyphicon glyphicon-pencil"></span> Registreer een contact moment
					</div>
					<div class="col-md-3 text-center">
						<span class="glyphicon glyphicon-thumbs-up"></span> Registreer interesse
					</div>
				</div>
			</div>
			<div class="col-md-3">
    			<div class="row">
			<div class="col-md-6 text-center">
				<span class="glyphicon glyphicon-bullhorn"></span> Actie vereist <span class="badge action_items_count"><?php echo count($action_items) ?></span>
			</div>
			<div class="col-md-6 text-center">
				<span class="glyphicon glyphicon-cloud"></span> Selecteer sales materiaal
			</div>
			</div>
			</div>
		</div>
		<div class="row bodycols">
			<div class="col-md-2 column1">
				<?php echo $col1_sales_performance ?>
				<?php echo $col1_weekly_contact_moments ?>
				<?php echo $col1_weekly_sales ?>
				<?php echo $col1_monthly_sales ?>
			</div>
			<div class="col-md-2 column2">
				<?php echo $col2_contacts ?>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6 column3">
						<?php echo $col3_belscripts ?>
						
					</div>
					<div class="col-md-6 column4n5">
						<?php echo $col4_contact_moments_form ?>
						<?php echo $col4_contact_moments ?>
						<?php echo $col4_uninteresteds ?>
					</div>
				</div>
			</div>
			<div class="col-md-3 column6n7">
    			<div class="row">
			<div class="col-md-6 column6">
				<?php echo $col6_action_items ?>
				<?php echo $col6_offers_count ?>
				<?php echo $col6_reminders ?>
				<?php echo $col6_buttons ?>
			</div>
			<div class="col-md-6 column7">
				<?php echo $col7_sales_material ?>
			</div>
			</div>
			</div>
		</div>

<?php include("includes/footer.php"); ?>