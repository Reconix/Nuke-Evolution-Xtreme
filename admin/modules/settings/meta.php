<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/
/*****[CHANGES]**********************************************************
-=[Base]=-
      Nuke Patched                             v3.1.0       06/26/2005
      Caching System                           v1.0.0       11/20/2005
 ************************************************************************/

if(!defined('IN_SETTINGS')) {
  exit('Access Denied');
}

global $prefix, $db, $admdata;

function Get_Meta_Array() {
    global $prefix, $db;
    
    $sql = 'SELECT meta_name, meta_content FROM '.$prefix.'_meta';
    $result = $db->sql_query($sql);
    $i=0;
    while(list($meta_name, $meta_content) = $db->sql_fetchrow($result)) {
        $metatags[$i] = array();
        $metatags[$i]['meta_name'] = $meta_name;
        $metatags[$i]['meta_content'] = $meta_content;
        $i++;
    }
    $db->sql_freeresult($result);
    
    return $metatags;
}

echo "<fieldset><legend><span class='option'><strong>" . _METACONFIG . "</strong></span></legend>"
."<table border='0'>";

$metatags = Get_Meta_Array();
for($i=0, $maxi=count($metatags);$i<$maxi;$i++) {
    $metatag = $metatags[$i];
    echo "<tr><td>"
        ."" . $metatag['meta_name'] . ":</td><td><input type='text' name='x" . $metatag['meta_name'] . "' value='".$metatag['meta_content']."' size='40'>"
        ."&nbsp;<a href='" . $admin_file . ".php?op=ConfigSave&amp;sub=11&amp;act=delete&amp;meta=" . $metatag['meta_name'] . "'><img src='images/evo/delete.png' alt='' border='0' align='middle'></a></td></tr>";
}

echo"<tr><td>"
."<input type='text' name='new_name' value='' size='15'></td><td><input type='text' name='new_value' value='' size='40'>"
."</td></tr>"
."</table></fieldset><br />";
        
?>