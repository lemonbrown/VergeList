<div class='display_item_mini'>
	<ul>
		<li>
			<a href='/VergeList/Posts/view/<?php echo $post->id; ?>'>
				<img src='<?php echo $post->image; ?>' width='85' height='85' />
			</a>
		</li>
		</li>
			<a href='#' ><?php echo $post->tags; ?></a>
			<h4><?php echo $this->Html->link($post->title, array('controller' => 'Posts', 'action' => 'view', $post->id))?></h4>
		</li>
	</ul>
</div>