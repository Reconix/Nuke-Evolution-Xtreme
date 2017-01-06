<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: install.php,v 20.18.4.1 2005/02/16 18:54:30 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : install.php
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
/* KalenderMx v1.4.b                                                    */
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

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting (E_ALL ^ E_NOTICE);
#error_reporting (E_ALL);

//require_once('mainfile.php');

include_once(CAL_MODULE_PATH.'config/config.php');
include_once(CAL_MODULE_PATH.'includes/functions.php');

global $admin_file;

define('CAL_TABLE_EVENTS_Q',CAL_TABLE_EVENTS.'_queue');
define('CAL_INSTALL_LINK',$admin_file.'.php?op=CalSetup');

get_lang(CAL_MODULE_NAME);

#########################################################################################
function calinstheader() {
    include_once(NUKE_BASE_DIR.'header.php');
    title(_CALNAME."-Setup, Version ".CAL_VERSION."");
    OpenTable();
}

#########################################################################################
function calinstfooter() {
    echo "<div align='right' class='tiny'>id: ".$_REQUEST['instid']."</div>";
    CloseTable();
    include_once(NUKE_BASE_DIR.'footer.php');
    exit;
}

#########################################################################################
// show install page
function calInstallStart() {
    global $db;
    $_REQUEST['instid'] = date("Y_m_d_h_i_s");
    $version = 0;
    $qufound = 0;
    $result=$db->sql_query("SHOW TABLES;");
    while(list($tablename) = $db->sql_fetchrow($result)){
        #print "<br />$tablename";
        if (CAL_TABLE_EVENTS === $tablename) {
            $qry = "SHOW COLUMNS FROM `".CAL_TABLE_EVENTS."`;";
            $result1 = $db->sql_query($qry);
            while ($row = $db->sql_fetchrow($result1, SQL_ASSOC)) {
                $fields[$row['Field']] = $row['Type'];
            }
        } else if (CAL_TABLE_EVENTS_Q === $tablename) {
            $result2 = $db->sql_query("SELECT COUNT(qid) FROM ".CAL_TABLE_EVENTS_Q."");
            list($qufound) = $db->sql_fetchrow($result2);
        }
    }
    if (isset($fields)) {
        $version = detectOldVersion($fields);
        if ($version == "1.3") {
            $msg = "The table structure of ".CAL_TABLE_EVENTS." is already up-to-date, <br />you DO NOT need to update.";
            $mode = 'adminmenu';
        } else if ($version == "1.0" || $version == "1.1" || $version == "1.2") {
            $msg = "The table structure of ".CAL_TABLE_EVENTS." uses version ".$version.", update is needed. <br /><br />The data also will be stored in the table '".CAL_TABLE_EVENTS."_".$_REQUEST['instid']."'.";
            if ($qufound) $msg .= "<br /><br />".$qufound." avaliable data sets in the table '".CAL_TABLE_EVENTS_Q."' will be imported and marked as 'new'.";
            $mode = 'update';
        } else if ($version == "x") {
            $msg = "The table structure of ".CAL_TABLE_EVENTS." IS NOT auf dem aktuellen Stand but an automatically update CAN NOT be done with the existing structure. <br /><br />The existing table will be renamed to '".CAL_TABLE_EVENTS."_".$_REQUEST['instid']."' and you a new table created. <br /><br />Existing data can be later imported manually.<br /><br /><input type='checkbox' name='csample' value='1'>&nbsp;import additional examples";
            $mode = 'noautoup';
        }
    } else {
        $msg = "The table ".CAL_TABLE_EVENTS." IS NOT available, the setup will create it now.<br />";
        $msg .= "<br /><input type='checkbox' name='csample' value='1'>&nbsp;import additional event examples";
        $mode = 'newinstall';
    }

    calinstheader();
    #echo "Welcome and thanks for your interest in the cool CalendarMx<br />Before you can use CalendarMx setup below settings.";
    echo "<form action='".CAL_INSTALL_LINK."' method='post'>
    <br /><br />".$msg."<br /><br />
    <!-- <div align='center'> -->
    <input type='hidden' name='instid' value='".$_REQUEST['instid']."'>
    <input type='hidden' name='qufound' value='".$qufound."'>
    <input type='hidden' name='mode' value='".$mode."'>
    <input type='hidden' name='oldver' value='".$version."'>
    <input type='submit' value='Continue'>
    <!-- </div> -->
    </form>";
    calinstfooter();
    }

