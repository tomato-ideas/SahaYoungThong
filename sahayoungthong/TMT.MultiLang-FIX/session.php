<?php
 
/*//////////////////////////////////////
 * SESSION START
/*//////////////////////////////////////

	session_start();

/*//////////////////////////////////////
 * SESSION TOTAL
/*//////////////////////////////////////

	//$_SESSION['lang']='EN';
    if($_GET['lang'] == 'EN'){
    	$_SESSION['lang'] = 'EN';
	}if($_GET['lang'] == 'TH'){
		$_SESSION['lang'] = 'TH';
	}
	

/*//////////////////////////////////////
 * CHECK SESSION
/*//////////////////////////////////////

	//foreach ($_SESSION as $key=>$val)
    //echo "KEY : ".$key."  VAL : ".$val."<br>";
    
/*//////////////////////////////////////
 * DISABLE SESSION
/*//////////////////////////////////////

	//unset($_SESSION[‘lang’]); // session name
	//session_destroy(); // all
?>