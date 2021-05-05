<?php
 /**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_widget
 * @package trustnews
 */

 class TrustNews_blog_category_posts extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_block_category_section', 'description' => esc_html__( 'Display single blog column in home page', 'trustnews') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name=esc_html__('T-Spiral: Blog Category Posts','trustnews'), $widget_ops, $control_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$no_of_posts = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : 4;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		$latest_posts = ! empty( $instance['latest_posts'] ) ? esc_attr( $instance['latest_posts'] ) : 'latest';
		$category = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 'category';
	?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>"><?php esc_html_e( 'Number of posts:', 'trustnews' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'no_of_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'no_of_posts' )); ?>" type="text" value="<?php echo absint( $no_of_posts ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>"><?php esc_html_e( 'Title:', 'trustnews' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_title' )); ?>" type="text" value="<?php echo esc_attr( $posts_title ); ?>">
		</p>
		<p><input type="radio" <?php checked(esc_attr($latest_posts), 'latest'); ?> id="<?php echo $this->get_field_id( 'latest_posts' ); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts' )); ?>" value="latest"/><?php esc_html_e( 'Latest Posts', 'trustnews' );?>
			<br>
		 <input type="radio" <?php checked(esc_attr($latest_posts), 'category'); ?> id="<?php echo esc_attr($this->get_field_id( 'latest_posts' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'latest_posts' )); ?>" value="category"/><?php esc_html_e( 'Show Category posts', 'trustnews' );?>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Select category', 'trustnews' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>esc_html__('-- Select -- ','trustnews'),'name' => esc_attr($this->get_field_name( 'category' )), 'selected' => esc_attr($category) ) ); ?>
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['no_of_posts'] = ( ! empty( $new_instance['no_of_posts'] ) ) ? absint( $new_instance['no_of_posts'] ) : '';
		$instance[ 'posts_title' ] = sanitize_text_field($new_instance[ 'posts_title' ]);
		$instance[ 'latest_posts' ] = sanitize_text_field($new_instance[ 'latest_posts' ]);
		$instance[ 'category' ] = absint($new_instance[ 'category' ]);

		return $instance;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {
		extract($args);
		$no_of_posts = ( ! empty( $instance['no_of_posts'] ) ) ? absint( $instance['no_of_posts'] ) : 4;
		$posts_title = ! empty( $instance['posts_title'] ) ? esc_attr( $instance['posts_title'] ) : '';
		$latest_posts = ! empty( $instance['latest_posts'] ) ? esc_attr( $instance['latest_posts'] ) : 'latest';
		$category = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 'category';
		$excerpt_display = get_theme_mod('excerpt-display','excerpt-content');
		$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','trustnews'));

		echo $before_widget;
		if(!empty($posts_title) ){ ?>
			<h2 class="widget-title"><?php echo esc_html($posts_title); ?></h2>
		<?php } ?>
		<div class="block-category-section-outer">
		
			<?php
			if( $latest_posts == 'latest' ) {
				$get_posts = new WP_Query( array(
					'posts_per_page' 			=> absint($no_of_posts),
					'post_type'					=> 'post',
					'ignore_sticky_posts' 	=> true
				) );
			}
			else {
				$get_posts = new WP_Query( array(
					'posts_per_page' 			=> absint($no_of_posts),
					'post_type'					=> 'post',
					'category__in'				=> absint($category)
				) );
			}

			while( $get_posts-> have_posts() ) : $get_posts->the_post(); ?>
			<div class="block-category-section-inner">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="block-category-section-thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('trustnews-blog'); ?></a>
					 </div><!-- .block-category-section-thumbnail -->
				<?php } ?>
				<div class="block-category-section-content">
					<div class="block-category-section-meta">
						<?php trustnews_cat_lists (); ?>
					</div><!-- .block-category-section-meta -->
					<h2 class="block-category-section-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="block-category-section-meta">
						<?php

							trustnews_posted_by();

							trustnews_posted_on();

							trustnews_comment_links();

						?>
					</div><!-- .block-category-section-meta -->
					<div class="block-category-text">
						<?php
							if($excerpt_display == 'full-content'){
								the_content( sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									$excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							) );
							} else {
								the_excerpt();
							}
						?>
						
					</div><!-- .block-category-text -->
				</div><!-- .block-category-section-content -->
			</div><!-- .block-category-section-inner -->
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div><!-- .block-category-section-outer -->
		<?php echo $after_widget . '<!-- .widget_block_category_section -->';
	}

}