<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REQUESTS.": "._PJ_REQUESTLIST;
if(!$page) $page = 1;
if(!$per_page) $per_page = 25;
if(!$column) $column = "project_id";
if(!$direction) $direction = "desc";
include("header.php");
pjadmin_menu(_PJ_REQUESTS.": "._PJ_REQUESTLIST);
echo "<br />\n";
OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td colspan='3' bgcolor='$bgcolor2'><nobr><b>"._PJ_REQUESTOPTIONS."</b></nobr></td></tr>\n";
$requestrows = $db->sql_numrows($db->sql_query("SELECT `request_id` FROM `".$prefix."_nsnpj_requests`"));
$pjimage = pjimage("stats.png", $modname);
echo "<tr><td><img src='$pjimage'></td><td colspan='2' width='100%'><nobr>"._PJ_TOTALREQUESTS.": <b>$requestrows</b></nobr></td></tr>\n";
echo "</table>\n";
//CloseTable();
echo "<br />\n";
$total_pages = ($requestrows / $per_page);
$total_pages_quotient = ($requestrows % $per_page);
if($total_pages_quotient != 0){ $total_pages = ceil($total_pages); }
$start_list = ($per_page * ($page-1));
$end_list = $per_page;
//OpenTable();
echo "<table width='100%' border='1' cellspacing='0' cellpadding='2'>\n";
echo "<tr><td bgcolor='$bgcolor2' width='100%' colspan='2'><nobr><b>"._PJ_REQUESTLIST."</b></nobr></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_PROJECT."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_STATUS."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_TYPE."</b></td>\n";
echo "<td align='center' bgcolor='$bgcolor2'><b>"._PJ_FUNCTIONS."</b></td></tr>\n";
if($requestrows > 0){
    $reviewresult = $db->sql_query("SELECT `request_id`, `request_name`, `project_id`, `type_id`, `status_id` FROM `".$prefix."_nsnpj_requests` ORDER BY `$column` $direction LIMIT $start_list, $end_list");
    while(list($request_id, $request_name, $project_id, $type_id, $status_id) = $db->sql_fetchrow($reviewresult)){
	$status = pjrequeststatus_info($status_id);
	$project = pjproject_info($project_id);
	$type = pjrequesttype_info($type_id);
	$members = $db->sql_numrows($db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_requests_members` WHERE `request_id`='$request_id'"));
	$pjimage = pjimage("request.png", $modname);
	if($request_name == "") { $request_name = "----------"; }
	echo "<tr><td><img src='$pjimage'></td><td width='100%'>$request_name</td>\n";
        echo "<td align='center'><nobr><a href='".$admin_file.".php?op=PJProjectList'>".$project['project_name']."</a></nobr></td>\n";
	if($status['status_name'] == ""){ $status['status_name'] = _PJ_NA; }
	echo "<td align=center><a href='".$admin_file.".php?op=PJRequestStatusList'>".$status['status_name']."</a></td>\n";
	if($type['type_name'] == ""){ $type['type_name'] = _PJ_NA; }
	echo "<td align=center><nobr><a href='".$admin_file.".php?op=PJRequestTypeList'>".$type['type_name']."</a></td>\n";
	echo "<td align=center><nobr>[ <a href='".$admin_file.".php?op=PJRequestEdit&request_id=$request_id'>"._PJ_EDIT."</a>";
	echo " | <a href='".$admin_file.".php?op=PJRequestRemove&request_id=$request_id'>"._PJ_DELETE."</a> ]</td></tr>\n";
    }
    echo "<form method='post' action='".$admin_file.".php'>\n";
    echo "<input type='hidden' name='op' value='PJRequestList'>\n";
    echo "<input type='hidden' name='column' value='$column'>\n";
    echo "<input type='hidden' name='direction' value='$direction'>\n";
    echo "<input type='hidden' name='per_page' value='$per_page'>\n";
    echo "<tr><td colspan='6' width='100%' bgcolor='$bgcolor2'>\n";

    echo "<table width='100%'><tr><td bgcolor='$bgcolor2'><b>"._PJ_PAGE."</b> <SELECT NAME='page' onChange='submit()'>\n";
    for($i=1; $i<=$total_pages; $i++){
	if($i==$page){ $sel = "SELECTed"; } else { $sel = ""; }
	echo "<OPTION VALUE='$i' $sel>$i</OPTION>\n";
    }
    echo "</SELECT> <b>"._PJ_OF." $total_pages</b></td>\n";
    echo "</form>\n";

    echo "<form method='post' action='".$admin_file.".php'>\n";
    echo "<input type='hidden' name='op' value='PJRequestList'>\n";
    echo "<td align='right' bgcolor='$bgcolor2'><b>"._PJ_SORT.":</b> <SELECT NAME='column'>\n";
    if($column == "request_id") $selcolumn1 = "SELECTed";
    echo "<OPTION VALUE='request_id' $selcolumn1>"._PJ_REQUESTID."</OPTION>\n";
    if($column == "project_id") $selcolumn2 = "SELECTed";
    echo "<OPTION VALUE='project_id' $selcolumn2>"._PJ_PROJECTID."</OPTION>\n";
    if($column == "status_id") $selcolumn3 = "SELECTed";
    echo "<OPTION VALUE='status_id' $selcolumn3>"._PJ_STATUSID."</OPTION>\n";
    if($column == "priority_id") $selcolumn4 = "SELECTed";
    echo "<OPTION VALUE='type_id' $selcolumn4>"._PJ_TYPEID."</OPTION>\n";
    echo "</SELECT> <SELECT NAME='direction'>\n";
    if($direction == "asc") $seldirection1 = "SELECTed";
    echo "<OPTION VALUE='asc' $seldirection1>"._PJ_ASC."</OPTION>\n";
    if($direction == "desc") $seldirection2 = "SELECTed";
    echo "<OPTION VALUE='desc' $seldirection2>"._PJ_DESC."</OPTION>\n";
    echo "</SELECT> <SELECT NAME='per_page'>\n";
    if($per_page == 5) $selperpage1 = "SELECTed";
    echo "<OPTION VALUE='5' $selperpage1>5</OPTION>\n";
    if($per_page == 10) $selperpage2 = "SELECTed";
    echo "<OPTION VALUE='10' $selperpage2>10</OPTION>\n";
    if($per_page == 25) $selperpage3 = "SELECTed";
    echo "<OPTION VALUE='25' $selperpage3>25</OPTION>\n";
    if($per_page == 50) $selperpage4 = "SELECTed";
    echo "<OPTION VALUE='50' $selperpage4>50</OPTION>\n";
    if($per_page == 100) $selperpage5 = "SELECTed";
    echo "<OPTION VALUE='100' $selperpage5>100</OPTION>\n";
    if($per_page == 200) $selperpage6 = "SELECTed";
    echo "<OPTION VALUE='200' $selperpage6>200</OPTION>\n";
    echo "</SELECT> <input type='submit' value='"._PJ_SORT."'></td>\n";
    echo "</form>\n";
    echo "</tr></table>\n";

    echo "</td></tr>\n";
} else {
    echo "<tr><td colspan=6 width='100%' align='center'>"._PJ_NOPROJECTREQUESTS."</td></tr>\n";
}
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>