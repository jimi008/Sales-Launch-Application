<div id="weeklysales" class="list-group">
	<div class="list-group-item">
		<div class="row weeklysales-header">
			<div class="col-md-3 text-center">
				WEEK
			</div>
			<div class="col-md-3 text-center">
				Offertes
			</div>
			<div class="col-md-3 text-center">
				Sales
			</div>
			<div class="col-md-3 text-center">
				Omzets
			</div>
		</div>
		<div id="weekly-sales">
		<?php foreach($weekly_sales as $sales): ?>
			<div class="row">
				<div class="col-md-3 text-center">
					<?php echo $sales['week'] ?>
				</div>
				<div class="col-md-3 text-center">
					<?php echo $sales['offer'] ?>
				</div>
				<div class="col-md-3 text-center">
					<?php echo $sales['sale'] ?>
				</div>
				<div class="col-md-3 text-center">
					<?php echo $sales['fee'] ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>