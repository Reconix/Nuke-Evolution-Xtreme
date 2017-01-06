<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

if(!defined('NUKE_EVO')) exit;

$modname = "Downloads";
get_lang($modname);

global $prefix, $user_prefix, $db;
$content .= "<img src='images/blocks/uploads.png' height='16' width='16'> <strong>"._DL_UP.":</strong><br />\n";
$result = $db->sql_query("SELECT username, uploads FROM ".$prefix."_downloads_accesses WHERE uploads>0 ORDER BY uploads DESC LIMIT 0,5");
$a = 1;
while(list($uname, $uloads) = $db->sql_fetchrow($result)) {
    $content .= "<strong><big>&middot;</big></strong>&nbsp;$a: <a href='modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname'>$uname</a> ($uloads) "._DL_FILES."<br />";
    $a++;
}
$db->sql_freeresult($result);
$content .= "<hr />\n";
$content .= "<img src='images/blocks/downloads.png' height='16' width='16'> <strong>"._DL_DN.":</strong><br />\n";
$result = $db->sql_query("SELECT username, downloads FROM ".$prefix."_downloads_accesses WHERE downloads>0 ORDER BY downloads DESC LIMIT 0,5");
$a = 1;
while(list($uname, $dloads) = $db->sql_fetchrow($result)) {
    $unum = $db->sql_numrows($db->sql_query("SELECT * FROM ".$user_prefix."_users WHERE username='$uname'"));
    if ($unum==0) { $uname = "Anonymous"; }
    $content .= "<strong><big>&middot;</big></strong>&nbsp;$a: <a href='modules.php?name=Your_Account&amp;op=userinfo&amp;username=$uname'>$uname</a> ($dloads) "._DL_FILES."<br />";
    $a++;
}
$db->sql_freeresult($result);
$content .= "<hr />\n";
$result = $db->sql_query("SELECT hits FROM ".$prefix."_downloads_downloads WHERE active='1'");
$totdld = $db->sql_numrows($result);
while(list($hits) = $db->sql_fetchrow($result)) {
    $total_hits = $total_hits + $hits;
}
$db->sql_freeresult($result);
$content .= "<img src='images/blocks/totals.png' height='16' width='16'> <strong>"._DL_TDN.":</strong><br />\n";
$content .= "$totdld "._DL_FILESDL." $total_hits "._DL_TIMES."<br />";

?>