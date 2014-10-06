<?php

/*
 * TMT MultiLang Theme Function (2nd menu multilang for theme)
 * 2nd nav menu function.
 *
 */
 
/*//////////////////////////////////////
 * EXTENDS FUNCTION WALKER_NAV_MENU (MENU)
/*//////////////////////////////////////
 
 class My_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		//echo $item->ID;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
/*//////////////////////////////////////
 * WPDB GET POST_TITLE_TMT
/*//////////////////////////////////////		

		global $wpdb;
		$wpposts = $wpdb->get_results("SELECT * FROM $wpdb->postmeta");
		foreach($wpposts as $posts){
			$chk_posttype = $posts->post_id; // wpdb
			$chk_itemid = $item->ID; // extend function
			if($chk_posttype == $chk_itemid){
				$chk_metakey = $posts->meta_key;
				if($chk_metakey === '_menu_item_object_id'){
					$chk_metaval = $posts->meta_value;
					$wpposts2 = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE  ID = $chk_metaval ");
					foreach($wpposts2 as $posts2){
						$nameMulti = $posts2->post_title_tmt;
					}
				}
			}
		}

/*//////////////////////////////////////
 * EXTENDS FUNCTION WALKER_NAV_MENU (MENU)
/*//////////////////////////////////////			
	
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $nameMulti, $item->ID ) . $args->link_after;
		$item_output .= '</a><span class="sub">' . $item->attr_title. '</span>'; /* This is where I changed things. */
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
 
function ui_wp_nav_menu(){
	$walker = new My_Walker;
	wp_nav_menu(array(
	    'echo' => true,
		'container' => '',
		'theme_location' => '',
		'menu_class' => '',
		'walker' => $walker
	));
}

function wp_nav_menu_tmt_s($args = array()){
	$tl =  $args['theme_location'];
	$mc = $args['menu_class'];
	$walker = new My_Walker;
	wp_nav_menu(array(
	    'echo' => true,
		'container' => '',
		'theme_location' => ''.$tl.'',
		'menu_class' => ''.$mc.'',
		'walker' => $walker
	));
}
?>