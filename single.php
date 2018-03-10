<?php get_template_part('header-page'); ?>
<div id="content" class="clearfix"><!-- contentここから -->
<div class="column_width">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post_sub content-width">
        <h2 id="page_title"><span><?php the_title(); ?></span></h2>
        <div class="post_content">
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
        <h2>記事がありません</h2>
        <p>表示する記事はありませんでした。</p>
        <?php endif; ?>
        <div class="nav-below">
            <a href="<?php bloginfo('url'); ?>/<?php $cat = get_the_category(); $cat = $cat[0];{echo $cat->category_nicename;} ?>/#post_sub">一覧を見る</a>
        </div>
    </div><!-- post_subここまで -->
    </div><!-- content ここまで -->
</div><!-- content-width -->
<?php get_footer(); ?>