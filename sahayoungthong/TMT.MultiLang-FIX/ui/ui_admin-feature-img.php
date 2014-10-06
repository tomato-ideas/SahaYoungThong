<?php

/*
 * TMT MultiLang Theme Function (feature images 2nd multilang for theme)
 * create metabox feature images for page & post second form.
 *
 */
 
function ui_admin_feature_img(){
	?>  

		<div class="fea2nd">
			<img class="fea2nd_image" id="fea2nd_<?php echo get_the_ID(); ?>" src="" style="max-width: 100%;" />
			<a href="#" class="fea2nd_upload">Set featured image</a>
			<a href="#" class="fea2nd_remove">Remove featured image</a>
			<input type="hidden" class="fea2nd_chk" type="text" name="fea2ndUrl" val="0" >
			<input type="hidden" class="fea2nd_url" type="text" name="fea2ndUrl" val="" >
			<input type="hidden" class="fea2nd_id" type="text" name="fea2ndId" value="">
		</div>

	<?php
}
?>