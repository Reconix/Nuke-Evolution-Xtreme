<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : DownloadModifySave.php
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
/* Copyright (c) 2000-2005 by NukeScripts Network       */
/********************************************************/

	if (!isset($min)) 
	{ 
		$min = 0; 
	}
	$title            = Fix_Quotes($title);
	$external_mirror1 = Fix_Quotes($external_mirror1);
	$external_mirror2 = Fix_Quotes($external_mirror2);
	$description      = Fix_Quotes($description);
	$fixes            = Fix_Quotes($fixes);
	$features         = Fix_Quotes($features);
	$name             = Fix_Quotes($name);
	$email            = Fix_Quotes($email);
	$perm             = Fix_Quotes($perm);
	$filesize         = str_replace(',', '', $filesize);
	$filesize         = str_replace('.', '', $filesize);
	$filesize         = intval($filesize);
	
	$AllowedExtensions = array('zip', 'rar', 'tar', 'gz', 'gtar', 'ace');
	
	if( ($HTTP_POST_FILES['upload']['name'] <> '') && ($url) )
	{
		$path_parts = pathinfo($HTTP_POST_FILES['upload']['name']);
		$extension  = $path_parts['extension'];
		$extension  = strtolower($extension);
		if( in_array($extension, $AllowedExtensions) )
		{
			$rand      = RandomNumber(10);
			$file_name = $rand.'.'.$extension;
			if ( move_uploaded_file($HTTP_POST_FILES['upload']['tmp_name'], 'modules/'. $module_name .'/files/'.$file_name) ) 
			{
				$url = 'modules/'. $module_name .'/files/'.$file_name;
			}
			@unlink($download_url);
		}
		//$url = Fix_Quotes($url);
	}
	elseif(	($HTTP_POST_FILES['upload']['name']) && ($url == '') )
	{
		$path_parts = pathinfo($HTTP_POST_FILES['upload']['name']);
		$extension  = $path_parts['extension'];
		$extension  = strtolower($extension);
		if( in_array($extension, $AllowedExtensions) )
		{
			$rand      = RandomNumber(10);
			$file_name = $rand.'.'.$extension;
			if ( move_uploaded_file($HTTP_POST_FILES['upload']['tmp_name'], 'modules/'. $module_name .'/files/'.$file_name) ) 
			{
				$url = 'modules/'. $module_name .'/files/'.$file_name;
			}
			@unlink($download_url);
		}
	}
	elseif(	($HTTP_POST_FILES['upload']['name'] == '') && ($url) )
	{
		$url = Fix_Quotes($url);
	}
	elseif(	($HTTP_POST_FILES['upload']['name'] == '') && ($url == '') )
	{
		@unlink($download_url);
		$url = '';
	}
	
	if($delete_screenshot1 <> 1)
	{
		if($HTTP_POST_FILES['uploadsimage1']['name']) 
		{
			@unlink('modules/'. $module_name .'/screenshots/'.$ss1);
			$AllowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
			$path_parts = pathinfo($HTTP_POST_FILES['uploadsimage1']['name']);
			$extension  = $path_parts['extension'];
			$extension  = strtolower($extension);
			if( in_array($extension, $AllowedExtensions) )
			{
				$rand      = RandomNumber(10);
				$file_name = $rand.'.'.$extension;
				if ( move_uploaded_file($HTTP_POST_FILES['uploadsimage1']['tmp_name'], 'modules/'. $module_name .'/screenshots/'.$file_name) ) 
				{
					$screenshot1 = $file_name;
				}
			}
		}
		elseif($ss1)
		{
			$screenshot1 = $ss1;
		}
		elseif($ss1 <> '' || $HTTP_POST_FILES['uploadsimage1']['name'] <> '')
		{
			$screenshot1 = '';
		}
	}
	else
	{
		@unlink('modules/'. $module_name .'/screenshots/'.$ss1);
		$screenshot1 = '';
	}

	if($delete_screenshot2 <> 1)
	{
		if($HTTP_POST_FILES['uploadsimage2']['name']) 
		{
			@unlink('modules/'. $module_name .'/screenshots/'.$ss2);
			$AllowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
			$path_parts = pathinfo($HTTP_POST_FILES['uploadsimage2']['name']);
			$extension  = $path_parts['extension'];
			$extension  = strtolower($extension);
			if( in_array($extension, $AllowedExtensions) )
			{
				$rand      = RandomNumber(10);
				$file_name = $rand.'.'.$extension;
				if ( move_uploaded_file($HTTP_POST_FILES['uploadsimage2']['tmp_name'], 'modules/'. $module_name .'/screenshots/'.$file_name) ) 
				{
					$screenshot2 = $file_name;
				}
			}
		}
		elseif($ss2)
		{
			$screenshot2 = $ss2;
		}
		elseif($ss2 <> '' || $HTTP_POST_FILES['uploadsimage2']['name'] <> '')
		{
			$screenshot2 = '';
		}
	}
	else
	{
		@unlink('modules/'. $module_name .'/screenshots/'.$ss2);
		$screenshot2 = '';
	}
	
	if($delete_screenshot3 <> 1)
	{
		if($HTTP_POST_FILES['uploadsimage3']['name']) 
		{
			@unlink('modules/'. $module_name .'/screenshots/'.$ss3);
			$AllowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
			$path_parts = pathinfo($HTTP_POST_FILES['uploadsimage3']['name']);
			$extension  = $path_parts['extension'];
			$extension  = strtolower($extension);
			if( in_array($extension, $AllowedExtensions) )
			{
				$rand      = RandomNumber(10);
				$file_name = $rand.'.'.$extension;
				if ( move_uploaded_file($HTTP_POST_FILES['uploadsimage3']['tmp_name'], 'modules/'. $module_name .'/screenshots/'.$file_name) ) 
				{
					$screenshot3 = $file_name;
				}
			}
		}
		elseif($ss3)
		{
			$screenshot3 = $ss3;
		}
		elseif($ss3 <> '' || $HTTP_POST_FILES['uploadsimage3']['name'] <> '')
		{
			$screenshot3 = '';
		}
	}
	else
	{
		@unlink('modules/'. $module_name .'/screenshots/'.$ss3);
		$screenshot3 = '';
	}
	
	if($delete_screenshot4 <> 1)
	{
		if($HTTP_POST_FILES['uploadsimage4']['name']) 
		{
			@unlink('modules/'. $module_name .'/screenshots/'.$ss4);
			$AllowedExtensions = array('jpg', 'jpeg', 'gif', 'png');
			$path_parts = pathinfo($HTTP_POST_FILES['uploadsimage4']['name']);
			$extension  = $path_parts['extension'];
			$extension  = strtolower($extension);
			if( in_array($extension, $AllowedExtensions) )
			{
				$rand      = RandomNumber(10);
				$file_name = $rand.'.'.$extension;
				if ( move_uploaded_file($HTTP_POST_FILES['uploadsimage4']['tmp_name'], 'modules/'. $module_name .'/screenshots/'.$file_name) ) 
				{
					$screenshot4 = $file_name;
				}
			}
		}
		elseif($ss4)
		{
			$screenshot4 = $ss4;
		}
		elseif($ss4 <> '' || $HTTP_POST_FILES['uploadsimage4']['name'] <> '')
		{
			$screenshot4 = '';
		}
	}
	else
	{
		@unlink('modules/'. $module_name .'/screenshots/'.$ss4);
		$screenshot4 = '';
	}
	
	$db->sql_query("UPDATE `". $prefix ."_downloads_downloads` SET `cid`='$cat', `sid`='$perm', `title`='$title', `url`='$url', `external_mirror1`='$external_mirror1', `external_mirror2`='$external_mirror2', `description`='$description', `fixes`='$fixes', `features`='$features', `screenshot1`='$screenshot1', `screenshot2`='$screenshot2', `screenshot3`='$screenshot3', `screenshot4`='$screenshot4', `name`='$rname', `email`='$email', `hits`='$hits', `filesize`='$filesize', `version`='$version', `homepage`='$homepage' WHERE `lid`='$lid'");
	redirect($admin_file.".php?op=Downloads&min=$min");

?>