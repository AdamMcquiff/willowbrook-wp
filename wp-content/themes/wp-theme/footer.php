	<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

		<div class="wrap cf">

			<nav role="navigation">
				<?php wp_nav_menu(array(
				'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
				'container_class' => 'footer__nav cf', 			// class of container (should you choose to use it)
				'menu' => __( 'Footer Links', 'wp-theme' ),   // nav name
				'menu_class' => 'nav cf',            			// adding custom nav class
				'theme_location' => 'footer-links',             // where it's located in the theme
				'before' => '',                                 // before the menu
				'after' => '',                                  // after the menu
				'link_before' => '',                            // before each link
				'link_after' => '',                             // after each link
				'depth' => 0,                                   // limit the depth of the nav
				'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
				)); ?>
			</nav>

			<p class="footer__copyright">&copy; <?php echo date('Y'); ?> | <?php bloginfo( 'name' ); ?></p>

		</div>

	</footer>

	<?php wp_footer(); ?>

</body>

</html>
