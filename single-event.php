<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header("page"); ?>

<div id="primary" class="column_width">
	<div id="event_content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="entry-title" id="page_title"><span><?php the_title(); ?></span></h1>	
			<div class="entry-content">
				<!-- Get event information, see template: event-meta-event-single.php -->
				<?php eo_get_template_part( 'event-meta', 'event-single' ); ?>

				<!-- The content or the description of the event-->
                <div id="event_description">
                       <h6>- 詳細情報 -</h6>
                        <?php the_content(); ?>
                    </div>
                </div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->

			<!-- If comments are enabled, show them -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
    <div id="event_btn"><a href="http://watanabenanban.com/notice/event/#eo_fullcalendar_1_loading">一覧へ戻る</a></div>
</div><!-- #primary -->

<!-- Call template footer -->
<?php get_footer();
