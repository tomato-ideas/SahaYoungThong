<?php

/*
 * TMT Members Theme Function (Detail menu Members for theme)
 * Page new menu admin.
 *
 */
/*$post = get_page(1); 
$contents = apply_filters('the_content', $post->post_title);
echo $contents;*/

//global $wpdb; 
function ui_admin_brand(){
$getdirect =  get_template_directory_uri();
global $wpdb; 	
?>
<script src="<?php echo get_template_directory_uri(); ?>/TMT.Products/js/jquery-2.0.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/TMT.Products/js/jPages.js"></script>
<script type="text/javascript">
	var sbb = 0;
	$(document).keypress(function(event){
 
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
           brandsearch();
            //alert('You pressed a "enter" key in somewhere');    
        }
     
    });
	$(function(){
	    $("div.holder2").jPages({
	      containerID  : "itemContainer2",
	      perPage      : 30,
	      startPage    : 1,
	      startRange   : 1,
	      midRange     : 5,
	      endRange     : 1
	    });

	});
	function addbr(){
		$("#brandtab").css('display','none');
		$("#addbrand").css({'display':'block','padding':'1px 0px'});
		$('#tabTypeAll').hide();
		$('hr').hide();
		$('#brandSubmitBt').show();
		$('#brandEditBt').hide();
	}
	function backbr(){
		$("#brandtab").css({'display':'block','padding':'1px 0px'});
		$("#addbrand").css('display','none');
		$('#tabTypeAll').show();
		$('hr').show();
		$('#edit_idb').val('');              
        $('#br_name').val('');
        $('#br_type').val('');
        $('#img_pageIndex1_1').attr("src",'<?php echo $getdirect ?>/TMT.Products/images/click.jpg');
        $('#img_hide_pageIndex1_1').val('');
	}
	function sortbrand(q){
		//alert(q);
		sbb = q;
		var link = '<?php echo $getdirect; ?>';
		$.ajax({
	        url: link+'/TMT.Products/service/sortbrand.php',
	        type: 'get',
	        data: {bkk: q },
	        success: function(response) {
	        	//console.log(response);
	           	$('table#resultTable2 tbody').html(response);
	        }
	    });

	}
	function addbrand(){
		var link = '<?php echo $getdirect; ?>';
		var bname = $("#br_name").val();
		var btype = $("#br_type option:selected").val();
		var bpic = $("#img_hide_pageIndex1_1").val();
		//alert(link);
		//console.log(bname);console.log(btype);console.log(bpic);
		$.ajax({
	        url: link+'/TMT.Products/service/branddb.php',
	        type: 'get',
	        data: {bname: bname, btype: btype, bpic: bpic },
	        success: function(response) {
	           	if(response == 1){
	           		alert("Complete");
	           		location.reload();
	           	}else{
	           		alert(response);
	           		location.reload();
	           	}
	        }
	    });
	}
	$('.btnup').click(function(){    			
    	$(".btnup").css('display','none'); 			
    });
	jQuery(document).ready(function($) {

	    $('.tabType').click(function(){
		    $('.tabType').removeClass('tabTypeCurrent');
		    $(this).addClass('tabTypeCurrent');
	    });

	});
	function toeditb(idpd){
		//alert("sss");		
		var link = '<?php echo $getdirect; ?>';
            $.ajax({ 
                url: link+'/TMT.Products/service/service_sql_select_one_brand.php',
                type: "POST",
                data: { 'ID':idpd},
                dataType: 'json'
            }) // END SELECT //
            .done(function(data){ 
               $('#edit_idb').val(data[0].id);              
               $('#br_name').val(data[0].brand_name);
               $('#br_type').val(data[0].brand_type_id);
          	   $('#img_pageIndex1_1').attr("src",'/sahayoungthong/wp-content/uploads/'+data[0].brand_pic);
          	   $('#img_hide_pageIndex1_1').val('http://visarut.tomatohub.info/sahayoungthong/wp-content/uploads/'+data[0].brand_pic);

               $("#brandtab").css('display','none');
				$("#addbrand").css({'display':'block','padding':'1px 0px'});
				$('#tabTypeAll').hide();
				$('hr').hide();
				$('#brandSubmitBt').hide();
				$('#brandEditBt').show();
               //location.reload();
            }) // END DONE SELECT //
            .fail(function(data){
                alert('FAIL \n'+data+".");
            });
	}
	function editbrand(){
			var link = '<?php echo $getdirect; ?>';
            membersUpdate         = [];
            var checkid = $('#edit_idb').val();          
            var chkMemberCompanyName = $('#br_name').val();
            //console.log(chkMemberCompanyName);
            if(chkMemberCompanyName == '' || checkid == ''){
                alert("Can not update,try again");
            }
            else{
                var dataMembersUpdate = {   id: $('#edit_idb').val(),
							                br_name: $('#br_name').val(),
							                br_type: $("#br_type option:selected").val(),
							                br_Pic: $('#img_hide_pageIndex1_1').val()
                                    };
                var objMembersUpdate = dataMembersUpdate;
                membersUpdate.push(objMembersUpdate);
                
                console.log(membersUpdate);
                        
                $.ajax({
                            url: link+'/TMT.Products/service/service_sql_update_brand.php',
                            type: "POST",
                            data: {arrMembersUpdate : membersUpdate},
                        }) // END UPDATE ALL CHANGE //
                        .done(function(data){
                        	//alert(data);
                           alert("Edit complete");
                           location.reload();
                            //$('#pendingData').hide();
                        }) // END DONE UPDATE ALL CHANGE //
                        .fail(function(data){
                            alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART UPDATE \nTMT.IMGSLIDE');
                        }); // END FAIL UPDATE ALL CHANGE //
                
            
            }
	}
	function todelb(chkIdRm){
		if(confirm(" Are you sure to Delete this data?")){
			var link = '<?php echo $getdirect; ?>';
            $.ajax({ 
                url: link+'/TMT.Products/service/service_sql_remove_brand.php',
                type: "POST",
                data: { 'ID':chkIdRm},
                dataType: 'html'
            }) // END SELECT //
            .done(function(data){
               alert(data);
               location.reload();
            }) // END DONE SELECT //
            .fail(function(data){
                alert('FAIL \nDelete \n'+data+".");
            }); // END FAIL SELECT //
		}
	}
	function brandsearch(){
		var stri = $('#inputtext').val();
		/*console.log(stri);
		console.log(strf);
		console.log(sortff);*/
        $.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/TMT.Products/service/searchbd.php',
            type: 'post',
            data: {searchtext: stri,sortf : sbb},
            dataType: 'json',
            success: function(response) {
            	console.log(response);
            	if(response == null){
            		var rec ='';
            		rec+='	<tr>';
					rec+='		<td style="text-align:center;" colspan="6">Not Found.</td>';
					rec+='	</tr>';
            	}else{
	            	var rec ='';
	            	for (var chk = 0; chk < response.length; chk++) {
	            	rec+='	<tr>';
					rec+='		<td style="text-align:center;">'+response[chk].id+'</td>';
					rec+='		<td>'+response[chk].brand_name+'</td>';
					rec+='		<td>'+response[chk].brand_type+'</td>';
					rec+='		<td>'+response[chk].brand_pic+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].create_date+'</td>';
					rec+='		<td style="text-align:center;"><button id="productAddBt" onclick="toedit('+response[chk].id+')" >Edit</button><button id="productAddBt" onclick="todel('+response[chk].id+')" >Delete</button></td>';
					rec+='	</tr>';
					}
				}
                $('table#resultTable2 tbody').html(rec);
                $(function(){
				    $("div.holder2").jPages({
				      containerID  : "itemContainer2",
				      perPage      : 30,
				      startPage    : 1,
				      startRange   : 1,
				      midRange     : 5,
				      endRange     : 1
				    });

	            });
            }
        });
	}
	function sortfuncb(a,b){	
    	var stri = $('#inputtext').val();
    	//console.log(a);
		$.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/TMT.Products/service/sortbd.php',
            type: 'get',
            data: {searchtext: stri, cate: sbb, sortby: a, order: b},
            dataType : 'json',
            success: function(response) {
            	console.log(response);
            	if(response == null){
            		var rec ='';
            		rec+='	<tr>';
					rec+='		<td style="text-align:center;" colspan="6">Not Found.</td>';
					rec+='	</tr>';
            	}else{
	            	var rec ='';
	            	for (var chk = 0; chk < response.length; chk++) {
	            	rec+='	<tr>';
					rec+='		<td style="text-align:center;">'+response[chk].id+'</td>';
					rec+='		<td>'+response[chk].brand_name+'</td>';
					rec+='		<td>'+response[chk].brand_type+'</td>';
					rec+='		<td>'+response[chk].brand_pic+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].create_date+'</td>';
					rec+='		<td style="text-align:center;"><button id="productAddBt" onclick="toedit('+response[chk].id+')" >Edit</button><button id="productAddBt" onclick="todel('+response[chk].id+')" >Delete</button></td>';
					rec+='	</tr>';
					}
				}
                $('table#resultTable2 tbody').html(rec);
                $(function(){
				    $("div.holder2").jPages({
				      containerID  : "itemContainer2",
				      perPage      : 30,
				      startPage    : 1,
				      startRange   : 1,
				      midRange     : 5,
				      endRange     : 1
				    });

	            });
            }
        });
	
}	
</script>
<style type="text/css">
	#addbrand{
		display: none;
	}
	.tabTypeCurrent{
		color: #fff!important;
		background-color: #0074a2!important;
		cursor: default!important;
	}
	#brandsFilters ul li {
		display: inline-table;
		padding: 5px 10px;
		border-radius: 5px;
		background: rgba(0,116,162,.2);
		margin: 15px 10px 0px 0px;
		color: #0074a2;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
		font-size: 12px;
	}
	#brandsFilters ul li:hover {
		color: #fff;
		background-color: #0074a2;
	}
	.tablemember {
		border-style: solid;
		border-color:WhiteSmoke;
		width:100%;
	}
	.tablemember tr:nth-child(even) { background-color:rgb(199, 240, 255); }
	.tablemember tr:nth-child(odd) { background-color:#FFFFFF; }
	.tablemember th {background-color: #0074a2; color:white; cursor: default; position: relative;}
	#brandAddBt{
		background: #2ea2cc;
		border: none;
		float: right;
		margin: 0px 5px 5px 5px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#brandSubmitBt{
		background: #2ea2cc;
		border: none;
		margin: 0px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#brandEditBt{
		background: #2ea2cc;
		border: none;
		margin: 0px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#brandAddBt:hover,#brandEditBt:hover,
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
	#resultTable td{
		border-left: 1px solid rgb(219, 219, 219);
		border-bottom: 1px solid rgb(219, 219, 219);
	}
	#resultTable td:last-child{
		border-right: 1px solid rgb(219, 219, 219);
	}
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
	.holder2 {	
    margin: 25px 0;
  }

  .holder2 a {
    font-size: 16px;
    cursor: pointer;
    margin: 0px;
    color: #333;
    border: 2px solid  #EEEEEE;
    padding: 5px 10px;
    background-color: white ; 
  }

  .holder2 a:hover {
    background-color: rgb(199, 240, 255) ;
    color: black;
  }

  .holder2 a.jp-previous { margin-right: 0px; }
  .holder2 a.jp-next { margin-left: 0px; }

  .holder2 a.jp-current, a.jp-current:hover {
    color: #FF4242;
    font-weight: bold;
  }

  .holder2 a.jp-disabled, a.jp-disabled:hover {
    color: #bbb;
  }

  .holder2 a.jp-current, a.jp-current:hover,
  .holder2 a.jp-disabled, a.jp-disabled:hover {
    cursor: default;
    background: none;
  }

  .holder2 span { margin: 0 5px; }
  .wrapSort {
	position: absolute;
	right: 0px;
	top: 0px;
	bottom: 0px;
	margin: auto;
	display: table;
	}
	.wrapSort span {
display: table;
padding: 0px;
margin: 0px;
line-height: 10px;
}
  .spancurup{
  	font-size:10px; 
  	cursor:pointer;
  	color: WhiteSmoke;
  }
  .spancurdown{
  	font-size:10px; 
  	cursor:pointer;
  	color: WhiteSmoke;
  }
  .spancurdown:hover, .spancurup:hover{
  	color: Gainsboro;
  }
