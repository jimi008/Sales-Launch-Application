<div id="sales-performance" class="list-group">
	<div class="list-group-item">
		<div class="row">
			<div class="col-md-12 profile text-center">
			<?php foreach($profile as $profile_data): ?>
				<h4><?php echo $profile_data['fullname'] ?></h4>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="contact-percent text-center"><strong>Contact momenten</strong><h4><?php echo $contact_percent ?>%</h4></div>
			</div>
			<div class="col-md-6">
				<div class="offers-ratio text-center"><strong>Offerte rating</strong><h4><?php echo $offers_ratio ?> <?php echo $offers_percent ?>%</h4></div>
				<div class="sales-ratio text-center"><strong>Offerte success</strong><h4><?php echo $sales_ratio ?> <?php echo $sales_percent ?>%</h4></div>
				<div class="conversion-ratio text-center"><strong>Conversie</strong><h4><?php echo $conversion_ratio ?> <?php echo $conversion_percent ?>%</h4></div>
			</div>
		</div>
	</div>
</div>