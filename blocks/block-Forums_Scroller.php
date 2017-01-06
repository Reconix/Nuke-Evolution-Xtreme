<?php


/*
DHTML Scrolling Forum Block
Written By: gotcha
http://nukecoder.com
Cross browser Marquee II is from http://dynamicdrive.com/
Please do not remove their copyright notice.
Released August 2007
*/


/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

if(!defined('NUKE_EVO')) exit;


define("_BBFORUM_TOTTOPICS","Topics ");
define("_BBFORUM_TOTPOSTS","Posts ");
define("_BBFORUM_TOTVIEWS","Views ");
define("_BBFORUM_TOTREPLIES","Replies ");
define("_BBFORUM_TOTMEMBERS","Members");
define("_BBFORUM_FORUM","Forums");
define("_BBFORUM_SEARCH","Search");

$theme = get_theme();
$post_image = "themes/$theme/forums/images/icon_latest_reply.gif";
global $prefix, $user_prefix, $db, $user, $cookie, $group_id;

$content .= '
<script type="text/javascript">

/***********************************************
* Cross browser Marquee II- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

var delayb4scroll=2000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
var marqueespeed=1 //Specify marquee scroll speed (larger is faster 1-10)
var pauseit=1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=marqueespeed
var pausespeed=(pauseit==0)? copyspeed: 0
var actualheight=\'\'

function scrollmarquee(){
if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8))
cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px"
else
cross_marquee.style.top=parseInt(marqueeheight)+8+"px"
}

function initializemarquee(){
cross_marquee=document.getElementById("vmarquee")
cross_marquee.style.top=0
marqueeheight=document.getElementById("marqueecontainer").offsetHeight
actualheight=cross_marquee.offsetHeight
if (navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Netscape 7x, add scrollbars to scroll and exit
cross_marquee.style.height=marqueeheight+"px"
cross_marquee.style.overflow="scroll"
return
}
setTimeout(\'lefttime=setInterval("scrollmarquee()",30)\', delayb4scroll)
}

if (window.addEventListener)
window.addEventListener("load", initializemarquee, false)
else if (window.attachEvent)
window.attachEvent("onload", initializemarquee)
else if (document.getElementById)
window.onload=initializemarquee


</script>
';

$content .= '
<div id="marqueecontainer" style="position: relative; width: 145px; height: 200px; overflow: hidden; padding: 2px; padding-left: 4px;" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
<div id="vmarquee" style="position: absolute; width: 90%;">
';

$sql = "SELECT 
t.topic_id, t.topic_last_post_id, t.topic_title, f.forum_name,
f.forum_id, u.username, u.user_id, p.poster_id, p.post_time FROM
 ".$prefix."_bbtopics t, ".$prefix."_bbforums f, 
 ".$prefix."_bbposts p, ".$user_prefix."_users u WHERE 
 p.post_id = t.topic_last_post_id AND u.user_id = p.poster_id
 AND t.forum_id=f.forum_id AND f.auth_view=0
 ORDER BY t.topic_last_post_id DESC
 LIMIT 10";
$result1 = $db->sql_query($sql);
while(list($topic_id, $topic_last_post_id, $topic_title, $forum_name, $forum_id, $username, $user_id, $poster_id, $post_time) = $db->sql_fetchrow($result1))
{
  $content .= '
  <div style="border-bottom: 1px dotted #000000; padding-bottom: 8px; padding-top: 8px;">
  <img src="'.$post_image.'" alt="" border="0" />
  <a href="modules.php?name=Forums&amp;file=viewtopic&amp;p='.$topic_last_post_id.'#'.$topic_last_post_id.'" title="'.$topic_title.'"><strong>'.$topic_title.'</strong></a><br />
  <span class="content"><em>Last post by 
  <a href="modules.php?name=Your_Account&amp;op=userinfo&amp;username='.$username.'" title="'.$username.'">'.$username.'</a> 
  in <a href="modules.php?name=Forums&amp;file=viewforum&amp;f='.$forum_id.'" title="'.$forum_name.'">'.$forum_name.'</a> on 
  '.date("m/d/Y h:i a", $post_time).'</em></span>
  </div>
  ';
  
}

$content .= '
<div style="text-align:center; padding-top: 8px;"><a href="modules.php?name=Forums" title="Forum Index">Forum Index</a></div>
</div>
</div>

<div style="padding-top: 8px;">
  <div style="float:left;">
    <a href="modules.php?name=Forums">Forum Index</a><br />
    <a href="modules.php?name=Forums&file=search">Forum Search</a><br />
  </div>
  <div style="float:right; text-align: right;">
    <span id="fast" style="cursor: pointer;" onClick="copyspeed=copyspeed+1; mqs=marqueespeed; marqueespeed=copyspeed"><img src="images/mini_up.png" alt="" title="Faster" /></span><br />
    <span id="slow" style="cursor: pointer;" onClick="copyspeed=copyspeed-1; mqs=marqueespeed; marqueespeed=copyspeed"><img src="images/mini_down.png" alt="" title="Slower" /></span>
  </div>
</div>
';

?>