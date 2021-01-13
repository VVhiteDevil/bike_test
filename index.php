<?php
get_header();
?>
	<div class="content container <?php if ( is_front_page() ) { echo 'frontpage'; } ?>">
		<div class="row">
			<div class="col-lg-9 content-col">
			<?php
			global $wp_query;
			$old_query = $wp_query;
			if ( is_front_page() ) {
			?> 
				<div class="content-topbar">
					<div class="post-counter">
						<?php
						echo ( wp_count_posts()->publish );
						?> posts found
					</div><!-- .post-counter -->
					
				</div><!-- .content-topbar -->
			<?php } ?>
				<div class="<?php if ( is_front_page() ) { echo 'content-wrapper-inner'; } else { echo 'content-wrapper-inner-other'; } ?>">
					<!-- Start the Loop. -->
					<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>	

					<?php if ( has_post_format( 'video' ) ) { ?>
						<div class="post post-video">
					<?php } else { ?>
						<div class="post">
					<?php } ?>
							<?php get_template_part( 'post-type/content', get_post_format() ); ?>
						</div> <!-- .post -->

					<?php } ?>
					<!-- Add pagination function -->

					<?php
					the_posts_pagination( array(
						'end_size' => 1,
						'prev_next' => true,
						'prev_text'    => __('<'),
						'next_text'    => __('>'),
					) );
					?>
					
					<?php } else { ?>

					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>


					<!-- REALLY stop The Loop. -->
					<?php } ?>
				</div><!-- .content-wrapper-inner -->
			</div><!-- .col-lg-9 -->
			<div class="col-lg-3 sidebar-right">
				<?php
				get_sidebar();
				?>
			</div><!-- .sidebar-right -->
		</div><!-- .row -->
			<?php $wp_query = $old_query; ?>
			<?php wp_reset_postdata(); ?>
	</div><!-- .content -->
<?php 
get_footer();