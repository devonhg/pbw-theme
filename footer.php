<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */

?>

	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'lower-sidebar' ) ) { ?>
		<div class="sidebar-lower" role="complementary">
			<?php dynamic_sidebar( 'lower-sidebar' ); ?>
		</div><!-- #primary-sidebar -->
	<?php } ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php /*
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', '_s' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php  printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); */?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
