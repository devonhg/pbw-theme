<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */

?>
		
		</div>
	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'lower-sidebar' ) ) { ?>
		<div class="sidebar-lower" role="complementary">
			<?php dynamic_sidebar( 'lower-sidebar' ); ?>
		</div><!-- #primary-sidebar -->
	<?php } ?>
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer' ) ) { ?>
			<div class="sidebar-footer" role="complementary">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div><!-- #primary-sidebar -->
		<?php } ?>

		<div class="site-info">
			<sub>All website content &copy; <?php echo date('Y') . " " . get_bloginfo('name') ; ?> unless otherwise specified.</sub>
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
