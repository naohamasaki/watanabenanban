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
        $first_img = "http://www.y-s-k.jp/we/wp-content/themes/y-s-k/images/default.jpg";
	}
return $first_img;
}
?>
<div id="post_sub">
    <article class="performance">
        <ul>
            <?php query_posts('cat=4&posts_per_page=12&paged='.$paged); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li class="clearfix">
                <a href="<?php echo catch_that_image(); ?>" target="_blank">
                    <div>
                        <figure>
                                <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
                        </figure>
                        <span>
                            <img src="http://www.y-s-k.jp/we/wp-content/themes/y-s-k/images/zoom.png">
                        </span>
                    </div>
                </a>
            </li>
            <?php endwhile; ?>
            <?php else : ?>
            <p>表示する記事はありませんでした。</p>
            <?php endif; ?>
            <div class="pager">
                <?php my_paginate(); ?>
            </div>
            <?php wp_reset_query();?>
       </ul>
    </article>
</div> <!-- post_subここまで -->