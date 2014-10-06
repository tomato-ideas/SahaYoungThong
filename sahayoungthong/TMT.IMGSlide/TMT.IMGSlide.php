<?php
global $wpdb;

/*//////////////////////////////////////
 * theme include file
/*//////////////////////////////////////

	require_once('service/service_sql_install.php'); // INSTALL TABLE
	require_once('ui/ui_admin-menu.php'); // UI ADMIN MENU
	require_once('ui/ui_user_slider.php'); // UI USER SLIDER


/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////
	
	define('TMTIMGSLD_DB_VERSION', 1);


/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////
	
	define('TMTIMGSLD_DB_TABLE', $wpdb->prefix."img_slide");


/*//////////////////////////////////////
 * theme installation
/*//////////////////////////////////////
	
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
		sv_install_imgSlide();
	}


/*//////////////////////////////////////
 * theme uninstallation
/*//////////////////////////////////////
	
	/*
function tmt_theme_imgSlide_deactivation(){
	
	}
*/


/*------------------------------------------- start.PART UI-ADMIN TMT IMG Slide -------------------------------------------*/

/*//////////////////////////////////////
 * theme add menu
/*//////////////////////////////////////
	
	function tmt_imgSlide_admin_menu(){
		add_menu_page( 
			'custom menu title', 'TMT.IMG Slide', 
			'edit_published_posts', 'tmt_imgSlide', 
			'custom_tmt_imgSlide_page', get_bloginfo('template_url') .'/TMT.IMGSlide/images/tmt_imgSlide-logo.png', 110 );
	}


/*//////////////////////////////////////
 * theme page TMT IMG Slide Menu
/*//////////////////////////////////////

	function custom_tmt_imgSlide_page(){
		ui_admin_imgSlide();
	}


/*------------------------------------------- end.PART UI-ADMIN TMT IMG Slide -------------------------------------------*/
/*------------------------------------------- start.PART UI-USER TMT IMG Slide -------------------------------------------*/

/*//////////////////////////////////////
 * PHP IMG SLIDE
/*//////////////////////////////////////

	function tmt_imgSlide_slider() {
		ui_user_imgSlide();
	}


/*//////////////////////////////////////
 * SHORTCODE IMG SLIDE
/*//////////////////////////////////////

	function tmt_imgSlide_shortcode($atts) {
		extract(shortcode_atts(array(
		// 'name' => 'slide'
			), $atts));
			
		tmt_imgSlide_slider();
	}

/*------------------------------------------- end.PART UI-USER TMT IMG Slide -------------------------------------------*/

/*------------------------------------------- start.PART REGISTER & INCLUDE TMT IMG Slide -------------------------------------------*/

	function tmt_imgSlide_add_styles() {
		wp_enqueue_style('tmt_imgSlide_admin_css', get_bloginfo('template_url').'/TMT.IMGSlide/css/ui_admin.css');
	}

	function tmt_imgSlide_register_admin_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('tmt_imgSlide_uploader', get_bloginfo('template_url').'/TMT.IMGSlide/js/upload-img.js', array('jquery','media-upload', 'thickbox'));
	}

	function tmt_imgSlide_register_admin_styles() {
		wp_enqueue_style('thickbox');
	}

	function tmt_imgSlide_add_scripts() {
	$url_imgSld = get_bloginfo('template_url');
	?>
	<script>
		var url_imgSld_select_all = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_select_all.php';
		//var url_imgSld_select_one = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_select_one.php';
		var url_imgSld_update = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_update.php';
		var url_imgSld_insert = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_insert.php';
		var url_imgSld_remove = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_remove.php';
	</script>
	<?php
		//wp_enqueue_script('tmt_members_jQuery_js', get_bloginfo('template_url').'/TMT.Members/js/jquery-2.0.3.js');
		//wp_enqueue_script('tmt_shop_admin_js', get_bloginfo('template_url').'/TMT.IMGSlide/js/ui_admin.js');
	}

		


/*//////////////////////////////////////
 * actions & filter
/*//////////////////////////////////////
	
	add_action('admin_menu', 'tmt_imgSlide_admin_menu'); // MENU ADMIN
	add_action('admin_print_scripts', 'tmt_imgSlide_add_scripts'); // ADD ADMIN SCRIPTS
	add_action('admin_print_styles', 'tmt_imgSlide_add_styles'); // ADD ADMIN STYLES
	add_shortcode('tmt_imgSlide', 'tmt_imgSlide_shortcode'); // ADD SHORTCODE
	
	add_action('admin_print_scripts', 'tmt_imgSlide_register_admin_styles');
	add_action('admin_print_styles', 'tmt_imgSlide_register_admin_scripts');

/*//////////////////////////////////////
 * theme check install/uninstall
/*//////////////////////////////////////
	
	//tmt_theme_imgSlide_activation('desert_default');
	//tmt_theme_imgSlide_deactivation('desert_default');  
  
/*------------------------------------------- end.PART REGISTER & INCLUDE TMT IMG Slide -------------------------------------------*/

?>
