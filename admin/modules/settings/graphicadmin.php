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

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
-=[Mod]=-
      Admin Icon/Link Pos                      v1.0.0       06/15/2005
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $admingraphic, $admin_pos;

echo "<fieldset><legend><span class='option'><strong>" . _GRAPHICOPT . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _ADMINGRAPHIC . "</td><td>";
echo yesno_option('xadmingraphic', $admingraphic);
echo "</td></tr><tr><td>"
    ."" . _ADMIN_POS . "</td><td>";
$value = ($admin_pos>0) ? 1 : 0;
$sel[$value] = ' checked="checked"';
echo '<input type="radio" name="xadmin_pos" value="1"'.$sel[1].' />'._UP.'<input type="radio" name="xadmin_pos" value="0" '.$sel[0].' />'._DOWN.' ';
echo "</td></tr></table>";
echo "</fieldset><br />";

?>