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
        $first_img = "http://test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/images/watanabenanban_blog.jpg";
    }
    return $first_img;
}
?>
<div id="post_sub">
    <ul id="blog">
        <?php query_posts('cat=7&posts_per_page=3&paged='.$paged); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="cf">
            <figure>
                <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>" />
            </figure>
            <section>
                <span>
                    <img src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/images/title_line.jpg">
                </span>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo mb_substr(get_the_excerpt(), 0, 200); ?>...<a href="<?php the_permalink();?>">詳しく見る</a></p>
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