<?php
global $wpdb;
/*//////////////////////////////////////
 * theme include file
/*//////////////////////////////////////
require_once('session.php'); // SESSION
require_once('service/service_sql_install.php'); // INSTALL TABLE
require_once('ui/ui_admin-tab.php'); // UI ADMIN TAB
require_once('ui/ui_admin-feature-img.php');
require_once('ui/ui_admin-menu.php'); // UI ADMIN MENU

require_once('ui/ui_the_title.php'); // UI TITLE 2NDFN FUNCTION
require_once('ui/ui_get_the_title.php'); // UI GET TITLE 2NDFN FUNCTION
require_once('ui/ui_the_content.php'); // UI CONTENT 2NDFN FUNCTION
require_once('ui/ui_the_post_thumbnail.php'); // UI FEA2ND 2NDFN FUNCTION
require_once('ui/ui_wp_nav_menu.php'); // UI NAV MENU 2NDFN FUNCTION

//require_once('ui/ui_wg_one.php'); // UI WIDGETS 1
//require_once('ui/ui_wg_two.php'); // UI WIDGETS 2
require_once('ui/ui_wg_pages.php'); // UI WIDGETS PAGES MULTILANG

/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////
define('TMTMULTILANG_DB_VERSION', 1);


/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////
define('TMTMULTILANG_DB_TABLE', $wpdb->prefix."posts");


/*//////////////////////////////////////
 * theme installation hook
/*//////////////////////////////////////

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	sv_install_multilang();
}

//function ddt_theme_activation_hook(){
    //sv_install_multilang();
//}


/*//////////////////////////////////////
 * theme uninstallation hook
/*//////////////////////////////////////

//function ddt_theme_deactivation_hook(){

//}

/*------------------------------------------- start.PART UI-ADMIN TMT MutiLang FIX -------------------------------------------*/

/*//////////////////////////////////////
 * theme add menu
/*//////////////////////////////////////

/*
function tmt_multilang_admin_menu(){
	add_menu_page( 
		'custom menu title', 'TMT.MultiLang', 
		'edit_published_posts', 'tmt_multilang', 
		'custom_tmt_multilang_page', get_bloginfo('template_url') .'/TMT.MultiLang-FIX/images/tmt_multilang-logo.png', 100 );
}
*/


/*//////////////////////////////////////
 * theme page TMT MutiLang EditAllPage // TAB 2ND
/*//////////////////////////////////////
function my_second_editor() {
	ui_admin_tab();
}

	
/*//////////////////////////////////////
 * theme page TMT MutiLang EditAllPage // FEATURE IMAGES 2ND
/*//////////////////////////////////////
function my_second_feature_img() {
	$types = array( "post", "page", "custom-type" );
	foreach( $types as $type ) {
    	add_meta_box("featured2nd", "Featured Image English", "ui_admin_feature_img", $type, "normal", "high");
    	// require_once ui_admin_feature_img();
    }        
}


/*//////////////////////////////////////
 * theme page TMT MutiLang EditAllPage // CHANGE NAME FEATURE IMAGES 1ST
/*//////////////////////////////////////
function change_name_fea1st() {
	$types = array( "post", "page", "custom-type" );
	foreach( $types as $type ) {
   		remove_meta_box( 'postimagediv', $type, 'side' );
		add_meta_box('postimagediv', 'Featured Image Thai', 'post_thumbnail_meta_box', $type, 'normal', 'high');

    }        
}


/*//////////////////////////////////////
 * theme page TMT MutiLang Menu
/*//////////////////////////////////////
function custom_tmt_multilang_page(){
	ui_admin_multilang();
	//add_meta_box("slider", "IMG - SlideHome", "slider_img", "slidehome", "normal", "high");
}

/*------------------------------------------- end.PART UI-ADMIN TMT MutiLang FIX -------------------------------------------*/

/*------------------------------------------- start.PART UI-2NDFN TMT MutiLang FIX -------------------------------------------*/

/*//////////////////////////////////////
 * Ui Title Function 2nd
/*//////////////////////////////////////
function the_title_tmt($id){
	ui_the_title($id);
}


/*//////////////////////////////////////
 * Ui Get Title Function 2nd
/*//////////////////////////////////////
function get_the_title_tmt($id){
	ui_get_the_title($id);
}


/*//////////////////////////////////////
 * Ui Content Function 2nd
/*//////////////////////////////////////
function the_content_tmt($id){
	ui_the_content($id);
}


/*//////////////////////////////////////
 * Ui Featured IMG Function 2nd
/*//////////////////////////////////////
function the_post_thumbnail_tmt($id){
	ui_the_post_thumbnail($id);
}


/*//////////////////////////////////////
 * Ui Nav Menu Function 2nd
/*//////////////////////////////////////
function wp_nav_menu_tmt($args = array()){
	ui_wp_nav_menu($args = array());
}


/*//////////////////////////////////////
 * Ui widgets pages Function 2nd
/*//////////////////////////////////////
function testWidgets(){
	ui_widgets_pages_multilang();
}

/*------------------------------------------- end.PART UI-2NDFN TMT MutiLang FIX -------------------------------------------*/

/*------------------------------------------- start.PART REGISTER & INCLUDE TMT MutiLang FIX -------------------------------------------*/

function add_styles() {
	wp_enqueue_style('tmt_multilang_admin_css', get_bloginfo('template_url').'/TMT.MultiLang-FIX/css/ui_admin.css');
}

function add_scripts() {
// JS URL
	$url_mtlf = get_bloginfo('template_url');
?>
	<script type="text/javascript">
		var url_select_one_mtlf = '<?php echo $url_mtlf ?>/TMT.MultiLang-FIX/service/service_sql_select_one.php';
		var url_update_mtlf = '<?php echo $url_mtlf ?>/TMT.MultiLang-FIX/service/service_sql_update.php';
	</script>
<?php
// JS URL 
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('tmt_multilang_admin_css', get_bloginfo('template_url').'/TMT.MultiLang-FIX/js/ui_admin-tab.js');
}


/*//////////////////////////////////////
 * actions
/*//////////////////////////////////////
/* /add_action('admin_init', 'tmt_multilang_init' ); */
//add_action('admin_menu', 'tmt_multilang_admin_menu'); // MENU ADMIN
add_action( 'edit_form_advanced', 'my_second_editor' ); // ADD TAB POST & MEDIA
add_action( 'edit_page_form', 'my_second_editor' ); // ADD TAB PAGE
add_action( 'admin_init', 'my_second_feature_img' ); // ADD FEATURED IMAGE 2ND
add_action('do_meta_boxes', 'change_name_fea1st'); // REMOVE & ADD & CHANGE NAME FEATURED IMAGE ORIGINAL

add_action('admin_init', 'add_styles'); // ADD ADMIN STYLE
add_action('admin_enqueue_scripts', 'add_scripts'); // ADD ADMIN SCRIPT

//add_action( 'widgets_init', 'testWidgets' );  // ADD WIDGETS


/*//////////////////////////////////////
 * theme check install/uninstall
/*//////////////////////////////////////

//ddt_theme_activation_hook('desert_default','ddt_theme_activate');
//ddt_theme_deactivation_hook('desert_default','ddt_theme_deactivate');  
  
/*------------------------------------------- end.PART REGISTER & INCLUDE TMT MutiLang FIX -------------------------------------------*/

?>
