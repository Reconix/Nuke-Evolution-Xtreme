<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

/***************************************************************************
 *   This file is part of the phpBB2 port to Nuke 6.0 (c) copyright 2002
 *   by Tom Nitzschner (tom@toms-home.com)
 *   http://bbtonuke.sourceforge.net (or http://www.toms-home.com)
 *
 *   As always, make a backup before messing with anything. All code
 *   release by me is considered sample code only. It may be fully
 *   functual, but you use it at your own risk, if you break it,
 *   you get to fix it too. No waranty is given or implied.
 *
 *   Please post all questions/request about this port on http://bbtonuke.sourceforge.net first,
 *   then on my site. All original header code and copyright messages will be maintained
 *   to give credit where credit is due. If you modify this, the only requirement is
 *   that you also maintain all original copyright messages. All my work is released
 *   under the GNU GENERAL PUBLIC LICENSE. Please see the README for more information.
 *
 ***************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      NukeSentinel                             v2.4.1       08/31/2005
      Theme Management                         v1.0.2       12/14/2005
-=[Mod]=-
      Anti-Spam                                v1.1.0       06/18/2005
      IE PNG Fix                               v1.0.0       06/24/2005
      Password Strength Meter                  v1.0.0       07/12/2005
      ToolManDHTML                             v0.0.2       03/20/2005
      Switch Content Script                    v2.0.0       03/29/2006
      Resize Posted Images                     v2.4.5       06/15/2005
      IE Embed Fix                             v1.0.0       04/24/2006
	  jQuery Lightbox Resize Images            v0.5
 ************************************************************************/


//Note due to all the windows.onload use womAdd('function_name()'); instead

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

include_once(NUKE_INCLUDE_DIR.'styles.php');

##################################################
# Include for some common javascripts functions  #
##################################################

echo "<script type=\"text/javascript\" src=\"includes/onload.js\"></script>\n";

/*****[BEGIN]******************************************
 [ Base:    NukeSentinel                       v2.4.1 ]
 ******************************************************/
global $sentineladmin;
if(!defined('FORUM_ADMIN')) {
  echo "<script type=\"text/javascript\" src=\"includes/overlib.js\">\n";
  echo "<!-- overLIB (c) Erik Bosrup --></script>\n";
  echo "<script type=\"text/javascript\" src=\"includes/overlib_hideform.js\">\n";
  echo "<!-- overLIB (c) Erik Bosrup --></script>\n";
  echo "<script type=\"text/javascript\" src=\"includes/nukesentinel3.js\">\n";
  echo "<!-- overLIB (c) Erik Bosrup --></script>\n";
}

/*****[END]********************************************
 [ Base:    NukeSentinel                       v2.4.1 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Base:    NukeSentinel                       v2.4.1 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     IE Embed Fix                       v1.0.0 ]
 ******************************************************/
echo "<!--[if IE]><script defer=\"defer\" type=\"text/javascript\" src=\"includes/embed_fix.js\"></script>\n<![endif]-->";
/*****[END]********************************************
 [ Mod:     IE Embed Fix                       v1.0.0 ]
 ******************************************************/

if (isset($userpage)) {
    echo "<script type=\"text/javascript\">\n";
    echo "<!--\n";
    echo "function showimage() {\n";
    echo "if (!document.images)\n";
    echo "return\n";
    echo "document.images.avatar.src=\n";
    echo "'$nukeurl/modules/Forums/images/avatars/gallery/' + document.Register.user_avatar.options[document.Register.user_avatar.selectedIndex].value\n";
    echo "}\n";
    echo "//-->\n";
    echo "</script>\n\n";
}

global $name;

if (defined('MODULE_FILE') && !defined("HOME_FILE") AND file_exists("modules/".$name."/copyright.php")) {
    echo "<script type=\"text/javascript\">\n";
    echo "<!--\n";
    echo "function openwindow(){\n";
    echo "    window.open (\"modules/".$name."/copyright.php\",\"Copyright\",\"toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=no,copyhistory=no,width=400,height=200\");\n";
    echo "}\n";
    echo "//-->\n";
    echo "</script>\n\n";
}


/*****[BEGIN]******************************************
 [ Mod:     Anti-Spam                         v.1.1.0 ]
 ******************************************************/
if (!defined('ADMIN_FILE')) {
    echo "<script type=\"text/javascript\" src=\"includes/anti-spam.js\"></script>\n";
}
/*****[END]********************************************
 [ Mod:     Anti-Spam                         v.1.1.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     IE PNG Fix                         v1.0.0 ]
 ******************************************************/

$arcade_on = (isset($_GET['file']) && $_GET['file'] == 'arcade_games') ? true : (isset($_POST['file']) && $_POST['file'] == 'arcade_games') ? true : false;

if (!$arcade_on) {
    $arcade_on = (isset($_GET['do']) && $_GET['do'] == 'newscore') ? true : (isset($_POST['do']) && $_POST['do'] == 'newscore') ? true : false;
}

