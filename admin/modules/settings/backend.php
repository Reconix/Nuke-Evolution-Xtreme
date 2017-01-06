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

global $backend_title, $backend_language;

echo "<fieldset><legend><span class='option'><strong>" . _BACKENDCONF . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _BACKENDTITLE . ":</td><td><input type='text' name='xbackend_title' value='$backend_title' size='40' maxlength='100'>"
    ."</td></tr><tr><td>"
    ."" . _BACKENDLANG . ":</td><td><input type='text' name='xbackend_language' value='$backend_language' size='10' maxlength='10'>"
    ."</td></tr></table></fieldset><br />";

?>