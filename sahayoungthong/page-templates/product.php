<?php
/**
 * Template Name: Product Tire page
 *
 * @package WordPress
 * @subpackage SahayoungThong
 * @since SahayoungThong
 */
global $wpdb;
$limit = 12;
$type = 1; 
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
get_header(); ?>
<script type="text/javascript">
    var linkspe = '<?php echo $getdirect; ?>';
    var howtoshow = 'thumb';
    $(document).ready(function () {
        $("#view_thumb").click(function () {
            howtoshow = 'thumb';
            $("#view_thumb").empty();
            var shot = '<img src="'+linkspe+'/images/logo_thumb_hover.jpg">';
            $("#view_thumb").append(shot);
            $("#view_list").empty();
            var shol = '<img src="'+linkspe+'/images/logo_list.jpg">';
            $("#view_list").append(shol);
        });
         $("#view_list").click(function () {
            howtoshow = 'list';
            $("#view_thumb").empty();
            var shot = '<img src="'+linkspe+'/images/logo_thumb.jpg">';
            $("#view_thumb").append(shot);
            $("#view_list").empty();
            var shol = '<img src="'+linkspe+'/images/logo_list_hover.jpg">';
            $("#view_list").append(shol);
        });
    });
    $(document).keypress(function(event){
 
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            pagination(1,<?php echo $type; ?>);
            //alert('You pressed a "enter" key in somewhere');    
        }
     
    });
