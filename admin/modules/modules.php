<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Evolution Functions
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : modules.php
   Author        : The Nuke-Evolution Team
   Version       : 1.0.0
   Date          : 04.14.2005 (mm.dd.yyyy)

   Notes         : Modules admin
************************************************************************/

if (!defined('ADMIN_FILE')){
   die ("Illegal File Access");
}

global $userinfo;
if (!is_admin()){
    die ("Access Denied");
}

function modadmin_title(){
    global $admin_file;

    OpenTable();
    echo "<div align=\"center\">\n<a href=\"$admin_file.php?op=modules\">" . _MODULES_ADMIN_HEADER . "</a></div>\n";
    echo "<br /><br />";
    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php\">" . _MODULES_RETURNMAIN . "</a> ]</div>\n";
    CloseTable();
    echo "<br />";
}

function modadmin_get_modules($mid=''){
    global $prefix, $db;

    $mid = (!empty($mid)) ? 'WHERE mid='.$mid : '';

    if(!$result = $db->sql_query("SELECT `mid`, `title`, `custom_title`, `active`, `view`, `inmenu`, `blocks`, `groups` FROM `".$prefix."_modules` $mid ORDER BY `mid` ASC")){
        DisplayError(_MOD_NF_VALUES);
    }
	
    if (!$out = $db->sql_fetchrowset($result)){
        DisplayError(_MOD_NF_VALUES);
    }
	
    $db->sql_freeresult($result);
	
    return $out;
}

function modadmin_activate($module){
    global $prefix, $db, $cache, $debugger;

    $result = $db->sql_query('SELECT active FROM '.$prefix."_modules WHERE mid=$module");
	
    if ($db->sql_numrows($result) > 0){
        list($active) = $db->sql_fetchrow($result);
		
        if (is_numeric($active)){
            $active = intval(!$active);
            $db->sql_query('UPDATE '.$prefix."_modules SET active='$active' WHERE mid=$module");
        }
    }
	
    $cache->delete('active_modules');
    $cache->resync();
}

function modadmin_activate_all($type){
    global $prefix, $db, $cache;

    $active = ($type == 'all') ? '1;' : "0 WHERE `title` <> 'Your_Account' AND `title` <> 'Profile';";
    $sql = "UPDATE `".$prefix."_modules` SET `active`=".$active;
    $db->sql_query($sql);
    $cache->delete('active_modules');
    $cache->resync();
}

function modadmin_home($mid){
    global $prefix, $db, $cache;

    list($title) = $db->sql_ufetchrow("SELECT title FROM ".$prefix."_modules WHERE mid='$mid'",SQL_NUM);
	
    if ($title == '' || $title == 'Evo_UserBlock'){
    	return false;
    }
	
    $db->sql_query("UPDATE ".$prefix."_main SET main_module='$title'");
    $db->sql_query("UPDATE ".$prefix."_modules SET active=1, view=0 WHERE mid='$mid'");
    $cache->delete('main_module');
    $cache->delete('active_modules');
    $cache->resync();
}

