<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr {DHTML_HAND} {DHTML_ONCLICK}"show({DHTML_ID})">
        <th  height="25" class="menu" colspan="2">{L_GLANCE_TITLE}</th>
    </tr>
</table>
<span id="{DHTML_ID}" {DHTML_DISPLAY}>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1">{L_GLANCE_SHOW}</td>
        <td class="row2">{GLANCE_SELECT}<br /><small>{L_GLANCE_OVERRIDE_TITLE}</small><br /><input type="radio" name="glance_show_override" value="1" {GLANCE_SHOW_OVERRIDE_YES} /> {L_YES} <input type="radio" name="glance_show_override" value="0" {GLANCE_SHOW_OVERRIDE_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_NEWS_EXPLAIN}</td>
        <td class="row2"><input class="post" type="text" name="glance_news_id" size="10" maxlength="20" value="{GLANCE_NEWS_ID}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_NUM_NEWS_EXPLAIN}</td>
        <td class="row2"><input class="post" type="text" name="glance_num_news" size="10" maxlength="20" value="{GLANCE_NUM_NEWS}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_NUM_EXPLAIN}</td>
        <td class="row2"><input class="post" type="text" name="glance_num" size="10" maxlength="20" value="{GLANCE_NUM}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_IGNORE_FORUMS}</td>
        <td class="row2"><input class="post" type="text" name="glance_ignore_forums" size="10" maxlength="20" value="{GLANCE_IGNORE_FORUMS}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_TABLE_WIDTH}</td>
        <td class="row2"><input class="post" type="text" name="glance_table_width" size="10" maxlength="10" value="{GLANCE_TABLE_WIDTH}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_AUTH_READ_EXPLAIN}</td>
        <td class="row2"><input type="radio" name="glance_auth_read" value="1" {GLANCE_AUTH_READ_YES} /> {L_YES} <input type="radio" name="glance_auth_read" value="0" {GLANCE_AUTH_READ_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_GLANCE_TOPIC_LENGTH_EXPLAIN}</td>
        <td class="row2"><input class="post" type="text" name="glance_topic_length" size="10" maxlength="10" value="{GLANCE_TOPIC_LENGTH}" /></td>
    </tr>
</table>
</span>