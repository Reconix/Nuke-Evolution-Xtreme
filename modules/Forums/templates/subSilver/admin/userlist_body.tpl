<script language="javascript" type="text/javascript">
<!--

var allusers=new Array();

function change_all(){
	for (i in allusers){
		handleClick('user'+i);
	}
}

function handleClick(id) {
	var obj = "";	

		// Check browser compatibility
		if(document.getElementById)
			obj = document.getElementById(id);
		else if(document.all)
			obj = document.all[id];
		else if(document.layers)
			obj = document.layers[id];
		else
			return 1;

		if (!obj) {
			return 1;
		}
		else if (obj.style) 
		{			
			obj.style.display = ( obj.style.display != "none" ) ? "none" : "";
		}
		else 
		{ 
			obj.visibility = "show"; 
		}
}
//-->
</script>

<h1>{L_TITLE}</h1>

<p>{L_DESCRIPTION}</p>

<form action="{S_ACTION}" method="post">
<table width="100%" cellpadding="3" cellspacing="1" border="0">
	<tr>
		<td width="100%">&nbsp;</td>
		<td align="right" nowrap="nowrap"><span class="gen">{L_FILTER}</td>
		<td nowrap="nowrap"><input type="text" size="20" value="{S_FILTER}" name="filter"></td>
		<td nowrap="nowrap"><select name="find_by" class="post">
			<option value="find_username"{SELECTED_FIND_USERNAME}>{L_SORT_USERNAME}</option>
			<option value="find_user_email"{SELECTED_FIND_EMAIL}>{L_SORT_EMAIL}</option>
			<option value="find_user_website"{SELECTED_FIND_WEBSITE}>{L_SORT_WEBSITE}</option>
		</select></td>
		<td align="right" nowrap="nowrap"><span class="gen">{L_SORT_BY}</td>
		<td nowrap="nowrap"><select name="sort" class="post">
			<option value="user_id"{SELECTED_USER_ID}>{L_SORT_USER_ID}</option>
			<option value="user_active"{SELECTED_ACTIVE}>{L_SORT_ACTIVE}</option>
			<option value="username"{SELECTED_USERNAME}>{L_SORT_USERNAME}</option>
			<option value="user_regdate"{SELECTED_JOINED}>{L_SORT_JOINED}</option>
			<option value="user_session_time"{SELECTED_ACTIVTY}>{L_SORT_ACTIVTY}</option>
			<option value="user_level"{SELECTED_USER_LEVEL}>{L_SORT_USER_LEVEL}</option>
			<option value="user_posts"{SELECTED_POSTS}>{L_SORT_POSTS}</option>
			<option value="user_rank"{SELECTED_RANK}>{L_SORT_RANK}</option>
			<option value="user_email"{SELECTED_EMAIL}>{L_SORT_EMAIL}</option>
			<option value="user_website"{SELECTED_WEBSITE}>{L_SORT_WEBSITE}</option>
		</select></td>
		<td nowrap="nowrap"><select name="order" class="post">
			<option value="ASC"{SELECTED_ASCENDING}>{L_ASCENDING}</option>
			<option value="DESC"{SELECTED_DESCENDING}>{L_DESCENDING}</option>
		</select></td>
		<td nowrap="nowrap"><span class="gen">{L_SHOW}</span></td>
		<td nowrap="nowrap"><input type="text" size="5" value="{S_SHOW}" name="show"></td>
		<td nowrap="nowrap">{S_HIDDEN_FIELDS}<input type="submit" value="{S_SORT}" name="change_sort" class="liteoption"></td>
	</tr>
</table>
</form>

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center"> 
	<tr> 
		<!-- BEGIN alphanumsearch --> 
		<td align="left" width="{alphanumsearch.SEARCH_SIZE}"><span class="genmed"> 
			<a href="{alphanumsearch.SEARCH_LINK}" class="genmed">{alphanumsearch.SEARCH_TERM}</a> 
		</span></td> 
		<!-- END alphanumsearch --> 
	</tr> 
</table>

