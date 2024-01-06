<?php

namespace fwb\Modules\TestWidgets;

class TestWidgets extends \WP_Widget {
	function __construct() {
		parent::__construct(
			'simple_widget',
			'Простий віджет',
			array( 'description' => 'Простий віджет для виведення тексту' )
		);
	}

	/**
	 * Output the content of the widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Widget instance settings.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		echo '<p>Це текст віджета.</p>';
		echo $args['after_widget'];
	}

	/**
	 * Output the widget form in the admin.
	 *
	 * @param array $instance Widget instance settings.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Новий заголовок', 'text_domain' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	/**
	 * Update widget instance data.
	 *
	 * @param array $new_instance New settings for this instance.
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated instance settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}