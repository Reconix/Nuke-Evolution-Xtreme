<?php

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
/************************************************************************/
/* Tutorials Module v.1.1.2                                   COPYRIGHT */
/*                                                                      */
/* Copyright (c) 2004 - 2006 by http://www.techgfx.com                  */
/*     Techgfx - Graeme Allan                       (goose@techgfx.com) */
/*                                                                      */
/* Copyright (c) 2002 - 2006 by http://www.portedmods.com               */
/*     Mighty_Y - Yannick Reekman             (mighty_y@portedmods.com) */
/*                                                                      */
/* See TechGFX.com for detailed information on the Tutorials Module     */
/*                                                                      */
/* TechGFX: Your dreams, Our imagination                                */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
   die('Access Denied');
}
if (!stristr($_SERVER['SCRIPT_NAME'], "".$admin_file.".php")) { die ("Access Denied"); }

$module_name = "Tutorials";
include_once("modules/$module_name/language/lang-".$currentlang.".php");
switch($op) {

    case "tutorials":
    case "category":
    case "addcategory":
    case "addsubcategory":
    case "modcategory":
    case "modcat":
    case "modcatsave":
    case "modcatdelete":
    case "transfercategory":
    case "transfertut":
    case "addtutorial":
    case "modifytutorial":
    case "modtutorial":
    case "deltutorial":
    case "modtutorialsave":
    case "delcomment":
    case "delvote":
    case "cleanvotes":
    case "config":
    case "savetutorial":
    case "configsave":
    case "StatusAdmin":
    case "StatusOrder":
    case "fixweight":
    case "StatusAdd":
    case "StatusEdit":
    case "StatusEditSave":
    case "StatusDelete":
    case "tutsubmissions":
    case "subedit":
    case "subdeny":
    case "subapprove":
    include("modules/$module_name/admin/index.php");
    break;

}

?>
