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
-=[Other]=-
      SSL Administration                       v1.0.0       08/29/2005
-=[Mod]=-
      Lock Modules                             v1.0.0       08/04/2005
      Queries Count                            v2.0.0       08/19/2005
      Custom Text Area                         v1.0.0       11/23/2005
      Color Toggle                             v1.0.0       11/25/2005
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $admin, $httpref, $httprefmax, $pollcomm, $articlecomm, $minpass, $my_headlines, $user_news, $adminssl, $queries_count, $use_colors, $lock_modules, $banners, $lazy_tap, $wysiwyg, $img_resize, $img_width, $img_height, $collapse, $collapsetype, $analytics, $use_stream, $html_auth;

echo "<fieldset><legend><span class='option'><strong>" . _MISCOPT . "</strong></span></legend>"
    ."<table border='0'><tr><td>"
    ."" . _ACTIVATEHTTPREF . "</td><td>";
echo yesno_option('xhttpref', $httpref);
echo "</td></tr><tr><td>"
    ."". _MAXREF . ":</td><td><input type='text' name='xhttprefmax' value='$httprefmax' size='2' maxlength='4'>"
    ."</td></tr><tr><td>"
    ."" . _COMMENTSPOLLS . "</td><td>";
echo yesno_option('xpollcomm', $pollcomm);
echo "</td></tr><tr><td>"
    ."" . _COMMENTSARTICLES . "</td><td>";
echo yesno_option('xarticlecomm', $articlecomm);
echo "</td></tr><tr><td>" . _MYHEADLINES . "</td><td>";
echo yesno_option('xmy_headlines', $my_headlines);
echo "</td></tr><tr><td>
     " . _SSLADMIN . "</td><td>";
echo yesno_option('xadminssl', $adminssl);
echo "&nbsp;&nbsp;<span class='tiny'>[ " . _SSLWARNING . " ]</span>";
echo "</td></tr><tr><td>
     " . _QUERIESCOUNT . "</td><td>";
echo yesno_option('xqueries_count', $queries_count);
echo "</td></tr><tr><td>
     " . _COLORTOGGLE . "</td><td>";
echo yesno_option('xuse_colors', $use_colors);
echo "</td></tr><tr><td>"
    ."" . _LOCK_MODULES . "</td><td>";
echo yesno_option('xlock_modules', $lock_modules);
echo "</td></tr><tr><td>"
    ."" . _ACTBANNERS . "</td><td>";
echo yesno_option('xbanners', $banners);
echo "</td></tr>";

/*****[BEGIN]******************************************
 [ Mod:     Custom Text Area                   v1.0.0 ]
 ******************************************************/
echo "<tr><td>"._TEXT_AREA.":</td><td>";
$admin_wysiwyg = new Wysiwyg('','');
echo $admin_wysiwyg->getSelect();
/*****[END]********************************************
 [ Mod:     Custom Text Area                   v1.0.0 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Base:    HTMLPurifier God Admin Bypass             ]
 ******************************************************/
if (is_god($admin)) {
	echo "<tr><td>"._HTMLBYPASS_TITLE.":</td><td>";
	echo yesno_option('xhtml_auth', $html_auth);
	echo "</td></tr>";
}
/*****[END]********************************************
 [ Base:    HTMLPurifier God Admin Bypass             ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Lazy Google Tap                    v1.0.0 ]
 ******************************************************/
if(!isset($lazy_tap) || is_null($lazy_tap) || $lazy_tap == 0) {
     $tap_off = 'checked';
} else if($lazy_tap == 1) {
     $tap_bots = 'checked';
} else if($lazy_tap == 2) {
     $tap_all = 'checked';
} else if($lazy_tap == 3) {
     $tap_admin = 'checked';
}

echo "<tr><td>"._LAZY_TAP.":</td><td>";
echo "<input type='radio' name='xlazytap' value='0' $tap_off>"._LAZY_TAP_OFF." &nbsp;";
echo "<input type='radio' name='xlazytap' value='1' $tap_bots>"._LAZY_TAP_BOT." &nbsp;";
echo "<input type='radio' name='xlazytap' value='2' $tap_all>"._LAZY_TAP_EVERYONE." &nbsp;";
echo "<input type='radio' name='xlazytap' value='3' $tap_admin>"._LAZY_TAP_ADMIN." &nbsp;";
echo "</td></tr>";
/*****[END]********************************************
 [ Mod:     Lazy Google Tap                    v1.0.0 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Mod:     Image Resize Mod                   v2.4.5 ]
 ******************************************************/
echo "<tr><td>"._IMG_RESIZE.":</td><td>";
echo yesno_option('ximg_resize', $img_resize);
echo "</td></tr>";
echo "<tr><td>"._IMG_WIDTH.":</td><td>";
echo "<input type='text' name='ximg_width' value='$img_width' size='5' maxlength='5'>";
echo "</td></tr>\n";
echo "<tr><td>"._IMG_HEIGHT.":</td><td>";
echo "<input type='text' name='ximg_height' value='$img_height' size='5' maxlength='5'>";
echo "</td></tr>\n";
/*****[END]********************************************
 [ Mod:     Image Resize Mod                   v2.4.5 ]
 ******************************************************/
/*****[BEGIN]******************************************
 [ Base:    Switch Content Script              v2.0.0 ]
 ******************************************************/
echo "<tr><td>\n"
    ."" . _COLLAPSE . "</td><td>";
echo yesno_option('xcollapse', $collapse);
echo "</td></tr>\n";
echo "<tr><td>\n";
echo "</td><td>\n";
echo '<select name="xcollapsetype" id="xcollapsetype">';
echo '<option value="0" '.(($collapsetype == 0)?' selected="selected"':'').">"._COLLAPSE_ICON."</option>\n";
echo '<option value="1" '.(($collapsetype == 1)?' selected="selected"':'').">". _COLLAPSE_TITLE."</option>\n";
echo '</select>';
echo "</td></tr>\n";
/*****[END]********************************************
 [ Base:    Switch Content Script              v2.0.0 ]
 ******************************************************/
echo "<tr><td>"._ANALYTICS.":</td><td>";
echo "<input type='text' name='xanalytics' value='$analytics' size='25' maxlength='50'>";
echo "</td></tr>\n";
echo "<tr><td>\n"
    ."" . _USESTREAM . "</td><td>";
echo yesno_option('xuse_stream', $use_stream);
echo "</td></tr>\n";
echo "</table></fieldset><br />";

?>