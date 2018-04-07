<?php
global $wp_query;
global $paged;
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){ //Defines a default image
        $first_img = "http://watanabenanban.com/wp-content/themes/watanabenanban/images/watanabenanban_blog.jpg";
	}
return $first_img;
}
?>
<div id="post_sub">
    <ul id="masonry" class="cf">
        <?php query_posts('cat=6&posts_per_page=30&paged='.$paged); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="grid">
            <figure>
                <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
            </figure>
            <section>
               <h3><?php the_title(); ?></h3>
                <div><?php the_content() ;?></div>
            </section>
        </li>
        <?php endwhile; ?>
        <?php else : ?>
        <p>表示する記事はありませんでした。</p>
        <?php endif; ?>
    </ul>
    <div class="pager">
            <?php my_paginate(); ?>
        </div>
        <?php wp_reset_query();?>
</div> <!-- post_subここまで -->