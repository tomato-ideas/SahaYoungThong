<?php

	$strTo = 'Contact@sahayoungthong.com,pan_pear@hotmail.com';
	$strSubject = 'Message From www.sahayoungthong.com (contect-form)';
	$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
	$strHeader .= "From: ".$_POST["name"]."<".$_POST["email"].">\r\nReply-To: ".$_POST["email"]."";
	
	$strName = $_POST["name"];
	$strBody = $_POST["message"];
	$strPhone = $_POST["phone"];

	$strMessage = "<h3> Message From www.sahayoungthong.com (Contact-form) </h3><br>
				   <br>".$strBody."<br>
				   <br>Phone Contact: ".$strPhone.
				  "<br>From: ".$strName;
	


	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		echo "Email Sending.";
	}
	else
	{
		echo "Email Can Not Send.";
	}

?>