<form action="{S_ACTION}" method="post">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
	<tr>
		<td width="13%" class="row1" align="center"><a href="#" onclick="javascript:change_all(); return false;" class="td">reverse {L_OPEN_CLOSE}</a></td>
		<th width="25%">{L_USERNAME}</th>
		<th width="6%">{L_ACTIVE}</th>
		<th width="15%">{L_JOINED}</th>
		<th width="15%">{L_ACTIVTY}</th>
		<th width="6%">{L_POSTS}</th>
		<th width="20%">{L_WEBSITE}</th>
	</tr>
	<!-- BEGIN user_row -->
	<tr>
		<td class="{user_row.ROW_CLASS}" nowrap="nowrap"><input type="checkbox" name="{S_USER_VARIABLE}[]" value="{user_row.USER_ID}">&nbsp;&nbsp;&nbsp;<a href="javascript:handleClick('user{user_row.USER_ID}');">{L_OPEN_CLOSE}</a></td>
		<script language="javascript" type="text/javascript">
			allusers[{user_row.USER_ID}]={user_row.USER_ID};
		</script>
		<td class="{user_row.ROW_CLASS}"><span class="gen" {user_row.STYLE_COLOR}><strong><a href="{user_row.U_PROFILE}" class="gen" target="_blank" {user_row.STYLE_COLOR}>{user_row.USERNAME}</a></strong></span></td>
		<td class="{user_row.ROW_CLASS}"><span class="gen">{user_row.ACTIVE}</span></td>
		<td class="{user_row.ROW_CLASS}"><span class="gen">{user_row.JOINED}</span></td>
		<td class="{user_row.ROW_CLASS}"><span class="gen">{user_row.LAST_ACTIVITY}</span></td>
		<td class="{user_row.ROW_CLASS}"><span class="gen">{user_row.POSTS}</span></td>
		<td class="{user_row.ROW_CLASS}"><span class="gen">{user_row.U_WEBSITE}</span></td>
	</tr>
	<tr id="user{user_row.USER_ID}" style="display: none">
		<td class="{user_row.ROW_CLASS}" width="13%">&nbsp;</td>
		<td class="{user_row.ROW_CLASS}" colspan="6" width="100%">
			<table  width="100%" cellpadding="3" cellspacing="1" border="0">
				<tr>
					<td class="{user_row.ROW_CLASS}" width="33%"><span class="gen"><strong>{L_RANK}:</strong> {user_row.RANK} &nbsp; {user_row.I_RANK}</td>
					<td class="{user_row.ROW_CLASS}" width="34%"><span class="gen"><strong>{L_GROUP}:</strong>
						<!-- BEGIN group_row -->
						<a href="{user_row.group_row.U_GROUP}" class="gen" target="_blank">{user_row.group_row.GROUP_NAME}</a> ({user_row.group_row.GROUP_STATUS})<br />
						<!-- END group_row -->
						<!-- BEGIN no_group_row -->
						{user_row.no_group_row.L_NONE}<br />
						<!-- END no_group_row -->
					</span></td>
					<td class="{user_row.ROW_CLASS}" width="33%"><span class="gen"><strong>{L_POSTS}:</strong> {user_row.POSTS} &nbsp; <a href="{user_row.U_SEARCH}" class="gen" target="_blank">{L_FIND_ALL_POSTS}</a></span></td>
				</tr>
				<tr>
					<td class="{user_row.ROW_CLASS}" colspan="3"><span class="gen"><strong>{L_WEBSITE}:</strong> <a href="{user_row.U_WEBSITE}" class="gen" target="_blank">{user_row.U_WEBSITE}</a></span></td>
				</tr>
				<tr>
					<td class="{user_row.ROW_CLASS}"><span class="gen">
						<a href="{user_row.U_MANAGE}" class="gen">{L_MANAGE}</a><br /> 
						<a href="{user_row.U_PERMISSIONS}" class="gen">{L_PERMISSIONS}</a><br /> 
						<a href="mailto:{user_row.EMAIL}" class="gen">{L_EMAIL} [ {user_row.EMAIL} ]</a><br />
						<a href="{user_row.U_PM}" class="gen">{L_PM}</a>
					</span></td>
					<td colspan="2" class="{user_row.ROW_CLASS}">{user_row.I_AVATAR}</td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- END user_row -->
	<tr>
		<td class="catbottom" colspan="8">
			<select name="mode" class="post">
				<option value="">{L_SELECT}</option>
				<option value="delete">{L_DELETE}</option>
				<option value="ban">{L_BAN}</option>
				<option value="activate">{L_ACTIVATE_DEACTIVATE}</option>
				<option value="group">{L_ADD_GROUP}</option>
			</select>
			<input type="submit" name="go" value="{L_GO}" class="mainoption">
		</td>
	</tr>
</table>

<table width="100%" cellpadding="3" cellspacing="1" border="0">
	<tr>
		<td align="left" width="50%"><span class="gen">{PAGE_NUMBER}</span></td>
		<td align="right" width="50%"><span class="gen">{PAGINATION}</span></td>
	</tr>
</table>
</form>

<br clear="all" />
