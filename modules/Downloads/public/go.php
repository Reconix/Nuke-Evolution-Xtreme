<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : go.php
   Author        : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 11.21.2005 (mm.dd.yyyy)

   Notes         : Advanced Downloads module with BBGroups Integration
                   based on NSN GR Downloads.
************************************************************************/

/********************************************************/
/* Based on NSN GR Downloads                            */
/* By: NukeScripts Network (webmaster@nukescripts.net)  */
/* http://www.nukescripts.net                           */
/* Copyright (c) 2000-2005 by NukeScripts Network         */
/********************************************************/

if(!defined('IN_DOWNLOADS')) {
  exit('Access Denied');
}

function remote_filesize($url, $timeout=2) {
    $url = parse_url($url);
    $size=false;
    if ($fp = @fsockopen($url['host'], ($url['port'] ? $url['port'] : 80), $errno, $errstr, $timeout))
    {
        @fwrite($fp, 'HEAD '.$url['path']." HTTP/1.0\r\nHost: ".$url['host']."\r\n\r\n");
        @stream_set_timeout($fp, $timeout);
        while (!feof($fp))
        {
            $size = @fgets($fp, 4096);
            if (stristr($size, 'Content-Length') !== false) // PHP5: stripos
            {
                $size = trim(substr($size, 16));
                break;
            }
        }
        @fclose ($fp);
    }
    return ((int)$size == $size) ? ((int)$size) : false;
}

