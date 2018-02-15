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
        $first_img = "http://www.e-tofuya.co.jp/we/wp-content/themes/e-tofuya/images/default01.jpg";
	}
return $first_img;
}
?>
<div id="post_sub">
   <article id="blog">
        <ul>
            <?php query_posts('cat=4&posts_per_page=5&paged='.$paged); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li class="clearfix">
                <figure>
                    <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
                </figure>
                <div>
                   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="none"><?php echo mb_substr(get_the_excerpt(), 0, 150); ?>...<a href="<?php the_permalink();?>">詳しく見る</a></p>
                </div>
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