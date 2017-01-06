<?php

		function del_catimage($arc){
		
		include(NUKE_BASE_DIR.'header.php');
		
			OpenTable();
		
			global $prefix, $db, $admin_file;
			
			$catpath = 'images/CZUser/admin/';
		
			if ( !file_exists($arc)){

				$arrayindex = array_keys($arc);
				$index = 0;
			while($index < count($arc)) {
				$result = unlink($catpath."".$arc[$arrayindex[$index]]);
            	$db->sql_query("DELETE FROM ".$prefix."_czuser_ranks WHERE img_pic = '".$arc[$arrayindex[$index]]."'");
			
            	$result = 1;
				$index++;

        	}
		
			if($result == 1){
        		//echo"<meta http-equiv='refresh' content='4'; URL='".$admin_file.".php?op=InfoBox'>";
				header("Refresh: 3; url=".$admin_file.".php?op=czuser");

        		echo "<div align='center'>Selected File(s) have been deleted.</div>";
			
				echo "<br /><br />";
			
				echo "<div align='center'>Please Wait...  Redirecting...</div>";
			
			} else {
		
				//echo"<meta http-equiv='refresh' content='4'; URL='".$admin_file.".php?op=InfoBox'>";
				header("Refresh: 3; url=".$admin_file.".php?op=czuser");
		
				echo "<div align='center'>Error: Nothing to Delete.</div>";
			
				echo "<br /><br />";
			
				echo "<div align='center'>Please Wait...  Redirecting...</div>";
			
			}

		 	CloseTable();

			}
		
		include(NUKE_BASE_DIR.'footer.php');
		
		} // Function del_catimage() End
		
 del_catimage($arc);

?>