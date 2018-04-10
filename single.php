<?php get_header(); ?>
<section id="single">
		<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
	?>	
	
	<h1><?php the_title(); ?></h1>
	<div class="content-grid">
		<div class="content">
			<p><?php the_content(); ?></p>
		</div>
		<div class="cf date">	
			<time><?php echo get_the_date(); ?></time>
		</div>	
	</div>
	<div class="navugation">
		<div class="cf">
		<div class="prev"><?php previous_post_link(); ?></div>
		<div class="next"><?php next_post_link(); ?></div>
	</div>
	</div>
	    <?php
    	endwhile;
	else:
	?>
	
	<P>記事はありません。</P>
	
	<?php
	endif;
	?>

	
</section>
<footer>
	<p id="goto-top" class="cf"><a href="#topImg"><i class="fa fa-angle-up " ></i>Topへ戻る</a></p>
	<section id="bottom-navi">
		<ul id="b-navi" class="cf">
			<li><a href="<?php echo home_url('/'); ?>">トップ</a></li>
			<li><a href="<?php echo esc_url(get_permalink( get_page_by_path('menu')->ID )) ?>">メニュー</a></li>
			<li><a href="<?php echo esc_url(get_permalink( get_page_by_path('goodfor')->ID )) ?>">こだわり</a></li>
			<li><a href="<?php echo esc_url(get_permalink( get_page_by_path('pick')->ID )) ?>">特　集</a></li>
			<li><a href="<?php echo esc_url(get_permalink( get_page_by_path('map')->ID )) ?>">アクセス</a></li>
		</ul>
	</section>
	<!-- #bottom-navi -->
	<p id="copy">Copyright &copy;2015-
		<?php if (date("Y")!=2015) echo date("Y"); ?> wanatabenanban All Rights Reserved.</p>
</footer>
<p id="sp-top">
	<a href="#menu">
		<i class="fa fa-chevron-up"></i>
	</a>
</p>
</body>

</html>





