<?php

		function del_member($mem)
		{		
			include(NUKE_BASE_DIR.'header.php');
			
				global $prefix, $db, $admin_file;
			
				OpenTable();		
							
					$arrayindex = array_keys($mem);
					$index = 0;
					while($index < count($mem)) 
					{
						$db->sql_query("DELETE FROM `". $prefix ."_czuser_info` WHERE `view` = '". $mem[$arrayindex[$index]] ."'");			
						$result = 1;
						$index++;
		
					}
				
					if($result == 1)
					{
						redirect($admin_file.'.php?op=czuser');				
					} 
					else 
					{	
						echo "<div align=\"center\">";
						echo "Error: Nothing to Delete.";
						echo "<br /><br />";
						echo _GOBACK;
						echo "</div>";			
					}
			
				CloseTable();
		
			include(NUKE_BASE_DIR.'footer.php');				
		}		
		del_member($mem);
		
?>