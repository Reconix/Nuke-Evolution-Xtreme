<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Enhanced Forum Block
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : block-Forums.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 3.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Description   : Enhanced Forum Block will show all your recent topics
                   on your homepage. It will match any theme you use for
                   your PHP-Nuke / Nuke-Evolution website. It is cached
                   so that it provides optimum performance with your
                   Nuke-Evolution web portal.
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Caching System                           v1.0.0       10/30/2005
-=[Mod]=-
      Advanced Username Color                  v1.0.5       10/30/2005
	  Colorize Forumtitle                      v1.0.0
 ************************************************************************/

if(!defined('NUKE_EVO')) exit;

global $prefix, $db, $sitename, $admin, $ThemeSel, $user_prefix, $board_config, $currentlang, $cache;

/***[CONFIGURATION]******************************************************/
/* These options give you the ability to customize this block           */
/************************************************************************/
$HideViewReadOnly   = 1;  # Set this to 1 to hide posts that a user it not authorized to see, set to 0 to let them see any and all posts.
$AlternateRowClass  = 0;  # Set this to 1 to give your block a little bit of 'class' by changing the style of each row, set to 0 to disable.
$Last_New_Topics    = 10; # Set this to however many topics you'd like to be displayed.
$SplitAnnouncements = 1;  # Set this to 1 to split your board's most recent Announcements and Global Announcements from the normal topics.
$NumAnnouncements   = 2;  # Set this to the number of announcements you'd like to be displayed.
/***[CONFIGURATION]******************************************************/
/* These options give you the ability to customize this block           */
/************************************************************************/

function make_a_row($rowimage, $topic_attachment, $row_class, $topic_first_post_id, $topic_title, $forum_name, $forum_color, $forum_id, $user_id, $username, $topic_replies, $topic_views, $post_time, $topic_last_post_id, $poster_name, $poster_id) 
{
	global $ThemeSel, $board_config;
	
		//$topic_title = ($board_config['smilies_in_titles']) ? smilies_pass($topic_title) : $topic_title;
		$topic_title = $topic_title;

$row = "<tr>"
		 ."<td align=\"center\" height=\"34\" nowrap=\"nowrap\" class=\"$row_class\"><img src=\"". $rowimage ."\" alt=\"New Topic\" border=\"0\" /></td>"
		 ."<td align=\"center\" class=\"$row_class\"><a href=\"modules.php?name=Forums&amp;file=viewforum&amp;f=$forum_id\" ". (( $forum_color != '' ) ? 'style="font-weight:bold; color: #'.$forum_color.'"' : '') ."><em>$forum_name</em></a></td>"
         ."<td width=\"100%\" class=\"$row_class\">". (($topic_attachment == 1) ? '<img src="modules/Forums/images/icon_clip.gif" alt="Attachment" border="0" />&nbsp;' : '') ."<a href=\"modules.php?name=Forums&amp;file=viewtopic&amp;p=$topic_first_post_id#$topic_first_post_id\">". $topic_title ."</a></td>"
         ."<td align=\"center\" class=\"$row_class\">$topic_replies</td>"
         ."<td align=\"center\" class=\"$row_class\">$topic_views</td>"
         ."<td align=\"center\" nowrap=\"nowrap\" class=\"$row_class\"><font size=\"-2\"><i>&nbsp;&nbsp;$post_time&nbsp;</i></font><br />"
         ."<a href=\"modules.php?name=Forums&amp;file=profile&amp;mode=viewprofile&amp;u=$poster_id\">$poster_name</a>&nbsp;<a href=\"modules.php?name=Forums&amp;file=viewtopic&amp;p=$topic_last_post_id#$topic_last_post_id\">"
         ."<img src=\"themes/$ThemeSel/forums/images/icon_newest_reply.gif\" alt=\"New Post\" border=\"0\"></a></td>"
      ."</tr>";
  return $row;
}

