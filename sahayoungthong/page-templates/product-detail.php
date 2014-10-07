<?php
/**
 * Template Name: Product detail page
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */
get_header(); 
$getdirect =  get_template_directory_uri();
$lang = '';
if(isset($_SESSION['lang'])){
  if( $_SESSION['lang']=="TH" ){
  	$lang = "TH";
  }else if( $_SESSION['lang']=="EN" ){
  	$lang = "EN";
  }
} else {
	$lang = "TH";
}
?>
<style>
	#detailL{
		width: 350px;
		background: #ccc;
		height: 400px;
		position: relative;
		overflow: hidden;
	}
	#detailL img{
		width: 350px;
		height: auto;
		position: absolute;
		top:-99999px;
		left:-99999px;
		right:-99999px;
		bottom:-99999px;
		margin: auto;
	}
	
</style>
<script type="text/javascript">
	window.onload =function(){
		var link = '<?php echo $getdirect; ?>';
		var ppid = sessionStorage.getItem("ppid");
		//alert(ppid);
		$.ajax({
	        url: link+'/TMT.Products/service/service_sql_select_one_pd.php',
	        type: 'post',
	        data: {ID: ppid},
	        dataType: 'json',
	        success: function(data) {
	        	//console.log(data);
	        	//console.log(data[0].pd_price);
	           $('#sh_pdcode').html(data[0].pd_code);
               $('#sh_price').html(data[0].pd_price);
               $('#sh_brand').html(data[0].brandName);
               var langj = '<?php echo $lang; ?>';
               if( langj == 'TH'){
               	$('#sh_desc').html(data[0].pd_description_th);
               	$('#sh_detail').html(data[0].pd_detail_th);
               }else{
               	$('#sh_desc').html(data[0].pd_description_en);
                $('#sh_detail').html(data[0].pd_detail_en);
               }
               if(data[0].pd_picture == '' || data[0].pd_picture == '//'){                        
                $('#img_pd').attr("src",'<?php echo get_template_directory_uri(); ?>/images/logo-1.png');    
               }else{
                $('#img_pd').attr("src",'/wp-content/uploads/'+data[0].pd_picture);                                 
               }
               
          	   if(data[0].pd_tb_img != null){
          	   	$('#img_de').attr("src",data[0].pd_tb_img);
          	   }
	        }
	    });
	}
</script>
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
      ?></p></div>
        <div id="product_menu">
            <ul>
                <?php $submenup = $wpdb->get_results("SELECT * FROM wp_type ORDER BY type_id ASC");
                foreach($submenup as $submenu){ ?>
                <li><a href="/?page_id=<?php echo $submenu->page_id; ?>" ><?php if($lang == 'TH'){ echo $submenu->type_name_th;  }else{ echo $submenu->type_name; } ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="id1">
            
        </div>  
        <div id="product_detail_box1">
            <div id="detailL">
                <img id="img_pd" name="img_pd" src="">
            </div>
            <div id="detailR">
                <div id="detailR_title"><a class="fontTitleWhite"><span id="sh_brand" name="sh_brand"></span> <span id="sh_pdcode" name="sh_pdcode"></span></a></div>
                <div id="detailR_text">
                    <h3>Description:</h3>
                    <p><span id="sh_desc" name="sh_desc"></span></p>
                    <h3>Detail: </h3>
                    <p><span id="sh_detail" name="sh_detail"></span></p>
                    <h3>Price:</h3>
                    <p><span id="sh_price" name="sh_price"></span><?php if($lang == 'TH'){ ?> บาท<?php }else{ ?> Bath<?php } ?></p>
                </div>
            </div>
        </div>
        <div id="product_detail_box2">
            <div id="spectab">
                <a class="fontTitleWhite">Size & Specification</a>
            </div>
            <div id="specimg">
                <img id="img_de" name="img_de" src="">
            </div>
        </div>
    </div>   
<?php
get_footer();
?>