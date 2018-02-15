<?php
/*
Template Name: toppage
*/
?>
<?php get_header(); ?>
<!-- contentここから -->
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
<?php get_footer(); ?>