</style>
<div style="width:98%;">
	<div style="height:20px;"></div>
		<div style="background-color: #2ea2cc;
				height: 30px;
				border-radius: 10px 10px 0px 0px;
				border: 2px solid #0074a2;
				color: #fff;
				font-size: 16px;
				line-height: 31px;
				padding: 5px 10px;">TMT Brands</div>
	<div style="border: 2px solid #0074a2; border-top: none;">
		<div id="tabTypeAll" style="margin: -15px 0 0 10px;">
			<div id="brandsFilters">
				<ul>
					<li class="tabType tabTypeCurrent" onclick="sortbrand('0')">All</li>
					<?php
					$results7 = $wpdb->get_results("SELECT type_id,type_name FROM wp_type");
					foreach($results7 as $dbr7){?>
						<li class="tabType" onclick="sortbrand('<?php echo $dbr7->type_id; ?>')"><?php echo $dbr7->type_name; ?></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<hr>
		<div>
			<table>
		      <tr>
		            <td>
		            <input type="text" name="inputtext" id="inputtext" placeholder="Brand name">
		            </td><td>
		            <button class="btnSearch" onclick="brandsearch();">SEARCH</button>
		            </td>
		      </tr>
		    </table>
		    </div>
		<div id="brandtab">
			<button id="brandAddBt" onclick="addbr()">Add Brands</button>
				<table class="tablemember" cellpadding="7" cellspacing="0" id="resultTable2">
					<thead>
						<th width="40px;">ID<div class="wrapSort"><span class="spancurup" onclick="sortfuncb('brand_id','asc')">▲</span><span class="spancurdown" onclick="sortfuncb('brand_id','desc')">▼</span></div></th>
						<th>Brand Name<div class="wrapSort"><span class="spancurup" onclick="sortfuncb('brand_name','asc')">▲</span><span class="spancurdown" onclick="sortfuncb('brand_name','desc')">▼</span></div></th>
						<th>Type<div class="wrapSort"><span class="spancurup" onclick="sortfuncb('brand_type','asc')">▲</span><span class="spancurdown" onclick="sortfuncb('brand_type','desc')">▼</span></div></th>
					    <th>Picture<div class="wrapSort"><span class="spancurup" onclick="sortfuncb('brand_picture','asc')">▲</span><span class="spancurdown" onclick="sortfuncb('brand_picture','desc')">▼</span></div></th>
						<th width="120px;">Create Date<div class="wrapSort"><span class="spancurup" onclick="sortfuncb('create_date','asc')">▲</span><span class="spancurdown" onclick="sortfuncb('create_date','desc')">▼</span></div></th> 
						<th width="150px;"></th>
					</thead>
					<tbody id="itemContainer2">
						<?php
						$results5 = $wpdb->get_results("SELECT * FROM wp_brand");
						foreach($results5 as $dbr5){
						?>
						<tr>
							<td style="text-align:center;"><?php echo $dbr5->brand_id; ?></td>
							<td><?php echo  $dbr5->brand_name; ?></td>
							<td><?php $solo =  $dbr5->brand_type;
								$results6 = $wpdb->get_results("SELECT type_name FROM wp_type WHERE type_id = $solo");
								foreach($results6 as $dbr6){
									echo $dbr6->type_name;
								}?>
						    </td>
							<td><?php echo  $dbr5->brand_picture; ?></td>
							<td style="text-align:center;"><?php echo  $dbr5->create_date; ?></td>	
							<td style="text-align:center;"><button id="brandAddBt" onclick="toeditb(<?php echo $dbr5->brand_id; ?>)" >Edit</button><button id="brandAddBt" onclick="todelb(<?php echo $dbr5->brand_id; ?>)" >Delete</button></td>						
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<div class="holder2"></div>
		</div>
		<div id="addbrand">
			<div style=" width:400px; margin:20px auto; border: 2px solid #2ea2cc; padding: 10px 5px 5px 5px; bakground-color:white;position:relative;">
			<div style="background: rgb(243, 243, 243);
						height: 35px;
						color: #0074a2;
						font-size: 16px;
						line-height: 31px;
						padding: 0px 10px;
						top: -17px;
						right: 10px;
						position: absolute;
						text-transform: uppercase;
						font-weight: 800;">Add brand</div>
				<div id="brandformAll">
					<div class="brandTT">Brand Name</div>
					<div class="brandDS">
						<input id="br_name" name="br_name" style="height: 35px; width: 100%; outline: none;">
					</div>
					<div class="brandTT">Type</div>
					<div class="brandDS">
						<select id="br_type" name="br_type" style="height: 35px; width: 100%; outline: none;">
							<option value=""> -- select type --</option>
							<?php
							$results7 = $wpdb->get_results("SELECT * FROM wp_type");
							foreach($results7 as $dbr7){
							?>
							<option value="<?php echo $dbr7->type_id; ?>"><?php echo $dbr7->type_name; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="brandTT">Brand Picture</div>
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
				</div>
				<input type="hidden" id="edit_idb" name="edit_idb" value="">
				<button id="brandEditBt" onclick="editbrand()">SAVE</button>
				<button id="brandSubmitBt" onclick="addbrand()">SUBMIT</button>
				<button id="brandBackBt" onclick="backbr()">Back</button>
			</div>
		</div>
	</div>
	
</div>
<?php
}


















function ui_admin_members(){
$getdirect =  get_template_directory_uri();
global $wpdb; 
?>
<script src="<?php echo get_template_directory_uri(); ?>/TMT.Products/js/jquery-2.0.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/TMT.Products/js/jPages.js"></script>
<script type="text/javascript">
	var sortff = 0;
	$(document).keypress(function(event){
 
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
           makeAjaxRequest();
            //alert('You pressed a "enter" key in somewhere');    
        }
     
    });
	$(function(){
	    $("div.holder").jPages({
	      containerID  : "itemContainer",
	      perPage      : 30,
	      startPage    : 1,
	      startRange   : 1,
	      midRange     : 5,
	      endRange     : 1
	    });

	});
	function onselected() {
	    var x = document.getElementById("selhead").value;
	    document.getElementById("inputtext").placeholder= x;
	}
	function makeAjaxRequest() {
    	var stri = $('#inputtext').val();
		var strf = $('#selhead option:selected').val();
		/*console.log(stri);
		console.log(strf);
		console.log(sortff);*/
        $.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/TMT.Products/service/search.php',
            type: 'post',
            data: {searchtext: stri, filter: strf,sortf : sortff},
            dataType: 'json',
            success: function(response) {
            	console.log(response);
            	if(response == null){
            		var rec ='';
            		rec+='	<tr>';
					rec+='		<td style="text-align:center;" colspan="11">Not Found.</td>';
					rec+='	</tr>';
            	}else{
	            	var rec ='';
	            	for (var chk = 0; chk < response.length; chk++) {
	            	rec+='	<tr>';
					rec+='		<td style="text-align:center;">'+response[chk].id+'</td>';
					rec+='		<td>'+response[chk].pd_code+'</td>';
					rec+='		<td>'+response[chk].brandName+'</td>';
					rec+='		<td>'+response[chk].pd_type+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].pd_front+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].pd_series+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].pd_pan_wheels+'</td>';
					rec+='		<td>'+response[chk].pd_price+'</td>';
					rec+='		<td>'+response[chk].pd_picture+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].create_date+'</td>';
					rec+='		<td style="text-align:center;"><button id="productAddBt" onclick="toedit('+response[chk].id+')" >Edit</button><button id="productAddBt" onclick="todel('+response[chk].id+')" >Delete</button></td>';
					rec+='	</tr>';
					}
				}
                $('table#resultTable tbody').html(rec);
                $(function(){
				    $("div.holder").jPages({
				      containerID  : "itemContainer",
				      perPage      : 30,
				      startPage    : 1,
				      startRange   : 1,
				      midRange     : 5,
				      endRange     : 1
				    });

	              });
            }
        });
    }
	function toadd(){
		//alert("sss");
		$("#table").css('display','none');
		$("#addproduct").css({'display':'table','width':'100%'});
		$('#tabTypeAll').hide();
		$('#productSubmitBt').show();
		$('#productEditBt').hide();
		$('hr').hide();
	}
	function toback(){
		//alert("sss");
		$('#edit_id').val('');
		$('#pd_code').val('');
        $('#pd_price').val('');
        $('#pd_brand').val('');
        $('#pd_type').val('');
        $('#pd_front').val('');
        $('#pd_series').val('');
        $('#pd_wheel').val('');
        $('#productDesTH').val('');
        $('#productDesEN').val('');
        $('#productDetTH').val('');
        $('#productDetEN').val('');
        $('#img_hide_pageIndex1_3').val('');
        $('#img_pageIndex1_2').attr("src",'<?php echo $getdirect ?>/TMT.Products/images/bgEmpty.png');
        $('#img_hide_pageIndex1_2').val('');
		$("#table").css('display','block');
		$("#addproduct").css('display','none');
		$('#tabTypeAll').show();
		$('hr').show();
	}
	function toedit(idpd){
		//alert("sss");		
		var link = '<?php echo $getdirect; ?>';
            $.ajax({ 
                url: link+'/TMT.Products/service/service_sql_select_one_pd.php',
                type: "POST",
                data: { 'ID':idpd},
                dataType: 'json'
            }) // END SELECT //
            .done(function(data){ 
               $('#edit_id').val(data[0].id);              
               $('#pd_code').val(data[0].pd_code);
               $('#pd_price').val(data[0].pd_price);
               $('#pd_brand').val(data[0].brandId);
               $('#pd_type').val(data[0].pd_type_id);
               $('#pd_front').val(data[0].pd_front);
               $('#pd_series').val(data[0].pd_series);
               $('#pd_wheel').val(data[0].pd_pan_wheels);
               $('#productDesTH').val(data[0].pd_description_th);
               $('#productDesEN').val(data[0].pd_description_en);
               $('#productDetTH').val(data[0].pd_detail_th);
               $('#productDetEN').val(data[0].pd_detail_en);
               if(data[0].pd_tb_img != null){
               		$('#img_hide_pageIndex1_3').val(data[0].pd_tb_img);
          	   }
          	   $('#img_pageIndex1_2').attr("src",'/sahayoungthong/wp-content/uploads/'+data[0].pd_picture);
          	   $('#img_hide_pageIndex1_2').val('http://visarut.tomatohub.info/sahayoungthong/wp-content/uploads/'+data[0].pd_picture);
               $("#table").css('display','none');
				$("#addproduct").css({'display':'table','width':'100%'});
				$('#tabTypeAll').hide();
				$('#productSubmitBt').hide();
				$('#productEditBt').show();
				$('hr').hide();
               //location.reload();
            }) // END DONE SELECT //
            .fail(function(data){
                alert('FAIL \n'+data+".");
            });
	}
	function editproduct(){
			var link = '<?php echo $getdirect; ?>';
            membersUpdate         = [];
            var checkid = $('#edit_id').val();          
            var chkMemberCompanyName = $('#pd_code').val();
            //console.log(chkMemberCompanyName);
            if(chkMemberCompanyName == '' || checkid == ''){
                alert("Can not update,try again");
            }
            else{
            	//alert($('#img_hide_pageIndex1_3').val());
                var dataMembersUpdate = {   id: $('#edit_id').val(),
							                pd_code: $('#pd_code').val(),
							                pd_price: $('#pd_price').val(),
							                pd_brand: $("#pd_brand option:selected").val(),
							                pd_type: $("#pd_type option:selected").val(),
							                pd_front: $('#pd_front').val(),
							                pd_series: $('#pd_series').val(),
							                pd_wheel: $('#pd_wheel').val(),
							                productDesTH: $('#productDesTH').val(),
							                productDesEN: $('#productDesEN').val(),
							                productDetTH: $('#productDetTH').val(),
							                productDetEN: $('#productDetEN').val(),
							                productDetPic: $('#img_hide_pageIndex1_3').val(),
							                productPic: $('#img_hide_pageIndex1_2').val()
                                    };
                var objMembersUpdate = dataMembersUpdate;
                membersUpdate.push(objMembersUpdate);
                
                //console.log(membersUpdate);
                        
                $.ajax({
                            url: link+'/TMT.Products/service/service_sql_update_pd.php',
                            type: "POST",
                            data: {arrMembersUpdate : membersUpdate},
                        }) // END UPDATE ALL CHANGE //
                        .done(function(data){
                           alert("Edit complete");
                           location.reload();
                            //$('#pendingData').hide();
                        }) // END DONE UPDATE ALL CHANGE //
                        .fail(function(data){
                            alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART UPDATE \nTMT.IMGSLIDE');
                        }); // END FAIL UPDATE ALL CHANGE //*/
                
            
            }
	}
	function todel(chkIdRm){
		if(confirm(" Are you sure to Delete this data?")){
			var link = '<?php echo $getdirect; ?>';
            $.ajax({ 
                url: link+'/TMT.Products/service/service_sql_remove_pd.php',
                type: "POST",
                data: { 'ID':chkIdRm},
                dataType: 'html'
            }) // END SELECT //
            .done(function(data){
               alert(data);
               location.reload();
            }) // END DONE SELECT //
            .fail(function(data){
                alert('FAIL \nDelete \n'+data+".");
            }); // END FAIL SELECT //
		}
	}
	function sortproduct(q){
		//alert(q);
		$('#inputtext').val("");
		sortff = q;
		var qq = q;
		var link = '<?php echo $getdirect; ?>';
		//alert(q);
		$.ajax({
	        url: link+'/TMT.Products/service/sortproduct.php',
	        type: 'get',
	        data: {bkk: q },
	        success: function(response) {
	        	//console.log(response);
	        	recomend(qq);
	           	$('table#resultTable tbody').html(response);
	           	$(function(){
				    $("div.holder").jPages({
				      containerID  : "itemContainer",
				      perPage      : 30,
				      startPage    : 1,
				      startRange   : 1,
				      midRange     : 5,
				      endRange     : 1
				    });

	              });
	        }
	    });

	}
	function recomend(qq){
		var qqq = qq;
		var link = '<?php echo $getdirect; ?>';
		if(qq > 0){
			$.ajax({
		        url: link+'/TMT.Products/service/service_sql_select_type.php',
		        type: 'POST',
		        data: {id: qq },
		        dataType: 'json',
		        success: function(data) {
		        	//console.log(data);
		        	var rec ='';
		        	rec += 'Recommend Product : ';
		        	rec += '<select id="selc" name="selc" onchange="changeRec('+qqq+')">';
		        	if(data != null){
			        	for (var chkListMembers = 0; chkListMembers < data.length; chkListMembers++) {
			        		if(data[chkListMembers].select == '1'){
			        			rec += '<option value="'+data[chkListMembers].id+'" selected>'+data[chkListMembers].pd_code+'</option>';
			        		}else{
			        			rec += '<option value="'+data[chkListMembers].id+'">'+data[chkListMembers].pd_code+'</option>';
			        		}
			        	}
		        	}else{
		        		rec += '<option value=""></option>';
		        	}
		        	rec += '</select>';
		        	$('#productRec').show();
		        	$('#selectRec').empty();
		        	$('#selectRec').append(rec); 
		           	//$('table#resultTable2 tbody').html(response);
		        }
		    });
		}else{
			$('#productRec').hide();
		}

	}
	function changeRec(a){
		typeUpdate = [];
		var datatypeUpdate = { id: a, pd_id: $('#selc option:selected').val()};
        var objtypeUpdate = datatypeUpdate;
        typeUpdate.push(objtypeUpdate);
        var link = '<?php echo $getdirect; ?>';
		$.ajax({
            url: link+'/TMT.Products/service/service_sql_update_type_rec.php',
            type: "POST",
            data: {arrTypeUpdate : typeUpdate},
            }) // END UPDATE ALL CHANGE //
            .done(function(data){
                alert("Updaete Reccommend Complete");
            })
            .fail(function(data){
                alert('FAIL \nSAVE ALL CHANGE \nUPDATE & INSERT PART UPDATE \nTMT.IMGSLIDE');
            }); 

	}
	function addproduct(){
		var pdcode = $("#pd_code").val();		
		var pdbrand = $("#pd_brand option:selected").val();
		var pdtype = $("#pd_type option:selected").val();
		var pdfront = $("#pd_front").val();
		var pdseries = $("#pd_series").val();
		var pdwheel = $("#pd_wheel").val();
		var pdprice = $("#pd_price").val();
		var pdpic = $("#img_hide_pageIndex1_2").val();
		
		var pdtbImg = $("#img_hide_pageIndex1_3").val();
		var pddesTH = $("#productDesTH").val();
		var pddesEN = $("#productDesEN").val();
		var pddetTH = $("#productDetTH").val();
		var pddetEN = $("#productDetEN").val();
		var link = '<?php echo $getdirect; ?>';
		//console.log(pdcode);console.log(pdbrand);console.log(pdtype);console.log(pdfront);console.log(pdseries);console.log(pdwheel);console.log(pdprice);console.log(pdpic);
		$.ajax({
	        url: link+'/TMT.Products/service/productdb.php',
	        type: 'get',
	        data: {pdcode: pdcode, pdbrand: pdbrand, pdtype: pdtype, pdfront: pdfront, pdseries: pdseries, pdwheel: pdwheel, pdprice: pdprice, pdpic: pdpic, pdtbImg: pdtbImg, pddesTH: pddesTH, pddesEN: pddesEN, pddetTH: pddetTH, pddetEN: pddetEN },
	        success: function(response) {
	           	if(response == 1){
	           		alert("Complete");
	           		location.reload();
	           	}else{
	           		alert(response);
	           		location.reload();
	           	}
	           	//console.log(response);
	        }
	    });
	}
	
	
