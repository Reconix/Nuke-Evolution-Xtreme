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

global $admin_file, $prefix, $db, $admdata;
if(!defined('ADMIN_FILE')) {
    redirect("../../".$admin_file.".php");
    exit;
}
$module_name = basename(dirname(dirname(__FILE__)));
require_once(NUKE_BASE_DIR.'mainfile.php');
get_lang($module_name);
define('IN_DOWNLOADS', true);
$aid = substr($aid, 0,25);
if(is_mod_admin($module_name)) {
  include_once(NUKE_MODULES_DIR.$module_name.'/includes/functions.php');
  $dl_config = downloads_get_configs();
  if(!isset($op)) { $op="DLMain"; }
  switch ($op) {
    case "DLMain":include_once(NUKE_MODULES_DIR.$module_name."/admin/Main.php");break;
    case "DLConfig":include_once(NUKE_MODULES_DIR.$module_name."/admin/Config.php");break;
    case "DLConfigSave":include_once(NUKE_MODULES_DIR.$module_name."/admin/ConfigSave.php");break;
    case "Categories":include_once(NUKE_MODULES_DIR.$module_name."/admin/Categories.php");break;
    case "CategoryActivate":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryActivate.php");break;
    case "CategoryAdd":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryAdd.php");break;
    case "CategoryAddSave":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryAddSave.php");break;
    case "CategoryDeactivate":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryDeactivate.php");break;
    case "CategoryDelete":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryDelete.php");break;
    case "CategoryDeleteSave":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryDeleteSave.php");break;
    case "CategoryModify":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryModify.php");break;
    case "CategoryModifySave":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryModifySave.php");break;
    case "CategoryTransfer":include_once(NUKE_MODULES_DIR.$module_name."/admin/CategoryTransfer.php");break;
    case "DownloadActivate":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadActivate.php");break;
    case "DownloadAdd":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadAdd.php");break;
    case "DownloadAddSave":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadAddSave.php");break;
    case "DownloadBroken":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadBroken.php");break;
    case "DownloadBrokenDelete":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadBrokenDelete.php");break;
    case "DownloadBrokenIgnore":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadBrokenIgnore.php");break;
    case "DownloadCheck":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadCheck.php");break;
    case "DownloadDeactivate":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadDeactivate.php");break;
    case "DownloadDelete":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadDelete.php");break;
    case "DownloadModify":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadModify.php");break;
    case "DownloadModifyRequests":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadModifyRequests.php");break;
    case "DownloadModifyRequestsAccept":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadModifyRequestsAccept.php");break;
    case "DownloadModifyRequestsIgnore":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadModifyRequestsIgnore.php");break;
    case "DownloadModifySave":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadModifySave.php");break;
    case "DownloadNew":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadNew.php");break;
    case "DownloadNewDelete":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadNewDelete.php");break;
    case "Downloads":include_once(NUKE_MODULES_DIR.$module_name."/admin/Downloads.php");break;
    case "DownloadTransfer":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadTransfer.php");break;
    case "DownloadValidate":include_once(NUKE_MODULES_DIR.$module_name."/admin/DownloadValidate.php");break;
    case "ExtensionAdd":include_once(NUKE_MODULES_DIR.$module_name."/admin/ExtensionAdd.php");break;
    case "ExtensionAddSave":include_once(NUKE_MODULES_DIR.$module_name."/admin/ExtensionAddSave.php");break;
    case "ExtensionDelete":include_once(NUKE_MODULES_DIR.$module_name."/admin/ExtensionDelete.php");break;
    case "ExtensionModify":include_once(NUKE_MODULES_DIR.$module_name."/admin/ExtensionModify.php");break;
    case "ExtensionModifySave":include_once(NUKE_MODULES_DIR.$module_name."/admin/ExtensionModifySave.php");break;
    case "Extensions":include_once(NUKE_MODULES_DIR.$module_name."/admin/Extensions.php");break;
    case "FilesizeCheck":include_once(NUKE_MODULES_DIR.$module_name."/admin/FilesizeCheck.php");break;
    case "FilesizeValidate":include_once(NUKE_MODULES_DIR.$module_name."/admin/FilesizeValidate.php");break;
  }
} else {
    include(NUKE_BASE_DIR.'header.php');
    OpenTable();
	echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
    echo "<br /><br />";
	echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
	CloseTable();
	echo "<br />";
    OpenTable();
    echo "<center><strong>"._ERROR."</strong><br /><br />You do not have administration permission for module \"$module_name\"</center>";
    CloseTable();
    include(NUKE_BASE_DIR.'footer.php');
}

?>