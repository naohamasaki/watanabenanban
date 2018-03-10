<?php if(is_page( array( 'contact', 'partner' ) ) ): ?>
<?php get_template_part('header-page02'); ?>
<?php else: ?>
<?php get_template_part('header-page'); ?>
<?php endif; ?>
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
<?php if(is_page( array( 'contact', 'partner' ) ) ): ?>
<?php get_footer('page'); ?>
<?php else: ?>
<?php get_footer(); ?>
<?php endif; ?>