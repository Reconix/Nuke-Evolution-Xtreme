<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadModify.php
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

	/*$request = $db->sql_query("SELECT `url` FROM `". $prefix ."_downloads_downloads` WHERE `lid`='$lid'");
	list ($download_url) = $db->sql_fetchrow($request);*/

	if (!isset($min)) 
	{ 
		$min = 0; 
	}
	$pagetitle = _DOWNLOADSADMIN." - "._MODDOWNLOAD;
	include_once(NUKE_BASE_DIR.'header.php');
	OpenTable();
	
		echo "<div align=\"center\">\n<a href=\"". $admin_file .".php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
		echo "<br /><br />";
		echo "<div align=\"center\">\n[ <a href=\"". $admin_file .".php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";

	CloseTable();
	echo "<br />";
	title($pagetitle);
	DLadminmain();
	echo "<br />\n";
	OpenTable();
	
		$lidinfo = $db->sql_ufetchrow("SELECT * FROM `". $prefix ."_downloads_downloads` WHERE `lid`='$lid'");
		if (empty($lidinfo['submitter'])) 
		{ 
			$lidinfo['submitter'] = $anonymous; 
		}
		$lidinfo['homepage'] = ereg_replace("http://", "", $lidinfo['homepage']);
		if ($lidinfo['homepage'] <> '') 
		{ 
			$lidinfo['homepage'] = "http://".$lidinfo['homepage']; 
		}
		$lidinfo['title']       = stripslashes($lidinfo['title']);
		$lidinfo['description'] = stripslashes($lidinfo['description']);
		
		$screenshot1_preview = (!empty($lidinfo['screenshot1'])) ? '<a href="modules/'. $module_name .'/screenshots/'. $lidinfo['screenshot1'] .'" rel=\"lytebox\" />Current Image</a>' : 'No Image Uploaded';
		$screenshot2_preview = (!empty($lidinfo['screenshot2'])) ? '<a href="modules/'. $module_name .'/screenshots/'. $lidinfo['screenshot2'] .'" rel=\"lytebox\" />Current Image</a>' : 'No Image Uploaded';
		$screenshot3_preview = (!empty($lidinfo['screenshot3'])) ? '<a href="modules/'. $module_name .'/screenshots/'. $lidinfo['screenshot3'] .'" rel=\"lytebox\" />Current Image</a>' : 'No Image Uploaded';
		$screenshot4_preview = (!empty($lidinfo['screenshot4'])) ? '<a href="modules/'. $module_name .'/screenshots/'. $lidinfo['screenshot4'] .'" rel=\"lytebox\" />Current Image</a>' : 'No Image Uploaded';
		
		echo "<form action='". $admin_file .".php?op=DownloadModifySave' method='post' name='modify_download' enctype='multipart/form-data'>\n";
		echo "<input type=\"hidden\" name=\"download_url\" value=\"". $lidinfo['url'] ."\" />";
		echo "<input type=\"hidden\" name=\"ss1\" value=\"". $lidinfo['screenshot1'] ."\" />";
		echo "<input type=\"hidden\" name=\"ss2\" value=\"". $lidinfo['screenshot2'] ."\" />";
		echo "<input type=\"hidden\" name=\"ss3\" value=\"". $lidinfo['screenshot3'] ."\" />";
		echo "<input type=\"hidden\" name=\"ss4\" value=\"". $lidinfo['screenshot4'] ."\" />";
		echo "<table width='80%' align='center' cellpadding='4' cellspacing='4' border='0' align='center'>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _DOWNLOADID .":</th>\n";
		echo "    <td><strong>$lid</strong></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _TITLE .":</th>\n";
		echo "    <td><input type='text' name='title' value='". $lidinfo['title'] ."' size='75' maxlength='100'></td>\n";
		echo "  </tr>\n";
		$url_folder = 'modules/'. basename(dirname(dirname(__FILE__))) .'/files';
		if(substr($lidinfo['url'], 0, strlen($url_folder)) <> $url_folder) 
		{
			$check = "[ <a href='". $lidinfo['url'] ."' target='new'>". _CHECK ."</a> ]";
		} 
		else 
		{
			$check = '';
		}
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _URL .":</th>\n";
		echo "    <td><input type='text' name='url' value='". $lidinfo['url'] ."' size='75' maxlength='100'>&nbsp;". $check ."</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>Upload File:<br /><i>Extensions ( .zip, .rar, .tar, .gz, .gtar & .ace )</i></th>\n";
		echo "    <td width='70%'><input type='file' name='upload' size='75'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>External Mirror:</th>\n";
		echo "    <td width='70%'><input type='text' name='external_mirror1' size='75' maxlength='255' value='". $lidinfo['external_mirror1'] ."'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>External Mirror:</th>\n";
		echo "    <td width='70%'><input type='text' name='external_mirror2' size='75' maxlength='255' value='". $lidinfo['external_mirror2'] ."'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _CATEGORY .":</th>\n";
		echo "    <td>";
		echo "      <select name='cat'>";
		echo "        <option value='0' ". (($lidinfo['cid'] == 0) ? 'selected="selected"' : '') .">". _DL_NONE ."</option>\n";
		$result2 = $db->sql_query("SELECT * FROM `". $prefix ."_downloads_categories` ORDER BY parentid, title");
		while($cidinfo = $db->sql_fetchrow($result2)) 
		{
		  	if ($cidinfo['parentid'] <> 0) 
			{
				$cidinfo['title'] = getparent($cidinfo['parentid'], $cidinfo['title']);
			}
		  	echo "<option value='". $cidinfo['cid'] ."' ". (($cidinfo['cid'] == $lidinfo['cid']) ? 'selected="selected"' : '') ."'>". $cidinfo['title'] ."</option>\n";
		}
		echo "</select></td></tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _DL_PERM .":</th>\n";
		echo "    <td>";
		echo "      <select name='perm'>\n";
		echo "        <option value=''>(permissions)</option>";
		echo "        <optgroup label='General'>\n";
		echo "          <option value='0' ". (($lidinfo['sid'] == 0) ? 'selected="selected"' : '') .">"._DL_ALL;
		echo "          <option value='1' ". (($lidinfo['sid'] == 1) ? 'selected="selected"' : '') .">"._DL_USERS;
		echo "          <option value='2' ". (($lidinfo['sid'] == 2) ? 'selected="selected"' : '') .">"._DL_ADMIN;
		echo "        </optgroup>";
		echo "        <optgroup label='Groups'>\n";
		$gresult = $db->sql_query("SELECT * FROM `". $prefix ."_bbgroups` WHERE `group_single_user` <> '1' ORDER BY `group_name`");
		while($gidinfo = $db->sql_fetchrow($gresult)) 
		{
		  	$gidinfo['group_id'] = $gidinfo['group_id'] + 2;
		  	echo "<option value='".$gidinfo['group_id']."' ". (($lidinfo['sid'] == $gidinfo['group_id']) ? 'selected="selected"' : '') .">".$gidinfo['group_name']." "._DL_ONLY."</option>\n";
		}
		echo "        </optgroup>";
		echo "      </select>";
		echo "    </td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage1' size='75' maxlength='255' /><br /><input type=\"checkbox\" name=\"delete_screenshot1\" value=\"1\" /> Delete - ". $screenshot1_preview ."</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage2' size='75' maxlength='255' /><br /><input type=\"checkbox\" name=\"delete_screenshot2\" value=\"1\" /> Delete - ". $screenshot2_preview ."</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage3' size='75' maxlength='255' /><br /><input type=\"checkbox\" name=\"delete_screenshot3\" value=\"1\" /> Delete - ". $screenshot3_preview ."</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage4' size='75' maxlength='255' /><br /><input type=\"checkbox\" name=\"delete_screenshot4\" value=\"1\" /> Delete - ". $screenshot4_preview ."</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th colspan='2' align='left'>". _DESCRIPTION .":</th>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <td colspan='2'>";
		echo Make_TextArea('description', $lidinfo['description'], 'modify_download', '100%', '230px', false);
		echo "    </td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th colspan='2' align='left'>Fixes:</th>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <td colspan='2'>";
		echo "<i><b>Add Multiple Fixes To This Download, Drop A Line For Each Fix.</b></i><br />". (($wysiwyg <> '') ? (($wysiwyg <> 'none') ? '<br />' : '') : '');
		echo Make_TextArea('fixes', $lidinfo['fixes'], 'modify_download', '100%', '230px', false);
		echo "    </td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th colspan='2' align='left'>Features:</th>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <td colspan='2'>";
		echo "<i><b>Add Multiple Features To This Download, Drop A Line For Each Feature.</b></i><br />". (($wysiwyg <> '') ? (($wysiwyg <> 'none') ? '<br />' : '') : '');
		echo Make_TextArea('features', $lidinfo['features'], 'modify_download', '100%', '230px', false);
		echo "    </td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _AUTHORNAME .":</th>\n";
		echo "    <td><input type='text' name='rname' size='75' maxlength='100' value='". $lidinfo['name'] ."'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _AUTHOREMAIL .":</th>\n";
		echo "    <td><input type='text' name='email' size='75' maxlength='100' value='". $lidinfo['email'] ."'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _FILESIZE .":</th>\n";
		echo "    <td><input type='text' name='filesize' size='20' maxlength='20' value='". $lidinfo['filesize'] ."'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _VERSION .":</th>\n";
		echo "    <td><input type='text' name='version' size='20' maxlength='20' value='". $lidinfo['version'] ."'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _HOMEPAGE .":</th>\n";
		echo "    <td><input type='text' name='homepage' size='75' maxlength='255' value='". $lidinfo['homepage'] ."'>&nbsp;[ <a href='". $lidinfo['homepage'] ."' target='new'>". _VISIT ."</a> ]</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _HITS .":</th>\n";
		echo "    <td><input type='text' name='hits' value='". $lidinfo['hits'] ."' size='20' maxlength='11'></td>\n";
		echo "  </tr>\n";
		//echo "<input type='hidden' name='op' value='DownloadModifySave'>\n";
		echo "<input type='hidden' name='lid' value='$lid'>\n";
		echo "<input type='hidden' name='min' value='$min'>\n";
		echo "  <tr>\n";
		echo "    <td align='center' colspan='2'><input type='submit' value='". _MODIFY ."'></td>\n";
		echo "  </tr>\n";
		echo "</form>\n";
		
		echo "<form action='". $admin_file .".php?op=DownloadDelete' method='post'>\n";
		//echo "<input type='hidden' name='op' value='DownloadDelete'>\n";
		echo "<input type='hidden' name='lid' value='$lid'>\n";
		echo "<input type='hidden' name='min' value='$min'>\n";
		echo "  <tr>\n";
		echo "    <td align='center' colspan='2'><input type='submit' value='"._DL_DELETE."'></td>\n";
		echo "  </tr>\n";
		echo "</table>\n";
		echo "</form>\n";
	CloseTable();
	include_once(NUKE_BASE_DIR.'footer.php');

?>