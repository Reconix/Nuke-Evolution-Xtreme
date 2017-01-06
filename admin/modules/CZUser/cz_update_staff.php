<?php

		$db->sql_query("UPDATE ".$prefix."_czuser_info SET pic = '$pic', king = '$king', gname='$gid', caption='$caption' WHERE view = '$urid'");
		redirect($admin_file.'.php?op=czuser');
		
?>