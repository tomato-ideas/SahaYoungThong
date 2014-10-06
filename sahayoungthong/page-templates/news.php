<?php
/**
 * Template Name: News page
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */

get_header(); ?>
<style>
	hr{
		margin-top: 20px;
	}
</style>
<div id="wrapper2">
        <div id="product_title"><p><?php 
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
			?></p>
        </div> 
        <div id="id1"></div>
        <div id="promotion_slide">
             <?php
                                                        
                if(isset($_SESSION['lang'])){
                    if( $_SESSION['lang']=="TH" ){
                        the_post_thumbnail(array(795,260));
                    }else if( $_SESSION['lang']=="EN" ){
                     $idx = get_the_ID();
                        ?> <!-- featured img EN : --> <?php the_post_thumbnail_tmt($idx);
                    }
                } else {
                   the_post_thumbnail(array(795,260));
                }
           
            ?>
        </div>
        <div id="promotion">
            <?php 
            $temp = $_GET['news'];
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array( 
                   'post_type'         => 'post', 
                   'cat'               => 4,
                   'posts_per_page'    => 5, 
                   'paged'             => $paged );
            $wp_query = new WP_Query($args);
            $i=1;
            while ( have_posts() ) : the_post(); ?>
                    <div id="promotion_box<?php echo $i; ?>" class="promotion_box">
                                        
                                            <div id="promotion_box<?php echo $i; ?>_pic" class="promotion_box_pic">
                                            
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
                                            <div id="promotion_box<?php echo $i; ?>_detail" class="promotion_box_detail">
                                                <ul>
                                                    
                                                
                                                    <li>
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
                                                    </li>
    												<li style="font-size:12px; color:#888;"><?php echo get_the_date(); ?></li>
                                                    <li>
                                                        <p>
                                                     <?php 
                                                        if(isset($_SESSION['lang'])){
                                                            if( $_SESSION['lang']=="TH" ){
                                                                ?> <!-- content TH :  -->
                                                                
                                                                <?php $content = get_the_content();
                                                                $content = strip_tags($content);
                                                                echo mb_substr($content, 0, 200);?> ...
                                                                
                                                                <?php
                                                            }else if( $_SESSION['lang']=="EN" ){
                                                                /* $idx = get_the_ID(); */
                                                                $post_parent = get_post(get_the_id())->post_parent;
                                                                $content = get_page($post_parent)->post_content_tmt;
                                                                ?> <!-- content EN : --> 
                                                                
                                                                <?php
                                                                $content = strip_tags($content);
                                                                echo substr($content, 0, 300);?> ...
                                                                
                                                                <?php
                                                            }
                                                        } else {
                                                            //echo "Session no value";
                                                            ?>
                                                            
                                                            <?php $content = get_the_content();
                                                            $content = strip_tags($content);
                                                            echo mb_substr($content, 0, 200);?> ...
                                                            
                                                            <?php
                                                        }
                                                    ?>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                            <?php 
                                                                if(isset($_SESSION['lang'])){
                                                                    if( $_SESSION['lang']=="TH" ){
                                                                        ?> <!-- content TH :  -->
                                                                        <div class="articleNewsRead">อ่านต่อ</div>
                                                                        <?php
                                                                    }else if( $_SESSION['lang']=="EN" ){
                                                                    //$idx = get_the_ID();
                                                                        ?> <!-- content EN : --> 
                                                                        <div class="articleNewsRead">Read more</div>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    //echo "Session no value";
                                                                    ?>
                                                                    <div class="articleNewsRead">อ่านต่อ</div>
                                                                    <?php
                                                                }
                                                            ?>
                                                            <!-- <div class="articleNewsRead">อ่านต่อ</div> -->
                                                        </a>
                                                    </li>
                                                </ul>        
                                                </div> 
                            <hr>
                                        
                    </div>
                    <?php $i++; ?>  
                    <?php endwhile; ?>
                    <div class="article-viewAllC">
                                <?php
                                global $wp_query;
                                
                                $big = 999999999; // need an unlikely integer
                                
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages,
                                        'show_all'     => False,
                                    'end_size'     => 1,
                                    'mid_size'     => 1,
                                    'prev_next'    => True,
                                    'prev_text'    => __('<'),
                                    'next_text'    => __('>'),
                                    'type'         => 'plain'
                                ) );
                                ?>
                    </div>
        </div>          
</div>
<?php
get_footer();
?>