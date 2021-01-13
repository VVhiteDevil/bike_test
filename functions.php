<?php 
function testbike_setup(){
	add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'first'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
        'second' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
    ) );
	add_theme_support( 'html5', array(
        'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
    add_theme_support( 'custom-background', apply_filters( 'bike_custom_background_args',
    	array(
        	'default-color'      => '#FFF',
        	'default-attachment' => 'fixed',
    	)
    ) );
    /** custom header **/
	$args = array(
        'default-image'      => false,
        'default-text-color' => 'fff',
        'width'              => 400,
        'height'             => 90,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
    /** custom logo **/
    $defaults = array(
		'height'      => 45,
		'width'       => 200,
		'flex-height' => false,
		'flex-width'  => false,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 80,
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
        'unlink-homepage-logo' => false, 
    ] );
    add_theme_support( 'html5', array( 'search-form' ) );
    if( session_id() == '' ) {
        session_start();
    }
}

function bike_register_widgets() {
	register_sidebar( array(
        'name'          => __( 'Right sidebar', 'bike' ),
        'id'            => 'right-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'bike' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 1 widget', 'bike' ),
        'id'            => 'footer-sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages in left footer.', 'bike' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 2 widget', 'bike' ),
        'id'            => 'footer-sidebar-2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages in right footer.', 'bike' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer 3 widget', 'bike' ),
        'id'            => 'footer-sidebar-3',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages in right footer.', 'bike' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
	) );
	/** widget registration **/
    register_widget( 'Bike_Contact_Widget' );
    register_widget( 'Bike_About_Widget' );
	register_widget( 'Bike_Recent_Posts' );	
}
class Bike_Contact_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'bike_contact_widget',  // Base ID
            'contact_widget'   // Name
        );
 
    }
 
    public $args = array(
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        echo '<div class="textwidget">';
        echo '<span class="footer-info"><i class="fas fa-phone-square-alt"></i><a href="tel:';
        echo esc_html__( $instance['phone'], 'bike' );
        echo '">';
        echo esc_html__( $instance['phone'], 'bike' );
        echo'</a></span>';
        echo '<span class="footer-info"><i class="fab fa-skype"></i><a href="skype:';
        echo esc_html__( $instance['skype'], 'bike' );
        echo '">';
        echo esc_html__( $instance['skype'], 'bike' );
        echo'</a></span>';
        echo '<span class="footer-info"><i class="far fa-envelope"></i><a href="mailto:';
        echo esc_html__( $instance['mail'], 'bike' );
        echo '">';
        echo esc_html__( $instance['mail'], 'bike' );
        echo '</a></span>';
        echo '<span class="footer-info">';
        echo esc_html__( $instance['address'], 'bike' );
        echo '</span>';
        echo '</div>';
        
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Contacts', 'bike' );
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
        $skype = ! empty( $instance['skype'] ) ? $instance['skype'] : '';
        $mail = ! empty( $instance['mail'] ) ? $instance['mail'] : '';
        $address = ! empty( $instance['address'] ) ? $instance['address'] : '';
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'bike' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php echo esc_html__( 'Phone:', 'bike' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>"><?php echo esc_html__( 'Skype:', 'bike' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'skype' ) ); ?>" type="text" value="<?php echo esc_attr( $skype ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>"><?php echo esc_html__( 'Mail:', 'bike' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mail' ) ); ?>" type="text" value="<?php echo esc_attr( $mail ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php echo esc_html__( 'Address:', 'bike' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $address ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['phone'] = ( !empty( $new_instance['phone'] ) ) ? $new_instance['phone'] : '';
        $instance['skype'] = ( !empty( $new_instance['skype'] ) ) ? $new_instance['skype'] : '';
        $instance['mail'] = ( !empty( $new_instance['mail'] ) ) ? $new_instance['mail'] : '';
        $instance['address'] = ( !empty( $new_instance['address'] ) ) ? $new_instance['address'] : '';
        
        return $instance;
    }
 
}

class Bike_About_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'bike_about_widget',  // Base ID
            'Bike About Widget'   // Name
        );
 
    }
 
    public $args = array(
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>'
    );
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget footer-info-about">';
        echo esc_html__( $instance['texts'], 'bike' );
        echo '</div>';

        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Title', 'bike' );
        $texts = ! empty( $instance['texts'] ) ? $instance['texts'] : '';
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'bike' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'texts' ) ); ?>"><?php echo esc_html__( 'Texts:', 'bike' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'texts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'texts' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $texts ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['texts'] = ( !empty( $new_instance['texts'] ) ) ? $new_instance['texts'] : '';
        
        return $instance;
    }
 
}

