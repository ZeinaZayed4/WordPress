<?php get_header(); ?>
	
	<div class="container">
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				?>
				<div class="main-post single-post">
					<?php edit_post_link('Edit <i class="fa fa-pencil"></i>'); ?>
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					<span class="post-author">
                    <i class="fa-regular fa-user"></i>
                    <?php the_author_posts_link(); ?>
	                </span>
						<span class="post-date">
	                    <i class="fa-regular fa-calendar-days"></i>
	                    <?php the_time('F j, Y'); ?>
	                </span>
						<span class="post-comments">
	                    <i class="fa-regular fa-comments"></i>
	                    <?php comments_popup_link(); ?>
	                </span>
					<?php the_post_thumbnail('large', ['class' => 'img-responsive img-thumbnail', 'title' => 'Post Image']) ?>
					<div class="post-content">
						<?php the_content() ?>
					</div>
					<hr />
					<p class="post-categories">
						<i class="fa-solid fa-tags"></i>
						<?php the_category(' '); ?>
					</p>
					<p class="post-tags">
						<?php
						if (has_tag()) {
							the_tags();
						} else {
							echo "Tags: There are no tags.";
						}
						?>
					</p>
				</div>
				<?php
			}
		}
		echo '<div class="clearfix"></div>';
		echo '<div class="post-pagination">';
		if (get_previous_post_link()) {
			previous_post_link('%link', '<i class="fa-solid fa-chevron-left fa-lg"></i> %title');
		} else {
			echo '<span class="previous-span">Prev</span>';
		}
		
		if (get_next_post_link()) {
			next_post_link('%link', '%title <i class="fa-solid fa-chevron-right fa-lg"></i>');
		} else {
			echo '<span class="next-span">Next</span>';
		}
		echo '</div>';
		comments_template();
		?>
	</div>

<?php get_footer(); ?>
