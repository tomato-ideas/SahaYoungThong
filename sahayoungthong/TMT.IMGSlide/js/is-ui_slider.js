/*
 * banner-slide plugin (Content generator for slide)
 *
 */

/* SELECT SQL */
var a = jQuery.noConflict();
jQuery().ready(function() {
	jQuery.getJSON(url_imgSld_select_all, function(data1) {
/* 	jQuery.getJSON("../wp-content/plugins/banner-slide/service/service_sql_select.php", function(data) { */
	//console.log('2 : getJSON success !!');
	
		count1 = data1;
		for (var i = 1; i < count1.length; i++) {
			/* jQuery(".tmt_imgSlide").append('<li><a href="' + data[i].select_linkurl + '" target="_blank"><img class="imgfit" id="image-holder' + data[i].select_id + '"  src="' + data[i].select_imgurl + '" title="Visit to ' + data[i].select_linkurl + ' !!"></a></li>'); */
			a(".tmt_imgSlide").append('<li><img class="imgfit" id="image-holder' + data1[i].select_id + '"  src="' + data1[i].select_imgurl + '"></li>');
		}
		//console.log('3 : loop slider success !!');

		var wid = jQuery.parseJSON(data1[0].select_width);
		var hei = jQuery.parseJSON(data1[0].select_height);
		var animd = jQuery.parseJSON(data1[0].select_animduration);
		var anims = jQuery.parseJSON(data1[0].select_animspeed);
		var navi = jQuery.parseJSON(data1[0].select_navigation);
		var bull = jQuery.parseJSON(data1[0].select_bullet);
		var hove = jQuery.parseJSON(data1[0].select_hoverpause);
		var usec = jQuery.parseJSON(data1[0].select_usecaptions);
		var rand = jQuery.parseJSON(data1[0].select_randomstart);
		var resp = jQuery.parseJSON(data1[0].select_responsive);
		
		a('#tmt_imgSlide_fade').tmt_imgSlide({
			width: wid,
			height: hei,
			animtype: 'fade',
			animduration: animd,
			animspeed: anims,
			automatic: true,
			showcontrols: navi,
			centercontrols: true,
			nexttext: '',
			prevtext: '',
			showmarkers: bull,
			centermarkers: true,
			keyboardnav: true,
			hoverpause: hove,
			usecaptions: usec,
			randomstart: rand,
			responsive: resp
		});
		//console.log('4 : value slider success !!');
	});
});
//console.log('1 : bs-ui_slide ready !!');