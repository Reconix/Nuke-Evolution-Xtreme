<h1>{L_USER_TITLE}</h1>

<p>{L_USER_EXPLAIN}</p>

{ERROR_BOX}

<form action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post"><table width="98%" cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
    <tr>
      <th class="thHead" colspan="2">{L_REGISTRATION_INFO}</th>
    </tr>
    <tr>
      <td class="row2" colspan="2"><span class="gensmall">{L_ITEMS_REQUIRED}</span></td>
    </tr>
    <tr>
      <td class="row1" width="38%"><span class="gen">{L_USERNAME}: *</span></td>
      <td class="row2">
        <input class="post" type="text" name="username" size="35" maxlength="40" value="{USERNAME}" />
      </td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_EMAIL_ADDRESS}: *</span></td>
      <td class="row2">
        <input class="post" type="text" name="email" size="35" maxlength="255" value="{EMAIL}" />
      </td>
    </tr>
	<!-- BEGIN birthday_required -->
	<tr>
      <td class="row1"><span class="gen">{L_BIRTHDAY}: *</span></td>
	  <td class="row2">{BIRTHDAY_INTERFACE}</td>
	</tr>
	<!-- END birthday_required -->
    <tr>
      <td class="row1"><span class="gen">{L_NEW_PASSWORD}: *</span><br />
        <span class="gensmall">{L_PASSWORD_IF_CHANGED}</span></td>
      <td class="row2">
        <input class="post" type="password" name="password" size="35" maxlength="32" value="" />
      </td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_CONFIRM_PASSWORD}: * </span><br />
        <span class="gensmall">{L_PASSWORD_CONFIRM_IF_CHANGED}</span></td>
      <td class="row2">
        <input class="post" type="password" name="password_confirm" size="35" maxlength="32" value="" />
      </td>
    </tr>
    <tr>
      <td class="catsides" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th class="thSides" colspan="2">{L_PROFILE_INFO}</th>
    </tr>
    <tr>
      <td class="row2" colspan="2"><span class="gensmall">{L_PROFILE_INFO_NOTICE}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_REPUTATION}</span></td>
      <td class="row2">
      <input class="post" type="text" name="reputation" size="10" maxlength="15" value="{REPUTATION}" />
      </td>
    </tr>    
	<tr>
	  <td class="row1"><span class="gen">{L_MYSPACE}</span></td>
	  <td class="row2">
		<input class="post" type="text" name="myspace" size="35" maxlength="255" value="{MYSPACE}" />
	  </td>
	</tr>
	<tr>
	  <td class="row1"><span class="gen">{L_FACEBOOK}</span></td>
	  <td class="row2">
		<input class="post" type="text" name="facebook" size="35" maxlength="255" value="{FACEBOOK}" />
	  </td>
	</tr>        
<!-- BEGIN xdata -->
<!-- BEGIN switch_is_icq -->
    <tr>
      <td class="row1"><span class="gen">{L_ICQ_NUMBER}</span></td>
      <td class="row2">
        <input class="post" type="text" name="icq" size="10" maxlength="15" value="{ICQ}" />
      </td>
    </tr>
<!-- END switch_is_icq -->
<!-- BEGIN switch_is_aim -->
    <tr>
      <td class="row1"><span class="gen">{L_AIM}</span></td>
      <td class="row2">
        <input class="post" type="text" name="aim" size="20" maxlength="255" value="{AIM}" />
      </td>
    </tr>
<!-- END switch_is_aim -->
<!-- BEGIN switch_is_msn -->
    <tr>
      <td class="row1"><span class="gen">{L_MESSENGER}</span></td>
      <td class="row2">
        <input class="post" type="text" name="msn" size="20" maxlength="255" value="{MSN}" />
      </td>
    </tr>
<!-- END switch_is_msn -->
<!-- BEGIN switch_is_yim -->
    <tr>
      <td class="row1"><span class="gen">{L_YAHOO}</span></td>
      <td class="row2">
        <input class="post" type="text" name="yim" size="20" maxlength="255" value="{YIM}" />
      </td>
    </tr>
