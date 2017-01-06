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
      Lazy Google Tap                          v1.0.0       01/27/2006
      URL Check                                v1.0.0       07/01/2005
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $sitename, $nukeurl, $site_logo, $slogan, $startdate, $adminmail, $top, $storyhome, $oldnum, $ultramode, $anonpost, $language, $locale;

echo "<fieldset><legend><span class='option'><strong>" . _GENSITEINFO . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _SITENAME . ":</td><td><input type='text' name='xsitename' value='$sitename' size='40' maxlength='255'>"
    ."</td></tr><tr><td>"
    ."" . _SITEURL . ":</td><td><input type='text' name='xnukeurl' value='$nukeurl' size='40' maxlength='255'>"
    ."</td></tr><tr><td>"
    ."" . _SITELOGO . ":</td><td><input type='text' name='xsite_logo' value='$site_logo' size='20' maxlength='255'> <span class='tiny'>[ " . _MUSTBEINIMG . " ]</span>"
    ."</td></tr><tr><td>"
    ."" . _SITESLOGAN . ":</td><td><input type='text' name='xslogan' value='$slogan' size='40' maxlength='255'>"
    ."</td></tr><tr><td>"
    ."" . _STARTDATE . ":</td><td><input type='text' name='xstartdate' value='$startdate' size='20' maxlength='50'>"
    ."</td></tr><tr><td>"
    ."" . _ADMINEMAIL . ":</td><td><input type='text' name='xadminmail' value='$adminmail' size='30' maxlength='255'>"
    ."</td></tr><tr><td>"
    ."" . _ITEMSTOP . ":</td><td><input type='text' name='xtop' value='$top' size='1' maxlength='2'>"
    ."</td></tr><tr><td>"
    ."" . _STORIESHOME . ":</td><td><input type='text' name='xstoryhome' value='$storyhome' size='1' maxlength='2'>"
    ."</td></tr><tr><td>"
    ."" . _OLDSTORIES . ":</td><td><input type='text' name='xoldnum' value='$oldnum' size='1' maxlength='2'>"
    ."</td></tr><tr><td>"
    ."" . _ACTULTRAMODE . "</td><td>";
echo yesno_option('xultramode', $ultramode);
echo "</td></tr><tr><td>" . _ALLOWANONPOST . " </td><td>";
echo yesno_option('xanonpost', $anonpost);
echo "</td></tr>"
    ."<tr><td>"
    ."" . _LOCALEFORMAT . ":</td><td><input type='text' name='xlocale' value='$locale' size='20' maxlength='40'></td></tr>";

echo "</table></fieldset><br />";

?>