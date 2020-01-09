<?php
// No direct access
defined('_JEXEC') or die; ?>
<?php // echo $training; ?>
<div class="main" style="display: flex;flex-wrap: wrap;">
	<?php foreach ($trainingList as $i => $item) :
	//$ordering = ($listOrder == 'a.ordering');

	?>

		<div class=" sppb-col-md-4">
			<div class="main_wrap" style="border-radius: 3px;border:1px solid #363636;">
				<div class="img" style="background-color: #363636;height: 200px;"><img src=""></div>

					<div class="details" style="padding: 20px;">
						<h3 class="title"><?php echo $item->titleen; ?></h3>
						<p class="sits"><?php echo $item->availableseats; ?> spots left!</p>
						<p class="date"><?php echo $item->startdate." ".$item->starttime ; ?></p>
						<span><?php echo $item->descriptionen; ?></span>
						<p class="price"><?php echo JText::_('MOD_TRAINING_LISTS_TOPICPRICE'); ?>:<?php echo $item->topicprice; ?> <?php echo JText::_('MOD_TRAINING_LISTS_CURRENCY'); ?></p>
						<button><a href="<?php echo $item->url; ?>"><?php echo JText::_('MOD_TRAINING_LISTS_VIEWANDBOOK'); ?></a></button>
					</div>
			</div>
		</div>

	<?php endforeach; ?>
	<div class=" sppb-col-md-4">
			<div class="main_wrap" style="border-radius: 3px;border:1px solid #363636;">
				<div class="img" style="background-color: #363636;height: 200px;"><img src=""></div>

					<div class="details" style="padding: 20px;">
						<h3 class="title"><?php echo JText::_('MOD_TRAINING_LISTS_DONTSEE'); ?></h3>
						<p class="sits"><?php echo JText::_('MOD_TRAINING_LISTS_DONTSEEDESC'); ?></p>
						
						<span><?php echo JText::_('MOD_TRAINING_LISTS_DONTSEEREQ'); ?></span>
						
						<button><a href="<?php echo $item->trainingrequesturl; ?>">
							<?php echo JText::_('MOD_TRAINING_LISTS_DONTSEEREQBTN'); ?></a></button>
					</div>
			</div>
		</div>
</div>
<?php //echo "<pre>"; print_r($trainingList); ?>