#########################################################################################
function newinstall($mode) {
    global $prefix, $db;
    $sql = array();
    if ($mode == 'noautoup') {
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` RENAME `".CAL_TABLE_EVENTS."_".$_REQUEST['instid']."`;";
    }

    $sql[] ="CREATE TABLE `".CAL_TABLE_EVENTS."` (
    `eid` int(11) NOT NULL auto_increment,
    `aid` varchar(25) NOT NULL,
    `title` varchar(150) NOT NULL,
    `posteddate` datetime NOT NULL,
    `hometext` text,
    `topic` int(3) NOT NULL default '1',
    `informant` varchar(25) NOT NULL,
    `startDate` date NOT NULL,
    `endDate` date NOT NULL,
    `startTime` time default NULL,
    `endTime` time default NULL,
    `alldayevent` int(1) NOT NULL default '0',
    `categorie` char(2) default NULL,
    `activ` tinyint(1) NOT NULL default '0',
    PRIMARY KEY  (`eid`)
    );";
    $sql = getCorrects($sql);
    $sql = getBlocks($sql); /// Change blocks

    if (!empty($_POST['csample'])) {
        // Add sample file
        #mxDebugFuncVars($_POST);
        #mxDebugFuncVars($sql);
        if (is_array($GLOBALS['admin'])) {
            $yadmin = $GLOBALS['admin'];
        } else {
            $xadmin = base64_decode($GLOBALS['admin']);
            $yadmin = explode(":", $xadmin);
        }
        $xaid = (empty($yadmin[0])) ? "" : $yadmin[0];

        define("_queryspacer","||##||##||");
        $sqlfile = file(CAL_MODULE_PATH.'sql/sampledata.sql');
        $lines = "";
        foreach($sqlfile as $line) {
            $line = trim($line);
            if(!empty($line) && substr($line,0,1)!="#") {
                if (strrchr($line, ";") == ";") $line .= _queryspacer;
                $lines .= $line;
            }
        }
        $lines = trim($lines);
        $lines =  str_replace("INSERT INTO nuke_events",  "INSERT INTO ".CAL_TABLE_EVENTS, $lines);
        $lines =  str_replace("INSERT INTO mx_events",    "INSERT INTO ".CAL_TABLE_EVENTS, $lines);
        $lines =  str_replace("INSERT INTO `nuke_events", "INSERT INTO `".CAL_TABLE_EVENTS, $lines);
        $lines =  str_replace("INSERT INTO `mx_events",   "INSERT INTO `".CAL_TABLE_EVENTS, $lines);
        $lines =  str_replace('xxxcxxx', $xaid, $lines);
        $insertsql = explode(_queryspacer, $lines);
        $sql = array_merge($sql, $insertsql);
    }
    $msg = "";
    foreach($sql as $i => $qry) {
        if (!empty($qry)) {
            $stat = ($db->sql_query($qry)) ? '<strong>ok</strong>' : '<span color="#FF0000" style="color: Red;">error</span>';
            $statms = ($stat=='<strong>ok</strong>') ? $qry : $qry.'<br /><span color="#FF0000" style="color: Red;"><strong>'.mysql_error().'</strong></span>';
            $msg .= "<tr><td>".($i+1)."</td><td>".$statms."</td><td>".$stat."</td></tr>";
        }
    }
    $msg2 = "The below SQL queries have just been executed. <br /><br />";
    if (checknewtable()) {
        $msg2  .= "<strong>The calendar tables are up-to-date now</strong>. <br />In the case of error message, you can ignore them.";
    } else {
        $msg2 .= "<strong>There have some errors occured</strong>.<br />The calendar table could not be created or created properly. Please note down the error and contact us at our support forum (<a href='http://www.maax-design.de/' target='_blank'>http://www.maax-design.de</a>).";
    }
    calinstheader();
    echo "<form action='".CAL_INSTALL_LINK."' method='post'>
    <br />".$msg2."<br /><br />
    <input type='hidden' name='instid' value='".$_REQUEST['instid']."'>
    <input type='hidden' name='mode' value='adminmenu'>
    <input type='submit' value='Continue'>
    </form>
    <br /><br /><table border='1' cellspacing='0' cellpadding='1'>".$msg."</table><br /><br />";
    calinstfooter();
}

#########################################################################################
function checknewtable() {
    global $db;
    $qry = "SHOW COLUMNS FROM `".CAL_TABLE_EVENTS."`;";
    $result1 = $db->sql_query($qry);
    while ($row = $db->sql_fetchrow($result1, SQL_ASSOC)){
        $fields[$row['Field']] = $row['Type'];
    }
    $version = detectOldVersion($fields);
    return ($version == "1.3");
}

#########################################################################################
function update() {
    global $db;
    if (!function_exists("calGetOldColors")) include_once(CAL_MODULE_PATH.'includes/functions.php');
    $qufound = (empty($_REQUEST['qufound'])) ? 0 : $_REQUEST['qufound'];
    $sql = array();

    list($tname, $tcreate) = $db->sql_fetchrow($db->sql_query("SHOW CREATE TABLE `".CAL_TABLE_EVENTS."`;"));
    $newname = CAL_TABLE_EVENTS."_".$_REQUEST['instid'];
    $tcreate = str_replace(CAL_TABLE_EVENTS,$newname,$tcreate);
    $sql[] = $tcreate;
    $sql[] = "INSERT INTO `".$newname."` SELECT * FROM `".CAL_TABLE_EVENTS."` ";

    if ($_REQUEST['oldver'] < "1.2") {
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `eid` `eid` INT( 11 ) NOT NULL AUTO_INCREMENT;";
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `eventDate` `startDate` DATE NOT NULL;";
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `barcolor` `categorie` CHAR( 2 );";
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `time` `posteddate` DATETIME NOT NULL;";
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD `activ` TINYINT( 1 ) DEFAULT '0' NOT NULL;";

        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` DROP `comments`;";
        $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` DROP `counter`;";
        }

    $sql = getCorrects($sql); // alle Felder nochmal überarbeiten und Indexe neu setzen
    $sql = getBlocks($sql);

    if ($_REQUEST['oldver'] < "1.2") {
        if ($qufound) {
            $qry = "SELECT uname, title, story, timestamp, topic, eventDate, endDate, startTime, endTime, alldayevent, barcolor FROM ".CAL_TABLE_EVENTS_Q."";
            $result = $db->sql_query($qry);
            while (list($uname, $title, $hometext, $posteddate, $topic, $startDate, $endDate, $startTime, $endTime, $alldayevent, $categorie) = $db->sql_fetchrow($result)) {
                $sql[] ="
                INSERT INTO ".CAL_TABLE_EVENTS." SET 
                title       ='".calAddSlashes($title)."',
                hometext    ='".calAddSlashes($hometext)."',
                posteddate  ='$posteddate',
                topic       ='$topic',
                informant   ='".calAddSlashes($uname)."',
                startDate   ='$startDate',
                endDate     ='$endDate',
                startTime   ='$startTime',
                endTime     ='$endTime',
                alldayevent ='$alldayevent',
                categorie   ='".calGetOldColors($categorie)."',
                activ       = 0
                ;";
                }
            $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS_Q."` RENAME `".CAL_TABLE_EVENTS_Q."_".$_REQUEST['instid']."`;";
            }
        $sql[] ="UPDATE `".CAL_TABLE_EVENTS."` SET activ = 0 WHERE aid IS NULL OR aid = '';";
        $sql[] ="UPDATE `".CAL_TABLE_EVENTS."` SET activ = 1 WHERE aid IS NOT NULL AND aid <> '';";
        $sql[] ="UPDATE `".CAL_TABLE_EVENTS."` SET posteddate = `startDate` WHERE posteddate IS NULL OR posteddate = '' OR posteddate = '0000-00-00 00:00:00';";
        }

    // Update categories
    $points = calGetEventpoints();
    foreach($points as $point => $val) {
        $sql[] = "UPDATE `".CAL_TABLE_EVENTS."` SET categorie = ".$point." WHERE categorie = '".calSetOldColors($point)."';";
    }

    $sql[] ="OPTIMIZE TABLE `".CAL_TABLE_EVENTS."`;";

    $msg = "";
    foreach($sql as $i => $qry) {
        if (!empty($qry)) {
            $stat = ($db->sql_query($qry)) ? '<strong>ok</strong>' : '<span color="#FF0000" style="color: Red;">error</span>';
            $statms = ($stat=='<strong>ok</strong>') ? $qry : $qry.'<br /><span color="#FF0000" style="color: Red;"><strong>'.mysql_error().'</strong></span>';
            $msg .= "<tr><td>".($i+1)."</td><td>".$statms."</td><td>".$stat."</td></tr>";
        }
    }
    $msg2 = "The below SQL queries have just been executed. <br /><br />";
    if (checknewtable()) {
        $msg2  .= "<strong>The calendar tables are up-to-date now</strong>. <br />In the case of error message, you can ignore them.";
    } else {
        $msg2 .= "<strong>There have some errors occured</strong>.<br />The calendar table could not be created or created properly. Please note down the error and contact us at our support forum (<a href='http://www.maax-design.de/' target='_blank'>http://www.maax-design.de</a>).";
    }
    calinstheader();
    echo "<form action='".CAL_INSTALL_LINK."' method='post'>
    <br />".$msg2."<br /><br />
    <input type='hidden' name='instid' value='".$_REQUEST['instid']."'>
    <input type='hidden' name='mode' value='adminmenu'>
    <input type='submit' value='Continue'>
    </form>
    <br /><br /><table border='1' cellspacing='0' cellpadding='1'>".$msg."</table><br /><br />";
    calinstfooter();
}

