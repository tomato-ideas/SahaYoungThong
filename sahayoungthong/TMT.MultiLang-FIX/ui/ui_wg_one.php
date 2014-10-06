<?php

/*
 * TMT MultiLang Theme Function (widgets)
 * widgets
 *
 */

/*//////////////////////////////////////
 * actions
/*//////////////////////////////////////
add_action( 'widgets_init', 'testWidgetsTHENG' );  // ADD WIDGETS


/*//////////////////////////////////////
 * Function Register
/*//////////////////////////////////////

function testWidgetsTHENG() {
	register_widget( 'Test_WidgetsTHENG' );
}


/*//////////////////////////////////////
 * Name & Class & Id & Detail
/*//////////////////////////////////////

class Test_WidgetsTHENG extends WP_Widget {

	// function detail
	function Test_WidgetsTHENG() {
		$widget_ops = array( 'classname' => 'wgTHENG', 'description' => __('TEST DESCRIPTION', 'wgTHENG') );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'id-wgTHENG' );
		$this->WP_Widget( 'id-wgTHENG', __('Example testWidgetsTHENG', 'wgTHENG'), $widget_ops, $control_ops );
	}
	

/*//////////////////////////////////////
 * Detail form for use
/*//////////////////////////////////////
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;
		
		if(isset($_SESSION['lang'])){
			if( $_SESSION['lang']=="TH" ){
			//////////
				if ( $title )
					echo $before_title . $title . $after_title;
				if ( $name )
					printf( '<p>' . __('สวัสดี %1$s.', 'wgTHENG') . '</p>', $name );
					{
						?>
						<div style="width:10px;height:10px;background-color:red;"></div>
						<?php
					}
				if ( $show_info )
					printf( $name );
			//////////
			}else if( $_SESSION['lang']=="EN" ){
			//////////
				if ( $title )
					echo $before_title . $title . $after_title;
				if ( $name )
					printf( '<p>' . __('hello %1$s.', 'wgTHENG') . '</p>', $name );
					{
						?>
						<div style="width:10px;height:10px;background-color:red;"></div>
						<?php
					}
				if ( $show_info )
					printf( $name );
			//////////
			}
			} else {
				//echo "Session no value";
			//////////
				if ( $title )
					echo $before_title . $title . $after_title;
				if ( $name )
					printf( '<p>' . __('Hey their Sailor! My name is %1$s.', 'wgTHENG') . '</p>', $name );
					{
						?>
						<div style="width:10px;height:10px;background-color:red;"></div>
						<?php
					}
				if ( $show_info )
					printf( $name );
			//////////
			}
		
		echo $after_widget;
	}


/*//////////////////////////////////////
 * Update the widget 
/*//////////////////////////////////////
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title2'] = 'sss';
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}


/*//////////////////////////////////////
 * Detail form for admin
/*//////////////////////////////////////
	
	function form($instance) {
			$defaults = array( 'title' => __('Example', 'wgTHENG'), 'name' => __('Bilal Shaheen', 'wgTHENG'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
//Set up some default widget settings.

?>

		//Widget Title: Text Input.
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wgTHENG'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		//Text Input.
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Your Name:', 'wgTHENG'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>

		
		//Checkbox.
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_info'], true ); ?> id="<?php echo $this->get_field_id( 'show_info' ); ?>" name="<?php echo $this->get_field_name( 'show_info' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'show_info' ); ?>"><?php _e('Display info publicly?', 'wgTHENG'); ?></label>
		</p>

	<?php
	}	
	}	
?>