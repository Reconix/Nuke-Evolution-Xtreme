<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr {DHTML_HAND} {DHTML_ONCLICK}"show({DHTML_ID})">
        <th  height="25" class="menu" colspan="2">{L_COOKIE_SETTINGS}</th>
    </tr>
</table>
<span id="{DHTML_ID}" {DHTML_DISPLAY}>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row2" colspan="2"><span class="gensmall">{L_COOKIE_SETTINGS_EXPLAIN}</span></td>
    </tr>
    <tr>
        <td class="row1">{L_COOKIE_DOMAIN}</td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="cookie_domain" value="{COOKIE_DOMAIN}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_COOKIE_NAME}</td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="cookie_name" value="{COOKIE_NAME}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_COOKIE_PATH}</td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="cookie_path" value="{COOKIE_PATH}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_COOKIE_SECURE}<br /><span class="gensmall">{L_COOKIE_SECURE_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="cookie_secure" value="0" {S_COOKIE_SECURE_DISABLED} />{L_DISABLED}  <input type="radio" name="cookie_secure" value="1" {S_COOKIE_SECURE_ENABLED} />{L_ENABLED}</td>
    </tr>
    <tr>
        <td class="row1">{L_SESSION_LENGTH}</td>
        <td class="row2"><input class="post" type="text" maxlength="5" size="5" name="session_length" value="{SESSION_LENGTH}" /></td>
    </tr>
</table>
</span>