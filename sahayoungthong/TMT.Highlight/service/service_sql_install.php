<?php

/*
 * TMT Highlight Theme Function (service install)
 * install sql feilds.
 *
 */

	function sv_install_highlight() {
	
		$sql = "CREATE TABLE ".TMTHIGHLIGHT_DB_TABLE." (
		  `idx` int(11) NOT NULL AUTO_INCREMENT,
		  `imgurl` text,
		  `linkurl` text,
		  `title_th` text,
		  `title_en` text,
		  `description_th` text,
		  `description_en` text,
		  
		  PRIMARY KEY (`idx`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		LOCK TABLES `wp_highlight` WRITE;
		INSERT INTO `wp_highlight` (`idx`, `imgurl`, `linkurl`, `title_th`, `title_en`, `description_th`, `description_en`)
		VALUES
		  (1,'','','','','','');
		UNLOCK TABLES;
		";

		
		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql);
/* 	  	  echo ('success'); */
	  }

  
?>