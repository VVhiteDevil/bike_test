<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php wp_get_document_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="descrption" content="Test Bike">
	<meta name="author" content="SitePoint">
	<?php 
	wp_head(); 
	?>
</head>
<body>
	<div id="to-top">
		<div class="header">
			<div class="bg">
				<div class="header-top">
					<div id="testbike-header-first">
						<div class="container bike-block">
							<div id="testbike-header-first-name">
								<img id="main-site-logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
								<a class="navbar-brand" id="top-header-text" href="/"><?php echo get_bloginfo(); ?></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
							</div>
							<div id="testbike-hearder-search-form"><?php get_search_form(); ?></div>
						</div>	
					</div>
					<div id="testbike-header-second">
						<div class="container">
							<?php 
									wp_nav_menu( array(
										'menu_class'      => 'menu',
										'theme_location'  => 'first',
										'menu_id'         => 'bike-header-top-menu',
									) );
							?>
						</div>	
					</div>
				</div><!-- .header-top container -->
			</div><!-- .bg -->
			<?php if ( ! is_404() && ! is_search() ) {?> 
				<div class="slider">
				<?php
				global $wp_querry;
				$old_querry = $wp_querry;
				$args = array(
					'post_type'  => 'post',
					'meta_query' => array(
						array(
							'key'   => 'display_in_slider',
							'value' => '1',
						)
					)
				);
				$slider_posts = get_posts( $args );
				if( ! empty( $slider_posts ) ) { ?>
					<div id="bike-header-slider" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php
							foreach( $slider_posts as $key => $value ) {
								setup_postdata( $value );
								$post = $value;
								$attachment_id = get_post_thumbnail_id( $post->ID );
								if( empty( $attachment_id ) ) {
									continue;
								}
								$attachment_src = wp_get_attachment_image_src( $attachment_id, 'full' );
							?>
								<div style="background-image: url(<?php echo "$attachment_src[0]" ?>)" class="carousel-item <?php if( 0 == $key ) echo 'active'; ?>">
									<div class="container slider-container">
										<div class="bike-slider-container">
											<div class="slider-post-title">
												<?php
												the_title();
												?>
											</div>
											<div class="slider-post-description">
												<?php
												the_excerpt();
												?>
											</div>
											<div class="slider-post-button">
												<a href="<?php the_permalink(); ?>" rel="bookmark">Read more</a>
											</div>
											<!-- <div class="copyright">
												<?php /*echo get_featured_image_copyright();*/ ?>
											</div> -->
										</div><!-- .bike-slider-container -->
									</div><!-- .slider-container -->
								</div><!-- .carousel-item -->
							<?php 
							}
							?>
						</div><!-- .carousel-inner -->
						<a class="carousel-control-prev" href="#bike-header-slider" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a><!-- .carousel-control-prev -->
						<a class="carousel-control-next" href="#bike-header-slider" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a><!-- .carousel-control-next -->
					</div><!-- .carousel .slide -->
				<?php }			
				$wp_querry = $old_querry; 
				?>
				</div><!-- .slider -->
			<?php } else {?>
				<div></div>
			<?php } ?>
		</div><!-- .header -->
		<div class="content-wrapper">