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
      Evolution Functions                      v1.5.0       12/20/2005
 ************************************************************************/

if (!defined('ADMIN_FILE')) {
   die ('Illegal File Access');
}

global $prefix, $db;
if (is_mod_admin()) {

/*********************************************************/
/* Admin/Authors Functions                               */
/*********************************************************/

function displayadmins() {
    global $admin, $prefix, $db, $language, $multilingual, $admin_file;
    if (is_admin()) {
        include_once(NUKE_BASE_DIR.'header.php');
        OpenTable();
        echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=mod_authors\">" . _AUTHORS_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
        echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _AUTHORS_RETURNMAIN . "</a> ]</div>\n";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo "<center><span class=\"option\"><strong>" . _EDITADMINS . "</strong></span></center><br />"
        ."<table border=\"1\" align=\"center\">";
        $result = $db->sql_query("SELECT aid, name, admlanguage from " . $prefix . "_authors");
        while ($row = $db->sql_fetchrow($result)) {
            $a_aid = $row['aid'];
            $name = $row['name'];
            $admlanguage = $row['admlanguage'];
            $a_aid = substr($a_aid, 0,25);
            $name = substr($name, 0,50);
            echo "<tr><td align=\"center\">$a_aid</td>";
            if (empty($admlanguage)) {
                $admlanguage =  _ALL;
            }
                echo "<td align=\"center\">$admlanguage</td>";
                echo "<td><a href=\"".$admin_file.".php?op=modifyadmin&amp;chng_aid=$a_aid\">" . _MODIFYINFO . "</a></td>";
            if($name=="God") {
                echo "<td>" . _MAINACCOUNT . "</td></tr>";
            } else {
                echo "<td><a href=\"".$admin_file.".php?op=deladmin&amp;del_aid=$a_aid\">" . _DELAUTHOR . "</a></td></tr>";
            }
        }
        echo "</table><br /><center><span class=\"tiny\">" . _GODNOTDEL . "</span></center>";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo "<center><span class=\"option\"><strong>" . _ADDAUTHOR . "</strong></span></center>"
            ."<form action=\"".$admin_file.".php\" method=\"post\" name=\"newauthor\">"
            ."<table border=\"0\">"
            ."<tr><td>" . _NAME . ":</td>"
            ."<td colspan=\"3\"><input type=\"text\" name=\"add_name\" size=\"30\" maxlength=\"50\"> <span class=\"tiny\">" . _REQUIREDNOCHANGE . "</span></td></tr>"
            ."<tr><td>" . _NICKNAME . ":</td>"
            ."<td colspan=\"3\"><input type=\"text\" name=\"add_aid\" size=\"30\" maxlength=\"25\"> <span class=\"tiny\">" . _REQUIRED . "</span></td></tr>"
            ."<tr><td>" . _EMAIL . ":</td>"
            ."<td colspan=\"3\"><input type=\"text\" name=\"add_email\" size=\"30\" maxlength=\"60\"> <span class=\"tiny\">" . _REQUIRED . "</span></td></tr>"
            ."<tr><td>" . _URL . ":</td>"
            ."<td colspan=\"3\"><input type=\"text\" name=\"add_url\" size=\"30\" maxlength=\"60\"></td></tr>";
        if ($multilingual == 1) {
            echo "<tr><td>" . _LANGUAGE . ":</td><td colspan=\"3\">"
                ."<select name=\"add_admlanguage\">";
            $languageslist = lang_list();
            for ($i=0, $maxi = count($languagelist); $i < $maxi; $i++) {
                if(!empty($languageslist[$i])) {
                    echo "<option name='xlanguage' value='".$languageslist[$i]."' ";
                    if($languageslist[$i]==$language) echo "selected";
                    echo ">".ucwords($languageslist[$i])."\n";
                }
            }
            echo "<option value=\"\">" . _ALL . "</option></select></td></tr>";
        } else {
            echo "<input type=\"hidden\" name=\"add_admlanguage\" value=\"\">";
        }
        echo "<tr><td>" . _PERMISSIONS . ":</td>";
        $result = $db->sql_query("SELECT mid, title FROM ".$prefix."_modules ORDER BY title ASC");
        $a = 0;
        while ($row = $db->sql_fetchrow($result)) {
            $title = str_replace("_", " ", $row['title']);
            if (file_exists("modules/".$row['title']."/admin/index.php") AND file_exists("modules/".$row['title']."/admin/links.php") AND file_exists("modules/".$row['title']."/admin/case.php")) {
                echo "<td><input type=\"checkbox\" name=\"auth_modules[]\" value=\"".intval($row['mid'])."\"> $title</td>";
                if ($a == 2) {
                    echo "</tr><tr><td>&nbsp;</td>";
                    $a = 0;
                } else {
                    $a++;
                }
            }
        }
        $db->sql_freeresult($result);
        echo "</tr><tr><td>&nbsp;</td>"
            ."<td><input type=\"checkbox\" name=\"add_radminsuper\" value=\"1\"> <strong>" . _SUPERUSER . "</strong></td>"
            ."</tr>"
            ."<tr><td>&nbsp;</td><td colspan=\"3\"><span class=\"tiny\"><i>" . _SUPERWARNING . "</i></span></td></tr>"
            ."<tr><td>" . _PASSWORD . "</td>"
            ."<td colspan=\"3\"><input type=\"password\" name=\"add_pwd\" size=\"12\" maxlength=\"40\" onkeyup='chkpwd(newauthor.add_pwd.value)' onblur='chkpwd(newauthor.add_pwd.value)' onmouseout='chkpwd(newauthor.add_pwd.value)'> <span class=\"tiny\">" . _REQUIRED . "</span></td></tr>";
/*****[BEGIN]******************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/
        echo "</table><table width='300' cellpadding='2' cellspacing='0' border='1' bgcolor='#EBEBEB' style='border-collapse: collapse;'><tr>"
            ."<td id='td1' width='100' align='center'><div id='div1'></div></td>"
            ."<td id='td2' width='100' align='center'><div id='div2'></div></td>"
            ."<td id='td3' width='100' align='center'><div id='div3'>"._PSM_NOTRATED."</div></td>"
            ."<td id='td4' width='100' align='center'><div id='div4'></div></td>"
            ."<td id='td5' width='100' align='center'><div id='div5'></div></td>"
            ."</tr></table><div id='divTEMP'></div><table border=\"0\"><tr><td>\n";
        echo _PSM_CLICK." <a href=\"javascript:strengthhelp()\">"._PSM_HERE."</a> "._PSM_HELP."</td></tr>";
/*****[END]********************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/
        echo "<input type=\"hidden\" name=\"op\" value=\"AddAuthor\">"
            ."<tr><td><input type=\"submit\" value=\"" . _ADDAUTHOR2 . "\"></td></tr>"
            ."</table></form>";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    } else {
        DisplayError("Unauthorized editing of authors detected<br /><br />"._GOBACK);
    }
}

function modifyadmin($chng_aid) {
    global $admin, $prefix, $db, $multilingual, $admin_file;
    if (is_admin()) {
        include_once(NUKE_BASE_DIR.'header.php');
        OpenTable();
        echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=mod_authors\">" . _AUTHORS_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
        echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _AUTHORS_RETURNMAIN . "</a> ]</div>\n";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo "<center><span class=\"title\"><strong>" . _AUTHORSADMIN . "</strong></span></center>";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo "<center><span class=\"option\"><strong>" . _MODIFYINFO . "</strong></span></center><br /><br />";
        $adm_aid = $chng_aid;
        $adm_aid = trim($adm_aid);
        $row = $db->sql_fetchrow($db->sql_query("SELECT aid, name, url, email, pwd, radminsuper, admlanguage from " . $prefix . "_authors where aid='$chng_aid'"));
        $chng_aid = $row['aid'];
        $chng_name = $row['name'];
        $chng_url = stripslashes($row['url']);
        $chng_email = stripslashes($row['email']);
        $chng_pwd = $row['pwd'];
        $chng_radminsuper = intval($row['radminsuper']);
        $chng_admlanguage = $row['admlanguage'];
        $chng_aid = substr($chng_aid, 0,25);
        $aid = $chng_aid;
        echo "<form action=\"".$admin_file.".php\" method=\"post\" name=\"newauthor\">"
        ."<table border=\"0\">"
        ."<tr><td>" . _NAME . ":</td>"
        ."<td colspan=\"3\"><strong>$chng_name</strong> <input type=\"hidden\" name=\"chng_name\" value=\"$chng_name\"></td></tr>"
        ."<tr><td>" . _NICKNAME . ":</td>"
            ."<td colspan=\"3\"><input type=\"text\" name=\"chng_aid\" value=\"$chng_aid\" size=\"30\" maxlength=\"25\"> <span class=\"tiny\">" . _REQUIRED . "</span></td></tr>"
        ."<tr><td>" . _EMAIL . ":</td>"
        ."<td colspan=\"3\"><input type=\"text\" name=\"chng_email\" value=\"$chng_email\" size=\"30\" maxlength=\"60\"> <span class=\"tiny\">" . _REQUIRED . "</span></td></tr>"
        ."<tr><td>" . _URL . ":</td>"
        ."<td colspan=\"3\"><input type=\"text\" name=\"chng_url\" value=\"$chng_url\" size=\"30\" maxlength=\"60\"></td></tr>";
        if ($multilingual == 1) {
            echo "<tr><td>" . _LANGUAGE . ":</td><td colspan=\"3\">"
                ."<select name=\"chng_admlanguage\">";
            $languageslist = lang_list();
            for ($i=0, $maxi = count($languageslist); $i < $maxi; $i++) {
                if(!empty($languageslist[$i])) {
                    echo "<option name='xlanguage' value='".$languageslist[$i]."' ";
                    if($languageslist[$i]==$language) echo "selected";
                    echo ">".ucwords($languageslist[$i])."\n";
                }
            }
            if (empty($chng_admlanguage)) {
                $allsel = 'selected';
            } else {
                    $allsel = '';
            }
            echo "<option value=\"\" $allsel>" . _ALL . "</option></select></td></tr>";
        } else {
            echo "<input type=\"hidden\" name=\"chng_admlanguage\" value=\"\">";
        }
        echo "<tr><td>" . _PERMISSIONS . ":</td>";
        if ($row['name'] != 'God') {
            $result = $db->sql_query("SELECT mid, title, admins FROM ".$prefix."_modules ORDER BY title ASC");
            while ($row = $db->sql_fetchrow($result)) {
                $title = str_replace("_", " ", $row['title']);
                if (file_exists(NUKE_MODULES_DIR.$row['title'].'/admin/index.php') AND file_exists(NUKE_MODULES_DIR.$row['title'].'/admin/links.php') AND file_exists(NUKE_MODULES_DIR.$row['title'].'/admin/case.php')) {
                    if(!empty($row['admins'])) {
                        $admins = explode(",", $row['admins']);
                        $sel = '';
                        for ($i=0, $maxi=count($admins); $i < $maxi; $i++) {
                            if ($chng_name == $admins[$i]) {
                                $sel = 'checked';
                            }
                        }
                    }
                    echo "<td><input type=\"checkbox\" name=\"auth_modules[]\" value=\"".intval($row['mid'])."\" $sel> $title</td>";
                    $sel = "";
                    if ($a == 2) {
                        echo "</tr><tr><td>&nbsp;</td>";
                        $a = 0;
                    } else {
                        $a++;
                    }
                }
            }
            $db->sql_freeresult($result);
            if ($chng_radminsuper == 1) {
                $sel1 = 'checked';
            }
            echo "</tr><tr><td>&nbsp;</td>";
        } else {
            echo "<input type=\"hidden\" name=\"auth_modules[]\" value=\"\">";
            $sel1 = 'checked';
        }
        echo "<td><input type=\"checkbox\" name=\"chng_radminsuper\" value=\"1\" $sel1> <strong>" . _SUPERUSER . "</strong></td>"
            ."</tr><tr><td>&nbsp;</td>"
            ."<td colspan=\"3\"><span class=\"tiny\"><i>" . _SUPERWARNING . "</i></span></td></tr>"
            ."<tr><td>" . _PASSWORD . ":</td>"
            ."<td colspan=\"3\"><input type=\"password\" name=\"chng_pwd\" size=\"12\" maxlength=\"40\" onkeyup='chkpwd(newauthor.chng_pwd.value)' onblur='chkpwd(newauthor.chng_pwd.value)' onmouseout='chkpwd(newauthor.chng_pwd.value)'></td></tr>";
            echo "<br /><br />";
/*****[BEGIN]******************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/
        echo "</table><table width='300' cellpadding='2' cellspacing='0' border='1' bgcolor='#EBEBEB' style='border-collapse: collapse;'><tr>"
            ."<td id='td1' width='100' align='center'><div id='div1'></div></td>"
            ."<td id='td2' width='100' align='center'><div id='div2'></div></td>"
            ."<td id='td3' width='100' align='center'><div id='div3'>"._PSM_NOTRATED."</div></td>"
            ."<td id='td4' width='100' align='center'><div id='div4'></div></td>"
            ."<td id='td5' width='100' align='center'><div id='div5'></div></td>"
            ."</tr></table><div id='divTEMP'></div><table border=\"0\">";
        echo _PSM_CLICK." <a href=\"javascript:strengthhelp()\">"._PSM_HERE."</a> "._PSM_HELP."";
/*****[END]********************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/
        echo "<br /><br />";
        echo "<tr><td>" . _RETYPEPASSWD . ":</td>"
            ."<td colspan=\"3\"><input type=\"password\" name=\"chng_pwd2\" size=\"12\" maxlength=\"40\"> <span class=\"tiny\">" . _FORCHANGES . "</span></td></tr>"
            ."<input type=\"hidden\" name=\"adm_aid\" value=\"$adm_aid\">"
            ."<input type=\"hidden\" name=\"op\" value=\"UpdateAuthor\">"
            ."<tr><td><input type=\"submit\" value=\"" . _SAVE . "\"> " . _GOBACK . ""
            ."</td></tr></table></form>";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    } else {
        DisplayError("Unauthorized editing of authors detected<br /><br />"._GOBACK);
    }
}

function updateadmin($chng_aid, $chng_name, $chng_email, $chng_url, $chng_radminsuper, $chng_pwd, $chng_pwd2, $chng_admlanguage, $adm_aid, $auth_modules) {
    global $admin, $prefix, $db, $admin_file;
    if (is_admin()) {
        Validate($chng_aid, 'username', 'Modify Authors', 0, 1, 0, 2, 'Nickname:', '<br /><center>'. _GOBACK .'</center>');
        Validate($chng_url, 'url', 'Modify Authors', 0, 0, 0, 0, '', '<br /><center>'. _GOBACK .'</center>');
        Validate($chng_email, 'email', 'Modify Authors', 0, 1, 0, 0, '', '<br /><center>'. _GOBACK .'</center>');
        if (!empty($chng_pwd2)) {
            Validate($chng_pwd, '', 'Modify Authors', 0, 1, 0, 2, 'password', '<br /><center>'. _GOBACK .'</center>');
            if($chng_pwd != $chng_pwd2) {
                DisplayError(_PASSWDNOMATCH . "<br /><br /><center>" . _GOBACK . "</center>");
            }
/*****[BEGIN]******************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
            $chng_pwd = md5($chng_pwd);
/*****[END]********************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
            $chng_aid = substr($chng_aid, 0,25);
            if ($chng_radminsuper == 1) {
                $result = $db->sql_query("SELECT mid, admins FROM ".$prefix."_modules");
                while ($row = $db->sql_fetchrow($result)) {
                    $admins = explode(",", $row['admins']);
                    $adm = '';
                    for ($a=0, $maxi=count($admins); $a < $maxi; $a++) {
                        if ($admins[$a] != $chng_name && !empty($admins[$a])) {
                            $adm .= $admins[$a].',';
                        }
                    }
                    $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm' WHERE mid='".intval($row['mid'])."'");
                }
                $db->sql_query("update " . $prefix . "_authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminsuper='$chng_radminsuper', pwd='$chng_pwd', admlanguage='$chng_admlanguage' where name='$chng_name' AND aid='$adm_aid'");
                if ($adm_aid == $chng_aid) {
                    redirect($admin_file.".php?op=logout");
                } else {
                    redirect($admin_file.".php?op=mod_authors");
                }
            } else {
                if ($chng_name != 'God') {
                      $db->sql_query("update " . $prefix . "_authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminsuper='0', pwd='$chng_pwd', admlanguage='$chng_admlanguage' where name='$chng_name' AND aid='$adm_aid'");
                }
                $result = $db->sql_query("SELECT mid, admins FROM ".$prefix."_modules");
                while ($row = $db->sql_fetchrow($result)) {
                    $admins = explode(",", $row['admins']);
                    $adm = '';
                    for ($a=0, $maxa = count($admins); $a < $maxa; $a++) {
                        if ($admins[$a] != $chng_name && !empty($admins[$a])) {
                            $adm .= $admins[$a].',';
                        }
                    }
                    $db->sql_query("UPDATE ".$prefix."_authors SET radminsuper='$chng_radminsuper' WHERE name='$chng_name' AND aid='$adm_aid'");
                    $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm' WHERE mid='".intval($row['mid'])."'");
                }
                for ($i=0, $maxi=count($auth_modules); $i < $maxi; $i++) {
                    $row = $db->sql_fetchrow($db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE mid='".intval($auth_modules[$i])."'"));
                    if(!empty($row['admins'])) {
                        $admins = explode(",", $row['admins']);
                        for ($a=0, $maxa = count($admins); $a < $maxa; $a++) {
                            if ($admins[$a] == $chng_name) {
                                $dummy = 1;
                            }
                        }
                    }
                    if ($dummy != 1) {
                        $adm = $row['admins'].$chng_name;
                        $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm,' WHERE mid='".intval($auth_modules[$i])."'");
                    }
                    $dummy = '';
                }
                redirect($admin_file.".php?op=mod_authors");
            }
        } else {
            if ($chng_radminsuper == 1) {
                $result = $db->sql_query("SELECT mid, admins FROM ".$prefix."_modules");
                while ($row = $db->sql_fetchrow($result)) {
                    $admins = explode(",", $row['admins']);
                    $adm = '';
                    for ($a=0, $maxa = count($admins); $a < $maxa; $a++) {
                        if ($admins[$a] != $chng_name && !empty($admins[$a])) {
                            $adm .= $admins[$a].',';
                        }
                    }
                    $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm' WHERE mid='".intval($row['mid'])."'");
                }
                $db->sql_query("update " . $prefix . "_authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminsuper='$chng_radminsuper', admlanguage='$chng_admlanguage' where name='$chng_name' AND aid='$adm_aid'");
                redirect($admin_file.".php?op=mod_authors");
            } else {
                if ($chng_name != 'God') {
                        $db->sql_query("update " . $prefix . "_authors set aid='$chng_aid', email='$chng_email', url='$chng_url', radminsuper='0', admlanguage='$chng_admlanguage' where name='$chng_name' AND aid='$adm_aid'");
                }
                $result = $db->sql_query("SELECT mid, admins FROM ".$prefix."_modules");
                while ($row = $db->sql_fetchrow($result)) {
                    $admins = explode(",", $row['admins']);
                    $adm = '';
                    for ($a=0, $maxa = count($admins); $a < $maxa; $a++) {
                        if ($admins[$a] != $chng_name && !empty($admins[$a])) {
                            $adm .= $admins[$a].',';
                        }
                    }
                    $db->sql_query("UPDATE ".$prefix."_authors SET radminsuper='$chng_radminsuper' WHERE name='$chng_name' AND aid='$adm_aid'");
                    $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm' WHERE mid='".intval($row['mid'])."'");
                }
                for ($i=0, $maxi=count($auth_modules); $i < $maxi; $i++) {
                    $row = $db->sql_fetchrow($db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE mid='".intval($auth_modules[$i])."'"));
                    if(!empty($row['admins'])) {
                        $admins = explode(",", $row['admins']);
                        for ($a=0, $maxa=count($admins); $a < $maxa; $a++) {
                            if ($admins[$a] == $chng_name) {
                                $dummy = 1;
                            }
                        }
                    }
                    if ($dummy != 1) {
                        $adm = $row['admins'].$chng_name;
                        $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm,' WHERE mid='".intval($auth_modules[$i])."'");
                    }
                    $dummy = '';
                }
                redirect($admin_file.'.php?op=mod_authors');
            }
        }
        if ($adm_aid != $chng_aid) {
            $result2 = $db->sql_query("SELECT sid, aid, informant from " . $prefix . "_stories where aid='$adm_aid'");
            while ($row2 = $db->sql_fetchrow($result2)) {
                $sid = intval($row2['sid']);
                $old_aid = $row2['aid'];
                $old_aid = substr($old_aid, 0,25);
                $informant = $row2['informant'];
                $informant = substr($informant, 0,25);
                if ($old_aid == $informant) {
                    $db->sql_query("update " . $prefix . "_stories set informant='$chng_aid' where sid='$sid'");
                }
                $db->sql_query("update " . $prefix . "_stories set aid='$chng_aid' WHERE sid='$sid'");
            }
        }
    } else {
        DisplayError("Unauthorized editing of authors detected<br /><br />"._GOBACK);
    }
}

function deladmin2($del_aid) {
    global $admin, $prefix, $db, $admin_file;
    if (is_admin()) {
        $del_aid = substr($del_aid, 0,25);
        $result = $db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE title='News'");
        $row2 = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_authors WHERE aid='$del_aid'"));
        while ($row = $db->sql_fetchrow($result)) {
            $admins = explode(",", $row['admins']);
            $auth_user = 0;
            for ($i=0, $maxi=count($admins); $i < $maxi; $i++) {
                if ($row2['name'] == $admins[$i]) {
                    $auth_user = 1;
                }
            }
            if ($auth_user == 1) {
                $radminarticle = 1;
            }
        }
        $db->sql_freeresult($result);
        if ($radminarticle == 1) {
            $row2 = $db->sql_fetchrow($db->sql_query("SELECT sid from " . $prefix . "_stories where aid='$del_aid'"));
            $sid = intval($row2['sid']);
            if (!empty($sid)) {
                include_once(NUKE_BASE_DIR.'header.php');
                OpenTable();
                echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=mod_authors\">" . _AUTHORS_ADMIN_HEADER . "</a></div>\n";
                echo "<br /><br />";
                echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _AUTHORS_RETURNMAIN . "</a> ]</div>\n";
                CloseTable();
                echo "<br />";
                OpenTable();
                echo "<center><span class=\"title\"><strong>" . _AUTHORSADMIN . "</strong></span></center>";
                CloseTable();
                echo "<br />";
                OpenTable();
                echo "<center><span class=\"option\"><strong>" . _PUBLISHEDSTORIES . "</strong></span><br /><br />"
                    ."" . _SELECTNEWADMIN . ":<br /><br />";
                $result3 = $db->sql_query("SELECT aid from " . $prefix . "_authors where aid!='$del_aid'");
                echo "<form action=\"".$admin_file.".php\" method=\"post\"><select name=\"newaid\">";
                while ($row3 = $db->sql_fetchrow($result3)) {
                    $oaid = $row3['aid'];
                    $oaid = substr($oaid, 0,25);
                    echo "<option name=\"newaid\" value=\"$oaid\">$oaid</option>";
                }
                $db->sql_freeresult($result3);
                echo "</select><input type=\"hidden\" name=\"del_aid\" value=\"$del_aid\">"
                    ."<input type=\"hidden\" name=\"op\" value=\"assignstories\">"
                    ."<input type=\"submit\" value=\"" . _OK . "\">"
                    ."</form>";
                CloseTable();
                include_once(NUKE_BASE_DIR.'footer.php');
                return;
            }
        }
        redirect($admin_file.".php?op=deladminconf&del_aid=$del_aid");
    } else {
        DisplayError("Unauthorized editing of authors detected<br /><br />"._GOBACK);
    }
}

if($add_aid != $_POST['add_aid']) {
    die('Illegal Variable');
}
if($add_name != $_POST['add_name']) {
    die('Illegal Variable');
}

switch ($op) {

    case "mod_authors":
        displayadmins();
    break;

    case "modifyadmin":
        modifyadmin($chng_aid);
    break;

    case "UpdateAuthor":
        echo $chng_aid;
        updateadmin($chng_aid, $chng_name, $chng_email, $chng_url, $chng_radminsuper, $chng_pwd, $chng_pwd2, $chng_admlanguage, $adm_aid, $auth_modules);
    break;

    case "AddAuthor":
        global $admin_file;

        $add_aid = substr($add_aid, 0,25);
        $add_name = substr($add_name, 0,25);
        Validate($add_aid, 'username', 'Add Authors', 0, 1, 0, 2, 'Nickname:', '<br /><center>'. _GOBACK .'</center>');
        Validate($add_name, 'username', 'Add Authors', 0, 1, 0, 2, 'Name:', '<br /><center>'. _GOBACK .'</center>');
        Validate($add_url, 'url', 'Add Authors', 0, 0, 0, 0, '', '<br /><center>'. _GOBACK .'</center>');
        Validate($add_email, 'email', 'Add Authors', 0, 1, 0, 0, '', '<br /><center>'. _GOBACK .'</center>');
        Validate($add_pwd, '', 'Add Authors', 0, 1, 0, 2, 'password', '<br /><center>'. _GOBACK .'</center>');
/*****[BEGIN]******************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
        $add_pwd = md5($add_pwd);
/*****[END]********************************************
 [ Base:     Evolution Functions               v1.5.0 ]
 ******************************************************/
        for ($i=0,$maxi=count($auth_modules); $i < $maxi; $i++) {
            $row = $db->sql_fetchrow($db->sql_query("SELECT admins FROM ".$prefix."_modules WHERE mid='".intval($auth_modules[$i])."'"));
            $adm = $row['admins'] . $add_name;
            $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm,' WHERE mid='".intval($auth_modules[$i])."'");
        }
        $result = $db->sql_query("insert into " . $prefix . "_authors values ('$add_aid', '$add_name', '$add_url', '$add_email', '$add_pwd', '0', '$add_radminsuper', '$add_admlanguage')");
        if (!$result) {
            redirect($admin_file.".php");
        }
        $db->sql_freeresult($result);
        redirect($admin_file.".php?op=mod_authors");
    break;

    case "deladmin":
        include_once(NUKE_BASE_DIR.'header.php');
        $del_aid = trim($del_aid);
        OpenTable();
        echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=mod_authors\">" . _AUTHORS_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
        echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _AUTHORS_RETURNMAIN . "</a> ]</div>\n";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo "<center><span class=\"title\"><strong>" . _AUTHORSADMIN . "</strong></span></center>";
        CloseTable();
        echo "<br />";
        OpenTable();
        echo "<center><span class=\"option\"><strong>" . _AUTHORDEL . "</strong></span><br /><br />"
            ."" . _AUTHORDELSURE . " <i>$del_aid</i>?<br /><br />";
        echo "[ <a href=\"".$admin_file.".php?op=deladmin2&amp;del_aid=$del_aid\">" . _YES . "</a> | <a href=\"".$admin_file.".php?op=mod_authors\">" . _NO . "</a> ]";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
    break;

    case "deladmin2":
        deladmin2($del_aid);
    break;

    case "assignstories":
        $del_aid = trim($del_aid);
        $result = $db->sql_query("SELECT sid from " . $prefix . "_stories where aid='$del_aid'");
        while ($row = $db->sql_fetchrow($result)) {
            $sid = intval($row['sid']);
            $db->sql_query("update " . $prefix . "_stories set aid='$newaid', informant='$newaid' where aid='$del_aid'");
            $db->sql_query("update " . $prefix . "_authors set counter=counter+1 where aid='$newaid'");
        }
        $db->sql_freeresult($result);
        redirect($admin_file.".php?op=deladminconf&del_aid=$del_aid");
    break;

    case "deladminconf":
        $del_aid = trim($del_aid);
        $db->sql_query("delete from " . $prefix . "_authors where aid='$del_aid' AND name!='God'");
        $result = $db->sql_query("SELECT mid, admins FROM ".$prefix."_modules");
        while ($row = $db->sql_fetchrow($result)) {
            $admins = explode(",", $row['admins']);
               $adm = "";
               for ($a=0, $maxa=count($admins); $a < $maxa; $a++) {
                if ($admins[$a] != $del_aid && !empty($admins[$a])) {
                    $adm .= $admins[$a].',';
                   }
               }
            $db->sql_query("UPDATE ".$prefix."_modules SET admins='$adm' WHERE mid='".intval($row['mid'])."'");
        }
        $db->sql_freeresult($result);
        redirect($admin_file.".php?op=mod_authors");
    break;

}

} else {
    echo "Access Denied";
}

?>