<!-- END switch_is_yim -->
<!-- BEGIN switch_is_website -->
    <tr>
      <td class="row1"><span class="gen">{L_WEBSITE}</span></td>
      <td class="row2">
        <input class="post" type="text" name="website" size="35" maxlength="255" value="{WEBSITE}" />
      </td>
    </tr>
<!-- END switch_is_website -->
<!-- BEGIN switch_is_location -->
    <tr>
      <td class="row1"><span class="gen">{L_LOCATION}</span></td>
      <td class="row2">
        <input class="post" type="text" name="location" size="35" maxlength="100" value="{LOCATION}" />
      </td>
    </tr>
<!-- FLAGHACK-start -->
    <tr>
      <td class="row1"><span class="gen">{L_FLAG}</span></td>
      <td class="row2">
      <span class="gensmall">
        <table>
          <tr>
            <td>{FLAG_SELECT}&nbsp;</td>
            <td><img src="../../../images/flags/{FLAG_START}" width="16" height="11" name="user_flag" /></td>
          </tr>
        </table>
      </span>
      </td>
	</tr>
<!-- FLAGHACK-end -->
<!-- END switch_is_location -->
<!-- BEGIN switch_is_occupation -->
    <tr>
      <td class="row1"><span class="gen">{L_OCCUPATION}</span></td>
      <td class="row2">
        <input class="post" type="text" name="occupation" size="35" maxlength="100" value="{OCCUPATION}" />
      </td>
    </tr>
<!-- END switch_is_occupation -->
<!-- BEGIN switch_is_interests -->
    <tr>
      <td class="row1"><span class="gen">{L_INTERESTS}</span></td>
      <td class="row2">
        <input class="post" type="text" name="interests" size="35" maxlength="150" value="{INTERESTS}" />
      </td>
    </tr>
<!-- Start add - Gender MOD -->
    <tr> 
      <td class="row1"><span class="gen">{L_GENDER}</span></td> 
      <td class="row2"> 
      <input type="radio" name="gender" value="0" {GENDER_NO_SPECIFY_CHECKED}/> 
      <span class="gen">{L_GENDER_NOT_SPECIFY}</span>&nbsp;&nbsp; 
      <input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/> 
      <span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp; 
      <input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/> 
      <span class="gen">{L_GENDER_FEMALE}</span></td> 
    </tr>
<!-- End add - Gender MOD -->
<!-- END switch_is_interests -->
<!-- BEGIN switch_is_signature -->
	<!-- BEGIN birthday_optional -->
    <tr>
	  <td class="row1"><span class="gen">{L_BIRTHDAY}</span></td>
	  <td class="row2">{BIRTHDAY_INTERFACE}</td>
	</tr>
	<!-- END birthday_optional -->
    <tr>
      <td class="row1"><span class="gen">{L_SIGNATURE}</span><br />
        <span class="gensmall">{L_SIGNATURE_EXPLAIN}<br />
        <br />
        {HTML_STATUS}<br />
        {BBCODE_STATUS}<br />
        {SMILIES_STATUS}</span></td>
      <td class="row2">
        <textarea class="post" name="signature" rows="6" cols="45">{SIGNATURE}</textarea>
      </td>
    </tr>
