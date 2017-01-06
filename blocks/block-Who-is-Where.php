<?php
// who is where v2.3.x for phpnuke 7.x (Tested on 7.3)
//---  by surf (www.surf4all.net - www.creation-de-site-brest.com)
//---  Update by Will (http://www.ig-2000.com - willlau@easynet.fr)
//---  Updated once again by Vladimir (http://www.vladinator.tk - vladix@online.no)
//---  Last Updated by thainuke (http://www.thainuke.net - webmaster@thainuke.net)

if (!defined('NUKE_EVO')) {
    Header("Location: ../index.php");
    die();
}

$content = '';
global $admin, $user, $cookie, $prefix, $user_prefix,$db, $anonymous,$name,$lang;

//
// language system
//

define('_MIN','&#039; ');
define('_SEC','&quot;');

if ($lang=='french') {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","Membres ");
	define("_VISITEURS","Visiteurs ");
	define("_VISITEUR","Visiteur ");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
} else if ($lang=='russian') {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","�����");
	define("_VISITEURS","����������");
	define("_VISITEUR","����������");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
} else if ($lang=='spanish') {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","Miembro");
	define("_VISITEURS","Visitante");
	define("_VISITEUR","Visitantes");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
} else if ($lang=='italian') {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","Membri");
	define("_VISITEURS","Ospiti");
	define("_VISITEUR","Ospite");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
} else if ($lang=='portuguese') {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","Miembro");
	define("_VISITEURS","Visitantes");
	define("_VISITEUR","Visitante");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
} else if ($lang=='norwegian') {
	define("_WIW_TITLE","Hvem er Hvor?");
	define("_MEMBRES","Medlemer");
	define("_VISITEURS","Gjester");
	define("_VISITEUR","Gjest");
	define("_TOOLTIPS_1","Send en Privat Melding");
	define("_TOOLTIPS_2","Se flere detaljer");
	define("_TOOLTIPS_3","Vis profilen");
} else if ($lang=='thai') {
	define("_WIW_TITLE","���������˹?");
	define("_MEMBRES","��Ҫԡ");
	define("_VISITEURS","�ؤ�ŷ����");
	define("_VISITEUR","�ؤ�ŷ����");
	define("_TOOLTIPS_1","�觢��������ǹ���");
	define("_TOOLTIPS_3","�ʴ���������ǹ���");
} else {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","Members");
	define("_VISITEURS","Visitors");
	define("_VISITEUR","Visitor");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
}

//
// Init
//

$who_online[0] = "";
$who_online[1] = "";
$num[0] = 1;
$num[1] = 1;

/**
 * function that displays 
 * int timeSec : time in seconds
 * @return String timeDisplay
 */
function displayTime($sec) {
	$minutes = floor($sec / 60);
	$seconds = $sec % 60;
	if ($minutes == 0) {
		return $seconds . _SEC;
	}
	return $minutes . _MIN . $seconds . _SEC;
}

//
// Query
//

$result = $db->sql_query("select username, guest, module, url, UNIX_TIMESTAMP(now())-time AS time from ".$prefix."_whoiswhere order by username");
$member_online_num  = $db->sql_numrows($result);

//
// Display Section
//
while ($session = $db->sql_fetchrow($result)) {
	//--- guest can only be 0 or 1
	$guest = $session["guest"];
	if ($num[$guest] < 10) {
		$who_online[$guest] .= "0";
	}
	
	if ($guest == 0) {
		$title = "<A HREF=\"modules.php?name=Your_Account&op=userinfo&username=$session[username]\" title=\""._TOOLTIPS_3."\">".UsernameColor($session[username])."</a>";
	} else {
		//--- Anonymous user
		if (isset($admin)) {
			$title = '<A title="' . displayTime($session[time]) . "\">".UsernameColor($session[username])."</a>";
		} else {
			$title = '<A title="' . displayTime($session[time]) . '">' . _VISITEUR . '</a>';
		}
	}

	$who_online[$guest] .= "$num[$guest]:&nbsp;$title -&gt; <a href=\"$session[url]\" target=\"_blank\">$session[module]</a><br>\n";
	$num[$guest]++;
} 
$content = "<a href=\"modules.php?name=Who-is-Where\"><center><img src=\"images/where.gif\" BORDER=\"0\" ALT=\""._WIW_TITLE."\"></a></center>";

//--- Members
if ($who_online[0] != "") {
	$content .= "<img src=\"images/Who-is-Where/members.gif\">&nbsp;<span class=\"content\"><b>"._MEMBRES.":</b></span><br>$who_online[0]<br>";
}

//--- Anonymous
if ($who_online[1] != "") {
	$content .= "<img src=\"images/Who-is-Where/visitors.gif\">&nbsp;<span class=\"content\"><b>"._VISITEURS.":</b></span><br>$who_online[1]";
}

// the link will be display only for anonymous user... 
// please let it for my future work on this funny block
// it's a copyright don't remove it
if (!isset($user)) {
		//$content .= "<center>".ucfirst(_BY)." <a href=\"http://www.creation-de-site-brest.com\" target=\"_blank\">Creation site</a></center>";
}
?>