#########################################################################################
function getBlocks($sql) {
    global $prefix, $db;
    /// Blöcke ändern
    $sql[] = "UPDATE `${prefix}_blocks` SET `active`=0 WHERE (`blockfile` like 'block-Calendar%')";
    $posfield = (CAL_CMS_VERSION == '65') ? 'bposition' : 'position';
    $reblocks = $db->sql_query("SELECT blockfile FROM `${prefix}_blocks` WHERE (`blockfile` like 'block-Calendar%')");
    while (list($blockfiles[]) = $db->sql_fetchrow($reblocks));
    if (!in_array('block-Calendar_list.php',$blockfiles))
        $sql[] = "INSERT INTO `${prefix}_blocks` SET `blockfile` = 'block-Calendar_list.php', `title` = '"._CALNAME."', `".$posfield."` = 'l', `active` = '0', `view` = '2';";
    if (!in_array('block-Calendar_centerlist.php',$blockfiles))
        $sql[] = "INSERT INTO `${prefix}_blocks` SET `blockfile` = 'block-Calendar_centerlist.php', `title` = '"._CALNAME."', `".$posfield."` = 'c', `active` = '0', `view` = '2';";
    if (!in_array('block-Calendar_centerlist_scroll.php',$blockfiles))
        $sql[] = "INSERT INTO `${prefix}_blocks` SET `blockfile` = 'block-Calendar_centerlist_scroll.php', `title` = '"._CALNAME."', `".$posfield."` = 'c', `active` = '0', `view` = '2';";
    if (!in_array('block-Calendar_combi.php',$blockfiles))
        $sql[] = "INSERT INTO `${prefix}_blocks` SET `blockfile` = 'block-Calendar_combi.php', `title` = '"._CALNAME."', `".$posfield."` = 'l', `active` = '0', `view` = '2';";
    if (!in_array('block-Calendar_month.php',$blockfiles) && !in_array('block-Calendar.php',$blockfiles))
        $sql[] = "INSERT INTO `${prefix}_blocks` SET `blockfile` = 'block-Calendar_month.php', `title` = '"._CALNAME."', `".$posfield."` = 'l', `active` = '0', `view` = '2';";
    if (in_array('block-Calendar.php',$blockfiles))
        $sql[] = "UPDATE `${prefix}_blocks` SET `blockfile` = 'block-Calendar_month.php' WHERE `blockfile` = 'block-Calendar.php';";
    return $sql;
    }