<!-- END switch_is_signature -->
    <!-- BEGIN switch_type_text -->
    <tr>
      <td class="row1">
        <span class="gen">{xdata.NAME}</span><br /><span class="gensmall">{xdata.DESCRIPTION}</span>
      </td>
      <td class="row2">
        <input type="text" class="post" style="width: 200px" name="{xdata.CODE_NAME}" size="35" maxlength="{xdata.MAX_LENGTH}" value="{xdata.VALUE}" />
      </td>
    </tr>
    <!-- END switch_type_text -->
    <!-- BEGIN switch_type_textarea -->
    <tr>
      <td class="row1">
        <span class="gen">{xdata.NAME}</span><br /><span class="gensmall">{xdata.DESCRIPTION}</span>
      </td>
      <td class="row2">
        <textarea name="{xdata.CODE_NAME}" style="width: 300px"  rows="6" cols="30" class="post">{xdata.VALUE}</textarea>
      </td>
    </tr>
    <!-- END switch_type_textarea -->
    <!-- BEGIN switch_type_checkbox -->
      	<td class="row1">
        	<span class="gen">{xdata.NAME}</span><br /><span class="gensmall">{xdata.DESCRIPTION}</span>
	</td>
	<td class="row2">
		<input type="checkbox" name="{xdata.CODE_NAME}" {xdata.switch_type_checkbox.CHECKED} /><br>
	</td>
	<!-- END switch_type_checkbox -->
    <!-- BEGIN switch_type_select -->
    <tr>
      <td class="row1">
        <span class="gen">{xdata.NAME}</span><br /><span class="gensmall">{xdata.DESCRIPTION}</span>
      </td>
      <td class="row2">
         <select name="{xdata.CODE_NAME}">
           <!-- BEGIN options -->
           <option value="{xdata.switch_type_select.options.OPTION}" {xdata.switch_type_select.options.SELECTED}>{xdata.switch_type_select.options.OPTION}</option>
           <!-- END options -->
         </select>
      </td>
    </tr>
    <!-- END switch_type_select -->
    <!-- BEGIN switch_type_radio -->
    <tr>
      <td class="row1">
        <span class="gen">{xdata.NAME}</span><br /><span class="gensmall">{xdata.DESCRIPTION}</span>
      </td>
      <td class="row2">
         <!-- BEGIN options -->
         <input type="radio" name="{xdata.CODE_NAME}" value="{xdata.switch_type_radio.options.OPTION}" {xdata.switch_type_radio.options.CHECKED} />
         <span class="gen">{xdata.switch_type_radio.options.OPTION}</span><br />
         <!-- END options -->
      </td>
    </tr>
    <!-- END switch_type_radio -->