function make_table($posts, $announcements, $SplitAnnouncements) 
{
    $table = "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">"
               ."<tr>"
                 ."<td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
                   ."<tr>"
                     ."<td><table width=\"100%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" class=\"forumline\">"
                       ."<tr>"
					     ."<th height=\"35\" colspan=\"1\" align=\"center\" nowrap=\"nowrap\" class=\"thcornerl\"><span class=\"block-title\"><strong>Icon</strong></span></th>"
						 ."<th width=\"96\" align=\"center\" nowrap=\"nowrap\" class=\"thtop\"><span class=\"block-title\"><strong>&nbsp;Forum&nbsp;</strong></span></th>"
                         ."<th height=\"35\" align=\"center\" nowrap=\"nowrap\" class=\"thcornerl\"><span class=\"block-title\"><strong>Topic</strong></span></th>"
                         ."<th width=\"50\" align=\"center\" nowrap=\"nowrap\" class=\"thtop\"><span class=\"block-title\"><strong>&nbsp;Replies&nbsp;</strong></span></th>"
                         ."<th width=\"38\" align=\"center\" nowrap=\"nowrap\" class=\"thtop\"><span class=\"block-title\"><strong>&nbsp;Views&nbsp;</strong></span></th>"
                         ."<th align=\"center\" nowrap=\"nowrap\" class=\"thcornerr\"><span class=\"block-title\"><strong>&nbsp;Last&nbsp;Post&nbsp;</strong></span></th>"
                       ."</tr>";
    if ($SplitAnnouncements) 
	{
        $table .= "<tr><th class=\"thTop\" colspan=\"7\" height=\"28\" align=\"left\"><span class=\"cattitle\">Announcements</span></th></tr>";
        $table .= ($announcements) ? $announcements : "<tr><td class=\"row3\" colspan=\"7\" height=\"15\">There are no announcements.</td></tr>";
    }
    $table .= ($SplitAnnouncements) ? "<tr><th class=\"thTop\" colspan=\"7\" height=\"28\" align=\"left\"><span class=\"cattitle\">Topics</span></th></tr>" : "";
    $table .= ($posts) ? $posts : "<tr><td class=\"row3\" colspan=\"7\" height=\"15\">There are no topics.</td></tr>";
    $table .= "<tr>"
             ."<th class=\"thBottom\" height=\"28\" colspan=\"7\" align=\"right\" class=\"catbottom\">[ <a href=\"modules.php?name=Forums&amp;file=recent\">Recent Topics</a> ]&nbsp;</th>"
           ."</tr>"
         ."</table></td>"
         ."</tr>"
       ."</table></td>"
       ."</tr>"
     ."</table>";
  return $table;
}

$Count_Topics = 0;
$where = ($SplitAnnouncements) ? "AND t.topic_type != '2' AND t.topic_type != '3'" : "";
$where .= ($HideViewReadOnly) ? " AND f.auth_view = '0' AND f.auth_read = '0'" : "";
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
//if (!$TopicData = $cache->load('TopicData', 'home')) {
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
     $TopicData = array();

$result = $db->sql_query( "SELECT t.topic_id, t.topic_type, t.topic_attachment, f.forum_name, f.forum_color, f.forum_id, t.topic_last_post_id, t.topic_first_post_id, t.topic_title, t.topic_poster, t.topic_views, t.topic_replies, p.post_time, p.poster_id, pu.username as postername, u.username, u.user_id FROM ".$prefix."_bbtopics t, ".$prefix."_bbforums f, ".$prefix."_bbposts p, ".$user_prefix."_users u, ".$user_prefix."_users pu WHERE t.forum_id=f.forum_id AND p.post_id=t.topic_last_post_id AND u.user_id=t.topic_poster AND pu.user_id=p.poster_id AND t.topic_moved_id = '0' $where ORDER BY topic_last_post_id DESC LIMIT $Last_New_Topics");
while ( list( $topic_id, $topic_type, $topic_attachment, $forum_name, $forum_color, $forum_id, $topic_last_post_id, $topic_first_post_id, $topic_title, $topic_poster, $topic_views, $topic_replies, $post_time, $poster_id, $poster_name, $username, $user_id ) = $db->sql_fetchrow( $result))

