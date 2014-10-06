<?php
global $wpdb;
/*//////////////////////////////////////
 * theme include file
/*//////////////////////////////////////
require_once('service/service_sql_install.php'); // INSTALL TABLE
require_once('ui/ui_admin-contact-methods.php'); // UI CONTACT
require_once('ui/ui_admin-menu.php'); // UI ADMIN MENU

/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////
define('TMTMEMBERS_DB_VERSION', 1);


/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////
define('TMTMEMBERS_DB_TABLE', $wpdb->prefix."users");


/*//////////////////////////////////////
 * theme installation
/*//////////////////////////////////////
function tmt_theme_members_activation(){
    sv_install_members();
}


/*//////////////////////////////////////
 * theme uninstallation
/*//////////////////////////////////////
function tmt_theme_members_deactivation(){

}

/*------------------------------------------- start.PART UI-ADMIN TMT Members -------------------------------------------*/

/*//////////////////////////////////////
 * theme add menu
/*//////////////////////////////////////
function tmt_members_admin_menu(){
	add_menu_page( 
		'custom menu title', 'TMT.Products', 
		'edit_published_posts', 'tmt_members', 
		'custom_tmt_members_page', get_bloginfo('template_url') .'/TMT.Products/images/tmt_products-logo.png', 101 );	
}

function tmt_members_admin_brand(){
	add_menu_page( 
		'custom menu title', 'TMT.Brands', 
		'edit_published_posts', 'tmt_brand', 
		'custom_tmt_brand_page', get_bloginfo('template_url') .'/TMT.Products/images/tmt_brands-logo.png', 102 );
}
/*//////////////////////////////////////
 * theme page TMT Members Menu
/*//////////////////////////////////////
function custom_tmt_members_page(){
	ui_admin_members();
}
function custom_tmt_brand_page(){
	ui_admin_brand();
}


/*//////////////////////////////////////
 * theme page TMT Members Medthods
/*//////////////////////////////////////
function modify_contact_methods($profile_fields) {
	ui_admin_contact_methods();
	return $profile_fields;
	// Add a default avatar to Settings > Discussion
}

if ( !function_exists('df_addgravatar') ) {
	function df_addgravatar( $avatar_defaults ) {
		$myavatar = get_bloginfo('template_directory') . '/TMT.Products/images/ecq.png';
		$avatar_defaults[$myavatar] = 'ECq Default';
		return $avatar_defaults;
	}

	add_filter( 'avatar_defaults', 'df_addgravatar' );
}

/*------------------------------------------- end.PART UI-ADMIN TMT Members -------------------------------------------*/

/*------------------------------------------- start.PART REGISTER & INCLUDE TMT Members -------------------------------------------*/

/*//////////////////////////////////////
 * actions & filter
/*//////////////////////////////////////
add_action('admin_menu', 'tmt_members_admin_brand');
add_action('admin_menu', 'tmt_members_admin_menu'); // MENU ADMIN
add_filter('user_contactmethods', 'modify_contact_methods'); // ADD PROFILE FIELD

//add_menu_page( 'twitter_menu', 'Twitter', $capability, 'twitter', $function, $icon_url, $position ); 
/*//////////////////////////////////////
 * theme check install/uninstall
/*//////////////////////////////////////
tmt_theme_members_activation('desert_default');
tmt_theme_members_deactivation('desert_default');  
 
/*------------------------------------------- end.PART REGISTER & INCLUDE TMT Members -------------------------------------------*/
function tmt_pageIndex_register_admin_scripts() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('tmt_pageindex_uploader', get_bloginfo('template_url').'/TMT.Products/js/upload-media.js', array('jquery','media-upload', 'thickbox'));
    }
 
    function tmt_pageIndex_register_admin_styles() {
        wp_enqueue_style('thickbox');
    }
function tmt_products_add_admin_defalut_styles() {
		wp_enqueue_style('tmt_products_admin_default_css', get_bloginfo('template_url').'/TMT.Products/css/ui_adminDefault.css');
	}	


/*//////////////////////////////////////
 * actions & filter
/*//////////////////////////////////////

	add_action('admin_head', 'tmt_products_add_admin_defalut_styles'); // ADD ADMIN DEFAULT STYLES 
	add_action('admin_print_scripts', 'tmt_pageIndex_register_admin_styles');
	add_action('admin_print_styles', 'tmt_pageIndex_register_admin_scripts');
?>
