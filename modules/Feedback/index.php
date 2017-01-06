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
/* Based on php Addon Feedback 1.0                                      */
/* Copyright (c) 2001 by Jack Kozbial                                   */
/* http://www.InternetIntl.com                                          */
/* jack@internetintl.com                                                */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (!defined('MODULE_FILE')) {
   die('You can\'t access this file directly...');
}
$module_name = basename(dirname(__FILE__));
get_lang($module_name);

$subject = $sitename." "._FEEDBACK;

include_once(NUKE_BASE_DIR.'header.php');

if (!isset($opi) || ($opi != 'ds')) {
  $intcookie = intval($cookie[0]);
  if (!empty($cookie[1])) {
    $sql = "SELECT name, username, user_email FROM ".$user_prefix."_users WHERE user_id='".$intcookie."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    if (!empty($row['name'])) {
      $sender_name = $row['name'];
    } else {
      $sender_name = $row['username'];
    }
    $sender_email = $row['user_email'];
  } else {
    $sender_email = "";
    $sender_name = "";
  }
}

if (!isset($message)) { $message = ''; }
if (!isset($opi)) { $opi = ''; }
if (!isset($send)) { $send = ''; }

$form_block = "<div class=\"nuketitle\">$sitename: "._FEEDBACKTITLE."</div>\n";
$form_block .= "<br /><br /><span class=\"content\">"._FEEDBACKNOTE."</span><br /><br />\n";
$form_block .= "<form onsubmit=\"this.submit.disabled='true'\" method=\"post\" action=\"modules.php?name=$module_name\"\n>";
$form_block .= "<div class=\"textbold\">"._YOURNAME.":</div>";
$form_block .= "<input type=\"text\" name=\"sender_name\" value=\"$sender_name\" size=\"30\"><br /><br />";
$form_block .= "<div class=\"textbold\">"._YOUREMAIL.":</div>";
$form_block .= "<input type=\"text\" name=\"sender_email\" value=\"$sender_email\" size=\"30\"><br /><br />";
$form_block .= "<div class=\"textbold\">"._MESSAGE.":</div class=\"textbold\">";
$form_block .= "<textarea name=\"message\" cols=\"50\" rows=\"10\" style=\"wrap:virtual\">$message</textarea><br /><br />";
$form_block .= "<table>".security_code(array(7), 'normal', 1)."</table>";
$form_block .= "<input type=\"hidden\" name=\"opi\" value=\"ds\">";
$form_block .= "<input type=\"submit\" name=\"submit\" value=\""._SEND."\"><br />";
$form_block .= "</form></div>";

OpenTable();

if ($opi != 'ds') {
    echo $form_block;
} else {
/*****[BEGIN]******************************************
 [ Mod:    Advanced Security Code Control      v1.0.0 ]
 ******************************************************/
    if (!security_code_check($_POST['gfx_check'], 'force')) {
        echo '<div class="texterrorcenter">'._GFX_FAILURE.'</div>';
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
        exit;
    }
/*****[END]********************************************
 [ Mod:    Advanced Security Code Control      v1.0.0 ]
 ******************************************************/
    $send = true;
    if (empty($sender_name)) {
        $name_err = "<div align=\"center\"><span class=\"option\"><strong><em>"._FBENTERNAME."</em></strong></span></div><br />";
        $send = false;
    }
    if (!Validate($sender_email, 'email', $module_name, 1)) {
        $email_err = "<div align=\"center\"><span class=\"option\"><strong><em>"._FBENTEREMAIL."</em></strong></span></div><br />";
        $send = false;
    }
    if (empty($message)) {
        $message_err = "<div align=\"center\"><span class=\"option\"><strong><em>"._FBENTERMESSAGE."</em></span></font></div><br />";
        $send = false;
    }

    if ($send) {
        global $nsnst_const;
        $sender_name = Remove_Slashes(removecrlf($sender_name));
        $sender_email = Remove_Slashes(removecrlf($sender_email));
        $message = Remove_Slashes($message);
        $msg = $sitename."\n\n";
        $msg .= _SENDERNAME.": $sender_name\n";
        $msg .= _SENDEREMAIL.": $sender_email\n";
        $msg .= _MESSAGE.": $message\n\n";
        $msg .= "IP: ".$nsnst_const['remote_ip']."\n\n";
        $to = $adminmail;
        $mailheaders = "From: $sender_name <$sender_email>\r\n";
        $mailheaders .= "Reply-To: $sender_email\r\nX-Mailer: PHP/" . phpversion();
        evo_mail($to, $subject, $msg, $mailheaders);
        echo "<div align=\"center\"><p>"._FBMAILSENT."</p></div>";
        echo "<div align=\"center\"><p>"._FBTHANKSFORCONTACT."</p></div>";
    } elseif (!$send) {
        OpenTable2();
        if (!empty($name_err)) { echo $name_err; }
        if (!empty($email_err)) {echo $email_err; }
        if (!empty($message_err)) {echo $message_err; }
        CloseTable2();
        echo "<br /><br />";
        echo $form_block;
    }
}

CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>