<?php
/**
 * Template Name: location page
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */

get_header(); 
global $wpdb;
$getall = $wpdb->get_results("SELECT * FROM wp_location");
$num_loca = $wpdb->num_rows;
$st = 0;
$slo = "[";
foreach($getall as $fearr){
    $st++;
    if($st == 1){
        $slo .= "['".$st." Beach', ".(float)$fearr->lat.", ".(float)$fearr->long.", ".(int)$fearr->zoom."]";
    }else{
        $slo .= ",['".$st." Beach', ".(float)$fearr->lat.", ".(float)$fearr->long.", ".(int)$fearr->zoom."]";
    }
}
$slo .= "]";
//echo $slo;
?>
<style>
	.branchPicAll{
		width: 410px;
	}
	.branch_name{
		cursor: pointer;
	}
	.branch_name:hover{
		opacity: .5;
	}
	#map-canvas { 
		height: 100%; 
		margin: 0; 
		padding: 0;
	}
    .branch_address{
        line-height: 3em;
    }
</style>
<script src="<?php echo get_template_directory_uri(); ?>/js/location_template.js"></script>





<!-- Google-Map API -->
<!-- <script src="http://maps.googleapis.com/maps/api/js?client=621522569959-bhmm4rathd1q403gd448o0dftbouk6gg.apps.googleusercontent.com&v=3.17"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE-57xbVdzQDOzYZquZowz8vnUjyS0E_c"></script>
<script type="text/javascript">



  	function initialize() {
	
  		var myLatlng = new google.maps.LatLng(13.742239,100.513119);
        var mapOptions = {
        	zoom: 17,
        	center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        setMarkers(map, location_latlong);

  	}

  	/*var location_latlong = [
		['1 Beach', 13.742239, 100.513109, 1],
		['2 Beach', 13.742239, 100.514129, 2],
		['3 Beach', 13.742239, 100.515139, 3],
		['4 Beach', 13.742239, 100.516149, 4],
		['5 Beach', 13.742239, 100.517159, 5]
	];*/
    var location_latlong = <?php echo $slo ?>;
    //console.log(location_latlong);
  	function setMarkers(map, locations) {
		// Add markers to the map
		for (var i = 0; i < locations.length; i++) {
			console.log(locations[i]);
			var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: locations[i][0],
				zIndex: locations[i][3]
			});

			marker.setMap(map);

			var _target = "#branch"+(i+1);
			var lat  = locations[i][1];
			var long = locations[i][2];
			set_clickEvent(_target, lat, long);
		}
		function set_clickEvent(_target, lat, long) {
			$( _target ).click( function(event) {
				var pan_to_pos = new google.maps.LatLng( lat, long);
				map.panTo(pan_to_pos);
				console.log( _target );
			});
		}
	}

	



    // Do load GoogleMap on The Element
    google.maps.event.addDomListener(window, 'load', initialize);




</script>








