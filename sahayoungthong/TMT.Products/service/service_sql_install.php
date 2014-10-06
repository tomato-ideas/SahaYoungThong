<?php

/*
 * TMT Members Theme Function (service install)
 * install sql feilds.
 *
 */

	function sv_install_members() {
	
		$sql = "CREATE TABLE ".TMTMEMBERS_DB_TABLE." (
		  `user_phone` varchar(255) NULL,
		  `user_id_card` varchar(255) NULL,
		  `user_address` varchar(255) NULL
		  )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		$sql2 = "CREATE TABLE wp_product (
		  `pd_id` int(11)  AUTO_INCREMENT NOT NULL,
		  `pd_name` varchar(255) NULL,
		  `pd_code` varchar(255) NULL,
		  `brand_id` varchar(255) NULL,
		  `pd_price` varchar(255) NULL,
		  `pd_picture` varchar(255) NULL,
		  `pd_type` varchar(255) NULL,
		  `pd_front` varchar(255) NULL,
		  `pd_series` varchar(255) NULL,
		  `pd_pan_wheels` varchar(255) NULL,
		  `pd_tb_img` varchar(255) NULL,
		  `pd_description_th` text NOT NULL,
		  `pd_description_en` text NOT NULL,
		  `pd_detail_th` text NOT NULL,
		  `pd_detail_en` text NOT NULL,
		  `create_date` varchar(100) NULL,
		  `create_by` varchar(100) NULL,
		  `update_date` varchar(100) NULL,
		  `update_by` varchar(100) NULL,
		  primary key (pd_id)
		  )DEFAULT CHARSET=utf8;";
		
		$sql3 = "CREATE TABLE wp_brand (
		  `brand_id` int(11)  AUTO_INCREMENT NOT NULL,
		  `brand_name` varchar(255) NULL,
		  `brand_type` varchar(255) NULL,
		  `brand_picture` varchar(255) NULL,
		  `create_date` varchar(100) NULL,
		  `create_by` varchar(100) NULL,
		  primary key (brand_id)
		  )DEFAULT CHARSET=utf8;";
		$sql4 = "CREATE TABLE wp_type (
		  `type_id` int(11)  AUTO_INCREMENT NOT NULL,
		  `type_name` varchar(255) NULL,
		  `type_name_th` varchar(255) NULL,
		  `page_id` varchar(255) NULL,
		  `recommend_id` varchar(255) NULL,
		  `create_date` varchar(100) NULL,
		  `create_by` varchar(100) NULL,
		  primary key (type_id)
		  )DEFAULT CHARSET=utf8;";

		  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  dbDelta($sql);
		  dbDelta($sql2);
		  dbDelta($sql3);
		  dbDelta($sql4);
/* 	  	  echo ('success'); */
	  }

  
?>