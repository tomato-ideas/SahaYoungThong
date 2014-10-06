<?php
/**
 * Template Name: contact page
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */

get_header(); ?>
<style>
	h4{
		margin: 5px 0px;
		font-weight: 100;
		color: #888;
	}
	#contact_box_L {
		border-right: 1px solid #ccc;
		width: 522px;
	}
	#contact_box_R{
		margin-left: 40px;
	}
	#contact_form input,
	#contact_form textarea,
	.input,
	#sms {
		width: 408px;
		height: 30px;
		margin: 2px 0px 10px 0px;
		padding: 0px 10px;
	}
	#sms{
		max-width: 406px;
		height: 100px;
		padding: 10px;
	}
	.FTP{
		font-size: 12px;
		color: #888;
	}
	.error{
		position: absolute;
		right: 30px;
		top: 28px;
		font-size: 10px;
		color: #0c1795;
	}
	label:before,
	label:after{
		background: transparent!important;
		content: ''!important;
	}
	.submit{
		float: right;
		padding: 5px 10px;
		color: #fff;
		background: #062871!important;
	}
	#contactForm{
		position: relative;
	}
	#message{
		background: rgb(247, 247, 247);
		position: absolute;
		top: 0px;
		left: 0px;
		text-align: center;
		width: 430px;
		height: 360px;
		line-height: 50px;
	}
</style>
 <div id="wrapper2">
        <div id=product_title><p><?php 
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
			?></p></div> 
        <div id="id1"></div>
        <div id="contact_box">
            <div id="contact_box_L">
                <div id="contact_box_L_title">
                    <p class="fontTitleBlue"><?php 
						if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								?> แผนที่ <?php
							}else if( $_SESSION['lang']=="EN" ){
							$idx = get_the_ID();
								?> Map <?php
							}
						} else {
							?> แผนที่ <?php
						}
					?></p>
                </div>
                <div id="contact_box_L_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.6068050733634!2d100.51311899999999!3d13.742239000000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e299240c6d88dd%3A0xc38c8c38bbce34e2!2z4LiE4LmH4Lit4LiB4Lie4Li04LiXIEAg4Liq4Lir4Lii4Liy4LiH4LiX4Lit4LiH!5e0!3m2!1sth!2sth!4v1411976172133" width="456" height="285" frameborder="0" style="border:0"></iframe>
                </div>
                 <div id="contact_address">
                    <p class="contact_text"><?php 
				if(isset($_SESSION['lang'])){
                                if( $_SESSION['lang']=="TH" ){
                                    wp_reset_postdata();
                                    the_content();
                                }else if( $_SESSION['lang']=="EN" ){
                                $idx = get_the_ID();
                                    wp_reset_postdata();
                                    the_content_tmt($idx);
                                }
                            } else {
                                //echo "Session no value";
                                wp_reset_postdata();
                                the_content();
                            }
			?></p>
                </div>
            </div>
            <div id="contact_box_R">
                <div id="contact_box_R_title">
                    <p class="fontTitleBlue"><?php 
						if(isset($_SESSION['lang'])){
							if( $_SESSION['lang']=="TH" ){
								?> ติดต่อสอบถาม <?php
							}else if( $_SESSION['lang']=="EN" ){
							$idx = get_the_ID();
								?> Contact Us <?php
							}
						} else {
							?> ติดต่อสอบถาม <?php
						}
					?></p>
                </div>
                <div id="formWrapper">
                    
                    
                    
                    <div id="contactForm">
		                <form name="contact" action="">
		                
		                <div style="position:relative;">
		                	<label class="error" for="name" id="name_error" style="display: none;">This field is required.</label>
		                </div>
		                <span class="FTP">Name</span>
		                <div>
		                    <input class="input" style="border:none" placeholder="Name" type="text" name="name" id="name" size="30" value="">
		                </div>
		              
		                <div style="position:relative;">
		                	<label class="error" for="email" id="email_error" style="display: none;">This field is required.</label>
		                </div>
		                <span class="FTP">Email</span>
		                <div>
		                    <input class="input" style="border:none" placeholder="E-mail" type="text" name="email" id="email" size="30" value="">
		                </div>
		              
		                <div style="position:relative;">
		                	<label class="error" for="phone" id="phone_error" style="display: none;">This field is required.</label>
		                </div>
		                <span class="FTP">Phone</span>
		                <div>
		                    <input class="input" style="border:none" placeholder="Phone" type="text" name="phone" id="phone" size="30" value="">
		                </div>
		              
		                <div style="position:relative;">
		                	<label class="error" for="sms" id="sms_error" style="display: none;">This field is required.</label>
						</div>
		                <span class="FTP">Message</span>
		                <div>
		                    <textarea id="sms" style="border:none" class="textarea" border="0" name="message" placeholder="Text you message . . . "></textarea>
		                </div>
		              
		                <div>
		                    <input type="submit" style="border:none" name="submit" class="submit" id="submit_btn" value="Submit" width="80" height="16" style="cursor:pointer;">
		                </div>
		          </form>
		          </div>
					
					<script> 
						$(document).ready(function() {
					  		$('.error').hide();
						});
						$(function() {
							$(".submit").click( function() {
								
								var name = $("input#name").val();
								if (name == "") {
									$("label#name_error").show();
									$("input#name").focus();
									return false;
								}else{
									$("label#name_error").hide();
									}
								var email = $("input#email").val();
								if (email == "") {
									$("label#email_error").show();
									$("input#email").focus();
									return false;
								}else{
									$("label#email_error").hide();
									}
								var phone = $("input#phone").val();
								if (phone == "") {
									$("label#phone_error").show();
									$("input#phone").focus();
									return false;
								}else{
									$("label#phone_error").hide();
									}
								var message = $("textarea#sms").val();
								if (message == "") {
									$("label#sms_error").show();
									$("textarea#sms").focus();
									return false;
								}else{
									$("label#sms_error").hide();
									}
								
								var dataString = 'name='+name+'&email='+email+'&phone='+phone+'&message='+message;
								//alert (dataString);return false;
								$.ajax({
									type: "POST",
									url: "<?php bloginfo('template_url'); ?>/sendMail.php",
									data: { name:name, email:email, phone:phone, message:message},
									success: function(data) {
										console.log(data);
										$('#contactForm').append("<div id='message'></div>");
										$('#message').html("<h2>Contact Form Submitted!</h2>")
										.append("<p>We will be in touch soon.</p>")
										$('#message').append("<img id='checkmark' src='<?php bloginfo('template_url'); ?>/images/check.png' />").hide()
										.fadeIn(800);
									}
								});
								return false;
								
								
								
							})
						});
					</script>
                    
                </div>
            </div>
        </div>
    </div>   
<?php
get_footer();
?>