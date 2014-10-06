<?php

/*
 * TMT IMG Slide Theme Function (service install)
 * install sql feilds.
 *
 */

	function sv_install_imgSlide() {
	
		$sql = "CREATE TABLE ".TMTIMGSLD_DB_TABLE." (
		  `idx` int(11) NOT NULL AUTO_INCREMENT,
		  `imgurl` text,
		  `linkurl` text,
		  `width` text,
		  `height` text,
		  `animduration` text,
		  `animspeed` text,
		  `navigation` text,
		  `bullet` text,
		  `usecaptions` text,
		  `hoverpause` text,
		  `randomstart` text,
		  `responsive` text,
		  PRIMARY KEY (`idx`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		LOCK TABLES `wp_img_slide` WRITE;
		INSERT INTO `wp_img_slide` (`idx`, `imgurl`, `linkurl`, `width`, `height`, `animduration`, `animspeed`, `navigation`, `bullet`, `usecaptions`, `hoverpause`, `randomstart`, `responsive`)
		VALUES
		  (1,'','','165','445','2000','4000','true','true','true','true','true','true');
		UNLOCK TABLES;
		";

		
		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql);
/* 	  	  echo ('success'); */
	  }

  
?>