<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/
/************************************************************************
   Nuke-Evolution: Theme Management
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : theme_info.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.2
   Date          : 12.20.2005 (mm.dd.yyyy)

   Notes         : Advanced Theme Features for DW-Abyss Theme.
************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}
$current_theme = basename(dirname(dirname(__FILE__)));

$param_names = array(
			'Footer Message1',
			'Footer Message2',
			'Footer Message3',
			'BG Color 1',
			'BG Color 2',
			'BG Color 3',
			'BG Color 4',
			'Text Color 1',
			'Text Color 2'
			);
$params = array(
			'fms1',
			'fms2',
			'fms3',
			'bgcolor1',
			'bgcolor2',
			'bgcolor3',
			'bgcolor4',
			'textcolor1',
			'textcolor2'
			);
$default = array(
			'Your Message Here',
			'Your Message Here',
			'Your Message Here',
			'#2e2e2e',
			'#2e2e2e',
			'#2e2e2e',
			'#2e2e2e',
			'#ffffff',
			'#ffffff'
                  );
global $ThemeInfo;
$ThemeInfo = LoadThemeInfo($current_theme);
?>