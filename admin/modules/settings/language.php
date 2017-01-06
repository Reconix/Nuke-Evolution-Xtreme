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
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $multilingual, $useflags, $language;

echo "<fieldset><legend><span class='option'><strong>" . _MULTILINGUALOPT . "</strong></span></legend>"
    ."<br /><table border='0'><tr><td>";
echo "" . _SELLANGUAGE . ":</td><td>"
    ."<select name='xlanguage'>";
$languageslist = lang_list();
for ($i=0, $maxi=count($languageslist); $i < $maxi; $i++) {
    if(!empty($languageslist[$i])) {
        echo "<option name='xlanguage' value='".$languageslist[$i]."' ";
        if($languageslist[$i]==$language) echo "selected='selected'";
        echo ">".ucwords($languageslist[$i])."\n";
    }
}
echo "</select>"
    ."</td></tr><tr><td>"
    ."" . _ACTMULTILINGUAL . "</td><td>";
echo yesno_option('xmultilingual', $multilingual);
echo "</td></tr><tr><td>"
    ."" . _ACTUSEFLAGS . "</td><td>";
echo yesno_option('xuseflags', $useflags);
echo "</td></tr></table></fieldset><br />";

?>