class Bike_Recent_Posts extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'bike_widget_recent_entries',
			'description'                 => __( 'Your site&#8217;s most recent Posts.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'bike-recent-posts', __( 'Bike Recent Posts' ), $widget_ops );
		$this->alt_option_name = 'bike_widget_recent_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Bike Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$show_text = isset( $instance['show_text'] ) ? $instance['show_text'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_post ) { ?>
				<?php
				$post_title   = get_the_title( $recent_post->ID );
				$title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
				$aria_current = '';
                /*add img*/
                $attachment_id = get_post_thumbnail_id( $recent_post->ID );
                /*end add img*/
				if ( get_queried_object_id() === $recent_post->ID ) {
					$aria_current = ' aria-current="page"';
				}
				?>
				<li class="post-item">
                    <a href="<?php the_permalink( $recent_post->ID ); ?>" class="post-img" <?php echo $aria_current; ?>>
                        <?php
                        echo wp_get_attachment_image( $attachment_id, array('80', '80') );
                        ?>
                    </a>
                    <div class="sidebar-recent-post-info">
                        <a href="<?php the_permalink( $recent_post->ID ); ?>" class="post-title-link" <?php echo $aria_current; ?>>
                            <h3 class="recent-post-span">
                                <?php echo $title; ?>
                            </h3>
                        </a>
                        <?php if ( $show_date ) { ?>
                            <span class="post-date"><?php echo esc_html( human_time_diff( get_the_date( 'U', $recent_post->ID ), current_time('U') ) ) . ' ago'; ?></span>
                        <?php } ?>
                        <?php if ( $show_text ) { ?>
                            <div class="post-text"><?php echo get_the_excerpt( $recent_post->ID ); ?></div>
                        <?php } ?>
                    </div>
				</li>
			<?php } ?>
		</ul>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_text'] = isset( $new_instance['show_text'] ) ? (bool) $new_instance['show_text'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_text = isset( $instance['show_text'] ) ? (bool) $instance['show_text'] : false;
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_text ); ?> id="<?php echo $this->get_field_id( 'show_text' ); ?>" name="<?php echo $this->get_field_name( 'show_text' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_text' ); ?>"><?php _e( 'Display post content?' ); ?></label></p>

		<?php 
	}
}

function bike_post_per_page( $query ) {
    // if( isset( $_POST['posts_per_page'] ) ) {
    //     $_SESSION['counter'] = $_POST['posts_per_page'];        
    // }
    if( isset( $_POST['sort_by'] ) ) {
        $_SESSION['sorting'] = $_POST['sort_by'];        
    }
    if ( ! is_admin() && $query->is_main_query() && isset( $_SESSION['counter'] ) && isset( $_SESSION['sorting'] ) ) {
        $query->set( 'posts_per_page', $_SESSION['counter'] );
        $query->set( 'orderby', $_SESSION['sorting'] );
    }
}

function bike_excerpt_length( $length ) {
    return 25; 
}
add_filter( 'excerpt_length', 'bike_excerpt_length' );

function bike_navigation_template( $template, $class ) {
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
add_filter('navigation_markup_template', 'bike_navigation_template', 10, 2 );

function testbike_enqueue_style() {
    wp_enqueue_style( 'bike_style', get_stylesheet_uri() );
    wp_enqueue_style( 'bike_bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0', 'all');
    wp_enqueue_style( 'bike_fontawesome_style', get_template_directory_uri() . '/css/all.css', array(), '1.0', 'all');
    wp_enqueue_script( 'bike_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.js' , array( 'jquery' ) , '1.0', true   );
    wp_enqueue_script( 'bike_script', get_template_directory_uri() . '/js/script.js' , array() , '1.0', true   );
    wp_enqueue_script( 'bike_fontawesome_script', get_template_directory_uri() . '/js/all.js' , array() , '1.0', true   );
}

add_action( 'widgets_init', 'bike_register_widgets' );
add_action( 'after_setup_theme', 'testbike_setup' ); 
add_action( 'wp_enqueue_scripts', 'testbike_enqueue_style' );
add_action( 'pre_get_posts', 'bike_post_per_page' ); 