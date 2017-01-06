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
-=[Mod]=-
      Advanced Username Color                  v1.0.5       10/30/2005
 ************************************************************************/

/* DO NOT EDIT BELOW UNLESS YOU KNOW WHAT YOU ARE DOING ------------------------------ */

if(!defined('NUKE_EVO')) exit;

// Temporary Fix for Nuke Patched 3.1
if (file_exists(NUKE_INCLUDE_DIR.'custom_files/custom_head.php')) {
    require_once(NUKE_INCLUDE_DIR.'custom_files/custom_head.php');
}

/* Set Global Variables & General Variables ------------------------------------------ */
global $user, $prefix, $user_prefix, $db, $lang, $cookie, $currentlang, $userinfo, $bgcolor3;
$Border = 0;
$Count = 1;

/* Set The Apropriate Language File -------------------------------------------------- */
if (file_exists(NUKE_LANGUAGE_DIR.'JAG_Whos_Been/lang-'.$currentlang.'.php')) {
    include_once(NUKE_LANGUAGE_DIR.'JAG_Whos_Been/lang-'.$currentlang.'.php');
} else {
    include_once(NUKE_LANGUAGE_DIR.'JAG_Whos_Been/lang-english.php');
}

/* Get Details For The Block --------------------------------------------------------- */
$Q01 = "SELECT *
        FROM ".$prefix."_jag_whos_been_config";
$R01 =  $db->sql_query($Q01) or die("Bad Q01:".mysql_error());
list($jag_whos_been_user_maxi, $jag_whos_been_show_numb, $jag_whos_been_numb_lead, $jag_whos_been_name_leng, $jag_whos_been_show_expl, $jag_whos_been_expl_name) = $db->sql_fetchrow($R01);

/* Funciton to Add Leading Zeros to Values Below 10 ---------------------------------- */
function JAG_Whos_Been_leading_zero($length, $number)
    {
      $length = $length - strlen($number);
    for ($i = 0; $i < $length; $i++)
        {
         $number = "0".$number;
         }
      return($number);
      }

/* Starts the Content for the Block -------------------------------------------------- */
    $content  = "";
    $content  = "<table width='100%' border='$Border' cellpadding='1' cellspacing='0'>\n";

    $Q01 = "SELECT jag_whos_been_id, jag_whos_been_user_id, jag_whos_been_username, jag_whos_been_time
            FROM ".$prefix."_jag_whos_been
            WHERE jag_whos_been_username != '$userinfo[username]'
            ORDER BY jag_whos_been_time DESC
            LIMIT $jag_whos_been_user_maxi";
    $R01 =  $db->sql_query($Q01) or die("Bad Q01:".mysql_error());
    while(list($jag_whos_been_id, $jag_whos_been_user_id, $jag_whos_been_username, $jag_whos_been_time) = $db->sql_fetchrow($R01))
        {
        $LastSeen     = time() - $jag_whos_been_time;
        $Weeks         = JAG_Whos_Been_leading_zero(2,floor(    $LastSeen/604800));
        $Days         = JAG_Whos_Been_leading_zero(2,floor(    $LastSeen / (60*60*24)));
        $Hours        = JAG_Whos_Been_leading_zero(2,floor(((  $LastSeen%604800)%86400)/3600));
        $Minutes    = JAG_Whos_Been_leading_zero(2,floor(((( $LastSeen%604800)%86400)%3600)/60));
        $Seconds    = JAG_Whos_Been_leading_zero(2,floor((((($LastSeen%604800)%86400)%3600)%60)));
        $uid = $jag_whos_been_id;

        if ($Weeks > 0)
            {
            if ($Weeks == 1)     $Text = _WEEK;
            else                 $Text = _WEEKS;

            $LastSeenTime = "<nobr>$Weeks $Text</nobr>";
            }
        elseif ($Days > 0)
            {
            if ($Days == 1)     $Text = _DAY;
            else                 $Text = _DAYS;

            $LastSeenTime = "<nobr>$Days $Text</nobr>";
            }
        else
            {
            $LastSeenTime = "$Hours:$Minutes:$Seconds";
            }

        $content .= "    <tr>\n";

        if ($jag_whos_been_show_numb == 1)
            {
            if ($jag_whos_been_numb_lead == 1)  $Lead_Numb = JAG_Whos_Been_leading_zero(2, $Count);
            else                                $Lead_Numb = "$Count";
            $content .= "        <td align='left' VALIGN-'MIDDLE'>\n";
            $content .= "            <span class='tiny'>$Lead_Numb&nbsp;</span></td>\n";
            }

        if (strlen($jag_whos_been_username) > $jag_whos_been_name_leng)
            $jag_whos_been_username = substr($jag_whos_been_username, 0, ($jag_whos_been_name_leng-2))."...";

        $content .= "        <td align='left' VALIGN-'MIDDLE' width='100%'>\n";
        $content .= "            <span class='tiny'>\n";
/*****[BEGIN]******************************************
 [ Mod:     Advanced Username Color            v1.0.5 ]
 ******************************************************/
        $content .= "                <a href='modules.php?name=Forums&amp;file=profile&amp;mode=viewprofile&amp;u=".$jag_whos_been_user_id."'>" . UsernameColor($jag_whos_been_username) . "</a>";
/*****[END]********************************************
 [ Mod:     Advanced Username Color            v1.0.5 ]
 ******************************************************/
        $content .= "            </span></td>\n";
        $content .= "        <td align='right' VALIGN-'MIDDLE' >\n";
        $content .= "            <span class='tiny'>$LastSeenTime</span></td>\n";
        $content .= "    </tr>\n";

        $Weeks        = 0;
           $Days         = 0;
          $Hours         = 0;
           $Minutes     = 0;
        $Seconds    = 0;
        $Count++;
          }

if ($jag_whos_been_show_expl == 1)
    {
    $content .= "    <tr>\n";
    $content .= "        <td align='CENTER' Valign='bottom' colspan='3' height='18'>\n";
    $content .= "            <span class='tiny'>$jag_whos_been_expl_name</span></td>\n";
    $content .= "    </tr>\n";
    }

/* Please Leave this Copyright Link In Here - Fair is Fair. Thanks - Dashe ----------- */
    $content .= "    <tr>\n";
    $content .= "        <td align='right' Valign='bottom' colspan='3' height='18'>\n";
?>
                             <script type="text/javascript">
                                function JAG_Whos_Been_Copy()
                                    {
                                    var popurl     = "includes/custom_files/JAG_Whos_Been_Copy.php"
                                    var winpops = window.open(popurl, "", "width=400,height=500,")
                                    }
                            </SCRIPT>
<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

    $content .= "            <a style='text-decoration:none;' href='javascript:JAG_Whos_Been_Copy();'>\n";
    $content .= "                <span class='gensmall'>&copy; JAG</span></a></td>\n";
    $content .= "    </tr>\n";
    $content .= "</table>\n";
?>