<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

global $prefix, $multilingual, $currentlang, $db, $tipath, $user, $cookie, $userinfo;

if (!isset($mode) OR empty($mode)) {
    if(isset($userinfo['umode'])) {
      $mode = $userinfo['umode'];
    } else {
      $mode = "thread";
    }
}
if (!isset($order) OR empty($order)) {
    if(isset($userinfo['uorder'])) {
      $order = $userinfo['uorder'];
    } else {
      $order = 0;
    }
}
if (!isset($thold) OR empty($thold)) {
    if(isset($userinfo['thold'])) {
      $thold = $userinfo['thold'];
    } else {
      $thold = 0;
    }
}
$r_options = "";
$r_options .= "&amp;mode=".$mode;
$r_options .= "&amp;order=".$order;
$r_options .= "&amp;thold=".$thold;

if ($multilingual == 1) {
    $querylang = "AND (alanguage='$currentlang' OR alanguage='')"; /* the OR is needed to display stories who are posted to ALL languages */
} else {
    $querylang = "";
}

$sql = "SELECT * FROM ".$prefix."_topics";
$query = $db->sql_query($sql);
$numrows = $db->sql_numrows($query);
if ($numrows > 1) {
    $sql = "SELECT topicid FROM ".$prefix."_topics";
    $result = $db->sql_query($sql);
    while (list($topicid) = $db->sql_fetchrow($result)) {
    $topicid = intval($topicid);
    $topic_array .= "$topicid-";
    }
    $r_topic = explode("-",$topic_array);
    mt_srand((double)microtime()*1000000);
    $numrows = $numrows-1;
    $topic = mt_rand(0, $numrows);
    $topic = $r_topic[$topic];
} else {
    $topic = 1;
}
$db->sql_freeresult($query);

$sql2 = "SELECT topicimage, topictext FROM ".$prefix."_topics WHERE topicid='$topic'";
$query2 = $db->sql_query($sql2);
list($topicimage, $topictext) = $db->sql_fetchrow($query2);
$db->sql_freeresult($query2);
$content = "<br /><center><a href=\"modules.php?name=News&amp;new_topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" alt=\"$topictext\" title=\"$topictext\"></a><br />[ <a href=\"modules.php?name=Search&amp;topic=$topic\">$topictext</a> ]</center><br />";
$content .= "<table border=\"0\" width=\"100%\">";
$sql3 = "SELECT sid, title FROM ".$prefix."_stories WHERE topic='$topic' $querylang ORDER BY sid DESC LIMIT 0,9";
$result3 = $db->sql_query($sql3);
while (list($sid, $title) = $db->sql_fetchrow($result3)) {
  $content .= "<tr><td valign=\"top\"><strong><big>&middot;</big></strong></td><td><a href=\"modules.php?name=News&amp;file=article&amp;sid=$sid$r_options\">$title</a></td></tr>";
}
$db->sql_freeresult($result3);
$content .= "</table>";

?>