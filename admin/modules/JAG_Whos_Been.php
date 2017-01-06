<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/* -------------------------------------------------------- for PHP-Nuke v7.6 v1.0.76  */
/*                                                                                     */
/*      ////////// //\\ \\\\\\\\\\       Created by Dashe at http://nsd.jagamarog.com  */
/*             // //  \\ \\                                                            */
/*            // //    \\ \\             Email Address: dashe@jagamarog.com            */
/*           // /////\\\\\ \\   \\\\\                                                  */
/*          // //        \\ \\      \\   For More Scripts Visit Our Site               */
/*         // //          \\ \\\\\\\\\\                                                */
/* /////////  a g a m a r o g . c o m   N u k e   S c r i p t   D e v e l o p m e n t  */
/*                                                                                     */
/* Updated to work with PHP-Nuke 7.6 : BlueLion (admin@phpnuke-nederland.com)          */
/*                                                                                     */
/* Original Who Is Where Developed at Surf 4 All [http://www.surf4all.com]             */
/*                                                                                     */
/* ----------------------------------------------------------------------------------- */

/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/29/2005
 ************************************************************************/

/* DO NOT EDIT BELOW UNLESS YOU KNOW WHAT YOU ARE DOING ------------------------------ */

if (!defined('ADMIN_FILE')) {
   die ('Illegal File Access');
}

// Temporary Fix for Nuke Patched 3.1
if (file_exists(NUKE_INCLUDE_DIR.'custom_files/custom_head.php')) {
    require_once(NUKE_INCLUDE_DIR.'custom_files/custom_head.php');
}

global $prefix, $db, $admdata;

