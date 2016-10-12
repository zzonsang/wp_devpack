<?php
/**
 * Single Posts for our theme
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
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?></figure><?php } ?>
                    <div class="clearfix"></div>
                     
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                    <ul class="pagemeta">
                        <li><i class="fa fa-clock-o"></i><?php the_time('F jS, Y') ?></li>
                        <li><i class="fa fa-bookmark"></i><?php the_category(', '); ?></li>
                        <li><i class="fa fa-comment"></i><?php
                                printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'integral' ),
                                    number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></li>
                        <li><i class="fa fa-user"></i><?php the_author(); ?></li>
                    </ul>

                    <div class="entry">
                      <?php the_content(); ?>
                    </div>
            
                    <div class="clearfix"></div>
            
                </article> <!--post -->

                <?php if($integral['switch_authorinfo'] == 1) { ?>
                    <div id="author-info" class="clearfix">
                        <div class="author-image">
                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_avatar( esc_attr(get_the_author_meta('user_email')), '160', '' ); ?></a>
                        </div>   
                        <div class="author-bio">
                           <h4><?php _e('About The Author', 'integral'); ?></h4>
                            <?php the_author_meta('description'); ?>
                        </div>
                    </div>
                <?php } ?>
                
                
			
			<?php wp_link_pages(); ?> 
			
			 <?php endwhile;?>
				
			<?php comments_template(); ?>

			 <?php endif; ?>
			

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