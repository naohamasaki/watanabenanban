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
<div id="post_sub" class="news">
    <article class="top_content02">
        <h3 class="indent">News&amp;Topics</h3>
        <ul id="top_news">
            <?php query_posts('cat=5&posts_per_page=10&paged='.$paged); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li>
                    <time><?php the_time('Y-m-d'); ?></time><a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                </li>
                <?php endwhile; ?>
                <?php else : ?>
                <p>表示する記事はありませんでした。</p>
                <?php endif; ?>
                <?php wp_reset_query();?>
                <li class="line_break">
                    <span class="arrow"><a href="http://www.y-s-k.jp/news/topics/">新着情報一覧はこちら</a></span>
                </li>
            </ul>
    </article>
</div><!-- post_subここまで -->