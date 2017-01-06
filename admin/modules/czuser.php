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
 [ Guest & Bots Display						 Last updated 29/07/07 ]
 [ Tooltip MouseOver Feature				 Last updated 24/08/07 ]
 [ Advanced Username Color					 Last updated 29/07/07 ]
 [ Audio Private Message Alert				 Last updated 29/07/07 ] 
 [ BBForum group Display					 Last updated 29/07/07 ]
 [ Section Image Control                     Last Updated 24/08/07 ] 
********************************************************************/

	function main() 
	{
		global $db, $prefix, $user_prefix, $admin_file, $nukeurl;	
    	include(NUKE_BASE_DIR.'header.php');
		
		if(!function_exists('get_userinfo_config'))
		{	
			include_once(NUKE_INCLUDE_DIR.'czuser_func.php');
		}	
	
		$cz_config = get_userinfo_config();
		$catpath = 'images/CZUser/admin/';
		$imagepath = 'images/CZUser/';
		$uploaddir = $catpath;
	
		echo "<script language=\"javascript\" type=\"text/javascript\">";
		echo "function checkedAll (id, checked) {";
		echo "	var el = document.getElementById(id);";
		echo "	for (var i = 0; i < el.elements.length; i++) {";
	  	echo "	el.elements[i].checked = checked;";
		echo "}";
      	echo "}";
		echo "</script>";
		
		echo "<script language=\"javascript\" type=\"text/javascript\">";
		echo "function update_pic(newimage) {";
		echo "	document.pic_image.src = '". $catpath ."' + newimage;";
		echo "}";
		echo "</script>";
		
		cuzser_admin_header();

    	OpenTable();			
	
			echo "<div align=\"center\">";

			$result = $db->sql_query("SELECT `pic`, `view`, `king`, `gname`, `caption` FROM `". $prefix ."_czuser_info` ORDER BY `view` ASC");
			$full_count = $db->sql_numrows($result);
	
			echo "<fieldset><legend>( ". $full_count ." ) Modified Members</legend>";	
			echo "<div style=\"overflow: auto; width: 565px; height: 300px\">";
			
			if ($full_count > 0) 
			{	
				echo "<form action=\"". $admin_file .".php?op=czuser\" method=\"post\" id=\"members\">";	
				echo "<table border=\"1\" cellpadding=\"2\" cellspacing=\"2\">";
            	while (list($pic, $view, $king, $gid, $caption) = $db->sql_fetchrow($result)) 
				{
					echo "  <tr>";
					echo "	  <td valign=\"middle\" align=\"center\"><input type=\"checkbox\" name=\"mem[]\" value=\"". $view ."\">&nbsp;<a href=\"". $admin_file .".php?op=cz_edit_member&amp;s=". $view ."\"><img src=\"". $imagepath ."edit.png\" border=\"0\"></a></td>";
					echo "    <td valign=\"middle\" align=\"center\"><img src=\"". $imagepath . (($king == '0') ? 'online.png' : (($king == '1') ? 'admin.png' : 'staff.png')) ."\" border=\"0\"> </td>";
					echo "    <td valign=\"middle\" align=\"left\">". UsernameColor($view) ." <img src=\"". $catpath . $pic ."\" border=\"0\"></td>";					
					echo "    <td valign=\"middle\" align=\"center\">". ((!$gid) ? 'No Group Selected' : GroupColor(get_group_name($gid))) ."</td>";
					echo "    <td valign=\"middle\" align=\"left\">". $caption ."</td>";			
            		echo "  </tr>";	
            	}			
				echo "</table>";			
				echo "<br />";				
				echo "<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\">";
				echo " <tr>";
				echo "   <td><a href=\"javascript:void(0);\" onClick=\"checkedAll('members', true)\">Check All</a></td>";
				echo "   <td><a href=\"javascript:void(0);\" onClick=\"checkedAll('members', false)\">UnCheck All</a></td>";
				echo " </tr>";	
				echo "</table>";
							
				echo "<br />";	
							
				echo "<input type=\"hidden\" name=\"op\" value=\"cz_del_member\">";
				echo "<div align=\"center\"><input type=\"submit\" name=\"submit\" value=\"Delete Selected Members\"></div>";		
				echo "</form>";				
			}		
			echo "</div>";			
			echo "</fieldset>";	
	
			echo "<br />";
			
/****[END]*************************************************
 [CZUser Info:     Modified Member's                v 2.1 ]
***********************************************************/
/****[START]***********************************************
 [CZUser Info:		Add Member To Database          v 2.1 ]
***********************************************************/	

			$result = $db->sql_query("SELECT w.view, u.username, u.user_id, u.user_color_gc FROM `" . $user_prefix . "_users` AS u LEFT JOIN `" . $prefix . "_czuser_info` AS w ON u.username = w.view WHERE u.user_id > 1 AND w.view IS NULL ORDER BY u.username");	
			$member_count = $db->sql_numrows($result); $lista = array();
	
			while ($listuser = $db->sql_fetchrow($result))
			{
				array_push($lista, $listuser['username']);
				$color = $listuser['user_color_gc'];
			}			
	
			if ($member_count > 500) 
			{	
				echo "<fieldset><legend>Customized Member's</legend>";
				echo "<table border=\"1\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\">";
				echo "  <tr>";
				echo "    <td align=\"middle\" colspan=\"2\"><strong>User Selection</strong></td>";
				echo "  <tr>";
				echo "  <tr>";
				echo "    <td align=\"right\">List selector</td>";
				echo "    <td align=\"left\">";			
			}			
			echo "<form action=\"" . $admin_file . ".php?op=cz_add_member\" method=\"post\">";
			echo "<select name=\"add_name\">";
			echo "  <option value=\"\">Please Choose</option>";
			
			$p = $_GET['page']; 
			if (isset($p) && (($p - 1) * 500) < $member_count)
			{
				$inizio = ($p - 1) * 500;
			}
			else
			{
				$inizio = 0;
			}
					
			$fine = $inizio + 499; 
			if ($fine > $member_count - 1)
			{ 
				$fine = $member_count - 1;
			}
					
			for ($u = $inizio; $u <= $fine; $u++)
			{
				echo "<option value=\"". $lista[$u] ."\">". $lista[$u] ."</option>";
			}
								
			echo "</select>";	
			if ($member_count > 500) 
			{
				$tp = floor($member_count / 500);
				$np = $tp + (fmod($member_count, 500) > 0 ? 1 : 0);
				$lp = '';
				for ($p = 1; $p < $np; $p++) 
				{
					$lp .= "<a href=\"". $admin_file .".php?op=czuser&amp;page=". $p ."\">". $p ."</a>";
					$lp .= " | ";
					$lp .= "<a href=\"". $admin_file .".php?op=czuser&amp;page=". $np ."\">". $np ."</a>";
				}
				echo "    </td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td align='right'>Page Select</td>";
				echo "    <td align='left'>". $lp ."</td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td align=\"right\">Manual input</td>";
				echo "    <td align=\"left\"><input type=\"text\" name=\"manual_name\" value=\"\" alt=\"Manual Name Input\" title=\"Manual Name Input\"></td>";
				echo "  </tr>";		
				echo "    </td>";
				echo "  </tr>";
				echo "</table>";
				
				echo "<br />";
		
			} 
			else 
			{ 				
				echo "&nbsp;";				
			}
	
			echo "Image <select name=\"add_pic\" onchange=\"update_pic(this.options[selectedIndex].value);\">";
	
   			$handle = opendir($catpath);	
			$tlist = '';	
				
			while ($file = readdir($handle))
			{ 
				if (preg_match("/(.*)\.(png|gif|jpg|jpeg)$/i", $file))
				{
					$tlist .= $file.'|';	
				}
			}
			closedir($handle);	
			$tlist = explode('|', $tlist);	
			sort($tlist);	
			for ($i = 0; $i < sizeof($tlist); $i++)
			{ 
				if ($tlist[$i] != "")
				{
					echo "<option value='". $tlist[$i] ."'>". $tlist[$i] ."</option>";	
				}
			}
			echo "</select>&nbsp;";
	
			echo "<img name=\"pic_image\" src=\"". $catpath ."admin.gif\" border=\"0\">";				
			echo "&nbsp;<img src=\"". $imagepath ."admin.png\" border=\"0\" alt=\"Admin\" title=\"Admin\"><input type=\"radio\" name=\"add_king\" id=\"add_king\" value=\"1\">";				
			echo "&nbsp;<img src=\"". $imagepath ."staff.png\" border=\"0\" alt=\"Staff\" title=\"Staff\"><input type=\"radio\" name=\"add_king\" id=\"add_king\" value=\"2\">";
			echo "&nbsp;<img src=\"". $imagepath ."online.png\" border=\"0\" alt=\"Member\" title=\"Member\"><input type=\"radio\" name=\"add_king\" id=\"add_king\" value=\"2\" checked>";
	
			echo "&nbsp;&nbsp;&nbsp;<select name=\"gname\"><option value=\"\">Select Group";

			$i = 0;
    		$fmresult = $db->sql_query("SELECT * FROM `". $prefix ."_bbgroups` WHERE `group_single_user` = '0'");
    		while ($groups = $db->sql_fetchrow($fmresult)) 
			{
    			$group_name = $groups['group_name'];
				$group_id   = $groups['group_id'];
				echo "<option value=\"". $group_id ."\">". $group_name;
			}
			echo "</select>";
			echo "<br /><br />";
			echo "<b>Caption</b><br /><input type=\"text\" name=\"caption\" size=\"20\" />";
			echo "<br /><br /><input type=\"submit\" value=\"Add User To Database\">";
			echo "</form>";
			echo "</div><br />";
				
/****[END]*************************************************
 [CZUser Info:		Add Member To Database          v 2.1 ]
***********************************************************/	
			
    	CloseTable();
		
		OpenTable();
	
				echo "<center>";
				
				echo "<fieldset><legend>Category Image Upload</legend>";
				
				echo "<form action=\"". $admin_file .".php?op=czuser\" method=\"post\" enctype=\"multipart/form-data\">";				
				echo "Upload This Image: <input type=\"file\" name=\"userfile\">";				
				echo "<br />( Allowed Image Type's: JPEG, JPG, GIF & PNG )<br /><br />";				
				echo "<input type=\"hidden\" name=\"op\" value=\"cz_upload_catimage\">";				
				echo "<input type=\"hidden\" name=\"max_file_size\" value=\"30000\">";				
				echo "<input type=\"submit\" value=\"Upload Category Image\">";				
				echo "</form>";
				
				echo "<br />";				
	
				echo "<form method=\"post\" action=\"". $admin_file .".php?op=czuser\" id=\"borrar\">";
				
				$num = 0;
    			$result = $db->sql_query("SELECT `img_id`, `img_pic` FROM `". $prefix ."_czuser_ranks` ORDER BY `img_pic` ASC");
    			$numrows = $db->sql_numrows($result);
				
				if ($numrows > 0) 
				{				
					echo "<div align=\"center\">". $numrows ." Catergory Image's</div><br />";
            		echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\">";
            		while(list($img_id, $img_pic) = $db->sql_fetchrow($result)) 
					{
                		if ($num == 0) 
						{ 
							echo "  <tr>"; 
						}
                		echo "<td>";
                		echo "<table border=\"0\">";
						echo "  <tr align=\"center\">";
						echo "    <td><input type=\"checkbox\" name=\"arc[]\" value=\"". $img_pic ."\"></td>";
						echo "    <td><img src=\"". $catpath . $img_pic ."\" align=\"absmiddle\"></td>";
						echo "  </tr>";
						echo "</table>";
						echo "</td>";
                		$num++;
                		if ($num == 5) 
						{ 
							echo "  </tr>"; 
							$num = 0; 
						}
					}
            		$db->sql_freeresult($result);
            		if ($num == 1) 
					{ 
						echo "<td>&nbsp;</td></tr></table>"; 
					} 
					else 
					{ 
						echo "</tr></table>"; 
					}
				}
				
				echo "<br />";
				
				echo "<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\">";
				echo " <tr>";
				echo "   <td><a href=\"javascript:void(0);\" onClick=\"checkedAll('borrar', true)\">Check All</a></td>";
				echo "   <td><a href=\"javascript:void(0);\" onClick=\"checkedAll('borrar', false)\">UnCheck All</a></td>";
				echo " </tr>";	
				echo "</table>";
				
				echo "<br />";
				
				echo "<input type=\"hidden\" name=\"op\" value=\"cz_del_catimage\">";
				echo "<div align=\"center\"><input type=\"submit\" name=\"submit\" value=\"Delete Selected Images\"></div>";
				
				echo "</form>";
				echo "</fieldset>";
	
				$img = $db->sql_ufetchrow("SELECT * FROM `". $prefix ."_czuser_images`");	

				echo "<fieldset><legend>Section Image Control</legend>";
				echo "<table width=\"80%\" border=\"1\" cellspacing=\"3\" cellpadding=\"3\" align=\"center\">";
				echo "<tr><th width=\"80%\" scope=\"col\">Section Image Control</th></tr>";
				echo "</table>";

				echo "<table width=\"80%\" border=\"1\" cellspacing=\"3\" cellpadding=\"3\" align=\"center\">";
				echo "<tr><th width=\"25%\">Section Name</th><th width=\"25%\">Image Link & Current image</th></tr>";
				echo "</table>";

				echo "<form action=\"". $admin_file .".php?op=czuser\" method=\"post\">";
				echo "<table width=\"80%\" border=\"1\" cellspacing=\"3\" cellpadding=\"3\" align=\"center\">";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Account Info:</b></td>";
				echo "    <td width=\"25%\"><input name=\"account_info\" type=\"text\" size=\"30\" value=\"".$img['account_info']."\">&nbsp;<img src=\"".$img['account_info']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Memberships:</a></td>";
				echo "    <td width=\"25%\"><input name=\"member_ship\" type=\"text\" size=\"30\" value=\"".$img['member_ship']."\">&nbsp;<img src=\"".$img['member_ship']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Most Ever Online:</a></td>";
				echo "    <td width=\"25%\"><input name=\"most_online\" type=\"text\" size=\"30\" value=\"".$img['most_online']."\">&nbsp;<img src=\"".$img['most_online']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Online Stats:</a></td>";
				echo "    <td width=\"25%\"><input name=\"online_stats\" type=\"text\" size=\"30\" value=\"".$img['online_stats']."\">&nbsp;<img src=\"".$img['online_stats']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Page Views:</a></td>";
				echo "    <td width=\"25%\"><input name=\"page_views\" type=\"text\" size=\"30\" value=\"".$img['page_views']."\">&nbsp;<img src=\"".$img['page_views']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Membership Groups:</a></td>";
				echo "    <td width=\"25%\"><input name=\"member_group\" type=\"text\" size=\"30\" value=\"".$img['member_group']."\">&nbsp;<img src=\"".$img['member_group']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Members Online:</a></td>";
				echo "    <td width=\"25%\"><input name=\"online_mem\" type=\"text\" size=\"30\" value=\"".$img['online_mem']."\">&nbsp;<img src=\"".$img['online_mem']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "  <tr>";
				echo "    <td width=\"25%\"><b>Sub Section Image:</a></td>";
				echo "    <td width=\"25%\"><input name=\"sub_img\" type=\"text\" size=\"30\" value=\"".$img['sub_img']."\">&nbsp;&nbsp;<img src=\"".$img['sub_img']."\" align=\"absmiddle\"></td>";
				echo "  </tr>";
				echo "</table>";
				echo "<input type=\"hidden\" name=\"op\" value=\"cz_img_settings\">";
				echo "<br /><br />";
				echo "<div align=\"center\"><input type=\"submit\" value=\"Save Image Settings\"></div>";
				echo "</form>";
				echo "</fieldset>";

		CloseTable();
		
		OpenTable();

				echo "<form action=\"". $admin_file .".php?op=czuser\" method=\"post\">";
				echo "<table width=\"80%\" border=\"1\" cellspacing=\"3\" cellpadding=\"3\" align=\"center\">";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Display IP Address:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_ip', $cz_config['czuser_ip']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Show Private Messages:</strong></td>";	
				echo "	  <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_pms', $cz_config['czuser_pms']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Use Audio Private Messages Alert:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_pms_alert', $cz_config['czuser_pms_alert']);
				echo "    </td>";
				echo "  </tr>";
  
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Show User Posts:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_posts', $cz_config['czuser_posts']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Display User Avatars:</strong></td>";
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_avatar', $cz_config['czuser_avatar']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "    <tr>";
				echo "    <td width=\"40%\"><strong>Display Forum BBRanks:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_bbrank', $cz_config['czuser_bbrank']);
				echo "    </td>";
				echo "  </tr>";

				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Show Most Ever Online:</strong></td>";
	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_mostonline', $cz_config['czuser_mostonline']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Show Online Stats:</strong></td>";
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_stats', $cz_config['czuser_stats']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Show Group Memberships:</strong></td>";
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_groups', $cz_config['czuser_groups']);
				echo "    </td>";
				echo "  </tr>";
  
				echo "  <tr>";
				echo "    <td width=\"40%\"><b>ToolTip Mode:</b></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_tooltip', $cz_config['czuser_tooltip']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Display Online Users to Anonymous:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_online', $cz_config['czuser_online']);
				echo "    </td>";
				echo "  </tr>";
				
				echo "    <tr>";
				echo "    <td width=\"40%\"><strong>Display Guest & Bots:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xczuser_guests', $cz_config['czuser_guests']);
				echo "    </td>";
				echo "  </tr>";
				
				//$value = $cz_config['czuser_pick'];
				$sel[$cz_config['czuser_pick']] = ' checked="checked"';
				
				echo "  <tr>"; 
				echo "    <td width=\"40%\"><strong>Use image or numbers:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo "<input name=\"xczuser_pick\" type=\"radio\" value=\"1\" ". $sel[1] ."><img src=\"".$imagepath."online.png\" border=\"0\">&nbsp;";
				echo "<input name=\"xczuser_pick\" type=\"radio\" value=\"0\" ". $sel[0] .">01.</td>";
				echo "  </tr>";
				
				//$value = $cz_config['czuser_mode'];
				$sel[$cz_config['czuser_mode']] = ' checked="checked"';
				 
				echo "  <tr>"; 
				echo "    <td width=\"40%\"><strong>Order Online Users By:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo "      <input name=\"xczuser_mode\" type=\"radio\" value=\"1\" ". $sel[1] .">Username&nbsp;";
				echo "      <input name=\"xczuser_mode\" type=\"radio\" value=\"2\" ". $sel[0] .">User ID&nbsp;";
				echo "    </td>";
				echo "  </tr>"; 
				echo "</table>"; 	
			
				echo "<br />";	

				echo "<table width=\"80%\" border=\"1\" cellspacing=\"3\" cellpadding=\"3\" align=\"center\">";
				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Display Avatar:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_avatar', $cz_config['tooltip_avatar']);
				echo "    </td>";
				echo "  </tr> ";

				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Display Username:</strong></td>";		
				echo "	  <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_username', $cz_config['tooltip_username']);
				echo "    </td>";
				echo "  </tr>";

				echo "  <tr>";
				echo "    <td width=\"40%\"><strong>Display Email Addy:</strong></td>";
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_email', $cz_config['tooltip_email']);
				echo "    </td>";
				echo "  </tr>";

				echo "  <tr> "; 
				echo "    <td width=\"40%\"><strong>Display Registration Date:</strong></td";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_reg_date', $cz_config['tooltip_reg_date']);
				echo "    </td>";
				echo "  </tr> ";	

				echo "  <tr> ";	 
				echo "    <td width=\"40%\"><strong>Display Post Count:</strong></td>	";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_posts', $cz_config['tooltip_posts']);
				echo "    </td>";
				echo "  </tr>";

				echo "  <tr>"; 
				echo "    <td width=\"40%\"><strong>Display Theme Used:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_theme', $cz_config['tooltip_theme']);
				echo "    </td>";
				echo "  </tr>";

				echo "  <tr>";	 
				echo "    <td width=\"40%\"><strong>Display Site Location:</strong></td>";	
				echo "    <td width=\"40%\" align=\"left\">";
				echo yesno_option('xtooltip_where', $cz_config['tooltip_where']);
				echo "    </td>";
				echo "  </tr>";	
				
				echo "</table>";

				echo "<br /><br />";
				
				echo "<input type=\"hidden\" name=\"op\" value=\"cz_settings\">";
				echo "<div align=\"center\"><input type=\"submit\" value=\"Save Block Settings\"></div>";
				echo "</form>";

				echo "<div align=\"right\"><a href=\"http://www.darkforgegfx.com\">&copy; DarkForgeGFX</a></div>";  
				
		CloseTable();
		 
	include(NUKE_BASE_DIR.'footer.php');	
}

	switch ($op) 
	{		
		case 'cz_add_member':      include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_add_member.php'); break;
		case 'cz_update_staff':    include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_update_staff.php'); break;
		case 'cz_img_settings':    include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_img_settings.php'); break;
		case 'cz_settings':        include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_settings.php'); break;
		case 'cz_edit_member':     include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_editmember.php'); break;
		case 'cz_upload_catimage': include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_uploadimages.php'); break;
		case 'cz_del_catimage':    include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_deleteimages.php'); break;
		case 'cz_del_member':      include_once(NUKE_ADMIN_MODULE_DIR.'CZUser/cz_massdeletemember.php'); break;
		default: main();
	}

?>
