<div class="container post_body">
			<div class='post_heading_tags'><a href='#'><?php echo $post->tags; ?></a></div>
	<div class="row">
		<div class='col-sm-6 blog-main'>
			<div class='post_heading'><?php echo $post->title; ?></div>
			<?php
				foreach($listitems as $list_item):
					echo $this->element('list_item', array('listitem' => $list_item));
				endforeach;
			?>
		</div>
		<div class='col-sm-3 blog-sidebar'>
			<div class="post_heading">
				More
			</div>
			<?php foreach($morePosts as $morePost):
				echo $this->element('display_post_mini', array('post' => $morePost));
			endforeach; ?>
		</div>
	</div>
</div>