</script>
<script type="text/javascript">
    function pagination(page,type,lim){
        //alert(page);
        var str=Math.random();
        var front = $('#front_s option:selected').val();
        var series = $('#series_s option:selected').val();
        var wheel = $('#wheel_s option:selected').val();        
        var stext = $('#stext').val();
        var langjs = '<?php echo $lang; ?>'
        if(lim > 0){
          var limit = 50;
        }else{
          var limit = '<?php echo $limit; ?>';
        }
        if(langjs == 'TH'){
            var trm = 'รุ่น';
            var f_text = 'หน้ายาง';
            var s_text = 'ซีรีย์';
            var p_text = 'กระทะล้อ';
        }else{
            var trm = 'Model';
            var f_text = 'Front';
            var s_text = 'Series';
            var p_text = 'Side';
        }
        //alert(limit);
        //alert(series);
        //alert(wheel);
        //var datastring='str='+str + '&page='+page+'&type='+type+'&limit='+limit;
        var datastring='str='+str + '&page='+page+'&type='+type+'&limit='+limit+'&front='+front+'&series='+series+'&pwheel='+wheel+'&st='+stext;        
        //alert(limit);
        //alert(type);
        $.ajax({
            type:'POST',
            url: linkspe+'/service/pagination.php',
            data: datastring,
            beforeSend: function(){
                $("#loading").html("<img src='http://www.bookneo.com/images/bigLoader.gif'");
            },
            success:function(data){
                //console.log(data);
                
                var show = '';
                var page = '';
                var pages ='';
                var last = '';
                var adj = '';
                var type = '';
                var prev = '';
                var next = '';
                var lpm1 = '';
                 if(howtoshow == 'list'){
                  show +=  '<table class="tablemember" cellpadding="10">';
                  show +=       '<thead>';
                  show +=                   '<th>ID</th>';
                  show +=                   '<th>Product Code</th>';
                  show +=                   '<th>Brand</th>';
                  show +=                   '<th>Product Type</th>';
                  show +=                   '<th>Front tires</th>';
                  show +=                  '<th>Series</th>';
                  show +=                   '<th>Wheel caps</th>';
                  show +=                   '<th>Picture</th>';
                  show +=               '</thead>';
                  show +=               '<tbody>'; 
                 }
                 if(data == '[]'){
                    //alert("something!!");
                     if(howtoshow == 'list'){
                       show +=           '<tr align="center">';
                       show +=             '<td colspan="8">Not Found</td>';
                       show +=            '</tr>';
                     }else{
                       show += '<hr>';
                       show +=           '<div align="center" style="width:100%">';
                       show +=             '<h3>Not Found</h3>';
                       show +=            '</div>';
                     }
                }else{
                $.each($.parseJSON(data), function() {
                    
                    if(howtoshow == 'list'){                            
                                                                   
                   show +=           '<tr>';
                   show +=             '<td>'+ this.id +'</td>';
                   show +=             '<td>'+this.code+'</td>';
                   show +=             '<td>'+this.brand_name+'</td>';
                   show +=             '<td>'+this.tname+'</td>';
                   show +=             '<td>'+ this.front +'</td>';
                   show +=             '<td>'+ this.series +'</td>';
                   show +=             '<td>'+ this.wheel +'</td>';
                   show +=             '<td><span onclick="submitfunc('+ this.id +')" style="cursor:pointer; text-decoration:underline;">View</span></td>';
                   show +=            '</tr>';
                                   
                    }else{
                        show += '<div id="product_box_detail'+ this.id +'" class="product_box" align="center">';
                        show +=    '<div class="wrapPD">';
                        show +=    '<img src="/sahayoungthong/wp-content/uploads/'+ this.brand+'" class="product_box_logo">';
                        if(this.pic == '' || this.pic == '//'){
                               
                        show += '<img src="<?php echo get_template_directory_uri(); ?>/images/logo-1.png" class="product_box_pic">';
                               
                        }else{
                                
                        show += '<img src="/sahayoungthong/wp-content/uploads/'+ this.pic +'" class="product_box_pic">';
                               
                        }
                        
                        show +=        '<p class="product_box_model">'+trm+' '+this.code+'</p>';
                        show +=    '</div>';
                        show +=    '<div class="style1">';
                        show +=        '<p>'+f_text+'<br><span>'+ this.front +'</span></p>';
                        show +=        '<p>'+s_text+'<br><span>'+ this.series +'</span></p>';
                        show +=        '<p>'+p_text+'<br><span>'+ this.wheel +'</span></p>';
                        show +=        '<a href="#" class="product_box_bt">Buy</a>';
                        show +=        '<a class="product_box_bt"><span onclick="submitfunc('+ this.id +')" style="cursor:pointer">Detail</span></a>';                        
                        show +=    '</div>';
                        show += '</div>';
                    }
                    pages = this.page;
                    last = this.last;
                    adj = this.adj;
                    type = this.type;
                });
                if(howtoshow == 'list'){
                   show +=    '</tbody>';
                   show +=   '</table>';
                }
                page = parseInt(pages);
                prev = page - 1;
                next = page + 1;
                lpm1 = last - 1;
                show += '<hr>';
                show += '<div id="pagination" align="right">';
                if(last > 1)
                {
                    show += '<div class="pagination">';
                
                    if (page > 1){
                        show += '<a onclick="pagination(1,'+type+')" style="cursor:pointer"><img src="'+linkspe+'/images/first_hover.jpg"></a>';
                        show += '<a onclick="pagination('+prev+','+type+')" style="cursor:pointer"><img src="'+linkspe+'/images/back_hover.jpg"></a>';
                    }else{
                        show += '<span class="disabled"><img src="'+linkspe+'/images/first.jpg"></span>';
                        show += '<span class="disabled"><img src="'+linkspe+'/images/back.jpg"></span>';
                    }

                     if (last < 7 + (adj * 2))
                    {
                        for (var counter = 1; counter <= last; counter++)
                        {
                            if (counter == page){
                                    show += '<span class="current">'+counter+'</span>';
                            }else{
                                    show += '<a onclick="pagination('+counter+','+type+')" style="cursor:pointer">'+counter+'</a>';
                            }
                        }
                    }else if(last > 5 + (adj * 2)){
                        if(page < 1 + (adj * 2)){
                            for (var counter = 1; counter < 4 + (adj * 2); counter++)
                            {
                                if (counter == page){
                                    show +=  '<span class="current">'+counter+'</span>';
                                }else{
                                    show += '<a onclick="pagination('+counter+','+type+')" style="cursor:pointer">'+counter+'</a>';
                                }
                                show +=  '...';
                                show +=  '<a onclick="pagination('+lpm1+','+type+')" style="cursor:pointer">'+lpm1+'</a>';
                                show +=  '<a onclick="pagination('+last+','+type+')" style="cursor:pointer">'+last+'</a>';
                            }    
                        }else if(last - (adj * 2) > page && page > (adj * 2)){
                            show += '<a onclick="pagination(1,'+type+')" style="cursor:pointer">1</a>';
                            show += '<a onclick="pagination(2,'+type+')" style="cursor:pointer">2</a>';
                            show += '...';
                            for (var counter = page - adj; counter <= page + adj; counter++)
                            {
                                if (counter == page){
                                    show += '<span class="current">'+counter+'</span>';
                                }else{
                                    show += '<a onclick="pagination('+counter+','+type+')" style="cursor:pointer">'+counter+'</a>';
                                }
                            }
                            show += '...';
                            show += '<a onclick="pagination('+lpm1+','+type+')" style="cursor:pointer">'+lpm1+'</a>';
                            show += '<a onclick="pagination('+last+','+type+')" style="cursor:pointer">'+last+'</a>';
                        }else{
                                show += '<a onclick="pagination(1,'+type+')" style="cursor:pointer">1</a>';
                                show += '<a onclick="pagination(2,'+type+')" style="cursor:pointer">2</a>';
                                show += '...';
                                for (var counter = last - (2 + (adj * 2)); counter <= last; counter++)
                                {
                                    if (counter == page){
                                        show += '<span class="current">'+counter+'</span>';
                                    }
                                    else{
                                        show += '<a onclick="pagination('+counter+','+type+')" style="cursor:pointer">'+counter+'</a>';
                                    }
                                }
                        }
                        
                    }
                    if (page < counter - 1){
                        show += '<a onclick="pagination('+ next +','+ type +')" style="cursor:pointer"><img src="'+linkspe+'/images/next_hover.jpg"></a>';
                        show += '<a onclick="pagination('+ last +','+ type +')" style="cursor:pointer"><img src="'+linkspe+'/images/last_hover.jpg"></a>';
                    }else{
                        show += '<span class="disabled"><img src="'+linkspe+'/images/next.jpg"></span>';
                        show += '<span class="disabled"><img src="'+linkspe+'/images/last.jpg"></span>';
                        show += '</div>';
                        show += '<input type="hidden" id="type_pro" name="type_pro" value="'+type+'">';
                    }
                }
                show += '<div>';
                //console.log(show);
                }
                $( "#showtitle" ).empty();
                $( "#showtitle" ).append(show);
                $( "#showtitle").css('display','none');
                $( "#showtitle").fadeIn();

                
            }
        });
    }
