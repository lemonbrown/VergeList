<script>
$(document).ready(function(){
	$("#AddItem").click(function(){
		$.ajax({
			type:'POST',
			url:'/VergeList/Users/addPostItem',
			data:{count: $('.post_item').length + 1},
			success:function(response){
				$(".post_items").append(response);
			}
		});
	});
	
	$('form').delegate('.post_hide', 'click', function(){
		$(this).siblings('.post_item_content').hide();
		$(this).hide();
		$(this).siblings('.post_show').show();
	});
	
	$('form').delegate('.post_show', 'click', function(){
		$(this).siblings('.post_item_content').show();
		$(this).hide();
		$(this).siblings('.post_hide').show();
	});
	
	$('form').delegate('.post_item_remove', 'click', function(){
		$(this).parents('.post_item').remove();
		var num = $(this).siblings('.list_item_number').text();
		
		$(".list_item_number").each(function(){
			if($(this).text() > num){
				$(this).text($(this).text() - 1);
			}
		});

	});
	
	$("#Submit").click(function(){
		var post = {
			title : $("#title").val(),
			tags: $("#tags").val(),
			image: $("#display_image").val()
		};
		
		var listItems = new Array();
		
		$(".post_item").each(function(){
			var listItem = {
				title : $(this).find("#item_title").val(),
				image : $(this).find("#item_image").val(),
				source_name : $(this).find("#item_source").val(),
				source_link : $(this).find("#item_source_url").val(),
				number : parseInt($(this).find(".list_item_number").text())
			};
			
			listItems.push(listItem);
		});		
		
		$.ajax({
			type:"POST",
			url:"/VergeList/Users/savePost",
			data:{post: post, listItems: listItems},
			success:function(){
			
			}
		});
	});
});
</script>

<div class="container">
<form>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title"  placeholder="Enter title" value='<?php echo $post->title; ?>'>
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control" id="tags"  placeholder="Enter tags" value='<?php echo $post->tags; ?>'>
  </div>
  <div class="form-group">
    <label for="display_image">Display Image Url</label>
    <input type="text" class="form-control" id="display_image"  placeholder="Enter url" value='<?php echo $post->image; ?>'>
  </div>
  
   <div>
		<div style='display:inline-block;font-size:22px;font-weight:bold;padding:10px'>Items</div><div style='display:inline-block'><button type="button" class="btn btn-primary" id="AddItem">Add Item</button></div>
   </div>
   
   <div class='post_items'>
	<?php echo $this->element('post_item', array('count' => 1)); ?>
   </div>
  
  <button type="button" id='Submit' class="btn btn-primary">Submit</button>
</form>
</div>