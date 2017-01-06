<?php

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
/* Tutorials Module v.1.1.2                                   COPYRIGHT */
/*                                                                      */
/* Copyright (c) 2004 - 2006 by http://www.techgfx.com                  */
/*     Techgfx - Graeme Allan                       (goose@techgfx.com) */
/*                                                                      */
/* Copyright (c) 2002 - 2006 by http://www.portedmods.com               */
/*     Mighty_Y - Yannick Reekmans             (mighty_y@portedmods.com)*/
/*                                                                      */
/* See TechGFX.com for detailed information on the Tutorials Module     */
/*                                                                      */
/* TechGFX: Your dreams, Our imagination                                */
/************************************************************************/

if(!defined('NUKE_EVO')) exit;

global $prefix, $db;

$result = $db->sql_query("select tc_id from ".$prefix."_tutorials_categories");
$cats = $db->sql_numrows($result);

$result = $db->sql_query("select t_id from ".$prefix."_tutorials_tutorials");
$tutorials = $db->sql_numrows($result);
$content .= "&nbsp;&nbsp;# Tutorials: <b>$tutorials</b><br>&nbsp;&nbsp;Categories: <b>$cats</b><br><br>";
$content .= "<center><b>5&nbsp;Latest Tutorials</b></center>";
$a = 1;
$result = $db->sql_query("select t_id, t_title, t_counter from ".$prefix."_tutorials_tutorials order by t_date DESC limit 0,5");

while(list($pid, $title) = $db->sql_fetchrow($result)) {
		$title2 = str_replace("_", " ", $title);
	  $content .= "&nbsp;&nbsp;$a- <a href=\"modules.php?name=Tutorials&amp;t_op=showtutorial&amp;pid=$pid\">$title2</a><br>";
		$a++;
}
$content .= "<br><center><b>20&nbsp;Most Popular Tutorials</b></center>";
$a = 1;
$result = $db->sql_query("select t_id, t_title, t_counter from ".$prefix."_tutorials_tutorials order by t_counter DESC limit 0,20");

while(list($pid, $title, $counter) = $db->sql_fetchrow($result)) {
    $title2 = str_replace("_", " ", $title);
    $content .= "&nbsp;&nbsp;$a- <a href=\"modules.php?name=Tutorials&amp;t_op=showtutorial&amp;pid=$pid\">$title2</a><br>[Views: <b>$counter x</b>]<br>";
    $a++;
}

?>
