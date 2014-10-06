<?php

/*
 * TMT MultiLang Theme Function (service install)
 * install sql feilds.
 *
 */

	function sv_install_multilang() {
	
		$sql = "CREATE TABLE ".TMTMULTILANG_DB_TABLE." (
		  `post_title_tmt` varchar(500) NULL DEFAULT '',
		  `post_content_tmt` longtext NULL,
		  `fea2nd_img_tmt` varchar(255) NULL DEFAULT ''
		  )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		
		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql);
/* 	  	  echo ('success'); */
	  }

  
?>