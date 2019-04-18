<?php
class Search_Posts extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'search-posts',
			'description' => 'Search Posts',
		);
		parent::__construct( 'search_posts', 'Search Posts', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) { 
	?>
		<form class="general-form search-form search-form-1" action="<?php echo home_url();?>" method="GET">
			<input type="search" placeholder="Search" name="s">
			<div class="submit-wrap">
				<input type="submit" value="submit">
			</div>
		</form>
	<?php
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'Search_Posts' );
});

class Latest_News extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'latest-news',
			'description' => 'Latest News',
		);
		parent::__construct( 'latest_news', 'Latest News', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$args1 = array(
			'post_type' => 'post',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 3,
		);
		$query = new WP_Query( $args1 );
		if($query->have_posts()) {
	?>
	<div class="news-post">
		<h2 class="h3">Latest News</h2>
		<ul>
			<?php while($query->have_posts()): $query->the_post();?>
			<li>
				<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile; 
				wp_reset_query();
			?>
		</ul>
	</div>
	<?php } 
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'Latest_News' );
});

class Fee_Structure extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'fee-structure',
			'description' => 'Fee Structure',
		);
		parent::__construct( 'fee_structure', 'Fee Structure', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		
	?>
	<div class="fee-structure">
		<a href="<?php echo $instance['link'];?>" class="btn btn-primary">Fee structure</a>
	</div>
	<?php 
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin

		$link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( 'New Link', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_attr_e( 'Link:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		</p>
	<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'Fee_Structure' );
});

class View_Result extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'view-result',
			'description' => 'View Result',
		);
		parent::__construct( 'view_result', 'View Result', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		
	?>
	<div class="view-result">
		<a href="<?php echo $instance['result_link'];?>" class="btn btn-primary">View Results</a>
	</div>
	<?php 
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$result_link = ! empty( $instance['result_link'] ) ? $instance['result_link'] : esc_html__( 'New Result Link', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'result_link' ) ); ?>"><?php esc_attr_e( 'Result Link:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'result_link' ) ); ?>" type="text" value="<?php echo esc_attr( $result_link ); ?>">
		</p>
	<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['result_link'] = ( ! empty( $new_instance['result_link'] ) ) ? strip_tags( $new_instance['result_link'] ) : '';

		return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'View_Result' );
});



