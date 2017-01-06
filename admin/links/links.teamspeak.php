<?php

if (!preg_match("/$admin_file.php/i", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }
adminmenu("admin.php?op=teamspeak", "".Teamspeak."", "teamspeak.png");

?>