<?php
/*
Template Name: Sidebar
*/
?>

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

<section class="primary">
	<div class="container">
		<div class="row">
			<main id="main" class="col-md-8">
	
			<?php if ( have_posts() ) : ?>
	
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
	
					the_content();
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
	
				// End the loop.
				endwhile;
	
			endif;
			?>
	
			</main><!-- .site-main -->
			
			<?php if ( is_active_sidebar( 'designership-sidebar' )  ) : ?>
				<aside id="secondary" class="sidebar col-md-4 widget-area">
					<?php dynamic_sidebar( 'designership-sidebar' ); ?>
				</aside><!-- .sidebar .widget-area -->
			<?php endif; ?>
		</div>
	</div><!-- .content-area -->
</section>

<?php get_footer(); ?>
