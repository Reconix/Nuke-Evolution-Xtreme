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

global $foot1, $foot2, $foot3;

echo "<fieldset><legend><span class='option'><strong>" . _FOOTERMSG . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _FOOTERLINE1 . ":</td><td><textarea name='xfoot1' cols='50' rows='5'>" . $foot1 . "</textarea>"
    ."</td></tr><tr><td>"
    ."" . _FOOTERLINE2 . ":</td><td><textarea name='xfoot2' cols='50' rows='5'>" . $foot2 . "</textarea>"
    ."</td></tr><tr><td>"
    ."" . _FOOTERLINE3 . ":</td><td><textarea name='xfoot3' cols='50' rows='5'>" . $foot3 . "</textarea>"
    ."</td></tr></table></fieldset><br />";

?>