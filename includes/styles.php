<?php

/*=======================================================================
  Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
  =======================================================================*/

/************************************************************************
	Nuke-Evolution: Evolution CSS
	============================================
	Copyright (c) 2005 by The Nuke-Evolution Team

	Filename      : styles.php
	Author        : The Nuke-Evolution Team
	Version       : 1.5.0
	Date          : 12.14.2005 (mm.dd.yyyy)

	Notes         : Miscellaneous CSS
 ************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

global $more_styles;

echo '<!--[if IE]><link rel="stylesheet" type="text/css" src="includes/css/ie.css" /><![endif]-->' . "\n";
echo '<style type="text/css">' . "\n";
if (defined('ADMIN_FILE')) {
    echo '#l, #c, #d, #r, #new { width: 200px; float: left; margin-left: 5px; }' . "\n";
    echo '#new { float: none; }' . "\n";
    echo 'div.menu { list-style-type: none; position: relative; padding: 4px 4px 0 4px; margin: 0px; width: 200px; font-size: 13px; font-family: Arial, sans-serif; border: 1px solid #ccc; }' . "\n";
    echo 'ul.sortable li { position: relative; }' . "\n";
    echo 'ul.boxy { list-style-type: none; padding: 4px 4px 0 4px; margin: 0px; width: 10em; font-size: 13px; font-family: Arial, sans-serif; border: 1px solid #ccc; }' . "\n";
    echo 'li.active { cursor: move; margin-bottom: 4px; padding: 2px 2px; border: 1px solid #ccc; }' . "\n";
    echo 'li.inactive { cursor: move; margin-bottom: 4px; padding: 2px; border: 1px solid #ccc; background-color: #FF6C6C; }' . "\n";
    echo 'ul.boxy li { cursor: move; margin-bottom: 4px; padding: 2px 2px; border: 1px solid #ccc; }' . "\n";
    echo '#left_col { width: 180px; float: left; margin-left: 5px; }' . "\n";
    echo '#center { width: 180px; float: left;  margin-left: 5px; }' . "\n";
    echo '#right_col { width: 180px; float: left;  margin-left: 5px; }' . "\n";
    echo '#sajax1 { width: 180px;  float: left;  margin-left: 5px; }' . "\n";
    echo '#sajax2 {  width: 180px; float: left;  margin-left: 5px; }'. "\n";
}

echo '.textbold { font-weight: bold; }'. "\n";
echo '.texterror { font-weight: bold; color: #FF0000; font-size: large; }'. "\n";
echo '.texterrorcenter { font-weight: bold;  color: #FF0000; text-align: center; font-size: large; }'. "\n";
echo '.nuketitle { font-weight: bold; text-align: center; font-size: x-large; }'. "\n";
echo '.switchcontent{ border-top-width: 0; }'. "\n";
echo '.switchclosecontent{  border-top-width: 0; display: none; }'. "\n";

/*****[BEGIN]******************************************
 [ Mod:     Admin Menu                         v1.0.0 ]
 ******************************************************/
if (defined('ADMIN_FILE')) {
	echo '#admin-select-overlay { background-color: #000000; position: absolute; width: 100%; display: none; z-index: 99; }' ."\n";
	echo '#admin-select-inner { background: #1a1a1a; position: absolute; top: 0; left: 50%; margin: 0 0 0 -150px; width: 300px; height: 88px; line-height: 2.2em; text-align: center; color: #ffffff; z-index: 99; padding: 10px; border: #2d2d2d 1px solid; display: none; }' ."\n";
	echo 'div.admin-select-button a { background-color: #2f2f2f; border: 1px solid #434343; color: #FFFFFF; font-size: 16px; padding: 8px 12px; position: relative; text-decoration: none; text-shadow: 1px 1px 0 #000000; top: 22px; }' ."\n";
	echo 'div.admin-select-button a:hover { color: #ffffff; text-decoration: none; }' . "\n";
}
/*****[END]********************************************
 [ Mod:     Admin Menu                         v1.0.0 ]
 ******************************************************/

if (!empty($more_styles)) {
	echo $more_styles;
}
echo '</style>' . "\n";

/*****[START]******************************************
 [ Mod:     jQuery Lightbox Resize Images        v0.5 ]
 [ Mod:     Lytebox                             v3.22 ]
 ******************************************************/ 
echo '<link rel="stylesheet" type="text/css" href="includes/lytebox/lytebox.css" />' . "\n";
echo '<link rel="stylesheet" type="text/css" href="includes/lightbox/jquery.lightbox-0.5.css" />' . "\n";
/*****[END]********************************************
 [ Mod:     Lytebox                             v3.22 ]
 [ Mod:     jQuery Lightbox Resize Images        v0.5 ]
 ******************************************************/
 
?>