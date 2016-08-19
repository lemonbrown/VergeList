<div class='list_item'>
	<div class='list_item_number'>
		<?php echo $listitem->number; ?>
	</div>
	<div class='list_item_heading'>
		<?php echo $listitem->title; ?>
	</div>
	<div class='list_item_body'>
	<img src='<?php echo $listitem->image; ?>' class='list_item_image'/>
	</div>
	<div class='list_item_source'>
		source <a href='<?php echo $listitem->source_link; ?>'><?php echo $listitem->source_name; ?></a>
	</div>
</div>