<?php

/********************************************************/
/* NukeProject(tm)                                      */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright © 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('NSNPJ_ADMIN')) { die("Illegal Access Detected!!!"); }
pjsave_config('admin_report_email', $admin_report_email);
pjsave_config('new_report_position', $new_report_position);
pjsave_config('new_report_status', $new_report_status);
pjsave_config('new_report_type', $new_report_type);
pjsave_config('notify_report_admin', $notify_report_admin);
pjsave_config('notify_report_submitter', $notify_report_submitter);
pjsave_config('report_date_format', $report_date_format);
header("Location: ".$admin_file.".php?op=PJReportConfig");

?>