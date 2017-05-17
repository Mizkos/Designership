
<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage designership
 * @since designership 1.0
 */
?>

<article id="no-results not-found">
	<div class="entry-header clearfix">
		<h2 class="entry-title"><?php esc_html_e( 'Sorry, theres nothing here!', 'designership' ); ?></h2>
	</div><!-- .entry-header -->

	<div class="entry-content pb-2">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'designership' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can not find what you are looking for. Perhaps searching can help.', 'designership' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .entry-content -->

</article><!-- .no-results -->