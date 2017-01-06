<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: main.php,v 20.25 2004/07/18 14:03:00 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : main.php
   Author        : See below
   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)
   Version       : 1.4.0c (Based on KalenderMx 1.4b)
   Date          : 06/18/2005 (mm-dd-yyyy)

   Description   : Enhanced Calendar module with a lot of nice
                   features.
                   New Abstraction Layer and Nuke 7.6 Administration
                   System.
************************************************************************/

/************************************************************************/
/* KalenderMx v1.4                                                      */
/* ===================                                                  */
/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */
/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */
/*  http://www.pragmamx.org & http://www.shiba-design.de                */
/* -------------------------------------------------------------------- */
/* KalenderMx is based on EventCalendar 2.0                             */
/*  Copyright (c) 2001 Originally by Rob Sutton                         */
/*  http://smart.xnettech.net (Nuke Site)                               */
/*  Development continued by Aleks A.-Lessmann                          */
/* Included some ideas and changes by:                                  */
/*  flobee, bulli-frank, kicks, kochloeffel, FrankySz, Jubilee          */
/* -------------------------------------------------------------------- */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 or a newer version.   */
/************************************************************************/

if (!defined('CAL_MODULE_NAME')) {
    die ("Illegal File Access");
}

if (!isset($calconf)) {
    include(CAL_MODULE_PATH.'config/config.php');
}
include_once(CAL_MODULE_PATH.'includes/functions.php');

get_lang(CAL_MODULE_NAME);

if ((!calIsAdmin()) || (!defined('ADMIN_FILE'))) {
    $op = "errNoAuthorized";
}

#########################################################################################
function CalendarPreviewEvent($event) { # post
    $event = calStripSlashes($event);
    $GLOBALS['pagetitle']=_CALSUBMISSIONSADMIN;
    include_once(NUKE_BASE_DIR.'header.php');
    calAdminMenu(_CALSUBMISSIONSADMIN);
    calEventView($event);
    calSubmitForm($event);
    include_once(NUKE_BASE_DIR.'footer.php');
}

#########################################################################################
function CalendarPostEvent($event) { # post
    global $db, $calconf, $admin_file;
    $insert = FALSE;
    $event['activ'] = (empty($event['activ'])) ? 1 : $event['activ'];
    $event = calPrepareEventForSql($event);
    if (empty($event['eid'])) {
        $qry = calGetSqlQuery($event, "insert");
        $insert = TRUE;
    } else {
        $qry="SELECT * FROM ".CAL_TABLE_EVENTS." WHERE eid=".$event['eid']."";
        $result=$db->sql_query($qry);
        if (!$result) {
            calErrAdminMsg(_CALERRSQLERROR);
        }
        $testevent = $db->sql_fetchrow($result);
        if (!is_array($testevent)) {
            calErrAdminMsg(_CALERREVENTNOTEXIST);
        }
        $result = $db->sql_query("SELECT aid FROM ".CAL_TABLE_MX_AUTHORS." WHERE aid='".substr($event['aid'],0,25)."'");
        list($xaid) = $db->sql_fetchrow($result);
        if (!$xaid || !$event['aid']){
            $event['aid']=calIsAdmin();
        }
        $qry = calGetSqlQuery($event, "update");
    }
    #print $qry; exit;
    $result = $db->sql_query($qry);
    if (!($result)) {
        calErrAdminMsg(_CALERRSQLERROR);
    }
    #mxDebugFuncVars($event); exit;
    if ($insert) {
        /// If new event, get last ID (add before article)
        if (CAL_CMS_VERSION=='mx') {
            $event['eid']=sql_insert_id();
        } else {
            $qry2 = "SELECT eid FROM ".CAL_TABLE_EVENTS." WHERE posteddate = '".$event['posteddate']."' AND aid = '".substr($event['aid'],0,25)."' AND title = '".$event['title']."'";
            $result2 = $db->sql_query($qry2);
            list($event['eid']) = $db->sql_fetchrow($result2);
        }
    }
    if ($event['addasarticle']){
        calAddArticle($event);
    }
    if (isset($event['gotomain'])) {
        calRedirect($admin_file.'.php?op=CalendarAdmin', _CALCONF2, 1);
    } else if (isset($event['gotocalendar'])) {
        calRedirect(CAL_MODULE_LINK."&amp;y=".$event['startYear']."&amp;m=".$event['startMonth']."&amp;d=".$event['startDay']."&amp;view=".$calconf['defaultview']."", _CALCONF2, 1);
    } else {
        calRedirect("".$admin_file.".php?op=CalendarEditEvent&amp;eid=".$event['eid']."", _CALCONF2, 1);
    }
}

#########################################################################################
function CalendarEditEvent($eid) { # DB
    global $db, $op;
    $eid = (int)$eid;
    if (calIsAuthorsOwnEvent($eid)) {
        $qry="SELECT * FROM ".CAL_TABLE_EVENTS." WHERE eid=$eid";
        $result=$db->sql_query($qry);
        if (!$result) {
            calErrAdminMsg(_CALERRSQLERROR);
        }
        $event = $db->sql_fetchrow($result);
        if (!is_array($event)) {
            calErrAdminMsg(_CALERREVENTNOTEXIST);
        }
        $event['op'] = $op;
        $GLOBALS['pagetitle']=_CALSUBMISSIONSADMIN;
        if (empty($GLOBALS['header'])) include_once(NUKE_BASE_DIR.'header.php');
        calAdminMenu(_CALSUBMISSIONSADMIN);
        calEventView($event);
        calSubmitForm($event);
        include_once(NUKE_BASE_DIR.'footer.php');
    } else {
        $msg = "<strong>"._CALNOTAUTHORIZED1."</strong><br /><br />"._CALNOTAUTHORIZED2."<br /><br />";
        calErrAdminMsg($msg, _CALSUBMISSIONSADMIN);
    }
}

