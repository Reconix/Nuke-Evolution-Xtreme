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
/*                                                                      */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
-=[Mod]=-
      Advanced Security Code Control           v1.0.0       12/17/2005
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $evoconfig;

echo "<fieldset><legend><span class='option'><strong>" . _GFXOPT . "</strong></span></legend>"
    ."<br /><table border='0'>";
$ck0 = $ck1 = $ck2 = $ck3 = $ck4 = $ck5 = $ck6 = $ck7 = "";
if ($evoconfig['usegfxcheck']==0) {
   $ck0 = " selected";
} elseif ($evoconfig['usegfxcheck']==1) {
   $ck1 = " selected";
} elseif ($evoconfig['usegfxcheck']==2) {
   $ck2 = " selected";
} elseif ($evoconfig['usegfxcheck']==3) {
   $ck3 = " selected";
} elseif ($evoconfig['usegfxcheck']==4) {
   $ck4 = " selected";
} elseif ($evoconfig['usegfxcheck']==5) {
   $ck5 = " selected";
} elseif ($evoconfig['usegfxcheck']==6) {
   $ck6 = " selected";
} else {
   $ck7 = " selected";
}
echo '<tr><td valign="top">'._USEGFXCHECK.'</td><td><select name="xusegfxcheck">';
echo '<option value="0"'.$ck0.'>'._GFX_NC.'</option>';
echo '<option value="1"'.$ck1.'>'._GFX_AC.'</option>';
echo '<option value="2"'.$ck2.'>'._GFX_LC.'</option>';
echo '<option value="3"'.$ck3.'>'._GFX_RC.'</option>';
echo '<option value="4"'.$ck4.'>'._GFX_CA.'</option>';
echo '<option value="5"'.$ck5.'>'._GFX_AUC.'</option>';
echo '<option value="6"'.$ck6.'>'._GFX_ANC.'</option>';
echo '<option value="7"'.$ck7.'>'._GFX_ALLC.'</option>';
echo "</select></td></tr>\n";
if (GDSUPPORT) {
    if (!defined('CAPTCHA')) {
        echo "<tr><td valign=\"top\">"._GFX_USEIMAGE."</td><td>";
        echo yesno_option('xuseimage', $evoconfig['useimage']);
        echo "</td></tr><tr><td valign=\"top\">" . _GFX_CODEFONT . ":</td><td><select name='xcodefont'>";
        //echo '<option value="0">'._GFX_DEFAULTFONT.'</option>';
        $handle = @opendir(NUKE_INCLUDE_DIR.'fonts/');
        while(false !== ($file = @readdir($handle))) {
            if(preg_match('/^(.*?)\.ttf$/i', $file, $font)) {
                $sel = ($evoconfig['codefont'] == $font[1]) ? ' selected' : '';
                echo '<option value="'.$font[1].'"'.$sel.'>'.$font[1].'</option>';
            }
        }
        closedir($handle);
        echo "</select> [ "._FONTUPLOAD." /includes/fonts/ ]</td></tr>";
        echo "<tr><td valign=\"top\">" . _GFX_CODESIZE . ":</td><td>";
        for ($i=1; $i <= 9; $i++) {
            $options[] = $i;
        }
        echo select_option('xcodesize',$evoconfig['codesize'],$options);
        echo "</td></tr>\n";
        echo "<tr><td colspan=\"2\">\n";
        echo security_code(1,'demo',1);
        echo "</td></tr>";
    } else {
        global $capfile;
        if ($dir = @opendir(NUKE_BASE_DIR.'images/captcha/'))
        {
            echo "<tr><td>\n";
            echo _DEFAULT.':';
            echo "</td>\n";
            echo "<td>\n";
            if (empty($capfile)) {
                echo "<input type='radio' name='xcapfile' value='' checked='checked'>";
            } else {
                echo "<input type='radio' name='xcapfile' value='' >";
            }
            echo "<img src='images/captcha.php?size=large&amp;file=default' border='0' alt='"._SECURITYCODE."' title='"._SECURITYCODE."'>";
            echo "</td></tr>\n";
            while( $file = @readdir($dir) )
            {
                if( $file != '.' && $file != '..' )
                {
                    $file = str_replace('.jpg','',$file);
                    echo "<tr><td>\n";
                    echo $file.':';
                    echo "</td>\n";
                    echo "<td>\n";
                    if ($capfile == $file) {
                        echo "<input type='radio' name='xcapfile' value='".$file."' checked='checked'>";
                    } else {
                        echo "<input type='radio' name='xcapfile' value='".$file."' >";
                    }
                    echo "<img src='images/captcha.php?size=large&amp;file=".$file."' border='0' alt='"._SECURITYCODE."' title='"._SECURITYCODE."'>\n";
                    echo "</td></tr>\n";
                }
            }
            @closedir($dir);
        }
    }
    echo "</table></fieldset><br />";
}

?>