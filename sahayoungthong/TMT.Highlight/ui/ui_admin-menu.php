<?php
/*
 * TMT Highlight Theme Function (Detail menu Highlight for theme)
 * Page new menu admin.
 *
 */
function ui_admin_highlight(){
?>

		<!-- STAT -->
		
		<div id="loadingData">
			<div class="centerPage" id="loadingData_bg">
				<img src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/images/loading_FN/pendingData.gif">
			</div>
		</div>
		<div id="pendingData">
			<div class="centerPage" id="pendingData_bg">
				<img src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/images/loading_FN/pendingData.gif">
			</div>
		</div>
		<div id="waitingData">
			<div class="centerPage" id="waitingData_bg">
				<img src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/images/loading_FN/pendingData.gif">
			</div>
		</div>
		<div id="emptyData">
			<div class="centerPage" id="emptyData_bg">
				<img src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/images/loading_FN/emptyData.png">
			</div>
		</div>
		<div id="removeData">
			<div class="centerPage" id="removeData_bg">
				<img src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/images/loading_FN/removeData.png">
			</div>
		</div>
		<div id="completeData">
			<div class="centerPage" id="completeData_bg">
				<img src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/images/loading_FN/completeData.png">
			</div>
		</div>
		
		<!-- STAT -->

	<div id="wrapperAll">
		<div id="titleAll">
			<span>Highligt</span>
		</div>
		<div id="contentAll">
			<span>
				Title
				<div class="langAll" id="langTTAll">
					<ul>
						<li id="TTH" class="btCurrent">TH</li>
						<li id="TEN">EN</li>
					</ul>
				</div>
			</span>
			<input class="ttAll" id="TTTH" type="text">
			<input class="ttAll" id="TTEN" type="text" style="display:none;">
			<span>
				Description
				<div class="langAll" id="langDESAll" style="right: -2px;
top: -7px;">
					<ul>
						<li id="STH" class="btCurrent">TH</li>
						<li id="SEN">EN</li>
					</ul>
				</div>
			</span>
			<textarea class="desAll" id="DESTH"></textarea>
			<textarea class="desAll" id="DESEN" style="display:none;"></textarea>
			<span>Link</span>
			<input id="link" type="text" placeholder="htt;//example.com">
			<span>Image</span>
			<div class="imgHighlightAll">
				<div class="imgHighlightBt">
					<div id="closeBt" style="display:none;"></div>
					<a href="media-upload.php?type=image&amp;TB_iframe=true" class="thickbox" onclick="upload_img='imgHighlight_1'">
						<img id="img_imgHighlight_1" class="img-preview" src="<?php echo get_template_directory_uri(); ?>/TMT.Highlight/images/imgBg.png">
					</a>
					<input type="hidden" id="img_hide_imgHighlight_1" name="" value="">
				</div>
			</div>									
			
		</div>
		<div id="submitBt">submit</div>
	</div>

<?php
}	
?>