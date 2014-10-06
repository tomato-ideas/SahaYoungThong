<?php

/*
 * TMT Members Theme Function (Contact Medthods for admin)
 * Medthods menu admin.
 *
 */
 
function ui_admin_contact_methods() {
	
	$url_amctmt = get_bloginfo('template_url');
?>
	<script src="<?php echo $url_amctmt ?>/TMT.Members/js/jquery-2.0.3.js"></script>
	<script type="text/javascript">
		var url_select_one_amctmt = '<?php echo $url_amctmt ?>/TMT.Members/service/service_sql_select_one.php';
		var url_select_all_amctmt = '<?php echo $url_amctmt ?>/TMT.Members/service/service_sql_select_all.php';
		var url_update_amctmt = '<?php echo $url_amctmt ?>/TMT.Members/service/service_sql_update.php';
	</script>
	<script src="<?php echo $url_amctmt ?>/TMT.Members/js/ui_admin-contact-methods.js"></script>
	
	<table class="form-table">
		<tr>
			<th><label for="phone">Phone</label></th>
			<td>
			
				<input type="text" name="phone" id="phone" value="" class="regular-text" /><span class="description"> ex : 0899999999</span>
			
			</td>
		</tr>
		<tr>
			<th><label for="member_id">Member ID</label></th>
			<td>
			
			<input type="text" name="member_id" id="member_id" value="" class="regular-text" />
			
			</td>
		</tr>
		<tr>
			<th><label for="address">Address</label></th>
			<td>
			<textarea rows="5" cols="30" name="address" id="address" value="" class="regular-text"/></textarea>
			</td>
		</tr>
	</table>
<?php
}
?>
