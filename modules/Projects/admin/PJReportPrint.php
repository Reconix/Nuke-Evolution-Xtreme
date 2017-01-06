<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
include_once("includes/counter.php");
$report = pjreport_info($report_id);
$Theme_Sel = get_theme();
echo "<html>\n";
echo "<head>\n";
echo "<title>"._PJ_REPORTVIEW.": ".$report['report_name']."</title>\n";
echo "</head>\n";
echo "<body>\n";
require_once("themes/$Theme_Sel/theme.php");
echo "<center><h3>"._PJ_REPORTVIEW.": ".$report['report_name']."</h3></center>\n";
echo "<br />\n";
$project = pjproject_info($report['project_id']);
$reportstatus = pjreportstatus_info($report['status_id']);
$reporttype = pjreporttype_info($report['type_id']);
if($reportstatus['status_name'] == ""){ $reportstatus['status_name'] = _PJ_NA; }
if($reporttype['type_name'] == ""){ $reporttype['type_name'] = _PJ_NA; }
echo "<center><table border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
echo "<tr><td colspan='4' width='100%'><nobr><b>"._PJ_PROJECTNAME."</b></nobr></td></tr>\n";
$pjimage = pjimage("project.png", $modname);
echo "<tr><td align='center'><img src='$pjimage'></td>\n";
echo "<td colspan='3' width='100%'><nobr>".$project['project_name']." (".$report['project_id'].")</nobr></td></tr>\n";
echo "<tr><td colspan='2' width='100%'><nobr><b>"._PJ_REPORTINFO."</b></nobr></td>\n";
echo "<td align='center'><b>"._PJ_STATUS."</b></td>\n";
echo "<td align='center'><b>"._PJ_TYPE."</b></td></tr>\n";
$pjimage = pjimage("report.png", $modname);
echo "<tr><td align='center'><img src='$pjimage'></td><td width='100%'><nobr>".$report['report_name']."</nobr></td>\n";
echo "<td align='center'><nobr>".$reportstatus['status_name']."</nobr></td>\n";
echo "<td align='center'><nobr>".$reporttype['type_name']."</nobr></td></tr>\n";
if($report['report_description'] != ""){
    $pjimage = pjimage("description.png", $modname);
    echo "<tr><td align='center' valign='top'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'>".nl2br($report['report_description'])."</td></tr>\n";
}
$pjimage = pjimage("reporter.png", $modname);
echo "<tr><td align='center'><img src='$pjimage'></td>\n";
echo "<td colspan='3' width='100%'><nobr>"._PJ_REPORTEDBY.": <b>".$report['submitter_email']."</b></nobr></td></tr>\n";
if($report['date_submitted'] != '0'){
    $submit_date = date($pj_config['report_date_format'], $report['date_submitted']);
    $pjimage = pjimage("date.png", $modname);
    echo "<tr><td align='center'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'><nobr>"._PJ_SUBMITTED.": <b>$submit_date</b></nobr></td></tr>\n";
}
if($report['date_modified'] != '0'){
    $modify_date = date($pj_config['report_date_format'], $report['date_modified']);    
    $pjimage = pjimage("date.png", $modname);
    echo "<tr><td align='center'><img src='$pjimage'></td>\n";
    echo "<td colspan='3' width='100%'><nobr>"._PJ_MODIFIED.": <b>$modify_date</b></nobr></td></tr>\n";
}
$memberresult = $db->sql_query("SELECT `member_id` FROM `".$prefix."_nsnpj_reports_members` WHERE `report_id`='$report_id' ORDER BY `member_id`");
$member_total = $db->sql_numrows($memberresult);
echo "<tr><td colspan='4' width='100%'><nobr><b>"._PJ_REPORTMEMBERS."</b></nobr></td></tr>\n";
if($member_total != 0){
    while(list($member_id) = $db->sql_fetchrow($memberresult)) {
        $pjimage = pjimage("member.png", $modname);
        $member = pjmember_info($member_id);
        echo "<tr><td><img src='$pjimage'></td><td colspan='3' width='100%'>".$member['member_name']." (".$member['member_email'].")</td></tr>\n";
    }
} else {
    echo "<tr><td align='center' colspan='4' width='100%'><nobr>"._PJ_NOREPORTMEMBERS."</nobr></td></tr>\n";
}
echo "</table>\n";
echo "<br />\n";
$commentresult = $db->sql_query("SELECT `comment_id` FROM `".$prefix."_nsnpj_reports_comments` WHERE `report_id`='$report_id' ORDER BY `date_commented` asc");
$comment_total = $db->sql_numrows($commentresult);
echo "<table border='1' cellpadding='2' cellspacing='0' width='100%'>\n";
echo "<tr><td width='100%'><nobr><b>"._PJ_COMMENTS."</b></nobr></td><tr>\n";
if($comment_total > 0){
    while(list($comment_id) = $db->sql_fetchrow($commentresult)) {
        $comment = pjreportcomment_info($comment_id);
        $comment_date = date($pj_config['report_date_format'], $comment['date_commented']);    
        echo "<tr><td><nobr><b>".$comment['commenter_email']." @ $comment_date</b>";
        echo "</nobr></td></tr>\n";
        echo "<tr><td>".nl2br($comment['comment_description'])."</td></tr>\n";
    }
} else {
    echo "<tr><td align='center'><nobr>"._PJ_NOREPORTCOMMENTS."</nobr></td></tr>\n";
}
echo "</table>\n";
    echo "</body>\n";
    echo "</html>\n";

?>