<div class="kl-clear-footer"></div>
<div class="container">
	<?php do_action('kl_sidebar', 'pre-footer-sidebar');?>
</div>
<footer id="kl-footer">
	<div class="container">
		<div class="kl-footer-inner">
			<?php
			/* FOOTER MENU */
			wp_nav_menu( array(
				'menu' 						=> 'footer',
				'theme_location' 	=> 'footer',
				'depth' 					=> 1,
				'container' 			=> false,
				'menu_class' 			=> 'footer-menu list-unstyled',
				'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
				'walker'          => new wp_bootstrap_navwalker()
			) );?>
			<div id="kl-copyright">
				<span>© 2020 <strong>KHABAR LAHARIYA.</strong> All Rights Reserved.</span>
			</div>
		</div>
		<div class="scroll-top"><a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a></div>
	</div>
</footer>
<?php wp_footer();?>
</body>
</html>
