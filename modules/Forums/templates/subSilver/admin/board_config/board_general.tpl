<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr {DHTML_HAND} {DHTML_ONCLICK}"show({DHTML_ID})">
        <th  height="25" class="menu" colspan="2">{L_GENERAL_SETTINGS}</th>
    </tr>
</table>
<span id="{DHTML_ID}" {DHTML_DISPLAY}>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1">{L_SERVER_NAME}</td>
        <td class="row2"><input class="post" type="text" maxlength="255" size="40" name="server_name" value="{SERVER_NAME}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_SERVER_PORT}<br /><span class="gensmall">{L_SERVER_PORT_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" maxlength="5" size="5" name="server_port" value="{SERVER_PORT}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_SCRIPT_PATH}<br /><span class="gensmall">{L_SCRIPT_PATH_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="script_path" value="{SCRIPT_PATH}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_SITE_NAME}<br /><span class="gensmall">{L_SITE_NAME_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" size="25" maxlength="100" name="sitename" value="{SITENAME}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_SITE_DESCRIPTION}</td>
        <td class="row2"><input class="post" type="text" size="40" maxlength="255" name="site_desc" value="{SITE_DESCRIPTION}" /></td>
    </tr>
    <tr> 
      <td class="row1">{L_GLOBAL_TITLE}<br /><span class="gensmall">{L_GLOBAL_TITLE_EXPLAIN}</span></td> 
      <td class="row2"><input class="post" type="text" maxlength="55" size="40" name="global_title" value="{GLOBAL_TITLE}" /></td> 
    </tr> 
    <tr> 
      <td class="row1">{L_GLOBAL}<br /><span class="gensmall">{L_GLOBAL_EXPLAIN}</span></td> 
      <td class="row2"><textarea name="global_announcement" rows="5" cols="30" maxlength="255" onkeydown="return ismaxlength(this)">{GLOBAL_ANNOUNCEMENT}</textarea></td> 
    </tr> 
    <tr> 
      <td class="row1">{L_ENABLE_GLOBAL}<br /><span class="gensmall">{L_ENABLE_GLOBAL_EXPLAIN}</span></td> 
      <td class="row2"><input type="radio" name="global_enable" value="1" {S_ENABLE_GLOBAL_YES} /> {L_YES}&nbsp;&nbsp;<input type="radio" name="global_enable" value="0" {S_ENABLE_GLOBAL_NO} /> {L_NO}</td> 
    </tr> 
    <tr> 
      <td class="row1">{L_DISABLE_MARQUEE}<br /><span class="gensmall">{L_DISABLE_MARQUEE_EXPLAIN}</span></td> 
      <td class="row2"><input type="radio" name="marquee_disable" value="1" {S_DISABLE_MARQUEE_YES} /> {L_YES}&nbsp;&nbsp;<input type="radio" name="marquee_disable" value="0" {S_DISABLE_MARQUEE_NO} /> {L_NO}</td> 
    </tr> 
    <tr>
        <td class="row1">{L_DHTML}</td>
        <td class="row2"><input type="radio" name="use_dhtml" value="1" {DHTML_YES} /> {L_YES} <input type="radio" name="use_dhtml" value="0" {DHTML_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_ADMIN_STYLE}</td>
        <td class="row2"><input type="radio" name="use_theme_style" value="1" {ADMIN_STYLE_THEME} /> {L_YES} <input type="radio" name="use_theme_style" value="0" {ADMIN_STYLE_DEFAULT} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_DISABLE_BOARD}<br /><span class="gensmall">{L_DISABLE_BOARD_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="board_disable" value="1" {S_DISABLE_BOARD_YES} /> {L_YES} <input type="radio" name="board_disable" value="0" {S_DISABLE_BOARD_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_DISABLE_BOARD_ADMINVIEW}<br /><span class="gensmall">{L_DISABLE_BOARD_ADMINVIEW_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="board_disable_adminview" value="1" {S_DISABLE_BOARD_ADMINVIEW_YES} /> {L_YES}  <input type="radio" name="board_disable_adminview" value="0" {S_DISABLE_BOARD_ADMINVIEW_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_DISABLE_BOARD_MSG}<br /><span class="gensmall">{L_DISABLE_BOARD_MSG_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" maxlength="255" size="40" name="board_disable_msg" value="{DISABLE_BOARD_MSG}" /></td>
    </tr>
        <input type="hidden" name="require_activation" value="{ACTIVATION_NONE}" />
    <tr>
        <td class="row1">{L_BOARD_EMAIL_FORM}<br /><span class="gensmall">{L_BOARD_EMAIL_FORM_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="board_email_form" value="1" {BOARD_EMAIL_FORM_ENABLE} /> {L_ENABLED} <input type="radio" name="board_email_form" value="0" {BOARD_EMAIL_FORM_DISABLE} /> {L_DISABLED}</td>
    </tr>
    <tr>
        <td class="row1">{L_FLOOD_INTERVAL} <br /><span class="gensmall">{L_FLOOD_INTERVAL_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" size="3" maxlength="4" name="flood_interval" value="{FLOOD_INTERVAL}" /></td>
    </tr>
	<tr>
 		<td class="row1">{L_SEARCH_FLOOD_INTERVAL} <br /><span class="gensmall">{L_SEARCH_FLOOD_INTERVAL_EXPLAIN}</span></td>
 		<td class="row2"><input class="post" type="text" size="3" maxlength="4" name="search_flood_interval" value="{SEARCH_FLOOD_INTERVAL}" /></td>
 	</tr>
   <tr>
      <td class="row1">{L_MAX_LOGIN_ATTEMPTS}<br /><span class="gensmall">{L_MAX_LOGIN_ATTEMPTS_EXPLAIN}</span></td>
      <td class="row2"><input class="post" type="text" size="3" maxlength="4" name="max_login_attempts" value="{MAX_LOGIN_ATTEMPTS}" /></td>
   </tr>
   <tr>
      <td class="row1">{L_LOGIN_RESET_TIME}<br /><span class="gensmall">{L_LOGIN_RESET_TIME_EXPLAIN}</span></td>
      <td class="row2"><input class="post" type="text" size="3" maxlength="4" name="login_reset_time" value="{LOGIN_RESET_TIME}" /></td>
   </tr>
    <tr>
        <td class="row1">{L_MAX_SMILIES}</td>
        <td class="row2"><input class="post" type="text" name="max_smilies" size="3" maxlength="4" value="{MAX_SMILIES}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_TOPICS_PER_PAGE}</td>
        <td class="row2"><input class="post" type="text" name="topics_per_page" size="3" maxlength="4" value="{TOPICS_PER_PAGE}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_POSTS_PER_PAGE}</td>
        <td class="row2"><input class="post" type="text" name="posts_per_page" size="3" maxlength="4" value="{POSTS_PER_PAGE}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_HOT_THRESHOLD}</td>
        <td class="row2"><input class="post" type="text" name="hot_threshold" size="3" maxlength="4" value="{HOT_TOPIC}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_DEFAULT_STYLE}</td>
        <td class="row2">{STYLE_SELECT}</td>
    </tr>
    <tr>
        <td class="row1">{L_OVERRIDE_STYLE}<br /><span class="gensmall">{L_OVERRIDE_STYLE_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="override_user_style" value="1" {OVERRIDE_STYLE_YES} /> {L_YES} <input type="radio" name="override_user_style" value="0" {OVERRIDE_STYLE_NO} /> {L_NO}</td>
    </tr>
    <!-- Quick Search -->
    <tr>
        <td class="row1">{L_QUICK_SEARCH_ENABLE}<br /><span class="gensmall">{L_QUICK_SEARCH_ENABLE_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="quick_search_enable" value="1" {S_QUICK_SEARCH_ENABLE_YES} /> {L_YES} <input type="radio" name="quick_search_enable" value="0" {S_QUICK_SEARCH_ENABLE_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_DEFAULT_LANGUAGE}</td>
        <td class="row2">{LANG_SELECT}</td>
    </tr>
    <tr>
        <td class="row1">{L_DATE_FORMAT}<br /><span class="gensmall">{L_DATE_FORMAT_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" name="default_dateformat" value="{DEFAULT_DATEFORMAT}" /></td>
    </tr>
    <!-- Start replacement - Advanced time management MOD -->
    <tr>
        <td class="row1"><span class="gen">{L_TIME_MODE}</span><br />
            <span class="gensmall">{L_TIME_MODE_TEXT}</span></td>
        <td class="row2" nowrap="nowrap">
            <span class="gen">{L_TIME_MODE_AUTO}</span><br />
            <input type="radio" name="default_time_mode" value="6" {TIME_MODE_FULL_PC_CHECKED}/>
            <span class="gen">{L_TIME_MODE_FULL_PC}</span> <br />
            <input type="radio" name="default_time_mode" value="4" {TIME_MODE_SERVER_PC_CHECKED}/>
            <span class="gen">{L_TIME_MODE_SERVER_PC}</span><br />
            <input type="radio" name="default_time_mode" value="3" {TIME_MODE_FULL_SERVER_CHECKED}/>
            <span class="gen">{L_TIME_MODE_FULL_SERVER}</span>
            <br /><br />
            <span class="gen">{L_TIME_MODE_MANUAL}</span><br />
            <span class="gen"> {L_TIME_MODE_DST}:</span><input type="radio" name="default_time_mode" value="1" {TIME_MODE_MANUAL_DST_CHECKED}/><span class="gen">{L_YES}</span>&nbsp;<input type="radio" name="default_time_mode" value="0" {TIME_MODE_MANUAL_CHECKED}/><span class="gen">{L_NO}</span>&nbsp;<input type="radio" name="default_time_mode" value="2" {TIME_MODE_SERVER_SWITCH_CHECKED}/><span class="gen">{L_TIME_MODE_DST_SERVER}</span><br />
            <span class="gen"> {L_TIME_MODE_DST_TIME_LAG}: </span><input type="text" name="default_dst_time_lag" value="{DST_TIME_LAG}" maxlength="3" size="3" class="post" /><span class="gen">{L_TIME_MODE_DST_MN}</span><br />
            <span class="gen"> {L_TIME_MODE_TIMEZONE}: </span><span class="gensmall">{TIMEZONE_SELECT}</span></td>
    </tr>
        <!-- End replacement - Advanced time management MOD -->
    <tr>
        <td class="row1">{L_ONLINE_TIME} <br /><span class="gensmall">{L_ONLINE_TIME_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" size="3" maxlength="4" name="online_time" value="{ONLINE_TIME}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_ENABLE_PRUNE}</td>
        <td class="row2"><input type="radio" name="prune_enable" value="1" {PRUNE_YES} /> {L_YES} <input type="radio" name="prune_enable" value="0" {PRUNE_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_REPORT_EMAIL}</td>
        <td class="row2"><input type="radio" name="report_email" value="1" {REPORT_EMAIL_YES} /> {L_YES} <input type="radio" name="report_email" value="0" {REPORT_EMAIL_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_ALLOW_NAME_CHANGE}</td>
        <td class="row2"><input type="radio" name="allow_namechange" value="1" {NAMECHANGE_YES} /> {L_YES} <input type="radio" name="allow_namechange" value="0" {NAMECHANGE_NO} /> {L_NO}</td>
    </tr>
</table>
</span>