{
        $TopicData[$topic_id]['topic_id'] = $topic_id;
        $TopicData[$topic_id]['topic_type'] = $topic_type;
		$TopicData[$topic_id]['topic_attachment'] = $topic_attachment;
        $TopicData[$topic_id]['forum_name'] = $forum_name;
		$TopicData[$topic_id]['forum_color'] = $forum_color;
        $TopicData[$topic_id]['forum_id'] = $forum_id ;
        $TopicData[$topic_id]['topic_last_post_id'] = $topic_last_post_id ;
        $TopicData[$topic_id]['topic_first_post_id'] = $topic_first_post_id;
        $TopicData[$topic_id]['topic_title'] = $topic_title;
        $TopicData[$topic_id]['topic_poster'] = $topic_poster;
        $TopicData[$topic_id]['topic_views'] = $topic_views;
        $TopicData[$topic_id]['topic_replies'] = $topic_replies;
        $TopicData[$topic_id]['post_time'] = $post_time;
        $TopicData[$topic_id]['poster_id'] = $poster_id;
        $TopicData[$topic_id]['poster_name'] = $poster_name;
        $TopicData[$topic_id]['username'] = $username;
        $TopicData[$topic_id]['user_id'] = $user_id;
}
$db->sql_freeresult($result);
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
//    $cache->save('TopicData', 'home', $TopicData);
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
//}
$TopicData = (is_array($TopicData)) ? $TopicData : array();
foreach($TopicData as $topic_info) {
      $row_class = ($Count_Topics % 2 && $AlternateRowClass) ? "row3" : "row2";
      $Count_Topics += 1;
/*****[BEGIN]******************************************
 [ Mod:     Advanced Username Color            v1.0.5 ]
 ******************************************************/
      $username = UsernameColor($topic_info['username']);
      $poster_name = UsernameColor($topic_info['poster_name']);
/*****[END]********************************************
 [ Mod:     Advanced Username Color            v1.0.5 ]
 ******************************************************/
      $post_time = EvoDate( $board_config['default_dateformat'] , $topic_info['post_time'] , $board_config['board_timezone'] );
	  
	  if ( $topic_info['topic_type'] == 3 || $topic_info['topic_type'] == 2 || $topic_info['topic_type'] == 1 )
		{
			if ($topic_info['topic_type'] == 3 )
			{	
				$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_global_announce_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder_global_announce.gif';
			}
			elseif ($topic_info['topic_type'] == 2 )
			{
				$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_announce_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder_announce.gif';
			}
			else
			{
				$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_sticky_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder_sticky.gif';
			}
		}
		else
		{
			$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder.gif';
		}

      $posts .= make_a_row($rowimage, $topic_info['topic_attachment'], $row_class, $topic_info['topic_first_post_id'], $topic_info['topic_title'], $topic_info['forum_name'], $topic_info['forum_color'], $topic_info['forum_id'], $topic_info['user_id'], $username, $topic_info['topic_replies'], $topic_info['topic_views'], $post_time, $topic_info['topic_last_post_id'], $poster_name, $topic_info['poster_id']);
}

