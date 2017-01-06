<?php

/********************************************************/
/* NSN Center Blocks                                    */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/* Ported for Nuke-Evolution by Quake                   */
/* http://www.evo-mods.com                              */
/********************************************************/

require_once(dirname(__FILE__)."/mainfile.php");
define('NSNCB_INSTALL_DIR', NUKE_BASE_DIR.'nsncb_installer/');

global $admin;
if(is_admin($admin)) {
  if(!is_array($admin)) {
    $adm = base64_decode($admin);
    $adm = explode(":", $adm);
    $aname = "$adm[0]";
  } else {
    $aname = "$admin[0]";
  }
}
$index=1;
$adm_info = $db->sql_fetchrow($db->sql_query("SELECT * FROM `".$prefix."_authors` WHERE `aid`='$aname'"));
if($adm_info['radminsuper']==1) {
  $pagename = "NSN Center Blocks";
  switch($op) {
    default:include(NSNCB_INSTALL_DIR."default.php");break;
    case "install":include(NSNCB_INSTALL_DIR."install.php");break;
    case "1xx-200":include(NSNCB_INSTALL_DIR."1xx-200.php");break;
    case "200-201":include(NSNCB_INSTALL_DIR."200-201.php");break;
    case "201-210":include(NSNCB_INSTALL_DIR."201-210.php");break;
    case "210-220":include(NSNCB_INSTALL_DIR."210-220.php");break;
    case "destall":include(NSNCB_INSTALL_DIR."destall.php");break;
  }
} else {
  include(NSNCB_INSTALL_DIR."error.php");
}

?>