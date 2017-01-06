<?php
/*======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 ======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Security Code Control
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : gfxchk.php
   Author        : Quake(www.nuke-evolution.com)
   Version       : 1.0.0
   Date          : 12.17.2005 (mm.dd.yyyy)

   Notes         : Allows admin to easily control security codes.
************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

include_once(dirname(dirname((__FILE__))).'/mainfile.php');

global $evoconfig, $textcolor1, $bgcolor1;

function random_code($number) {
    $out = '';
    $letters = range('a', 'z');
    for ($i=0; $i < $number; $i++) {
        mt_srand(crc32(microtime()));
        $num = mt_rand(0,1);
        if ($num) {
            //Number 1 - 9
            $out .= mt_rand(1, 9);
        } else {
            $out .= $letters[mt_rand(0, 25)];
        }
    }
    return $out;
}

if(GDSUPPORT) {
    $useimage = intval($evoconfig['useimage']);
    $fontsize = 5;
    $ttf = false;
    if ($evoconfig['codefont']) {
        $codefont = stripslashes($evoconfig['codefont']);
        $font = NUKE_INCLUDE_DIR.'fonts/'.$codefont.'.ttf';
        $ttf = (function_exists('imagettftext') && file_exists($font));
        $ttfsize = $fontsize*2;
    }

    $code = random_code($evoconfig['codesize']);
    $ThemeSel = get_theme();

    include_once(NUKE_THEMES_DIR.$ThemeSel.'/theme.php');

    if ($ttf) {
        $border = imagettfbbox($ttfsize, 0, $font, $code);
        $width = $border[2]-$border[0];
    } else {
        $width = strlen($code)*(4+$fontsize);
    }

    if ($useimage) {

        if (file_exists("themes/$ThemeSel/images/code_bg.jpg")) {
            $image = ImageCreateFromJPEG("themes/$ThemeSel/images/code_bg.jpg");
        } else if (file_exists("themes/$ThemeSel/images/code_bg.png")) {
            $image = ImageCreateFromPNG("themes/$ThemeSel/images/code_bg.png");
        } else {
            $image = ImageCreateFromJPEG('images/code_bg.jpg');
        }
        if (!isset($gfxcolor)) {
            $gfxcolor = '#505050';
        }

    } else {

        if (!isset($gfxcolor)) {
            $txtclr = $textcolor1;
        }
        $bgclr  = $bgcolor1;

        $bred   = hexdec(substr($bgclr, 1, 2));
        $bgreen = hexdec(substr($bgclr, 3, 2));
        $bblue  = hexdec(substr($bgclr, -2));

        $image = ImageCreate($width+6,20);
        $background_color = ImageColorAllocate($image, $bred, $bgreen, $bblue);
        ImageFill($image, 0, 0, $background_color);

    }

    $tred   = hexdec(substr($gfxcolor, 1, 2));
    $tgreen = hexdec(substr($gfxcolor, 3, 2));
    $tblue  = hexdec(substr($gfxcolor, -2));

    $left = (imagesx($image)-$width)/2;

    if (function_exists('imagecolorallocatealpha')) {
        $txt_color = imagecolorallocatealpha($image, $tred, $tgreen, $tblue, 50);
        if ($ttf) {
            imagettftext($image, $ttfsize, 0, $left+1, 16, $txt_color, $font, $code);
        } else {
            ImageString($image, $fontsize, $left+2, 3, $code, $txt_color);
        }
    }

    if ($ttf) {
        imagettftext($image, $ttfsize, 0, $left, 15, ImageColorAllocate($image, $tred, $tgreen, $tblue), $font, $code);
    } else {
        ImageString($image, $fontsize, $left, 2, $code, ImageColorAllocate($image, $tred, $tgreen, $tblue));
    }
    session_start();
    if(isset($_SESSION['GFXCHECK'])) unset($_SESSION['GFXCHECK']);
    $_SESSION['GFXCHECK'] = $code;
    Header('Content-type: image/png');
    ImagePNG($image);
    ImageDestroy($image);
    exit;
}

?>