<?php

/********************************************************/
/* NukeScripts Network (webmaster@nukescripts.net)      */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

$mod_name = "NukeProject(tm)";
$author_email = "<a href='http://www.nukescripts.net/modules.php?name=Feedback' target='new'>NukeScripts Network</a>";
$author_name = "<a href='http://www.nukescripts.net' target='new'>NukeScripts Network</a>";
$download_location = "http://www.nukescripts.net/modules.php?name=Downloads";
$license = "Copyright &copy; 2000-2005 NukeScripts Network";
$module_description = "<br />Advanced Project Management System.<br /><a href='http://darkforgegfx.com' target='new'>< Modified with Overlib and User Project View by BBGUN @ DarkForgeGFX.</a>";
$module_version = "";
$release_date = "";

echo "<html>\n";
echo "<head>\n";
echo "<title>$mod_name: Copyright Information</title>\n";
echo "<style type=\"text/css\">\n";
echo "<!--\n";
echo "body{\n";
echo "FONT-FAMILY:Verdana,Helvetica; FONT-SIZE:11px;\n";
echo "}\n";
echo "-->\n";
echo "</style>\n";
echo "</head>\n";
echo "<body bgcolor=\"#FFFFFF\" link=\"#000000\" alink=\"#000000\" vlink=\"#000000\">\n";
echo "<center><b>Module Copyright &copy; Information</b><br>";
echo "$mod_name module</center>\n<hr>\n";
echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Module's Name:</b> $mod_name<br>\n";
if($author_email != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Author's Email:</b> $author_email<br>\n"; }
if($author_name != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Author's Name:</b> $author_name<br>\n"; }
if($download_location != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Module's Download:</b> <a href=\"$download_location\" target=\"new\">Download</a><br>\n"; }
if($license != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>License:</b> $license<br>\n"; }
if($module_description != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Module's Description:</b> $module_description<br>\n"; }
if($module_version != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Module's Version:</b> $module_version<br>\n"; }
if($release_date != "") { echo "<img src=\"images/arrow.png\" border=\"0\">&nbsp;<b>Release Date:</b> $release_date<br>\n"; }
echo "<hr>\n";
echo "<center>[<a href=\"#\" onClick=javascript:self.close()>Close Window</a>]</center>\n";
echo "</body>\n";
echo "</html>";

?>