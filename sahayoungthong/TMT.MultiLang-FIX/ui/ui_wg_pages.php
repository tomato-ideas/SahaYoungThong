<?php

/*
 * TMT MultiLang Theme Function (widgets)
 * widgets
 *
 */

function ui_widgets_pages_multilang(){
	$url = get_bloginfo('template_url');
	?>
	<script src="<?php echo $url ?>/TMT.MultiLang-FIX/js/jquery-2.0.3.js"></script>
	<script type="text/javascript">
		var urls = '<?php echo $url ?>/TMT.MultiLang-FIX/service/service_sql_select_one.php';
	</script>
	<script src="<?php echo $url ?>/TMT.MultiLang-FIX/js/ui_wg_pages.js"></script>
<?php
}
?>