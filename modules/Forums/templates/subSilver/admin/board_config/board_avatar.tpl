<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr {DHTML_HAND} {DHTML_ONCLICK}"show({DHTML_ID})">
        <th  height="25" class="menu" colspan="2">{L_AVATAR_SETTINGS}</th>
    </tr>
</table>
<span id="{DHTML_ID}" {DHTML_DISPLAY}>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1">{L_DEFAULT_AVATAR} <br /><span class="gensmall">{L_DEFAULT_AVATAR_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="default_avatar_set" value="0" {DEFAULT_AVATAR_GUESTS} /> {L_DEFAULT_AVATAR_GUESTS} &nbsp; <input class="post" type="text" name="default_avatar_guests_url" maxlength="255" value="{DEFAULT_AVATAR_GUESTS_URL}" /><br /><input type="radio" name="default_avatar_set" value="1" {DEFAULT_AVATAR_USERS} /> {L_DEFAULT_AVATAR_USERS} &nbsp; <input class="post" type="text" name="default_avatar_users_url" maxlength="255" value="{DEFAULT_AVATAR_USERS_URL}" /><br /><input type="radio" name="default_avatar_set" value="2" {DEFAULT_AVATAR_BOTH} /> {L_DEFAULT_AVATAR_BOTH}<br /><input type="radio" name="default_avatar_set" value="3" {DEFAULT_AVATAR_NONE} /> {L_DEFAULT_AVATAR_NONE}</td>
    </tr>
    <tr>
        <td class="row1">{L_ALLOW_LOCAL}</td>
        <td class="row2"><input type="radio" name="allow_avatar_local" value="1" {AVATARS_LOCAL_YES} /> {L_YES} <input type="radio" name="allow_avatar_local" value="0" {AVATARS_LOCAL_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_ALLOW_REMOTE} <br /><span class="gensmall">{L_ALLOW_REMOTE_EXPLAIN}</span></td>
        <td class="row2"><input type="radio" name="allow_avatar_remote" value="1" {AVATARS_REMOTE_YES} /> {L_YES} <input type="radio" name="allow_avatar_remote" value="0" {AVATARS_REMOTE_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_ALLOW_UPLOAD}</td>
        <td class="row2"><input type="radio" name="allow_avatar_upload" value="1" {AVATARS_UPLOAD_YES} /> {L_YES} <input type="radio" name="allow_avatar_upload" value="0" {AVATARS_UPLOAD_NO} /> {L_NO}</td>
    </tr>
    <tr>
        <td class="row1">{L_MAX_FILESIZE}<br /><span class="gensmall">{L_MAX_FILESIZE_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" size="4" maxlength="10" name="avatar_filesize" value="{AVATAR_FILESIZE}" /> Bytes</td>
    </tr>
    <tr>
        <td class="row1">{L_MAX_AVATAR_SIZE} <br />
            <span class="gensmall">{L_MAX_AVATAR_SIZE_EXPLAIN}</span>
        </td>
        <td class="row2"><input class="post" type="text" size="3" maxlength="4" name="avatar_max_height" value="{AVATAR_MAX_HEIGHT}" /> x <input class="post" type="text" size="3" maxlength="4" name="avatar_max_width" value="{AVATAR_MAX_WIDTH}"></td>
    </tr>
    <tr>
        <td class="row1">{L_AVATAR_STORAGE_PATH} <br /><span class="gensmall">{L_AVATAR_STORAGE_PATH_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" size="20" maxlength="255" name="avatar_path" value="{AVATAR_PATH}" /></td>
    </tr>
    <tr>
        <td class="row1">{L_AVATAR_GALLERY_PATH} <br /><span class="gensmall">{L_AVATAR_GALLERY_PATH_EXPLAIN}</span></td>
        <td class="row2"><input class="post" type="text" size="20" maxlength="255" name="avatar_gallery_path" value="{AVATAR_GALLERY_PATH}" /></td>
    </tr>
</table>
</span>