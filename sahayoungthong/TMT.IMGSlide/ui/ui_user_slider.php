<?php

/*
 * TMT IMG Slide Theme Function (img slide)
 * Page new menu user.
 *
 */

	function ui_user_imgSlide(){
	$url_imgSld = get_bloginfo('template_url');
	?>
	<script>
		var url_imgSld_select_all = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_select_all.php';
		//var url_imgSld_select_one = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_select_one.php';
		//var url_imgSld_update = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_update.php';
		//var url_imgSld_insert = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_insert.php';
		//var url_imgSld_remove = '<?php echo $url_imgSld ?>/TMT.IMGSlide/service/service_sql_remove.php';
	</script>
		<link rel="stylesheet" href="<?php echo ($url_imgSld)?>/TMT.IMGSlide/css/bs-ui_slider.css">
		<script src="<?php echo ($url_imgSld)?>/TMT.IMGSlide/js/jquery-2.0.3.js"></script>
		<script src="<?php echo ($url_imgSld)?>/TMT.IMGSlide/js/img_slide.js"></script>
		<script src="<?php echo ($url_imgSld)?>/TMT.IMGSlide/js/is-ui_slider.js"></script>
		    
		    	<div id="tmt_imgSlide_fade">
		    		<ul class="tmt_imgSlide">
		    		
		    		</ul>
		    	</div>
	<?php }

?>