if (!$arcade_on) {
    echo "<!--[if lt IE 7]><script type=\"text/javascript\" src=\"includes/pngfix.js\"></script><![endif]-->\n";
}

/*****[END]********************************************
 [ Mod:     IE PNG Fix                         v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/

 global $admin_file;

 if(isset($name) && ($name == "Your Account" || $name == "Your_Account" || $name == "Profile" || defined('ADMIN_FILE'))) {
     echo '<script type="text/javascript">
        var pwd_strong = "'.PSM_STRONG.'";
        var pwd_stronger = "'.PSM_STRONGER.'";
        var pwd_strongest = "'.PSM_STRONGEST.'";
        var pwd_notrated = "'.PSM_NOTRATED.'";
        var pwd_med = "'.PSM_MED.'";
        var pwd_weak = "'.PSM_WEAK.'";
        var pwd_strength = "'.PSM_CURRENTSTRENGTH.'";
    </script>';
    echo "<script type=\"text/javascript\" src=\"includes/password_strength.js\"></script>\n";
 }

/*****[END]********************************************
 [ Mod:     Password Strength Meter            v1.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/

if (defined('ADMIN_FILE')) {
    echo "<script type=\"text/javascript\">\n";
    echo "<!--\n";
    echo "function themepreview(theme){\n";
    echo "window.open (\"index.php?tpreview=\" + theme + \"\",\"ThemePreview\",\"toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=no,copyhistory=no,width=1000,height=800\");\n";
    echo "}\n";
    echo "//-->\n";
    echo "</script>\n\n";
}

/*****[END]********************************************
 [ Base:    Theme Management                   v1.0.2 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     ToolManDHTML                       v0.0.2 ]
 ******************************************************/