# Start Custom Announcements Addon
if ($SplitAnnouncements) 
{
$Count_Announcements = 0;
$where = ($HideViewReadOnly) ? " AND f.auth_view = '0' AND f.auth_read = '0'" : "";
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
//if (!$AnnounceData = $cache->load('AnnounceData', 'home')) {
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    $AnnounceData = array();

    $result = $db->sql_query( "SELECT t.topic_id, t.topic_type, t.topic_attachment, f.forum_name, f.forum_color, f.forum_id, t.topic_last_post_id, t.topic_first_post_id, t.topic_title, t.topic_poster, t.topic_views, t.topic_replies, p.post_time, p.poster_id, pu.username, u.username, u.user_id FROM ".$prefix."_bbtopics t, ".$prefix."_bbforums f, ".$prefix."_bbposts p, ".$user_prefix."_users u, ".$user_prefix."_users pu WHERE t.forum_id=f.forum_id AND p.post_id=t.topic_last_post_id AND u.user_id=t.topic_poster AND t.topic_type != '0' AND t.topic_type != '1' AND t.topic_type < '20' AND pu.user_id=p.poster_id AND t.topic_moved_id = '0' $where ORDER BY topic_last_post_id DESC LIMIT $NumAnnouncements");
    while ( list( $topic_id, $topic_type, $topic_attachment, $forum_name, $forum_color, $forum_id, $topic_last_post_id, $topic_first_post_id, $topic_title, $topic_poster, $topic_views, $topic_replies, $post_time, $poster_id, $poster_name, $username, $user_id ) = $db->sql_fetchrow( $result))

    {
        $AnnounceData[$topic_id]['topic_id'] = $topic_id;
        $AnnounceData[$topic_id]['topic_type'] = $topic_type;
		$AnnounceData[$topic_id]['topic_attachment'] = $topic_attachment;
        $AnnounceData[$topic_id]['forum_name'] = $forum_name;
		$AnnounceData[$topic_id]['forum_color'] = $forum_color;
        $AnnounceData[$topic_id]['forum_id'] = $forum_id ;
        $AnnounceData[$topic_id]['topic_last_post_id'] = $topic_last_post_id ;
        $AnnounceData[$topic_id]['topic_first_post_id'] = $topic_first_post_id;
        $AnnounceData[$topic_id]['topic_title'] = $topic_title;
        $AnnounceData[$topic_id]['topic_poster'] = $topic_poster;
        $AnnounceData[$topic_id]['topic_views'] = $topic_views;
        $AnnounceData[$topic_id]['topic_replies'] = $topic_replies;
        $AnnounceData[$topic_id]['post_time'] = $post_time;
        $AnnounceData[$topic_id]['poster_id'] = $poster_id;
        $AnnounceData[$topic_id]['poster_name'] = $poster_name;
        $AnnounceData[$topic_id]['username'] = $username;
        $AnnounceData[$topic_id]['user_id'] = $user_id;
    }
    $db->sql_freeresult($result);
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
//    $cache->save('AnnounceData', 'home', $AnnounceData);
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
//}
$AnnounceData = (is_array($AnnounceData)) ? $AnnounceData : array();
foreach($AnnounceData as $announce_info) 
{
	$row_class = ($Count_Announcements % 2 && $AlternateRowClass) ? "row3" : "row2";
	$Count_Announcements += 1;
/*****[BEGIN]******************************************
 [ Mod:     Advanced Username Color            v1.0.5 ]
 ******************************************************/
	$username = UsernameColor($announce_info['username']);
	$poster_name = UsernameColor($announce_info['poster_name']);
/*****[END]********************************************
 [ Mod:     Advanced Username Color            v1.0.5 ]
 ******************************************************/
	$post_time = EvoDate( $board_config['default_dateformat'] , $announce_info['post_time'] , $board_config['board_timezone'] );
	if ( $announce_info['topic_type'] == 3 || $announce_info['topic_type']== 2 || $announce_info['topic_type'] == 1 )
	{
		if ($announce_info['topic_type'] == 3 )
		{	
			$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_global_announce_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder_global_announce.gif';
		}
		elseif ($announce_info['topic_type'] == 2 )
		{
			$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_announce_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder_announce.gif';
		}
		else
		{
			$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_sticky_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder_sticky.gif';
		}
	}
	else
	{
		$rowimage = ($post_time >= $userinfo['user_lastvisit']) ? 'themes/'. $ThemeSel .'/forums/images/folder_new.gif' : 'themes/'. $ThemeSel .'/forums/images/folder.gif';
	}

	$announcements .= make_a_row($rowimage, $announce_info['topic_attachment'], $row_class, $announce_info['topic_first_post_id'], $announce_info['topic_title'], $announce_info['forum_name'], $announce_info['forum_color'], $announce_info['forum_id'], $announce_info['user_id'], $username, $announce_info['topic_replies'], $announce_info['topic_views'], $post_time, $announce_info['topic_last_post_id'], $poster_name, $announce_info['poster_id']);
   }
}

$content .= make_table($posts, $announcements, $SplitAnnouncements);

?>