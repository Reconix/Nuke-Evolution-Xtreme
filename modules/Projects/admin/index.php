<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

global $admin_file;
if(!$admin_file OR $admin_file == "") { $admin_file = "admin"; }

if(!defined('ADMIN_FILE')) { die("Illegal Access Detected!!!"); }

define('NO_EDITOR', true);

$advanced_editor = 0;

$modname = "Projects";

define('NSNPJ_ADMIN', true);
$index=1;
define('INDEX_FILE', true);
$aid = substr($aid, 0,25);
$query = $db->sql_query("SELECT `title`, `admins` FROM `".$prefix."_modules` WHERE `title`='$modname'");
list($title, $admins) = $db->sql_fetchrow($query);
$db->sql_freeresult($query);
$query2 = $db->sql_query("SELECT `name`, `radminsuper` FROM `".$prefix."_authors` WHERE `aid`='$aid'");
list($rname, $radminsuper) = $db->sql_fetchrow($query2);
$db->sql_freeresult($query2);
$admins = explode(",", $admins);
$auth_user = 0;
for($i=0; $i < sizeof($admins); $i++) { if($rname == $admins[$i] AND !empty($admins)) { $auth_user = 1; } }
if($radminsuper == 1 || $auth_user == 1) {
  if(!defined('NSNPJ_FUNC')) { $op = "PJLoadError"; }
  switch ($op) {
    case "PJConfig":include("modules/$modname/admin/PJConfig.php");break;
    case "PJConfigUpdate":include("modules/$modname/admin/PJConfigUpdate.php");break;
    case "PJLoadError":include("modules/$modname/admin/PJLoadError.php");break;
    case "PJMain":include("modules/$modname/admin/PJMain.php");break;
    case "PJMemberAdd":include("modules/$modname/admin/PJMemberAdd.php");break;
    case "PJMemberDelete":include("modules/$modname/admin/PJMemberDelete.php");break;
    case "PJMemberEdit":include("modules/$modname/admin/PJMemberEdit.php");break;
    case "PJMemberInsert":include("modules/$modname/admin/PJMemberInsert.php");break;
    case "PJMemberList":include("modules/$modname/admin/PJMemberList.php");break;
    case "PJMemberPositionAdd":include("modules/$modname/admin/PJMemberPositionAdd.php");break;
    case "PJMemberPositionDelete":include("modules/$modname/admin/PJMemberPositionDelete.php");break;
    case "PJMemberPositionEdit":include("modules/$modname/admin/PJMemberPositionEdit.php");break;
    case "PJMemberPositionFix":include("modules/$modname/admin/PJMemberPositionFix.php");break;
    case "PJMemberPositionInsert":include("modules/$modname/admin/PJMemberPositionInsert.php");break;
    case "PJMemberPositionList":include("modules/$modname/admin/PJMemberPositionList.php");break;
    case "PJMemberPositionOrder":include("modules/$modname/admin/PJMemberPositionOrder.php");break;
    case "PJMemberPositionRemove":include("modules/$modname/admin/PJMemberPositionRemove.php");break;
    case "PJMemberPositionUpdate":include("modules/$modname/admin/PJMemberPositionUpdate.php");break;
    case "PJMemberRemove":include("modules/$modname/admin/PJMemberRemove.php");break;
    case "PJMemberUpdate":include("modules/$modname/admin/PJMemberUpdate.php");break;
    case "PJProjectAdd":include("modules/$modname/admin/PJProjectAdd.php");break;
    case "PJProjectConfig":include("modules/$modname/admin/PJProjectConfig.php");break;
    case "PJProjectConfigUpdate":include("modules/$modname/admin/PJProjectConfigUpdate.php");break;
    case "PJProjectDelete":include("modules/$modname/admin/PJProjectDelete.php");break;
    case "PJProjectEdit":include("modules/$modname/admin/PJProjectEdit.php");break;
    case "PJProjectFix":include("modules/$modname/admin/PJProjectFix.php");break;
    case "PJProjectInsert":include("modules/$modname/admin/PJProjectInsert.php");break;
    case "PJProjectList":include("modules/$modname/admin/PJProjectList.php");break;
    case "PJProjectMembers":include("modules/$modname/admin/PJProjectMembers.php");break;
    case "PJProjectOrder":include("modules/$modname/admin/PJProjectOrder.php");break;
    case "PJProjectPriorityAdd":include("modules/$modname/admin/PJProjectPriorityAdd.php");break;
    case "PJProjectPriorityDelete":include("modules/$modname/admin/PJProjectPriorityDelete.php");break;
    case "PJProjectPriorityEdit":include("modules/$modname/admin/PJProjectPriorityEdit.php");break;
    case "PJProjectPriorityFix":include("modules/$modname/admin/PJProjectPriorityFix.php");break;
    case "PJProjectPriorityInsert":include("modules/$modname/admin/PJProjectPriorityInsert.php");break;
    case "PJProjectPriorityList":include("modules/$modname/admin/PJProjectPriorityList.php");break;
    case "PJProjectPriorityOrder":include("modules/$modname/admin/PJProjectPriorityOrder.php");break;
    case "PJProjectPriorityRemove":include("modules/$modname/admin/PJProjectPriorityRemove.php");break;
    case "PJProjectPriorityUpdate":include("modules/$modname/admin/PJProjectPriorityUpdate.php");break;
    case "PJProjectRemove":include("modules/$modname/admin/PJProjectRemove.php");break;
    case "PJProjectReports":include("modules/$modname/admin/PJProjectReports.php");break;
    case "PJProjectRequests":include("modules/$modname/admin/PJProjectRequests.php");break;
    case "PJProjectStatusAdd":include("modules/$modname/admin/PJProjectStatusAdd.php");break;
    case "PJProjectStatusDelete":include("modules/$modname/admin/PJProjectStatusDelete.php");break;
    case "PJProjectStatusEdit":include("modules/$modname/admin/PJProjectStatusEdit.php");break;
    case "PJProjectStatusFix":include("modules/$modname/admin/PJProjectStatusFix.php");break;
    case "PJProjectStatusInsert":include("modules/$modname/admin/PJProjectStatusInsert.php");break;
    case "PJProjectStatusList":include("modules/$modname/admin/PJProjectStatusList.php");break;
    case "PJProjectStatusOrder":include("modules/$modname/admin/PJProjectStatusOrder.php");break;
    case "PJProjectStatusRemove":include("modules/$modname/admin/PJProjectStatusRemove.php");break;
    case "PJProjectStatusUpdate":include("modules/$modname/admin/PJProjectStatusUpdate.php");break;
    case "PJProjectTasks":include("modules/$modname/admin/PJProjectTasks.php");break;
    case "PJProjectUpdate":include("modules/$modname/admin/PJProjectUpdate.php");break;
    case "PJReportCommentDelete":include("modules/$modname/admin/PJReportCommentDelete.php");break;
    case "PJReportCommentEdit":include("modules/$modname/admin/PJReportCommentEdit.php");break;
    case "PJReportCommentRemove":include("modules/$modname/admin/PJReportCommentRemove.php");break;
    case "PJReportCommentUpdate":include("modules/$modname/admin/PJReportCommentUpdate.php");break;
    case "PJReportConfig":include("modules/$modname/admin/PJReportConfig.php");break;
    case "PJReportConfigUpdate":include("modules/$modname/admin/PJReportConfigUpdate.php");break;
    case "PJReportDelete":include("modules/$modname/admin/PJReportDelete.php");break;
    case "PJReportEdit":include("modules/$modname/admin/PJReportEdit.php");break;
    case "PJReportImport":include("modules/$modname/admin/PJReportImport.php");break;
    case "PJReportImportInsert":include("modules/$modname/admin/PJReportImportInsert.php");break;
    case "PJReportList":include("modules/$modname/admin/PJReportList.php");break;
    case "PJReportMembers":include("modules/$modname/admin/PJReportMembers.php");break;
    case "PJReportPrint":include("modules/$modname/admin/PJReportPrint.php");break;
    case "PJReportRemove":include("modules/$modname/admin/PJReportRemove.php");break;
    case "PJReportStatusAdd":include("modules/$modname/admin/PJReportStatusAdd.php");break;
    case "PJReportStatusDelete":include("modules/$modname/admin/PJReportStatusDelete.php");break;
    case "PJReportStatusEdit":include("modules/$modname/admin/PJReportStatusEdit.php");break;
    case "PJReportStatusFix":include("modules/$modname/admin/PJReportStatusFix.php");break;
    case "PJReportStatusInsert":include("modules/$modname/admin/PJReportStatusInsert.php");break;
    case "PJReportStatusList":include("modules/$modname/admin/PJReportStatusList.php");break;
    case "PJReportStatusOrder":include("modules/$modname/admin/PJReportStatusOrder.php");break;
    case "PJReportStatusRemove":include("modules/$modname/admin/PJReportStatusRemove.php");break;
    case "PJReportStatusUpdate":include("modules/$modname/admin/PJReportStatusUpdate.php");break;
    case "PJReportTypeAdd":include("modules/$modname/admin/PJReportTypeAdd.php");break;
    case "PJReportTypeDelete":include("modules/$modname/admin/PJReportTypeDelete.php");break;
    case "PJReportTypeEdit":include("modules/$modname/admin/PJReportTypeEdit.php");break;
    case "PJReportTypeFix":include("modules/$modname/admin/PJReportTypeFix.php");break;
    case "PJReportTypeInsert":include("modules/$modname/admin/PJReportTypeInsert.php");break;
    case "PJReportTypeList":include("modules/$modname/admin/PJReportTypeList.php");break;
    case "PJReportTypeOrder":include("modules/$modname/admin/PJReportTypeOrder.php");break;
    case "PJReportTypeRemove":include("modules/$modname/admin/PJReportTypeRemove.php");break;
    case "PJReportTypeUpdate":include("modules/$modname/admin/PJReportTypeUpdate.php");break;
    case "PJReportUpdate":include("modules/$modname/admin/PJReportUpdate.php");break;
    case "PJRequestCommentDelete":include("modules/$modname/admin/PJRequestCommentDelete.php");break;
    case "PJRequestCommentEdit":include("modules/$modname/admin/PJRequestCommentEdit.php");break;
    case "PJRequestCommentRemove":include("modules/$modname/admin/PJRequestCommentRemove.php");break;
    case "PJRequestCommentUpdate":include("modules/$modname/admin/PJRequestCommentUpdate.php");break;
    case "PJRequestConfig":include("modules/$modname/admin/PJRequestConfig.php");break;
    case "PJRequestConfigUpdate":include("modules/$modname/admin/PJRequestConfigUpdate.php");break;
    case "PJRequestDelete":include("modules/$modname/admin/PJRequestDelete.php");break;
    case "PJRequestEdit":include("modules/$modname/admin/PJRequestEdit.php");break;
    case "PJRequestImport":include("modules/$modname/admin/PJRequestImport.php");break;
    case "PJRequestImportInsert":include("modules/$modname/admin/PJRequestImportInsert.php");break;
    case "PJRequestList":include("modules/$modname/admin/PJRequestList.php");break;
    case "PJRequestMembers":include("modules/$modname/admin/PJRequestMembers.php");break;
    case "PJRequestPrint":include("modules/$modname/admin/PJRequestPrint.php");break;
    case "PJRequestRemove":include("modules/$modname/admin/PJRequestRemove.php");break;
    case "PJRequestStatusAdd":include("modules/$modname/admin/PJRequestStatusAdd.php");break;
    case "PJRequestStatusDelete":include("modules/$modname/admin/PJRequestStatusDelete.php");break;
    case "PJRequestStatusEdit":include("modules/$modname/admin/PJRequestStatusEdit.php");break;
    case "PJRequestStatusFix":include("modules/$modname/admin/PJRequestStatusFix.php");break;
    case "PJRequestStatusInsert":include("modules/$modname/admin/PJRequestStatusInsert.php");break;
    case "PJRequestStatusList":include("modules/$modname/admin/PJRequestStatusList.php");break;
    case "PJRequestStatusOrder":include("modules/$modname/admin/PJRequestStatusOrder.php");break;
    case "PJRequestStatusRemove":include("modules/$modname/admin/PJRequestStatusRemove.php");break;
    case "PJRequestStatusUpdate":include("modules/$modname/admin/PJRequestStatusUpdate.php");break;
    case "PJRequestTypeAdd":include("modules/$modname/admin/PJRequestTypeAdd.php");break;
    case "PJRequestTypeDelete":include("modules/$modname/admin/PJRequestTypeDelete.php");break;
    case "PJRequestTypeEdit":include("modules/$modname/admin/PJRequestTypeEdit.php");break;
    case "PJRequestTypeFix":include("modules/$modname/admin/PJRequestTypeFix.php");break;
    case "PJRequestTypeInsert":include("modules/$modname/admin/PJRequestTypeInsert.php");break;
    case "PJRequestTypeList":include("modules/$modname/admin/PJRequestTypeList.php");break;
    case "PJRequestTypeOrder":include("modules/$modname/admin/PJRequestTypeOrder.php");break;
    case "PJRequestTypeRemove":include("modules/$modname/admin/PJRequestTypeRemove.php");break;
    case "PJRequestTypeUpdate":include("modules/$modname/admin/PJRequestTypeUpdate.php");break;
    case "PJRequestUpdate":include("modules/$modname/admin/PJRequestUpdate.php");break;
    case "PJTaskAdd":include("modules/$modname/admin/PJTaskAdd.php");break;
    case "PJTaskConfig":include("modules/$modname/admin/PJTaskConfig.php");break;
    case "PJTaskConfigUpdate":include("modules/$modname/admin/PJTaskConfigUpdate.php");break;
    case "PJTaskDelete":include("modules/$modname/admin/PJTaskDelete.php");break;
    case "PJTaskEdit":include("modules/$modname/admin/PJTaskEdit.php");break;
    case "PJTaskInsert":include("modules/$modname/admin/PJTaskInsert.php");break;
    case "PJTaskList":include("modules/$modname/admin/PJTaskList.php");break;
    case "PJTaskMembers":include("modules/$modname/admin/PJTaskMembers.php");break;
    case "PJTaskPriorityAdd":include("modules/$modname/admin/PJTaskPriorityAdd.php");break;
    case "PJTaskPriorityDelete":include("modules/$modname/admin/PJTaskPriorityDelete.php");break;
    case "PJTaskPriorityEdit":include("modules/$modname/admin/PJTaskPriorityEdit.php");break;
    case "PJTaskPriorityFix":include("modules/$modname/admin/PJTaskPriorityFix.php");break;
    case "PJTaskPriorityInsert":include("modules/$modname/admin/PJTaskPriorityInsert.php");break;
    case "PJTaskPriorityList":include("modules/$modname/admin/PJTaskPriorityList.php");break;
    case "PJTaskPriorityOrder":include("modules/$modname/admin/PJTaskPriorityOrder.php");break;
    case "PJTaskPriorityRemove":include("modules/$modname/admin/PJTaskPriorityRemove.php");break;
    case "PJTaskPriorityUpdate":include("modules/$modname/admin/PJTaskPriorityUpdate.php");break;
    case "PJTaskRemove":include("modules/$modname/admin/PJTaskRemove.php");break;
    case "PJTaskStatusAdd":include("modules/$modname/admin/PJTaskStatusAdd.php");break;
    case "PJTaskStatusDelete":include("modules/$modname/admin/PJTaskStatusDelete.php");break;
    case "PJTaskStatusEdit":include("modules/$modname/admin/PJTaskStatusEdit.php");break;
    case "PJTaskStatusFix":include("modules/$modname/admin/PJTaskStatusFix.php");break;
    case "PJTaskStatusInsert":include("modules/$modname/admin/PJTaskStatusInsert.php");break;
    case "PJTaskStatusList":include("modules/$modname/admin/PJTaskStatusList.php");break;
    case "PJTaskStatusOrder":include("modules/$modname/admin/PJTaskStatusOrder.php");break;
    case "PJTaskStatusRemove":include("modules/$modname/admin/PJTaskStatusRemove.php");break;
    case "PJTaskStatusUpdate":include("modules/$modname/admin/PJTaskStatusUpdate.php");break;
    case "PJTaskUpdate":include("modules/$modname/admin/PJTaskUpdate.php");break;
  }
} else {
  echo "You can not access this section";
}

?>