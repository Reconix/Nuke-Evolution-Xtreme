<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Content Management System
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : adminlog.php
   Author        : Technocrat (www.nuke-evolution.com)
   Version       : 1.0.1
   Date          : 06/08/2005 (dd-mm-yyyy)

   Notes         : Admin Tracker stores failed admin logins.
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Admin Tracker                            v1.0.1       06/08/2005
      Caching System                           v1.0.0       10/31/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
    die ('Illegal File Access');
}

global $prefix, $db, $admdata;

//Clear log is fine you have to be an admin to gain access to it

$log = ($_GET['log']) ? $_GET['log'] : die("Invalid Operation");

if (is_mod_admin()) {

    @include_once(NUKE_ADMIN_DIR.'language/custom/lang-'.$currentlang.'.php');

    function view_log($file) {
        global $admin_file;
        echo "<strong><center><font size='3'>"._ADMIN_LOG."</font></strong></center><br /><br />";
        $filename = NUKE_INCLUDE_DIR."log/" . $file . ".log";
        if(!is_file($filename)) {
            echo "<center><strong><span style='color:red'>"._ADMIN_LOG_ERRFND."</span></strong></center>";
            return;
        }
        if(filesize($filename) == 0) {
            echo "<strong>"._TRACKER_HEAD_DATE."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._TRACKER_HEAD_TIME."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._TRACKER_HEAD_IP."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._TRACKER_HEAD_MSG."</strong><br />";
            echo "<br /><br /><strong><a href='".$admin_file.".php'>Back</a></strong>";
            echo "<br /><strong><a href='".$admin_file.".php?op=adminlog_clear&log=" . $file . "'><span style=\"color:red\">"._TRACKER_CLEAR."</span></a></strong>";
            return;
        }
        if($handle = @fopen($filename,"r")) {
            $content = @fread($handle, filesize($filename));
            @fclose($handle);
        }
        $content = nl2br($content);
        echo "<strong>"._TRACKER_HEAD_DATE."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._TRACKER_HEAD_TIME."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._TRACKER_HEAD_IP."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"._TRACKER_HEAD_MSG."</strong><br />";
        echo $content;
        echo "<br /><br /><strong><a href='".$admin_file.".php'>Back</a></strong>";
        echo "<br /><strong><a href='".$admin_file.".php?op=adminlog_clear&log=" . $file . "'><span style=\"color:red\">"._TRACKER_CLEAR."</span></a></strong>";
    }

    function log_ack($file) {
        global $db, $prefix, $admin_file, $cache;
        echo "<center>";
        echo "<strong><font size='3'>" . _ADMIN_LOG . "</font></strong><br /><br />";
        $filename = NUKE_INCLUDE_DIR."log/" . $file . ".log";
        if(!is_file($filename)) {
            echo "<center><strong><span style='color:red'>"._ADMIN_LOG_ERRFND."</span></strong></center>";
        } else {
            if(!$handle = @fopen($filename,"r")) {
                echo _TRACKER_ERR_OPEN;
            } else {
                $content = @fread($handle, filesize($filename));
                @fclose($handle);
                $file_num = substr_count($content, "\n");
                $sql_log = "UPDATE ".$prefix."_config SET " . $file . "_log_lines='".$file_num."'";
                if($db->sql_query($sql_log)) {
                    echo _TRACKER_UP;
                } else {
                    echo _TRACKER_ERR_UP;
                }
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        $cache->delete('nukeconfig');
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
            }
        }
        redirect($admin_file . '.php');
        //echo "<br /><br /><strong><a href='".$admin_file.".php'>"._TRACKER_BACK."</a></strong>";
        // echo "</center>";
        return;
    }

    function log_clear($file) {
        global $db, $prefix, $admin_file, $cache;

        echo "<center>";
        echo "<strong><font size='3'>" . _TRACKER_CLEARED . "</font></strong><br /><br />";
        $filename = NUKE_INCLUDE_DIR."log/" . $file . ".log";
        if(!is_file($filename)) {
            echo "<center><strong><span style='color:red'>"._ADMIN_LOG_ERRFND."</span></strong></center>";
        } else {
            if(!$handle = fopen($filename,"w")) {
                echo _TRACKER_ERR_OPEN;
            } else {
                fwrite($handle, "");
                fclose($handle);
                $sql_log = "UPDATE ".$prefix."_config SET " . $file . "_log_lines='0'";
                if(!$db->sql_query($sql_log)) {
                   die(mysql_error());
                }
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
                $cache->delete('nukeconfig');
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
            }
        }
        echo "<br /><br /><strong><a href='".$admin_file.".php'>"._TRACKER_BACK."</a></strong>";
        echo "</center>";
    }

    if ($admdata['radminsuper'] == 1) {
        include_once(NUKE_BASE_DIR.'header.php');
        OpenTable();
        switch ($op) {
            case "viewadminlog":
                view_log($log);
            break;
            case "adminlog_ack":
                log_ack($log);
            break;
            case "adminlog_clear":
                log_clear($log);
            break;
        }
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    }

} else {
    echo 'Access Denied';
}

?>