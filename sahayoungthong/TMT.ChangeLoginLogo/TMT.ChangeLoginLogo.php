<?php
global $wpdb;

/*//////////////////////////////////////
 * theme include file
/*//////////////////////////////////////
	

	/* UI */
	//require_once('ui/ui_disable_menu_page.php'); // UI LIST TEMPLETE
	
	

/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////

	define('TMTCHANGELOGINLOGO_DB_VERSION', 1);



/*//////////////////////////////////////
 * theme database version - used to identify the need to "upgrade" database
/*//////////////////////////////////////

	//define('TMTCHANGELOGINLOGO_DB_TABLE', $wpdb->prefix."posts");


/*------------------------------------------- start.PART UI-ADMIN TMT Change Login Logo -------------------------------------------*/


/*------------------------------------------- end.PART UI-ADMIN TMT Change Login Logo-------------------------------------------*/

/*------------------------------------------- start.PART REGISTER & INCLUDE TMT Change Login Logo-------------------------------------------*/

function add_styles_changeLoginLogo() {
	
	/* CHANGE LOGO */
	wp_enqueue_style('tmt_changeLoginLogo_admin_css', get_bloginfo('template_url').'/TMT.ChangeLoginLogo/css/login-style.css');
	
	/* CHANGE FAVICON */
	echo "<link rel='shortcut icon' href='".get_bloginfo('template_url')."/TMT.ChangeLoginLogo/images/favicon.ico' />\n";
}



/*//////////////////////////////////////
 * actions
/*//////////////////////////////////////

	add_action('admin_head', 'add_styles_changeLoginLogo'); // ADD ADMIN STYLE
	add_action('login_head', 'add_styles_changeLoginLogo'); // ADD LOGIN STYLE

  
/*------------------------------------------- end.PART REGISTER & INCLUDE TMT Disable Menu Page -------------------------------------------*/

?>
