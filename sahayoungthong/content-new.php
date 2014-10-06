<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<style>
	#contact_box_L{
		width: 465px;
	}
	#contact_box_R{
		vertical-align: top;
		width: 520px;
		margin: 0px;
	}
	#thnb{
		margin:0px 10px 0px 0px; 
/* 		width:500px;  */
/* 		height:400px; */
/* 		overflow:hidden; */
		display: table; 
		float:left;
	}
	#thnb img{
		width: 400px;
		height: auto;
		margin: 0px;
		border-right: 1px solid #888;
		padding-right: 10px; 
	}
	#wrapper2{
		padding-bottom: 0px!important;
	}
	#tm{
		font-size: 16px;
		color: #00398a;
/* 		float: left; */
	}
	.nav-previous,
	.nav-previous a{
		font-weight: 800;
		text-decoration: none;
		float: left;
	}
	.nav-next,
	.nav-next a{
		font-weight: 800;
		text-decoration: none;
		float: right;
	}
</style>
<div style="display:table;width:100%;">
	<div id="thnb">
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

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div id="tm"><?php the_time('d/m/Y') ?></div>
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
		<hr>
		<span class="nav-previous">
					<?php previous_post_link( '%link', 'BACK', TRUE); ?>
<!-- 					<?php next_post_link( '%link', $taxonomy = 'category', 'BACK'); ?> -->
				</span>
				
				<span class="nav-next">
<!-- 					<?php next_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ); ?> -->
					<?php next_post_link( '%link', 'NEXT', TRUE); ?>
				</span>
	<?php endif; ?>
	
</div>


