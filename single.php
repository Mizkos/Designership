<?php if( has_post_thumbnail() != '') { 
		get_header('');
		?>
	    <div class="top-cover">
		    <?php if( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('full'); ?>
			<?php endif; ?>
		    <div class="vertical-center">
		    	<div class="vertical-el">
				    <div class="contain">
				    	<div class="row center">
					        <div class="col-sm-12">
						        <h1><?php the_title(); ?></h1>
					        </div>
					    </div>
				    </div>
		    	</div>
		    </div>
		</div>
	<?php 
	}
	else { 
		get_header('light');
		
	?>
		<div class="page-cover">
		    <div class="container">
		    	<div class="row center">
			        <div class="col-sm-12">
				        <h1><?php the_title(); ?></h1>
			        </div>
			    </div>
		    </div>
		</div>
	<?php
	}
?>


	<div class="primary container-fluid">
		<main id="main" class="container blogpost">
		<div class="push-md-1 col-md-10">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', 'standard', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;


			the_post_navigation( array(
			    'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'designership' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'designership' ) . '</span> ' . '<span class="post-title">%title</span>',
			    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'designership' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'designership' ) . '</span> ' . '<span class="post-title">%title</span>',
			) );



		// End the loop.
		endwhile;
		?>
		</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>