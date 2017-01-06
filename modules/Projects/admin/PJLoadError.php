<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal File Access Detected!!"); }
$pagetitle = "NukeProject(tm): Error Loading Functions";
include("header.php");
title($pagetitle);
OpenTable();
echo "It appears that NukeProject(tm) has not been configured correctly.  The
most common cause is that you either have an error in the syntax that is
including includes/nsnbc_func.php from your mainfile.php, or you have not
added the NukeProject(tm) code to your mainfile.php.  Details for including this
code are included in the download package in the <b>Edits_For_Core_Files</b> directory.";
CloseTable();
include("footer.php");

?>