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

global $notify, $notify_email, $notify_subject, $notify_message, $notify_from;

echo "<fieldset><legend><span class='option'><strong>" . _MAIL2ADMIN . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _NOTIFYSUBMISSION . "</td><td>";
echo yesno_option('xnotify', $notify);
echo "</td></tr><tr><td>"
    ."" . _EMAIL2SENDMSG . ":</td><td><input type='text' name='xnotify_email' value='$notify_email' size='30' maxlength='100'>"
    ."</td></tr><tr><td>"
    ."" . _EMAILSUBJECT . ":</td><td><input type='text' name='xnotify_subject' value='$notify_subject' size='40' maxlength='100'>"
    ."</td></tr><tr><td>"
    ."" . _EMAILMSG . ":</td><td><textarea name='xnotify_message' cols='40' rows='8'>$notify_message</textarea>"
    ."</td></tr><tr><td>"
    ."" . _EMAILFROM . ":</td><td><input type='text' name='xnotify_from' value='$notify_from' size='15' maxlength='25'>"
    ."</td></tr></table></fieldset><br />";

?>