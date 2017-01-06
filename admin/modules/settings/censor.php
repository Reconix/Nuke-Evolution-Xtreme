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
      Censor                                   v1.0.0       10/20/2005
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $censor_words, $censor;

$censor_words = str_replace(" ", "\n", $censor_words);

echo "<fieldset><legend><span class='option'><strong>"._CENSOR."</strong></span></legend>";
echo "<table border='0'><tr><td>";
echo _CENSOR_WORDS . ":</td><td><textarea name='xcensor_words' cols='40' rows='8'>$censor_words</textarea>";
echo "</td></tr><tr><td>";
echo _CENSOR_SETTINGS. "</td><td>";
if($censor == 0) {
    echo "<input type='radio' name='xcensor' value='0' checked>" . _CENSOR_OFF . " &nbsp;"
        ."<input type='radio' name='xcensor' value='1'>" . _CENSOR_WHOLE . " &nbsp;"
        ."<input type='radio' name='xcensor' value='2'>" . _CENSOR_PARTIAL . "";
} elseif($censor == 1) {
    echo "<input type='radio' name='xcensor' value='0'>" . _CENSOR_OFF . " &nbsp;"
        ."<input type='radio' name='xcensor' value='1' checked>" . _CENSOR_WHOLE . " &nbsp;"
        ."<input type='radio' name='xcensor' value='2'>" . _CENSOR_PARTIAL . "";
} elseif($censor == 2) {
    echo "<input type='radio' name='xcensor' value='0'>" . _CENSOR_OFF . " &nbsp;"
        ."<input type='radio' name='xcensor' value='1'>" . _CENSOR_WHOLE . " &nbsp;"
        ."<input type='radio' name='xcensor' value='2' checked>" . _CENSOR_PARTIAL . "";
}
echo "</td></tr></table></fieldset><br />";

?>