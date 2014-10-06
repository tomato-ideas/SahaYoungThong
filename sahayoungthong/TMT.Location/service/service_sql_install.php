<?php

/*
 * TMT Highlight Theme Function (service install)
 * install sql feilds.
 *
 */

	function sv_install_location() {
	
		$sql = "CREATE TABLE wp_location (
		  `lct_id` int(11) NOT NULL AUTO_INCREMENT,
		  `lct_title_th` text NULL,
		  `lct_title_en` text NULL,		  
		  `lct_description_th` text NULL,
		  `lct_description_en` text NULL,
		  `lct_picture` text NULL,		  
		  `lat` text NULL,
		  `long` text NULL,
		  `zoom` text NULL,
		  `create_date` text NULL,
		  `create_by` text NULL,		  
		  PRIMARY KEY (`lct_id`)
		) DEFAULT CHARSET=utf8;
		";
		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql);
/* 	  	  echo ('success'); */
	  }

  
?>