<?php
/*
Template Name: 新着情報一覧テンプレート
*/
?>
<?php get_header('page'); ?>
<div class="column_width">
    <h2 id="page_title"><span>新着情報一覧</span></h2>
</div>
<div class="column_width cf">
  <div class="newsAll">
   <ul id="newsAll">
    <?php
       query_posts("cat=5&posts_per_page=10&paged=$paged");
        if (have_posts()) :
        while ( have_posts() ) :
        the_post();
        ?>

    <li>
            <h3><time><?php echo get_the_date(); ?></time>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a></h3>
        <div>
            <?php the_excerpt(); ?>
        </div>
    </li>
        <?php 
        endwhile;
        else: 
        ?>

        <li>記事はありません。</li>

        <?php
        endif;
        ?>
      </ul>
      <?php get_sidebar(); ?>
    </div>
    <!-- /.cf -->
</div>
<!-- news -->
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

<?php get_footer(); ?>