<?php

/********************************************************************

                  CZUser Info V5 Universal Block
				  
	(c) 2002 - 2004 by Codezwiz Network - http://www.codezwiz.com		 	
	(c) 2007 - 2008 by DarkForgeGFX - http://www.darkforgegfx.com
		
********************************************************************/

/********************************************************************		
-=ADDON=-		
 [ Advanced Member Image Control             Last updated 29/07/07 ]  			   
 [ Enhanced Security GFX Check               Last updated 29/07/07 ] 
 [ Ip Display                                Last updated 29/07/07 ] 
 [ Post Count Display						 Last updated 29/07/07 ] 
 [ Page View/Hits Display					 Last updated 29/07/07 ] 
 [ Guest & Bots Display						 Last updated 29/07/07 ]
 [ Tooltip MouseOver Feature				 Last updated 24/08/07 ]
 [ Advanced Username Color					 Last updated 29/07/07 ]
 [ Audio Private Message Alert				 Last updated 29/07/07 ] 
 [ BBForum group Display					 Last updated 29/07/07 ]
 [ Chopped Usernames                         Last updated 29/07/07 ]
 [ Section Image Control                     Last Updated 24/08/07 ] 
********************************************************************/

	if(!defined('NUKE_EVO')) exit;

	global $prefix, $db, $userinfo, $currentlang, $imagebase, $board_config, $cz_config, $section_sub_img, $section_online_mem, $identify;
   
    $imagebase = 'images/CZUser/';
	
	if(!function_exists('get_userinfo_config'))
	{
		include_once(NUKE_INCLUDE_DIR.'czuser_func.php');
	}
	$cz_config = get_userinfo_config();

	$section['img'] = $db->sql_ufetchrow("SELECT * FROM `". $prefix ."_czuser_images`");	
	$section_account_info = $section['img']['account_info'];
	$section_member_ship  = $section['img']['member_ship'];
	$section_most_online  = $section['img']['most_online'];
	$section_online_stats = $section['img']['online_stats'];
	$section_page_views   = $section['img']['page_views'];
	$section_member_group = $section['img']['member_group'];
	$section_online_mem   = $section['img']['online_mem'];
	$section_sub_img      = $section['img']['sub_img'];	

	if (file_exists(NUKE_LANGUAGE_DIR.'CZUser-Info/CZUser-Info-'. $currentlang .'.php')) 
 	{ 
    	include(NUKE_LANGUAGE_DIR.'CZUser-Info/CZUser-Info-'. $currentlang .'.php');	
 	} 
	else 
	{   
    	include(NUKE_LANGUAGE_DIR.'CZUser-Info/CZUser-Info-english.php');
	}
	
	function userinfo_newest_user() 
	{
		global $db, $user_prefix;	
		$sql = "SELECT `username` FROM `". $user_prefix ."_users` WHERE `user_active` = 1 AND `user_level` > 0 ORDER BY `user_id` DESC LIMIT 1";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	
		return (isset($row[0])) ? $row[0] : '?';
	}
	
	function userinfo_total()
	{
		global $user_prefix, $db;	
		$sql = "SELECT COUNT(*) FROM `". $user_prefix ."_users` WHERE `user_id` > 1";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);	
		return (isset($row[0])) ? $row[0] : '?';
	}
	
	function userinfo_waiting() 
	{
		global $user_prefix, $db;	
		$sql = "SELECT COUNT(*) FROM `". $user_prefix ."_users_temp`";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);	
		return (isset($row[0])) ? $row[0] : '?';
	}
		
	function userinfo_new_today() 
	{
		global $user_prefix, $db;	
		$sql = "SELECT COUNT(*) FROM `". $user_prefix ."_users` WHERE `user_regdate` = '". date("M d, Y") ."'";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);	
		return (isset($row[0])) ? $row[0] : '?';
	}

	function userinfo_new_yesterday() 
	{
		global $user_prefix, $db;	
		$sql = "SELECT COUNT(*) FROM `". $user_prefix ."_users` WHERE `user_regdate` = '". date("M d, Y", time()-86400) ."'";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);	
		return (isset($row[0])) ? $row[0] : '?';
	}

	if ($cz_config['czuser_pms_alert'] == 1) 
	{	
		if ($userinfo['user_popup_pm'] && $userinfo['user_new_privmsg']) 
		{ 		
		   $content .= '<script language="Javascript" type="text/javascript"> 	   
							window.open("modules.php?name=Private_Messages&file=index&mode=newpm&popup=1", "", HEIGHT=225, resizable=yes, WIDTH=400");
						</script>'; 	
	   	} 	   
	} 	
	
	function mouse_overlay($userid, $position, $title, $caption, $info, $username) 
	{
		return "<a href=\"modules.php?name=Profile&amp;mode=viewprofile&amp;u=". $userid ."\" onmouseover=\"return overlib('". addslashes($info) ."', ABOVE, ". (($position == 'l' ? 'RIGHT' : 'LEFT')) .", CAPTION, '". ((!$caption) ? $title : $caption) ."', STATUS, '"._AB_HELPSYS."', WIDTH, 260, FGCOLOR, '#ffffff', BGCOLOR, '#000000', TEXTCOLOR, '#000000', CAPCOLOR, '#ffffff', CLOSECOLOR, '#ffffff', CAPICON, '', BORDER, '2');\" onmouseout=\"return nd();\">". UsernameColor($username) ."</a>";
	}

	function czuser_get_members_online() 
	{
	    global $prefix, $db, $user_prefix, $Default_Theme, $name, $userinfo, $board_config, $imagebase, $cz_config, $lang_userblock, $identify;	
		$i = 1;	
		$hidden = 0;
		$result = $db->sql_query("SELECT w.*, u.* FROM `". $prefix ."_session` AS w LEFT JOIN `". $user_prefix ."_users` AS u ON u.`username` = w.`uname` WHERE w.`guest` = '0' OR w.`guest` = '2' ORDER BY ". (($cz_config['czuser_mode'] == 1) ? 'w.`uname` ASC' : 'u.`user_id` ASC') ."");	
    	$member_online_num = $db->sql_numrows($result);	
    	while ($session = $db->sql_fetchrow($result)) 
		{		
				$num = ($i < 10) ? '0'.$i : $i;   
				list ($pic, $king, $gname, $caption) = $db->sql_ufetchrow("SELECT `pic`, `king`, `gname`, `caption` FROM `". $prefix ."_czuser_info` WHERE `view` = '". $session['uname'] ."'");
					
				$img = ($king == '1') ? 'admin.png' : (($king == '2') ? 'staff.png' : 'online.png');
				//str_replace("&", "&amp;", $url)
				$where_at = "<a href=\"". str_replace("&", "&amp;", $session['url']) ."\" title=\"". $where ."\" alt=\"". $where ."\">". (($cz_config['czuser_pick'] == 1) ? '<img src="'. $imagebase . $img .'" alt="'. $where .'" title="'. $where .'" border="0">' : $num.'.') ."</a>&nbsp;";			
				
				$img_u = "<img align='absmiddle' src='images/CZUser/overlib/". (($cz_config['tooltip_username'] == 1 || $cz_config['tooltip_username'] == 2) ? 'memberusr.gif' : 'memberusr_blk.gif') ."' width='16'>&nbsp;";
				
				$img_e = "<img align='absmiddle' src='images/CZUser/overlib/". (($cz_config['tooltip_email'] == 1 || $cz_config['tooltip_email'] == 2) ? 'messages.gif' : 'messages_blk.gif') ."' width='16'>&nbsp;";
				
				$img_r = "<img align='absmiddle' src='images/CZUser/overlib/". (($cz_config['tooltip_reg_date'] == 1 || $cz_config['tooltip_reg_date'] == 2) ? 'regdate.png' : 'regdate_blk.png') ."' width='16'>&nbsp;";
					
				$img_z = "<img align='absmiddle' src='images/CZUser/overlib/membership.gif' width='16'>&nbsp;";
				
				$img_p = "<img align='absmiddle' src='images/CZUser/overlib/". (($cz_config['tooltip_posts'] == 1 || $cz_config['tooltip_posts'] == 2) ? 'posts.gif' : 'posts_blk.gif') ."' width='16'>&nbsp;";
				
				$img_t = "<img align='absmiddle' src='images/CZUser/overlib/". (($cz_config['tooltip_theme'] == 1 || $cz_config['tooltip_theme'] == 2) ? 'theme.gif' : 'theme_blk.gif') ."' width='16'>&nbsp;";
				
				$img_w = "<img align='absmiddle' src='images/CZUser/overlib/". (($cz_config['tooltip_where'] == 1 || $cz_config['tooltip_where'] == 2) ? 'where.gif' : 'where_blk.gif') ."' width='16'>&nbsp;";
				
				$img_i = "<img align='absmiddle' src='images/CZUser/online.gif' width='16'>&nbsp;";
		
				//if ($cz_config['czuser_tooltip'] == 1)
				//{	
					list ($title, $position) = $db->sql_ufetchrow("SELECT `title`, `bposition` FROM `". $prefix ."_blocks` WHERE `blockfile` = 'block-CZUser-Info.php'");				
					if ($cz_config['tooltip_avatar'] == 1)
					{		
						
						if ($session['user_avatar_type'] == 1)
						{
							$tooltip_overlay = "<div align='center'><br /><img src='". $board_config['avatar_gallery_path'] ."/". $session['user_avatar'] ."'></div><br />";
						} 
						elseif ($session['user_avatar_type'] == 2)
						{
							$tooltip_overlay = "<div align='center'><img src='". $session['user_avatar'] . "' width='". $board_config['avatar_max_width'] ."' height='". $board_config['avatar_max_height'] ."' alt='' border='0' /></div>";
						} 
						elseif ($session['user_avatar_type'] == 3)
						{
							$tooltip_overlay = "<div align='center'><br /><img src='". $board_config['avatar_gallery_path'] ."/". $session['user_avatar'] ."'></div><br />";
						}
					}
					else
					{
						$tooltip_overlay = "";
					}
					
					$session['uname'] = str_replace("\"", "'", UsernameColor($session['uname']));
					$tooltip_overlay .= $img_u."<b>". $lang_userblock['TOOLTIP']['ADDON']['USERNAME'] . $lang_userblock['BREAK'] ."</b>&nbsp;". (($cz_config['tooltip_username'] == 1) ? "<b>". $session['uname'] ."</b><br />" : "[&nbsp;Hidden&nbsp;]<br />");
					
					$tooltip_overlay .= $img_e."<b>". $lang_userblock['TOOLTIP']['ADDON']['EMAIL'] . $lang_userblock['BREAK'] ."</b>&nbsp;". (($cz_config['tooltip_email'] == 1 && $session['user_viewemail'] != 0) ? $session['user_email'] ."<br />" : "[&nbsp;Hidden&nbsp;]<br />");
					
					$tooltip_overlay .= $img_r."<b>". $lang_userblock['TOOLTIP']['ADDON']['REGDATE'] . $lang_userblock['BREAK'] ."</b>&nbsp;". (($cz_config['tooltip_reg_date'] == 1) ? $session['user_regdate'] ."<br />" : "[&nbsp;Hidden&nbsp;]<br />");
	
					if($gname)
					{
						$gname = str_replace("\"", "'", GroupColor(get_group_name($gname)));
						$tooltip_overlay .= $img_z."<b>". $lang_userblock['TOOLTIP']['ADDON']['MEMBERSTATUS'] . $lang_userblock['BREAK'] ."</b> <b>". $gname ."</b><br />";
					}
					
					$tooltip_overlay .= $img_p."<b>". $lang_userblock['TOOLTIP']['ADDON']['POSTS'] . $lang_userblock['BREAK'] ."</b>&nbsp;". (($cz_config['tooltip_posts'] == 1) ? number_format($session['user_posts']) ."<br />" : "[&nbsp;Hidden&nbsp;]<br />");				
					
					$tooltip_overlay .= $img_t."<b>". $lang_userblock['TOOLTIP']['ADDON']['THEME'] . $lang_userblock['BREAK'] ."</b>&nbsp;". (($cz_config['tooltip_theme'] == 0) ? "[&nbsp;Hidden&nbsp;]<br />" : (($session['theme'] == '') ? $Default_Theme : $session['theme']) ."<br />");
									
					$tooltip_overlay .= $img_w."<b>". $lang_userblock['TOOLTIP']['ADDON']['LOCATION'] . $lang_userblock['BREAK'] ."</b>&nbsp;". (($cz_config['tooltip_where'] == 0) ? "[&nbsp;Hidden&nbsp;]" : (($session['module'] == '') ? 'News' : $session['module']));
					
					if($userinfo['user_level'] == 2 || $userinfo['user_level'] == 3)
					{
						$tooltip_overlay .= "<br />". $img_i ."<b>". $lang_userblock['TOOLTIP']['ADDON']['IPADDRESS'] . $lang_userblock['BREAK'] ."</b>&nbsp;".$session['host_addr'];
					}
					
					$tooltip_overlay .= "<br /><hr /><div align='center'><b>&copy; DarkForgeGFX</b></div><hr />";
					
					if($session['user_allow_viewonline']) 
					{	
					
					$out['text'] .= $where_at;
					$out['text'] .= mouse_overlay($session['user_id'], $position, $title, $caption, $tooltip_overlay, $session['uname']);
					if (isset($pic) && $pic != '')
					{
						$out['text'] .= "&nbsp;<img src='images/CZUser/admin/". $pic ."' border='0' vspace='1' alt=''>\n";
					}	
					$out['text'] .= "<br />";
					$hidden++;
				//} // if ($cz_config['czuser_tooltip'] == 1)
			} 
			elseif(is_admin())
			{
				$out['text'] .= $where_at;
				$out['text'] .= mouse_overlay($session['user_id'], $position, $title, $caption, $tooltip_overlay, '<i>'. $session['uname'] .'</i>');
				if (isset($pic) && $pic != '')
				{
					$out['text'] .= "&nbsp;<img src='images/CZUser/admin/". $pic ."' border='0' vspace='1' alt=''>\n";
				}	
				$out['text'] .= "<br />";
			}// if($session['user_allow_viewonline'])  
			else 
			{
            	$hidden++;
        	}			
			$i++;  
		}	
		$i--;
		$out['hidden'] = $hidden;	
		$out['total'] = $i;	
		$out['visible'] = $i-$hidden;
    	return $out;	
	}

	function czuser_get_guests_online($start) 
	{
    	global $prefix, $db, $cz_config, $lang_userblock, $identify;	
    	$result = $db->sql_query("SELECT `uname`, `url`, `module`, `host_addr` FROM `". $prefix ."_session` WHERE `guest` = '1' OR `guest` = '3'");	
    	$out['total'] = $db->sql_numrows($result);	
    	$i = $start;	
    	while ($session = $db->sql_fetchrow($result)) 
		{	
        	$num = ($i < 10) ? '0'.$i : $i;  
			
			$icon = (file_exists('images/CZUser/'. $session['uname'] .'.png')) ? $session['uname'] .'.png' : 'online_guest.png';	
			
			$where = "<a href=\"". str_replace("&", "&amp;", $session['url']) ."\" alt=\"". $session['module'] ."\" title=\"". $session['module'] ."\">". (($cz_config['czuser_pick'] == 1) ? '<img src="images/CZUser/'. $icon .'" border="0" align="absmiddle">' : $num.'.') ."</a>&nbsp;";		
			if(!is_admin()) 
			{
				$out['text'] .= "<br />". $where . $lang_userblock['BLOCK']['ONLINE']['GUEST']. "\n";
			} 
			else 
			{
				$user_agent = $identify->identify_agent();
            	if($user_agent['engine'] == 'bot') 
				{
                	$out['text'] .= "<br />". $where . $user_agent['ua'] ."\n";
            	} 
				else 
				{
                	$out['text'] .= "<br />". $where . $session['uname'] ."\n";
            	}
			}		
        	$i++;		
		}	
    	$db->sql_freeresult($result);	
    	return $out;	
	}

	function czuser_online_display($members, $guests) 
	{
		global $prefix, $db, $userinfo, $cz_config, $section_sub_img, $section_online_mem, $lang_userblock, $identify;
		$member_online_num = $db->sql_numrows($db->sql_query("SELECT `uname` FROM `". $prefix ."_session` WHERE `guest` = '0'"));
		$guest_online_num  = $db->sql_numrows($db->sql_query("SELECT `uname` FROM `". $prefix ."_session` WHERE `guest` = '1' OR `guest` = '3'"));
	
    	$out .= "<img src=\"". $section_online_mem ."\">&nbsp;<b><u>Online:</b></u>";
	
		if ($member_online_num > 0) 
		{
			if ($member_online_num >= 7) 
			{	
				$out .= "<br />&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['MEMBERS'] . $lang_userblock['BREAK'] ."&nbsp;<br>";	
    			$out .= "<div style=\"border: 0pt none; height: 100px; width: 100%; overflow: auto;\">". $members['text'] ."</div>";	
			} 
			else 
			{	
				$out .= "<br />&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['MEMBERS'] . $lang_userblock['BREAK'] ."&nbsp;<br />". $members['text'];	
			}
		}
	
		if($cz_config['czuser_guests'] == 1)
		{	
			if ($guest_online_num > 0) 
			{
				if ($guest_online_num >= 7) 
				{	
					$out .= "<br />&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['GUESTS'] . $lang_userblock['BREAK'] ."&nbsp;<br>";	
					$out .= "<div style=\"border: 0pt none; height: 100px; width: 100%; overflow: auto;\">". $guests['text'] ."</div>";	
				} 
				else 
				{
					$out .= "<br />&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['GUESTS'] . $lang_userblock['BREAK'] ."&nbsp;".$guests['text'];	
				}
			}
		}	
	elseif($cz_config['czuser_guests'] == 0)
		{
			$out .= '';
		}	
    	return $out;		
	}
	$czuser_online_members = czuser_get_members_online();
	$czuser_online_guests  = czuser_get_guests_online($czuser_online_members['total']+1);

/****[START]*************************************
 [Block: Online Members                         ]
*************************************************/
   	$member_online_num = $db->sql_numrows($db->sql_query("SELECT `uname` FROM `". $prefix ."_session` WHERE `guest` = '0'"));   
   	$guest_online_num  = $db->sql_numrows($db->sql_query("SELECT `uname` FROM `". $prefix ."_session` WHERE `guest` = '1'"));   
   	$spider_online_num = $db->sql_numrows($db->sql_query("SELECT `uname` FROM `". $prefix ."_session` WHERE `guest` = '3'"));
   
   	$total_online_num = ($member_online_num + $guest_online_num + $spider_online_num);
   
   	/*$m_percent =($member_online_num / $total_online_num) * 100; 
   	$m_percent = number_format($m_percent, 0);   
   
   	$g_percent =($guest_online_num / $total_online_num) * 100; 
   	$g_percent = number_format($g_percent, 0); 
     
   	$s_percent =($spider_online_num / $total_online_num) * 100; 
   	$s_percent = number_format($s_percent, 0);*/
   
/****[END]***************************************
 [Block: Online Members                         ]
*************************************************/
  
   	$row = $db->sql_ufetchrow("SELECT `total`, `members`, `spiders`, `nonmembers` FROM `". $prefix ."_czuser_mostonline`");   
   	$total      = intval($row['total']);   
   	$members    = intval($row['members']);   
   	$spiders    = intval($row['spiders']);   
   	$nonmembers = intval($row['nonmembers']);

   	if ($total < $total_online_num) 
	{   
   		$db->sql_uquery("DELETE FROM `". $prefix ."_czuser_mostonline` WHERE `total` = '". $total ."' LIMIT 1");   
   		$db->sql_uquery("INSERT INTO `". $prefix ."_czuser_mostonline` VALUES ('". $total_online_num ."', '". $member_online_num ."', '". $spider_online_num ."','". $guest_online_num ."')");   
  	 }

   	if (is_user()) 
	{ 
		if(is_user() && isset($userinfo) && is_array($userinfo)) 
		{
    		$userinfo_time = userinfo_create_date('G', time(), $userinfo['user_timezone']);
		} 
		else 
		{
    		$userinfo_time = userinfo_create_date('G', time(), $board_config['board_timezone']);
		}
		
		$content .= "<div align=\"center\">"; 
		if($userinfo_time >= 0 && $userinfo_time <= 11) 
		{
    		$content .= $lang_userblock['BLOCK']['MEMBER']['MORNING']."&nbsp;";
		} 
	elseif($userinfo_time >= 12 && $userinfo_time <= 17) 
		{
    		$content .= $lang_userblock['BLOCK']['MEMBER']['AFTERNOON']."&nbsp;";
		} 
	elseif($userinfo_time >= 18 && $userinfo_time <= 23) 
		{
    		$content .= $lang_userblock['BLOCK']['MEMBER']['EVENING']."&nbsp;";
		}
		$content .= "<br />".UsernameColor($userinfo['username']);
		$content .= "</div>";
			
		$content .= ($cz_config['czuser_ip'] == 1 || $cz_config['czuser_ip'] == 2) ? '<div align="center">'. $lang_userblock['BLOCK']['ADDON']['IPADDRESS'] .$lang_userblock['BREAK'] .'&nbsp;&nbsp;'. $identify->get_ip() .'</div>' : '';
		
		if ($userinfo['user_allowavatar']) 
		{
			$content .= "<div align=\"center\">";
			$content .= "<br />";
			if ($userinfo['user_avatar_type'] == 1)  
			{
				$content .= "<img src=\"". $board_config['avatar_path'] ."/". $userinfo['user_avatar'] ."\" alt=\"\">";
			} 
		elseif ($userinfo['user_avatar_type'] == 2) 
			{
				$content .= avatar_resize($userinfo['user_avatar']);
			} 
		elseif ($userinfo['user_avatar'] == '') 
			{
				$content .= "<img src=\"". $board_config['avatar_gallery_path'] ."/gallery/blank.gif\" alt=\"\">";
			} 
		elseif ($userinfo['user_avatar'] == $board_config['avatar_gallery_path'] ."/gallery/blank.gif") 
			{
				$content .= "<img src=\"". $board_config['avatar_gallery_path'] ."/gallery/blank.gif\" alt=\"\">";
			} 
		elseif ($userinfo['user_avatar'] == $board_config['avatar_gallery_path'] ."/blank.gif") 
			{
				$content .= "<img src=\"". $board_config['avatar_gallery_path'] ."/blank.gif\" alt=\"\">";
			} 
			else 
			{
				$content .= "<img src=\"". $board_config['avatar_gallery_path'] ."/". $userinfo['user_avatar'] ."\" alt=\"\">";
			}
			$content .= "<br /><br />";
			$content .= "</div>";
		}

		if ($cz_config['czuser_bbrank'] == 1) 
		{
			$result_rank = $db->sql_query("SELECT * FROM `". $prefix ."_bbranks` ORDER BY `rank_special`, `rank_min`");   
   			$ranksrow = array();   
   			while($row = $db->sql_fetchrow($result_rank)) 
			{   
           		$ranksrow[] = $row;		   
   			}   
   			$db->sql_freeresult($result_rank);
			$rank_image = '';
   			$poster_rank = '';

        	if ($userinfo['user_rank']) 
			{
				for($j = 0; $j < count($ranksrow); $j++) 
				{			
              		if ($userinfo['user_rank'] == $ranksrow[$j]['rank_id'] && $ranksrow[$j]['rank_special']) 
					{			  
                  		$poster_rank = $ranksrow[$j]['rank_title'];				  
                  		$rank_image = ($ranksrow[$j]['rank_image']) ? '<img src="modules/Forums/'. $ranksrow[$j]['rank_image'] .'" alt="'. $poster_rank .'" title="'. $poster_rank .'" border="0"><br />' : '';				  
              		}
			  
            	}
			
        	} 
			else 
			{		
           		for($j = 0; $j < count($ranksrow); $j++) 
				{		   
             		if ($userinfo['user_posts'] >= $ranksrow[$j]['rank_min'] && !$ranksrow[$j]['rank_special']) 
					{			 
                  		$poster_rank = $ranksrow[$j]['rank_title'];				  
                  		$rank_image = ($ranksrow[$j]['rank_image']) ? '<img src="modules/Forums/'. $ranksrow[$j]['rank_image'] .'" alt="'. $poster_rank .'" title="'. $poster_rank .'" border="0"><br />' : '';				  
             		}			 
           		}		   
        	}
		
   			if (empty($rank_image) && empty($poster_rank)) {
        		$content .= '';
   			}
			else 
			{
				$content .= "<div align=\"center\">". $rank_image . $poster_rank ."</div>";
				$content .= "<br />";
   			} 
		}
		
		if($cz_config['czuser_posts'] == 1)
		{
			$content .= "<div align=\"center\">". get_post_count(intval($userinfo['user_id'])) ." ". $lang_userblock['BLOCK']['POSTS']['POSTS'] ."</div>\n";
		}  
		
   		/*$content .= "<br />";
   		$content .= "<div align=\"center\">";
   		$content .= "[&nbsp;<a href=\"modules.php?name=Your_Account&amp;op=logout\">". $lang_userblock['LOGIN']['LOGOUT'] ."</a>&nbsp;]<br />";   
   		$content .= "[&nbsp;<a href=\"modules.php?name=Forums&amp;file=profile&amp;mode=editprofile\">". $lang_userblock['LOGIN']['EDITPROFILE'] ."</a>&nbsp;]";
		$content .= "</div>";*/

   		$content .= "<hr noshade='noshade'>";
		
  		if($cz_config['czuser_pms'] == 1) 
		{     
   			$content .= "<a href=\"modules.php?name=Your_Account\" alt=\"". $lang_userblock['BLOCK']['ONLINE']['MYACCOUNT']."\" title=\"". $lang_userblock['BLOCK']['ONLINE']['MYACCOUNT']."\"><img align=\"absmiddle\" src=\"". $section_account_info ."\" border=\"0\"></a>&nbsp;<u><b>". $lang_userblock['BLOCK']['ONLINE']['ACCOUNT'] ."</u></b><br />\n";
     
/****[START]***********************************************
 [Block: Check Private Messages                           ]
***********************************************************/
  			$new_pms = $db->sql_numrows($db->sql_query("SELECT `privmsgs_to_userid` FROM `". $prefix ."_bbprivmsgs` WHERE `privmsgs_to_userid` = '". $userinfo['user_id'] ."' AND (privmsgs_type='5' OR privmsgs_type='1')")); 

  			$content .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">\n";
  
			if ($new_pms > 0)
			{ 
				if ($cz_config['czuser_pms_alert'] == 1)
				{
					$content .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
					codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,42,0"
					id="newpm" width="0" height="0">
					<param name="movie" value="newpm.swf">
					<param name="bgcolor" value="#DDDDDD">
					<param name="quality" value="high">
					<param name="allowscriptaccess" value="samedomain">
					<embed type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" width="0" height="0" name="newpm" src="newpm.swf" bgcolor="#DDDDDD" quality="high" swLiveConnect="true" allowScriptAccess="samedomain" hidden="true"></embed></object>';
				}
				$content .= $lang_userblock['BLOCK']['PMS']['INBOX'] . $lang_userblock['BREAK'] ."&nbsp;<b><a href=\"modules.php?name=Private_Messages\" alt=\"". _CZ_CHECKPMS ."\" title=\"". $lang_userblock['BLOCK']['PMS']['OPEN_INBOX'] ."\">". intval($new_pms) ."</a></b><br />\n";
			}
			else
			{ 
				$content .= $lang_userblock['BLOCK']['PMS']['INBOX'] . $lang_userblock['BREAK'] ."&nbsp;<b><a href=\"modules.php?name=Private_Messages\" alt=\"". _CZ_CHECKPMS ."\" title=\"". $lang_userblock['BLOCK']['PMS']['OPEN_INBOX'] ."\">". intval($new_pms) ."</a></b><br />\n";
			}
			$content .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;<a href=\"modules.php?name=Your_Account&amp;op=logout\">". $lang_userblock['LOGIN']['LOGOUT'] ."</a><br />";
			
			$content .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;<a href=\"modules.php?name=Your_Account&op=ShowCookiesRedirect\">". $lang_userblock['LOGIN']['COOKIES'] ."</a>";
   
			/*if($userinfo['user_color_gc'] == "ffaf6a"){
				$content .= "Premium: <font color='ffaf6a'>Elite Member</a>";
			}
			else
			{
				$content .= "<img src=\"".$section_sub_img."\" align=\"absmiddle\"> Premium: <font color='e90000'>No Account</font></a>";
			}*/   
   			$content .= "<hr noshade='noshade'>";
		}
/****[END]*************************************************
 [Block: Check Private Messages                           ]
***********************************************************/

	} 
	else 
	{ 
   		//Display LOGIN information for Guests Only 
   		/*mt_srand((double)microtime()*1000000);   
   		$maxran = 1000000;   
   		$random_num = mt_rand(0, $maxran);*/
   
   		$content .= "<form action=\"modules.php?name=Your_Account\" method=\"post\">\n";
 
		if(is_user() && isset($userinfo) && is_array($userinfo)) 
		{
			$userinfo_time = userinfo_create_date('G', time(), $userinfo['user_timezone']);
		} 
		else 
		{
			$userinfo_time = userinfo_create_date('G', time(), $board_config['board_timezone']);
		}
		
		$content .= "<div align=\"center\">"; 
		if($userinfo_time >= 0 && $userinfo_time <= 11) 
		{
			$content .= $lang_userblock['BLOCK']['GUEST']['MORNING']."&nbsp;";
		} 
	elseif($userinfo_time >= 12 && $userinfo_time <= 17) 
		{
			$content .= $lang_userblock['BLOCK']['GUEST']['AFTERNOON']."&nbsp;";
		} 
	elseif($userinfo_time >= 18 && $userinfo_time <= 23) 
		{
			$content .= $lang_userblock['BLOCK']['GUEST']['EVENING']."&nbsp;";
		}
		$content .= "</div>";

		$content .= ($cz_config['czuser_ip'] == 1 || $cz_config['czuser_ip'] == 2) ? '<div align="center">'. $lang_userblock['BLOCK']['ADDON']['IPADDRESS'] .$lang_userblock['BREAK'] .'&nbsp;&nbsp;'. $identify->get_ip() .'</div>' : '';
	
		$content .= "<hr noshade='noshade'>";
	
		$content .= "<div align=\"center\"><img src=\"". $board_config['avatar_gallery_path'] ."/blank.gif\" alt=\"\"></div>";
	
		$content .= "<hr noshade='noshade'>";
	   
		$content .= "<div align=\"center\">";   
		$content .= "[ <a href=\"modules.php?name=Your_Account&amp;op=new_user\">". $lang_userblock['LOGIN']['REG'] ."</a> ]<br />\n";    
		$content .= "[ <a href=\"modules.php?name=Your_Account&op=pass_lost\">". $lang_userblock['LOGIN']['LOST'] ."</a> ]\n";   
		$content .= "</div>";
	   
		$content .= "<hr noshade='noshade'>";
		
		$content .= "<table align=\"center\">";
		$content .= "  <tr>";
		$content .= "    <td>". $lang_userblock['LOGIN']['USERNAME'] ."</td>";
		$content .= "    <td><input type=\"text\" name=\"username\" size=\"10\" maxlength=\"25\" /></td>";
		$content .= "  </tr>";
		$content .= "  <tr>";
		$content .= "   <td>". $lang_userblock['LOGIN']['PASSWORD'] ."</td>";
		$content .= "   <td><input type='password' name=\"user_password\" size=\"10\" maxlength=\"20\" /></td>";
		$content .= "  </tr>";
		$content .= "</table>";

/*****[BEGIN]******************************************
[ Mod:     Advanced Security Code Control     v1.0.0 ]
******************************************************/
   		$content .= security_code(array(2,4,5,7), 'stacked');
/*****[END]********************************************
[ Mod:     Advanced Security Code Control     v1.0.0 ]
******************************************************/
 
   		$content .= "<input type=\"hidden\" name=\"redirect\" value=\"". $redirect ."\">\n";    
   		$content .= "<input type=\"hidden\" name=\"mode\" value=\"". $mode ."\">\n";    
   		$content .= "<input type=\"hidden\" name=\"f\" value=\"". $f ."\">\n";    
   		$content .= "<input type=\"hidden\" name=\"t\" value=\"". $t ."\">\n";    
   		$content .= "<input type=\"hidden\" name=\"op\" value=\"login\">\n";    
   		$content .= "<div align=\"center\"><input type=\"submit\" value=\"". $lang_userblock['LOGIN']['LOGIN'] ."\"></div>"; 
     
   		$content .= "<hr noshade='noshade'>";   
	} 

   	$newest_user   = userinfo_newest_user();
   	$members_total = userinfo_total();
   	$waiting_total = userinfo_waiting();
   	$new_today     = userinfo_new_today();
	$new_yesterday = userinfo_new_yesterday();

   	$content .= "<a href=\"modules.php?name=Members_List\" alt=\"\"><img src=\"". $section_member_ship ."\" border=\"0\"></a>&nbsp;<u><b>". $lang_userblock['BLOCK']['USERS']['MEMBERSHIPS'] ."</u></b><br />\n";  
   	$content .= "&nbsp;<img src=\"".$section_sub_img."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['USERS']['NEW_TODAY'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($new_today) ."</b><br />\n";   
   	$content .= "&nbsp;<img src=\"".$section_sub_img."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['USERS']['NEW_YESTERDAY'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($new_yesterday) ."</b></b><br />\n";   
   	$content .= ($waiting_total > 0) ? '&nbsp;<img src="'. $section_sub_img .'" align="absmiddle">&nbsp;'. $lang_userblock['BLOCK']['USERS']['WAITING'] . $lang_userblock['BREAK'] .'&nbsp;<b>'. number_format($waiting_total) .'</b><br />' : '';   
   	$content .= "&nbsp;<img src=\"".$section_sub_img."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['USERS']['TOTAL'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($members_total) ."</b><br />\n";   
   	$content .= "&nbsp;<img src=\"".$section_sub_img."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['USERS']['LATEST'] . $lang_userblock['BREAK'] ."\n";   
   	$content .= UsernameColor($newest_user)."<br />\n"; 
 
	$statistics .= "<hr noshade='noshade'>";  
   	$statistics .= "<a href=\"modules.php?name=Statistics\" alt=\"\"><img src=\"". $section_most_online ."\" border=\"0\"></a>&nbsp;<u><b>". $lang_userblock['BLOCK']['MOST']['MOST'] ."</u></b><br />";   
   	$statistics .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['MEMBERS'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($members )."</b><br />\n";   
   	$statistics .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['GUESTS'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($nonmembers) ."</b><br />\n";   
   	$statistics .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['ONLINE']['SEARCHBOTS'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($spiders) ."</b><br />\n";    
   	$statistics .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"absmiddle\">&nbsp;". $lang_userblock['BLOCK']['USERS']['TOTAL'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($total) ."</b><br />\n"; 

   	if ($cz_config['czuser_mostonline'] == 1 || $cz_config['czuser_mostonline'] == 2) 
	{ 
   		if (is_user()) 
		{  
			$content .= $statistics;
   		}  
	}
elseif ($cz_config['czuser_mostonline'] == 2) 
	{   
   		$content .= $statistics;  
	}
elseif ($cz_config['czuser_mostonline'] == 2) 
	{
   		$content .= "";
   	}
	
	$online_stats .= "<hr noshade='noshade'>";   
	$online_stats .= "&nbsp;<img src='".$section_online_stats."'>&nbsp;<b><u>". $lang_userblock['BLOCK']['ONLINE']['STATS'] ."</u></b><br />\n";   
   	$online_stats .= "&nbsp;<img src='".$section_sub_img."' align='absmiddle'>&nbsp;". $lang_userblock['BLOCK']['ONLINE']['MEMBERS'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($member_online_num) ."</b><br />\n";   
   	$online_stats .= "&nbsp;<img src='".$section_sub_img."' align='absmiddle'>&nbsp;". $lang_userblock['BLOCK']['ONLINE']['GUESTS'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($guest_online_num) ."</b><br />\n";   
   	$online_stats .= "&nbsp;<img src='".$section_sub_img."' align='absmiddle'>&nbsp;". $lang_userblock['BLOCK']['ONLINE']['SEARCHBOTS'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($spider_online_num) ."</b><br />\n";   
   	$online_stats .= "&nbsp;<img src='".$section_sub_img."' align='absmiddle'>&nbsp;". $lang_userblock['BLOCK']['USERS']['TOTAL'] . $lang_userblock['BREAK'] ."&nbsp;<b>". number_format($total_online_num) ."</b><br />\n"; 
	
   	if ($cz_config['czuser_stats'] == 1 || $cz_config['czuser_stats'] == 2)
	{
   		if (is_user())
		{
   			$content .= $online_stats;	
   		}
   	}
elseif ($cz_config['czuser_stats'] == 2)
	{
		$content .= $online_stats; 
   	}
elseif ($cz_config['czuser_stats'] == 0)
	{
		$content .= "";
	}      
   	$content .= "<hr noshade='noshade'>";

	if($cz_config['czuser_groups'] == 1)
	{
		if (is_user() || is_admin()) 
		{
			$content .= "<img src=\"". $section_member_group ."\">&nbsp;<b><u>". $lang_userblock['BLOCK']['MEMBERS']['MEMBERS'] ."</u></b><br />\n";
    		$result = $db->sql_query("SELECT group_name FROM ".$prefix."_bbgroups LEFT JOIN ". $prefix."_bbuser_group on ". $prefix ."_bbuser_group.group_id=".$prefix."_bbgroups.group_id WHERE ".$prefix."_bbuser_group.user_id='". $userinfo['user_id'] ."' and ".$prefix."_bbgroups.group_description != 'Personal User'");
    		if ($db->sql_numrows($result) == 0) 
			{
          		$content .= "<img src=\"". $section_sub_img ."\" align=\"middle\" alt=\"\">&nbsp;". $lang_userblock['BLOCK']['MEMBERS']['MEMBERS_NONE'] ."<br />\n";
    		} 
			else 
			{
				while(list($group_name) = $db->sql_fetchrow($result)) 
				{
            		$group_name = GroupColor($group_name);
            		$content .= "&nbsp;<img src=\"". $section_sub_img ."\" align=\"middle\" alt=\"\">&nbsp;". $group_name ."<br />\n";
        		}
        		$db->sql_freeresult($result);
    		}		
			$content .= "<hr noshade='noshade'>";
		
		}	 
	}
   
 	if ($cz_config['czuser_online'] == 1) 
	{  
 		if (is_user())
		{ 
   			$content .= czuser_online_display($czuser_online_members, $czuser_online_guests);
   
 		}
		else
		{
			$content .= "<div align=\"center\">You must <a href=\"modules.php?name=Your_Account&amp;op=new_user\"><font color=\"red\"><b>". $lang_userblock['LOGIN']['REG'] ."</b></font></a> to interact with Members</div>";
		} 
	}
elseif ($cz_config['czuser_online'] == 2) 
	{ 
   		$content .= czuser_online_display($czuser_online_members, $czuser_online_guests);   
 	}
 
?>