/* See If Is GOD Or Admin That Has Access -------------------------------------------- */
if ($admdata['radminsuper'] == 1) {

//$Q90 = "SELECT radminsuper 
//        FROM ".$prefix."_authors 
//        WHERE aid = '$aid'";
//$R90 =  $db -> sql_query($Q90) or die("Bad Q90:".mysql_error());
//list($radminency, $radminsuper) = sql_fetch_row($R90);

//if (($radminency==1) OR ($radminsuper==1)) 
//    {
    function CurrentSettings()
        {
        global $prefix, $db, $currentlang, $admin_file;
        
        /* Set The Apropriate Language File ------------------------------------------ */
        if (file_exists(NUKE_LANGUAGE_DIR.'JAG_Whos_Been/lang-'.$currentlang.'.php')) {
            include_once(NUKE_LANGUAGE_DIR.'JAG_Whos_Been/lang-'.$currentlang.'.php');
        } else {
            include_once(NUKE_LANGUAGE_DIR.'JAG_Whos_Been/lang-english.php');
        }

        /* Get Config Settings For The Block ---------------------------------------- */
        $Q91 = "SELECT *
                FROM ".$prefix."_jag_whos_been_config";
        $R91 =  $db->sql_query($Q91) or die("Bad Q91:".mysql_error());
        list($jag_whos_been_user_maxi, $jag_whos_been_show_numb, $jag_whos_been_numb_lead, $jag_whos_been_name_leng, $jag_whos_been_show_expl, $jag_whos_been_expl_name) = $db->sql_fetchrow($R91);

        function CheckStatus($Variable, $Option)
            {
            if ($Variable == $Option) return "CHECKED";
            }
            
        /* Start The Content For The Page ------------------------------------------- */
        include_once(NUKE_BASE_DIR.'header.php');
        
        OpenTable();
	    echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=JAG_Whos_Been\">" . _JAG_WHOS_BEEN_ADMIN_HEADER . "</a></div>\n";
        echo "<br /><br />";
	    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _JAG_WHOS_BEEN_RETURNMAIN . "</a> ]</div>\n";
	    CloseTable();
	    echo "<br />";
        title("JAG Whos Been Block ".$File_Version."");
        
        OpenTable();
                
        echo "    <table width='400' border='1' cellpadding='0' cellspacing='0' bordercolor='#00BBFF' align='center'>\n";
        echo "        <form name='Update' action='".$admin_file.".php' method='post'>\n";

        /* Main Preferences Section ------------------------------------------------- */
        echo "        <tr>\n";
        echo "            <td width='100%' align='left' Valign='top'>\n";
        echo "                <table border='0' cellpadding='2' cellspacing='2' align='center' width='100%'>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left' colspan='2' CLASS='title'><strong>"._JAG_WHOS_BEEN_S1_TITLE.":</strong></td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left' colspan='2'>"._JAG_WHOS_BEEN_S1_EXPLAIN.":<br /><br /></td>\n";
        echo "                    </tr>\n";
        
        /* Step 1 Stuff ------------------------------------------------------------- */
        echo "                    <tr>\n";
        echo "                        <td align='left'>"._JAG_WHOS_BEEN_USER_MAXI."</td>\n";
        echo "                        <td align='left'><input type='text' name='jag_whos_been_user_maxi' value='$jag_whos_been_user_maxi' size='10' maxlenght='5'></td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left'>"._JAG_WHOS_BEEN_SHOW_NUMB.":\n";
        echo "                        <td align='left'>\n";
        echo "                            <input type='radio' name='jag_whos_been_show_numb' value='1' ".CheckStatus($jag_whos_been_show_numb, 1).">"._YES." &nbsp; <input type='radio' name='jag_whos_been_show_numb' value='0' ".CheckStatus($jag_whos_been_show_numb, 0).">"._NO."";
        echo "                        </td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left'>"._JAG_WHOS_BEEN_NUMB_LEAD.":\n";
        echo "                        <td align='left'>\n";
        echo "                            <input type='radio' name='jag_whos_been_numb_lead' value='1' ".CheckStatus($jag_whos_been_numb_lead, 1).">"._YES." &nbsp; <input type='radio' name='jag_whos_been_numb_lead' value='0' ".CheckStatus($jag_whos_been_numb_lead, 0).">"._NO."";
        echo "                        </td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left'>"._JAG_WHOS_BEEN_NAME_LENG."</td>\n";
        echo "                        <td align='left'><input type='text' name='jag_whos_been_name_leng' value='$jag_whos_been_name_leng' size='10' maxlenght='5'></td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left' colspan='2'><span COLOR='RED'><strong>".strtoupper(""._JAG_WHOS_BEEN_NAME_LENG_IMPT."").":</strong><br />"._JAG_WHOS_BEEN_NAME_LENG_NOTE."<br /><br /></td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left'>"._JAG_WHOS_BEEN_SHOW_EXPL.":\n";
        echo "                        <td align='left'>\n";
        echo "                            <input type='radio' name='jag_whos_been_show_expl' value='1' ".CheckStatus($jag_whos_been_show_expl, 1).">"._YES." &nbsp; <input type='radio' name='jag_whos_been_show_expl' value='0' ".CheckStatus($jag_whos_been_show_expl, 0).">"._NO."";
        echo "                        </td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left'>"._JAG_WHOS_BEEN_EXPL_NAME."</td>\n";
        echo "                        <td align='left'><input type='text' name='jag_whos_been_expl_name' value='$jag_whos_been_expl_name' size='20' maxlenght='50'></td>\n";
        echo "                    </tr>\n";
        echo "                </table><br /></td>\n";
        echo "        </tr>\n";
        echo "        <tr>\n";
        echo "            <td width='100%'>\n";
        echo "                <table border='0' cellpadding='2' cellspacing='2' align='left' width='100%'>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left' colspan='2' CLASS='title' width='100%'><strong>"._JAG_WHOS_BEEN_S2_TITLE.":</strong></td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='left' colspan='2'>"._JAG_WHOS_BEEN_S2_EXPLAIN."<br /><br /></td>\n";
        echo "                    </tr>\n";
        echo "                    <tr>\n";
        echo "                        <td align='right' colspan='2'>\n";
        echo "                            <br /><input type='hidden' name='op' value='JAG_Whos_Been'>\n";
        echo "                                <input type='submit' name='Do' value='update'>&nbsp;&nbsp;&nbsp;&nbsp;</td>\n";
        echo "                    </tr>\n";
        echo "                </table></td>\n";
        echo "        </tr>\n";
        echo "        </form>\n";
        echo "</table>\n";
        
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
        }

    function UpdateSettings()
        {
        global $prefix, $db;
        global $jag_whos_been_user_maxi, $jag_whos_been_show_numb, $jag_whos_been_numb_lead, $jag_whos_been_name_leng, $jag_whos_been_show_expl, $jag_whos_been_expl_name;

         $Q92 = "UPDATE ".$prefix."_jag_whos_been_config
                SET jag_whos_been_user_maxi = '$jag_whos_been_user_maxi', 
                    jag_whos_been_show_numb = '$jag_whos_been_show_numb', 
                    jag_whos_been_numb_lead = '$jag_whos_been_numb_lead', 
                    jag_whos_been_name_leng = '$jag_whos_been_name_leng', 
                    jag_whos_been_show_expl = '$jag_whos_been_show_expl',
                    jag_whos_been_expl_name = '$jag_whos_been_expl_name'";
        $R92 =  $db->sql_query($Q92) or die("Bad Q92:".mysql_error());

        CurrentSettings();
        }

    switch ($Do)
        {
        case "update":
            UpdateSettings();
        break;

        default:
            CurrentSettings();
        break;
        }
    } 
else
    {
    echo "Access Denied";
    }

?>