jQuery(document).ready(function($) {

    $('.tabType').click(function(){
	    $('.tabType').removeClass('tabTypeCurrent');
	    $(this).addClass('tabTypeCurrent');
    });
    $('.btLangDesAll').click(function(){
    	$('.btLangDesAll').removeClass('btLangAllCurrent');
		$(this).addClass('btLangAllCurrent');
		var chkLang = $(this).text();
		$('.productDes').hide(); 
		$('#productDes'+chkLang).fadeIn(800);   
    });
    $('.btLangDetAll').click(function(){
    	$('.btLangDetAll').removeClass('btLangAllCurrent');
		$(this).addClass('btLangAllCurrent');
		var chkLang = $(this).text();
		$('.productDet').hide(); 
		$('#productDet'+chkLang).fadeIn(800);   
    });

});
function sortfunc(a,b){	
    	var stri = $('#inputtext').val();
		var strf = $('#selhead option:selected').val();
		$.ajax({
            url: '<?php echo get_template_directory_uri(); ?>/TMT.Products/service/sortpd.php',
            type: 'get',
            data: {searchtext: stri, filter: strf, cate: sortff, sortby: a, order: b},
            dataType : 'json',
            success: function(response) {
            	console.log(response);
                if(response == null){
            		var rec ='';
            		rec+='	<tr>';
					rec+='		<td style="text-align:center;" colspan="11">Not Found.</td>';
					rec+='	</tr>';
            	}else{
	            	var rec ='';
	            	for (var chk = 0; chk < response.length; chk++) {
	            	rec+='	<tr>';
					rec+='		<td style="text-align:center;">'+response[chk].id+'</td>';
					rec+='		<td>'+response[chk].pd_code+'</td>';
					rec+='		<td>'+response[chk].brandName+'</td>';
					rec+='		<td>'+response[chk].pd_type+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].pd_front+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].pd_series+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].pd_pan_wheels+'</td>';
					rec+='		<td>'+response[chk].pd_price+'</td>';
					rec+='		<td>'+response[chk].pd_picture+'</td>';
					rec+='		<td style="text-align:center;">'+response[chk].create_date+'</td>';
					rec+='		<td style="text-align:center;"><button id="productAddBt" onclick="toedit('+response[chk].id+')" >Edit</button><button id="productAddBt" onclick="todel('+response[chk].id+')" >Delete</button></td>';
					rec+='	</tr>';
					}
				}
                $('table#resultTable tbody').html(rec);
                $(function(){
				    $("div.holder").jPages({
				      containerID  : "itemContainer",
				      perPage      : 30,
				      startPage    : 1,
				      startRange   : 1,
				      midRange     : 5,
				      endRange     : 1
				    });

	              });
            }
        });
	
}	
</script>
<style type="text/css">
	.buto{
		cursor:pointer; 
		width:120px; 
		height:35px; 
		background-color:lightblue; 
		color:black; 
		font-weight:bold; 
		font-size:18px; 
		padding:10px 0 0 10px; 
		margin-left:5px;
	}
	.tabTypeCurrent{
		color: #fff!important;
		background-color: #0074a2!important;
		cursor: default!important;
	}
	#addproduct{
		display: none;
	}
	#brandsFilters ul li {
		display: inline-table;
		padding: 5px 10px;
		border-radius: 5px;
		background: rgba(0,116,162,.2);
		margin: 15px 10px 0px 0px;
		color: #0074a2;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
		font-size: 12px;
	}
	#brandsFilters ul li:hover {
		color: #fff;
		background-color: #0074a2;
	}
	.tablemember {
		border-style: solid;
		border-color:WhiteSmoke;
		width:100%;
	}
	.tablemember tr:nth-child(even) { background-color:rgb(199, 240, 255); }
	.tablemember tr:nth-child(odd) { background-color:#FFFFFF; }
	.tablemember th {background-color: #0074a2; color:white; cursor: default; position: relative;}
	#productRec{
		
		float: left;
		margin: 0px 5px 5px 5px;
		padding: 10px;
		color: black;
		text-transform: uppercase;
	}
	#productAddBt{
		background: #2ea2cc;
		border: none;
		float: right;
		margin: 0px 5px 5px 5px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#productSubmitBt{
		background: #2ea2cc;
		border: none;
		margin: 0px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#productEditBt{
		background: #2ea2cc;
		border: none;
		margin: 0px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#productAddBt:hover,#productEditBt:hover,
	#productSubmitBt:hover{
		background: #ccc;
		color: #2ea2cc;
	}
	#productBackBt{
		background: #0074a2;
		border: none;
 /* 		float: right; */
		margin: 0px 5px 5px 5px;
		padding: 10px;
		color: white;
		text-transform: uppercase;
		cursor: pointer;
		-webkit-transition: all 0.2s ease;
		-moz-transition: all 0.2s ease;
		-o-transition: all 0.2s ease;
		transition: all 0.2s ease;
	}
	#productBackBt:hover{
		background: #ccc;
		color: #0074a2;
	}
	#resultTable2 td{
		border-left: 1px solid rgb(219, 219, 219);
		border-bottom: 1px solid rgb(219, 219, 219);
	}
	#resultTable2 td:last-child{
		border-right: 1px solid rgb(219, 219, 219);
	}
	#picAll{
		margin-right: 10px;
	}
	#picAll,
	#productDetailAll{
		display: inline-table;
		width: 400px;
		vertical-align: top;
	}
	.brandTT{
		color: #888;
	}
	.brandDS{
		margin: 5px 0px 5px 0px;
	}
	#img_pageIndex1_2{
		width: 400px;
		margin: auto;
		position: absolute;
		top:-99999px;
		bottom:-99999px;
		left:-99999px;
		right:-99999px;
	}
	#inlineForm ul,
	.inlineForms ul{
		margin: 0px;
		padding: 0px;
	}
	#inlineForm li{
		display: inline-table;
		width: 32.55%;
	}
	.inlineForms li{
		display: inline-table;
		width: 49%;
	}
	.img_pageIndex1_2{
		background: url('<?php echo get_template_directory_uri(); ?>/TMT.Products/images/bgProductImg.jpg')no-repeat center center!important;
		width: 400px;
		height: 330px;
		overflow: hidden;
		position: relative;
	}
	.brandDS{
		position: relative;
	}
	.btLangPDAll,
	.btLangDTAll{
		position: absolute;
		display: table;
		right: -1px;
		top: -25px;
	}
	.btLangDesAll,
	.btLangDetAll{
		display: inline-table;
		padding: 3px;
		background: transparent;
		margin: 0px 1px;
		border: 1px solid #ccc;
		cursor: pointer;
	}
	.btLangAllCurrent{
		border-bottom: 1px solid #fff!important;
		background: #fff!important;
	}
	.textAreaWrap{
		background: #fff;
		padding: 5px;
		padding-bottom: 0px;
		border: 1px solid #ccc;
	}
		.holder {	
    margin: 25px 0;
  }

  .holder a {
    font-size: 16px;
    cursor: pointer;
    margin: 0px;
    color: #333;
    border: 2px solid  #EEEEEE;
    padding: 5px 10px;
    background-color: white ; 
  }

  .holder a:hover {
    background-color: rgb(199, 240, 255) ;
    color: black;
  }

  .holder a.jp-previous { margin-right: 0px; }
  .holder a.jp-next { margin-left: 0px; }

  .holder a.jp-current, a.jp-current:hover {
    color: #FF4242;
    font-weight: bold;
  }

  .holder a.jp-disabled, a.jp-disabled:hover {
    color: #bbb;
  }

  .holder a.jp-current, a.jp-current:hover,
  .holder a.jp-disabled, a.jp-disabled:hover {
    cursor: default;
    background: none;
  }

  .holder span { margin: 0 5px; }
  .spancurup{
  	font-size:10px; 
  	cursor:pointer;
  	color: WhiteSmoke;
  }
  .spancurdown{
  	font-size:10px; 
  	cursor:pointer;
  	color: WhiteSmoke;
  }
  .spancurdown:hover, .spancurup:hover{
  	color: Gainsboro;
  }
  .wrapSort {
	position: absolute;
	right: 0px;
	top: 0px;
	bottom: 0px;
	margin: auto;
	display: table;
	}
	.wrapSort span {
display: table;
padding: 0px;
margin: 0px;
line-height: 10px;
}
</style>
<div style="width:98%;">
  <div style="height:20px;"></div>
	<div style="background-color: #2ea2cc;
				height: 30px;
				border-radius: 10px 10px 0px 0px;
				border: 2px solid #0074a2;
				color: #fff;
				font-size: 16px;
				line-height: 31px;
				padding: 5px 10px;">TMT Product</div>
	<div style="border: 2px solid #0074a2; border-top: none;">
	<div id="tabTypeAll" style="margin: -15px 0 0 10px;">
		<div id="brandsFilters">
			<ul>
				<li class="tabType tabTypeCurrent" onclick="sortproduct('0')">All</li>
				<?php
					$results17 = $wpdb->get_results("SELECT type_id,type_name FROM wp_type");
					foreach($results17 as $dbr17){?>
						<li class="tabType" onclick="sortproduct('<?php echo $dbr17->type_id; ?>')"><?php echo $dbr17->type_name; ?></li>
			    <?php } ?>
			</ul>
		</div>
		<hr>
	</div>
		<div id="table">
			<div>
			<table>
		      <tr>
		            <td>
		            <input type="text" name="inputtext" id="inputtext" placeholder="ALL">
		            </td>
		            <td > 
			            <select id="selhead" name="selhead" onchange="onselected()">
				            <option value="ALL">-- Select filter --</option>
				            <option value="pd_code">Product Code</option>
				            <option value="brand">Brand</option>
			            </select>            
		            </td>		           	           
		            <td>
		            <button class="btnSearch" onclick="makeAjaxRequest();">SEARCH</button>
		            </td>
		      </tr>
		    </table>
		    </div>
			<div id="productRec"><span id="selectRec"></span></div>

			<button id="productAddBt" onclick="toadd()" >Add Product</button>
			<table class="tablemember" cellpadding="7" cellspacing="0" id="resultTable">
				<thead>
					<th width="40px;">ID<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_id','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_id','desc')">▼</span></div></th>
					<th>Product Code<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_code','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_code','desc')">▼</span></div></th>
					<th>Brand<div class="wrapSort"><span class="spancurup" onclick="sortfunc('brand_id','asc')">▲</span><span class="spancurdown" onclick="sortfunc('brand_id','desc')">▼</span></div></th>
					<th>Product Type<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_type','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_type','desc')">▼</span></div></th>
				    <th>Front tires<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_front','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_front','desc')">▼</span></div></th>
				    <th>Series<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_series','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_series','desc')">▼</span></div></th>
				    <th>Wheel caps<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_pan_wheels','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_pan_wheels','desc')">▼</span></div></th>
					<th>Price<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_price','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_price','desc')">▼</span></div></th>
					<th>Picture<div class="wrapSort"><span class="spancurup" onclick="sortfunc('pd_picture','asc')">▲</span><span class="spancurdown" onclick="sortfunc('pd_picture','desc')">▼</span></div></th>
					<th width="120px;">Create Date<div class="wrapSort"><span class="spancurup" onclick="sortfunc('create_date','asc')">▲</span><span class="spancurdown" onclick="sortfunc('create_date','desc')">▼</span></div></th> 
					<th width="150px;"></th>
				</thead>
				<tbody id="itemContainer">
					
					<?php
						$results = $wpdb->get_results("SELECT * FROM wp_product");
						foreach($results as $dbr){
					?><tr>
						<td style="text-align:center;"><?php echo $dbr->pd_id; ?></td>
						<td><?php echo $dbr->pd_code; ?></td>
						<td><?php $solop = $dbr->brand_id;
								$results2 = $wpdb->get_results("SELECT brand_name FROM wp_brand WHERE brand_id = $solop");
								foreach($results2 as $dbr2){
									echo $dbr2->brand_name;
								}?></td>
						<td><?php $sala = $dbr->pd_type; 
							    $results13 = $wpdb->get_results("SELECT type_name FROM wp_type WHERE type_id = $sala");
								foreach($results13 as $dbr13){
									echo $dbr13->type_name;
								}?></td>
						<td style="text-align:center;"><?php echo $dbr->pd_front; ?></td>
						<td style="text-align:center;"><?php echo $dbr->pd_series; ?></td>
						<td style="text-align:center;"><?php echo $dbr->pd_pan_wheels; ?></td>
						<td><?php echo $dbr->pd_price; ?></td>
						<td><?php echo $dbr->pd_picture; ?></td>
						<td style="text-align:center;"><?php echo $dbr->create_date; ?></td>
						<td style="text-align:center;"><button id="productAddBt" onclick="toedit(<?php echo $dbr->pd_id; ?>)" >Edit</button><button id="productAddBt" onclick="todel(<?php echo $dbr->pd_id; ?>)" >Delete</button></td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			<div class="holder"></div>
		</div>
		<div id="addproduct">
			<div style="border: 2px solid #2ea2cc; padding: 5px; display:table; margin:20px auto; bakground-color:white;position:relative;">
			<div style="background: rgb(243, 243, 243);
						height: 35px;
						color: #0074a2;
						font-size: 16px;
						line-height: 31px;
						padding: 0px 10px;
						top: -17px;
						right: 10px;
						position: absolute;
						text-transform: uppercase;
						font-weight: 800;">Add product</div>
			
				<div id="productformAll" style=" padding:10px 0px 0px 0px;">
				<div id="picAll">
					<div class="uiPageIndexFormBanner">
				    <div class="backgroundIMGimghd backgroundIMGPageIndexImghd upload-img img_pageIndex1_2">
				        <a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img='pageIndex1_2';">
				            <img id="img_pageIndex1_2" class="img-preview" src="<?php echo get_template_directory_uri(); ?>/TMT.Products/images/bgEmpty.png"/>
				            <input type="hidden" id="img_hide_pageIndex1_2" value="#">
				        </a>
				    </div>
					</div>
				</div>
				<div id="productDetailAll">
					<div class="brandTT">Product Code</div>
					<div class="brandDS"><input id="pd_code" name="pd_code" style="height: 35px; width: 100%; outline: none;" value=""></div>
					<div class="brandTT">Price</div>
					<div class="brandDS"><input id="pd_price" name="pd_price" style="height: 35px; width: 32.55%; outline: none;"></div>
					<div class="inlineForms">
						<ul>
							<li>
								<div class="brandTT">Brand</div>
								<div class="brandDS">
									<select id="pd_brand" name="pd_brand" style="height: 35px; width: 100%; outline: none;">
										<option value=""> -- select --</option><?php
										$results3 = $wpdb->get_results("SELECT * FROM wp_brand");
										foreach($results3 as $dbr3){
										?>
										<option value="<?php echo $dbr3->brand_id; ?>"><?php echo $dbr3->brand_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</li>
							<li>
								<div class="brandTT">Product Type</div>
								<div class="brandDS">
									<select id="pd_type" name="pd_type" style="height: 35px; width: 100%; outline: none;">
										<option value=""> -- select type --</option>
										<?php
										$results4 = $wpdb->get_results("SELECT * FROM wp_type");
										foreach($results4 as $dbr4){
										?>
										<option value="<?php echo $dbr4->type_id; ?>"><?php echo $dbr4->type_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</li>
						</ul>
					</div>
					<div id="inlineForm">
						<ul>
							<li>
								<div class="brandTT">Front tire</div>
								<div class="brandDS"><input id="pd_front" name="pd_front" style="height: 35px; width: 100%; outline: none;"></div>
							</li>
							<li>
								<div class="brandTT">Series</div>
								<div class="brandDS"><input id="pd_series" name="pd_series" style="height: 35px; width: 100%; outline: none;"></div>
							</li>
							<li>
								<div class="brandTT">Wheel caps</div>
								<div class="brandDS"><input id="pd_wheel" name="pd_wheel" style="height: 35px; width: 100%; outline: none;"></div>
							</li>
						</ul>
					</div>
					<div class="brandTT">Table Image For Size & Specification<span style="color:#000;"> ( max width: 800px )</span></div>
					<div class="brandDS">
						<input id="img_hide_pageIndex1_3" name="tb_img" style="height: 35px; width: 65.5%; outline: none;">
						<a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img='pageIndex1_3';" style="display:inline-table;text-decoration: none;">
				           <div style="	background: #2ea2cc;
										border: none;
										margin: 0px;
										padding: 8.5px 38px;
										color: white;
										text-transform: uppercase;
										cursor: pointer;
										-webkit-transition: all 0.2s ease;
										-moz-transition: all 0.2s ease;
										-o-transition: all 0.2s ease;
										transition: all 0.2s ease;">browse</div>				            
				        </a>
					</div>
				</div>
				<div class="inlineForms">
					<ul>
						<li>
							<div class="brandTT">Product Description</div>
							<div class="brandDS">
								<div class="textAreaWrap">
									<div class="btLangPDAll">
										<div class="btLangDesAll btLangAllCurrent">TH</div>
										<div class="btLangDesAll">EN</div>
									</div>
									<textarea class="productDes" id="productDesTH" style="margin: 0px;width: 100%;height: 100px;"></textarea>
									<textarea class="productDes" id="productDesEN" style="margin: 0px;width: 100%;height: 100px; display:none;"></textarea>
								</div>						
							</div>	
						</li>
						<li style="margin-left:14px;">
							<div class="brandTT">Product Detail</div>
							<div class="brandDS">
								<div class="textAreaWrap">
									<div class="btLangDTAll">
										<div class="btLangDetAll btLangAllCurrent">TH</div>
										<div class="btLangDetAll">EN</div>
									</div>
									
									<textarea class="productDet" id="productDetTH" style="margin: 0px;width: 100%;height: 100px;"></textarea>
									<textarea class="productDet" id="productDetEN" style="margin: 0px;width: 100%;height: 100px; display:none;"></textarea>
								</div>
							</div>	
						</li>
					</ul>
				</div>
			</div>
				<input type="hidden" id="edit_id" name="edit_id" value="">
				<button id="productSubmitBt"onclick="addproduct()">SUBMIT</button>
				<button id="productEditBt"onclick="editproduct()">SAVE</button>
				<button id="productBackBt" onclick="toback()" >Back</button>
			</div>
		</div>
	</div>
</div>
<?php
}	
?>