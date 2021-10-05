<section id="counter" class="bg-opacity section-padding-60" style="background: rgba(0,0,0,0) url(uploads/counterBg/counter.jpg);
background-clip: initial;
background-color: rgba(255,255,255,0);
background-origin: initial;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;
z-index: 0;">
<div class="container">
	<div class="row">
		<!-- Counter item-->  
		<?php foreach ($counter as $counters) { ?>
			<div class="col-md-3 col-sm-6">
				<div class="counter-item style-2">
					<div class="counter-item-inner">
						<i class="<?=$counters->counterIcon?>" aria-hidden="true"></i>
						<h4><?=$counters->counterTitle?></h4>
						<span class="counter"><?=$counters->counterCount?></span>
					</div>
				</div>
			</div>
		<?php } ?>
		<!-- Counter item-->  
	</div>
</div>
</section>