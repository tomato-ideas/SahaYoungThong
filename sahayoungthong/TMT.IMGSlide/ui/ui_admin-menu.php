<?php

/*
 * TMT IMG Slide Theme Function (setting img slide)
 * Page new menu admin.
 *
 */

function ui_admin_imgSlide(){ ?>
		<script src="<?php echo get_template_directory_uri(); ?>/TMT.IMGSlide/js/ui_admin.js"></script>
		<div id="imgSlideAll">
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
			<table>
				<tr>
					<td id="imgSlideLeft" width="200px;">
						<div id="imgSlideLeftTopic" class="imgSlideTopic">
							<span>menu</span>
						</div>
						<div id="imgSlideLeftAddImg">
							<span>Add Slide Images</span>
						</div>
						<div id="imgSlideLeftSettingAll">
							
							<!--Size-->
							<div class="imgSlideLeftSetting">
								<div id="imgSlideLeftSettingMenu-sizeW" class="numberOnly" style="float:left;">W :&nbsp;<input placeholder="300" type="text" value="" /></div>
								<div id="imgSlideLeftSettingMenu-sizeH" class="numberOnly" style="float:right;">H :&nbsp;<input placeholder="600" type="text" value="" /></div>
							</div>
							<!--End Size-->
							
							<!--Animate Duration-->
							<div class="imgSlideLeftSetting">
								<div id="imgSlideLeftSettingMenu-sizeAnimduration">Animduration :&nbsp;<input class="imgSlideLeftSettingMenus numberOnly" placeholder=" 2000" type="text" value="" /></div>
							</div>
							<!--End Animate Duration-->
			
							<!--Animate Speed-->
							<div class="imgSlideLeftSetting">
								<div id="imgSlideLeftSettingMenu-sizeAnimspeed">Animspeed :&nbsp;<input class="imgSlideLeftSettingMenus numberOnly" placeholder=" 4000" type="text" value="" /></div>
							</div>
							<!--End Animate Speed-->

							<!--Show Show Navigation-->
							<div class="imgSlideLeftSetting">
								<div class="imgSlideLeftSettingMenu-sizeShownav">
									Navigation :&nbsp;
									<select class="imgSlideLeftSettingMenu" id="imgSlideLeftSettingMenu-sizeNavi">
										<option value="false">No</option>
										<option value="true">Yes</option>
									</select>
								</div>
							</div>
							<!--End Show Navigation-->
	
							<!--Show Bullet-->
							<div class="imgSlideLeftSetting">
								<div class="imgSlideLeftSettingMenu-sizeShownav">
									Bullet :&nbsp;
									<select class="imgSlideLeftSettingMenu" id="imgSlideLeftSettingMenu-sizeBull">
										<option value="false">No</option>
										<option value="true">Yes</option>
									</select>
								</div>
							</div>
							<!--End Show Bullet-->
							
							<!--Show Usecaptions-->
							<div class="imgSlideLeftSetting">
								<div class="imgSlideLeftSettingMenu-sizeShownav">
									Usecaptions :&nbsp;
							        <select class="imgSlideLeftSettingMenu" id="imgSlideLeftSettingMenu-sizeUsec">
							                <option value="false">No</option>
							                <option value="true">Yes</option>
							        </select>
							    </div>
							</div>
							<!--End Show Usecaptions-->

							<!--Show HoverPause-->
							<div class="imgSlideLeftSetting">
							    <div class="imgSlideLeftSettingMenu-sizeShownav">
							        Hover Pause :&nbsp;
							        <select class="imgSlideLeftSettingMenu" id="imgSlideLeftSettingMenu-sizeHove">
							                <option value="false">No</option>
							                <option value="true">Yes</option>
							        </select>
							    </div>
							</div>
							<!--End Show HoverPause-->
							
							<!--Random Start-->
							<div class="imgSlideLeftSetting">
							    <div class="imgSlideLeftSettingMenu-sizeShownav">
							        Random Start :&nbsp;
							        <select class="imgSlideLeftSettingMenu" id="imgSlideLeftSettingMenu-sizeRand">
							                <option value="false">No</option>
							                <option value="true">Yes</option>
							        </select>
							    </div>
							</div>
							<!--End Random Start-->

							<!--Use Responsive-->
							<div class="imgSlideLeftSetting">
							    <div class="imgSlideLeftSettingMenu-sizeShownav">
							        Responsive :&nbsp;
							        <select class="imgSlideLeftSettingMenu" id="imgSlideLeftSettingMenu-sizeResp">
							               <option value="false">No</option>
							                <option value="true">Yes</option>
							        </select>
							    </div>
							</div>
							<!--End Use Responsive-->
							
							<div class="imgSlideLeftSetting">
								<div id="imgSlideLeftSetting-shortcode">
									Short Code :&nbsp;
									<input id="sh" placeholder="Copy Here !!" type="text" value="<?php echo('[img_slide]') ?>" />
								</div>
							</div>
							
							<div class="imgSlideLeftSetting">
								<div id="imgSlideLeftSetting-fullcode">
									Page Code :&nbsp;
									<input id="cd" placeholder="Copy Here !!" type="text"  value="<?php echo('<?php echo tmt_imgSlide_slider(); ?>') ?>" />
								</div>
							</div>

						</div>
						<div id="imgSlideLeftSave" class="upd">
							<span id="imgSld-upd">update</span>
							<span id="imgSld-insUpd" style="display:none;">insert & update</span>
						</div>
					</td>
					<td id="imgSlideRight" width="100%;">
						<div id="imgSlideRightTopic" class="imgSlideTopic">
							<span>images</span>
						</div>
						<div id="imgSlideRightImgAll">
							
							<div id="imgSldDraft" style="display:inline-table;"></div>
							<div id="imgSldHolder" style="display:inline-table;"></div>

						
						</div>
					
					</td>
				</tr>
			</table>
		</div>
	<?php }

?>