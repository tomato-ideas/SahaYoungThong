<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<style>
	.imgimg{
		padding: 30px 10px 0px 10px;
	}
	.imgimg img{
		width: 100%;
		height: auto;
	}
</style>
<div id="wrapper2">
	<div id="product_title">
		<p>
	        <?php 
				if(isset($_SESSION['lang'])){
					if( $_SESSION['lang']=="TH" ){
						?> <!-- title TH : --> 
						<?php the_title();
					}else if( $_SESSION['lang']=="EN" ){
					$idx = get_the_ID();
						?> <!-- title EN : -->
						<?php the_title_tmt($idx);
					}
				} else {
					//echo "Session no value";
					the_title();
				}
			?>
		</p>
	</div> 
			<div class="imgimg">
		         <?php 
					if(isset($_SESSION['lang'])){
						if( $_SESSION['lang']=="TH" ){
							?> <!-- featured img TH : --> <?php the_post_thumbnail(array(795,260));
						}else if( $_SESSION['lang']=="EN" ){
						$idx = get_the_ID();
							?> <!-- featured img EN : --> <?php the_post_thumbnail_tmt($idx);
						}
					} else {
						//echo "Session no value";
						the_post_thumbnail(array(795,260));
					}
				?>
			</div>
	        <div style="padding:10px;">
            <?php 
				if(isset($_SESSION['lang'])){
					if( $_SESSION['lang']=="TH" ){
						?> <!-- content TH :  -->
						<?php wp_reset_postdata(); ?>
						<?php the_content();
					}else if( $_SESSION['lang']=="EN" ){
					//$idx = get_the_ID();
						?> <!-- content EN : --> 
						<?php wp_reset_postdata(); ?>
						<?php the_content_tmt($idx);
					}
				} else {
					//echo "Session no value";
					
					wp_reset_postdata();
					the_content();
				}
			?>
        </div>
    </div>           
<?php
get_footer();
?>