#########################################################################################
function CalendarDeleteEvent($eid, $ok=0) {
    global $db, $admin_file;
    $eid = (int)$eid;
    if (!calIsAuthorsOwnEvent($eid)) {
        $msg = "<strong>"._CALNOTAUTHORIZED1."</strong><br /><br />"._CALNOTAUTHORIZED2."<br /><br />";
        calErrAdminMsg($msg, _CALSUBMISSIONSADMIN);
    }
    $qry="SELECT * FROM ".CAL_TABLE_EVENTS." WHERE eid=$eid";
    $result=$db->sql_query($qry);
    if (!$result) {
        calErrAdminMsg(_CALERRSQLERROR);
    }
    $event = $db->sql_fetchrow($result);
    if (!is_array($event)) {
        calErrAdminMsg(_CALERREVENTNOTEXIST);
    }
    if ($ok) {
        $result = $db->sql_query("DELETE FROM ".CAL_TABLE_EVENTS." WHERE eid='$eid'");
        if (!$result) {
            calErrAdminMsg(_CALERRSQLERROR);
        }
        calRedirect($admin_file.'.php?op=CalendarAdmin', _CALCONF2, 1);
    } else {
        $GLOBALS['pagetitle']=_CALSUBMISSIONSADMIN;
        include_once(NUKE_BASE_DIR.'header.php');
        calAdminMenu(_CALSUBMISSIONSADMIN);
        OpenTable();
        echo "<center>"._CALREMOVETEST."<br /><br /><strong>".$event['title']."</strong><br />";
        echo "<br />[ <a href=\"".$admin_file.".php?op=CalendarAdmin\">"._CALNO."</a> | <a href=\"".$admin_file.".php?op=CalendarDeactivateEvent&amp;eid=".$event['eid']."\">"._CALONLYDEACTIVATE."</a> | <a href=\"".$admin_file.".php?op=CalendarDeleteEvent&amp;eid=".$event['eid']."&amp;ok=1\">"._CALYES."</a> ]</center>";
        CloseTable();
        echo "<br />";
        calEventView($event);
        include_once(NUKE_BASE_DIR.'footer.php');
    }
}

#########################################################################################
function CalendarDeactivateEvent($eid){
    global $db, $admin_file;
    $eid = (int)$eid;
    if (!calIsAuthorsOwnEvent($eid)) {
        $msg = "<strong>"._CALNOTAUTHORIZED1."</strong><br /><br />"._CALNOTAUTHORIZED2."<br /><br />";
        calErrAdminMsg($msg, _CALSUBMISSIONSADMIN);
    }
    $qry="UPDATE ".CAL_TABLE_EVENTS." set
        activ = 2
        WHERE eid = $eid";
    $result = $db->sql_query($qry);
    if (!($result)) {
        calErrAdminMsg(_CALERRSQLERROR);
    }
    calRedirect($admin_file.'.php?op=CalendarAdmin', _CALCONF2, 1);
}

#########################################################################################
function CalendarSubmissions() {
    global $bgcolor1, $bgcolor2, $bgcolor3, $db, $admin_file;
    $newevents = (empty($newevents)) ? "" : $newevents;
    $deacevents = (empty($deacevents)) ? "" : $deacevents;

    $GLOBALS['pagetitle']=_CALSUBMISSIONSADMIN;
    include_once(NUKE_BASE_DIR.'header.php'); // hier bereits einbinden wegen $bgcolors

    $qry = "SELECT * FROM ".CAL_TABLE_EVENTS."
    WHERE activ <> 1
    ORDER BY activ, posteddate";
    $result1 = $db->sql_query($qry);
    if (!$result1) {
        calErrAdminMsg(_CALERRSQLERROR.'<br /><br /><a href='.$admin_file.'.php?op=CalSetup><strong>goto Setup</strong></a><br /><br />');
    }

    calAdminMenu(_CALSUBMISSIONSADMIN);

    $tblheader = "<center><table border=\"0\" width=\"80%\" style=\"background-color: $bgcolor3;\" cellpadding=\"3\" cellspacing=\"1\">\n<tr style=\"background-color: $bgcolor2;\">";
    $tblheader1 = $tblheader
        ."<th colspan=2 width=\"10%\"><span class=\"content\">"._CAL1EVENT."</span></th>"
        ."<th nowrap><span class=\"content\">"._CALSUBTITLE."</span></th>"
        ."<th nowrap><span class=\"content\">"._CALARTICLETEXT."</span></th>"
        ."<th nowrap><span class=\"content\">"._CALNAMEFIELD."</span></th>"
        ."<th nowrap><span class=\"content\">"._CALPOSTEDON."</span></th>"
        ."<th width=\"5%\">&nbsp;</th>"
        ."</tr>\n";
    $tblheader2 = $tblheader
        ."<th colspan=2 width=\"10%\"><span class=\"content\">"._CAL1EVENT."</span></th>"
        ."<th nowrap><span class=\"content\">"._CALSUBTITLE."</span></th>"
        ."<th nowrap><span class=\"content\">"._CALARTICLETEXT."</span></th>"
        ."<th width=\"5%\">&nbsp;</th>"
        ."</tr>\n";

    $tblfooter = "</table>\n</center>\n";

    $i1 = 0; $i2 = 0;
    while ($xevent = $db->sql_fetchrow($result1)) {
        if ($xevent['activ']==0) {
            $i1++;
            $newevents[] = calFormatListRow($xevent, 1, $i1);
        } else if ($xevent['activ']==2) {
            $i2++;
            $deacevents[] = calFormatListRow($xevent, 2, $i2);
        }
    }

    if (count($newevents) && !empty($newevents)) {
        OpenTable();
        echo "<center><span class=\"option\">".count($newevents)."&nbsp;"._CALNEWSUBMISSIONS."</span></center><br />";
        echo $tblheader1;
        echo implode("\n",$newevents);
        echo $tblfooter;
        CloseTable();
        echo "<br />";
    } else {
        title(_CALNOSUBMISSIONS);
    }

    if (count($deacevents) && !empty($deacevents)) {
        OpenTable();
        echo "<center><span class=\"option\">".count($deacevents)."&nbsp;"._CALDEACTIVATED."</span></center><br />";
        echo $tblheader2;
        echo implode("\n",$deacevents);
        echo $tblfooter;
        CloseTable();
    } else {
        title(_CALNODEACTIVATED);
    }
    include_once(NUKE_BASE_DIR.'footer.php');
}

