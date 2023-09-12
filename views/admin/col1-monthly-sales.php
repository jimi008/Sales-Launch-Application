<div id="monthlysales" class="list-group">
	<div class="list-group-item">
		<div class="row monthlysales-header">
			<div class="col-md-3 text-center">
				MONTH
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
		<div id="monthly-sales">
		<?php foreach($monthly_sales as $sales): ?>
			<div class="row">
				<div class="col-md-3 text-center">
					<?php echo $sales['month'] ?>
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