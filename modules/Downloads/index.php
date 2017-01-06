<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : index.php
   Author        : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 11.21.2005 (mm.dd.yyyy)

   Notes         : Advanced Downloads module with BBGroups Integration
                   based on NSN GR Downloads.
************************************************************************/

/********************************************************/
/* Based on NSN GR Downloads                            */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network         */
/********************************************************/

	if (!defined('MODULE_FILE')) 
	{
	   die ("You can't access this file directly...");
	}

	global $module_name;	
	get_lang($module_name);
	define('IN_DOWNLOADS', true);
	//include_once(NUKE_MODULES_DIR.$module_name.'/includes/constants.php');
	include_once(NUKE_MODULES_DIR.$module_name.'/includes/functions.php');
	$result1 = $db->sql_query("SELECT * FROM `". $prefix ."_downloads_config`");
	$dl_config = downloads_get_configs();
	if (!$dl_config OR empty($dl_config)) 
	{
		include_once(NUKE_BASE_DIR.'header.php');
    	title(_DL_DBCONFIG);
    	include_once(NUKE_BASE_DIR.'footer.php');
    	exit;
	}

	if(isset($d_op)) 
	{ 
		$op = $d_op; 
		unset($d_op); 
	}
	if(!isset($op)) 
	{ 
		$op = "index"; 
	}
	if($op == "viewdownload") 
	{ 
		$op = "getit"; 
	}
	if($op == "viewdownloaddetails") 
	{ 
		$op = "getit"; 
	}

	switch($op) 
	{
    	case "index":
			include_once(NUKE_MODULES_DIR.$module_name."/public/index.php");
			break;
    	case "NewDownloads":
			include_once(NUKE_MODULES_DIR.$module_name."/public/NewDownloads.php");
			break;
    	case "NewDownloadsDate":
			include_once(NUKE_MODULES_DIR.$module_name."/public/NewDownloadsDate.php");
			break;
    	case "MostPopular":
			include_once(NUKE_MODULES_DIR.$module_name."/public/MostPopular.php");
			break;
    	case "brokendownload":
			include_once(NUKE_MODULES_DIR.$module_name."/public/brokendownload.php");
			break;
    	case "brokendownloadS":
			include_once(NUKE_MODULES_DIR.$module_name."/public/brokendownloadS.php");
			break;
    	case "modifydownloadrequest":
			include_once(NUKE_MODULES_DIR.$module_name."/public/modifydownloadrequest.php");
			break;
    	case "modifydownloadrequestS":
			include_once(NUKE_MODULES_DIR.$module_name."/public/modifydownloadrequestS.php");
			break;
    	case "getit":
			include_once(NUKE_MODULES_DIR.$module_name."/public/getit.php");
			break;
    	case "go":
			include_once(NUKE_MODULES_DIR.$module_name."/public/go.php");
			break;
		case "retrievedownload":
			include_once(NUKE_MODULES_DIR.$module_name."/public/retrievedownload.php");
			break;
    	case "search":
			include_once(NUKE_MODULES_DIR.$module_name."/public/search.php");
			break;
    	case "Input":
    	case "Add":
    	case "TermsUseUp":
    	case "TermsUse":
    	case "SubmitDownloads":
        	include_once(NUKE_MODULES_DIR.$module_name."/public/SubmitDownloads.php");
   			break;
}

?>