global $cookie, $userinfo;
$lid = intval($lid);
$lidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_downloads_downloads WHERE lid=$lid"));
$priv = $lidinfo['sid'] - 2;
if (($lidinfo['sid'] == 0) || ($lidinfo['sid'] == 1 AND is_user()) || ($lidinfo['sid'] == 2 AND is_mod_admin($module_name)) || ($lidinfo['sid'] > 2 AND of_group($priv))) {
  if (!empty($fetchid)) {
    $datekey = date("F j");
    $rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $checkpass . $datekey));
    $code = substr($rcode, 2, $evoconfig['codesize']);
    if (!security_code_check($_POST['gfx_check'], 'force') AND $dl_config['usegfxcheck'] == 1) {
      include_once(NUKE_BASE_DIR."header.php");
      title(_DL_PASSERR);
      OpenTable();
      echo "<center>"._DL_INVALIDPASS."</center><br />\n";
      echo "<center>"._GOBACK."</center>\n";
      CloseTable();
      include_once(NUKE_BASE_DIR."footer.php");
    } elseif ((!GDSUPPORT AND $checkpass != $passcode) AND $dl_config['usegfxcheck'] == 1) {
      include_once(NUKE_BASE_DIR."header.php");
      title(_DL_PASSERR);
      OpenTable();
      echo "<center>"._DL_INVALIDPASS."</center><br />\n";
      echo "<center>"._GOBACK."</center>\n";
      CloseTable();
      include_once(NUKE_BASE_DIR."footer.php");
    } else {
      $url = base64_decode($fetchid);
      $folder = dirname(dirname(__FILE__)) . '/files' . $cidinfo['uploaddir'];
      if (stristr($lidinfo['url'], "http://") || stristr($lidinfo['url'], "ftp://") || @file_exists($lidinfo['url']) || @file_exists($folder.'/'.$lidinfo['url'])) {
        include_once(NUKE_INCLUDE_DIR.'counter.php');
        $db->sql_query("UPDATE ".$prefix."_downloads_downloads SET hits=hits+1 WHERE lid=$lid");
        if (!is_mod_admin($module_name)) {
          $uinfo = $userinfo;
          $username = $uinfo['username'];
          if (empty($username)) { $username = identify::get_ip(); }
          $result = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_accesses WHERE username='$username'"));
          if ($result < 1) {
            $db->sql_query("INSERT INTO ".$prefix."_downloads_accesses VALUES ('$username', 1, 0)");
          } else {
            $db->sql_query("UPDATE ".$prefix."_downloads_accesses SET downloads=downloads+1 WHERE username='$username'");
          }
        }
        $cidinfo = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_downloads_categories WHERE cid='".$lidinfo['cid']."'"));
        $temp_folder = dirname(dirname(__FILE__)) . '/files/';
        $pos = strpos($cidinfo['uploaddir'], $temp_folder);
        if($cidinfo['uploaddir'] == $temp_folder){
        	$cidinfo['uploaddir'] = '';
        }
        else if($pos === true || intval($pos) == 0) {
        	$cidinfo['uploaddir'] = substr($cidinfo['uploaddir'], $pos, strlen($temp_folder));
        }
        $url_folder = 'modules/'.basename(dirname(dirname(__FILE__))).'/files';
        $local = (!ereg('/',$lidinfo['url'])) ? true : false;
        if(substr($lidinfo['url'],0,strlen($url_folder)) == $url_folder || $local) {
            global $do_gzip_compress;
            if ($do_gzip_compress = true){
                while (ob_end_clean());
                header('Content-Encoding: none');
            }
            $file_name = ($local) ? $lidinfo['url'] : substr($lidinfo['url'],strlen($url_folder)+1);
            $file = $folder . '/' . $file_name;
            $size = @filesize($file);
            if (!$size) {
                $size = @remote_filesize($lidinfo['url']);
            }
            $content = @mime_content_type($file);
            $name = @basename($file);

            if(!$size || empty($size)){
                $logdata = array(_DL_ERROR_WITH .$file_name, _DL_ERROR_FILE_SIZE, _DL_ERROR_FILE_LOCATION . $file);
                if(function_exists('log_write')) {
                    log_write('error', $logdata, _DL_ERROR_2);
                }
                OpenTable();
                echo '<center>'._DL_ERROR_2.'</center>';
                CloseTable();
                include_once(NUKE_BASE_DIR.'footer.php');
                die();
            }

            //If the mime_content_type was apart of PHP
            if (!defined('MIME_FUNCTION')) {
                //And it returned plain text
                if ($content == "text/plain") {
                    //Get a second opinion
                    $content = get_mime_content_type($file);
                }
            }

            header("Pragma: public");
            header("Content-type: $content; name=$name");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false);
            header("Content-length: $size");
            header("Content-Disposition: inline; filename=\"$name\"");

            @readfile($file);
            exit;
        } else {
            if ($do_gzip_compress = true){
                while (ob_end_clean());
                header('Content-Encoding: none');
            }
            $name = @basename($lidinfo['url']);
            $content = @mime_content_type($name);
            $size = @remote_filesize($lidinfo['url']);
            //If the mime_content_type was apart of PHP
            if (!defined('MIME_FUNCTION')) {
                //And it returned plain text
                if ($content == "text/plain") {
                    //Get a second opinion
                    $content = get_mime_content_type($lidinfo['url']);
                }
            }
            if (!empty($name) && !empty($content) && !empty($size)) {
                header("Pragma: public");
                header("Content-type: $content; name=$name");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: private", false);
                header("Content-length: $size");
                header("Content-Disposition: inline; filename=\"$name\"");
                if(!@readfile($lidinfo['url'])) {
                    redirect($lidinfo['url']);
                }
                exit;
            } else {
                redirect($lidinfo['url']);
            }
        }
        exit;
      } else {
        $username = $cookie[1];
        if (empty($username)) { $username = "Guest"; }
        $date = date("M d, Y g:i:a");
        $sub_ip = identify::get_ip();
        $db->sql_query("INSERT INTO ".$prefix."_downloads_mods VALUES (NULL, $lid, 0, 0, '', '', '', '"._DSCRIPT."<br />$date', '$sub_ip', 1, '$auth_name', '$email', '$filesize', '$version', '$homepage')");
        include_once(NUKE_BASE_DIR.'header.php');
        title(_DL_FNF." ".$lidinfo['title']);
        OpenTable();
        echo "<center>"._DL_SORRY." $username, ".$lidinfo['title']." "._DL_NOTFOUND."<br /><br />"._DL_FNFREASON."<br /><br />";
        echo _DL_FLAGGED."</center><br />";
        echo "<center>[ <a href='modules.php?name=$module_name'>"._DL_BACKTO." $module_name</a> ]</center>";
        CloseTable();
        include_once(NUKE_BASE_DIR.'footer.php');
      }
    }
  } else {
    include_once(NUKE_BASE_DIR.'header.php');
    title(_DL_URLERR);
    OpenTable();
    echo "<center>"._DL_INVALIDURL."</center><br />";
    echo "<center>"._GOBACK."</center>";
    CloseTable();
    include_once(NUKE_BASE_DIR.'footer.php');
  }
} else {
  include_once(NUKE_BASE_DIR.'header.php');
  title(_DL_RESTRICTED);
  OpenTable();
  restricted($lidinfo['sid']);
  CloseTable();
  include_once(NUKE_BASE_DIR.'footer.php');
}

?>