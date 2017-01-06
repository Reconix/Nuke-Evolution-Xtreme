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

global $cat, $language, $prefix, $multilingual, $currentlang, $db;
if ($multilingual == 1) {
        $querylang = "AND (alanguage='$currentlang' OR alanguage='')"; /* the OR is needed to display stories who are posted to ALL languages */
} else {
        $querylang = '';
}
$sql = "SELECT catid, title FROM ".$prefix."_stories_cat ORDER BY title";
$result = $db->sql_query($sql);
$numrows = $db->sql_numrows($result);
if ($numrows == 0) {
    return;
} else {
    $boxstuff = "<span class=\"content\">";
    while (list($catid, $title) = $db->sql_fetchrow($result)) {
        $catid = intval($catid);
        $title = stripslashes($title);
        $numrows = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_stories WHERE catid='$catid' $querylang LIMIT 1"));
        if ($numrows > 0) {
            if ($cat == 0 AND !$a) {
                $boxstuff .= "<strong><big>&middot;</big></strong>&nbsp;<strong>"._ALLCATEGORIES."</strong><br />";
                $a = 1;
            } elseif ($cat != 0 AND !$a) {
                $boxstuff .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"modules.php?name=News\">"._ALLCATEGORIES."</a><br />";
                $a = 1;
            }

            if ($cat == $catid) {
                $boxstuff .= "<strong><big>&middot;</big></strong>&nbsp;<strong>$title</strong><br />";
            } else {
                $boxstuff .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"modules.php?name=News&amp;file=categories&amp;op=newindex&amp;catid=$catid\">$title</a><br />";
            }
        }
    }
    $boxstuff .= "</span>";
    $content = $boxstuff;
}
$db->sql_freeresult($result);

?>