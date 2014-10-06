<?php
global $wpdb;

/*//////////////////////////////////////
 * theme include file
/*//////////////////////////////////////

	require_once('service/service_sql_install.php'); // INSTALL TABLE
	require_once('ui/ui_admin-menu.php'); // UI ADMIN MENU

/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////

	//define('TMTHIGHLIGHT_DB_VERSION', 1);


/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////

	//define('TMTHIGHLIGHT_DB_TABLE', $wpdb->prefix."location");


/*//////////////////////////////////////
 * theme installation
/*//////////////////////////////////////
	
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
		sv_install_location();
	}


/*//////////////////////////////////////
 * theme uninstallation
/*//////////////////////////////////////

/*------------------------------------------- start.PART UI-ADMIN TMT Highlight -------------------------------------------*/

/*//////////////////////////////////////
 * theme add menu
/*//////////////////////////////////////

	function tmt_location_admin_menu(){
		add_menu_page( 
			'custom menu title', 'TMT.Location', 
			'edit_published_posts', 'tmt_location', 
			'custom_tmt_location_page', get_bloginfo('template_url') .'/TMT.location/images/tmt_location-logo.png', 113 );
	}


/*//////////////////////////////////////
 * theme page TMT Highlight Menu
/*//////////////////////////////////////
	
	function custom_tmt_location_page(){
		ui_admin_location();
	}
	function tmt_pageIndex_register_admin_scripts2() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('tmt_pageindex_uploader', get_bloginfo('template_url').'/TMT.Location/js/upload-media.js', array('jquery','media-upload', 'thickbox'));
    }
 
    function tmt_pageIndex_register_admin_styles2() {
        wp_enqueue_style('thickbox');
    }
	function tmt_location_add_admin_defalut_styles2() {
		wp_enqueue_style('tmt_location_admin_default_css', get_bloginfo('template_url').'/TMT.Location/css/ui_adminDefault.css');
	}	
	function tmt_location_add_styles() {
		wp_enqueue_style('tmt_highlight_admin_css', get_bloginfo('template_url').'/TMT.Location/css/ui_admin.css');
	}
/*------------------------------------------- end.PART UI-ADMIN TMT Highlight -------------------------------------------*/

/*------------------------------------------- start.PART REGISTER & INCLUDE TMT Highlight -------------------------------------------*/

	/*function tmt_highlight_add_admin_defalut_styles() {
		wp_enqueue_style('tmt_highlight_admin_default_css', get_bloginfo('template_url').'/TMT.Highlight/css/ui_adminDefault.css');
	}
	function tmt_highlight_add_styles() {
		wp_enqueue_style('tmt_highlight_admin_css', get_bloginfo('template_url').'/TMT.Highlight/css/ui_admin.css');
	}

	function tmt_highlight_register_admin_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('tmt_highlight_uploader', get_bloginfo('template_url').'/TMT.Highlight/js/upload-img.js', array('jquery','media-upload', 'thickbox'));
	}

	function tmt_highlight_register_admin_styles() {
		wp_enqueue_style('thickbox');
	}

	function tmt_highlight_add_scripts() {
	$url_highl = get_bloginfo('template_url');
	?>
	<script>
		var url_highl_select_all = '<?php echo $url_highl ?>/TMT.Highlight/service/service_sql_select_all.php';
		//var url_imgSld_select_one = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_select_one.php';
		var url_highl_update = '<?php echo $url_highl ?>/TMT.Highlight/service/service_sql_update.php';
		var url_highl_insert = '<?php echo $url_highl ?>/TMT.Highlight/service/service_sql_insert.php';
		var url_highl_remove = '<?php echo $url_highl ?>/TMT.Highlight/service/service_sql_remove.php';
		
		var url_highl_imgDF = '<?php echo $url_highl ?>/TMT.Highlight/images/imgBg.png';
	</script>
	<?php
		//wp_enqueue_script('tmt_members_jQuery_js', get_bloginfo('template_url').'/TMT.Members/js/jquery-2.0.3.js');
		wp_enqueue_script('tmt_highlight_admin_js', get_bloginfo('template_url').'/TMT.Highlight/js/ui_admin.js');
	}	*/

/*//////////////////////////////////////
 * actions & filter
/*//////////////////////////////////////

	add_action('admin_menu', 'tmt_location_admin_menu'); // MENU ADMIN
	add_action('admin_head', 'tmt_location_add_admin_defalut_styles2'); // ADD ADMIN DEFAULT STYLES 
	add_action('admin_print_scripts', 'tmt_pageIndex_register_admin_styles2');
	//add_action('admin_print_styles', 'tmt_pageIndex_register_admin_scripts2');
	add_action('admin_print_styles', 'tmt_location_add_styles');
	/*add_action('admin_head', 'tmt_highlight_add_admin_defalut_styles'); // ADD ADMIN DEFAULT STYLES
	add_action('admin_print_scripts', 'tmt_highlight_add_scripts'); // ADD ADMIN SCRIPTS
	add_action('admin_print_styles', 'tmt_highlight_add_styles'); // ADD ADMIN STYLES
	
	add_action('admin_print_scripts', 'tmt_highlight_register_admin_styles');
	add_action('admin_print_styles', 'tmt_highlight_register_admin_scripts'); 	*/						


/*//////////////////////////////////////
 * theme check install/uninstall
/*//////////////////////////////////////
//tmt_theme_chkuser_activation('desert_default');
//tmt_theme_chkuser_deactivation('desert_default');  
  
/*------------------------------------------- end.PART REGISTER & INCLUDE TMT Highlight -------------------------------------------*/

?>
