<?php
/***************************************************************************
*                             Member Application
*                            -------------------
*   begin                : 13 Nov, 2005
*   copyright            : (C) 2005 - 2007 Tim Leitz DrivenByFaith
*   email                : tim@drivenbyfaith.org
*
*   Id: memberapplication v 2.1.4 Tim Leitz
*
*   file name           :   copyright.php
*   run from	        :   index.php
*
***************************************************************************/
/***************************************************************************
*
*   This program is subject to the license agreement in the user manual.
*
***************************************************************************/

include("version.php");
define('CP_INCLUDE_DIR', dirname(dirname(dirname(__FILE__))));
if (file_exists(CP_INCLUDE_DIR.'/includes/showcp.php'))
{
  require_once(CP_INCLUDE_DIR.'/includes/showcp.php');
}
else
{

  include("version.php");
  echo "<br><b>Member Application Module V $MA_Version"
  ."<br>Member Application Module COPYRIGHT &copy; 2005 - 2007 Tim Leitz DBF Designs <u><a href=\"http://www.dbfdesigns.net\" target=\"new\">www.dbfdesigns.net</a></u></b><br>\n";
  die();
}
// To have the Copyright window work in your module just fill the following
// required information and then copy the file "copyright.php" into your
// module's directory. It's all, as easy as it sounds ;)
// NOTE: in $download_location PLEASE give the direct download link to the file!!!

$author_name = "Tim Leitz DBF Designs";
$author_email = "admin@dbfdesigns.net";
$author_homepage = "http://www.dbfdesigns.net";
$license = "See Documentation";
$download_location = "http://www.dbfdesigns.net";
$module_version = "2.1.4";
$module_description = "";

// DO NOT TOUCH THE FOLLOWING COPYRIGHT CODE. YOU'RE JUST ALLOWED TO CHANGE YOUR "OWN"
// MODULE'S DATA (SEE ABOVE) SO THE SYSTEM CAN BE ABLE TO SHOW THE COPYRIGHT NOTICE
// FOR YOUR MODULE/ADDON. PLAY FAIR WITH THE PEOPLE THAT WORKED CODING WHAT YOU USE!!
// YOU ARE NOT ALLOWED TO MODIFY ANYTHING ELSE THAN THE ABOVE REQUIRED INFORMATION.
// AND YOU ARE NOT ALLOWED TO DELETE THIS FILE NOR TO CHANGE ANYTHING FROM THIS FILE IF
// YOU'RE NOT THIS MODULE'S AUTHOR.

show_copyright($author_name, $author_email, $author_homepage, $license, $download_location, $module_version, $module_description);
?>