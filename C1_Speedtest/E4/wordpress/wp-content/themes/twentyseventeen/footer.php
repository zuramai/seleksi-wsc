<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

if ( ! function_exists( 'is_plugin_active' ) ) {
    function is_plugin_active( $plugin ) {
        return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
    }
}
?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
				<?php if ( is_plugin_active( 'social.php' ) ): ?>
					<div class="buttons">
						<div class="button facebook"><i class="fab fa-facebook-f"></i></div>
						<div class="button pinterest"><i class="fab fa-pinterest"></i></div>
						<div class="button twitter"><i class="fab fa-twitter"></i></div>
						<div class="button tumblr"><i class="fab fa-tumblr"></i></div>
					</div>
				<?php endif; ?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
