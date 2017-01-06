<?php
/*=======================================================================
 Nuke-Evolution Xtreme: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Installer
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : functions.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Notes         : You may NOT use this installer for your own
                   needs or script. It is written specifically
                   for Nuke-Evolution.
************************************************************************/

#Global vars.
define("IN_PHPBB", true);
$data_file = "install/data.txt";
if(!$open_data = @fopen($data_file, "r")) {
    echo $install_lang['data_error'];
    exit;
}
$data = @fread($open_data, @filesize($data_file));
@fclose($open_data);
list($required_files, $chmods) = explode("\n###", $data);

$required_files = explode("\n", $required_files);
$chmods = explode("\n", $chmods);

$directory_mode = false;

if(!$directory_mode) {
	$directory_mode = 0755; 
} else { 
	$directory_mode = 0777;
}

$file_mode = false;

if (!$file_mode){
	$file_mode = 0666; 
} else {
	$file_mode = 0644;
}
function message($message, $die=false) {
    global $install_lang;
    if ($die) {
        die("<table id=menu border=\"1\" width=\"100%\">"
            ."<th id=test align=\"center\">" . $install_lang['die_message'] . "</th>"
            ."<tr><td align=\"center\"><strong>" . $message . "</strong></td></tr>"
            ."</table><br />");
    } else {
        echo("<table id=menu border=\"1\" width=\"100%\">"
            ."<th id=test align=\"center\">" . $install_lang['general_message'] . "</th>"
            ."<tr><td align=\"center\"><strong>" . $message . "</strong></td></tr>"
            ."</table><br />");
    }
}
function generate_config() {
    global $directory_mode, $file_mode, $install_lang, $next_step;

    if(@is_file('config.php')) {
        @unlink('config.php');
    }

    $filename = "install/config_blank.php";
    if(!$handle = @fopen ($filename, "r"))
    {
        $message = $install_lang['cant_open'] . " $filename";
        message($message);
    }
    $contents = @fread ($handle, filesize ($filename));
    @fclose ($handle);

    $contents = str_replace("%dbhost%", $_SESSION['dbhost'], $contents);
    $contents = str_replace("%dbname%", $_SESSION['dbname'], $contents);
    $contents = str_replace("%dbuname%", $_SESSION['dbuser'], $contents);
    $contents = str_replace("%dbpass%", $_SESSION['dbpass'], $contents);
    $contents = str_replace("%prefix%", $_SESSION['prefix'], $contents);
    $contents = str_replace("%user_prefix%", $_SESSION['user_prefix'], $contents);
    $contents = str_replace("%dbtype%", $_SESSION['dbtype'], $contents);

    $filename = "config.php";

    if(!@touch ($filename)) {
        $DownloadData = true;
    }
    @chmod($filename, $directory_mode);
    if (@is_writable($filename))
    {
        if (!$handle = @fopen($filename, 'a'))
        {
            $message = $install_lang['cant_open'] . " $filename";
            return $message;
        }

        if (!@fwrite($handle, $contents))
        {
            $message = $install_lang['cantwrite'] . " $filename";
            return $message;
        }
        @fclose($handle);
    } else {    
    $_SESSION['configData'] = $contents;
        echo("<input type='hidden' name='download_file' value='1'>"
            ."<tr><th id=test align=\"center\">" . $install_lang['general_message'] . "</th></tr>"
            ."<tr><td align=\"center\"><strong>" . $install_lang['config_failed'] . "</strong></td></tr>"
            ."<tr><td align=\"center\"><input type='submit' value='Download Config File'><input type=hidden name=step value=\"".$next_step."\"><input type='submit' name='continue' value=\"" . $install_lang['continue'] . " $next_step\"></td></tr>");
        return false;
    }

    return true;
}
function chmod_files() {
    global $directory_mode, $file_mode, $install_lang, $chmods;
	
	$message = '';
	$perm    = false;

    foreach ($chmods as $file) {
        $file = explode(" ", $file);
        if (array_key_exists(1, $file)) $perm = $file[1];
        $perm = str_replace("[", "", str_replace("]", "", $perm));
        $file = $file[0];
		
        if (!empty($file) && !empty($perm)) {
            if(!(substr($file,strlen($file)-1)=='/') && !@is_file($file)) {
                $message .="<tr><td align=\"center\">$file - <font color=red>" . $install_lang['is_missing'] . "</font></td></tr>";
                $failed = true;
                continue;
            }
            $permission = "0".$perm;
            if (!@chmod($file, intval($permission,8))) {
                $message .="<tr><td align=\"center\">$file - <font color=red>" . $install_lang['failed'] . "</font> CHMOD:($perm)</td></tr>";
                $failed = true;
            } else {
                $message .="<tr><td align=\"center\">($perm) $file - <font color=green>" . $install_lang['success'] . "</font></td></tr>";
            }
        }
    }
    if ($failed) {
        $message .="<tr><td align=\"center\"><font color=red>" . $install_lang['chmod_failed'] . "</font></td></tr>";
    }
    return $message;
}
function check_required_files() {
    global $install_lang, $required_files;

    foreach($required_files as $file) {
        $file = @trim($file);
        #looping to make sure all required files are there..
        if (!is_file($file)) {
            $message .= $install_lang['thefile'] . " \"" . $file . "\" " . $install_lang['is_missing'];
        }
    }
    #End the loop, check to see if any errors.
    if (isset($message)) {
        message($message, true);
    }
    return;
}

