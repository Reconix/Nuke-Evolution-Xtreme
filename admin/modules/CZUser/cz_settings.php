<?php

	include_once(NUKE_INCLUDE_DIR.'czuser_func.php');

		save_userinfo_config('czuser_ip', $xczuser_ip);
		save_userinfo_config('czuser_pms', $xczuser_pms);
		save_userinfo_config('czuser_pms_alert', $xczuser_pms_alert);
		save_userinfo_config('czuser_posts', $xczuser_posts);
		save_userinfo_config('czuser_avatar', $xczuser_avatar);
		save_userinfo_config('czuser_bbrank', $xczuser_bbrank);
		save_userinfo_config('czuser_mostonline', $xczuser_mostonline);
		save_userinfo_config('czuser_stats', $xczuser_stats);
		save_userinfo_config('czuser_groups', $xczuser_groups);
		save_userinfo_config('czuser_tooltip', $xczuser_tooltip);
		save_userinfo_config('czuser_online', $xczuser_online);
		save_userinfo_config('czuser_guests', $xczuser_guests);
		save_userinfo_config('czuser_pick', $xczuser_pick);
		save_userinfo_config('czuser_mode', $xczuser_mode);
		save_userinfo_config('tooltip_avatar', $xtooltip_avatar);
		save_userinfo_config('tooltip_username', $xtooltip_username);
		save_userinfo_config('tooltip_email', $xtooltip_email);
		save_userinfo_config('tooltip_reg_date', $xtooltip_reg_date);
		save_userinfo_config('tooltip_posts', $xtooltip_posts);
		save_userinfo_config('tooltip_theme', $xtooltip_theme);
		save_userinfo_config('tooltip_where', $xtooltip_where);
		redirect($admin_file.'.php?op=czuser');
		
?>