#########################################################################################
function getCorrects($sql) {
    global $prefix;
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` DROP PRIMARY KEY , ADD PRIMARY KEY ( `eid` );"; 

    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `eid` `eid` int(11) NOT NULL auto_increment;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `aid` `aid` varchar(25) NOT NULL;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `title` `title` varchar(150) NOT NULL;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `posteddate` `posteddate` datetime NOT NULL;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `hometext` `hometext` TEXT;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `topic` `topic` int(3) NOT NULL default '1';";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `informant` `informant` varchar(25) NOT NULL;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `startDate` `startDate` date NOT NULL;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `endDate` `endDate` date NOT NULL;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `startTime` `startTime` time;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `endTime` `endTime` time;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `alldayevent` `alldayevent` int(1) NOT NULL default '0';";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `categorie` `categorie` char(2);";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` CHANGE `activ` `activ` tinyint(1) NOT NULL default '0';";

    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD INDEX topic ( `topic` );"; 
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD INDEX categorie ( `categorie` );"; 
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD INDEX title ( `title` );"; 
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD INDEX activ ( `activ` );"; 
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD INDEX `evbegin` ( `startDate` , `startTime` );"; 
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD INDEX `evtime` ( `startTime`, `endTime` );";

    #$sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` ADD FULLTEXT KEY searching (title,hometext,informant,plz,ort);";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` TYPE = MYISAM;";
    $sql[] ="ALTER TABLE `".CAL_TABLE_EVENTS."` PACK_KEYS = 1;";

    return $sql;
}