if (defined('ADMIN_FILE') && defined('USE_DRAG_DROP')) {
    global $element_ids, $Sajax;
    if(isset($Sajax) && is_object($Sajax)) {
        echo "<script type=\"text/javascript\">\n<!--\n";
        echo $Sajax->sajax_show_javascript();
        echo "//-->\n";
        echo "</script>\n";
    }
    $i = 0;
    $script_out = '';
    if(!is_array($element_ids)) $element_ids = array();
    foreach ($element_ids as $id) {
        if(!$i) {
            $script_out .= "var list = document.getElementById(\"".$id."\");\n";
            $i++;
        } else {
            $script_out .= "list = document.getElementById(\"".$id."\");\n";
        }

        global $g2;
        $script_out .= (!$g2) ? "DragDrop.makeListContainer( list, 'g1' );\n" : "DragDrop.makeListContainer( list, 'g2' );\n";
        $script_out .= "list.onDragOver = function() { this.style[\"background\"] = \"#EEF\"; };\n";
        $script_out .= "list.onDragOut = function() {this.style[\"background\"] = \"none\"; };\n\n\n";
        $script_out .= "list.onDragDrop = function() {onDrop(); };\n";
    }

    //echo "<link rel=\"stylesheet\" href=\"includes/ajax/lists.css\" type=\"text/css\">";
    echo "<script type=\"text/javascript\" src=\"includes/ajax/coordinates.js\"></script>\n";
    echo "<script type=\"text/javascript\" src=\"includes/ajax/drag.js\"></script>\n";
    echo "<script type=\"text/javascript\" src=\"includes/ajax/dragdrop.js\"></script>\n";
    echo "<script type=\"text/javascript\"><!--
    function confirm(z)
    {
      window.status = 'Sajax version updated';
    }

    function create_drag_drop() {";

        echo $script_out;

    echo "};

    if (window.addEventListener)
        window.addEventListener(\"load\", create_drag_drop, false)
    else if (window.attachEvent)
        window.attachEvent(\"onload\", create_drag_drop)
    else if (document.getElementById)
        womAdd('create_drag_drop()');
    //-->
</script>\n";
}
/*****[END]********************************************
 [ Mod:     ToolManDHTML                       v0.0.2 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Base:    Switch Content Script              v2.0.0 ]
 ******************************************************/

global $plus_minus_images, $collapse;

if ($collapse) {
echo "<script type=\"text/javascript\">
        var enablepersist=\"on\" //Enable saving state of content structure using session cookies? (on/off)
        var memoryduration=\"7\" //persistence in # of days
        var contractsymbol='".$plus_minus_images['minus']."' //Path to image to represent contract state.
        var expandsymbol='".$plus_minus_images['plus']."' //Path to image to represent expand state.
      </script>\n
      <script type=\"text/javascript\" src=\"includes/collapse_blocks.js\"></script>\n";
}
/*****[END]********************************************
 [ Base:    Switch Content Script              v2.0.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Resize Posted Images               v2.4.5 ]
 ******************************************************/

global $img_resize;

if ($img_resize) {
    if((empty($name) || $name == 'News' || $name == 'Reviews' || $name == 'Stories Archive' || $name == 'Downloads' || $name == 'Web Links' || $name == 'Content') && !defined('IN_PHPBB')) {
        global $img_width, $img_height;
        echo "<script defer=\"defer\" type=\"text/javascript\">
        //<![CDATA[
        <!--
        var rmw_max_width = ".$img_width."; // you can change this number, this is the max width in pixels for posted images
        var rmw_max_height = ".$img_height."; // you can change this number, this is the max hight in pixels for posted images
        var rmw_border_1 = '1px solid ';
        var rmw_border_2 = '2px dotted ';
        var rmw_image_title = '';
        //-->
        //]]>
        </script>
        <script defer=\"defer\" type=\"text/javascript\" src=\"themes/rmw_jslib.js\"></script>\n";
    }
}
/*****[END]********************************************
 [ Mod:     Resize Posted Images               v2.4.5 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     jQuery                             v1.5.0 ]
 ******************************************************/
echo "<script type=\"text/javascript\" src=\"includes/js/jquery.min.js\"></script>\n";
echo "<script type=\"text/javascript\">var nuke_jq = jQuery.noConflict();</script>\n";
/*****[END]********************************************
 [ Mod:     jQuery                             v1.5.0 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Colorbox                          v1.3.15 ]
 ******************************************************/
global $nukeurl; 

echo "<script type=\"text/javascript\" src=\"includes/js/colorbox/jquery.colorbox-min.js\"></script>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"includes/js/colorbox/colorbox.css\" media=\"screen\" />\n";
echo "<!-- IE filter path fix -->\n";
echo "<!--[if IE]>\n";
echo "<style type=\"text/css\">\n";
echo "    .cboxIE #cboxTopLeft{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderTopLeft.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxTopCenter{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderTopCenter.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxTopRight{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderTopRight.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxBottomLeft{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderBottomLeft.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxBottomCenter{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderBottomCenter.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxBottomRight{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderBottomRight.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxMiddleLeft{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderMiddleLeft.png, sizingMethod='scale');}\n";
echo "    .cboxIE #cboxMiddleRight{background:transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src={$nukeurl}/includes/js/colorbox/images/internet_explorer/borderMiddleRight.png, sizingMethod='scale');}\n";
echo "</style>\n";
echo "<![endif]-->\n";
echo "<script type=\"text/javascript\">
	nuke_jq(function($) {
		$('.theme-preview').colorbox({width: '90%', height: '90%', iframe: true});
	});
</script>\n";
/*****[END]********************************************
 [ Mod:     Colorbox                          v1.3.15 ]
 ******************************************************/

/*****[BEGIN]******************************************
 [ Mod:     Admin Style Swither                       ]
 ******************************************************/
global $admin_file, $aid;

if (defined('ADMIN_FILE') && is_admin()) {
	echo "<script type=\"text/javascript\">
		var selectedStyle, currentPos = 0;
		var aid = '$aid', admin_file = '$admin_file';
	</script>\n";
	echo "<script type=\"text/javascript\" src=\"includes/js/admin_style_switch.js\"></script>\n";
}
/*****[END]********************************************
 [ Mod:     Admin Style Swither                       ]
 ******************************************************/

/*****[START]******************************************
 [ Mod:     jQuery Lightbox Resize Images        v0.5 ]
 [ Mod:     Lytebox                             v3.22 ]
 ******************************************************/
echo '<script type="text/javascript" src="includes/lytebox/lytebox.js"></script>' . "\n";
echo '<script type="text/javascript" src="includes/lightbox/jquery.lightbox-0.5.min.js"></script>' . "\n";
echo "<script type=\"text/javascript\">
	nuke_jq(function($) {
		$('a[rel*=lightbox]').lightBox({
			imageLoading  : '{$nukeurl}/includes/lightbox/images/lightbox-ico-loading.gif',
			imageBtnPrev  : '{$nukeurl}/includes/lightbox/images/lightbox-btn-prev.gif',
			imageBtnNext  : '{$nukeurl}/includes/lightbox/images/lightbox-btn-next.gif',
			imageBtnClose : '{$nukeurl}/includes/lightbox/images/lightbox-btn-close.gif'
		});
	});
</script>\n";
/*****[END]********************************************
 [ Mod:     Lytebox                             v3.22 ]
 [ Mod:     jQuery Lightbox Resize Images        v0.5 ]
 ******************************************************/

global  $analytics;
if (!empty($analytics)) {
    echo "<script type=\"text/javascript\">
            var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");
            document.write(unescape(\"%3Cscript src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E\"));
          </script>
          <script type=\"text/javascript\">
            var pageTracker = _gat._getTracker(\"".$analytics."\");
            pageTracker._initData();
            pageTracker._trackPageview();
          </script>";

}

echo "<script type=\"text/javascript\" src=\"includes/ajax/prototype.js\"></script>\n";

global $more_js;
if (!empty($more_js)) {
    echo $more_js;
}

//DO NOT PUT ANYTHING AFTER THIS LINE
echo "<!--[if IE]><script type=\"text/javascript\">womOn();</script><![endif]-->\n";
?>