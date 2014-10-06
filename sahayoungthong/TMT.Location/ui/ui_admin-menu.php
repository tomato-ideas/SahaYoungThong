<?php
/*
 * TMT Highlight Theme Function (Detail menu Highlight for theme)
 * Page new menu admin.
 *
 */
function ui_admin_location(){
$getdirect =  get_template_directory_uri();
global $wpdb; 
$getall = $wpdb->get_results("SELECT * FROM wp_location");
$num_loca = $wpdb->num_rows;
?>
<script src="<?php echo get_template_directory_uri(); ?>/TMT.Products/js/jquery-2.0.3.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE-57xbVdzQDOzYZquZowz8vnUjyS0E_c"></script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/TMT.Location/css/ui_admin.css">
<style type="text/css">
	.brandTT{
		color: #888;
	}
	.brandDS{
		margin: 5px 0px 10px 0px;
	}
	#img_pageIndex1_1{
		width: 398px;
		margin: 0px;
		border: 1px solid #ccc;
	}
	#brandSubmitBt{
		background: #2ea2cc;
		border: none;
		margin: 0px;
		padding: 10px;
		color: white;
		margin: 0px 15px 0px 0px;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#brandSubmitBt:hover{
		background: #ccc;
		color: #2ea2cc;
	}
	#brandBackBt{
		background: #0074a2;
		border: none;
		/* float: right; */
		margin: 0px 5px 0px 0px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#brandBackBt:hover{
		background: #ccc;
		color: #0074a2;
	}
	.headlocation{
		background: rgb(243, 243, 243);
		height: 35px;
		color: #0074a2;
		font-size: 16px;
		line-height: 31px;
		padding: 0px 10px;
		top: -17px;
		right: 10px;
		position: absolute;
		text-transform: uppercase;
		font-weight: 800;
	}
	.borderlocation{
		width:100%; 
		margin:20px 10px; 
		border: 2px solid #2ea2cc; 
		padding: 10px 5px 5px 5px; 
		bakground-color:white;
		position:relative;
	}
	.inputenable{
		height: 35px; width: 100%; outline: none;
	}
	.inputdisable{
		height: 35px; width: 100%; outline: none; display:none;
	}
	.inputenabletext{
		height: 90px; width: 100%; outline: none;
	}
	.inputdisabletext{
		height: 90px; width: 100%; outline: none; display:none;
	}
	.btnallyouneed{
		padding-top:20px; padding-bottom:20px;
	}
	.inlineul ul li{
		display: inline;
		margin-right: 20px;
	}
	.inlineul ul li input{
		width: 100px;
	}
	.map-canvas { 
		height: 510px; 
		width: 400px;
		margin: 10px; 
		padding: 10px;
	}
	#additionnalpart{
	/*vertical-align: top; */
	position: fixed;
	}
