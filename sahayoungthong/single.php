<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
 <div id="wrapper2">
        <div id=product_title>
        	<p style="margin:0px;padding:21px 20px;">
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
			</p></div> 
        <div style="padding:10px;">
        	 <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content-new', get_post_format() );

					// Previous/next post navigation.
					//twentyfourteen_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					
				endwhile;
			?> 
        </div>
    </div>   
<?php
get_footer();
?>