#########################################################################################
function calFormatListRow($event, $mode, $i) {
    global $bgcolor1, $bgcolor2, $bgcolor3, $admin_file;
    $bgcolor = ($i % 2) ? $bgcolor1 : $bgcolor2;

    $eventsdates = calGetEventDates($event);
    $event = array_merge($event,$eventsdates);

    $event['title'] = htmlspecialchars(strip_tags($event['title']), ENT_QUOTES);
    $event['title'] = (empty($event['title'])) ? _CALNOSUBJECT : $event['title'];
    $event['hometext'] = substr(htmlspecialchars(strip_tags($event['hometext']), ENT_QUOTES),0,100)."...";

    $event['informant'] = (empty($event['informant']) || $event['informant'] == $GLOBALS['anonymous']) ? "" : "<a href=\"".CAL_MOD_USERINFO.$event['informant']."\" target=\"_blank\">".UsernameColor($event['informant'])."</a>";

    $out = "<tr valign=\"top\" style=\"background-color: $bgcolor;\">";
    $out .= "<td align=\"right\"><span class=\"content\"><strong>".$i."</strong></span></td>\n";
    $out .= "<td><span class=\"content\">".$event['startDateShort']."</span></td>";
    $out .= "<td nowrap><span class=\"content\">&nbsp;<a href=\"".$admin_file.".php?op=CalendarEditEvent&amp;eid=".$event['eid']."\">".$event['title']."</a>&nbsp;</span></td>\n";
    $out .= "<td><span class=\"tiny\">".$event['hometext']."</span></td>";
    if ($mode == 1) {
        $out .= "<td><span class=\"content\">".UsernameColor($event['informant'])."</span></td>";
        $out .= "<td nowrap><span class=\"content\">".$event['postDateShort']."</span></td>";
    }
    $out .= "<td align=\"center\"><a href=\"".$admin_file.".php?op=CalendarEditEvent&amp;eid=".$event['eid']."\"><img src=\"".CAL_IMAGE_PATH."edit.gif\" alt=\""._CALPOSTSTORY."\" width=\"19\" height=\"17\" border=\"0\"></a>&nbsp;<a href=\"".$admin_file.".php?op=CalendarDeleteEvent&amp;eid=".$event['eid']."\"><img src=\"".CAL_IMAGE_PATH."delete.gif\" alt=\""._CALDELETESTORY."\" width=\"20\" height=\"16\" border=\"0\"></a></td>\n";
    $out .= "</tr>\n";
    return $out;
}

#########################################################################################
function calIsAuthorsOwnEvent($eid){
    global $db, $calconf;
    $eid = (int)$eid;
    $calIsAdmin = calIsAdmin();
    if (!$calIsAdmin) {return 0; exit;}
    if (!$calconf['AdminEditAll']){
        $qry="SELECT ".$calconf['AdminType'].", radminsuper FROM ".CAL_TABLE_MX_AUTHORS." WHERE aid='$calIsAdmin'";
        $result = $db->sql_query($qry);
        list($CalendarAdmin, $radminsuper) = $db->sql_fetchrow($result);
    } else {
        $radminsuper=0;
    }
    $qry="SELECT aid FROM ".CAL_TABLE_EVENTS." WHERE eid='$eid'";
    $result = $db->sql_query($qry);
    list($aaid) = $db->sql_fetchrow($result);
    if (empty($aaid)) {
        return $calIsAdmin;
    } else if (($radminsuper == 1) || ($calIsAdmin == $aaid) || ($calIsAdmin && $calconf['AdminEditAll'])) {
        #else if (($calIsAdmin == $aaid) || ($calIsAdmin && $calconf['AdminEditAll'])) {
        return $aaid;
    } else {
        return 0;
    }
}

