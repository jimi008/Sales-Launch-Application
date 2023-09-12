<div id="contact-moments" class="list-group">
	<div class="list-group-item">
		<div class="row moments-header">
			<div class="col-md-3 text-center">
				WEEK
			</div>
			<div class="col-md-9 text-center">
				Contact Momenten
			</div>
		</div>
		<div id="weekly-contact-moments">
		<?php foreach($weekly_contact_moments_count as $count): ?>
		<div class="row">
			<div class="col-md-3">
				<div class="week-number text-center"><?php echo $count['week'] ?></div>
			</div>
			<div class="col-md-9">
			<div class="week-minibox">
			<div class="row">
			<div class="faceicon"></div>
		<div class="boxedstripped-pbar"><?php echo $count['weekly_count'] ?></div>
			</div>
			<div class="row">
				<div class="week-bar">
					<div class="progress progress-striped">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $count['weekly_count'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $count['weekly_count'] ?>%">
					    <span class="sr-only"><?php echo $count['weekly_count'] ?>% Complete (success)</span>
					  </div>
					</div>	
				</div>
			</div>
		</div>
		</div>
		</div>
<?php endforeach ?>
</div>
</div>
</div>