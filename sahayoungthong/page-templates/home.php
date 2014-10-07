<?php
/**
 * Template Name: home page
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */

get_header(); ?>

<style>
	#tmt_imgSlide_fade{
		max-width: 100%!important;
		height: auto!important;
	}
	#tmt_imgSlide_fade ul{
		height: 726px!important;
	}
	#tmt_imgSlide_fade li img{
		height: auto!important;
	}
	#box2_1_pic,
	#box2_2_pic,
	#box4_1_pic{
		width: 290px;
		height: 161px;
		overflow: hidden;
		margin-top: 15px;
		background: url('<?php echo get_template_directory_uri(); ?>/images/homeBG.jpg')center center no-repeat;
		position: relative;
	}
	#box2_1_pic img,
	#box2_2_pic img,
	#box4_1_pic img{
		width: 100%;
		height: auto;
		position: absolute;
		top:-9999px;
		left:-9999px;
		right:-9999px;
		bottom:-9999px;
		margin: auto;
	}
	.RpicAll{
		height: 308px!important;
		overflow: hidden;
		display: table;
		width: 305px;
		position: relative;
		background: url('<?php echo get_template_directory_uri(); ?>/images/logo-1.png')center center no-repeat rgb(231, 231, 231);
	}
	#right img {
		width: 305px;
		height: auto;
		position: absolute;
		top: -99979px;
		bottom: -99999px;
		left: -99999px;
		right: -99999px;
		margin: auto;
	}
	.RdetailAll,
	.RdetailAll a{
		color: #fff;
		text-decoration: none;
		margin: 0px;
	}
	#content{
		background: url('<?php echo get_template_directory_uri(); ?>/images/lorem.jpg');
		height: 290px;
		width: 1006px;
		padding: 15px;
		
	}
	#detailAll{
		color: #fff;
		width: 630px;
		height: 100%;
		float: left;
		position: relative;
	}
	#titleHL{
		font-size: 32px;
		padding: 5px 10px;
	}
	#contentHL{
		font-size: 16px;
		padding: 5px 10px;
	}
	#btLink a{
		text-decoration: none;
		position: absolute;
		padding: 10px 20px;
		background: #ccc;
		color: #000;
		text-transform: uppercase;
		text-decoration: none;
		right: 20px;
		bottom: 30px;
	}
	#imgAll{
		float: left;
		width: 371px;
		height: 277px;
		overflow: hidden;
		position: relative;
	}
	#imgAll img{
		padding: 0px;
		position: absolute;
		top:-9999px;
		bottom:-9999px;
		left:-9999px;
		right:-9999px;
		margin: auto;
	}
</style>
<div id="slide">
	<?php echo tmt_imgSlide_slider(); ?>
