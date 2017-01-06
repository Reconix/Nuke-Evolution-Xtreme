<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$pagetitle = ": "._PJ_TITLE." ".$pj_config['version_number'].": "._PJ_REPORTS.": "._PJ_DELETECOMMENT;
include("header.php");
$reportcomment = pjreportcomment_info($comment_id);
pjadmin_menu(_PJ_REPORTS.": "._PJ_DELETECOMMENT);
echo "<br />\n";
OpenTable();
echo "<table align='center' border='0' cellpadding='2' cellspacing='2'>\n";
echo "<form method='post' action='".$admin_file.".php'>\n";
echo "<input type='hidden' name='op' value='PJReportCommentDelete'>\n";
echo "<input type='hidden' name='comment_id' value='$comment_id'>\n";
echo "<input type='hidden' name='report_id' value='".$reportcomment['report_id']."'>\n";
echo "<tr><td align='center' colspan='2'><b>"._PJ_CONFIRMCOMMENTDELETE."</b></td></tr>\n";
echo "<tr><td align='center' valign='top'><b>"._PJ_COMMENT." #$comment_id</b></td><td>".$reportcomment['comment_description']."</td></tr>\n";
echo "<tr><td align='center' colspan='2'><input type='submit' value='"._PJ_DELETECOMMENT."'></td></tr>\n";
echo "</form>\n";
echo "</table>\n";
CloseTable();
pj_copy();
include("footer.php");

?>