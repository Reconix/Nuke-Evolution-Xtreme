<?php

function editStaff($s) {

	global $db, $prefix, $admin_file, $user_prefix;
	
		if(!function_exists('get_userinfo_config'))
		{	
			include_once(NUKE_INCLUDE_DIR.'czuser_func.php');
		}	
	
	$catpath   = 'images/CZUser/admin/';	
	$imagepath = 'images/CZUser/';
	
    include(NUKE_BASE_DIR.'header.php');
	
    OpenTable();
	
			echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo "function update_pic(newimage) {";
			echo "	document.pic_image.src = '".$catpath."' + newimage;";
			echo "}";
			echo "</script>";
			
			echo "<center>";
		
		$result = $db->sql_query("SELECT pic, king, gname, caption FROM ". $prefix ."_czuser_info WHERE view = '$s'");
	
		echo "<table width='35%' border='1' cellpadding='1' cellspacing='1' align='center'><tr>";
	
		list($pic, $king, $gname, $caption) = $db->sql_fetchrow($result);
	
		echo "<b><font class='title'>Editing ". UsernameColor($s) ."</font><br><br>". _GOBACK ."</b><br /><br /><br />";
	
		if ($king == '1')
		{ 			
			$img = "admin.png"; 
			$num_staff01 = "checked";
		} 
	elseif ($king == '2')
		{ 
			$img = "staff.png"; 
			$num_staff02 = "checked";
		}
	
		echo "<td valign='middle' align='center'>".UsernameColor($s)." <img src='". $catpath . $pic ."' name='pic_image' border='0'></td><td valign='middle' align='center'><img src='".$imagepath."".$img."' border='0'></td>";
	
		if(!$gname)
		{	
			echo "<td valign='middle' align='center'>No group Selected</td>";	
		}
		else
		{	
			echo "<td valign='middle' align='center'>". GroupColor(get_group_name($gname)) ."</td>";	
		}
		echo "<td valign='middle' align='center'>". $caption ."</td>";
		echo "</tr></table><br><br>";
	
		echo "<form action='". $admin_file .".php?op=cz_update_staff' method='post'>Image <select name='pic' onchange='update_pic(this.options[selectedIndex].value);'>";
	
		$handle = opendir($catpath);		
		$tlist = '';	
		while ($file = readdir($handle)) if (preg_match("/(.*)\.(png|gif|jpg|jpeg)$/", $file)) $tlist .= "$file|";	
		closedir($handle);	
		$tlist = explode("|", $tlist);	
		sort($tlist);	
		for ($i = 0; $i < sizeof($tlist); $i++) 
		{	
			if ($tlist[$i] != "") 
			{		
				if ($tlist[$i] == $pic) 
				{
					$sel = 'selected'; 
				}
				else
				{
					$sel = '';
				}			
				echo "<option value='".$tlist[$i]."' ".$sel.">".$tlist[$i]."</option>";			
			}		
		}	
		echo "</select>&nbsp;";	
		echo "&nbsp;<img src='". $imagepath ."admin.png' border='0' alt='Admin' title='Admin'><input type='radio' name='king' value='1' ". $num_staff01 .">";				
		echo "&nbsp;<img src='". $imagepath ."staff.png' border='0' alt='Staff' title='Staff'><input type='radio' name='king' value='2' ". $num_staff02 .">";
		echo "&nbsp;<img src='". $imagepath ."online.png' border='0' alt='Member' title='Member'><input type='radio' name='add_king' id='add_king' value='2'>";	
		echo "&nbsp;&nbsp;&nbsp;<select name='gid'><option value=''>Select Group";

		$i=0;		
		$fmsql = "SELECT * FROM ". $prefix ."_bbgroups WHERE group_single_user = '0'";	
		$fmresult = $db->sql_query($fmsql);	
		while ($groups = $db->sql_fetchrow($fmresult))	
		{	
			$group_name = $groups['group_name'];
			$group_id   = $groups['group_id'];
			
			if ($gname == $group_id)
			{	
				echo "<option value='". $gname ."' selected>". $group_name; 	
			} 
			else 
			{	
				echo "<option value='". $group_id ."'>". $group_name;
			}
		}
		echo "</select>";
		echo "<br />";	
		echo "<b>Caption</b><br /><input type=\"text\" name=\"caption\" value=\"". $caption ."\" size=\"20\" />";
		echo "<br /><br />";
		echo "<input type='submit' value='Update User'>";	
		echo "<input type='hidden' name='urid' value='". $s ."'>";	
		echo "</form>";	
		echo "</center><br />";	
		echo "<div align='right'><a href='http://www.darkforgegfx.com' target='_blank'>&copy; DarkForgeGFX</a></div>";
	
	CloseTable();
	
	include(NUKE_BASE_DIR.'footer.php');
	
}

 editStaff($s);

?>