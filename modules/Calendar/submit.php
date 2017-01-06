<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: submit.php,v 20.14 2004/04/18 22:23:36 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : submit.php
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

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       10/01/2005
 ************************************************************************/

if (!defined('MODULE_FILE')) {
   die ("You can't access this file directly...");
}

define('CAL_MODULE_NAME',basename(dirname(__FILE__)));
define('CAL_MODULE_PATH','modules/'.CAL_MODULE_NAME.'/');

if (!isset($calconf)) {
    @include(CAL_MODULE_PATH.'config/config.php');
}

if (!defined('CAL_TABLE_EVENTS')) {
    @include_once(CAL_MODULE_PATH.'includes/functions.php');
}

get_lang(CAL_MODULE_NAME);

#########################################################################################
function calSubmitStart($gvs) {
    global $calconf;
    $user = (isset($GLOBALS['user'])) ? $GLOBALS['user'] : "";
    if (is_user()) {
        $cookie = cookiedecode();
        $event['informant'] = $cookie[1];
    } else {
        $event['informant'] = $GLOBALS['anonymous'];
    }
    if (calIsPostAllowed()) {
        $sd = Date("Y-m-d");
        if (isset($gvs['sd'])) {
            if (preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $gvs['sd'], $tmp)) {
                $sd = $tmp[1].'-'.$tmp[2].'-'.$tmp[3];
            }
        }
        preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $sd, $tmp);
        $event['aid']       = calIsAdmin();
        $event['topic']     = 0;
        $event['categorie'] = 0;
        $event['title']     = "";
        $event['hometext']  = "";
        $event['startDate'] = $sd;
        $event['startTime'] = $calconf['TimeArray'][0]; #"09:00:00";
        $event['endDate']   = $sd;
        $event['endTime']   = $calconf['TimeArray'][2]; #"10:00:00";
        $event['op']        = ($event['aid']) ? "CalendarNewEvent" : "newEvent";
        $GLOBALS['pagetitle'] = _CALSUBMITNAME;
        if (empty($GLOBALS['header'])) include_once(NUKE_BASE_DIR.'header.php');
        if (calIsAdmin()) {
            calAdminMenu(_CALSUBMITNAME);
        } else {
            calBuildModusselectors('calSubmitStart', $tmp[3], $tmp[2], $tmp[1]);
            title(_CALSUBMITNAME);
        }
        calSubmitForm($event);
        include_once(NUKE_BASE_DIR.'footer.php');
    } else {
        calRedirect(CAL_MOD_USERLOGIN, _CALPLSLOGIN, 1);
    }
}

#########################################################################################
function calNewEventPreview($event) { # post
    global $calconf, $user;
    $event = calStripSlashes($event);
    $GLOBALS['pagetitle']=_CALNEWSUBPREVIEW;
    if (empty($GLOBALS['header'])) include_once(NUKE_BASE_DIR.'header.php');
    if (calIsAdmin()) {
        calAdminMenu(_CALNEWSUBPREVIEW);
    } else {
        calBuildModusselectors($event['op'], $event['startDay'], $event['startMonth'], $event['startYear']);
        title(_CALNEWSUBPREVIEW);
    }
    OpenTable();
    echo "<center><i>"._CALSTORYLOOK."</i></center>";
    CloseTable();
    echo "<br />";
    calEventView($event);
    calSubmitForm($event);
    include_once(NUKE_BASE_DIR.'footer.php');
}

#########################################################################################
function calNewEventSubmit($event) { # post
    global $db, $calconf, $user;
    $event = calPrepareEventForSql($event);
    $qry = calGetSqlQuery($event, "insert");
    $result = $db->sql_query($qry);
    if ($result) {
        if ($event['addasarticle']) {
            calAddArticle($event);
        }
        calRedirect(CAL_MODULE_LINK."&amp;file=submit&amp;op=calSubmitThanks&amp;sd=".$event['startDate'], _CALTHANKSSUB, 1);
    } else {
        calErrAdminMsg(_CALERRSQLERROR);
    }
}

