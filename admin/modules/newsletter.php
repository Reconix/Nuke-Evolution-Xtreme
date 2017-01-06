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

if (!defined('ADMIN_FILE')) {
   die ("Illegal File Access");
}

global $prefix, $db, $admin_file, $currentlang;
if (is_mod_admin()) {
    if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
        $eol = "\r\n";
    } elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
        $eol = "\r";
    } else {
        $eol = "\n";
    }

    function newsletter_selection($fieldname, $current) {
        static $groups;
        if (!isset($groups)) {
            global $db, $prefix;
            $groups = array(0=>_NL_ALLUSERS, 1=>_SUBSCRIBEDUSERS, 2=>_NL_ADMINS);
            $groupsResult = $db->sql_query("SELECT group_id, group_name FROM ".$prefix."_bbgroups WHERE group_single_user=0");
            while (list($groupID, $groupName) = $db->sql_fetchrow($groupsResult, SQL_NUM)) {
                $groups[($groupID+2)] = $groupName;
            }
        }
        $tmpgroups = $groups;
        return select_box($fieldname, $current, $tmpgroups);
    }

    $subject = isset($_POST['subject']) ? Remove_Slashes($_POST['subject']) : '';
    $mailcontent = isset($_POST['mailcontent']) ? $_POST['mailcontent'] : '';
    $group = isset($_POST['group']) ? intval($_POST['group']) : 1;

    if (isset($_POST['discard'])) {
        redirect($admin_file.'.php?op=newsletter');
    } elseif (isset($_POST['send'])) {
        global $aid;
        $row = $db->sql_ufetchrow('SELECT `adminmail` FROM `'.$prefix.'_config');
        $admin_email = $row[0];
        $admin_name = $aid;
        $headers = '';
        # Common Headers
        $headers .= 'From: '.$admin_name.' <'.$admin_email.'>'.$eol;
        $headers .= 'Reply-To: '.$admin_name.' <'.$admin_email.'>'.$eol;
        $headers .= 'Return-Path: '.$admin_name.' <'.$admin_email.'>'.$eol;    // these two to set reply address
        //$headers .= "Message-ID: <TheSystem@".$_SERVER['SERVER_NAME'].">".$eol;
        $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
        # Boundry for marking the split & Multitype Headers
        $mime_boundary=md5(time());
        $headers .= 'MIME-Version: 1.0'.$eol;
        //$headers .= "Content-Type: multipart/related; boundary=\"".$mime_boundary."\"".$eol;
        $headers .= "Content-type: text/html; charset="._CHARSET." ".$eol;
        $subject = $_POST['subject'];
        $n_group = (is_numeric($_POST['n_group'])) ? (int)$_POST['n_group'] : 0;
        if (empty($subject)) { DisplayError(sprintf(_ERROR_NOT_SET, _SUBJECT)); }
        if (empty($mailcontent)) { DisplayError(sprintf(_ERROR_NOT_SET, _MAILCONTENT)); }
        $mailcontent = Remove_Slashes($mailcontent);
        ignore_user_abort(true);
        if ($n_group == 0) {
            $query = "SELECT username, user_email FROM ".$user_prefix."_users WHERE user_level > 0 AND user_id > 1";
        } elseif ($n_group == 2) {
            $query = "SELECT aid, email FROM ".$prefix."_authors";
        } elseif ($n_group > 2) {
            $n_group -= 2;
            $query = "SELECT u.username, u.user_email FROM ".$user_prefix."_users u, ".$prefix."_bbuser_group g WHERE u.user_level>0 AND g.group_id=$n_group AND u.user_id = g.user_id AND user_pending=0";
        } else {
            $query = "SELECT username, user_email FROM ".$user_prefix."_users WHERE user_level > 0 AND user_id > 1 AND newsletter=1";
        }
        $mailcontent = _HELLO.",<br /><br /> $mailcontent $eol $eol"._NL_REGARDS.",<br /><br />$sitename "._STAFF."<br /><br />"._NLUNSUBSCRIBE;
        $recipients = array();
        $result = $db->sql_query($query, true);
        set_time_limit(0);
        while (list($u_name, $u_email) = $db->sql_fetchrow($result, SQL_NUM)) {
            $recipients[$u_name] = $u_email;
        }
        if (empty($recipients) || count($recipients) < 1) {
            DisplayError('0 '._NL_RECIPS, _NEWSLETTER);
        }
         evo_mail(evo_mail_batch($recipients), $subject, $mailcontent, $headers, '', true);
         DisplayError(_NEWSLETTERSENT);
    }

    $title = _NEWSLETTER;
    $preview = $notes = $submit = '';
    if (isset($_POST['preview'])) {
        $title .= ' '._PREVIEW;
        if (empty($subject)) { DisplayError(sprintf(_ERROR_NOT_SET, _SUBJECT)); }
        if (empty($mailcontent)) { DisplayError(sprintf(_ERROR_NOT_SET, _MAILCONTENT)); }
        if ($group == 0) {
            list($num_users) = $db->sql_fetchrow($db->sql_query('SELECT COUNT(*) FROM '.$user_prefix.'_users WHERE user_level > 0 AND user_id > 1'));
            $group_name = strtolower(_NL_ALLUSERS);
        } elseif ($group == 2) {
            list($num_users) = $db->sql_fetchrow($db->sql_query('SELECT COUNT(*) FROM '.$prefix.'_authors'));
            $group_name = strtolower(_NL_ADMINS);
        } elseif ($group > 2) {
            $group_id = $group-2;
            list($num_users) = $db->sql_fetchrow($db->sql_query('SELECT COUNT(*) FROM '.$prefix.'_bbuser_group WHERE group_id="'.$group_id.'" AND user_pending="0"'));
            list($group_name) = $db->sql_ufetchrow("SELECT group_name FROM ".$prefix."_bbgroups WHERE group_id=$group_id", SQL_NUM);
        } else {
            list($num_users) = $db->sql_fetchrow($db->sql_query('SELECT COUNT(*) FROM '.$user_prefix.'_users WHERE user_level > 0 AND newsletter="1"'));
            $group_name = strtolower(_SUBSCRIBEDUSERS);
        }
        $status = '';
        if ($num_users < 1) { $status = ' disabled="disabled"'; }
        if ($num_users > 500) {
            $notes = '<tr><td align="center" class="row1" colspan="2">'._MANYUSERSNOTE.'</td></tr>';
        } elseif ($num_users < 1) {
            $notes = '<tr><td align="center" class="row1" colspan="2">'._NL_NOUSERS.'</td></tr>';
        }
        $preview = '<tr>
        <td class="row1" colspan="2">
        <span style="float: left">'._MUSERGROUPWILLRECEIVE.'<strong>'.$group_name.'</strong></span>
        <span style="float: right"><strong>'.$num_users.'</strong> '._NUSERWILLRECEIVE.'</span><br />
        <hr />
        <span class="gen">'.$mailcontent.'</span>
        <hr />
        </td>
        </tr>';
        $submit = ' &nbsp;
        <input type="submit" name="send" value="'._SEND.'&nbsp;'._NEWSLETTER.'" class="mainoption"'.$status.' /> &nbsp;
        <input type="submit" name="discard" value="'._DISCARD.'" class="liteoption" />
        <input type="hidden" name="n_group" value="'.$group.'" />';
    }

    include_once(NUKE_BASE_DIR.'header.php');
    OpenTable();
    echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=newsletter\">" . _NEWSLETTER_ADMIN_HEADER . "</a></div>\n";
    echo "<br /><br />";
    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _NEWSLETTER_RETURNMAIN . "</a> ]</div>\n";
    CloseTable();
    echo "<br />";
    OpenTable();
    echo '<form name="newsletter" action="'.$admin_file.'.php?op=newsletter" method="post">
    <table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline" align="center">
    <tr>
        <td align="center" class="catleft" colspan="2"><strong><span class="gen">'.$title.'</span></strong></td>
    </tr>'.$preview.'<tr>
        <td class="row1"><span class="gen">'._SUBJECT.'</span></td>
        <td class="row2"><input type="text" name="subject" size="50" maxlength="255" value="'.htmlspecialchars($subject).'" /></td>
    </tr><tr>
        <td class="row1"><span class="gen">'._MAILCONTENT.'</span></td>
        <td class="row2">';
    Make_TextArea('mailcontent', $mailcontent, 'newsletter');
    echo '</td>
    </tr><tr>
        <td class="row1"><span class="gen">'._NL_RECIPS.'</span></td>
        <td class="row2">'.newsletter_selection('group', $group).'</td>
    </tr>'.$notes.'<tr>
        <td class="catbottom" colspan="2" align="center" height="28">
        <input type="submit" name="preview" value="'._PREVIEW.'" class="mainoption" />'.$submit.'
        </td>
    </tr></table></form>';
    CloseTable();
    include_once(NUKE_BASE_DIR.'footer.php');

} else {
    echo "Access Denied";
}

?>