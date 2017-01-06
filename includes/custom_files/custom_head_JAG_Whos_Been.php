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
      Nuke Patched                             v3.1.0       06/26/2005
 ************************************************************************/

/* DO NOT EDIT BELOW UNLESS YOU KNOW WHAT YOU ARE DOING ------------------------------ */

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Access Denied');
}

/* Set Global Variables & General Variables ------------------------------------------ */
global $user, $prefix, $db, $userinfo, $identify;

if (is_user())
    {
    $ip         = $identify->get_ip();
    $ctime      = time();

    $Q51 = "SELECT jag_whos_been_username 
            FROM ".$prefix."_jag_whos_been
            WHERE jag_whos_been_username = '$userinfo[username]'";
    $R51 = $db->sql_query($Q51) or die("Bad Q51:".mysql_error());
    list($jag_whos_been_id, $jag_whos_been_user_id, $jag_whos_been_username, $jag_whos_been_time, $jag_whos_been_ip) = $db->sql_fetchrow($R51);
    if ($db->sql_numrows($R51) > 0)
        {
        $Q52 = "UPDATE ".$prefix."_jag_whos_been
                SET jag_whos_been_time = $ctime, jag_whos_been_ip = '$ip'
                WHERE jag_whos_been_username = '$userinfo[username]'";
        $R52 = $db->sql_query($Q52) or die("Bad Q52:".mysql_error());
        }
    else
        {
        $Q53 = "INSERT INTO ".$prefix."_jag_whos_been
                        (jag_whos_been_id, jag_whos_been_user_id, jag_whos_been_username, jag_whos_been_time, jag_whos_been_ip) 
                VALUES  ('', '$userinfo[user_id]', '$userinfo[username]', $ctime, '$ip')";
        $R53 =  $db->sql_query($Q53) or die("Bad Q53:".mysql_error());
        }
    }

?>