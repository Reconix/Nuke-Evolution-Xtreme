<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : MostPopular.php
   Author        : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 11.21.2005 (mm.dd.yyyy)

   Notes         : Advanced Downloads module with BBGroups Integration
                   based on NSN GR Downloads.
************************************************************************/

/********************************************************/
/* Based on NSN GR Downloads                            */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('IN_DOWNLOADS')) {
  exit('Access Denied');
}

if ($dl_config['mostpopulartrig'] == 1) {
  $pagetitle = "- "._MOSTPOPULAR." ".$dl_config['mostpopular']."%";
} else {
  $pagetitle = "- "._MOSTPOPULAR." ".$dl_config['mostpopular']."";
}
include_once(NUKE_BASE_DIR.'header.php');
menu(1);
echo "<br />";
OpenTable();
echo "<table border='0' width='100%'><tr><td align='center'>\n";
if ($ratenum != "" && $ratetype != "") {
  $dl_config['mostpopular'] = $ratenum;
  if ($ratetype == "percent") $dl_config['mostpopulartrig'] = 1;
}
if ($dl_config['mostpopulartrig'] == 1) {
  //$mostpopularpercent = $dl_config['mostpopular'];
  $result = $db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE active>'0'");
  $totalmostpopdownloads = $db->sql_numrows($result);
  $dl_config['mostpopular'] = $dl_config['mostpopular'] / 100;
  $dl_config['mostpopular'] = $totalmostpopdownloads * $dl_config['mostpopular'];
  $dl_config['mostpopular'] = round($dl_config['mostpopular']);
}
if ($dl_config['mostpopulartrig'] == 1) {
  echo "<center><span class='option'><strong>"._MOSTPOPULAR." ".$dl_config['mostpopular']."% ("._OFALL." $totalmostpopdownloads "._DOWNLOADS.")</strong></span></center>\n";
} else {
  echo "<center><span class='option'><strong>"._MOSTPOPULAR." ".$dl_config['mostpopular']."</strong></span></center>\n";
}
echo "<tr><td align='center'>"._SHOWTOP.": [ <a href='modules.php?name=$module_name&amp;op=MostPopular&amp;ratenum=10&amp;ratetype=num'>10</a> - ";
echo "<a href='modules.php?name=$module_name&amp;op=MostPopular&amp;ratenum=25&amp;ratetype=num'>25</a> - ";
echo "<a href='modules.php?name=$module_name&amp;op=MostPopular&amp;ratenum=50&amp;ratetype=num'>50</a> | ";
echo "<a href='modules.php?name=$module_name&amp;op=MostPopular&amp;ratenum=1&amp;ratetype=percent'>1%</a> - ";
echo "<a href='modules.php?name=$module_name&amp;op=MostPopular&amp;ratenum=5&amp;ratetype=percent'>5%</a> - ";
echo "<a href='modules.php?name=$module_name&amp;op=MostPopular&amp;ratenum=10&amp;ratetype=percent'>10%</a> ]</td></tr\n>";
echo "</table>\n";
echo "<table border='0' cellpadding='0' cellspacing='4' width='100%'>\n";
$result = $db->sql_query("SELECT lid FROM ".$prefix."_downloads_downloads WHERE active>'0' ORDER BY hits DESC LIMIT 0,".$dl_config['mostpopular']);
$a = 0;
while(list($lid) = $db->sql_fetchrow($result)) {
  if ($a == 0) { echo "<tr>"; }
  echo "<td valign='top' width='50%'><span class='content'>";
  showresulting($lid);
  echo "</span></td>";
  $a++;
  if ($a == 2) { echo "</tr>"; $a = 0; }
}
if ($a ==1) { echo "<td width=\"50%\">&nbsp;</td></tr>"; } else { echo "</tr>"; }
echo "</table>\n";
CloseTable();
include_once(NUKE_BASE_DIR.'footer.php');

?>