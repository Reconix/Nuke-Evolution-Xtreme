<?php

// who is where v2.4 for phpnuke 7.x (tested on 7.3!)
//---  by surf (www.surf4all.net - www.creation-de-site-brest.com)
//---  Update by Will (http://www.ig-2000.com - willlau@easynet.fr)
//---  Updated once again by Vladimir (http://www.vladinator.tk - vladix@online.no)
//---  Last Updated by thainuke (http://www.thainuke.net - webmaster@thainuke.net)

if (!defined('NUKE_EVO')) {
    die ("You can't access this file directly...");
}

$module_name = basename(dirname(__FILE__));

$index = 1;

function index() {
	global $module_name, $admin, $user, $cookie, $prefix, $user_prefix, $db, $anonymous,$name,$lang;
    include("header.php");
    OpenTable();
   
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
	define("_MEMBRES","ื๋ๅํ๛");
	define("_VISITEURS","ฯ๎๑ๅ๒่๒ๅ๋่");
	define("_VISITEUR","ฯ๎๑ๅ๒่๒ๅ๋่");
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
	define("_TOOLTIPS_3","Vis profilen");
} else if ($lang=='thai') {
	define("_WIW_TITLE","ใครอยู่ที่ไหน?");
	define("_MEMBRES","สมาชิก");
	define("_VISITEURS","บุคคลทั่วไป");
	define("_VISITEUR","บุคคลทั่วไป");
	define("_TOOLTIPS_1","ส่งข่าวสารส่วนตัว");
	define("_TOOLTIPS_3","แสดงข้อมูลส่วนตัว");
} else {
	define("_WIW_TITLE","Who is Where?");
	define("_MEMBRES","Members");
	define("_VISITEURS","Visitors");
	define("_VISITEUR","Visitor");
	define("_TOOLTIPS_1","Send a Private Message");
	define("_TOOLTIPS_3","Show the profile");
}

echo "<center><b>" ._WIW_TITLE. "</b></center><br>";

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
function displayTime2($sec) {
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
		$title = "<a href=\"modules.php?name=Private_Messages&file=index&mode=post&u=$session[username]\"><img src=\"images/pm.jpg\" alt=\""._TOOLTIPS_1."\" border=\"0\"></a> <A HREF=\"modules.php?name=Your_Account&op=userinfo&username=$session[username]\" title=\""._TOOLTIPS_3."\">".UsernameColor($session[username])."</a>";
	} else {
		//--- Anonymous user
		if (isset($admin)) {
			$title = '<A title="' . displayTime2($session[time]) . "\">".UsernameColor($session[username])."</a>";
		} else {
			$title = '<A title="' . displayTime2($session[time]) . '">' . _VISITEUR . '</a>';
		}
	}

	$who_online[$guest] .= "$num[$guest]:&nbsp;$title -&gt; <a href=\"$session[url]\" target=\"_blank\">$session[module]</a><br>\n";
	$num[$guest]++;
}
$content = "<center><a href=\"modules.php?name=Who-is-Where\"><img src=\"images/where.gif\" BORDER=\"0\" ALT=\""._WIW_TITLE."\"></a></center>";

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
// it's a copyright don't remove it or remove who is where !!
if (!isset($user)) {
	$content .= "<center>".ucfirst(_BY)." <a href=\"http://www.creation-de-site-brest.com\" target=\"_blank\">Creation site</a></center>";
}
   
   echo "$content";
   
   
    CloseTable();
    include("footer.php");

}


switch($func) {

    default:
    index();
    break;


}

?>
