	
			</div><!-- . main-wrapper -->

			<footer id="site-footer" class="full-width">
				<div class="content-width content-max-width-1200" id="footer-content-wrapper">
				
					<div class="full-width pad-v-30">
						<?php get_search_form(); ?>
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu' ) ); ?>
					</div>
					
				</div>
			</footer>

		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>

</html>