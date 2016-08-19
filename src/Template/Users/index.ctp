<div class="container">
	<a href='/VergeList/Users/post'><button type="button" id='CreatePost' class="btn btn-primary">Create Post</button></a>
	<div style='width:400px'>
		<table class='user_post_table'>
			<tr>
				<th>
					Title
				</th>
				<th>
					Action
				</th>
			</tr>
		<?php
			foreach($posts as $post):?>
			<tr>
				<td>
					<a href='/VergeList/Users/post/<?php echo $post->id; ?>'><?php echo $post->title; ?></a>
				</td>
				<td>
					<a href='#'>delete</a>
				</td>
			</td>
			<?php endforeach;
		?>
		</table>
	</div>
</div>
