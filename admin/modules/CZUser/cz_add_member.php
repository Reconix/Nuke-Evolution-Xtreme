<?php

		if (isset($manual_name) && $manual_name != '') 
		{
			$add_name = $manual_name;
		}
		
		$tmp = $db->sql_query("SELECT `username` FROM `". $prefix ."_users` WHERE `username` = '". $add_name ."'");
		
		if ($db->sql_numrows($tmp) != 1) 
		{
			include(NUKE_BASE_DIR.'header.php');
			
    			OpenTable();
				
					echo "<div align=\"center\"><b>ERROR: The user ". $add_name ." does not exist.<br /><br />". _GOBACK ."</b></div>";
					
				CloseTable();
				
			include(NUKE_BASE_DIR.'footer.php');
		} 
		else 
		{
			$result = $db->sql_query("INSERT INTO `". $prefix ."_czuser_info` (pic, view, king, gname, caption) VALUES ('". $add_pic ."', '". $add_name ."', '". $add_king ."', '". $gname ."', '". $caption ."')");			
			redirect($admin_file.'.php?op=czuser');
		}

?>