</script>

<style type="text/css">
    div.pagination {
        padding: 3px;
        margin: 3px;
    }

    div.pagination a {
        padding: 0px 2px;
        margin: 2px;
        /*border: 1px solid #AAAADD;*/
        text-decoration: none; /* no underline */
        color: #000099;
        vertical-align: text-bottom;
    }
    div.pagination a:hover, div.pagination a:active {
        /*border: 1px solid #000099;*/
        color: #000;
        vertical-align: text-bottom;
    }
    div.pagination span.current {
        padding: 0px 2px;
        margin: 2px;
        /*border: 1px solid #000099;*/
        font-weight: bold;
        /*background-color: #000099;*/
        color: #000;
        vertical-align: text-bottom;
    }
    div.pagination span.disabled {
        padding: 0px 2px ;
        margin: 2px;
        /*border: 1px solid #EEE;*/
        color: #DDD;
        vertical-align: text-bottom;
    }
    div.pagination img {      
        vertical-align: text-bottom;
    }
    .tablemember { width:100%; }
    .tablemember tr:nth-child(even) { background:rgb(199, 240, 255); }
    .tablemember tr:nth-child(odd) { background-color:#FFFFFF; }
    .tablemember th {background-color: #0074a2; color:white; cursor: default;}
    #product_menu li:nth-child(1) a{        
        color:#4682B4!important;
        /*display:none;*/
    }
    #product_pic{
	    height: auto; 
    }
    #product_pic img{
	    width: 100%;
	    height: auto;
    }
