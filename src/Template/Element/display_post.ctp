<div class="display_post_item">
	<img src="<?php echo $post->image; ?>" width="340" height="225"/>   
  <h3><?php echo $this->Html->link($post->title, array('controller' => 'Posts', 'action' => 'view', $post->id)) ?></h3>
  <?php echo $post->tags; ?>
  <br/>
  <?php echo date('m/d/y ', $post->timestamp); ?>
</div>