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
global $admin_file;
if(empty($admin_file)){
  $admin_file="admin";
}
if (!stristr($_SERVER['SCRIPT_NAME'], "".$admin_file.".php")) { die ("Access Denied"); }

    adminmenu($admin_file.".php?op=tutorials", "Tutorials", "Tutorials.png");

?>