<!-- END xdata -->
    <tr>
       <td class="row1"><span class="gen">{L_GLANCE_SHOW}</span></td>
       <td class="row2">{GLANCE_SHOW}</td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_HIDE_IMAGES}</span></td>
      <td class="row2">
        <input type="radio" name="hide_images" value="1" {HIDE_IMAGES_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="hide_images" value="0" {HIDE_IMAGES_NO} />
        <span class="gen">{L_NO}</span>
      </td>
    </tr>
    <tr>
      <td class="catsides" colspan="2"><span class="cattitle">&nbsp;</span></td>
    </tr>
    <tr>
      <th class="thSides" colspan="2">{L_PREFERENCES}</th>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_PUBLIC_VIEW_EMAIL}</span></td>
      <td class="row2">
        <input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_HIDE_USER}</span></td>
      <td class="row2">
        <input type="radio" name="hideonline" value="1" {HIDE_USER_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="hideonline" value="0" {HIDE_USER_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
	<tr>
	  <td class="row1"><span class="gen">{L_BIRTHDAY_DISPLAY}</span><br />
	  <td class="row2"><span class="gen">
	    <select name="birthday_display">
	      <option value="{BIRTHDAY_ALL}"{BIRTHDAY_ALL_SELECTED}>{L_BIRTHDAY_ALL}</option>
	      <option value="{BIRTHDAY_DATE}"{BIRTHDAY_DATE_SELECTED}>{L_BIRTHDAY_YEAR}</option>
	      <option value="{BIRTHDAY_AGE}"{BIRTHDAY_AGE_SELECTED}>{L_BIRTHDAY_AGE}</option>
	      <option value="{BIRTHDAY_NONE}"{BIRTHDAY_NONE_SELECTED}>{L_BIRTHDAY_NONE}</option>
	    </select>
	  </td>
	</tr>
	<!-- BEGIN birthdays_greeting -->
	<tr>
	  <td class="row1"><span class="gen">{L_BDAY_SEND_GREETING}:</span><br /><span class="gensmall">{L_BDAY_SEND_GREETING_EXPLAIN}</span></td>
	  <td class="row2"><span class="gen">
		  <input type="radio" name="bday_greeting" value="0" {BDAY_NONE_ENABLED} /> {L_NONE}&nbsp;&nbsp;
		  <!-- BEGIN birthdays_email -->
		  <input type="radio" name="bday_greeting" value="{BDAY_EMAIL}" {BDAY_EMAIL_ENABLED} /> {L_EMAIL}&nbsp;&nbsp;
		  <!-- END birthdays_email -->
		  <!-- BEGIN birthdays_pm -->
		  <input type="radio" name="bday_greeting" value="{BDAY_PM}" {BDAY_PM_ENABLED} /> {L_PM}&nbsp;&nbsp;
		  <!-- END birthdays_pm -->
		  <!-- BEGIN birthdays_popup -->
		  <input type="radio" name="bday_greeting" value="{BDAY_POPUP}" {BDAY_POPUP_ENABLED} /> {L_POPUP}&nbsp;&nbsp;
		  <!-- END birthdays_popup -->
	  </span></td>
	</tr>
	<!-- END birthdays_greeting -->
    <tr>
      <td class="row1"><span class="gen">{L_NOTIFY_ON_REPLY}</span></td>
      <td class="row2">
        <input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_NOTIFY_ON_PRIVMSG}</span></td>
      <td class="row2">
        <input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_POPUP_ON_PRIVMSG}</span></td>
      <td class="row2">
        <input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_ALWAYS_ADD_SIGNATURE}</span></td>
      <td class="row2">
        <input type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_BBCODE}</span></td>
      <td class="row2">
        <input type="radio" name="allowbbcode" value="1" {ALWAYS_ALLOW_BBCODE_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="allowbbcode" value="0" {ALWAYS_ALLOW_BBCODE_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_HTML}</span></td>
      <td class="row2">
        <input type="radio" name="allowhtml" value="1" {ALWAYS_ALLOW_HTML_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="allowhtml" value="0" {ALWAYS_ALLOW_HTML_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_SMILIES}</span></td>
      <td class="row2">
        <input type="radio" name="allowsmilies" value="1" {ALWAYS_ALLOW_SMILIES_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="allowsmilies" value="0" {ALWAYS_ALLOW_SMILIES_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
        <td class="row1"><span class="gen">{L_SHOW_AVATARS}</span></td>
        <td class="row2">
            <input type="radio" name="showavatars" value="1" {SHOW_AVATARS_YES} />
            <span class="gen">{L_YES}</span>
            <input type="radio" name="showavatars" value="0" {SHOW_AVATARS_NO} />
            <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
        <td class="row1"><span class="gen">{L_SHOW_SIGNATURES}</span></td>
        <td class="row2">
            <input type="radio" name="showsignatures" value="1" {SHOW_SIGNATURES_YES} />
            <span class="gen">{L_YES}</span>
            <input type="radio" name="showsignatures" value="0" {SHOW_SIGNATURES_NO} />
            <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_WORD_WRAP}</span><br /><span class="gensmall">{L_WORD_WRAP_EXPLAIN}</span></td>
      <td class="row2"><span class="gensmall"><input type="text" name="user_wordwrap" value="{WRAP_ROW}" size="2" maxlength="2" class="post" /> {L_WORD_WRAP_EXTRA}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_BOARD_LANGUAGE}</span></td>
      <td class="row2">{LANGUAGE_SELECT}</td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_BOARD_STYLE}</span></td>
      <td class="row2">{STYLE_SELECT}</td>
    </tr>
    <!-- Start replacement - Advanced time management MOD -->
    <tr>
        <td class="row1"><span class="gen">{L_TIME_MODE}</span><br />
            <span class="gensmall">{L_TIME_MODE_TEXT}</span></td>
        <td class="row2" nowrap="nowrap">
            <span class="gen">{L_TIME_MODE_AUTO}</span><br />
            <input type="radio" name="time_mode" value="6" {TIME_MODE_FULL_PC_CHECKED}/>
            <span class="gen">{L_TIME_MODE_FULL_PC}</span><br />
            <input type="radio" name="time_mode" value="4" {TIME_MODE_SERVER_PC_CHECKED}/>
            <span class="gen">{L_TIME_MODE_SERVER_PC}</span><br />
            <input type="radio" name="time_mode" value="3" {TIME_MODE_FULL_SERVER_CHECKED}/>
            <span class="gen">{L_TIME_MODE_FULL_SERVER}</span>
            <br /><br />
            <span class="gen">{L_TIME_MODE_MANUAL}</span><br />
            <span class="gen">{L_TIME_MODE_DST}</span><input type="radio" name="time_mode" value="1" {TIME_MODE_MANUAL_DST_CHECKED}/><span class="gen">{L_YES}{L_TIME_MODE_DST_ON}</span>&nbsp;<input type="radio" name="time_mode" value="0" {TIME_MODE_MANUAL_CHECKED}/><span class="gen">{L_NO}{L_TIME_MODE_DST_OFF}</span>&nbsp;<input type="radio" name="time_mode" value="2" {TIME_MODE_SERVER_SWITCH_CHECKED}/><span class="gen">{L_TIME_MODE_DST_SERVER}</span><br />
            <span class="gen">{L_TIME_MODE_DST_TIME_LAG} </span><input type="text" name="dst_time_lag" value="{DST_TIME_LAG}" maxlength="3" size="3" class="post" /><span class="gen">{L_TIME_MODE_DST_MN}</span><br />
            <span class="gen">{L_TIME_MODE_TIMEZONE} </span><span class="gensmall">{TIMEZONE_SELECT}</span></td>
    </tr>
        <!-- End replacement - Advanced time management MOD -->
    <tr>
      <td class="row1"><span class="gen">{L_DATE_FORMAT}</span><br />
        <span class="gensmall">{L_DATE_FORMAT_EXPLAIN}</span></td>
      <td class="row2">
        <input class="post" type="text" name="dateformat" value="{DATE_FORMAT}" maxlength="16" />
      </td>
    </tr>
    <tr>
      <td class="catSides" colspan="2"><span class="cattitle">&nbsp;</span></td>
    </tr>
    <tr>
      <th class="thSides" colspan="2" height="12" valign="middle">{L_QUICK_REPLY_PANEL}</th>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_SHOW_QUICK_REPLY}</span></td>
      <td class="row2">{QUICK_REPLY_SELECT}</td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_QUICK_REPLY_MODE}</span></td>
      <td class="row2">
        <input type="radio" name="quickreply_mode" value="0" {QUICK_REPLY_MODE_BASIC} />
        <span class="gen">{L_QUICK_REPLY_MODE_BASIC}</span>
        <input type="radio" name="quickreply_mode" value="1" {QUICK_REPLY_MODE_ADVANCED} />
        <span class="gen">{L_QUICK_REPLY_MODE_ADVANCED}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_OPEN_QUICK_REPLY}</span></td>
      <td class="row2">
        <input type="radio" name="open_quickreply" value="1" {OPEN_QUICK_REPLY_YES} />
        <span class="gen">{L_YES}</span>&nbsp;&nbsp;
        <input type="radio" name="open_quickreply" value="0" {OPEN_QUICK_REPLY_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="catSides" colspan="2"><span class="cattitle">&nbsp;</span></td>
    </tr>
    <tr>
      <th class="thSides" colspan="2" height="12" valign="middle">{L_AVATAR_PANEL}</th>
    </tr>
    <tr align="center">
      <td class="row1" colspan="2">
        <table width="70%" cellspacing="2" cellpadding="0" border="0">
          <tr>
            <td width="65%"><span class="gensmall">{L_AVATAR_EXPLAIN}</span></td>
            <td align="center"><span class="gensmall">{L_CURRENT_IMAGE}</span><br />
              {AVATAR}<br />
              <input type="checkbox" name="avatardel" />
              &nbsp;<span class="gensmall">{L_DELETE_AVATAR}</span></td>
          </tr>
        </table>
      </td>
    </tr>

    <!-- BEGIN avatar_local_upload -->
    <tr>
      <td class="row1"><span class="gen">{L_UPLOAD_AVATAR_FILE}</span></td>
      <td class="row2">
        <input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" />
        <input type="file" name="avatar" class="post" style="width: 200px"  />
      </td>
    </tr>
    <!-- END avatar_local_upload -->
    <!-- BEGIN avatar_remote_upload -->
    <tr>
      <td class="row1"><span class="gen">{L_UPLOAD_AVATAR_URL}</span></td>
      <td class="row2">
        <input class="post" type="text" name="avatarurl" size="40" style="width: 200px"  />
      </td>
    </tr>
    <!-- END avatar_remote_upload -->
    <!-- BEGIN avatar_remote_link -->
    <tr>
      <td class="row1"><span class="gen">{L_LINK_REMOTE_AVATAR}</span></td>
      <td class="row2">
        <input class="post" type="text" name="avatarremoteurl" size="40" style="width: 200px"  />
      </td>
    </tr>
    <!-- END avatar_remote_link -->
    <!-- BEGIN avatar_local_gallery -->
    <tr>
      <td class="row1"><span class="gen">{L_AVATAR_GALLERY}</span></td>
      <td class="row2">
        <input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" />
      </td>
    </tr>
    <!-- END avatar_local_gallery -->

    <tr>
      <td class="catSides" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th class="thSides" colspan="2">{L_SPECIAL}</th>
    </tr>
    <tr>
      <td class="row1" colspan="2"><span class="gensmall">{L_SPECIAL_EXPLAIN}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_UPLOAD_QUOTA}</span></td>
      <td class="row2">{S_SELECT_UPLOAD_QUOTA}</td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_PM_QUOTA}</span></td>
      <td class="row2">{S_SELECT_PM_QUOTA}</td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_USER_ACTIVE}</span></td>
      <td class="row2">
        <input type="radio" name="user_status" value="1" {USER_ACTIVE_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="user_status" value="0" {USER_ACTIVE_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_ALLOW_PM}</span></td>
      <td class="row2">
        <input type="radio" name="user_allowpm" value="1" {ALLOW_PM_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="user_allowpm" value="0" {ALLOW_PM_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen">{L_ALLOW_AVATAR}</span></td>
      <td class="row2">
        <input type="radio" name="user_allowavatar" value="1" {ALLOW_AVATAR_YES} />
        <span class="gen">{L_YES}</span>
        <input type="radio" name="user_allowavatar" value="0" {ALLOW_AVATAR_NO} />
        <span class="gen">{L_NO}</span></td>
    </tr>
    <tr>
        <td class="row1"><span class="gen">{L_USER_POSTS}</span></td>
        <td class="row2"><input type="text" name="user_posts" value="{USER_POSTS}"></select></td>
    </tr>
    <tr>
		<td class="row1"><span class="gen">{L_SELECT_RANK1}</span></td>
		<td class="row2"><select name="user_rank">{RANK1_SELECT_BOX}</select></td>
	</tr>
	<tr>
	<tr>
		<td class="row1"><span class="gen">{L_SELECT_RANK2}</span></td>
		<td class="row2"><select name="user_rank2">{RANK2_SELECT_BOX}</select></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_SELECT_RANK3}</span></td>
		<td class="row2"><select name="user_rank3">{RANK3_SELECT_BOX}</select></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_SELECT_RANK4}</span></td>
		<td class="row2"><select name="user_rank4">{RANK4_SELECT_BOX}</select></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_SELECT_RANK5}</span></td>
		<td class="row2"><select name="user_rank5">{RANK5_SELECT_BOX}</select></td>
	</tr>
   <tr>
      <td class="row1"><span class="gen">{L_ADMIN_NOTES}</span></td>
      <td class="row2"><textarea class="post" name="user_admin_notes" rows="6" cols="45">{ADMIN_NOTES}</textarea></td>
   </tr>    
    <tr>
      <td class="row1"><span class="gen">{L_DELETE_USER}?</span></td>
      <td class="row2">
        <input type="checkbox" name="deleteuser">
        {L_DELETE_USER_EXPLAIN}</td>
    </tr>
    <tr>
      <td class="catBottom" colspan="2" align="center">{S_HIDDEN_FIELDS}
        <input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />

        <input type="reset" value="{L_RESET}" class="liteoption" />
      </td>
    </tr>
</table></form>