#########################################################################################
function CalendarConfig($ok = 0) {
    global $file_mode, $admin, $db, $bgcolor1, $bgcolor2, $bgcolor3, $admin_file;
    $conffile = CAL_MODULE_PATH.'config/config.php';
    include($conffile);

    if ($ok == 1) {
        $statmsg = _CALCONF1;
    } else if ($ok > 1) {
        $statmsg = _CALCONF2;
    }
    @chmod($conffile, $file_mode);
    if (!is_writable(CAL_MODULE_PATH.'config/config.php')) {
        $statmsg = _CALCONF3.' '.CAL_MODULE_PATH.'config/config.php '._CALCONF4;
    }
    @chmod($conffile, $file_mode);

    $GLOBALS['pagetitle']=_CALCALENDARCONFIG;
    include_once(NUKE_BASE_DIR.'header.php');
    calAdminMenu(_CALCALENDARCONFIG);

    OpenTable();

    if (isset($statmsg)) {
        OpenTable2();
        echo "<blockquote><span class=\"title\"><strong>$statmsg</strong></span></blockquote>";
        CloseTable2();
        echo "<br />";
    }

    echo "<center>"
    ."<form action=\"".$admin_file.".php\" method=\"post\">"
    ."<input type=\"hidden\" name=\"op\" value=\"CalendarConfigSave\">"
    ."<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" style=\"background-color: $bgcolor3;\">"
    ."<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td colspan='2'><strong>"._CALCONFVIEW1."</strong></td></tr>";
    if (defined('MX_VERSION')) {
        echo "<input type='hidden' name='xAdminType' value='radmincalendar'>";
    } else {
        $qry="SELECT * FROM ".CAL_TABLE_MX_AUTHORS." LIMIT 0,1";
        $result = $db->sql_query($qry);
        $radmins = $db->sql_fetchrow($result);
        #foreach($radmins as $key => $value) {
        #    if (substr(strtolower($key),0,6) == 'radmin') {
        #        mxDebugFuncVars($key, $value);
        #        }
        #    }
        echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALADMINTYPE."</td><td style=\"background-color: $bgcolor1;\">";
        echo "<select name=\"xAdminType\">";
        if (isset($radmins['radminarticle'])) {
            echo "<option value=\"radminarticle\" ".(($calconf['AdminType']=="radminarticle") ? "selected" : "").">"._ARTICLES."</option>\n";
        }
        if (isset($radmins['radmintopic'])) {
            echo "<option value=\"radmintopic\" ".(($calconf['AdminType']=="radmintopic") ? "selected" : "").">"._TOPICS."</option>\n";
        }
        if (isset($radmins['radminuser'])) {
            echo "<option value=\"radminuser\" ".(($calconf['AdminType']=="radminuser") ? "selected" : "").">"._USERS."</option>\n";
        }
        if (isset($radmins['radminsurvey'])) {
            echo "<option value=\"radminsurvey\" ".(($calconf['AdminType']=="radminsurvey") ? "selected" : "").">"._SURVEYS."</option>\n";
        }
        if (isset($radmins['radminsection'])) {
            echo "<option value=\"radminsection\" ".(($calconf['AdminType']=="radminsection") ? "selected" : "").">"._SECTIONS."</option>\n";
        }
        if (isset($radmins['radminlink'])) {
            echo "<option value=\"radminlink\" ".(($calconf['AdminType']=="radminlink") ? "selected" : "").">"._WEBLINKS."</option>\n";
        }
        if (isset($radmins['radminephem'])) {
            echo "<option value=\"radminephem\" ".(($calconf['AdminType']=="radminephem") ? "selected" : "").">"._EPHEMERIDS."</option>\n";
        }
        if (isset($radmins['radminfaq'])) {
            echo "<option value=\"radminfaq\" ".(($calconf['AdminType']=="radminfaq") ? "selected" : "").">"._FAQ."</option>\n";
        }
        if (isset($radmins['radmindownload'])) {
            echo "<option value=\"radmindownload\" ".(($calconf['AdminType']=="radmindownload") ? "selected" : "").">"._DOWNLOAD."</option>\n";
        }
        if (isset($radmins['radminreviews'])) {
            echo "<option value=\"radminreviews\" ".(($calconf['AdminType']=="radminreviews") ? "selected" : "").">"._REVIEWS."</option>\n";
        }
        if (isset($radmins['radminnewsletter'])) {
            echo "<option value=\"radminnewsletter\" ".(($calconf['AdminType']=="radminnewsletter") ? "selected" : "").">"._NEWSLETTER."</option>\n";
        }
        if (isset($radmins['radminforum'])) {
            echo "<option value=\"radminforum\" ".(($calconf['AdminType']=="radminforum") ? "selected" : "").">"._BBFORUM."</option>\n";
        }
        if (isset($radmins['radmincontent'])) {
            echo "<option value=\"radmincontent\" ".(($calconf['AdminType']=="radmincontent") ? "selected" : "").">"._CONTENT."</option>\n";
        }
        if (isset($radmins['radminency']))
            echo "<option value=\"radminency\" ".(($calconf['AdminType']=="radminency") ? "selected" : "").">"._ENCYCLOPEDIA."</option>\n";
        echo "<option value=\"radminsuper\" ".(($calconf['AdminType']=="radminsuper") ? "selected" : "").">"._SUPERUSER."</option>\n";
        echo "</select>";
        echo "</td></tr>\n";
    }
    $sel1 = (!empty($calconf['AdminEditAll'])) ? "checked" : "";
    $sel2 = (empty($calconf['AdminEditAll'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALADMINEDITALL."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xAdminEditAll\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xAdminEditAll\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['allowuserpost'])) ? "checked" : "";
    $sel2 = (empty($calconf['allowuserpost']))  ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALPOSTUSERS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xallowuserpost\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xallowuserpost\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['userautoactive'])) ? "checked" : "";
    $sel2 = (empty($calconf['userautoactive']))  ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALUSERSAUTOPOST."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xuserautoactive\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xuserautoactive\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['allowanonpost'])) ? "checked" : "";
    $sel2 = (empty($calconf['allowanonpost']))  ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALPOSTANONYMOUS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xallowanonpost\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xallowanonpost\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['anonautoactive'])) ? "checked" : "";
    $sel2 = (empty($calconf['anonautoactive']))  ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALANONYAUTOPOST."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xanonautoactive\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xanonautoactive\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $xAllowableHTML = implode(", ",$calconf['AllowableHTML']);
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALALLOWABLEHTML."</td><td style=\"background-color: $bgcolor1;\">"
    ."<textarea cols=\"40\" rows=\"5\" name=\"xAllowableHTML\">$xAllowableHTML</textarea>"
    ."</td></tr>\n";

    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td colspan='2'><strong>"._CALCONFVIEW2."</strong></td></tr>";

    //////// Time zone offset for v1.5!!
    /*
    $calconf['caltimezoneoffset'] = (empty($calconf['caltimezoneoffset'])) ? 0 : intval($calconf['caltimezoneoffset']);
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>".'Timezoneoffset'."</td><td style=\"background-color: $bgcolor1;\">"
    ."<select name=\"xcaltimezoneoffset\" style=\"text-align: right;\">"
    .'<option value="-43200" '.(($calconf['caltimezoneoffset']=-43200) ? "selected" : "").'>-12:00</option>'
    .'<option value="-39600" '.(($calconf['caltimezoneoffset']=-39600) ? "selected" : "").'>-11:00</option>'
    .'<option value="-36000" '.(($calconf['caltimezoneoffset']=-36000) ? "selected" : "").'>-10:00</option>'
    .'<option value="-32400" '.(($calconf['caltimezoneoffset']=-32400) ? "selected" : "").'>-09:00</option>'
    .'<option value="-28800" '.(($calconf['caltimezoneoffset']=-28800) ? "selected" : "").'>-08:00</option>'
    .'<option value="-25200" '.(($calconf['caltimezoneoffset']=-25200) ? "selected" : "").'>-07:00</option>'
    .'<option value="-21600" '.(($calconf['caltimezoneoffset']=-21600) ? "selected" : "").'>-06:00</option>'
    .'<option value="-18000" '.(($calconf['caltimezoneoffset']=-18000) ? "selected" : "").'>-05:00</option>'
    .'<option value="-14400" '.(($calconf['caltimezoneoffset']=-14400) ? "selected" : "").'>-04:00</option>'
    .'<option value="-12600" '.(($calconf['caltimezoneoffset']=-12600) ? "selected" : "").'>-03:30</option>'
    .'<option value="-10800" '.(($calconf['caltimezoneoffset']=-10800) ? "selected" : "").'>-03:00</option>'
    .'<option value="-7200" ' .(($calconf['caltimezoneoffset']=-7200)  ? "selected" : "").'>-02:00</option>'
    .'<option value="-3600" ' .(($calconf['caltimezoneoffset']=-3600)  ? "selected" : "").'>-01:00</option>'
    .'<option value="0" '     .(($calconf['caltimezoneoffset']=0)      ? "selected" : "").'> 00:00</option>'
    .'<option value="3600" '  .(($calconf['caltimezoneoffset']=3600)   ? "selected" : "").'>+01:00</option>'
    .'<option value="7200" '  .(($calconf['caltimezoneoffset']=7200)   ? "selected" : "").'>+02:00</option>'
    .'<option value="10800" ' .(($calconf['caltimezoneoffset']=10800)  ? "selected" : "").'>+03:00</option>'
    .'<option value="12600" ' .(($calconf['caltimezoneoffset']=12600)  ? "selected" : "").'>+03:30</option>'
    .'<option value="14400" ' .(($calconf['caltimezoneoffset']=14400)  ? "selected" : "").'>+04:00</option>'
    .'<option value="16200" ' .(($calconf['caltimezoneoffset']=16200)  ? "selected" : "").'>+04:30</option>'
    .'<option value="18000" ' .(($calconf['caltimezoneoffset']=18000)  ? "selected" : "").'>+05:00</option>'
    .'<option value="19800" ' .(($calconf['caltimezoneoffset']=19800)  ? "selected" : "").'>+05:30</option>'
    .'<option value="21600" ' .(($calconf['caltimezoneoffset']=21600)  ? "selected" : "").'>+06:00</option>'
    .'<option value="25200" ' .(($calconf['caltimezoneoffset']=25200)  ? "selected" : "").'>+07:00</option>'
    .'<option value="28800" ' .(($calconf['caltimezoneoffset']=28800)  ? "selected" : "").'>+08:00</option>'
    .'<option value="32400" ' .(($calconf['caltimezoneoffset']=32400)  ? "selected" : "").'>+09:00</option>'
    .'<option value="34200" ' .(($calconf['caltimezoneoffset']=34200)  ? "selected" : "").'>+09:30</option>'
    .'<option value="36000" ' .(($calconf['caltimezoneoffset']=36000)  ? "selected" : "").'>+10:00</option>'
    .'<option value="39600" ' .(($calconf['caltimezoneoffset']=39600)  ? "selected" : "").'>+11:00</option>'
    .'<option value="43200" ' .(($calconf['caltimezoneoffset']=43200)  ? "selected" : "").'>+12:00</option>'
    ."</select>"
    ."</td></tr>\n";
     */

    $sel1 = (!empty($calconf['AdminMenu'])) ? "checked" : "";
    $sel2 = (empty($calconf['AdminMenu'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALADMINMENUSHOW."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xAdminMenu\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xAdminMenu\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($index)) ? "checked" : "";
    $sel2 = (empty($index)) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALINDEX."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xindex\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xindex\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = ($calconf['defaultview']=="list")  ? "selected" : "";
    $sel2 = ($calconf['defaultview']=="month") ? "selected" : "";
    $sel3 = ($calconf['defaultview']=="day")  ? "selected" : "";
    $sel4 = ($calconf['defaultview']=="year") ? "selected" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALDEFAULTVIEW."</td><td style=\"background-color: $bgcolor1;\">"
    ."<select name=\"xdefaultview\">"
    ."<option value=\"list\" $sel1>"._CALLISTLINK."</option>\n"
    ."<option value=\"month\" $sel2>"._CALMONTHLINK."</option>\n"
    ."<option value=\"day\" $sel3>"._CALDAYLINK."</option>\n"
    ."<option value=\"year\" $sel4>"._CALYEARLINK."</option>\n"
    ."</select>"
    ."</td></tr>\n";

    $calconf['searchcount'] = (empty($calconf['searchcount'])) ? 30 : (int)$calconf['searchcount'];
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALSEARCHCOUNT."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"text\" name=\"xsearchcount\" value=\"".$calconf['searchcount']."\" size=\"4\"></td></tr>\n";

    /**** Specific List-View config variables */
    $calconf['listcount'] = (empty($calconf['listcount'])) ? 20 : (int)$calconf['listcount'];
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTCOUNT.":</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"text\" name=\"xlistcount\" value=\"".$calconf['listcount']."\" size=\"4\"></td></tr>\n";

    $sel1 = (!empty($calconf['listStarttime'])) ? "checked" : "";
    $sel2 = (empty($calconf['listStarttime'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTSHOWSTART."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xlistStarttime\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xlistStarttime\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['listEnddate'])) ? "checked" : "";
    $sel2 = (empty($calconf['listEnddate'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTENDDATE."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xlistEnddate\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xlistEnddate\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['listEndtime'])) ? "checked" : "";
    $sel2 = (empty($calconf['listEndtime'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTENDTIME."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xcallistEndtime\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xcallistEndtime\" value=\"0\" $sel2>"._CALNO
    ."&nbsp; "._CALONLYWEN."</td></tr>\n";

    $sel1 = (!empty($calconf['listEnddate2'])) ? "checked" : "";
    $sel2 = (empty($calconf['listEnddate2'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTENDDATE2."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xlistEnddate2\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xlistEnddate2\" value=\"0\" $sel2>"._CALNO
    ."&nbsp; "._CALONLYWEN."</td></tr>\n";

    $sel1 = (!empty($calconf['listBrTime'])) ? "checked" : "";
    $sel2 = (empty($calconf['listBrTime'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTBR."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xlistBrTime\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xlistBrTime\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['listshowlinks'])) ? "checked" : "";
    $sel2 = (empty($calconf['listshowlinks'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALLISTSHOWLINKS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xlistshowlinks\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xlistshowlinks\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['TextEvents'])) ? "checked" : "";
    $sel2 = (empty($calconf['TextEvents'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALTEXTEVENTS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xTextEvents\" value=\"0\" $sel2>"._CALYES." &nbsp;" // ACHTUNG, umgekehrt !!
    ."<input type=\"radio\" name=\"xTextEvents\" value=\"1\" $sel1>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['ShowPopup'])) ? "checked" : "";
    $sel2 = (empty($calconf['ShowPopup'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALSHOWPOPS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xShowPopup\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xShowPopup\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['showlinks'])) ? "checked" : "";
    $sel2 = (empty($calconf['showlinks'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALSHOWLINKS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xshowlinks\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xshowlinks\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $xTimeArray = implode(", ",$calconf['TimeArray']);
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALDAYTIMEARRAY."</td><td style=\"background-color: $bgcolor1;\">"
    ."<textarea cols=\"40\" rows=\"5\" name=\"xTimeArray\">$xTimeArray</textarea>"
    ."</td></tr>\n";

    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALMINUTERANGE."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"text\" name=\"xcalminuterange\" value=\"".$calconf['minuterange']."\" size=\"4\"></td></tr>\n";

    $calconf['catListCols'] = (empty($calconf['catListCols'])) ? 6 : (int)$calconf['catListCols'];
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALMENUROWS2."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"text\" name=\"xcatListCols\" value=\"".$calconf['catListCols']."\" size=\"4\"></td></tr>\n";

    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td colspan='2'><strong>"._CALCONFVIEW3."</strong></td></tr>";

    $sel1 = (!empty($calconf['allowaddarticle'])) ? "checked" : "";
    $sel2 = (empty($calconf['allowaddarticle'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALADDARTICLEBOX."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xallowaddarticle\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xallowaddarticle\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    $sel0 = (empty($calconf['usetopics'])) ? "selected" : "";
    $sel1 = ($calconf['usetopics']==1)     ? "selected" : "";
    $sel2 = ($calconf['usetopics']==2)     ? "selected" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALUSETOPICS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<select name=\"xcalusetopics\">"
    ."<option value=\"0\" $sel0>"._CALNO."</option>\n"
    ."<option value=\"1\" $sel1>"._CALUSETOPICS1."</option>\n"
    ."<option value=\"2\" $sel2>"._CALUSETOPICS2."</option>\n"
    ."</select>"
    ."</td></tr>\n";

    $sel1 = (!empty($calconf['searchTopics'])) ? "checked" : "";
    $sel2 = (empty($calconf['searchTopics'])) ? "checked" : "";
    echo "<tr valign=\"top\" style=\"background-color: $bgcolor2;\"><td>"._CALSEARCHTOPICS."</td><td style=\"background-color: $bgcolor1;\">"
    ."<input type=\"radio\" name=\"xsearchTopics\" value=\"1\" $sel1>"._CALYES." &nbsp;"
    ."<input type=\"radio\" name=\"xsearchTopics\" value=\"0\" $sel2>"._CALNO
    ."</td></tr>\n";

    echo "<tr align=\"center\" style=\"background-color: $bgcolor2;\"><td colspan='2'><input type=\"submit\" value=\""._CALSAVESETT."\"></td></tr>";

    echo "</table>";
    echo "</form>";
    echo "<br /><strong>"._CALMOREOPTIONINF."&nbsp;<i>".CAL_MODULE_PATH."config/configcolors.php</i></strong><br />";
    echo "</center>";

    CloseTable();
    include_once(NUKE_BASE_DIR.'footer.php');
}

#################################################################################################
function CalendarConfigSave($pvs) {
    global $file_mode, $admin_file;
    extract($pvs);
    $conffile = CAL_MODULE_PATH.'config/config.php';
    include($conffile);
    $xindex           = (empty($xindex))           ? 0 : 1;
    $xTextEvents      = (empty($xTextEvents))      ? 0 : 1;
    $xShowPopup       = (empty($xShowPopup))       ? 0 : 1;
    $xdefaultview     = (empty($xdefaultview))     ? "list" : $xdefaultview ;
    $xcalminuterange  = (empty($xcalminuterange))  ? 5 : $xcalminuterange;
    $xcalusetopics    = (empty($xcalusetopics))    ? 0 : $xcalusetopics;
    $xallowaddarticle = (empty($xallowaddarticle)) ? 0 : 1;
    $xallowuserpost   = (empty($xallowuserpost))   ? 0 : 1;
    $xallowanonpost   = (empty($xallowanonpost))   ? 0 : 1;
    $xanonautoactive  = (empty($xanonautoactive))  ? 0 : 1;
    $xuserautoactive  = (empty($xuserautoactive))  ? 0 : 1;
    $xAdminEditAll    = (empty($xAdminEditAll))    ? 0 : 1;
    $xAdminMenu       = (empty($xAdminMenu))       ? 0 : 1;
    $xlistcount       = (empty($xlistcount))       ? 20 : $xlistcount;
    $xlistStarttime   = (empty($xlistStarttime))   ? 0 : 1;
    $xlistEnddate     = (empty($xlistEnddate))     ? 0 : 1;
    $xcallistEndtime  = (empty($xcallistEndtime))  ? 0 : 1;
    $xlistEnddate2    = (empty($xlistEnddate2))    ? 0 : 1;
    $xlistBrTime      = (empty($xlistBrTime))      ? 0 : 1;
    $xshowlinks       = (empty($xshowlinks))       ? 0 : 1;
    $xlistshowlinks   = (empty($xlistshowlinks))       ? 0 : 1;
    $xTimeArray       = (empty($xTimeArray))       ? "" : $xTimeArray;
    $xAllowableHTML   = (empty($xAllowableHTML))   ? "" : $xAllowableHTML;
    $xcatListCols     = (empty($xcatListCols))     ? 6  : $xcatListCols;
    $xsearchcount     = (empty($xsearchcount))     ? 30 : $xsearchcount;
    $xsearchTopics    = (empty($xsearchTopics))    ? 0 : 1;
    if (defined('MX_VERSION')) {
        $xAdminType       = (empty($xAdminType))     ? "radmincalendar" : $xAdminType;
    } else {
        $xAdminType       = (empty($xAdminType))     ? "radminarticle" : $xAdminType;
    }

    $ycalTimeArray = explode(",", $xTimeArray);
    foreach ($ycalTimeArray as $word) {
        $xx = trim($word);
        if (!empty($xx)) {
            $words1[] = "'".trim($word)."'";
        }
    }
    $xTimeArray = "array(".implode(",",$words1).")";

    $ycalAllowableHTML = explode(",", $xAllowableHTML);
    foreach ($ycalAllowableHTML as $word) {
        $xx = trim($word);
        if (!empty($xx)) {
            $words2[] = "'".trim($word)."'";
        }
    }
    $xAllowableHTML = "array(".implode(",",$words2).");";
    $content = "<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/\n\n";
    $content .= "// write with: \$Id: main.php,v 20.25 2004/07/18 14:03:00 EllselAn Exp $\n\n";
    $content .= "/************************************************************************\n";
    $content .= "   Nuke-Evolution: KalenderMx Port\n";
    $content .= "   ============================================\n";
    $content .= "   Copyright (c) 2005 by The Nuke-Evolution Team\n\n";
    $content .= "   Filename      : Generated with main.php\n";
    $content .= "   Author        : See below\n";
    $content .= "   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)\n";
    $content .= "   Version       : 1.4.0c (Based on KalenderMx 1.4b)\n";
    $content .= "   Date          : 06/18/2005 (mm-dd-yyyy)\n\n";
    $content .= "   Description   : Enhanced Calendar module with a lot of nice\n";
    $content .= "                   features.\n";
    $content .= "                   New Abstraction Layer and Nuke 7.6 Administration\n";
    $content .= "                   System.\n";
    $content .= "************************************************************************/\n\n";
    $content .= "/************************************************************************/\n";
    $content .= "/* CalendarMx v".substr(CAL_VERSION.str_repeat(' ',10),0,10)."                                               */\n";
    $content .= "/* ===================                                                  */\n";
    $content .= "/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */\n";
    $content .= "/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */\n";
    $content .= "/*  http://www.pragmamx.org & http://www.shiba-design.de                */\n";
    $content .= "/************************************************************************/\n\n";
    $content .= "if (!defined('CAL_MODULE_NAME')) {\n";
    $content .= "    die ('Illegal File Access');\n";
    $content .= "}\n\n";
    $content .= "\$index = $xindex;\n";
    $content .= "\$calconf['defaultview']     = '$xdefaultview';\n";
    $content .= "\$calconf['minuterange']     = '$xcalminuterange';\n";
    $content .= "\$calconf['usetopics']       = '$xcalusetopics';\n";
    $content .= "\$calconf['searchTopics']    = '$xsearchTopics';\n";
    $content .= "\$calconf['searchcount']     = '$xsearchcount';\n";
    $content .= "\$calconf['allowaddarticle'] = '$xallowaddarticle';\n";
    $content .= "\$calconf['allowuserpost']   = '$xallowuserpost';\n";
    $content .= "\$calconf['userautoactive']  = '$xuserautoactive';\n";
    $content .= "\$calconf['allowanonpost']   = '$xallowanonpost';\n";
    $content .= "\$calconf['anonautoactive']  = '$xanonautoactive';\n";
    $content .= "\$calconf['AdminEditAll']    = '$xAdminEditAll';\n";
    $content .= "\$calconf['AdminMenu']       = '$xAdminMenu';\n";
    $content .= "\$calconf['AdminType']       = '$xAdminType';\n";
    #$content .= "/**** Specific List-View config variables */\n";
    $content .= "\$calconf['listcount']       = '$xlistcount';\n";
    $content .= "\$calconf['listStarttime']   = '$xlistStarttime';\n";
    $content .= "\$calconf['listEnddate']     = '$xlistEnddate';\n";
    $content .= "\$calconf['listEndtime']     = '$xcallistEndtime';\n";
    $content .= "\$calconf['listEnddate2']    = '$xlistEnddate2';\n";
    $content .= "\$calconf['listBrTime']      = '$xlistBrTime';\n";
    $content .= "\$calconf['catListCols']     = '$xcatListCols';\n";
    $content .= "\$calconf['listshowlinks']   = '$xlistshowlinks';\n";
    #$content .= "/**** Specific Month-View config variables */\n";
    $content .= "\$calconf['TextEvents']      = '$xTextEvents';\n";
    $content .= "\$calconf['ShowPopup']       = '$xShowPopup';\n";
    #$content .= "/**** Specific Day-View config variables */\n";
    $content .= "\$calconf['showlinks']       = '$xshowlinks';\n";
    $content .= "\$calconf['TimeArray']       = $xTimeArray;\n";
    #$content .= "/**** Allowable HTML tags in events description */\n";
    $content .= "\$calconf['AllowableHTML']   = $xAllowableHTML\n\n";
    $content .= "?>";
    $ok = 1;
    if (!mxDemoMode()) {
        @chmod($conffile, $file_mode);
        $file = @fopen($conffile, "w");
        if ($file) {
            $ok = @fwrite($file, $content);
            @fclose($file);
            $ok = (int)$ok + 1;
        }
        @chmod($setfile, $file_mode);
    }
    $msg = ($ok>1) ? _CALCONF2 : _CALCONF1;
    calRedirect("".$admin_file.".php?op=CalendarConfig&amp;ok=".$ok."", $msg, 2);
}

/********************************************************/
if (empty($addasarticle)) $addasarticle=0;
if (empty($op)) $op="CalendarAdmin";
switch($op) {
case "errFalsePath":
    die ("<h2>Error!</h2><h5>You must change the constant '\"CAL_MODULE_NAME\"' in file: </h5><p>".__file__."</p>");
    break;
case "errNoAuthorized":
    calErrAdminMsg("<strong>"._CALNOTAUTHORIZED3."</strong><br /><br />"._GOBACK."<br />");
    break;
case "CalendarPreviewEvent":
    CalendarPreviewEvent($_POST);
    break;
case "CalendarPostEventGotoMain":
    $_POST['op'] = 'CalendarPostEvent';
    $_POST['gotomain'] = 1;
    CalendarPostEvent($_POST);
    break;
case "CalendarPostEventGotoCalendar":
    $_POST['op'] = 'CalendarPostEvent';
    $_POST['gotocalendar'] = 1;
    CalendarPostEvent($_POST);
    break;
case "CalendarPostEvent":
    CalendarPostEvent($_POST);
    break;
case "CalendarEditEvent":
    CalendarEditEvent($eid);
    break;
case "CalendarDeleteEvent":
    if (empty($ok)) $ok=0;
    CalendarDeleteEvent($eid, $ok);
    break;
case "CalendarDeactivateEvent":
    CalendarDeactivateEvent($eid);
    break;
case "CalendarConfig":
    if (empty($ok)) $ok = 0;
    CalendarConfig($ok);
    break;
case "CalendarConfigSave":
    CalendarConfigSave($_POST);
    break;
case "CalendarAdmin":
    CalendarSubmissions();
    break;
}

/* CVS-Log:
$Log: main.php,v $
Revision 20.25  2004/07/18 14:03:00  EllselAn
versch. Fehlermeldungen unterdrückt

Revision 20.24  2004/06/10 00:11:21  EllselAn
hmmmm ?

Revision 20.23  2004/05/27 16:12:17  EllselAn
unnötige Kommentare entfernt

Revision 20.22  2004/04/23 01:19:51  EllselAn
mxDemoMode eingebaut und versch. Sortieroptionen optimiert

Revision 20.21  2004/04/18 23:08:09  EllselAn
Fehler in Weiterleitung

Revision 20.20  2004/04/18 22:24:35  EllselAn
Fehler in Weiterleitung

Revision 20.19  2004/04/18 17:49:10  EllselAn
Fehler in Weiterleitung beim speichern von neuem Termin

Revision 20.18  2004/04/15 21:19:35  EllselAn
optische Probleme mit dunklen themes gefixt

Revision 20.17  2004/04/15 16:54:39  EllselAn
neue Option für Konfiguration

Revision 20.16  2004/04/13 23:01:39  EllselAn
überarbeitet, Stand v1.4-Beta1

Revision 20.14  2004/04/10 08:30:39  EllselAn
Erkennung von $admin

Revision 20.13  2004/01/08 22:43:48  EllselAn
popups zum abschalten

Revision 20.12  2004/01/07 22:10:22  EllselAn
weitere Pfadanpassungen und Konstanten umgelagert

Revision 20.11  2004/01/06 23:14:58  EllselAn
Pfade angepasst

Revision 20.10  2004/01/06 21:29:51  EllselAn
falsche revisionsnummer

Revision 1.1  2004/01/06 21:27:45  EllselAn
verschoben admin.inc.php

Revision 20.10  2004/01/05 22:32:39  EllselAn
kleinere Anpassungen

Revision 20.9  2004/01/05 14:16:12  EllselAn
kompatibil. mit original-Nuke verbessert

Revision 20.8  2004/01/04 00:37:30  EllselAn
zusätzliche Optionen

Revision 20.7  2004/01/03 22:58:29  EllselAn
calendar.php umbenannt und verschoben

Revision 20.6  2003/11/16 19:37:49  EllselAn
Versionsnummer...

Revision 20.5  2003/11/16 19:34:33  EllselAn
Versionsnummer...

Revision 20.4  2003/11/16 19:31:38  EllselAn
Versionsnummer...

Revision 20.3  2003/11/16 19:19:35  EllselAn
Kalender etwas überarbeitet,
neuer Header, da neuer Name
kleine Fehler gefixt

Revision 20.2  2003/09/01 14:49:24  EllselAn
function join() / implode() falsch verwendet


 */

?>