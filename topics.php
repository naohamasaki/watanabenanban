<?php
/*
Template Name: 新着情報一覧テンプレート
*/
?>
<?php get_header(); ?>
<div id="topics" class="cf">
			<h1>新着情報一覧</h1>
			<div id="topics_news">

				<?php
				query_posts("&posts_per_page=5&paged=$paged");
				 	if (have_posts()) :
					 while ( have_posts() ) :
					 	the_post();
				?>

					<section class="news">
						<time>
							<?php echo get_the_date(); ?>
						</time>
						<a href="<?php the_permalink(); ?>">
							<h1><?php the_title(); ?></h1>
						</a>
						<p>
							<?php the_excerpt(); ?>
						</p>
					</section>

					<?php 
			endwhile;
			else: 
			?>

						<p>記事はありません。</p>

						<?php
			endif;
			?>


							<div class="navigation cf">
								<div class="prev">
									<?php previous_posts_link(); ?>
								</div>
								<div class="next">
									<?php next_posts_link(); ?>
								</div>
							</div>
							<?php wp_reset_query(); ?>
								<!-- 投稿表示数指定の解除 ※上記の投稿表示数指定の関数と必ずセット -->

			</div>
			<!-- news -->
			<?php get_sidebar(); ?>

		</div>
		<!-- topics -->

<?php get_footer(); ?>