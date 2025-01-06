<?php get_header(); ?>

<div class="container">
    <div class="row">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <div class="col-sm-6">
                    <div class="main-post">
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
                        <p class="post-content">
<!--                            --><?php //the_content('Read more...'); ?>
                            <?php the_excerpt() ?>
                        </p>
                        <hr />
                        <p class="categories">
                            <i class="fa-solid fa-tags"></i>
                            <?php the_category(' '); ?>
                        </p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>