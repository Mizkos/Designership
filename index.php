<?php
/*
Template Name: Content
*/
?>
<?php if ( is_home() && ! is_front_page() ) : ?>
	<?php get_header(''); ?>
    <div class="top-cover">
	    <?php
		$designership_page_for_posts = get_option('page_for_posts');
		$designership_page_for_posts_image = wp_get_attachment_image_src( get_post_thumbnail_id( $designership_page_for_posts ), 'large' );
		
		if( !empty($designership_page_for_posts_image) ): ?>
				<img src="<?php echo esc_url($designership_page_for_posts_image[0]); ?>" alt="<?php the_title(); ?>"/>
		<?php endif; ?>
			
	    <div class="vertical-center">
	    	<div class="vertical-el">
			    <div class="contain">
			    	<div class="row center">
				        <div class="col-sm-12">
					        <h1><?php single_post_title(); ?></h1>
				        </div>
				    </div>
			    </div>
	    	</div>
	    </div>
	</div>
<?php else : ?>
	<?php get_header('light'); ?>
	<div class="page-cover">
		
	    <div class="container">
	    	<div class="row center">
		        <div class="col-sm-12">
			        <h1><?php esc_html_e( 'Posts', 'designership' ); ?></h1>
		        </div>
		    </div>
	    </div>
	</div>
<?php endif; ?>

    
<div id="blog" class="site">
	<div class="container-fluid">
		<main id="main" class="container">
			<div class="row">
				<div class="col-md-8">
			<?php if ( have_posts() ) : ?>
	
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
	
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
	
				// End the loop.
				endwhile;
	
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => esc_html__( 'Previous page', 'designership' ),
					'next_text'          => esc_html__( 'Next page', 'designership' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'designership' ) . ' </span>',
				) );
	
			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );
	
			endif;
			?>
			</div>
			
			<?php if ( is_active_sidebar( 'designership-sidebar' )  ) : ?>
			<aside id="secondary" class="sidebar widget-area col-md-4">
				<?php dynamic_sidebar( 'designership-sidebar' ); ?>
			</aside><!-- .sidebar .widget-area -->
			
			<?php endif; ?>
			
			</div>
		</main><!-- .site-main -->
		
		
	</div><!-- .content-area -->
</div>

<?php get_footer(); ?>
