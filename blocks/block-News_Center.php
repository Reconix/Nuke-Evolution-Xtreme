
<html>
<head>
</head>
<body>
<script>
function openpopupnews(){
var popurl="blocks/NEWS/copyright-nCo_News_Center.php"
winpops=window.open(popurl,"","width=360,height=180,")
}
</script>
</body>
</html>
<?php

//**********************************************************************//
// BLOCK: block-nCo_News_Center 1.0		   			                    //
// ==============================================                       //
//                                                                      //
// Copyright © 2003 - 2008 by NukeCode                                  //
// 					                                                    //
// http://nukecode.com                                                  //
//                                                                      //
// Distributed under CPL License Version 1.0                            //
//                                                                      //
//                                                                      //
//**********************************************************************//
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

if(!defined('NUKE_EVO')) exit;

global $prefix, $dbi, $db, $bgcolor1, $bgcolor2, $admin, $ThemeSel;

$content = "<table width=\"100%\" cellspacing=\"2\" cellpadding=\"2\" border=\"1\" bordercolor=\"$bgcolor2\">";
if (is_admin($admin)) {
$content .= "<tr bgcolor=\"$bgcolor1\" align=\"center\">";
$content .=	"<td width=\"15%\" bgcolor=\"$bgcolor2\" align=\"center\"><font class=\"boxtitle\">"._TOPICNCB."</font></td>";
$content .= "<td width=\"50%\" bgcolor=\"$bgcolor2\" align=\"left\"><font class=\"boxtitle\">"._ARTICLENCB."</font></td>";
$content .=	"<td width=\"15%\" bgcolor=\"$bgcolor2\" align=\"left\"><font class=\"boxtitle\">"._READMORENCB."</font></td>";
$content .=	"<td width=\"12%\" bgcolor=\"$bgcolor2\" align=\"center\"><font class=\"boxtitle\">"._OPTIONSNCB."</font></td>";
$content .= "<td width=\"13%\" bgcolor=\"$bgcolor2\" align=\"center\"><font class=\"boxtitle\">"._ADMINNCB."</font></td>";
}else{
$content .= "<tr bgcolor=\"$bgcolor1\" align=\"center\">";
$content .=	"<td width=\"15%\" bgcolor=\"$bgcolor2\" align=\"center\"><b>"._TOPICNCB."</b></td>";
$content .= "<td width=\"50%\" bgcolor=\"$bgcolor2\" align=\"left\"><b>"._ARTICLENCB."</b></td>";
$content .=	"<td width=\"15%\" bgcolor=\"$bgcolor2\" align=\"left\"><b>"._READMORENCB."</b></td>";
$content .=	"<td width=\"12%\" bgcolor=\"$bgcolor2\" align=\"center\"><b>"._OPTIONSNCB."</b></td>";
$content .="</tr>";
}
$total_articles = 10;
$sql = "SELECT sid, title, time, aid, counter, topic FROM ".$prefix."_stories ORDER BY sid DESC LIMIT 0,$total_articles";
$result = $db->sql_query($sql);

while ($row = $db->sql_fetchrow($result)) {
    $sid = intval($row['sid']);
    $title = $row['title'];
    $time = $row['time'];
    $aid = $row['aid'];
    $counter = $row['counter'];
	$topic = intval($row['topic']);
	
	$sql2 = "SELECT topicname, topicid FROM ".$prefix."_topics WHERE topicid='$topic'";
	$result2 = $db->sql_query($sql2);
	$row = $db->sql_fetchrow($result2);
	$topicname = $row['topicname'];
	$datetime= formatTimestamp($time);
   if (is_admin($admin)) {
$content .= "<tr>";
 $content .= "<td width=\"15%\" bgcolor=\"$bgcolor2\" align=\"center\"><a href=\"modules.php?name=News&new_topic=$topic\">$topicname</a></td>";                                                                                                                            
	$content .= "<td width=\"50%\" bgcolor=\"$bgcolor1\"><a href=\"modules.php?name=News&file=article&sid=$sid\" ;return false\"><u><b>$title</b></u></a><br>$datetime - (reads: $counter)</td>";
	$content .= "<td width=\"10%\" bgcolor=\"$bgcolor2\" align=\"center\">  <a href=\"modules.php?name=News&file=article&sid=$sid\"><img src=\"images/ncnews/read.png\" alt=\"Read More\" title=\"Read More\" border=\"0\"></a></td>";
	$content .= "<td width=\"12%\" align=\"center\" bgcolor=\"$bgcolor2\"><a href=\"modules.php?name=News&file=article&sid=$sid\"><img src=\"images/ncnews/comment.png\" alt=\"Comments\" title=\"Comments\" border=\"0\"></a> <a href=\"modules.php?name=Submit_News\"><img src=\"images/ncnews/add.png\" alt=\"Submit News\" title=\"Submit News\" border=\"0\"></a></td>";
	$content .= "<td width=\"13%\" bgcolor=\"$bgcolor1\" align=\"center\"><a href=\"admin.php?op=adminStory\"><img src=\"images/ncnews/add.png\" alt=\"Add article\" title=\"Submit News\" border=\"0\"></a><a href=\"admin.php?op=EditStory&sid=$sid\"><img src=\"images/ncnews/edit.png\" alt=\"Edit artcle\" title=\"Edit\" border=\"0\"><a href=\"admin.php?op=RemoveStory&sid=$sid\"><img src=\"images/ncnews/delete.png\" alt=\"Delete article\" title=\"Delete\" border=\"0\"></a></td>";	
	
} else {
	 $content .= "<td width=\"15%\" bgcolor=\"$bgcolor2\" align=\"center\"><a href=\"modules.php?name=News&new_topic=$topic\">$topicname</a></td>";                                                                                                                            
	$content .= "<td width=\"50%\" bgcolor=\"$bgcolor1\"><a href=\"modules.php?name=News&file=article&sid=$sid\" ;return false\"><u><b>$title</b></u></a><br>$datetime - (reads: $counter)</td>";
	$content .= "<td width=\"10%\" bgcolor=\"$bgcolor2\" align=\"center\">  <a href=\"modules.php?name=News&file=article&sid=$sid\"><img src=\"images/ncnews/read.png\" alt=\"Read More\" title=\"Read More\" border=\"0\"></a></td>";
	$content .= "<td width=\"12%\" align=\"center\" bgcolor=\"$bgcolor2\"><a href=\"modules.php?name=News&file=article&sid=$sid\"><img src=\"images/ncnews/comment.png\" alt=\"Comments\" title=\"Comments\" border=\"0\"></a> <a href=\"modules.php?name=Submit_News\"><img src=\"images/ncnews/add.png\" alt=\"Submit News\" title=\"Submit News\" border=\"0\"></a></td>";
	}
	$content .= "</tr>";
}
$content .="</table>";

$content .="<table border=\"0\" width=\"100%\">";
$content .="<tr>";
$content .="<td width=\"50%\" align=\"left\"><a href=\"modules.php?name=News\">";
$content .="<img src=\"images/ncnews/news.png\" alt=\"More News\" border=\"0\">";
$content .="</a>";
$content .="</td>";
$content .="<td width=\"50%\" align=\"right\"><a href=\"javascript:openpopupnews()\">&copy;&nbsp;News Center</a>&nbsp;</td>";
$content .="</tr>";
$content .="</table>";

?>