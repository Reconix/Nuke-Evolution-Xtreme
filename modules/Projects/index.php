<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

define('NO_EDITOR', true); // For 7.8 Patched 3.1
$advanced_editor = 0; // For 7.7 Patched 3.1
if(!defined('MODULE_FILE')) { die("Illegal Access Detected!!!"); }
$module_name = basename(dirname(__FILE__));
define('NSNPJ_PUBLIC', true);
$index = 1;
define('INDEX_FILE', true);
if(!defined('NSNPJ_FUNC')) { $op = "PJLoadError"; }
if(!isset($op)) { $op = "PJIndex"; }
switch($op) {
  case "PJIndex":include("modules/$module_name/public/PJIndex.php");break;
  case "PJLoadError":include("modules/$module_name/public/PJLoadError.php");break;
  case "PJProject":include("modules/$module_name/public/PJProject.php");break;
  case "PJReport":include("modules/$module_name/public/PJReport.php");break;
  case "PJReportCommentInsert":include("modules/$module_name/public/PJReportCommentInsert.php");break;
  case "PJReportCommentSubmit":include("modules/$module_name/public/PJReportCommentSubmit.php");break;
  case "PJReportInsert":include("modules/$module_name/public/PJReportInsert.php");break;
  case "PJReportMap":include("modules/$module_name/public/PJReportMap.php");break;
  case "PJReportSubmit":include("modules/$module_name/public/PJReportSubmit.php");break;
  case "PJRequest":include("modules/$module_name/public/PJRequest.php");break;
  case "PJRequestCommentInsert":include("modules/$module_name/public/PJRequestCommentInsert.php");break;
  case "PJRequestCommentSubmit":include("modules/$module_name/public/PJRequestCommentSubmit.php");break;
  case "PJRequestInsert":include("modules/$module_name/public/PJRequestInsert.php");break;
  case "PJRequestMap":include("modules/$module_name/public/PJRequestMap.php");break;
  case "PJRequestSubmit":include("modules/$module_name/public/PJRequestSubmit.php");break;
  case "PJTask":include("modules/$module_name/public/PJTask.php");break;
  case "PJTaskMap":include("modules/$module_name/public/PJTaskMap.php");break;
  case "PJUserProjects":include("modules/$module_name/public/PJUserProjects.php");break;
}

?>