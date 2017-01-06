<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr {DHTML_HAND} {DHTML_ONCLICK}"show({DHTML_ID})">
        <th  height="25" class="menu" colspan="2">{L_PRIVATE_MESSAGING}</th>
    </tr>
</table>
<span id="{DHTML_ID}" {DHTML_DISPLAY}>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1">{L_DISABLE_PRIVATE_MESSAGING}</td>
        <td class="row2"><input type="radio" name="privmsg_disable" value="0" {S_PRIVMSG_ENABLED} />{L_ENABLED} <input type="radio" name="privmsg_disable" value="1" {S_PRIVMSG_DISABLED} />{L_DISABLED}</td>
    </tr>
    <tr>
        <td class="row1">{L_WELCOME_PM}</td>
        <td class="row2"><input type="radio" name="welcome_pm" value="1" {S_WELCOME_PM_ENABLED} />{L_ENABLED} <input type="radio" name="welcome_pm" value="0" {S_WELCOME_PM_DISABLED} />{L_DISABLED}</td>
    </tr>
    <tr>
        <td class="row1">{L_PM_ALLOW_THRESHOLD}<br /><span class="gensmall">{L_PM_ALLOW_TRHESHOLD_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="pm_allow_threshold" value="{PM_ALLOW_THRESHOLD}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_INBOX_LIMIT}</td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_inbox_privmsgs" value="{INBOX_LIMIT}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_SENTBOX_LIMIT}</td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_sentbox_privmsgs" value="{SENTBOX_LIMIT}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_SAVEBOX_LIMIT}</td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_savebox_privmsgs" value="{SAVEBOX_LIMIT}" /></td>
    </tr>
</table>
</span>