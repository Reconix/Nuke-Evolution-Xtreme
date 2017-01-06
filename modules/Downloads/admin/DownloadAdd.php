<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadAdd.php
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

	$pagetitle = _DOWNLOADSADMIN.": "._ADDDOWNLOAD;
	include_once(NUKE_BASE_DIR.'header.php');
	OpenTable();
	
		echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=DLMain\">" . _DOWNLOADS_ADMIN_HEADER . "</a></div>\n";
		echo "<br /><br />";
		echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _DOWNLOADS_RETURNMAIN . "</a> ]</div>\n";
	
	CloseTable();
	echo "<br />";
	title($pagetitle);
	DLadminmain();
	echo "<br />\n";
	OpenTable();
	
		echo "<form action='". $admin_file .".php?op=DownloadAddSave' method='post' name='add_download' enctype='multipart/form-data'>\n";
		echo "<table width='80%' align='center' cellpadding='4' cellspacing='4' border='0' align='center'>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _TITLE .":</th>\n";
		echo "    <td width='70%'><input type='text' name='title' size='75' maxlength='100'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _URL .":</th>\n";
		echo "    <td width='70%'><input type='text' name='url' size='75' maxlength='255' value='http://'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>Upload File:<br /><i>Extensions ( .zip, .rar, .tar, .gz, .gtar & .ace )</i></th>\n";
		echo "    <td width='70%'><input type='file' name='upload' size='75'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>External Mirror:</th>\n";
		echo "    <td width='70%'><input type='text' name='external_mirror1' size='75' maxlength='255' value='http://'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>External Mirror:</th>\n";
		echo "    <td width='70%'><input type='text' name='external_mirror2' size='75' maxlength='255' value='http://'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>"._CATEGORY.":</th>\n";
		echo "    <td width='70%'>";
		echo "      <select name='cat'>";
		echo "        <option value='0'>"._DL_NONE."</option>\n";
		$result2 = $db->sql_query("SELECT * FROM ".$prefix."_downloads_categories ORDER BY parentid,title");
		while($cidinfo = $db->sql_fetchrow($result2)) 
		{
		  	if ($cidinfo['parentid'] != 0) 
		  	{
		  		$cidinfo['title'] = getparent($cidinfo['parentid'], $cidinfo['title']);
		  	}
		  	echo "   <option value='".$cidinfo['cid']."'>".$cidinfo['title']."</option>\n";
		}
		echo "      </select>";
		echo "    </td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>"._DL_PERM.":</th>\n";
		echo "    <td width='70%'>\n";
		echo "      <select name='perm'>\n";
		echo "        <optgroup label='General'>\n";
		echo "          <option value='0'>"._DL_ALL."</option>\n";
		echo "          <option value='1'>"._DL_USERS."</option>\n";
		echo "          <option value='2'>"._DL_ADMIN."</option>\n";
		echo "        </optgroup>";
		echo "        <optgroup label='Groups'>\n";
		$gresult = $db->sql_query("SELECT * FROM ".$prefix."_bbgroups WHERE group_single_user != '1' ORDER BY group_name");
		while($gidinfo = $db->sql_fetchrow($gresult)) 
		{
		  	$gidinfo['group_id'] = $gidinfo['group_id'] + 2;
		  	echo "      <option value='". $gidinfo['group_id'] ."'>". $gidinfo['group_name'] ." ". _DL_ONLY ."</option>\n";
		}
		echo "        </optgroup>";
		echo "      </select></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage1' size='75' maxlength='255' /></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage2' size='75' maxlength='255' /></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage3' size='75' maxlength='255' /></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th align='left'>Screenshot Preview:<br /><i>Extensions ( .jpg, .jpeg, .gif & .png )</i></th>\n";
		echo "    <td><input type='file' name='uploadsimage4' size='75' maxlength='255' /></td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th colspan='2' align='left'>". _DESCRIPTION .":</th>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <td colspan='2'>";
		echo Make_TextArea('description', '', 'add_download', '100%', '230px', false);
		echo "    </td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th colspan='2' align='left'>Fixes:</th>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <td colspan='2'>";
		echo "<i><b>Add Multiple Fixes To This Download, Drop A Line For Each Fix.</b></i><br />". (($wysiwyg <> '') ? (($wysiwyg <> 'none') ? '<br />' : '') : '');
		echo Make_TextArea('fixes', '', 'add_download', '100%', '230px', false);
		echo "    </td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th colspan='2' align='left'>Features:</th>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <td colspan='2'>";
		echo "<i><b>Add Multiple Features To This Download, Drop A Line For Each Feature.</b></i><br />". (($wysiwyg <> '') ? (($wysiwyg <> 'none') ? '<br />' : '') : '');
		echo Make_TextArea('features', '', 'add_download', '100%', '230px', false);
		echo "    </td>\n";
		echo "  </tr>\n";
		
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _AUTHORNAME .":</th>\n";
		echo "    <td width='70%'><input type='text' name='sname' size='75' maxlength='60'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _AUTHOREMAIL .":</th>\n";
		echo "    <td width='70%'><input type='text' name='email' size='75' maxlength='60'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _FILESIZE .":</th>\n";
		echo "    <td width='70%'><input type='text' name='filesize' size='20' maxlength='20'> (". _INBYTES .")</td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _VERSION .":</th>\n";
		echo "    <td width='70%'><input type='text' name='version' size='20' maxlength='20'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _HOMEPAGE .":</th>\n";
		echo "    <td width='70%'><input type='text' name='homepage' size='75' maxlength='255' value='http://'></td>\n";
		echo "  </tr>\n";
		echo "  <tr>\n";
		echo "    <th width='30%' align='left'>". _HITS .":</th>\n";
		echo "    <td width='70%'><input type='text' name='hits' size='20' maxlength='11'></td>\n";
		echo "  </tr>\n";
		echo "<input type='hidden' name='new' value='0'>\n";
		echo "<input type='hidden' name='lid' value='0'>\n";
		echo "<tr><td align='center' colspan='2'><input type='submit' value='". _ADDDOWNLOAD ."'></td></tr>\n";
		echo "</table>\n";
		echo "</form>\n";

	CloseTable();
	@include(NUKE_BASE_DIR.'footer.php');

?>