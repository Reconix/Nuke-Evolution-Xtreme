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

global $moderate, $commentlimit, $anonymous;

echo "<fieldset><legend><span class='option'><strong>" . _COMMENTSOPT . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _MODTYPE . ":</td><td>"
    ."<select name='xmoderate'>";
if ($moderate==1) {
    $sel1 = "selected";
    $sel2 = "";
    $sel3 = "";
} elseif ($moderate==2) {
    $sel1 = "";
    $sel2 = "selected";
    $sel3 = "";
} elseif ($moderate==0) {
    $sel1 = "";
    $sel2 = "";
    $sel3 = "selected";
}
echo "<option name='xmoderate' value='1' $sel1>" . _MODADMIN . "</option>"
    ."<option name='xmoderate' value='2' $sel2>" . _MODUSERS . "</option>"
    ."<option name='xmoderate' value='0' $sel3>" . _NOMOD . "</option>"
    ."</select></td></tr><tr><td>"
    ."" . _COMMENTSLIMIT . ":</td><td><input type='text' name='xcommentlimit' value='$commentlimit' size='11' maxlength='10'>"
    ."</td></tr><tr><td>"
    ."" . _ANONYMOUSNAME . ":</td><td><input type='text' name='xanonymous' value='$anonymous'>"
    ."</td></tr></table></fieldset><br />";

?>