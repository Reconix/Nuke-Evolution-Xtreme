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
/*                                                                      */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
   die ("Illegal File Access");
}

global $prefix, $db;
if (is_mod_admin()) {

    if (isset($_GET['del']) && $_GET['del'] == 'all') {
        $db->sql_query('DELETE FROM `'.$prefix.'_referer`');
        $db->sql_query('OPTIMIZE TABLE `'.$prefix.'_referer`');
        redirect($admin_file.'.php?op=hreferer');
    } else {
        include_once(NUKE_BASE_DIR.'header.php');
        OpenTable();
        echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=hreferer\">" . _REFERER_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
        echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _REFERER_RETURNMAIN . "</a> ]</div>\n";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo '<span class="genmed"><strong>'._WHOLINKS.'</strong></span><br /><br />';
        $result = $db->sql_query("SELECT `url`, `link` FROM ".$prefix."_referer ORDER by `url`");
        $bgcolor = '';
        if ($db->sql_numrows($result) > 0) {
            while (list($url, $link) = $db->sql_fetchrow($result)) {
                $bgcolor = ($bgcolor == '') ? ' style="background: '.$bgcolor3.'"' : '';
                $link = (!empty($link) && $link != '/' && $link != '/GET/') ? "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&gt;&nbsp;".$link : '';
                echo '<div class="content"'.$bgcolor.'><a href="'.$url.'" target="_blank">'.$url."</a>".$link."</div>";
            }
            echo '<br /><a class="genmed" href="'.$admin_file.'.php?op=hreferer&amp;del=all">'._DELETEREFERERS.'</a>';
        } else {
            echo sprintf(_ERROR_NONE_TO_DISPLAY, strtolower(_HTTPREFERERS));
        }
        $db->sql_freeresult($result);
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    }

} else {
    echo 'Access Denied';
}

?>