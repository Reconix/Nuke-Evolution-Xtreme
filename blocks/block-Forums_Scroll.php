<?php

///////////////////////////////////////////////////////////////////////////////
// Scrolling Forum Block v1.0 												 //
// Inspired by Codezwiz Scrolling Forum Block                                //
// By Seven (seven@nukecode.com)											 //
// 																			 //
// To use this block upload to your blocks folder and activate				 //
// Thats all there is to it.												 //
// Enjoy! :)																 //
//																			 //
// This program is free software. You can redistribute it and/or modify      //
// it under the terms of the GNU General Public License as published by      //
// the Free Software Foundation; either version 2 of the License.     		 //
//																			 //
// This file was originally downloaded from http://nukecode.com				 //
///////////////////////////////////////////////////////////////////////////////

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
define("_BBFORUM_PROFILE","Profile");
define("_BBFORUM_INBOX","Inbox");

$theme = get_theme();
$post_image = "themes/$theme/forums/images/icon_latest_reply.gif";

global $prefix, $user_prefix, $db, $dbi, $sitename, $user, $cookie, $group_id;
/* Total Amount of Topics */
$result = $db->sql_query( "SELECT * FROM ".$prefix."_bbtopics" );
$Amount_Of_Topics = $db->sql_numrows( $result );

/* Total Amount of Posts */
$result = $db->sql_query( "SELECT * FROM ".$prefix."_bbposts" );
$Amount_Of_Posts = $db->sql_numrows( $result );

/* Total Amount of Topic Views */
$Amount_Of_Topic_Views = 0;
$result = $db->sql_query( "SELECT topic_views FROM ".$prefix."_bbtopics" );
while( list( $topic_views ) = $db->sql_fetchrow( $result ) )
{
   $Amount_Of_Topic_Views = $Amount_Of_Topic_Views + $topic_views;
}

/* Total Amount of Topic Replies */
$Amount_Of_Topic_Replies = 0;
$result = $db->sql_query( "SELECT topic_replies FROM ".$prefix."_bbtopics" );
while( list( $topic_replies ) = $db->sql_fetchrow( $result ) )
{
   $Amount_Of_Topic_Replies = $Amount_Of_Topic_Replies + $topic_replies;
}

/* Total Amount of Members */
$result = $db->sql_query( "SELECT * FROM ".$user_prefix."_users" );
$Amount_Of_Members = $db->sql_numrows( $result );

$count = 1;
$content = "<table class=\"row1\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\">
 <tr>
  <td align=\"left\" class=\"row1\" width=\"50%\"><font class=\"tiny\"><b>"._BBFORUM_TOTTOPICS."</b></font></td>
  <td align=\"left\" class=\"row1\" width=\"50%\"><b>$Amount_Of_Topics</b></td>
 </tr>
 <tr>
  <td align=\"left\" class=\"row1\" width=\"50%\"><font class=\"tiny\"><b>"._BBFORUM_TOTPOSTS."</b></font></td>
  <td align=\"left\" class=\"row1\" width=\"50%\"><b>$Amount_Of_Posts</b></td>
 </tr>
 <tr>
  <td align=\"left\" class=\"row1\" width=\"50%\"><font class=\"tiny\"><b>"._BBFORUM_TOTVIEWS."</b></font></td>
  <td align=\"left\" class=\"row1\" width=\"50%\"><b>$Amount_Of_Topic_Views</b></td>
 </tr>
 <tr>
  <td align=\"left\" class=\"row1\" width=\"50%\"><font class=\"tiny\"><b>"._BBFORUM_TOTREPLIES."</b></font></td>
  <td align=\"left\" class=\"row1\" width=\"50%\"><b>$Amount_Of_Topic_Replies</b></td>
 </tr>
 <tr>
  <td align=\"left\" class=\"row1\" width=\"50%\"><font class=\"tiny\"><a href=\"modules.php?name=Members_List\">"._BBFORUM_TOTMEMBERS."</a></font></td>
  <td align=\"left\" class=\"row1\" width=\"50%\"><b>$Amount_Of_Members</b></td>
 </tr>
</table>";
$content .= "<table class=\"row1\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\">
 <tr>
  <td class=\"row1\" width=\"100%\">";
$content  .= "<A name= \"scrollingCode\"></A><MARQUEE behavior=\"scroll\" direction=\"up\" height=\"220\" scrollamount=\"2\" scrolldelay=\"20\" onmouseover='this.stop()' onmouseout='this.start()'>";
$content .="<center><font class=\"content\"><b>Last 20 Forum Messages</b></center>";
$content .= "<br>";
$sql = "SELECT 
t.topic_id, t.topic_last_post_id, t.topic_title, f.forum_name,
f.forum_id, u.username, u.user_id, p.poster_id, p.post_time FROM
 ".$prefix."_bbtopics t, ".$prefix."_bbforums f, 
 ".$prefix."_bbposts p, ".$user_prefix."_users u WHERE 
 p.post_id = t.topic_last_post_id AND u.user_id = p.poster_id
 AND t.forum_id=f.forum_id AND f.auth_view=0
 ORDER BY t.topic_last_post_id DESC
 LIMIT 20";
$result1 = $db->sql_query($sql);
while(list($topic_id, $topic_last_post_id, $topic_title, $forum_name, $forum_id, $username, $user_id, $poster_id, $post_time) = $db->sql_fetchrow($result1))
{
  $content .= '
  <div style="border-bottom: 1px solid #000000; padding-bottom: 8px; padding-top: 8px;">
  <img src="'.$post_image.'" alt="" border="0" />
  <a href="modules.php?name=Forums&amp;file=viewtopic&amp;p='.$topic_last_post_id.'#'.$topic_last_post_id.'" title="'.$topic_title.'"><strong>'.$topic_title.'</strong></a><br />
  <span class="tiny"><em>Last post by 
  <a href="modules.php?name=Your_Account&amp;op=userinfo&amp;username='.$username.'" title="'.$username.'">'.UsernameColor($username).'</a> 
  in <a href="modules.php?name=Forums&amp;file=viewforum&amp;f='.$forum_id.'" title="'.$forum_name.'">'.$forum_name.'</a> on 
  '.date("m/d/Y h:i a", $post_time).'</em></span>
  </div>
  ';
  
}
$content .= "</marquee></td></tr></table>";
$content .= "<table class=\"row1\" cellspacing=\"0\" cellpadding=\"3\" width=\"100%\">
 <tr>
  <td align=\"center\" class=\"row1\" width=\"50%\"><a href=\"modules.php?name=Forums\">"._BBFORUM_FORUM."</a></td>
  <td align=\"center\" class=\"row1\" width=\"50%\"><a href=\"modules.php?name=Forums&file=search\">"._BBFORUM_SEARCH."</a></td>
 </tr>
 <tr> <td align=\"center\" class=\"row1\" width=\"50%\"><a href=\"modules.php?name=Your_Account&op=edituser\">"._BBFORUM_PROFILE."</a></td>
  <td align=\"center\" class=\"row1\" width=\"50%\"><a href=\"modules.php?name=Private_Messages\">"._BBFORUM_INBOX."</a></td></tr></table>";
?>
