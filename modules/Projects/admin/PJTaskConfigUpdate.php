<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
$new_task_position = intval($new_task_position);
$new_task_priority = intval($new_task_priority);
$new_task_status = intval($new_task_status);
pjsave_config('new_task_position', $new_task_position);
pjsave_config('new_task_priority', $new_task_priority);
pjsave_config('new_task_status', $new_task_status);
pjsave_config('task_date_format', $task_date_format);
header("Location: ".$admin_file.".php?op=PJTaskConfig");

?>