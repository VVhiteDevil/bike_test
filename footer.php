		</div><!-- .content-wrapper -->
		<div class="footer container-fluid">
			<div class="footer-top container-fluid container">
			<div class="row footer-wrapper-row">
					<div class="footer-about-us col-lg-3">
						<div class="about-footer-text">
							<div class="sidebar">
								<?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) { ?>
									<div id="sidebar-footer-left">
										<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
									</div>
								<?php } ?>
							</div><!-- .sidebar -->
						</div><!-- .about-footer-text -->
					</div><!-- .footer-about-us -->
					<div class="footer-contacts col-lg-3">
						<div class="footer-contacts-section">
							<div class="sidebar">
								<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
								<div id="sidebar-footer-right">
									<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
								</div>
								<?php } ?>
							</div><!-- .sidebar -->
						</div><!-- .footer-contacts-section -->
					</div><!-- .footer-contacts -->
					<div class="footer-sidebar col-lg-3">
						<h2 class="footer-heading">
							Menu
						</h2>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'second',
						) );
						?>
					</div><!-- .footer-sidebar -->
					<div class="footer-blog col-lg-3">
						<div class="sidebar">
							<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
								<div id="sidebar-footer-right">
									<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
								</div>
							<?php } ?>
						</div><!-- .sidebar -->		
					</div><!-- .footer-blog -->
				</div>
			</div>
			<div class="footer-bottom container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<p>
								<?php
								_e('Copyright','bike');
								?> &copy; <?php echo date('Y');?> &middot; <?php _e('All Rights Reserved','bike'); ?>
							</p>
						</div>
						<div class="col-lg-4">
							<a id="to-top-btn" href="#to-top"><i class="fas fa-angle-up"></i></a>
						</div>
						<div class="col-lg-4">
							<p>
								Theme by BestWebSoft
							</p>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .footer-bottom -->
		</div><!-- .footer -->
	</div><!-- .container -->
	<?php
	wp_footer();
	?>
</body>
</html>