function modadmin_dispaly_modules($modadmin_modules){
    global $prefix, $db, $admin_file, $bgcolor, $bgcolor2,$bgcolor3, $bgcolor4;

    if (!is_array($modadmin_modules)) DisplayError(_MOD_NF_VALUES);

    $main_module = main_module();
	
	// Start the jQuery module editor
	echo "<script type=\"text/javascript\">
	//<![CDATA[
		var lastModuleID, lastModuleBG;
		
		// Append the Ajax Loader to the \"<body>\"
		nuke_jq(document).ready(function($){
			$('<div id=\"ajax-loader\" style=\"background: url(\'images/transparentbg.png\') repeat; z-index: 1; position: fixed; width: 100%; height: 100%; display: none;\"><div style=\"width: 60px; height: 60px; margin: 0 auto; text-align: center; color: #ffffff; position: relative; top: 50%; margin-top: -40px;\"><img src=\"images/ajax_loading.gif\" width=\"32\" height=\"32\" alt=\"Ajax Loading Image\" /><br /><br />Loading...</div></div>').prependTo('body');
		});
		
		function editModule(rel){
			// Get the information from the \"rel\" attribute
			rel = rel.split('||');
			
			// Show the Ajax Loader
			nuke_jq('#ajax-loader').show();
			
			// Check if another module is been edited
			if (lastModuleID && lastModuleBG && lastModuleID != rel[0]){
				setModuleData(lastModuleID,lastModuleBG,1);
			}
			
			// Send an Ajax request to the server
			setModuleData(rel[0],rel[1],0);
			
			// Set the last open module data
			lastModuleID = rel[0], lastModuleBG = rel[1];
		}
		
		function setModuleData(mid,bg,reset){
			nuke_jq(function($){
				// Send the request to the server
				$.post('{$admin_file}.php?op=modules', {moduleAjax: true, moduleID: mid, area: 'get_module_data', resetModule: reset, bgColor: bg}, function(data,status){
					if (status === 'success'){
						if (data == 'invalid_ajax_session'){
							alert('An invalid Ajax session has occurred, this happens when the values from the Ajax methods have been tampered with!');
						} else {
							$('#module-'+mid).replaceWith(data);
						}
					} else {
						alert('An error occurred while trying to connect to the server, please contact the site administrator or CMS developer if this continues to happen!');
					}
					
					setTimeout(\"hideLoader()\", 1000);
				});
				
				return false;
			});
		}
		
		function hideLoader(){
			nuke_jq('#ajax-loader').hide();
		}
	//]]>
	</script>\n";

    OpenTable();

    OpenTable();
    echo "<div align=\"center\">"._MODULEHOMENOTE."<br /><br />"._NOTINMENU."</div>\n";
    echo "<br /><br />";
    echo "<div align=\"center\">\n[ <a href=\"$admin_file.php?op=modules&amp;area=block\"><strong>" . _MODULES_BLOCK . "</strong></a> ]</div>\n";
    CloseTable();

    echo "<br /><br /><a href=\"".$admin_file.".php?op=modules&amp;a=all\">"._ACTIVATE." "._ALL."</a>&nbsp;|&nbsp;";
    echo "<a href=\"".$admin_file.".php?op=modules&amp;a=none\">"._DEACTIVATE." "._ALL."</a><br /><br />\n";

    echo "<form action=\"".$admin_file.".php?op=modules\" method=\"post\">\n";
    echo "<table border=\"0\" cellspacing=\"1\" width=\"100%\">\n";
    echo "  <tr style=\"background-color: ".$bgcolor2.";\">\n";
    echo "    <td height=\"25\" align=\"center\"><strong>"._ACTIVE."</strong></td>\n";
    echo "    <td align=\"center\"><strong>Home</strong></td>\n";
    echo "    <td align=\"center\"><strong>"._TITLE."</strong></td>\n";
    echo "    <td align=\"center\"><strong>"._CUSTOMTITLE."</strong></td>\n";
    echo "    <td align=\"center\" width=\"22%\"><strong>"._VIEW."</strong></td>\n";
    echo "    <td align=\"center\" width=\"9%\"><strong>"._BLOCKSSHOW."</strong></td>\n";
    echo "    <td align=\"center\" width=\"12%\"><strong>"._FUNCTIONS."</strong></td>\n";
    echo "  </tr>\n";

    foreach ($modadmin_modules as $module){
        if(substr($module['title'],0,3) == '~l~'){
            continue;
        }
		
		$usebg = ($bgcolor == '') ? $bgcolor3 : '';
        $bgcolor = ($bgcolor == '') ? ' style="background-color: '.$bgcolor3.';"' : ''; 
        $mid = $module['mid'];
        $who_view = '';
		
        if ($module['view'] == 0 || $module['view'] == 1){
            $who_view = _MVALL;
        } elseif ($module['view'] == 2){
            $who_view = _MVANON;
        } elseif ($module['view'] == 3){
            $who_view = _MVUSERS;
        } elseif ($module['view'] == 4){
            $who_view = _MVADMIN;
        } elseif ($module['view'] == 6){
            $groups = explode('-', $module['groups']);
			
            foreach($groups as $group){
                if (!empty($group)){
                    $row = $db->sql_ufetchrow("SELECT group_name FROM ".$prefix."_bbgroups WHERE group_id='$group'", SQL_NUM);
					 
                    if (!empty($row['group_name'])){
                        $who_view .= $row['group_name'].', ';
                    }
                }
            }
			
            if (!empty($who_view)){
                $who_view = substr($who_view, 0, strlen($who_view)-2);
            }
        }

        if ($module['title'] == $main_module){
            $home = '<img src="images/home.png" alt="'._INHOME.'" title="'._INHOME.'" />';
            $active = '<img src="images/checked.gif" alt="'._ACTIVE.'" title="'._DEACTIVATE.'" border="0" />';
            $title = "<strong>".$module['title']."</strong>";
            $who_view = "<strong>".$who_view."</strong>";
        } else {
            $home = '<a href="'.$admin_file.'.php?op=modules&amp;h='.$mid.'"><img src="images/unchecked.gif" alt="'._INACTIVE.'" title="'._ACTIVATE.'" border="0" /></a>';
            $active = (intval($module['active'])) ? '<a href="'.$admin_file.'.php?op=modules&amp;a='.$mid.'"><img src="images/checked.gif" alt="'._ACTIVE.'" title="'._DEACTIVATE.'" border="0" /></a>' : '<a href="'.$admin_file.'.php?op=modules&amp;a='.$mid.'"><img src="images/unchecked.gif" alt="'._INACTIVE.'" title="'._ACTIVATE.'" border="0" /></a>';
            $title =  (!intval($module['inmenu'])) ? "[&nbsp;<big><strong>&middot;</strong></big>&nbsp;]&nbsp;".$module['title'] : $module['title'];
        }

        if (isset($module['blocks'])){
            switch($module['blocks']){
                case 0:
                    $module['blocks'] = _NONE;
                break;
                case 1:
                    $module['blocks'] = _LEFT;
                break;
                case 2:
                    $module['blocks'] = _RIGHT;
                break;
                case 3:
                    $module['blocks'] = _BOTH;
                break;
                default:
                    $module['blocks'] = '';
                break;
            }
        } else {
            $module['blocks'] = '';
        }

        echo "  <tr ".$bgcolor." id=\"module-".$mid."\">\n";
        echo "    <td align=\"center\">".$active."</td>\n";
        echo "    <td align=\"center\">".$home."</td>\n";
        echo "    <td align=\"center\"><a href=\"modules.php?name=".$module['title']."\" title=\""._SHOW."\">".$title."</a></td>\n";
        echo "    <td align=\"center\">".$module['custom_title']."</td>\n";
        echo "    <td align=\"center\">".$who_view."</td>\n";
        echo "    <td align=\"center\">".$module['blocks']."</td>\n";
		echo "    <td align=\"center\"><a href=\"javascript:;\" onclick=\"editModule(this.rel)\" rel=\"".$mid."||".(!empty($usebg) ? htmlentities($usebg) : 'null')."\">"._EDIT."</a></td>";
        echo "  </tr>\n";
    }
	
    echo "</table>\n";
	echo "</form>\n";
	
    CloseTable();
}

function modadmin_edit_module($mid,$title,$custom_title,$active,$view,$inmenu,$pos,$cat_id,$blocks,$admins='',$groups='',$bgcolor){
    global $prefix, $db, $admin_file, $cache;

    $main_module = main_module();
    $ingroups = array();

    $o1 = $o2 = $o3 = $o4 = $o6 = '';
	
    switch($view){
        case 1:
            $o1 = ' selected="selected"';
        break;
        case 2:
            $o2 = ' selected="selected"';
        break;
        case 3:
            $o3 = ' selected="selected"';
        break;
        case 4:
            $o4 = ' selected="selected"';
        break;
        case 6:
            $o6 = ' selected="selected"';
            $ingroups = explode('-', $groups);
        break;
    }
	
    if (substr($title,0,3) != '~l~'){
		// Without Title
        $a = ($title == $main_module) ? ' - ('._INHOME.')' : '';
		
		echo "  <tr id=\"module-".$mid."\">\n";
		echo "    <td".(!empty($bgcolor) ? ' style="background-color: '.$bgcolor.';"' : '')." colspan=\"7\">\n";
        echo "        <fieldset><legend>".$title.$a."</legend><form method=\"post\" action=\"".$admin_file.".php?op=modules\">\n";
        echo "            <label for=\"custom_title\">"._CUSTOMTITLE."</label>\n";
        echo "            <input type=\"text\" name=\"custom_title\" id=\"custom_title\" value=\"".$custom_title."\" size=\"30\" maxlength=\"255\" />\n<br />";

        if ($title == $main_module || $title == 'Your_Account' || $title == 'Profile'){
            echo "            <input type=\"hidden\" name=\"view\" id=\"view\" value=\"0\" />\n";
        } else {
            echo "            <br /><strong>" . _VIEWPRIV . "</strong>\n";
			echo "            <select name=\"view\" id=\"view\">\n";
			echo "                <option value=\"1\"$o1>" . _MVALL . "</option>\n";
			echo "                <option value=\"2\"$o2>" . _MVANON . "</option>\n";
			echo "                <option value=\"3\"$o3>" . _MVUSERS . "</option>\n";
			echo "                <option value=\"4\"$o4>" . _MVADMIN . "</option>\n";
			echo "                <option value=\"6\"$o6>"._MVGROUPS."</option>\n";
			echo "            </select><br />\n";
			echo "            <span class='tiny'>"._WHATGRDESC."</span><br /><strong>"._WHATGROUPS."</strong>\n";
			echo "            <select name='add_groups' id=\"add_groups\" multiple size='5'>\n";
			
            $groupsResult = $db->sql_query("select group_id, group_name from ".$prefix."_bbgroups where group_description <> 'Personal User'");
			
            while(list($gid,$gname) = $db->sql_fetchrow($groupsResult)){
                $sel = (in_array($gid,$ingroups) && $view == 6) ? " selected=\"selected\"" : "";
                echo "<option value=\"$gid\"$sel>$gname</option>\n";
            }
			
            echo "            </select><br /><br />\n";
        }
		
        echo "            <label for=\"blocks\">"._BLOCKSSHOW."</label>&nbsp;".select_box('blocks', $blocks, array("0"=>_NONE, "1"=>_LEFT, "2"=>_RIGHT, "3"=>_BOTH))."\n<br />\n";
        echo '            <label for="inmenu">'._SHOWINMENU.'</label>'.yesno_option('inmenu',  $inmenu).'<br />';
        echo "            <input type=\"hidden\" name=\"bgcolor\" id=\"bgcolor\" value=\"".$bgcolor."\" />\n";
        echo "            <input type=\"hidden\" name=\"mid\" id=\"mid\" value=\"".$mid."\" />\n";
        echo "            <input type=\"hidden\" name=\"bgcolor\" id=\"bgcolor\" value=\"".$bgcolor."\" />\n";
        echo "            <input type=\"submit\" id=\"save_module\" name=\"save_module\" value=\""._SAVECHANGES."\" style=\"float: left;\" />\n";
		echo "            <input type=\"submit\" id=\"cancel_save\" name=\"cancel_save\" value=\"Cancel\" style=\"float: left; margin-left: 2px;\" />\n";
		echo "        </form>\n</fieldset>\n";
		echo "    </td>\n";
		echo "  </tr>\n";
    } else {
		// With Title
        $title = substr($title,3);
		
		echo "  <tr id=\"module-".$mid."\">\n";
		echo "    <td".(!empty($bgcolor) ? ' style="background-color: '.$bgcolor.';"' : '')." colspan=\"7\">\n";
        echo "        <fieldset><legend>".$title."</legend><form method=\"post\" action=\"".$admin_file.".php?op=modules\">\n";
		echo              _MOD_CAT_LINK_TITLE.":&nbsp;<input type=\"text\" name=\"title\" id=\"linktitle\" value=\"".$title."\" size=\"30\" maxlength=\"30\" />\n";
		echo "            <div id=\"custom_title_error\">You need to enter a custom title</div><br />\n";
		echo              _URL.":&nbsp;<input type=\"text\" name=\"custom_title\" id=\"custom_title\" value=\"".$custom_title."\" size=\"30\" maxlength=\"100\" />\n<br />\n";
		echo "            <br /><strong>" . _VIEWPRIV . "</strong>\n";
		echo "            <select name=\"view\" id=\"view\">\n";
		echo "                <option value=\"1\"$o1>"._MVALL."</option>\n";
		echo "                <option value=\"2\"$o2>"._MVANON."</option>\n";
		echo "                <option value=\"3\"$o3>"._MVUSERS."</option>\n";
		echo "                <option value=\"4\"$o4>"._MVADMIN."</option>\n";
		echo "                <option value=\"6\"$o6>"._MVGROUPS."</option>\n";
        echo "            </select><br />\n";
        echo "            <span class='tiny'>"._WHATGRDESC."</span><br /><strong>"._WHATGROUPS."</strong>\n";
		echo "            <select name='add_groups' id=\"add_groups\" multiple size='5'>\n";
		
        $groupsResult = $db->sql_query("select group_id, group_name from ".$prefix."_bbgroups where group_description <> 'Personal User'");
		
        while(list($gid,$gname) = $db->sql_fetchrow($groupsResult)){
            $sel = (in_array($gid,$ingroups) && $view == 6) ? " selected=\"selected\"" : "";
            echo "                <option value=\"$gid\"$sel>$gname</option>\n";
        }
		
        echo "            </select><br /><br />\n";
        echo "            <input type=\"hidden\" name=\"link\" id=\"link\" value=\"1\" />\n";
        echo "            <input type=\"hidden\" name=\"bgcolor\" id=\"bgcolor\" value=\"".$bgcolor."\" />\n";
        echo "            <input type=\"hidden\" name=\"mid\" id=\"mid\" value=\"".$mid."\" />\n";
        echo "            <input type=\"hidden\" name=\"bgcolor\" id=\"bgcolor\" value=\"".$bgcolor."\" />\n";
        echo "            <input type=\"submit\" id=\"save_module\" name=\"save_module\" value=\""._SAVECHANGES."\" style=\"float: left;\" />\n";
		echo "            <input type=\"submit\" id=\"cancel_save\" name=\"cancel_save\" value=\"Cancel\" style=\"float: left; margin-left: 2px;\" />\n";
		echo "        </form>\n</fieldset>\n";
		echo "    </td>\n";
		echo "  </tr>\n";
    }
	
	// Start the jQuery module editor
	echo "<script type=\"text/javascript\">
	nuke_jq(document).ready(function($){
		$('#save_module').click(function(){
			var mid = $('#mid').val(), bgcolor = $('#bgcolor').val(), custom_title = $('#custom_title').val(), title = $('#linktitle').val(), view = $('#view').val(), blocks = $('#blocks').val(), inmenu = $('input:radio[name=inmenu]:checked').val(), add_groups = $('#add_groups').val(), link = $('#link').val();
			
			// Check if the custom title is empty
			if (custom_title == ''){
				$('#custom_title_error').fadeIn('slow');
				return false;
			}
			
			$('#ajax-loader').show();
			
			$.post('{$admin_file}.php?op=modules', {moduleAjax: true, area: 'modadmin_edit_save', moduleID: mid, moduleTitle: title, customTitle: custom_title, moduleView: view, moduleBlocks: blocks, moduleInMenu: inmenu, addGroups: add_groups, bgColor: bgcolor, link: link}, function(data,status){
				if (status === 'success'){
					// Change the module block back to normal
					$.post('{$admin_file}.php?op=modules', {moduleAjax: true, moduleID: mid, area: 'get_module_data', resetModule: true, bgColor: bgcolor}, function(dataA,statusA){
						if (statusA === 'success'){
							$('#module-'+mid).replaceWith(dataA);
						} else {
							alert('An error occurred while trying to connect to the server, please contact the site administrator or CMS developer if this continues to happen!');
						}
					});
				} else {
					alert('An error occurred while trying to connect to the server, please contact the site administrator or CMS developer if this continues to happen!');
				}
				
				setTimeout(\"hideLoader()\", 1000);
			});
			
			return false;
		});
		
		$('#cancel_save').click(function(){
			var mid = $('#mid').val(), bgcolor = $('#bgcolor').val();
			
			$('#ajax-loader').show();
			
			$.post('{$admin_file}.php?op=modules', {moduleAjax: true, moduleID: mid, area: 'get_module_data', resetModule: true, bgColor: bgcolor}, function(data,status){
				if (status === 'success'){
					$('#module-'+mid).replaceWith(data);
				} else {
					alert('An error occurred while trying to connect to the server, please contact the site administrator or CMS developer if this continues to happen!');
				}
				
				setTimeout(\"hideLoader()\", 1000);
			});
			
			return false;
		});
	});
	</script>\n";
}

function modadmin_get_inactive(){
    global $prefix, $db, $cache;

    if (!$result = $db->sql_query("SELECT `mid`, `title`, `custom_title`, `active`, `view`, `inmenu`, `blocks` FROM `".$prefix."_modules` WHERE `cat_id`=0 AND `inmenu`<>0 ORDER BY `pos` ASC")){
        DisplayError(_MOD_NF_VALUES);
    }
	
    $out = $db->sql_fetchrowset($result);
    $db->sql_freeresult($result);
	
    return $out;
}

function modadmin_ajax_header(){
    global $element_ids, $modadmin_module_cats;
	
    foreach($modadmin_module_cats as $cat){
        if ($cat['cid'] == 1){
            continue;
        }
		
        $element_ids[] = 'ul'.$cat['cid'];
    }
	
    $element_ids[] = 'left_col';
    include_once(NUKE_BASE_DIR.'header.php');
}

function modadmin_block(){
    global $lang_evo_userblock, $admin_file, $module_collapse, $Default_Theme, $module_name, $board_config, $userinfo, $modadmin_module_cats, $bgcolor2;

    $inactive = modadmin_get_inactive();
    $total    = count($modadmin_module_cats);

    OpenTable();
	
    // Notes
    OpenTable();
    echo "<div align=\"center\">\n";
    echo "    <span style=\"background-color : #ff6c6c;\">"._MOD_TITLE."</span>&nbsp;-&nbsp;"._MOD_INACTIVE."<br />\n";
    echo "    <span style=\"color: blue;\">"._MOD_TITLE."</span>&nbsp;-&nbsp;"._MOD_LINK."<br />\n";
    echo "    <img src=\"images/admin/modules/delete.gif\" border=\"0\" alt=\"\" />&nbsp;-&nbsp;"._MOD_LINK_DELETE."<br />\n";
    echo "    <img src=\"images/admin/modules/deletecat.gif\" border=\"0\" alt=\""._MOD_CAT_DELETE."\" />&nbsp;-&nbsp;"._MOD_CAT_DELETE."<br />";
    echo "    <img src=\"images/admin/modules/edit.gif\" border=\"0\" alt=\"\" />&nbsp;-&nbsp;"._MODULEEDIT."<br />\n";
    echo "    <img src=\"images/admin/modules/up.gif\" border=\"0\" alt=\"\" /><img src=\"images/admin/modules/down.gif\" border=\"0\" alt=\"\" />&nbsp;-&nbsp;"._MOD_CAT_ORDER."<br /><br />\n";
    echo      _MOD_EXPLAIN;
    echo "    <br /><br />";
    echo "    <input type=\"submit\" value=\"Refresh Screen\" onclick=\"window.location.reload()\" />";
    echo "    <br /><br />";
    echo      _MOD_EXPLAIN2;
    echo "</div>\n";
    CloseTable();
    echo "<br />";
	
    // Config
    OpenTable();
    echo "<div align=\"center\">\n";
    echo "    <form action=\"".$admin_file.".php?op=modules&amp;area=block\" method=\"post\">\n";
    echo "        <table border=\"0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\">\n";
    echo "          <tr>\n";
	echo "            <td align=\"right\">\n";
    echo                  _MOD_COLLAPSE;
    echo "            </td>\n";
	echo "            <td align=\"left\">\n";
    echo                  yesno_option('collapse',$module_collapse);
    echo "            </td>\n";
    echo "          </tr>\n";
    echo "        </table>\n";
    echo "        <br />";
    echo "        <input type=\"submit\" value=\""._SUBMIT."\" />";
    echo "    </form>\n";
    echo "</div>\n";
    CloseTable();
	
	OpenTable();

    echo "    <table width=\"400\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n";
	echo "      <tr>\n";
	echo "        <td align=\"center\">\n";
	echo "            <br />";
    echo              _MOD_CAT_IMG_NOTE."\n<br /><br />";
    echo "            <form action=\"".$admin_file.".php?op=modules&amp;area=block\" method=\"post\">\n";
    echo "                <span style=\"width: 160px; float: left; display: block; text-align: left;\">"._MOD_CAT_TITLE.":</span>&nbsp;<input type=\"text\" name=\"cat\" id=\"cat\" value=\"\" size=\"30\" maxlength=\"30\" />\n<br />";
    echo "                <span style=\"width: 160px; float: left; display: block; text-align: left;\">"._MOD_CAT_IMG.":</span>&nbsp;<input type=\"text\" name=\"catimage\" id=\"catimage\" value=\"\" size=\"30\" maxlength=\"50\" />\n<br /><br />";
    echo "                <input type=\"submit\" value=\""._SUBMIT."\" /><br /><br />";
    echo "            </form>\n";
    echo "        </td>\n";
	echo "      </tr>";
    echo "      <tr>\n";
	echo "        <td align=\"center\">\n";
    echo "            <form action=\"".$admin_file.".php?op=modules&amp;area=block\" method=\"post\">\n";
    echo "                <span style=\"width: 160px; float: left; display: block; text-align: left;\">"._MOD_CAT_LINK_TITLE.":</span>&nbsp;<input type=\"text\" name=\"linktitle\" id=\"linktitle\" value=\"\" size=\"30\" maxlength=\"30\" />\n<br />";
    echo "                <span style=\"width: 160px; float: left; display: block; text-align: left;\">"._URL.":</span>&nbsp;<input type=\"text\" name=\"link\" id=\"link\" value=\"\" size=\"30\" maxlength=\"100\" />\n<br /><br />";
    echo "                <input type=\"submit\" value=\""._SUBMIT."\" />";
    echo "            </form>\n";
    echo "        </td>\n";
	echo "      </tr>";
    echo "    </table>\n";
    echo "</div>\n";
	
	CloseTable();

    echo "<br />";
    echo "<div align=\"center\">\n";
    echo "    <table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\n";
	
    // Inactive
    echo "      <tr>\n";
	echo "        <td width=\"200\" align=\"center\" rowspan=\"1\">\n";
    echo "            <div align=\"center\"><span style=\"font-weight: bold;\">N/A</span></div>";
    echo "            <ul id=\"left_col\" class=\"sortable boxy\">\n";
	
    if (is_array($inactive)){
        foreach($inactive as $element){
            $custom_title = (substr($element['title'],0,3) == '~l~') ? "<span style=\"color: blue;\">".substr($element['title'],3)."</span>&nbsp;&nbsp;<a href=\"".$admin_file.".php?op=modules&amp;delete=".$element['mid']."\"><img src=\"images/admin/modules/delete.gif\" border=\"0\" alt=\"\" /></a>" : $element['custom_title'];
            $custom_title .= "&nbsp;&nbsp;<a href=\"".$admin_file.".php?op=modules&amp;edit=".$element['mid']."\"><img src=\"images/admin/modules/edit.gif\" border=\"0\" alt=\""._MODULEEDIT."\" /></a>";

            echo "                <li class=\"" .(($element['active'] == 1) ? "active" : "inactive")."\" id=\"mod".$element['mid']."\" ondblclick=\"change_status('".$element['mid']."')\">".$custom_title."</li>\n";
        }
    }
	
    echo "            </ul>\n";
    echo "        </td>\n";
    echo "        <td align=\"center\" width=\"200\">\n";
	
    // Active
    if (is_array($modadmin_module_cats)){
        global $db, $prefix;
		
        $i = 0;
		
        foreach($modadmin_module_cats as $cat){
            if ($cat['cid'] == 1){
                continue;
            }
			
			if ($i > 0) echo "<br />\n";
			
            $i++;
			 
            if ($i == count($modadmin_module_cats)){
                $updown = "            <a href=\"".$admin_file.".php?op=modules&amp;upcat=".$cat['pos']."\"><img src=\"images/admin/modules/up.gif\" border=\"0\" alt=\"\" /></a>";
            } elseif($i != 1){
                $updown = "            <a href=\"".$admin_file.".php?op=modules&amp;downcat=".$cat['pos']."\"><img src=\"images/admin/modules/down.gif\" border=\"0\" alt=\"\" /></a><a href=\"".$admin_file.".php?op=modules&amp;upcat=".$cat['pos']."\"><img src=\"images/admin/modules/up.gif\" border=\"0\" alt=\"\" /></a>";
            } elseif($i == 1){
                $updown = "            <a href=\"".$admin_file.".php?op=modules&amp;downcat=".$cat['pos']."\"><img src=\"images/admin/modules/down.gif\" border=\"0\" alt=\"\" /></a>";
            }
			
            echo "            <span style=\"font-weight: bold; text-align: center;\">".$cat['name']."&nbsp;&nbsp;<a href=\"".$admin_file.".php?op=modules&amp;editcat=".$cat['cid']."\"><img src=\"images/admin/modules/edit.gif\" border=\"0\" alt=\""._MOD_CAT_EDIT."\" />&nbsp;<a href=\"".$admin_file.".php?op=modules&amp;deletecat=".$cat['cid']."\"><img src=\"images/admin/modules/deletecat.gif\" border=\"0\" alt=\""._MOD_CAT_DELETE."\" /></a>&nbsp;".$updown."</span>";
            echo "            <ul id=\"ul".$cat['cid']."\" class=\"sortable boxy\" style=\"width: 200px;\">\n";
			
            $result = $db->sql_query('SELECT * FROM `'.$prefix.'_modules` WHERE cat_id='.$cat['cid'].' AND `inmenu`<>0 ORDER BY `pos` ASC');
			
            while($row = $db->sql_fetchrow($result)){
                $custom_title = (substr($row['title'],0,3) == '~l~') ? "<span style=\"color: blue;\">".substr($row['title'],3)."</span>&nbsp;&nbsp;<a href=\"".$admin_file.".php?op=modules&amp;delete=".$row['mid']."\"><img src=\"images/admin/modules/delete.gif\" border=\"0\" alt=\"\" /></a>" : $row['custom_title'];
                $custom_title .= "&nbsp;&nbsp;<a href=\"".$admin_file.".php?op=modules&amp;edit=".$row['mid']."\"><img src=\"images/admin/modules/edit.gif\" border=\"0\" alt=\""._MODULEEDIT."\" /></a>";

                echo "                <li class=\"" . (($row['active'] == 1) ? "active" : "inactive") . "\" id=\"mod".$row['mid']."\" ondblclick=\"change_status('".$row['mid']."')\">".$custom_title."</li>\n";
            }
			
            $db->sql_freeresult($result);
			
            echo "            </ul>\n";
        }
    }
	
    echo "        </td>\n";
	echo "      </tr>\n";
    echo "      <tr>\n";
    echo "        <td colspan=\"3\" align=\"center\">";
    echo "            <form action=\"\" method=\"post\">\n";
	echo "                <br />\n";
	echo "                <input type=\"hidden\" name=\"order\" id=\"order\" value=\"\" />\n";
	echo "                <input type=\"submit\" onclick=\"getSort()\" value=\""._SUBMIT."\" />\n";
	echo "            </form>\n";
	echo "        </td>\n";
	echo "      </tr>\n";
    echo "    </table>\n";
	echo "    <br /><br />\n";
	
    CloseTable();
}

function modadmin_get_module_cats(){
    global $modadmin_module_cats, $prefix, $db, $cache;
    static $cats;
	
    if (isset($cats) && is_array($cats)) $modadmin_module_cats = $cats;

    if ((($cats = $cache->load('module_cats', 'config')) === false) || !isset($cats)){
        if (!$result = $db->sql_query("SELECT `cid`, `name`, `image`, `pos`, `link_type`, `link` FROM `".$prefix."_modules_cat` WHERE `name`<>'Home' ORDER BY `pos` ASC")){
            DisplayError(_MOD_NF_VALUES);
        }
		
        if (!$cats = $db->sql_fetchrowset($result)){
            DisplayError(_MOD_NF_VALUES);
        }
		
        $db->sql_freeresult($result);
        $cache->save('module_cats', 'config', $cats);
    }
	
    $modadmin_module_cats = $cats;
}

function modadmin_parse_data($data){
	$containers = explode(":", $data);

	foreach($containers as $container){
		$container = str_replace(")", "", $container);
		$i = 0;
		$lastly = explode("(", $container);
		$values = explode(",", $lastly[1]);
	  
		foreach($values as $value){
			if($value == ''){
				continue;
			}
		
			$key = str_replace('ul', '', $lastly[0]);
			$value = str_replace('mod','',$value);
			$final[$key][] = $value;
			$i++;
		}
	}
	
	return $final;
}

function modadmin_write_cats($data){
    global $db, $prefix, $cache;

    if (is_array($data)){
        foreach($data as $key => $modules){
            $i = 0;
			
            foreach($modules as $id){
                $key = ($key == 'left_col') ? '0' : $key;
                $sql = 'UPDATE `'.$prefix.'_modules` SET `cat_id`='.$key.', `pos`='.$i.' WHERE `mid`="'.$id.'"';
                $db->sql_query($sql);
                $i++;
            }
        }
    }
	
    $cache->delete('module_cats');
    $cache->resync();
}

function modadmin_new_cat($name, $image){
    global $db, $prefix, $cache;

    $result = $db->sql_query('SELECT COUNT(*) FROM `'.$prefix.'_modules_cat`');
    $num = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    $name = Fix_Quotes($name);
    $image = Fix_Quotes($image);
    $sql = 'INSERT INTO `'.$prefix.'_modules_cat` VALUES ("","'.$name.'","'.$image.'",'.($num[0]+1).', 0, "")';
    $result = $db->sql_query($sql);
    $cache->delete('module_cats');
    $cache->resync();
}

function modadmin_delete_cat($cid){
    global $db, $prefix, $cache;

    $sql = 'DELETE FROM `'.$prefix.'_modules_cat` WHERE `cid`='.$cid;
    $db->sql_query($sql);
    $sql = 'UPDATE `'.$prefix.'_modules` SET `cat_id`=0 WHERE `cat_id`='.$cid;
    $db->sql_query($sql);
    $cache->delete('module_cats');
    $cache->resync();
}

function modadmin_move_cat($pos, $up){
    global $db, $prefix, $cache;

    $where = ($up) ? ($pos - 1) : ($pos + 1);
    $sql = "UPDATE `".$prefix."_modules_cat` SET `pos`=127 WHERE `pos`=".$where;
    $db->sql_query($sql);
    $sql = "UPDATE `".$prefix."_modules_cat` SET `pos`=".$where." WHERE `pos`=".$pos;
    $db->sql_query($sql);
    $sql = "UPDATE `".$prefix."_modules_cat` SET `pos`=".$pos." WHERE `pos`=127";
    $db->sql_query($sql);
    $cache->delete('module_cats');
    $cache->resync();
}

function modadmin_edit_cat($cat){
    global $prefix, $db, $admin_file, $cache;

    $cat = Fix_Quotes($cat);
	
    if (!is_numeric($cat)){
        DisplayError(_MOD_ERROR_CAT_NF);
    }
	
    $result = $db->sql_query('SELECT name, image FROM `'.$prefix.'_modules_cat` WHERE `cid` = '.$cat);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);

    if (!isset($row[0]) || empty($row[0])){
        DisplayError(_MOD_ERROR_CAT_NF);
    }

    $name = $row[0];
    $image = $row[1];

    include_once(NUKE_BASE_DIR.'header.php');
	
    modadmin_title();
    OpenTable();
	
    echo "<fieldset><legend>"._MOD_CAT_EDIT."</legend>";
    echo "    <form method=\"post\" action=\"".$admin_file.".php?op=modules\">\n";
    echo      _MOD_CAT_TITLE.":&nbsp;<input type=\"text\" name=\"cattitle\" id=\"title\" value=\"".$name."\" size=\"30\" maxlength=\"30\" />\n<br />";
    echo      _MOD_CAT_IMG.":&nbsp;<input type=\"text\" name=\"catimage\" id=\"image\" value=\"".$image."\" size=\"30\" />\n<br />";
    echo "    <input type=\"hidden\" name=\"catsave\" value=\"".$cat."\" />\n";
    echo "    <input type=\"submit\" value=\""._SAVECHANGES."\" />\n";
	echo "</form>\n</fieldset>\n";
	
    CloseTable();
}

function modadmin_edit_cat_save($cat, $name, $image){
    global $prefix, $db, $admin_file, $cache;

    $name = Fix_Quotes($name);
    $image = Fix_Quotes($image);
    $cat = Fix_Quotes($cat);
	
    if (!is_numeric($cat)){
        DisplayError(_MOD_ERROR_CAT_NF);
    }

    $sql = "UPDATE `".$prefix."_modules_cat` SET `name`=\"".$name."\", `image`=\"".$image."\" WHERE `cid`=".$cat;
    $db->sql_query($sql);
    $cache->delete('module_cats');
}

function modadmin_new_link($title, $link){
    global $db, $prefix, $cache;

    if (empty($title) || empty($link)) DisplayError(_MOD_ERROR_TITLE);

    $title = Fix_Quotes($title);
    $link = Fix_Quotes($link);
    Validate($link, 'url', 'modules');
    $sql = 'INSERT INTO `'.$prefix.'_modules` VALUES ("","~l~'.$title.'","'.$link.'",0,0,1,0,0,1,"","")';
    $db->sql_query($sql);
    $cache->delete('module_links');
    $cache->resync();
}

function modadmin_delete_link($mid){
    global $db, $prefix, $cache;

    $sql = 'DELETE FROM `'.$prefix.'_modules` WHERE `mid`='.$mid.' AND `title` LIKE "~l~%"';
    $db->sql_query($sql);
    $cache->delete('module_links');
    $cache->resync();
}

function modadmin_add_scripts(){
    global $Sajax;
	
    $script .= "function module_activate(mid) {
                    x_modadmin_activate(mid, confirm);
                    window.location.reload();
                }\n";
    $script .= "function change_status(bid) {
            var elem = document.getElementById(\"mod\"+bid);
            elem.className = ((elem.className == \"active\") ? \"inactive\" : \"active\");
            x_modadmin_activate(bid, confirm);
            }\n";
    $script .= "    function onDrop() {
                var data = DragDrop.serData('g2');
                x_sajax_update(data, confirm);
            }\n";
    $script .= "function getSort()
                {
                  order = document.getElementById(\"order\");
                  order.value = DragDrop.serData('g1', null);
                }\n";
    $script .= "function showValue()
                {
                  order = document.getElementById(\"order\");
                  alert(order.value);
                }\n";
				
    $Sajax->sajax_add_script($script);
}

/*~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-~-*/

if (isset($HTTP_GET_VARS['a'])){
	(intval($HTTP_GET_VARS['a'])) ? modadmin_activate(intval($HTTP_GET_VARS['a'])) : modadmin_activate_all($HTTP_GET_VARS['a']);
}

if (isset($HTTP_GET_VARS['h'])){
	(intval($HTTP_GET_VARS['h'])) ? modadmin_home(intval($HTTP_GET_VARS['h'])) :  '';
}

if (isset($HTTP_POST_VARS['cat'])){
    if(!empty($HTTP_POST_VARS['cat'])){
        modadmin_new_cat($HTTP_POST_VARS['cat'], $HTTP_POST_VARS['catimage']);
    }
}

if (isset($HTTP_POST_VARS['linktitle']) && isset($HTTP_POST_VARS['link'])){
    if (!empty($HTTP_POST_VARS['linktitle']) && !empty($HTTP_POST_VARS['link'])){
		modadmin_new_link($HTTP_POST_VARS['linktitle'], $HTTP_POST_VARS['link']);
    }
}

if (isset($HTTP_POST_VARS['order'])){
    $data = modadmin_parse_data($HTTP_POST_VARS['order']);
    modadmin_write_cats($data);
    // redirect so refresh doesnt reset order to last save
    redirect($admin_file.".php?op=modules&area=block");
}

if (isset($HTTP_GET_VARS['delete'])){
    modadmin_delete_link($HTTP_GET_VARS['delete']);
    redirect($admin_file.".php?op=modules&area=block");
}

if (isset($HTTP_GET_VARS['deletecat'])){
    modadmin_delete_cat($HTTP_GET_VARS['deletecat']);
    redirect($admin_file.".php?op=modules&area=block");
}

if (isset($HTTP_GET_VARS['upcat']) || isset($HTTP_GET_VARS['downcat'])){
    $up = (isset($HTTP_GET_VARS['upcat'])) ? 1 : 0;
    modadmin_move_cat((isset($HTTP_GET_VARS['upcat'])) ? $HTTP_GET_VARS['upcat'] : $HTTP_GET_VARS['downcat'], $up);
    redirect($admin_file.".php?op=modules&area=block");
}

if (isset($HTTP_POST_VARS['collapse']) && is_int(intval($HTTP_POST_VARS['collapse']))){
    global $db, $prefix, $module_collapse, $cache;
	
    $db->sql_query('UPDATE `'.$prefix.'_evolution` SET `evo_value`="'.intval($HTTP_POST_VARS['collapse']).'" WHERE `evo_field`= "module_collapse"');
    $module_collapse = intval($HTTP_POST_VARS['collapse']);
    $cache->delete('evoconfig');
    $cache->resync();
}

if (isset($HTTP_GET_VARS['editcat'])){
    modadmin_edit_cat($HTTP_GET_VARS['editcat']);
    include_once(NUKE_BASE_DIR.'footer.php');
    die();
}

if (isset($HTTP_POST_VARS['catsave'])){
    modadmin_edit_cat_save($HTTP_POST_VARS['catsave'], $HTTP_POST_VARS['cattitle'], $HTTP_POST_VARS['catimage']);
    redirect($admin_file.".php?op=modules&area=block");
}

switch($area){
    case 'block':
        define('USE_DRAG_DROP', true);
        require_once(NUKE_INCLUDE_DIR.'ajax/Sajax.php');
        global $Sajax;
        $Sajax = new Sajax();
        $Sajax->sajax_export("sajax_update", "modadmin_activate");
        $Sajax->sajax_handle_client_request();
        modadmin_add_scripts();
        global $modadmin_module_cats;
        modadmin_get_module_cats();
        modadmin_ajax_header();
        modadmin_title();
        modadmin_block();
    break;
	
	case 'modadmin_edit_save':
		global $HTTP_POST_VARS, $db, $prefix;
		
		$mid      = $HTTP_POST_VARS['moduleID'];
		$ingroups = array();
		
		if ($HTTP_POST_VARS['moduleView'] == 6){
			if (!isset($HTTP_POST_VARS['addGroups']) || empty($HTTP_POST_VARS['addGroups'])){
				DisplayError(_MOD_ERROR_GROUPS);
			}
			
			$ingroups = implode("-", $HTTP_POST_VARS['addGroups']);
			
			if (sizeof($ingroups) == 0){
				$ingroups = '';
			}
		}
		
		if (isset($HTTP_POST_VARS['link'])){
			Validate($HTTP_POST_VARS['customTitle'], 'url', 'modules');
			$view = intval($HTTP_POST_VARS['moduleView']);
			$title = '~l~'.Fix_Quotes($HTTP_POST_VARS['moduleTitle']);
			$custom_title = Fix_Quotes($HTTP_POST_VARS['customTitle']);
			$db->sql_query("UPDATE `".$prefix."_modules` SET `custom_title`='$custom_title', `title`='$title', `view`='$view', `groups`='$ingroups' WHERE `mid`='$mid'");
		} else {
			$view = intval($HTTP_POST_VARS['moduleView']);
			$inmenu = intval($HTTP_POST_VARS['moduleInMenu']);
			$blocks = intval($HTTP_POST_VARS['moduleBlocks']);
			$custom_title = Fix_Quotes($HTTP_POST_VARS['customTitle']);
			$db->sql_query("UPDATE `".$prefix."_modules` SET `custom_title`='$custom_title', `view`='$view', `inmenu`='$inmenu', `blocks`='$blocks', `groups`='$ingroups' WHERE `mid`='$mid'");
		}
	break;
	
	case 'get_module_data':
		global $HTTP_POST_VARS, $db, $prefix;
		
		if (isset($HTTP_POST_VARS['moduleAjax']) && $HTTP_POST_VARS['moduleAjax'] != true){
			echo 'invalid_ajax_session';
			exit;
		}
		
		$main_module = main_module();
		
		// First get the module info
		$module_info = $db->sql_fetchrow($db->sql_query("SELECT * FROM ". $prefix ."_modules WHERE mid='".$HTTP_POST_VARS['moduleID']."'"));
		
		// Get the bgcolor
		$the_bg = (isset($HTTP_POST_VARS['bgColor']) && $HTTP_POST_VARS['bgColor'] != 'null') ? $HTTP_POST_VARS['bgColor'] : '';
		
		if (isset($HTTP_POST_VARS['resetModule']) && $HTTP_POST_VARS['resetModule'] == true){
			if (substr($module_info['title'],0,3) == '~l~'){
				continue;
			}
			
			$mid = $module_info['mid'];
			$who_view = '';
			
			if ($module_info['view'] == 0 || $module_info['view'] == 1) {
				$who_view = _MVALL;
			} elseif($module_info['view'] == 2) {
				$who_view = _MVANON;
			} elseif($module_info['view'] == 3) {
				$who_view = _MVUSERS;
			} elseif($module_info['view'] == 4) {
				$who_view = _MVADMIN;
			} elseif($module_info['view'] == 6) {
				$groups = explode('-', $module_info['groups']);
				
				foreach ($groups as $group) {
					if (!empty($group)) {
						 $row = $db->sql_ufetchrow("SELECT group_name FROM ".$prefix.'_bbgroups WHERE group_id='.$group, SQL_NUM);
						 if (!empty($row['group_name'])) {
							 $who_view .= $row['group_name'].', ';
						 }
					}
				}
				
				if (!empty($who_view)) {
					$who_view = substr($who_view, 0, strlen($who_view)-2);
				}
			}

			if($module_info['title'] == $main_module) {
				$home = '<img src="images/home.png" alt="'._INHOME.'" title="'._INHOME.'" />';
				$active = '<img src="images/checked.gif" alt="'._ACTIVE.'" title="'._DEACTIVATE.'" border="0" />';
				$title = "<strong>".$module_info['title']."</strong>";
				$who_view = "<strong>".$who_view."</strong>";
			} else {
				$home = '<a href="'.$admin_file.'.php?op=modules&amp;h='.$mid.'"><img src="images/unchecked.gif" alt="'._INACTIVE.'" title="'._ACTIVATE.'" border="0" /></a>';
				$active = (intval($module_info['active'])) ? '<a href="'.$admin_file.'.php?op=modules&amp;a='.$mid.'"><img src="images/checked.gif" alt="'._ACTIVE.'" title="'._DEACTIVATE.'" border="0" /></a>' : '<a href="'.$admin_file.'.php?op=modules&amp;a='.$mid.'"><img src="images/unchecked.gif" alt="'._INACTIVE.'" title="'._ACTIVATE.'" border="0" /></a>';
				$title =  (!intval($module_info['inmenu'])) ? "[&nbsp;<big><strong>&middot;</strong></big>&nbsp;]&nbsp;".$module_info['title'] : $module_info['title'];
			}

			if (isset($module_info['blocks'])){
				switch($module_info['blocks']){
					case 0:
						$module_info['blocks'] = _NONE;
					break;
					case 1:
						$module_info['blocks'] = _LEFT;
					break;
					case 2:
						$module_info['blocks'] = _RIGHT;
					break;
					case 3:
						$module_info['blocks'] = _BOTH;
					break;
					default:
						$module_info['blocks'] = '';
					break;
				}
			} else {
				$module_info['blocks'] = '';
			}
			
			echo "  <tr".(!empty($the_bg) ? ' style="background-color: '.htmlentities($the_bg).';"' : '')." id=\"module-".$mid."\">\n";
			echo "    <td align=\"center\">".$active."</td>\n";
			echo "    <td align=\"center\">".$home."</td>\n";
			echo "    <td align=\"center\"><a href=\"modules.php?name=".$module_info['title']."\" title=\""._SHOW."\">".$title."</a></td>\n";
			echo "    <td align=\"center\">".$module_info['custom_title']."</td>\n";
			echo "    <td align=\"center\">".$who_view."</td>\n";
			echo "    <td align=\"center\">".$module_info['blocks']."</td>\n";
			echo "    <td align=\"center\"><a href=\"javascript:;\" onclick=\"editModule(this.rel)\" rel=\"".$mid."||".(!empty($the_bg) ? htmlentities($the_bg) : 'null')."\">"._EDIT."</a></td>";
			echo "  </tr>\n";
		} else {
			modadmin_edit_module($module_info['mid'],$module_info['title'],$module_info['custom_title'],$module_info['active'],$module_info['view'],$module_info['inmenu'],$module_info['pos'],$module_info['cat_id'],$module_info['blocks'],$module_info['admins'],$module_info['groups'],$the_bg);
		}
	break;

    default:
        include_once(NUKE_BASE_DIR.'header.php');
        modadmin_title();
        $modadmin_modules = modadmin_get_modules(intval($HTTP_GET_VARS['edit']));
        modadmin_dispaly_modules($modadmin_modules);
}

include_once(NUKE_BASE_DIR.'footer.php');

?>