</div>
<script type="text/javascript">
function submitfunc(){
    $( "#formsearch" ).submit();
}
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/home_template.js"></script>
<div id="wrapIndex">
			<div id="searchTire">
                <div id="top"></div>
                <div id="title">
                    <div id="find-title"><h2>FIND YOUR TIRE</h2></div>
                </div>
                <div id="search">
                <form id="formsearch" name="formsearch" method="post" action="/sahayoungthong/?page_id=2">
                    <label>
                      <select id="front_home" name="front_home">
                        <option value=""><?php if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								?> หน้ายาง <?php
							}else if( $_SESSION['lang']=="EN" ){
							$idx = get_the_ID();
								?> Front <?php
							}
						} else {
							?> หน้ายาง <?php
						} ?></option>
                       <?php $anl = $wpdb->get_results("SELECT DISTINCT pd_front FROM wp_product WHERE pd_front != '-' ORDER BY pd_front ASC");
                            foreach($anl as $yir){ ?>
                            <option value="<?php echo $yir->pd_front; ?>"><?php echo $yir->pd_front; ?></option>
                       <?php } ?>
                      </select>
                    </label>
                    <label>
                    <select id="series_home" name="series_home">
                        <option value=""><?php if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								?> ซีรี่ย์ <?php
							}else if( $_SESSION['lang']=="EN" ){
							$idx = get_the_ID();
								?> Series <?php
							}
						} else {
							?> ซีรี่ย์ <?php
						}?></option>
                       <?php $anl2 = $wpdb->get_results("SELECT DISTINCT pd_series FROM wp_product WHERE pd_series != '-' ORDER BY pd_series ASC");
                            foreach($anl2 as $yir2){ ?>
                            <option value="<?php echo $yir2->pd_series; ?>"><?php echo $yir2->pd_series; ?></option>
                       <?php } ?>
                      </select>
                    </label>
                    <label>
                    <select id="wheel_home" name="wheel_home">
                        <option value=""><?php if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								?> กระทะล้อ <?php
							}else if( $_SESSION['lang']=="EN" ){
							$idx = get_the_ID();
								?> Side(Dimension) <?php
							}
						} else {
							?> กระทะล้อ <?php
						}?></option>
                       <?php $anl3 = $wpdb->get_results("SELECT DISTINCT pd_pan_wheels FROM wp_product WHERE pd_pan_wheels != '-' ORDER BY pd_pan_wheels ASC");
                            foreach($anl3 as $yir3){ ?>
                            <option value="<?php echo $yir3->pd_pan_wheels; ?>"><?php echo $yir3->pd_pan_wheels; ?></option>
                        <?php } ?>
                      </select>
                    </label>
                    <span id="search_submit" class="search_submit" onclick="submitfunc()"><img src="<?php echo get_template_directory_uri(); ?>/images/findnow.png"></span>
                    <!--<button type="submit">ค้นหา</button>-->
                </form>
                </div>                
            </div> 
            <div id="content" style="margin-top:20px;">
            	<?php
						global $wpdb;
						$result = $wpdb->get_results ( "SELECT * FROM wp_highlight" );
  foreach ( $result as $print ) { 


					?>
 
            	<div id="detailAll">
	            	<div id="titleHL">
	            		<?php if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								echo $print->title_th;
							}else if( $_SESSION['lang']=="EN" ){
								echo $print->title_en;
							}
						} else {
							echo $print->title_th;
						}?>
	            	</div>
	            	<div id="contentHL">
		            	<?php if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								$content = $print->description_th;
                                $content = strip_tags($content);
                                $content = stripslashes($content);
                                echo mb_substr($content, 0, 700);
							}else if( $_SESSION['lang']=="EN" ){
								$content = $print->description_en;
                                $content = strip_tags($content);
                                $content = stripslashes($content);
                                echo mb_substr($content, 0, 600);
							}
						} else {
							$content = $print->description_th;
                            $content = strip_tags($content);
                            $content = stripslashes($content);
                            echo mb_substr($content, 0, 700);
						}?>
						...
	            	</div>
	            	<div id="btLink">
						<a href="<?php echo $print->linkurl; ?>" target="_blank">
							Link
						</a>	            
	            	</div>
            	</div>
               	<div id="imgAll">
	            	<img src="<?php echo $print->imgurl; ?>">
            	</div>
            	<?php };?>
        	</div>  
        	<div id="containner">
        		<div id="left">
                <div id="box1" class="boxlogo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/icon-news.png">
                </div>
                <div id="box2">
                     
							        <?php 
							        /* echo ":::".$temp; */
							        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array( 
													'post_type' 		=> 'post', 
													'cat'				=> 4,
													'posts_per_page' 	=> 2, 
													'paged' 			=> $paged );
									$wp_query = new WP_Query($args);
									$i=0;
									while ( have_posts() ) : the_post(); 
							         $i++; ?>
							        
							        	<div id="box2_<?php echo $i;?>" class="boxNews">
					                        <div id="box2_<?php echo $i;?>_title" class="boxNewsTitle">
					                           <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							        				<?php 
														if(isset($_SESSION['lang'])){
															if( $_SESSION['lang']=="TH" ){
																?> <!-- title TH : --> <?php echo mb_substr(get_the_title(), 0, 28);
															}else if( $_SESSION['lang']=="EN" ){
															$idx = get_the_ID();
																?> <!-- title EN : --> <?php 
																$a = substr(get_the_title_tmt($idx), 0, 8);
																echo ($a);
															}
														} else {
															//echo "Session no value";
															//$content = the_title();
															echo mb_substr(get_the_title(), 0, 28);
														}
													?>
													 ...
							        			</a>
					                        </div>
					                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						                        <div id="box2_<?php echo $i;?>_pic" class="boxNewsContent">
						                            <?php 
															if(isset($_SESSION['lang'])){
																if( $_SESSION['lang']=="TH" ){
																	?> <!-- featured img TH : --> <?php the_post_thumbnail();
																}else if( $_SESSION['lang']=="EN" ){
																$idx = get_the_ID();
																	?> <!-- featured img EN : --> <?php the_post_thumbnail_tmt($idx);
																}
															} else {
																//echo "Session no value";
																the_post_thumbnail();
															}
														?>
						                        </div>
					                        </a>
					                    </div>
							        
							        
							        
								        
								        
										
							        <?php endwhile;  ?>
					        
                    
                    <br class="clear">
                </div>
                    <div id="box3" class="boxlogo">
                        <div id="tipLogo" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-tip.png">  
                        </div>
                        <div id="socialLogo">
                            <div id="socialLogo" class="logo">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/icon-social.png">                                                      </div>
                        </div>
                    </div>
                    <div id="box4">
                        
                        <?php 
							        /* echo ":::".$temp; */
							        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array( 
													'post_type' 		=> 'post', 
													'cat'				=> 6,
													'posts_per_page' 	=> 1, 
													'paged' 			=> $paged );
									$wp_query = new WP_Query($args);
									while ( have_posts() ) : the_post(); 
							        ?>
							        
							        
							        <div id="box4_1" class="boxNews" class="shadow">
                            <div id="box4_1_title" class="boxNewsTitle">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
							        			</a>
                            </div>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <div id="box4_1_pic" class="boxNewsContent">
                                
						                            <?php 
															if(isset($_SESSION['lang'])){
																if( $_SESSION['lang']=="TH" ){
																	?> <!-- featured img TH : --> <?php the_post_thumbnail();
																}else if( $_SESSION['lang']=="EN" ){
																$idx = get_the_ID();
																	?> <!-- featured img EN : --> <?php the_post_thumbnail_tmt($idx);
																}
															} else {
																//echo "Session no value";
																the_post_thumbnail();
															}
														?>
					                        
                            </div>
                            </a>
                        </div>
								        
								        
										
							        <?php endwhile;  ?>
                        
                        <div id="box4_2" class="boxNews">
							<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FSahaYangThong&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false&amp;appId=493260960684841" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:260px; width: 322px;" allowTransparency="true"></iframe>
                        </div>   
                    </div>
                </div>
                <div id="right">
                <div id="menuR">
                    <ul style="display:table; margin:auto;">
                        <li>
                            <a class="underScrollCurrent" id="bPD"><?php if(isset($_SESSION['lang'])){
																if( $_SESSION['lang']=="TH" ){
																	?>สินค้าใหม่<?php
																}else if( $_SESSION['lang']=="EN" ){
																	?>New Product<?php 
																}
															} else {
																?>สินค้าใหม่<?php
															}?></a>
                            <a id="bPM"><?php if(isset($_SESSION['lang'])){
																if( $_SESSION['lang']=="TH" ){
																	?>โปรโมชั่น<?php
																}else if( $_SESSION['lang']=="EN" ){
																	?>Promotion<?php 
																}
															} else {
																?>โปรโมชั่น<?php
															}?></a>
                        </li>
                    </ul>
                </div>
                <div class="tabPDPM" id="tabPD">
                	<?php
						global $wpdb;
						$result = $wpdb->get_results ( "SELECT * FROM wp_product ORDER BY pd_id DESC LIMIT 2" );
  foreach ( $result as $print ) { 


					?>
 
	                <div class="nProductAll" >
	                    <div class="RpicAll" >
	                    <div style="width: 305px;height: 308px;overflow: hidden;position: relative;">
	                    	
	                    	<?php if($print->pd_picture == '' || $print->pd_picture == '//'){
		                    	?>
		                    	
		                    	<?php
	                    	}else{
		                    	?>
		                    	<img style="cursor:pointer;" onclick="submitfuncd('<?php echo  $print->pd_id; ?>')" src="/wp-content/uploads/<?php echo $print->pd_picture; ?>">
		                    	<?php
	                    	} ?>
	                    </div>
	                    </div>
	                    <div class="RdetailAll" ><span onclick="submitfuncd('<?php echo  $print->pd_id; ?>')" style='cursor:pointer'><?php echo $print->pd_code; ?></div>  	                     
	                </div>
	                <?php }; ?>
                </div>
                
                <div class="tabPDPM" id="tabPM" style="display:none;">
	                
	                <?php 
							        /* echo ":::".$temp; */
							        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args = array( 
													'post_type' 		=> 'post', 
													'cat'				=> 3,
													'posts_per_page' 	=> 2, 
													'paged' 			=> $paged );
									$wp_query = new WP_Query($args);
									$i=0;
									while ( have_posts() ) : the_post(); 
							        ?>
										<div class="nProductAll" >
										
											<div class="RpicAll" >
		                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                            <?php 
											if(isset($_SESSION['lang'])){
												if( $_SESSION['lang']=="TH" ){
													?> <!-- featured img TH : --> <?php the_post_thumbnail();
												}else if( $_SESSION['lang']=="EN" ){
												$idx = get_the_ID();
													?> <!-- featured img EN : --> <?php the_post_thumbnail_tmt($idx);
												}
											} else {
												//echo "Session no value";
												the_post_thumbnail();
												
											}
										?>
	                        </a>
	                    </div>
						<div class="RdetailAll" >
		                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
		        			</a>
	                    </div>                 
						                </div>
									<?php endwhile;  ?>
                </div>
           	</div>
</div>
<script type="text/javascript">
function submitfuncd(spid){
     sessionStorage.setItem("ppid", spid);
     window.open('/sahayoungthong/รายละเอียดสินค้า/','_blank');
}</script>
<?php
get_footer();
?>