</style>
<?php 

    $tbl_name="wp_product";//ตัวแปร ตารางข้อมูลที่ต้องการนำมาแสดง
    $adjacents = 3;//จำเป็นต้องกำหนด
    $page = $_POST['page']; //รับ ตัวแปร page เข้ามาแบบ post
    if($page)
    $start = ($page - 1) * $limit;  //กำหนดตัวแปร start
    else
    $start = 0;
    
    $front_h = $_POST['front_home'];
    $series_h = $_POST['series_home'];
    $wheel_h = $_POST['wheel_home'];

    if($front_h != '' || $series_h != '' || $wheel_h != ''){
       $allofmy .= " AND "; 
        if($front_h != ''){
            $allofmy .= " pd_front = '$front_h'";
        }
        if($series_h != ''){
            if($front_h != ''){ $allofmy .= " AND "; }
            $allofmy .= " pd_series = '$series_h'";
        }
        if($wheel_h != ''){
           if($front_h != '' || $series_h != ''){ $allofmy .= " AND "; }
            $allofmy .= " pd_pan_wheels = '$wheel_h'"; 
        }
    }

    $sqlpk =  "SELECT * FROM $tbl_name WHERE pd_type = $type $allofmy" ;
    $wpdb->get_results($sqlpk);
    $total_pages =  $wpdb->num_rows;
    if ($page == 0) $page = 1;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages/$limit);
    $lpm1 = $lastpage - 1;

    $pagination = "";
    if($lastpage > 1)
    {
    $pagination .= "<div class=\"pagination\">";
    //previous button
    if ($page > 1){
    $pagination.= "<a style='cursor:pointer' onclick='pagination(1,$type)'><img src='".$getdirect."/images/first_hover.jpg'></a>";
    $pagination.= "<a style='cursor:pointer' onclick='pagination($prev,$type)'><img src='".$getdirect."/images/back_hover.jpg'></a>";    
    }else{
    $pagination.= "<span class=\"disabled\"><img src='".$getdirect."/images/first.jpg'></span>";
    $pagination.= "<span class=\"disabled\"><img src='".$getdirect."/images/back.jpg'></span>";
    }
    //pages
    if ($lastpage < 7 + ($adjacents * 2))
    {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
        if ($counter == $page)
        $pagination.= "<span class=\"current\">$counter</span>";
        else
        $pagination.= "<a style='cursor:pointer' onclick='pagination($counter,$type)'>$counter</a>";
        }
    }
    elseif($lastpage > 5 + ($adjacents * 2))
    {
        if($page < 1 + ($adjacents * 2))
        {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
                if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
                else
                $pagination.= "<a style='cursor:pointer' onclick='pagination($counter,$type)'>$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a style='cursor:pointer' onclick='pagination($lpm1,$type)'>$lpm1</a>";
                $pagination.= "<a style='cursor:pointer' onclick='pagination($lastpage,$type)'>$lastpage</a>";
            }
    //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $pagination.= "<a style='cursor:pointer' onclick='pagination(1,$type)'>1</a>";
            $pagination.= "<a style='cursor:pointer' onclick='pagination(2,$type)'>2</a>";
            $pagination.= "...";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
                else
                $pagination.= "<a style='cursor:pointer' onclick='pagination($counter,$type)'>$counter</a>";
            }
            $pagination.= "...";
            $pagination.= "<a style='cursor:pointer' onclick='pagination($lpm1,$type)'>$lpm1</a>";
            $pagination.= "<a style='cursor:pointer' onclick='pagination($lastpage,$type)'>$lastpage</a>";
        }
    //close to end; only hide early pages
        else{
            $pagination.= "<a style='cursor:pointer' onclick='pagination(1,$type)'>1</a>";
            $pagination.= "<a style='cursor:pointer' onclick='pagination(2,$type)'>2</a>";
            $pagination.= "...";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage;
            $counter++)
            {
                if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
                else
                $pagination.= "<a style='cursor:pointer' onclick='pagination($counter,$type)'>$counter</a>";
                }
            }
        }
    //next button
            if ($page < $counter - 1){
            $pagination.= "<a onclick='pagination($next,$type)' style='cursor:pointer'><img src='".$getdirect."/images/next_hover.jpg'></a>";
            $pagination.= "<a onclick='pagination($last,$type)' style='cursor:pointer'><img src='".$getdirect."/images/last_hover.jpg'></a>";
            }else{
            $pagination.= "<span class=\"disabled\"><img src='".$getdirect."/images/next.jpg'></span>";
            $pagination.= "<span class=\"disabled\"><img src='".$getdirect."/images/last.jpg'></span>";
            }
            $pagination.= "</div>\n";
    }
