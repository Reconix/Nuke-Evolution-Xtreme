<?php

	function get_userinfo_config()
	{
		global $prefix, $db, $cache;
		static $config;
		if(isset($config)) return $config;
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    if(($config = $cache->load('czuser', 'config')) === false) {
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
			$configresult = $db->sql_query("SELECT `config_name`, `config_value` FROM `". $prefix ."_czuser_config`");
			while (list($config_name, $config_value) = $db->sql_fetchrow($configresult)) {
				$config[$config_name] = $config_value;
			}
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
        $cache->save('czuser', 'config', $config);
    }
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
		return $config;
	}
	
	function save_userinfo_config($config_name, $config_value)
	{
    	global $prefix, $db, $cache;
    	$db->sql_query("UPDATE `". $prefix ."_czuser_config` SET `config_value` = '$config_value' WHERE `config_name` = '$config_name'");
/*****[BEGIN]******************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
    	$cache->delete('czuser', 'config');
/*****[END]********************************************
 [ Base:    Caching System                     v3.0.0 ]
 ******************************************************/
	}
	
	function get_group_name($group_id)
	{
		global $prefix, $db;
		$row = $db->sql_ufetchrow("SELECT `group_name` FROM `". $prefix ."_bbgroups` WHERE `group_id` = '$group_id'");
		return $row['group_name'];
	}	

	function cuzser_admin_header()
	{
		global $admin_file;
		OpenTable();
			echo "<div align=\"center\"><a href='". $admin_file .".php?op=czuser'>Nuke-Evolution CZUser :: Blocks Admin Panel</a></div>";	
			echo "<br /><br />";	
			echo "<div align=\"center\">[ <a href='". $admin_file .".php'>Return To Main Administration</a> ]</div>";	
			//echo "<br /><br />";
		CloseTable();
	}

	function get_post_count($user_id)
	{
		global $user_prefix, $db;
		$row = $db->sql_ufetchrow("SELECT `user_posts` FROM `". $user_prefix ."_users` WHERE `user_id` = '". $user_id ."'");
		return $row['user_posts'];	
	}
	
	/*function check_image_type($type) 
	{
		switch($type) 
		{
			case 'image/jpeg':
			case 'image/pjpeg':
			case 'image/jpg':
				return '.jpg';
				break;
			case 'image/gif':
				return '.gif';
				break;
			case 'image/png':
				return '.png';
				break;
			default:
				return false;
				break;
		}
		return false;
	}*/
	
	function errorMsg($msg) 
	{
		include(NUKE_BASE_DIR.'header.php');	
    		OpenTable();	
				echo "<center><b>". $msg ."<br /><br />". _GOBACK ."</b><br><br><br></center>";		
			CloseTable();	
		include(NUKE_BASE_DIR.'footer.php');
	}

	function userinfo_create_date($format, $gmepoch, $tz)
	{
		global $board_config, $lang, $userdata, $pc_dateTime;
		static $translate;
		
		if (!defined('ANONYMOUS')) {
			define('ANONYMOUS', 1);
			define('MANUAL', 0);
			define('MANUAL_DST', 1);
			define('SERVER_SWITCH', 2);
			define('FULL_SERVER', 3);
			define('SERVER_PC', 4);
			define('FULL_PC', 6);
		}
	
		if ( empty($translate) && $board_config['default_lang'] != 'english' && is_array($lang['datetime']))
		{
			@reset($lang['datetime']);
			while ( list($match, $replace) = @each($lang['datetime']) )
			{
				$translate[$match] = $replace;
			}
		}
	
	
		if ( $userdata['user_id'] != ANONYMOUS )
		{
			switch ( $userdata['user_time_mode'] )
			{
				case MANUAL_DST:
					$dst_sec = $userdata['user_dst_time_lag'] * 60;
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec), $translate) : @gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec);
					break;
				case SERVER_SWITCH:
					$dst_sec = date('I', $gmepoch) * $userdata['user_dst_time_lag'] * 60;
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec), $translate) : @gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec);
					break;
				case FULL_SERVER:
					return ( !empty($translate) ) ? strtr(@date($format, $gmepoch), $translate) : @date($format, $gmepoch);
					break;
				case SERVER_PC:
					if ( isset($pc_dateTime['pc_timezoneOffset']) )
					{
						$tzo_sec = $pc_dateTime['pc_timezoneOffset'];
					} else
					{
						$user_pc_timeOffsets = explode("/", $userdata['user_pc_timeOffsets']);
						$tzo_sec = $user_pc_timeOffsets[0];
					}
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + $tzo_sec), $translate) : @gmdate($format, $gmepoch + $tzo_sec);
					break;
				case FULL_PC:
					if ( isset($pc_dateTime['pc_timeOffset']) )
					{
						$tzo_sec = $pc_dateTime['pc_timeOffset'];
					} else
					{
						$user_pc_timeOffsets = explode("/", $userdata['user_pc_timeOffsets']);
						$tzo_sec = (isset($user_pc_timeOffsets[1])) ? $user_pc_timeOffsets[1] : '';
					}
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + $tzo_sec), $translate) : @gmdate($format, $gmepoch + $tzo_sec);
					break;
				default:
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz)), $translate) : @gmdate($format, $gmepoch + (3600 * $tz));
					break;
			}
		} else
		{
			switch ( $board_config['default_time_mode'] )
			{
				case MANUAL_DST:
					$dst_sec = $board_config['default_dst_time_lag'] * 60;
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec), $translate) : @gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec);
					break;
				case SERVER_SWITCH:
					$dst_sec = date('I', $gmepoch) * $board_config['default_dst_time_lag'] * 60;
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec), $translate) : @gmdate($format, $gmepoch + (3600 * $tz) + $dst_sec);
					break;
				case FULL_SERVER:
					return ( !empty($translate) ) ? strtr(@date($format, $gmepoch), $translate) : @date($format, $gmepoch);
					break;
				case SERVER_PC:
					if ( isset($pc_dateTime['pc_timezoneOffset']) )
					{
						$tzo_sec = $pc_dateTime['pc_timezoneOffset'];
					} else
					{
						$tzo_sec = 0;
					}
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + $tzo_sec), $translate) : @gmdate($format, $gmepoch + $tzo_sec);
					break;
				case FULL_PC:
					if ( isset($pc_dateTime['pc_timeOffset']) )
					{
						$tzo_sec = $pc_dateTime['pc_timeOffset'];
					} else
					{
						$tzo_sec = 0;
					}
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + $tzo_sec), $translate) : @gmdate($format, $gmepoch + $tzo_sec);
					break;
				default:
					return ( !empty($translate) ) ? strtr(@gmdate($format, $gmepoch + (3600 * $tz)), $translate) : @gmdate($format, $gmepoch + (3600 * $tz));
					break;
			}
		}
	}


?>