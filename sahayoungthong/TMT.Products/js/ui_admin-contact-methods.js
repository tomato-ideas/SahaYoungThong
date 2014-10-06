/*
 * TMT Members Theme Function (contact methods data)
 * generator contact methods data.
 *
 */
 
jQuery(document).ready(function($) {
	var post_id = $('#user_id').val();
	//console.log(url_select_one);
	
/*//////////////////////////////////////
 * SELECT
/*//////////////////////////////////////
	$.ajax({ 
		url: url_select_one_amctmt,
		type: "POST",
		data: { 'ID': post_id},
		dataType: 'json'
	}) // END SELECT //
	.done(function(data){
		var userPhoneSelect = $('#phone').val(data[0].userPhone);
		var userIdCardSelect = $('#member_id').val(data[0].userIdCard);
		var userAddressSelect = $('#address').val(data[0].userAddress);
	}) // END DONE SELECT //
	.fail(function(data){
		alert('FAIL \nSELECT \nADMIN CONTACT METHODS \nTMT.MEMBERS');
	}); // END FAIL SELECT //	
		
			
/*//////////////////////////////////////
 * SAVE & UPDATE
/*//////////////////////////////////////
	$('#submit').mousedown(function(){
		var userPhone = $('#phone').val();
		var userIdCard = $('#member_id').val();
		var userAddress = $('#address').val();
		
		$.ajax({
			url: url_update_amctmt,
			type: "POST",
			data: { ID: post_id, user_phone: userPhone, user_id_card: userIdCard, user_address: userAddress }
		}) // END SAVE & UPDATE //
		.done(function(data){
			// done
		}) // END DONE SAVE & UPDATE //
		.fail(function(data){
			alert('FAIL \nSAVE & UPDATE \nADMIN CONTACT METHODS \nTMT.MEMBERS');
		}); // END FAIL SAVE & UPDATE //
	});	// END MOUSEDOWN SAVE & UPDATE //
	
}); // END JQUERY READY //