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
		echo '<div class="clearfix"></div>'; ?>
        
        <div class="row">
            <div class="col-md-2">
                <?php
                    $avatar_arguments = [
                        'class' => 'img-fluid img-thumbnail mx-auto d-block'
                    ];
                    echo get_avatar(get_the_author_meta('ID'), 128, '', 'User avatar', $avatar_arguments);
                ?>
            </div>
            <div class="col-md-10 author-info">
                <h4>
                    <?php the_author_meta('first_name'); ?>
                    <?php the_author_meta('last_name'); ?>
                </h4>
                <?php if (get_the_author_meta('description')) : ?>
                    <p><?php the_author_meta('description'); ?></p>
                <?php else: ?>
                    <p><?= 'There is no biography' ?></p>
                <?php endif; ?>
            </div>
        </div>
        
        <hr />
        
        <p class="author-stats">
            User Posts Count: <span class="posts-count"><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>,
            User Profile Link: <?php the_author_posts_link(); ?>
        </p>
        
        <?php
        
		echo '<hr class="comment-separator"/>';
  
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
        
        echo '<hr class="comment-separator"/>';
        
		comments_template();
		?>
	</div>

<?php get_footer(); ?>
