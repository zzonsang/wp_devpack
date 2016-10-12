<?php
/**
 * 404 Page for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php get_header(); ?>
<div class="spacer"></div>
<div class="container">
	<div class="row">

		<div class="col-md-8">
			<div class="content">
				
			
                <h2><?php _e('Error 404 : Page not found!', 'integral'); ?></h2>
                <p><?php _e('The page you\'re trying to locate is missing.', 'integral'); ?></p>
			

			</div><!--content-->
		</div>

		<div class="col-md-4">
			<div class="sidebar">
				
				<?php get_sidebar(); ?>

			</div><!--sidebar-->
		</div>

	</div>
</div>

<?php get_footer(); ?>






