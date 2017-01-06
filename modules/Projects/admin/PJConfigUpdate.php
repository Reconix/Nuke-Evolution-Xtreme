<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$location = htmlentities($location, ENT_QUOTES);
pjsave_config('reports_active', $reports_active);
pjsave_config('requests_active', $requests_active);
pjsave_config('location', $location);
header("Location: ".$admin_file.".php?op=PJConfig");

?>