<div id="wrapper2">
        <div id="product_title"><p>
	        <?php 
				if(isset($_SESSION['lang'])){
					if( $_SESSION['lang']=="TH" ){
						?> <!-- title TH : --> <?php the_title();
					}else if( $_SESSION['lang']=="EN" ){
					$idx = get_the_ID();
						?> <!-- title EN : --> <?php the_title_tmt($idx);
					}
				} else {
					//echo "Session no value";
					the_title();
				}
			?>
        </p></div> 
        <div id="id1"></div>
        <div id="location_box">
            <div id="location_box_L">
                <div id="location_box_L_title">
                    <p class="fontTitleBlue">
	                    <?php 
							if(isset($_SESSION['lang'])){
								if( $_SESSION['lang']=="TH" ){
									?> <!-- title TH : --> <?php the_title();
								}else if( $_SESSION['lang']=="EN" ){
								$idx = get_the_ID();
									?> <!-- title EN : --> <?php the_title_tmt($idx);
								}
							} else {
								//echo "Session no value";
								the_title();
							}
						?>
                    </p>
                </div>



                <div id="location_box_L_map">
                     <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.6068050733634!2d100.51311899999999!3d13.742239000000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299240c6d88dd%3A0xc38c8c38bbce34e2!2z4LiE4LmH4Lit4LiB4Lie4Li04LiXIEAg4Liq4Lir4Lii4Liy4LiH4LiX4Lit4LiH!5e0!3m2!1sth!2sth!4v1411976172133" width="513" height="370" frameborder="0" style="border:0"></iframe> -->
               		<div id="map-canvas"></div>
                </div>



            </div>
            <div id="location_box_R">
                <div id="location_box_R_title">
                    <p class="fontTitleBlue"> <?php 
                            if(isset($_SESSION['lang'])){
                                if( $_SESSION['lang']=="TH" ){
                                    ?>ค้นหาศูนย์บริการ "สหยางทอง" ใกล้บ้านคุณ<?php
                                }else if( $_SESSION['lang']=="EN" ){
                                $idx = get_the_ID();
                                    ?>Find the nearest Sahayangtong Service Center<?php 
                                }
                            } else {
                                ?>ค้นหาศูนย์บริการ "สหยางทอง" ใกล้บ้านคุณ<?php
                            }
                        ?></p>
                </div>
                <?php 
                $zx = 1;
                foreach($getall as $fearr){ ?>
                    <div class="branchAll">
                        <div class="branchNameAll">
                            <p class="branch_name" id="branch<?php echo $zx; ?>"><?php 
                            if(isset($_SESSION['lang'])){
                                if( $_SESSION['lang']=="TH" ){
                                   echo $fearr->lct_title_th;
                                }else if( $_SESSION['lang']=="EN" ){
                                $idx = get_the_ID();
                                   echo $fearr->lct_title_en;
                                }
                            } else {
                                echo $fearr->lct_title_th;
                            }
                        ?></p>
                        </div>
                        <div class="branchWrap" id="branch<?php echo $zx; ?>Wrap" <?php if($zx > 1){  ?>style="display:none;"<?php } ?>>
                            <div class="branchPicAll">
                                <?php if($fearr->lct_picture == '' || $fearr->lct_picture == '#'){ ?>

                                <?php }else{ ?>
                                    <img src="<?php echo $fearr->lct_picture; ?>" style="max-width:410px;">
                                <?php } ?>
                                
                            </div>
                            <div id="branchAddressAll">
                                <p class="branch_address" style="width:400px;"><?php 
                                if(isset($_SESSION['lang'])){
                                    if( $_SESSION['lang']=="TH" ){
                                       echo $fearr->lct_description_th;
                                    }else if( $_SESSION['lang']=="EN" ){
                                    $idx = get_the_ID();
                                       echo $fearr->lct_description_en;
                                    }
                                } else {
                                    echo $fearr->lct_description_th;
                                }
                                ?></p>
                            </div>
                        </div>
                    </div>
                <?php $zx++; } ?>
                <!--<div class="branchAll">
                    <div class="branchNameAll">
                        <p class="branch_name" id="branch1">ค็อกพิท สหยางทอง สาขา วงเวียน22</p>
                    </div>
                    <div class="branchWrap" id="branch1Wrap">
	                    <div class="branchPicAll">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/location_branch_pic.jpg">
                    </div>
	                    <div id="branchAddressAll">
                        <p class="branch_address">429-33 สันติภาพ แขวงป้อมปราบ เขตป้อมปราบศัตรูพ่าย กทม 10100</p>
                        <p class="branch_address">Tel: 	02-222-3447, 02-221-1989, 02-221-0306, 02-223-0858</p>
                        <p class="branch_address">Fax: 	02-222-8645</p>
                        <p class="branch_address">เวลาทำการ 8.00-18.00 วันทำการ เปิดบริการทุกวัน </p>
                        </div>
                    </div>
                </div>
                <div class="branchAll">
                    <div class="branchNameAll">
                        <p class="branch_name" id="branch2">ค็อกพิท สหยางทอง สาขาxxx</p>
                    </div>
                    <div class="branchWrap" id="branch2Wrap" style="display:none;">
                    	<div class="branchPicAll"></div>
						<div id="branchAddressAll"></div>
                    </div>
                </div>
                <div class="branchAll">
                    <div class="branchNameAll">
                        <p class="branch_name" id="branch3">ค็อกพิท สหยางทอง สาขาxxx</p>
                    </div>
                    <div class="branchWrap" id="branch3Wrap" style="display:none;">
                    	<div class="branchPicAll"></div>
						<div id="branchAddressAll"></div>
                    </div>
                </div>
                <div class="branchAll">
                    <div class="branchNameAll">
                        <p class="branch_name" id="branch4">ค็อกพิท สหยางทอง สาขาxxx</p>
                    </div>
                    <div class="branchWrap" id="branch4Wrap" style="display:none;">
                    	<div class="branchPicAll"></div>
						<div id="branchAddressAll"></div>
                    </div>
                </div>
                <div class="branchAll">
                    <div class="branchNameAll">
                        <p class="branch_name" id="branch5">ค็อกพิท สหยางทอง สาขาxxx</p>
                    </div>
                    <div class="branchWrap" id="branch5Wrap" style="display:none;">
                    	<div class="branchPicAll"></div>
						<div id="branchAddressAll"></div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>           
<?php
get_footer();
?>