<?php 
    /*$username="visarut";$password="visarut";$database="visarut_sahayoungthong";
    mysql_connect('localhost',$username,$password);
    mysql_select_db($database) or die( "Unable to select database");*/
    require_once('../../../../wp-config.php');

    $front = $_POST['front'];
    $series = $_POST['series'];
    $pwheel = $_POST['pwheel'];
    $searchtt = $_POST['st'];
    $searcht = trim($searchtt);

    $allofmy = "";
    if($front != '' || $series !='' || $pwheel != ''){
        $allofmy .= " AND "; 
        if($front != ''){
            $allofmy .= " pd_front = '$front'";
        }
        if($series != ''){
            if($front != ''){ $allofmy .= " AND "; }
            $allofmy .= " pd_series = '$series'";
        }
        if($pwheel != ''){
           if($front != '' || $series != ''){ $allofmy .= " AND "; }
            $allofmy .= " pd_pan_wheels = '$pwheel'"; 
        }
    }
    if($searcht != ''){
       $allofmy .= "AND pd_code LIKE '%".$searcht."%'"; 
    }
    $tbl_name="wp_product";
    $limit = $_POST['limit']; 
    $adjacents = 3;
    $page = $_POST['page']; 
    $type = $_POST['type'];
    if($page)
    $start = ($page - 1) * $limit; 
    else
    $start = 0;
    
    $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE pd_type = '".$type."' $allofmy";  
    $total_pages = mysql_fetch_array(mysql_query($query));
    $total_pages = $total_pages[num];

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
    if ($page > 1)
    $pagination.= "<a href=# onclick='pagination($prev,$type)'>« previous</a>";
    else
    $pagination.= "<span class=\"disabled\">« previous</span>";

    //pages
    if ($lastpage < 7 + ($adjacents * 2))
    {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
            if ($counter == $page)
            $pagination.= "<span class=\"current\">$counter</span>";
            else
            $pagination.= "<a href=# onclick='pagination($counter,$type)'>$counter</a>";
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
                $pagination.= "<a href=# onclick='pagination($counter,$type)'>$counter</a>";
                }
                $pagination.= "...";
                $pagination.= "<a href=# onclick='pagination($lpm1,$type)'>$lpm1</a>";
                $pagination.= "<a href=# onclick='pagination($lastpage,$type)'>$lastpage</a>";
            }
    //in middle; hide some front and some back
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $pagination.= "<a href=# onclick='pagination(1,$type)'>1</a>";
            $pagination.= "<a href=# onclick='pagination(2,$type)'>2</a>";
            $pagination.= "...";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
                else
                $pagination.= "<a href=# onclick='pagination($counter,$type)'>$counter</a>";
            }
            $pagination.= "...";
            $pagination.= "<a href=# onclick='pagination($lpm1,$type)'>$lpm1</a>";
            $pagination.= "<a href=# onclick='pagination($lastpage,$type)'>$lastpage</a>";
        }
    //close to end; only hide early pages
        else{
            $pagination.= "<a href=# onclick='pagination(1,$type)'>1</a>";
            $pagination.= "<a href=# onclick='pagination(2,$type)'>2</a>";
            $pagination.= "...";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage;
            $counter++)
            {
                if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
                else
                $pagination.= "<a href=# onclick='pagination($counter,$type)'>$counter</a>";
                }
            }
        }
    //next button
            if ($page < $counter - 1)
            $pagination.= "<a href=# onclick='pagination($next,$type)'>next »</a>";
            else
            $pagination.= "<span class=\"disabled\">next »</span>";
            $pagination.= "</div>\n";
    }

   
    $sql = "SELECT * FROM wp_product WHERE pd_type = '".$type."' $allofmy LIMIT $start, $limit";
    
    $rows = array();
    $result = mysql_query($sql);
    $i = 1;
    $padad = mysql_num_rows($result);
    while( $row = mysql_fetch_array($result)){ 
        //$rows[] = $row;
        $res2 = "SELECT brand_picture,brand_name FROM wp_brand WHERE brand_id = '".$row['brand_id']."'";
        $result2 = mysql_query($res2);
        $row2 = mysql_fetch_array($result2);
        $bpic = $row2['brand_picture'];
        $bname = $row2['brand_name'];
        $res3 = "SELECT type_name FROM wp_type WHERE type_id = '".$row['pd_type']."'";
        $result3 = mysql_query($res3);
        $row3 = mysql_fetch_array($result3);
        $tname = $row3['type_name'];  
        $rows[] = array('no'=> $i,'num'=> $padad,'id'=> $row['pd_id'],'brand'=> $bpic,'brand_name'=>$bname,'tname'=>$tname,'pic'=> $row['pd_picture'],'code'=> $row['pd_code'],'front'=> $row['pd_front'],
                        'series'=> $row['pd_series'],'wheel'=> $row['pd_pan_wheels'],'page'=>$page,'last'=>$lastpage, 'adj'=>$adjacents, 'type' => $type);
        $i++;
       /*echo '<div id="product_box_detail'.$row['pd_id'].'" class="product_box" align="center">';
               echo '<div>';
                    $res2 = "SELECT * FROM wp_brand WHERE brand_id = '".$row['brand_id']."'";
                    $result2 = mysql_query($res2);
                    while( $row2 = mysql_fetch_array($result2)){
                        
                        echo '<img src="/sahayoungthong/wp-content/uploads/'.$row2['brand_picture'].'" class="product_box_logo">';
               
                     } 
                    echo '<img src="/sahayoungthong/wp-content/uploads/'.$row['pd_picture'].'" class="product_box_pic">';
                    echo '<p class="product_box_model">รุ่น '.$row['pd_code'].' </p>';
                echo '</div>';
                echo '<div class="style1">';
                    echo '<p>หน้ายาง<br><span> '.$row['pd_front'].'</span></p>';
                    echo '<p>ซีรีย์<br><span>  '.$row['pd_series'].'</span></p>';
                    echo '<p>กระทะล้อ<br><span> '.$row['pd_pan_wheels'].'</span></p>';
                    echo '<a href="#" class="product_box_bt">Buy</a>';
                    echo '<a href="#" class="product_box_bt">Detail</a>';
                echo '</div>';
      echo '</div>';*/
    }
    if($padad == 0){
        //$rows = $sql;
    }
    echo json_encode($rows);
    /*echo "<hr>";
    echo "<div id='pagination' align='right'>";
    echo $pagination;
    echo "</div>";*/
    ?>