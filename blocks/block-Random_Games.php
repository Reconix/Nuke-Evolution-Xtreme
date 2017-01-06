<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* PHP-NUKE: Center Random Block                                        */
/* ================================                                     */
/*                                                                      */
/* Copyright (c) 2004 by Barcrest                                       */
/* http://baja.ods.org/                                                 */
/*                                                                      */
/* And                                                                  */
/*                                                                      */
/* Copyright (c) 2004 by Phantomk                                       */
/* http://www.5thlegion.com                                             */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation                                         */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       09/20/2005
-=[Mod]=-
      Advanced Username Color                  v1.0.5       09/20/2005
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

define("_TOPGAMERS", "The Top Players");
define("_VICTOIRES", "Number Of Wins :");

global $prefix, $user_prefix, $db;

/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
$sql = "SELECT g.* , u.username FROM ".$prefix."_bbgames g, ".$user_prefix."_users u WHERE u.user_id = g.game_highuser ORDER BY rand()";
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/

$result = $db->sql_query($sql);
$row = $db->sql_fetchrow($result);

$lastScore = number_format($row['game_highscore']);
$lastGame = $row['game_name'];
/*****[BEGIN]******************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/
$lastUser = UsernameColor($row['username']);
/*****[END]********************************************
 [ Mod:    Advanced Username Color             v1.0.5 ]
 ******************************************************/

$lastgameid = $row['game_id'];
$lastgamepic = $row['game_pic'];
$lastuserid = $row['game_highuser'];

$content .= "<center><strong>$lastGame</strong><br /><a href=\"modules.php?name=Forums&amp;file=games&amp;gid=$lastgameid\">";
$content .= "<img src=\"modules/Forums/games/pics/$lastgamepic\" border= \"0\"></a><br /> ";
$content .= "High Score set by <br /><strong>";
$content .= "<a href=\"modules.php?name=Forums&amp;file=statarcade&amp;uid=$lastuserid\"><img src=\"modules/Forums/templates/subSilver/images/loupe.gif\" border= \"0\"></a> ";
$content .= "<a href=\"modules.php?name=Forums&amp;file=profile&amp;mode=viewprofile&amp;u=$lastuserid\">$lastUser</a> ";
$content .= "</strong><br />with <strong>$lastScore</strong></center>";

?>