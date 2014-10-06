<?php
foreach ($_SESSION as $key=>$val);
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php 
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css?v=1.0">
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.0.3.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

		<header>
                <nav>
                <?php if(isset($_SESSION['lang'])){
                                    if( $_SESSION['lang']=="TH" ){
                                        wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu') );
                                    }else if( $_SESSION['lang']=="EN" ){
                                    $idx = get_the_ID();
                                        wp_nav_menu_tmt_s( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu' ) );
                                    }
                                } else {
                                    //echo "Session no value";
                                    wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu') );
                                } ?>
                    
                </nav>
                <div id="langBt">
                	<?php 
                            $lang = '';
                                if(isset($_SESSION['lang'])){
                                    if( $_SESSION['lang']=="TH" ){
                                        $lang = "TH";
                                    ?>
                                        <li onclick="location.href='<?php echo post_permalink(); ?>?lang=TH';" id="langTH" class="btLang btLangCurrent">TH</li>&nbsp;&nbsp;|&nbsp; 
                                        <li onclick="location.href='<?php echo post_permalink(); ?>?lang=EN';" id="langEN" class="btLang">EN</li>
                                        <li id="btFB" class="btLang"></li>
                                    <?php
                                    }else if( $_SESSION['lang']=="EN" ){
                                         $lang = "EN";
                                    ?>
                                        <li onclick="location.href='<?php echo post_permalink(); ?>?lang=TH';" id="langTH" class="btLang">TH&nbsp;&nbsp;|&nbsp;</li>
                                        <li onclick="location.href='<?php echo post_permalink(); ?>?lang=EN';" id="langEN" class="btLang btLangCurrent">EN</li>
                                        <li id="btFB" class="btLang"></li>
                                    <?php
                                    }
                                } else {
                                    //echo "Session no value";
                                     $lang = "TH";
                                    ?>
                                        <li onclick="location.href='<?php echo post_permalink(); ?>?lang=TH';" id="langTH" class="btLang btLangCurrent">TH</li>&nbsp;&nbsp;|&nbsp;
                                        <li onclick="location.href='<?php echo post_permalink(); ?>?lang=EN';" id="langEN" class="btLang">EN</li>
                                        <li id="btFB" class="btLang"></li>
                                    <?php
                                }
                            ?>
                </div>
            <!--<div id="slide"><img src="wp-content/themes/sahayoungthong/images/slide-pic01.jpg" width="100%"></div>-->
           <!--<ul>
                        <li><a href="#">ข่าวสารและกิจกรรม</a></li>
                        <li><a href="#">แนะนำ</a></li>	
                        <li><a href="#">ร่วมงานกับเรา</a></li>	
                        <li><a href="#">การรับประกัน</a></li>		
                        <li><a href="#">TH</a></li>	
                        <li><a href="#">EN</a></li>	
                    </ul>-->
        </header><!-- #masthead -->
         <div id="menu_box">
                <div id="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"> </div>
                <div id="menu">			
					<?php if(isset($_SESSION['lang'])){
                                    if( $_SESSION['lang']=="TH" ){
                                        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
                                    }else if( $_SESSION['lang']=="EN" ){
                                    $idx = get_the_ID();
                                        wp_nav_menu_tmt( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
                                    }
                                } else {
                                    //echo "Session no value";
                                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
                                } ?>
	            </div>
          </div>
	
