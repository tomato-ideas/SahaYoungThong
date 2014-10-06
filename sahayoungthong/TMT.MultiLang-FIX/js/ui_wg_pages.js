/*
 * Usage: Everywhere
 */
 
jQuery(document).ready(function() {
var SendData= [];
//console.log(SendData);
	var ul = $('.widget_pages');
	var items = $('.widget_pages ul li');	
	for (var i = 0; i < items.length; ++i) {
		var txt = items[i].className; // ?page_id=56"
		//console.log(txt);
		var pattern = /[^0-9]/g; // SELECT NUMBER ONLY
		var result = txt.replace(pattern, '');
		//console.log("no: "+i+" ========: " + result);
		var idx = $(items[i]).find('a').attr('id', result);
		//console.log(result);
		//$(items[i]).find('a').text(result);
		SendData.push(result);
	} // END LOOP var:i
	
	//console.log(SendData);
	
/*//////////////////////////////////////
 * GET JSON
/*//////////////////////////////////////

var hash = window.location.href.split('?')[1]
var hashs = window.location.href.split('&')[1]

if(hash == 'lang=EN' || hashs == 'lang=EN'){
		$.ajax({
		url: urls,
		type: "POST",
		data: { 'ID': SendData},
		dataType: "json"
	}).done(function(data){
	for(var i=0; i<data.length; i++) {
		$('.widget_pages ul li').find('#'+data[i].id).text(data[i].postTitleTmt);
		}
		//console.log(data[0].id);
	}).fail(function(){
		console.log("fail");
	});// END GETJSON //
}
});