</style>
<script type="text/javascript">
	var fromdbloca = '<?php echo $num_loca; ?>';
	if(fromdbloca != 0){
		var noloca = parseInt(fromdbloca)+1;
	}else{
    	var noloca = 2;
	}
	var instant = 0;
	//alert(noloca);
    var link = '<?php echo $getdirect; ?>';
	function testwell(x,a){
		if(a == 1){
			$('#loca_title_TH_'+x).css("display","block");
			$('#loca_title_EN_'+x).css("display","none");
			$('#loca_desc_TH_'+x).css("display","block");
			$('#loca_desc_EN_'+x).css("display","none");
			$('#TEN_'+x).removeClass('btCurrentc');
			$('#TTH_'+x).addClass('btCurrentc');
		}
		else if(a == 2){
			$('#loca_title_TH_'+x).css("display","none");
			$('#loca_title_EN_'+x).css("display","block");
			$('#loca_desc_TH_'+x).css("display","none");
			$('#loca_desc_EN_'+x).css("display","block");
			$('#TTH_'+x).removeClass('btCurrentc');
			$('#TEN_'+x).addClass('btCurrentc');
		}	
	}
	function creategooglemap( num ){
			// GOOGLE_MAP API
			//var myLatlng = new google.maps.LatLng(13.742239,100.513119);
			console.log("google : "+num);
			var myLatlng = new google.maps.LatLng(13.742239,100.513119);
			
				console.log("creategooglemap --> initialize CALLED");
				var mapOptions = {
					center: myLatlng,
					zoom: 16
				};
				var map = new google.maps.Map(document.getElementById('map-canvas-'+num), mapOptions);
			
				// Place a draggable marker on the map
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					draggable:true,
					title:"Drag me!"
				});
				google.maps.event.addListener(marker, 'dragend', function(e) {
					var LAT = this.getPosition().lat();
					var LNG = this.getPosition().lng();
					console.log( "LAT:"+LAT+"  LNG:"+LNG );

					document.getElementById("lat_val_"+num).value = LAT;
					document.getElementById("long_val_"+num).value = LNG;
					
				});
				google.maps.event.addListener(map, 'zoom_changed', function() {
					var zoomLevel = map.getZoom();
					// map.setCenter(myLatLng);
					// infowindow.setContent('Zoom: ' + zoomLevel);
					console.log( "ZOOM:"+zoomLevel);
					document.getElementById("zoom_val_"+num).value = zoomLevel;
				});

	}
	function addlocation(){
		if(instant > 0){
			var showss  = noloca -1;
			alert("Can not add location, Please submit the location box no."+showss);
		}else{
		var rec = '';
		rec += '<div  id="location_'+noloca+'" name="location_'+noloca+'" class="borderlocation">';
		rec += '<div class="headlocation">Location '+noloca+'</div>';
		rec += '			<table width="100%">';
		rec += '				<tr><td width="40%">';

	
		rec += '								<div id="map-canvas-'+noloca+'" class="map-canvas"></div>	';

		rec += '				</td>';
		rec += '				<td width="60%" style="position: relative;">';
		rec += '				<div id="brandformAll" style="padding-top:40px;">';
		rec += '					<div class="langAll" id="langTTAll">';
		rec += '								<ul>';
		rec += '									<li id="TTH_'+noloca+'" class="btCurrentc" onclick="testwell('+noloca+',1)">TH</li>';
		rec += '									<li id="TEN_'+noloca+'" onclick="testwell('+noloca+',2)">EN</li>';
		rec += '								</ul>';
		rec += '					</div>';
		rec += '					<hr style="margin-top:-4px;">';
		rec += '					<span>Title</span>';
		rec += '					<div class="brandDS">';
		rec += '						<input id="loca_title_TH_'+noloca+'" name="loca_title_TH_'+noloca+'" placeholder="TH" class="inputenable">';
		rec += '						<input id="loca_title_EN_'+noloca+'" name="loca_title_EN_'+noloca+'" placeholder="EN" class="inputdisable">';
		rec += '					</div>';
		rec += '					<span>Description</span>';
		rec += '					<div class="brandDS">';
		rec += '						<textarea id="loca_desc_TH_'+noloca+'" name="loca_desc_TH_'+noloca+'" placeholder="TH" class="inputenabletext"></textarea>';
		rec += '						<textarea id="loca_desc_EN_'+noloca+'" name="loca_desc_EN_'+noloca+'" placeholder="EN" class="inputdisabletext"></textarea>';
		rec += '					</div>';
		rec += '					<div class="brandTT">Location Picture</div>';
		rec += '					<div class="brandDS">';
		rec += '						<div class="uiPageIndexFormBanner">';
		rec += '						    <div class="backgroundIMGimghd backgroundIMGPageIndexImghd upload-img img_pageIndex1_'+noloca+'">';
		rec += '						        <a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img='+"'pageIndex1_"+''+noloca+''+"'"+'";">';
		rec += '						            <img id="img_pageIndex1_'+noloca+'" class="img-preview" src="<?php echo get_template_directory_uri(); ?>/TMT.Products/images/click.jpg"/>';
		rec += '						            <input type="hidden" id="img_hide_pageIndex1_'+noloca+'" value="#">';
		rec += '						        </a>';
		rec += '						    </div>';
		rec += '						</div>';
		rec += '					</div>';
		rec += '					<div class="inlineul">';
		rec += '						<ul>';
		rec += '							<li>X : <input type="text" id="lat_val_'+noloca+'" name="lat_val_'+noloca+'" value="13.742239"></li>';
		rec += '							<li>Y : <input type="text" id="long_val_'+noloca+'" name="long_val_'+noloca+'" value="100.513119"></li>';
		rec += '							<li>Z : <input type="text" id="zoom_val_'+noloca+'" name="zoom_val_'+noloca+'" value="16"></li>';
		rec += '						</ul>';
		rec += '					</div>';
		rec += '				</div>';
		rec += '				<div class="btnallyouneed" id="changebut'+noloca+'">';
		rec += '						<button id="brandSubmitBt" class="btnsubm'+noloca+'" onclick="addlocal('+noloca+')">SUBMIT</button>';
		rec += '				</div>';
		rec += '				</td></tr>';
		rec += '			</table>';					
		rec += '		</div>';
		//rec += '<div>'+noloca+'</div>';
		// var script = document.createElement( "script" );
		// script.type = "text/javascript";
		// script.src = link+"/TMT.Location/ui/scriptname.js";
		// $("#addmoreloca").append(script);
		$('#addmoreloca').append(rec);
		
		creategooglemap( noloca );

		
		instant++;
		noloca++;
		}
	}
	function dellocal(id){
		if(confirm("Are you sure to Delete this data?")){
			$.ajax({ 
				url: link+'/TMT.Location/service/service_sql_remove.php',
				type: "POST",
				data: { 'ID':id},
				dataType: 'html'
			}) // END SELECT //
			.done(function(data){
				alert("Complete");
				location.reload();
			}) // END DONE SELECT //
			.fail(function(data){
				alert('FAIL \nDelete \n'+data+".");
			}); // END FAIL SELECT //
		}else{

		}
	}
	function addlocal(de){
			locaInsert 		= [];					
			var chktitleTH = $('#loca_title_TH_'+de).val();
			var chktitleEN = $('#loca_title_EN_'+de).val();
			//console.log(chkMemberCompanyName);
			if(chktitleTH == '' || chktitleEN == ''){
				alert("Please fill out title TH and title EN!");
			}
			else{
				var datalocaInsert = {	ti_th		: $('#loca_title_TH_'+de).val(),
										ti_en		: $('#loca_title_EN_'+de).val(),
										de_th 		: $('#loca_desc_TH_'+de).val(),
										de_en		: $('#loca_desc_EN_'+de).val(), 
										picture		: $('#img_hide_pageIndex1_'+de).val(),
										lat         : $('#lat_val_'+de).val(),
										llong       : $('#long_val_'+de).val(),
										zzoom       : $('#zoom_val_'+de).val()
									};
				var objlocaInsert = datalocaInsert;
				locaInsert.push(objlocaInsert);
				console.log(locaInsert);
				$.ajax({
					url: link+'/TMT.Location/service/service_sql_insert.php',
					type: "POST",
					data: {arrMembersInsert : locaInsert},
				}) // END ADD MEMBER //
				.done(function(data){
					var dell = de;
					callidforbut(dell);
				}) // END DONE ADD MEMBER //
				.fail(function(data){
					alert('FAIL \nADD MEMBER \nINSERT \nTMT.MEMBERS');
				}); // END FAIL ADD MEMBER //*/
				
			} // END ELSE
	}
	function callidforbut(de){
		locInsert 		= [];
		var ti_th = $('#loca_title_TH_'+de).val();
		var ti_en = $('#loca_title_EN_'+de).val();
		var	de_th = $('#loca_desc_TH_'+de).val();
		var	de_en = $('#loca_desc_EN_'+de).val();
		var	picture = $('#img_hide_pageIndex1_'+de).val();
		$.ajax({
			url: link+'/TMT.Location/service/service_sql_select_one.php',
			type: "POST",
			data: {tt : ti_th, te : ti_en, dt :de_th, de : de_en, pic :picture},
			dataType: 'json',
		}) // END ADD MEMBER //
		.done(function(data){
			console.log(data);
			$('.btnsubm'+de).hide();
			$('#changebut'+de).append('<button id="brandSubmitBt" onclick="updatelocala('+data[0].id+','+de+')">UPDATE</button><button id="brandBackBt" onclick="dellocal('+data[0].id+')">DELETE</button>');
			alert("Complete");
			//location.reload();
			instant = 0;
		}) // END DONE ADD MEMBER //
		.fail(function(data){
			alert('FAIL');
			console.log(data);
		});
		
	}
	function updatelocala(id,a){
			loUpdate 		= [];					
			var chktitleTH = $('#loca_title_TH_'+a).val();
			var chktitleEN = $('#loca_title_EN_'+a).val();
			//console.log(chkMemberCompanyName);
			if(chktitleTH == '' || chktitleEN == ''){
				alert("Try Again !");
			}
			else{
				var dataloUpdate = {		select_id   : id,
											ti_th		: $('#loca_title_TH_'+a).val(),
											ti_en		: $('#loca_title_EN_'+a).val(),
											de_th 		: $('#loca_desc_TH_'+a).val(),
											de_en		: $('#loca_desc_EN_'+a).val(), 
											picture		: $('#img_hide_pageIndex1_'+a).val(),
											lat         : $('#lat_val_'+a).val(),
											llong       : $('#long_val_'+a).val(),
											zzoom       : $('#zoom_val_'+a).val()
										};
				var objloUpdate = dataloUpdate;
				loUpdate.push(objloUpdate);
				
				console.log(loUpdate);
						
				$.ajax({
							url: link+'/TMT.Location/service/service_sql_update.php',
							type: "POST",
							data: {arrloUpdate : loUpdate},
						}) // END UPDATE ALL CHANGE //
						.done(function(data){
							alert("Complete");							
						}) // END DONE UPDATE ALL CHANGE //
						.fail(function(data){
							alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART UPDATE \nTMT.IMGSLIDE');
						}); // END FAIL UPDATE ALL CHANGE //*/
				
			
			} // END ELSE //
	}

