<?php
/**
 * Archive Page for our theme
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
				
				<header class="page-header">
					<h1><?php
						if ( is_day() ) :
							printf( __( 'Daily Archives', 'integral' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives', 'integral' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'integral' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives', 'integral' ), get_the_date( _x( 'Y', 'yearly archives date format', 'integral' ) ) );

						else :
							_e( 'Archives', 'integral' );

						endif;
                        ?>
                    </h1>
                    <h2><?php
						if ( is_day() ) :
							printf( get_the_date() );

						elseif ( is_month() ) :
							printf( get_the_date( _x( 'F Y', 'monthly archives date format', 'integral' ) ) );

						elseif ( is_year() ) :
							printf( get_the_date( _x( 'Y', 'yearly archives date format', 'integral' ) ) );

						endif;
					?>
                    </h2>
				</header>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('integral-post-thumbnails',array('class'=>'img-responsive')); ?></a></figure><?php } ?>
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
                    <?php the_excerpt(); ?>
                </div>
			    <div class="clearfix"></div>
			 </article> <!--post -->
			
			 
			 <?php endwhile;?>
			 <?php endif; ?>
			
			<?php the_posts_pagination( array(
			    'mid_size' => 2,
			    'prev_text' => __( 'Previous', 'integral' ),
			    'next_text' => __( 'Next', 'integral' ),
			    'screen_reader_text' => __( '&nbsp;', 'integral' ),
			) ); ?>

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