?>
<div id="wrapper2">
        <div id="product_title"><p>
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
        </p></div>
        <div id="product_menu">
            <ul>
                <?php $submenup = $wpdb->get_results("SELECT * FROM wp_type ORDER BY type_id ASC");
                foreach($submenup as $submenu){ ?>
                <li><a href="/sahayoungthong/?page_id=<?php echo $submenu->page_id; ?>" ><?php if($lang == 'TH'){ echo $submenu->type_name_th;  }else{ echo $submenu->type_name; } ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="id1"></div>
        <div id="product_pic">
<!--         	<img src="<?php echo $getdirect; ?>/images/title_pic.jpg"> -->
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
        </div>
        <div id="product_box1">
            <div id="product_box1_search">
                <div id="product_box1_search_title"><p class="fontTitleWhite">Search by</p></div>
                <div id="wrap_search">
                    <div id="product_box1_search_bt">
                        <select id="front_s" class="product_select" onchange="pagination(1,<?php echo $type; ?>)">
                            <option value = ''><?php if(isset($_SESSION['lang'])){
                            if( $_SESSION['lang']=="TH" ){
                                ?> หน้ายาง <?php
                            }else if( $_SESSION['lang']=="EN" ){
                            $idx = get_the_ID();
                                ?> Front <?php
                            }
                        } else {
                            ?> หน้ายาง <?php
                        } ?></option>
                            <?php $anl = $wpdb->get_results("SELECT DISTINCT pd_front FROM wp_product WHERE pd_front != '-' ORDER BY pd_front ASC");
                            foreach($anl as $yir){ ?>
                                <?php if($front_h != ''){ 
                                            if($front_h == $yir->pd_front){  ?>
                                                <option value="<?php echo $yir->pd_front; ?>" selected><?php echo $yir->pd_front; ?></option>
                                             <?php }else{ ?>
                                                <option value="<?php echo $yir->pd_front; ?>"><?php echo $yir->pd_front; ?></option>
                                             <?php } ?>
                                <?php }else{ ?>
                                    <option value="<?php echo $yir->pd_front; ?>"><?php echo $yir->pd_front; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <select id="series_s" class="product_select" onchange="pagination(1,<?php echo $type; ?>)">
                            <option value = ''><?php if(isset($_SESSION['lang'])){
                            if( $_SESSION['lang']=="TH" ){
                                ?> ซีรี่ย์ <?php
                            }else if( $_SESSION['lang']=="EN" ){
                            $idx = get_the_ID();
                                ?> Series <?php
                            }
                        } else {
                            ?> ซีรี่ย์ <?php
                        }?></option>
                            <?php $anl2 = $wpdb->get_results("SELECT DISTINCT pd_series FROM wp_product WHERE pd_series != '-' ORDER BY pd_series ASC");
                            foreach($anl2 as $yir2){ ?>
                                <?php if($series_h != ''){ 
                                            if($series_h == $yir2->pd_series){  ?>
                                                <option value="<?php echo $yir2->pd_series; ?>" selected><?php echo $yir2->pd_series; ?></option>
                                             <?php }else{ ?>
                                                <option value="<?php echo $yir2->pd_series; ?>"><?php echo $yir2->pd_series; ?></option>
                                             <?php } ?>
                                <?php }else{ ?>
                                        <option value="<?php echo $yir2->pd_series; ?>"><?php echo $yir2->pd_series; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <select id="wheel_s" class="product_select" onchange="pagination(1,<?php echo $type; ?>)">
                            <option value= ''><?php if(isset($_SESSION['lang'])){
                            if( $_SESSION['lang']=="TH" ){
                                ?> กระทะล้อ <?php
                            }else if( $_SESSION['lang']=="EN" ){
                            $idx = get_the_ID();
                                ?> Side(Dimension) <?php
                            }
                        } else {
                            ?> กระทะล้อ <?php
                        }?></option>
                           <?php $anl3 = $wpdb->get_results("SELECT DISTINCT pd_pan_wheels FROM wp_product WHERE pd_pan_wheels != '-' ORDER BY pd_pan_wheels ASC");
                            foreach($anl3 as $yir3){ ?>
                                <?php if($wheel_h != ''){ 
                                            if($wheel_h == $yir3->pd_pan_wheels ){  ?>
                                                <option value="<?php echo $yir3->pd_pan_wheels; ?>" selected><?php echo $yir3->pd_pan_wheels; ?></option>
                                             <?php }else{ ?>
                                                <option value="<?php echo $yir3->pd_pan_wheels; ?>"><?php echo $yir3->pd_pan_wheels; ?></option>
                                             <?php } ?>
                                <?php }else{ ?>
                                    <option value="<?php echo $yir3->pd_pan_wheels; ?>"><?php echo $yir3->pd_pan_wheels; ?></option>
                                 <?php } ?>
                            <?php } ?>
                        </select>
                        <!--<button name="submit" class="bt-search" onclick="pagination(1,<?php echo $type; ?>)">ค้นหา</button>-->
                    </div>
                    <div id="product_box1_search_pic">
                        <img src="<?php echo $getdirect; ?>/images/product_box1_search_pic.jpg" style="cursor:pointer;" onclick="pagination(1,<?php echo $type; ?>)">
                    </div>
                </div>
            </div>
            <div id="product_box1_recommend">
                <?php  $gja = $wpdb->get_results("SELECT recommend_id FROM wp_type WHERE type_id = '$type' ");
                foreach($gja as $jga){ $pd_idr = $jga->recommend_id;  }
                 $gja2 = $wpdb->get_results("SELECT * FROM wp_product WHERE pd_id = '$pd_idr' ");
                foreach($gja2 as $jga2){
                ?>
                <div id="product_box1_recommend_title">
                    <p class="fontTitleWhite">Recommend</p>
                </div>
                <div id="product_box1_recommend_box">
                    <div id="product_box1_recommend_boxL">
                    <?php if($jga2->pd_picture == '' || $jga2->pd_picture == '//'){
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-1.png" class="product_box_pic">
                                <?php
                            }else{
                                ?>
                                <img src="/sahayoungthong/wp-content/uploads/<?php echo  $jga2->pd_picture; ?>">
                                <?php
                            } ?>                        
                    </div>
                    <div id="product_box1_recommend_boxR">
                        <p class="product_box_model"><?php if($lang == 'TH'){ ?> รุ่น <?php }else{ ?> Model <?php  } ?><?php echo  $jga2->pd_code; ?></p>
                        <p><?php if($lang == 'TH'){
                                $content = $jga2->pd_description_th;
                                $content = strip_tags($content);
                                echo mb_substr($content, 0, 350);
                            }else{ 
                                $content = $jga2->pd_description_en;
                                $content = strip_tags($content);
                                echo mb_substr($content, 0, 250);
                            } ?><?php ; ?> . . . </p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <br class="clear">
        <div id="product_box1_1">
            <div id="viewMode">
                <di id="viewModeL">
                    <a>View Mode</a>
                </di>
                <div id="viewModeR">
                    <ul id="ViewModeList">
                        <li id="view_thumb" onclick="pagination(1,<?php echo $type; ?>)"><img id="pict" src="<?php echo $getdirect; ?>/images/logo_thumb_hover.jpg"></li>
                        <li id="view_list" onclick="pagination(1,<?php echo $type; ?>,50)"><img id="picl" src="<?php echo $getdirect; ?>/images/logo_list.jpg"></li>
                    </ul>
                </div>
            </div>
            <div id="searchBar">
                <div class="form-wrapper cf">
                    <input type="text" id="stext" name="stext" placeholder="Search here..." required>
                    <button type="button" onclick="pagination(1,<?php echo $type; ?>)">Search</button>
                </div>
            </div>
        </div>
<!-- ************************************************************************************************** -->

<div id="product_box2">
<div id="loading"></div> 
<div id="showtitle"> 
<?php
         
    /* Get data. */
    $sql = "SELECT * FROM wp_product WHERE pd_type = $type $allofmy LIMIT $start, $limit"; 
    $results = $wpdb->get_results($sql);
        foreach($results as $dbr){  ?>

           <div id="product_box_detail<?php echo $dbr->pd_id; ?>" class="product_box" align="center">
                    <div class="wrapPD">
                       <?php $results2 = $wpdb->get_results("SELECT * FROM wp_brand WHERE brand_id = '$dbr->brand_id'");
                            foreach($results2 as $dbr2){ ?>
                            
                        <img src="/sahayoungthong/wp-content/uploads/<?php echo $dbr2->brand_picture; ?>" class="product_box_logo">
                   
                        <?php } ?>
                       <?php if($dbr->pd_picture == '' || $dbr->pd_picture == '//'){
                                ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-1.png" class="product_box_pic">
                                <?php
                            }else{
                                ?>
                                <img src="/sahayoungthong/wp-content/uploads/<?php echo $dbr->pd_picture; ?>" class="product_box_pic">
                                <?php
                            } ?>
                        <p class="product_box_model"><?php if($lang == 'TH'){ ?> รุ่น <?php }else{ ?> Model <?php  } ?> <?php echo $dbr->pd_code; ?></p>
                    </div>
                    <div class="style1">
                        <p><?php if(isset($_SESSION['lang'])){
                            if( $_SESSION['lang']=="TH" ){
                                ?> หน้ายาง <?php
                            }else if( $_SESSION['lang']=="EN" ){
                            $idx = get_the_ID();
                                ?> Front <?php
                            }
                        } else {
                            ?> หน้ายาง <?php
                        } ?><br><span><?php echo $dbr->pd_front; ?></span></p>
                        <p><?php if(isset($_SESSION['lang'])){
                            if( $_SESSION['lang']=="TH" ){
                                ?> ซีรี่ย์ <?php
                            }else if( $_SESSION['lang']=="EN" ){
                            $idx = get_the_ID();
                                ?> Series <?php
                            }
                        } else {
                            ?> ซีรี่ย์ <?php
                        }?><br><span><?php echo $dbr->pd_series; ?></span></p>
                        <p><?php if(isset($_SESSION['lang'])){
                            if( $_SESSION['lang']=="TH" ){
                                ?> กระทะล้อ <?php
                            }else if( $_SESSION['lang']=="EN" ){
                            $idx = get_the_ID();
                                ?> Side <?php
                            }
                        } else {
                            ?> กระทะล้อ <?php
                        }?><br><span><?php echo $dbr->pd_pan_wheels; ?></span></p>
                        <a href="#" class="product_box_bt">Buy</a>
                        <a class="product_box_bt"><span onclick="submitfunc('<?php echo  $dbr->pd_id; ?>')" style='cursor:pointer'>Detail</span></a>
                       
                    </div>
                    <!--<form id="sell_send" name="sell_send" action="/sahayoungthong/?p=118" method="post" target="_blank">
                     <a href="/sahayoungthong/?p=118&ppid=<?php echo  $dbr->pd_id; ?>" class="product_box_bt" target="_blank">Detail</a>
                    <span id="foem_j" name="foem_j"></span>                                       
                    </form>-->
                </div>
       <?php }
        echo "
        <hr>";
        echo "<div id='pagination' align='right'>";
        echo $pagination; 
        echo "</div>"

    ?>
</div>
</div>
</div>
<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.cookie/1.3.1/jquery.cookie.js"></script>-->
<script type="text/javascript">
function submitfunc(spid){
     //$.cookie("ppid", spid);
     sessionStorage.setItem("ppid", spid);
     window.open('/sahayoungthong/รายละเอียดสินค้า/','_blank');
     //window.location.href = "/sahayoungthong/รายละเอียดสินค้า/";
}
/*function submitfunc(){
    $( "#sell_send" ).submit();
}
 
    function submitfunc(stpd) {
            //Create a Form
            //alert(stpd);
            var $form = $("<form/>").attr("id", "data_form")
                            .attr("action", "/sahayoungthong/รายละเอียดสินค้า/")
                            .attr("method", "post").attr("target", "_blank");
            $("#foem_j").append($form);
 
            //Append the values to be send
            AddParameter($form, "ppid",stpd);
 
            //Send the Form
            $form[0].submit();
            }
    function AddParameter(form, name, value) {
        var $input = $("<input />").attr("type", "hidden")
                                .attr("name", name)
                                .attr("value", value);
        form.append($input);
    }*/
</script>
<!-- ************************************************************************************************** -->

       
        <!-- <div id="product_box2">
         <?php
          $sqlpk =  "SELECT * FROM wp_product" ;
         $results = $wpdb->get_results($sqlpk);

         foreach($results as $dbr){
         ?>
            <div id="product_box_detail<?php echo $dbr->pd_id; ?>" class="product_box" align="center">
                <div>
                   <?php $results2 = $wpdb->get_results("SELECT * FROM wp_brand WHERE brand_id = '$dbr->brand_id'");
                        foreach($results2 as $dbr2){ ?>
                        
                    <img src="/sahayoungthong/wp-content/uploads/<?php echo $dbr2->brand_picture; ?>" class="product_box_logo">
               
                    <?php } ?>
                    <img src="/sahayoungthong/wp-content/uploads/<?php echo $dbr->pd_picture; ?>" class="product_box_pic">
                    <p class="product_box_model">รุ่น <?php echo $dbr->pd_code; ?></p>
                </div>
                <div class="style1">
                    <p>หน้ายาง<br><span><?php echo $dbr->pd_front; ?></span></p>
                    <p>ซีรีย์<br><span><?php echo $dbr->pd_series; ?></span></p>
                    <p>กระทะล้อ<br><span><?php echo $dbr->pd_pan_wheels; ?></span></p>
                    <a href="#" class="product_box_bt">Buy</a>
                    <a href="#" class="product_box_bt">Detail</a>
                </div>
            </div>
            <?php } ?> 
        </div>-->
    </div>
<?php
get_footer();
?>