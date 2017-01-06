<?php

		$db->sql_query("UPDATE `". $prefix ."_czuser_images` SET account_info='$account_info', member_ship='$member_ship', most_online='$most_online', online_stats='$online_stats', page_views='$page_views', member_group='$member_group', online_mem='$online_mem', sub_img='$sub_img'");
		redirect($admin_file.'.php?op=czuser');
		
?>