function make_step_list() {
    global $step, $step_a, $install_lang;
	
	$show = '';

    while(list($step_num, $label) = each($step_a)) {
        if ($step_num < $step) {
            $show .= "<strike>$label</strike><hr />";
        } elseif ($step == $step_num) {
            $show .= "<strong>$label</strong><hr />";
        } else {
            $show .="$label<hr />";
        }
    }
    return $show;
}
function validate_data($post) {
    global $step, $next_step, $install_lang, $server_check;
	
	$error = '';

    $dbhost = ($_POST['dbhost']) ? $_POST['dbhost'] : $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['dbhost_error'] . "</font></td></tr>";
    $dbname = ($_POST['dbname']) ? $_POST['dbname'] : $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['dbname_error'] . "</font></td></tr>";
    $dbuser = ($_POST['dbuser']) ? $_POST['dbuser'] : $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['dbuser_error'] . "</font></td></tr>";
    $dbpass = ($_POST['dbpass']) ? $_POST['dbpass'] : '';
    $prefix = ($_POST['prefix']) ? $_POST['prefix'] : $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['prefix_error'] . "</font></td></tr>";
    $user_prefix = ($_POST['user_prefix']) ? $_POST['user_prefix'] : $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['uprefix_error'] . "</font></td></tr>";
    $dbtype = ($_POST['dbtype'] ) ? $_POST['dbtype'] : $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['dbtype_error'] . "</font></td></tr>";
    if (isset($error) && !empty($error)) {
        $error .= "<tr><td align=\"center\"><input type=hidden name=step value=$next_step><input type=submit name=submit value=\"" . $install_lang['continue'] . " $next_step\" disabled></td></tr>";
        return $error;
    }

    if (!($server_check = @mysql_connect($dbhost, $dbuser, $dbpass))) {
        $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['connection_failed'] . "</font></td></tr>";
    }

    if (!(@mysql_select_db($dbname))) {
        $error .= "<tr><td align=\"center\"><font color=red>" . $install_lang['connection_failed2'] . "</font></td></tr>";
    }
    //@mysql_close($server_check);

    if (isset($error) && !empty($error)) {
        $error .="<tr><td align=\"center\"><input type=hidden name=step value=$next_step><input type=submit name=submit value=\"" . $install_lang['continue'] . " $next_step\" disabled></td></tr>";
        return $error;
    }

    $_SESSION['dbhost'] = $dbhost;
    $_SESSION['dbname'] = $dbname;
    $_SESSION['dbuser'] = $dbuser;
    $_SESSION['dbpass'] = $dbpass;
    $_SESSION['prefix'] = $prefix;
    $_SESSION['user_prefix'] = $user_prefix;
    $_SESSION['dbtype'] = $dbtype;
	
	$message = '';

    if (generate_config()) {
        $message .= "<tr><td align=\"center\"><font color=green>" . $install_lang['config_success'] . "</font></td></tr>";
        $message .= "<tr><td align=\"center\"><font color=green>" . $install_lang['data_success'] . "</font></td></tr>";
        $message .= "<tr><td align=\"center\"> <input type=hidden name=step value=$next_step> <input type=submit name=submit value=\"" . $install_lang['continue'] . " $next_step\" ></td></tr>";
    } else {
        $message .= "<tr><td align=\"center\"><font color=red>" . $install_lang['config_failed'] . "</font></td></tr>";
    }

    return $message;
}
function server_check() {
    global $install_lang, $server_check;

    $sql_ver = @mysql_get_server_info();
	
	$message = $error = '';

    if(!empty($sql_ver)) {
        if(intval(substr($sql_ver,0,1)) <= 3) {
            $error .= "<tr><td align=\"center\">" . $install_lang['mysql_incorrect'] . "</td></tr>";
        }
    }

    if (isset($_SESSION['dbtype'])) {
        if ($_SESSION['dbtype'] != "mysql") {
            $message .= "<tr><td align=\"center\"><font color=red>" . $install_lang['dbtype_que'] . "</td></tr>";
        }
    }
    if (!isset($_SESSION['dbname']) || !isset($_SESSION['dbuser']) || !isset($_SESSION['dbpass']) || !isset($_SESSION['prefix']) || !isset($_SESSION['user_prefix']) || !isset($_SESSION['dbhost'])) {
        $message .= "<tr><td align=\"center\"><font color=red>" . $install_lang['session_lost'] . "</td></tr>";
    }

    
    if(defined('PHPVERS') && substr(PHPVERS,0,1) < "4") {
        $message .= "<tr><td align=\"center\"><font color=red>" . $install_lang['php_ver'] . " " .PHPVERS ."</td></tr>";
    }
    if (empty($message)) {
        $message .= "<tr><td align=\"center\"><font color=green>" . $install_lang['checks_good'] . "</td></tr>";
    }
    @mysql_close($server_check);
    return $message;
}