#########################################################################################
function calSubmitThanks($gvs) {
    global $db, $calconf;
    $sd = Date("Y-m-d");
    if (isset($gvs['sd'])) {
        if (preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $gvs['sd'], $tmp)) {
            $sd = $tmp[1].'-'.$tmp[2].'-'.$tmp[3];
        }
    }
    preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/", $sd, $date);
    $qry="SELECT COUNT(eid) FROM ".CAL_TABLE_EVENTS." WHERE activ=0";
    $result = $db->sql_query($qry);
    list($waiting) = $db->sql_fetchrow($result);
    $user = (isset($GLOBALS['user'])) ? $GLOBALS['user'] : "";
    if (is_user()) {
        $autoactive = (empty($calconf['userautoactive'])) ? 0 : 1;
    } else {
        $autoactive = (empty($calconf['anonautoactive'])) ? 0 : 1;
    }
    $msg = (calIsAdmin() || $autoactive) ? _CALSUBTEXTADMIN : _CALSUBTEXT;
    $GLOBALS['pagetitle']=_CALNAME;
    if (empty($GLOBALS['header'])) include_once(NUKE_BASE_DIR.'header.php');
    if (calIsAdmin()) {
        calAdminMenu(_CALNAME);
    } else {
        title(_CALNAME);
    }
    OpenTable();
    echo "<center>"._CALSUBSENT."<br /><br /><span class=\"title\"><strong>"._CALTHANKSSUB."</strong></span><br />";
    echo "<br />$msg<br /><br />"._CALWEHAVESUB." $waiting "._CALWAITING."</center>";
    CloseTable();
    echo "<br />";
    calBuildModusselectors("", $date[3], $date[2], $date[1]); # 4/23/2002
    include_once(NUKE_BASE_DIR.'footer.php');
}

#########################################################################################
function checkpost() {
    $pattern = '#(\<(img|i?frame|object|embed|i?layer|script|link)[^\>]+([[:space:]]{0,})(src|rel)([[:space:]]{0,})?=([^\>]+)?admin\.php\?[^\>]+\>)|(\[img\](.+)?(admin\.php\?).+?\[/img\])#si';
    if (isset($_POST['startDay'])) { $_POST['startDay'] = intval($_POST['startDay']); }
    if (isset($_POST['startMonth'])) { $_POST['startMonth'] = intval($_POST['startMonth']); }
    if (isset($_POST['startYear'])) { $_POST['startYear'] = intval($_POST['startYear']); }
    if (isset($_POST['startHour'])) { $_POST['startHour'] = intval($_POST['startHour']); }
    if (isset($_POST['startMin'])) { $_POST['startMin'] = intval($_POST['startMin']); }
    if (isset($_POST['endDay'])) { $_POST['endDay'] = intval($_POST['endDay']); }
    if (isset($_POST['endMonth'])) { $_POST['endMonth'] = intval($_POST['endMonth']); }
    if (isset($_POST['endYear'])) { $_POST['endYear'] = intval($_POST['endYear']); }
    if (isset($_POST['endHour'])) { $_POST['endHour'] = intval($_POST['endHour']); }
    if (isset($_POST['endMin'])) { $_POST['endMin'] = intval($_POST['endMin']); }
    if (isset($_POST['categorie'])) { $_POST['categorie'] =  intval($_POST['categorie']); }
    if (isset($_POST['activ'])) { $_POST['activ'] = intval($_POST['activ']); }
    if (isset($_POST['eid'])) { $_POST['eid'] = intval($_POST['eid']); }
    if (isset($_POST['informant'])) { $_POST['informant'] = substr(strip_tags($_POST['informant']),0,25); }
    if (isset($_POST['aid'])) { $_POST['aid'] = substr(strip_tags($_POST['aid']),0,25); }
    if (isset($_POST['posteddate'])) {
        if (!preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/", $_POST['posteddate'])) {
            $_POST['posteddate'] = sprintf ("%04d-%02d-%02d %02d:%02d:00", Date("Y"), Date("m"), Date("d"), Date("H"), Date("i"));
        }
    }
    if (isset($_POST['title'])) {
        $_POST['title'] = substr(strip_tags($_POST['title']),0,150);
    }
    if (isset($_POST['hometext'])) {
        $_POST['hometext'] = strip_tags($_POST['hometext'],calGetAllowedtags());
        if (preg_match($pattern, $_POST['hometext'])) $_POST['hometext'] = '';
    }
    return $_POST;
}

#########################################################################################

$op = (isset($_REQUEST['op'])) ? $_REQUEST['op'] : "";

switch($op) {
    case "calNewEventPreview":
        calNewEventPreview(checkpost($_POST));
        break;
    case "calNewEventSubmit":
        calNewEventSubmit(checkpost($_POST));
        break;
    case "calSubmitThanks":
        calSubmitThanks($_GET);
        break;
    default:
        calSubmitStart($_GET);
        break;
}

?>