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

/* Decide On What To Do -------------------------------------------------------------- */
switch($op) {
    case "JAG_Whos_Been":
        include(NUKE_ADMIN_MODULE_DIR.'JAG_Whos_Been.php');
    break;
}

?>