function do_sql($install_file) {
    global $nuke_name, $next_step, $step, $install_lang, $prefix, $user_prefix;
	
	$message = '';

    if(!$handle = @fopen ($install_file, "r"))
    {
        $message = $install_lang['cant_open'] . " ".$install_file;
        return $message;
    }
    $contents = @fread ($handle, filesize ($install_file));
    @fclose ($handle);
    $filename = $install_file;

    $filesize       = filesize($filename);
    $file_position  = isset($HTTP_GET_VARS['pos']) ? $HTTP_GET_VARS['pos'] : 0;
    $errors         = isset($HTTP_GET_VARS['ignore_errors']) ? 0 : 1;

    if (!$fp = @fopen($filename,'rb'))
    {
        echo $install_lang['cant_open'] . " $filename";
    }

    $buffer = '';
    $inside_quote = 0;
    $quote_inside = '';
    $started_query = 0;
    $data_buffer = '';
    $last_char = "\n";

    @fseek($fp,$file_position);

    while ((!feof($fp) || strlen($buffer)))
    {
        do
        {
            if (!strlen($buffer))
            {
                $buffer .= fread ($fp,1024);
            }

            $current_char = $buffer[0];
            $buffer = substr($buffer, 1);

            if ($started_query)
            {
                $data_buffer .= $current_char;
            }
            elseif (preg_match("/[A-Za-z]/i",$current_char) && $last_char == "\n")
            {
                $started_query = 1;
                $data_buffer = $current_char;
            }
            else
            {
                $last_char = $current_char;
            }
        } while (!$started_query && (!feof($fp) || strlen($buffer)));
        if ($inside_quote && $current_char == $quote_inside && $last_char != '\\')
        {
            $inside_quote = 0;
        }
        elseif ($current_char == '\\' && $last_char == '\\')
        {
            $current_char = '';
        }
        elseif (!$inside_quote && ($current_char == '"' || $current_char == '`' || $current_char == '\''))
        {
            $inside_quote = 1;
            $quote_inside = $current_char;
        }
        elseif (!$inside_quote && $current_char == ';')
        {
            if($user_prefix != "nuke" && !empty($user_prefix)) {
                $data_buffer = str_replace("`nuke_users`", "`" . $user_prefix . "_users`", $data_buffer);
            }
            if($prefix != "nuke" && !empty($prefix)) {
                $data_buffer = str_replace("`nuke_", "`".$prefix."_", $data_buffer);
            }

            @mysql_query($data_buffer);

            if ($errors && mysql_errno())
            {
                $message .= "<tr><td align=\"center\"><font color=red>" . $install_lang['sql_error'] . mysql_errno().": ".mysql_error()."<br />".$data_buffer."</td></tr>";
            }
            $data_buffer = '';
            $last_char = "\n";
            $started_query = 0;
        }

        $last_char = $current_char;
    }
    $new_position = ftell($fp) - strlen($buffer) - strlen($data_buffer);

    @fclose($fp);

    if (empty($message)) {
        $message = "<tr><td align=\"center\"><strong><font color='green'>" . $install_lang['install_success'] . "</font></strong></td></tr><tr><td align=center><input type=hidden name=step value=$next_step><input type=submit name=confirm value=\"" . $install_lang['configure'] . "\"></td></tr>";
    } else {
        $message .= "<tr><td align=center><input type=hidden name=step value=$next_step><input type=submit name=confirm value=\"" . $install_lang['configure'] . "\" disabled></td></tr>";
    }
    return $message;
}
function site_form($display = 1) {
    global $install_lang, $HTTP_POST_VARS;

    $sql = "SELECT *
            FROM " . $_SESSION['prefix'] . "_bbconfig";

    if(!$result = mysql_query($sql))
    {
        $error .= "<tr><td align=center>" . $install_lang['get_config_error'] . mysql_error() . "</td></tr>";
    }

    while( $row = @mysql_fetch_assoc($result) )
    {
        $config_name = $row['config_name'];
        $config_value = $row['config_value'];
        $default_config[$config_name] = isset($HTTP_POST_VARS['submit']) ? str_replace("'", "\'", $config_value) : $config_value;

        $new[$config_name] = ( isset($HTTP_POST_VARS[$config_name]) ) ? $HTTP_POST_VARS[$config_name] : $default_config[$config_name];

        if ($config_name == 'cookie_name')
        {
            $cookie_name = str_replace('.', '_', $new['cookie_name']);
        }

        if( isset($HTTP_POST_VARS['submit']) )
        {
            $sql = "UPDATE " . $_SESSION['prefix'] . "_bbconfig SET
                    config_value = '" . str_replace("\'", "''", $new[$config_name]) . "'
                    WHERE config_name = '$config_name'";
            if( !mysql_query($sql) )
            {
                $error .="<tr><td align=center>" . $install_lang['update_fail'] . " $config_name <br />" . mysql_error() . "</td></tr>";
                return $error;
            }
            if($config_name == "server_name") {
                $sql = "UPDATE " . $_SESSION['prefix'] . "_config SET
                      nukeurl = 'http://" . str_replace("\'", "''", $new[$config_name]) . "'";
                if( !mysql_query($sql) )
                {
                    $error .="<tr><td align=center>" . $install_lang['update_fail'] . " $config_name <br />" . mysql_error() . "</td></tr>";
                    return $error;
                }
            }
        }
    }
	
	$form = '';
	
    if (!empty($display)) {
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['sitename'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"http://".$_SERVER["SERVER_NAME"]."\" name=\"sitename\"></td></tr>";

        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['sitedescr'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"$new[site_desc]\" name=\"site_desc\"></td></tr>";

        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['cookie_name'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"$new[cookie_name]\" name=\"cookie_name\"></td></tr>";

        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['cookie_path'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"$new[cookie_path]\" name=\"cookie_path\"></td></tr>";
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['cookie_domain'] . "</strong></td> <td align=\"center\" width=50%><input type=text length=60 value=\"".$_SERVER["HTTP_HOST"]."\" name=\"cookie_domain\"></td></tr>";
        $namechange_checked = ($new['allow_namechange']) ? "checked" : "";
        $namechange_not_checked = (!$new['allow_namechange']) ? "checked" : "";
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['namechange'] . "</strong></td> <td align=\"center\" width=50%>" . $install_lang['yes'] . " <input type=radio value=\"1\" name=\"allow_namechange\" $namechange_checked> " . $install_lang['no'] . " <input type=radio value=\"0\" name=allow_namechange $namechange_not_checked></td></tr>";
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['email_sig'] . "</strong></td> <td align=\"center\" width=50%><textarea name=board_email_sig>$new[board_email_sig]</textarea></td></tr>";

        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['site_email'] . "</strong></td> <td align=\"center\" width=50%><input type=text name=\"board_email\" value=\"".$new['board_email']."\"></td></tr>";
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['default_lang'] . "</strong></td> <td align=\"center\" width=50%>" . language_select('english', 'default_lang') . "</td></tr>";
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['server_name'] . "</strong></td> <td align=\"center\" width=50%><input type=text name=\"server_name\" value=\"".$_SERVER["SERVER_NAME"]."\"></td></tr>";
        $form .=" <tr><td align=\"center\" width=50%><strong>" . $install_lang['server_port']. "</strong></td> <td align=\"center\" width=50%><input type=text name=\"server_port\" value=\"".$new['server_port']."\"></td></tr>";

        return $form;
    } else {
        return;
    }
}

?>