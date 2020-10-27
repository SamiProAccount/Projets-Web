<?php
	@session_start();
	if(file_exists("../includes/define.php"))
	{
		include "../includes/define.php";
	}
	else {
		include "includes/define.php";
	}
	if(@$_SESSION["user_firstname"]=="" || @$_SESSION["role"]!="admin" ){
		
		if(file_exists($homepage)){
			
			header("location:".$homepage);
		}
		else {
			header("location:".$homepage2);
		}
	   exit();
	}