#########################################################################################
function detectOldVersion($fields) {
    #mxDebugFuncVars($fields); // @ dev's: bei Tabellenänderung, einfach wieder dieses Array anzeigen lassen
    $olderr = error_reporting();
    error_reporting(0);
    #error_reporting(E_ALL);
    $version = 0;

    if ($fields['eid'] == 'int(11)'
        && $fields['aid'] == 'varchar(25)'
        && $fields['title'] == 'varchar(150)'
        && $fields['posteddate'] == 'datetime'
        && $fields['hometext'] == 'text'
        && $fields['topic'] == 'int(3)'
        && $fields['informant'] == 'varchar(25)'
        && $fields['startDate'] == 'date'
        && $fields['endDate'] == 'date'
        && $fields['startTime'] == 'time'
        && $fields['endTime'] == 'time'
        && $fields['alldayevent'] == 'int(1)'
        && $fields['categorie'] == 'char(2)'
        && $fields['activ'] == 'tinyint(1)'
        ) $version = "1.3";
    else if ($fields['eid'] == 'int(11)'
        && $fields['aid'] == 'varchar(30)'
        && $fields['title'] == 'varchar(150)'
        && $fields['posteddate'] == 'datetime'
        && $fields['hometext'] == 'text'
        && $fields['topic'] == 'int(3)'
        && $fields['informant'] == 'varchar(20)'
        && $fields['startDate'] == 'date'
        && $fields['endDate'] == 'date'
        && $fields['startTime'] == 'time'
        && $fields['endTime'] == 'time'
        && $fields['alldayevent'] == 'int(1)'
        && $fields['categorie'] == 'char(2)'
        && $fields['activ'] == 'tinyint(1)'
        ) $version = "1.2";
    else if ($fields['eid'] == 'bigint(20)'
        && $fields['aid'] == 'varchar(30)'
        && $fields['title'] == 'varchar(150)'
        && $fields['time'] == 'datetime'
        && $fields['hometext'] == 'text'
        && $fields['comments'] == 'int(11)'
        && $fields['counter'] == 'mediumint(8) unsigned'
        && $fields['topic'] == 'int(3)'
        && $fields['informant'] == 'varchar(20)'
        && $fields['eventDate'] == 'date'
        && $fields['endDate'] == 'date'
        && $fields['startTime'] == 'time'
        && $fields['endTime'] == 'time'
        && $fields['alldayevent'] == 'int(1)'
        && $fields['barcolor'] == 'char(1)'
        ) $version = "1.1"; 
    else if ($fields['eid'] == 'bigint(20)'
        && $fields['aid'] == 'varchar(30)'
        && $fields['title'] == 'varchar(150)'
        && $fields['time'] == 'datetime'
        && $fields['hometext'] == 'blob'
        && $fields['comments'] == 'int(11)'
        && $fields['counter'] == 'mediumint(8) unsigned'
        && $fields['topic'] == 'int(3)'
        && $fields['informant'] == 'varchar(20)'
        && $fields['eventDate'] == 'date'
        && $fields['endDate'] == 'date'
        && $fields['startTime'] == 'time'
        && $fields['endTime'] == 'time'
        && $fields['alldayevent'] == 'int(1)'
        && $fields['barcolor'] == 'char(1)'
        ) $version = "1.0"; 
    else $version = "x";
    error_reporting($olderr);
    #print $version;
    return $version;
}


#########################################################################################

// check if user has access
if (!calIsAdmin()) {
    calinstheader();
    echo "You don't have permission to access this file!<br /><br /><a href='".$admin_file.".php'>Login as Calendar-Admin</a>";
    calinstfooter();
}

$mode = (isset($_REQUEST['mode'])) ? $_REQUEST['mode'] : "installstart";
switch($mode) {
    case "installstart":
        calInstallStart();
        exit;
    case "newinstall":
        newinstall($mode);
        exit;
    case "noautoup":
        newinstall($mode);
        exit;
    case "update":
        update();
        exit;
    case "adminmenu":
        calRedirect($admin_file.'.php?op=CalendarConfig');
        exit;
    default:
        calInstallStart();
        exit;
}

?>