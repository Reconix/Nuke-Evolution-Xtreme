<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : index.php
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

	if(!defined('IN_DOWNLOADS')) 
	{
		exit('Access Denied');
	}

	if (!isset($cid)) 
	{ 
		$cid = 0; 
	}
	$cid = intval($cid);
	include_once(NUKE_BASE_DIR.'header.php');
	global $collapse;
	if (!isset($min))
	{
		$min = 0;
	}
	if (!isset($max)) 
	{
		$max = $min+$dl_config['perpage'];
	}
	if(isset($orderby)) 
	{ 
		$orderby = convertorderbyin($orderby); 
	} 
	else 
	{ 
		$orderby = "title ASC"; 
	}
	if ($cid == 0) 
	{
  		menu(0);
  		$title = _MAIN;
	} 
	else 
	{
  		menu(1);
  		$cidinfo = $db->sql_ufetchrow("SELECT * FROM `". $prefix ."_downloads_categories` WHERE `cid`='". $cid ."' AND active > '0'");
  		$title = getparentlink($cidinfo['parentid'], $cidinfo['title']);
  		$title = "<a href=\"modules.php?name=". $module_name ."\">". $module_name ."/". $title ."</a>";
	}
	
	echo "<br />";
	OpenTable();
	
		echo "<table align='center'>\n";
		echo "  <tr>\n";
		echo "    <td><span class='option'><strong>". _CATEGORY .": ". $title ."</strong></span></td>\n";
		echo "  </tr>\n";
		echo "</table>\n";
		$result2 = $db->sql_query("SELECT * FROM `". $prefix ."_downloads_categories` WHERE `parentid`='". $cid ."' ORDER BY `title`");
		$numrows2 = $db->sql_numrows($result2);
		if ($numrows2 > 0) 
		{
  			echo "<table align='center' border='0' cellpadding='10' cellspacing='1' width='100%'>\n";
  			$count = 0;
  			while($cidinfo2 = $db->sql_fetchrow($result2)) 
			{
				$title        = decode_bbcode(set_smilies(stripslashes($cidinfo2['title'])), 1, true);
    			$cdescription = decode_bbcode(set_smilies(stripslashes($cidinfo2['cdescription'])), 1, true);
				$style = '';
    			if ($collapse <> '0') 
				{
        			$style = 'style="display: none;"';
    			}
    			if ($count == 0) 
				{ 
					echo "<tr>\n"; 
				}
    			if ($dl_config['show_links_num'] == 1) 
				{
      				$cnumrows = $db->sql_numrows($db->sql_query("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE `cid`='". $cidinfo2['cid'] ."' AND `active` > '0'"));
      				$categoryinfo = getcategoryinfo($cidinfo2['cid']);
      				$cnumm = " (". $cnumrows ."/". $categoryinfo['downloads'] .")";
    			} 
				else 
				{
      				$cnumm = "";
    			}
				
				if($collapse <> 0)
				{
					$collapse_top = "<img src=\"". $image ."\" class=\"showstate\" name=\"". $name ."\" width=\"9\" height=\"9\" border=\"0\" onclick=\"expandcontent(this, 'category". $cidinfo2['cid'] ."')\" alt=\"\" style=\"cursor: pointer;\" />";
					$collapse_bottom = "id=\"category". $cidinfo2['cid'] ."\" class=\"switchcontent\" $style";
				}
				
    			echo "<td valign='top' width='33%'>";
				echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
    			echo "  <tr>\n";
				echo "    <td valign=\"top\">";
				if(!$_GET['cid'])
				{				
					echo "<table width=\"100%\" border=\"0\">\n";
					echo "  <tr>\n";
					echo "    <td align=\"right\">". $collapse_top ."</td>\n";
					echo "    <td valign=\"top\" align=\"left\"><img align='top' src='". myimage("dir.png") ."' border='0' alt='' title=''>&nbsp;";
					echo "<a href='modules.php?name=$module_name&amp;cid=". $cidinfo2['cid'] ."'><strong>". $title ."</strong></a>". $cnumm ."";
					newcategorygraphic($cidinfo2['cid']);
					echo "    </td>\n";
					echo "  </tr>\n";
					echo "</table>";	
				}
				else
				{
					echo "<img align='top' src='". myimage("dir.png") ."' border='0' alt='' title=''>&nbsp;";
					echo "<a href='modules.php?name=". $module_name ."&amp;cid=". $cidinfo2['cid'] ."'><b>". $title ."</b></a>". $cnumm ."";
				}			
				echo "    </td>\n";
				echo "  </tr>\n";
    			if ($cdescription) 
				{
      				echo "  <tr>\n";
					echo "    <td>";
					echo "      <table width=\"100%\">\n";
					echo "        <tr>\n";
					echo "          <td width=\"10%\"></td>\n";
					echo "          <td>". $cdescription ."</td>\n";
					echo "        </tr>\n";
					echo "      </table>\n";
					echo "    </td>\n";
					echo "  </tr>\n";
    			}
				echo "</table>\n";
    			$result3 = $db->sql_query("SELECT cid, title FROM `". $prefix ."_downloads_categories` WHERE `parentid`='".$cidinfo2['cid']."' AND `active` > '0' ORDER BY `title`");
				echo "<table width=\"100%\" ". $collapse_bottom .">";
				echo "  <tr>";
				echo "    <td>";
    			while($cidinfo3 = $db->sql_fetchrow($result3)) 
				{
      				if ($dl_config['show_links_num'] == 1) 
					{
        				$snumrows = $db->sql_numrows($db->sql_query("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE `cid`='".$cidinfo3['cid']."' AND `active` > '0'"));
        				$categoryinfosub = getcategoryinfo($cidinfo3['cid']);
        				$cnum = " (". $snumrows ."/". $categoryinfosub['downloads'] .")";
      				} 
					else 
					{
        				$cnum = "";
      				}
					
					$stitle = decode_bbcode(set_smilies(stripslashes($cidinfo3['title'])), 1, true);
					
					echo "<table width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
					echo "  <tr>";
					echo "    <td width=\"10%\"></td>";
					echo "    <td align=\"left\">";
					echo "      <span class=\"content\">";
					echo "        <img align=\"absmiddle\" src=\"". myimage("sub-dir.png") ."\" border=\"0\" alt=\"\" title=\"\">&nbsp;";				
					echo "        <a href=\"modules.php?name=". $module_name ."&amp;cid=". $cidinfo3['cid'] ."\">". $stitle ." </a>$cnum";
					echo "      </span>";
					echo "    </td>";
					echo "  </tr>\n";
					echo "</table>";
    			}
    			echo "    </td>";
				echo "  </tr>";
				echo "</table>";
				echo "</td>\n";
    			if ($count < 2) 
				{ 
					$dum = 1; 
				}
    			$count++;
    			if ($count == 3) 
				{ 
					echo "  </tr>\n"; 
					$count = 0; 
					$dum = 0; 
				}
  			}
			if ($dum == 1 && $count == 2) 
			{
    			echo "<td>&nbsp;</td>\n</tr>\n</table>\n";
  			} 	
			elseif ($dum == 1 && $count == 1) 
			{
    			echo "<td>&nbsp;</td>\n</tr>\n</table>\n";
				//echo "<td>&nbsp;</td>\n<td>&nbsp;</td>\n</tr>\n</table>\n";
  			} 
			elseif ($dum == 0) 
			{
    			echo "</tr>\n</table>\n";
  			}
		}
	
		$listrows = $db->sql_numrows($db->sql_query("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE active>'0' AND cid='$cid'"));
		if ($listrows > 0) 
		{	
			$op = $query = "";
  			$orderbyTrans = convertorderbytrans($orderby);
  			echo "<table border='0' cellpadding='0' cellspacing='4' width='100%'>";
  			echo "<tr><td colspan='2'><hr noshade size='1'></td></tr>";
  			echo "<tr><td align='center' colspan='2'><span class='content'>"._SORTDOWNLOADSBY.": ";
  			echo ""._TITLE." (<a href='modules.php?name=$module_name&amp;cid=$cid&amp;orderby=titleA'>A</a>\<a href='modules.php?name=$module_name&amp;cid=$cid&amp;orderby=titleD'>D</a>) ";
  			echo ""._DATE." (<a href='modules.php?name=$module_name&amp;cid=$cid&amp;orderby=dateA'>A</a>\<a href='modules.php?name=$module_name&amp;cid=$cid&amp;orderby=dateD'>D</a>) ";
			echo ""._POPULARITY." (<a href='modules.php?name=$module_name&amp;cid=$cid&amp;orderby=hitsA'>A</a>\<a href='modules.php?name=$module_name&amp;cid=$cid&amp;orderby=hitsD'>D</a>)";
 			echo "<br /><strong>"._RESSORTED.": $orderbyTrans</strong></span></td></tr>\n";
  			echo "</table>";
			
  			$totalselected = $db->sql_numrows($db->sql_query("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE `active` > '0' AND `cid`='". $cid ."'"));
  			pagenums($cid, $query, $orderby, $op, $totalselected, $dl_config['perpage'], $max);
  			echo "<div align='center'>";
			echo "<table border='0' cellpadding='0' cellspacing='4' width='100%'>";
		  	// START LISTING
		  	$x = 0;
		  	$a = 0;
		  	$result=$db->sql_query("SELECT `lid` FROM `". $prefix ."_downloads_downloads` WHERE `active` > '0' AND `cid`='". $cid ."' ORDER BY $orderby LIMIT $min,".$dl_config['perpage']);
		  	while(list($lid)=$db->sql_fetchrow($result)) 
			{
				if ($a == 0) 
				{ 
					echo "<tr>"; 
				}
				echo "<td valign='top' width='50%'><span class='content'>";
				showlisting($lid);
				echo "</span></td>";
				$a++;
				if ($a == 1) 
				{ 
					echo "</tr>"; 
					$a = 0; 
				}
				$x++;
		  	}
		  	if ($a == 1) 
			{ 
				echo "<td width=\"50%\">&nbsp;</td></tr>"; 
			} 
			else 
			{ 
				echo "</tr>"; 
			}
		  	echo "</table>";
  			echo "</div>";
			
 			$orderby = convertorderbyout($orderby);
  			pagenums($cid, $query, $orderby, $op, $totalselected, $dl_config['perpage'], $max);
		}
		
	CloseTable();
	include_once(NUKE_BASE_DIR.'footer.php');

?>