</script>


<div style="width:98%;">
	<div style="height:20px;"></div>
	<div style="background-color: #2ea2cc;
				height: 30px;
				border-radius: 10px 10px 0px 0px;
				border: 2px solid #0074a2;
				color: #fff;
				font-size: 16px;
				line-height: 31px;
				padding: 5px 10px;">TMT Location</div>
	<div style="border: 2px solid #0074a2; border-top: none; margin-top:-9px;">
		<hr>
		<table width="98%">
		<tr>
		<td id="locaadd" width="74%">
		<?php if($num_loca > 0){ 
			$io = 1;
			foreach($getall as $fearr){ 
			?>
				<div  id="location_<?php echo $io; ?>" name="location_<?php echo $io; ?>" class="borderlocation">
				<div class="headlocation">Location <?php echo $io; ?></div>
					<table width="100%">
						<tr>
							<td width="40%">
								<script type="text/javascript">
									// GOOGLE_MAP API
									//var myLatlng = new google.maps.LatLng(13.742239,100.513119);
									var myLatlng<?php echo $io ?> = new google.maps.LatLng(<?php echo $fearr->lat; ?>,<?php echo $fearr->long; ?>);

									function initialize() {
										var mapOptions = {
											center: myLatlng<?php echo $io ?>,
											zoom: <?php echo $fearr->zoom; ?>
										};
										var map = new google.maps.Map(document.getElementById('map-canvas-<?php echo $io ?>'), mapOptions);
									
										// Place a draggable marker on the map
										var marker = new google.maps.Marker({
											position: myLatlng<?php echo $io ?>,
											map: map,
											draggable:true,
											title:"Drag me!"
										});
										google.maps.event.addListener(marker, 'dragend', function(e) {
											var LAT = this.getPosition().lat();
											var LNG = this.getPosition().lng();
											console.log( "LAT:"+LAT+"  LNG:"+LNG );

											document.getElementById("lat_val_<?php echo $io ?>").value = LAT;
											document.getElementById("long_val_<?php echo $io ?>").value = LNG;
											
										});
										google.maps.event.addListener(map, 'zoom_changed', function() {
											var zoomLevel = map.getZoom();
											// map.setCenter(myLatLng);
											// infowindow.setContent('Zoom: ' + zoomLevel);
											console.log( "ZOOM:"+zoomLevel);
											document.getElementById("zoom_val_<?php echo $io ?>").value = zoomLevel;
										});

									}
									
									google.maps.event.addDomListener(window, 'load', initialize);
									

								</script>
								<div id="map-canvas-<?php echo $io ?>" class="map-canvas"></div>

							</td>
						<td width="60%" style="position: relative;">
						<div id="brandformAll" style="padding-top:40px;">
							<div class="langAll" >
										<ul>
											<li id="TTH_<?php echo $io; ?>" class="btCurrentc" onclick="testwell(<?php echo $io; ?>,1)">TH</li>
											<li id="TEN_<?php echo $io; ?>" onclick="testwell(<?php echo $io; ?>,2)">EN</li>
										</ul>
							</div>
							<hr style="margin-top:-4px;">
							<span>Title</span>
							<div class="brandDS">
								<input id="loca_title_TH_<?php echo $io; ?>" name="loca_title_TH_<?php echo $io; ?>" placeholder="TH" class="inputenable" value="<?php echo $fearr->lct_title_th; ?>">
								<input id="loca_title_EN_<?php echo $io; ?>" name="loca_title_EN_<?php echo $io; ?>" placeholder="EN" class="inputdisable" value="<?php echo $fearr->lct_title_en; ?>">
							</div>
							<span>Description</span>
							<div class="brandDS">
								<textarea id="loca_desc_TH_<?php echo $io; ?>" name="loca_desc_TH_<?php echo $io; ?>" placeholder="TH" class="inputenabletext"><?php echo $fearr->lct_description_th; ?></textarea>
								<textarea id="loca_desc_EN_<?php echo $io; ?>" name="loca_desc_EN_<?php echo $io; ?>" placeholder="EN" class="inputdisabletext"><?php echo $fearr->lct_description_en; ?></textarea>
							</div>
							<div class="brandTT">Location Picture</div>
							<div class="brandDS">
								<div class="uiPageIndexFormBanner">
								    <div class="backgroundIMGimghd backgroundIMGPageIndexImghd upload-img img_pageIndex1_<?php echo $io; ?>">
								        <a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img='pageIndex1_<?php echo $io; ?>';">
								        <?php if($fearr->lct_picture == '' || $fearr->lct_picture == '#'){ ?>
								        	<img id="img_pageIndex1_<?php echo $io; ?>" class="img-preview" src="<?php echo get_template_directory_uri(); ?>/TMT.Products/images/click.jpg"/>
								        <?php }else{ ?>
								        	<img id="img_pageIndex1_<?php echo $io; ?>" class="img-preview" src="<?php echo $fearr->lct_picture; ?>"/>
								        <?php } ?> 
								        <input type="hidden" id="img_hide_pageIndex1_<?php echo $io; ?>" value="<?php echo $fearr->lct_picture; ?>">
								        </a>
								    </div>
								</div>
							</div>
							<div class="inlineul">
								<ul>
								<li>X : <input type="text" id="lat_val_<?php echo $io; ?>" name="lat_val_<?php echo $io; ?>" value="<?php echo $fearr->lat; ?>"></li>
								<li>Y : <input type="text" id="long_val_<?php echo $io; ?>" name="long_val_<?php echo $io; ?>" value="<?php echo $fearr->long; ?>"></li>
								<li>Z : <input type="text" id="zoom_val_<?php echo $io; ?>" name="zoom_val_<?php echo $io; ?>" value="<?php echo $fearr->zoom; ?>"></li>
								</ul>
							</div>
						</div>
						<div class="btnallyouneed">
								<button id="brandSubmitBt" onclick="updatelocala(<?php echo $fearr->lct_id; ?>,<?php echo $io; ?>)">UPDATE</button>
								<button id="brandBackBt" onclick="dellocal(<?php echo $fearr->lct_id; ?>)">DELETE</button>
						</div>
						</td></tr>
					</table>						
				</div>
			<?php $io++; }
		}else{ ?>
				<div  id="location_1" name="location_1" class="borderlocation">
				<div class="headlocation">Location 1</div>
					<table width="100%">
						<tr><td width="40%">
								<script type="text/javascript">
									// GOOGLE_MAP API
									//var myLatlng = new google.maps.LatLng(13.742239,100.513119);
									var myLatlng1 = new google.maps.LatLng(13.742239,100.513119);
									function initialize() {
										var mapOptions = {
											center: myLatlng1,
											zoom: 16
										};
										var map = new google.maps.Map(document.getElementById('map-canvas-1'), mapOptions);
									
										// Place a draggable marker on the map
										var marker = new google.maps.Marker({
											position: myLatlng1,
											map: map,
											draggable:true,
											title:"Drag me!"
										});
										google.maps.event.addListener(marker, 'dragend', function(e) {
											var LAT = this.getPosition().lat();
											var LNG = this.getPosition().lng();
											console.log( "LAT:"+LAT+"  LNG:"+LNG );

											document.getElementById("lat_val_1").value = LAT;
											document.getElementById("long_val_1").value = LNG;
											
										});
										google.maps.event.addListener(map, 'zoom_changed', function() {
											var zoomLevel = map.getZoom();
											// map.setCenter(myLatLng);
											// infowindow.setContent('Zoom: ' + zoomLevel);
											console.log( "ZOOM:"+zoomLevel);
											document.getElementById("zoom_val_1").value = zoomLevel;
										});

									}
									
									google.maps.event.addDomListener(window, 'load', initialize);
									

								</script>
							<div id="map-canvas-1" class="map-canvas"></div>
						</td>
						<td width="60%" style="position: relative;">
						<div id="brandformAll" style="padding-top:40px;">
							<div class="langAll" >
										<ul>
											<li id="TTH_1" class="btCurrentc" onclick="testwell(1,1)">TH</li>
											<li id="TEN_1" onclick="testwell(1,2)">EN</li>
										</ul>
							</div>
							<hr style="margin-top:-4px;">
							<span>Title</span>
							<div class="brandDS">
								<input id="loca_title_TH_1" name="loca_title_TH_1" placeholder="TH" class="inputenable">
								<input id="loca_title_EN_1" name="loca_title_EN_1" placeholder="EN" class="inputdisable">
							</div>
							<span>Description</span>
							<div class="brandDS">
								<textarea id="loca_desc_TH_1" name="loca_desc_TH_1" placeholder="TH" class="inputenabletext"></textarea>
								<textarea id="loca_desc_EN_1" name="loca_desc_EN_1" placeholder="EN" class="inputdisabletext"></textarea>
							</div>
							<div class="brandTT">Location Picture</div>
							<div class="brandDS">
								<div class="uiPageIndexFormBanner">
								    <div class="backgroundIMGimghd backgroundIMGPageIndexImghd upload-img img_pageIndex1_1">
								        <a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img='pageIndex1_1';">
								            <img id="img_pageIndex1_1" class="img-preview" src="<?php echo get_template_directory_uri(); ?>/TMT.Products/images/click.jpg"/>
								            <input type="hidden" id="img_hide_pageIndex1_1" value="#">
								        </a>
								    </div>
								</div>
							</div>
							<div class="inlineul">
								<ul>
								<li>X : <input type="text" id="lat_val_1" name="lat_val_1" value="13.742239"></li>
								<li>Y : <input type="text" id="long_val_1" name="long_val_1" value="100.513119"></li>
								<li>Z : <input type="text" id="zoom_val_1" name="zoom_val_1" value="16"></li>
								</ul>
							</div>
						</div>
						<div class="btnallyouneed">
								<button id="brandSubmitBt" onclick="addlocal(1)">SUBMIT</button>
								<!--<button id="brandBackBt" onclick="dellocal(1)">DELETE</button>-->
						</div>
						</td></tr>
					</table>						
				</div>
				<?php } ?>
				<span id="addmoreloca"></span>
		</td>
		
		<td id="additionnalpart" width="24%">
				<div style="padding: 20px 0px 0px 50px;">
				<button id="brandBackBt" onclick="addlocation()">Add location</button>
				</div>
		</td>
		</tr>
		</table>
	</div>
</div>
<?php
}	
?>