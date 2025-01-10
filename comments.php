<?php
	if (comments_open()) { ?>
	 <h3 class="comments-count"><?php comments_number() ?></h3>
<?php
	echo '<ul class="list-unstyled comments-list">';
	$comments_arguments = [
		'max_depth' => 3,
		'type' => 'comment'
	];
	
	wp_list_comments($comments_arguments);
	echo '<ul>';
	
	echo '<hr class="comment-separator"/>';
	
	comment_form();
} else {
	echo 'Comments are disabled';
}
?>
