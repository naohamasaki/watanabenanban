<?php get_template_part('header-page'); ?>
<div id="content_bg">
    <div id="content">
        <div class="content-width">
            <ul id="two_columns" class="clearfix">
                <li>
                    <div id="the_topicpath">
                        <?php the_topicpath(); ?>
                    </div>
                    <?php
                        if (have_posts()) :
                        while (have_posts()) :
                        the_post();
                        remove_filter('the_content', 'wpautop'); // 記事やページを作成時、自動的に <p> でくくられれないようにする
                        the_content(); // cobtentをループで挟むと管理画面の内容が出てくる
                        add_filter('the_content', 'wpautop'); // 特定の箇所のみPタグを無効化
                        endwhile;
                        endif;
                    ?>
                </li>
                <li><?php get_sidebar(); ?></li>
            </ul>
        </div><!-- content-widthここまで -->
        <?php get_template_part('contents_bottom'); ?>
    </div>
</div>
<?php get_footer(); ?>