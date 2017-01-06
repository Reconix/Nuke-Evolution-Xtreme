<?php

// eXtreme Styles mod cache. Generated on Wed, 30 Apr 2014 09:34:29 -0600 (time=1398872069)

?><form action="<?php echo isset($this->vars['S_PROFILE_ACTION']) ? $this->vars['S_PROFILE_ACTION'] : $this->lang('S_PROFILE_ACTION'); ?>" <?php echo isset($this->vars['S_FORM_ENCTYPE']) ? $this->vars['S_FORM_ENCTYPE'] : $this->lang('S_FORM_ENCTYPE'); ?> method="post">

<?php echo isset($this->vars['ERROR_BOX']) ? $this->vars['ERROR_BOX'] : $this->lang('ERROR_BOX'); ?>

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
    <tr>
        <td align="left"><span class="nav"><a href="<?php echo isset($this->vars['U_INDEX']) ? $this->vars['U_INDEX'] : $this->lang('U_INDEX'); ?>" class="nav"><?php echo isset($this->vars['L_INDEX']) ? $this->vars['L_INDEX'] : $this->lang('L_INDEX'); ?></a></span></td>
    </tr>
</table>

<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
    <tr>
        <th class="thHead" colspan="2" height="25" valign="middle"><?php echo isset($this->vars['L_REGISTRATION_INFO']) ? $this->vars['L_REGISTRATION_INFO'] : $this->lang('L_REGISTRATION_INFO'); ?></th>
    </tr>
    <tr>
        <td class="row1" width="38%"><span class="gen"><?php echo isset($this->vars['L_USERNAME']) ? $this->vars['L_USERNAME'] : $this->lang('L_USERNAME'); ?>: *</span></td>
        <td class="row2"><input type="text" class="post" style="width:200px" name="username" size="25" maxlength="25" value="<?php echo isset($this->vars['USERNAME']) ? $this->vars['USERNAME'] : $this->lang('USERNAME'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1" width="38%"><span class="gen"><?php echo isset($this->vars['L_NAME']) ? $this->vars['L_NAME'] : $this->lang('L_NAME'); ?></span></td>
        <td class="row2"><input type="text" class="post" style="width:200px" name="rname" size="25" maxlength="25" value="<?php echo isset($this->vars['RNAME']) ? $this->vars['RNAME'] : $this->lang('RNAME'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_EMAIL_ADDRESS']) ? $this->vars['L_EMAIL_ADDRESS'] : $this->lang('L_EMAIL_ADDRESS'); ?>: *</span></td>
        <td class="row2"><input type="text" class="post" style="width:200px" name="email" size="25" maxlength="255" value="<?php echo isset($this->vars['EMAIL']) ? $this->vars['EMAIL'] : $this->lang('EMAIL'); ?>" /></td>
    </tr>
    <!-- Start add - Gender MOD -->
    <tr> 
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_GENDER']) ? $this->vars['L_GENDER'] : $this->lang('L_GENDER'); ?>:</span></td> 
        <td class="row2"> 
        <input type="radio" <?php echo isset($this->vars['LOCK_GENDER']) ? $this->vars['LOCK_GENDER'] : $this->lang('LOCK_GENDER'); ?> name="gender" value="0" <?php echo isset($this->vars['GENDER_NO_SPECIFY_CHECKED']) ? $this->vars['GENDER_NO_SPECIFY_CHECKED'] : $this->lang('GENDER_NO_SPECIFY_CHECKED'); ?>/> 
        <span class="gen"><?php echo isset($this->vars['L_GENDER_NOT_SPECIFY']) ? $this->vars['L_GENDER_NOT_SPECIFY'] : $this->lang('L_GENDER_NOT_SPECIFY'); ?></span>&nbsp;&nbsp; 
        <input type="radio" name="gender" value="1" <?php echo isset($this->vars['GENDER_MALE_CHECKED']) ? $this->vars['GENDER_MALE_CHECKED'] : $this->lang('GENDER_MALE_CHECKED'); ?>/> 
        <span class="gen"><?php echo isset($this->vars['L_GENDER_MALE']) ? $this->vars['L_GENDER_MALE'] : $this->lang('L_GENDER_MALE'); ?></span>&nbsp;&nbsp; 
        <input type="radio" name="gender" value="2" <?php echo isset($this->vars['GENDER_FEMALE_CHECKED']) ? $this->vars['GENDER_FEMALE_CHECKED'] : $this->lang('GENDER_FEMALE_CHECKED'); ?>/> 
        <span class="gen"><?php echo isset($this->vars['L_GENDER_FEMALE']) ? $this->vars['L_GENDER_FEMALE'] : $this->lang('L_GENDER_FEMALE'); ?></span></td> 
    </tr>
    <!-- End add - Gender MOD -->
	<?php

$birthday_required_count = ( isset($this->_tpldata['birthday_required.']) ) ?  sizeof($this->_tpldata['birthday_required.']) : 0;
for ($birthday_required_i = 0; $birthday_required_i < $birthday_required_count; $birthday_required_i++)
{
 $birthday_required_item = &$this->_tpldata['birthday_required.'][$birthday_required_i];
 $birthday_required_item['S_ROW_COUNT'] = $birthday_required_i;
 $birthday_required_item['S_NUM_ROWS'] = $birthday_required_count;

?>
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_BIRTHDAY']) ? $this->vars['L_BIRTHDAY'] : $this->lang('L_BIRTHDAY'); ?>: *</span></td>
	  <td class="row2"><?php echo isset($this->vars['BIRTHDAY_INTERFACE']) ? $this->vars['BIRTHDAY_INTERFACE'] : $this->lang('BIRTHDAY_INTERFACE'); ?></td>
	</tr>
	<?php

} // END birthday_required

if(isset($birthday_required_item)) { unset($birthday_required_item); } 

?>
    <?php

$switch_edit_profile_count = ( isset($this->_tpldata['switch_edit_profile.']) ) ?  sizeof($this->_tpldata['switch_edit_profile.']) : 0;
for ($switch_edit_profile_i = 0; $switch_edit_profile_i < $switch_edit_profile_count; $switch_edit_profile_i++)
{
 $switch_edit_profile_item = &$this->_tpldata['switch_edit_profile.'][$switch_edit_profile_i];
 $switch_edit_profile_item['S_ROW_COUNT'] = $switch_edit_profile_i;
 $switch_edit_profile_item['S_NUM_ROWS'] = $switch_edit_profile_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_CURRENT_PASSWORD']) ? $this->vars['L_CURRENT_PASSWORD'] : $this->lang('L_CURRENT_PASSWORD'); ?>: *</span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_CONFIRM_PASSWORD_EXPLAIN']) ? $this->vars['L_CONFIRM_PASSWORD_EXPLAIN'] : $this->lang('L_CONFIRM_PASSWORD_EXPLAIN'); ?></span></td>
      <td class="row2">
        <input type="password" class="post" style="width: 200px" name="cur_password" size="25" maxlength="100" value="<?php echo isset($this->vars['CUR_PASSWORD']) ? $this->vars['CUR_PASSWORD'] : $this->lang('CUR_PASSWORD'); ?>" />
      </td>
    </tr>
    <?php

} // END switch_edit_profile

if(isset($switch_edit_profile_item)) { unset($switch_edit_profile_item); } 

?>
    <?php

$switch_ya_merge_count = ( isset($this->_tpldata['switch_ya_merge.']) ) ?  sizeof($this->_tpldata['switch_ya_merge.']) : 0;
for ($switch_ya_merge_i = 0; $switch_ya_merge_i < $switch_ya_merge_count; $switch_ya_merge_i++)
{
 $switch_ya_merge_item = &$this->_tpldata['switch_ya_merge.'][$switch_ya_merge_i];
 $switch_ya_merge_item['S_ROW_COUNT'] = $switch_ya_merge_i;
 $switch_ya_merge_item['S_NUM_ROWS'] = $switch_ya_merge_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_NEW_PASSWORD']) ? $this->vars['L_NEW_PASSWORD'] : $this->lang('L_NEW_PASSWORD'); ?>: *</span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_PASSWORD_IF_CHANGED']) ? $this->vars['L_PASSWORD_IF_CHANGED'] : $this->lang('L_PASSWORD_IF_CHANGED'); ?></span></td>
      <td class="row2" nowrap="nowrap"> 
		<script language="JavaScript" type="text/javascript">
		<!--
		// Password security
		function check_pw(pw_to_check) 
		{
			var counter_to_check = 0;
			var minlength_to_check = 6;
		
			if (pw_to_check.length >= minlength_to_check)
			{
				counter_to_check = counter_to_check + 1;
			}
			if (pw_to_check.match(/[A-Z\Ä\Ö\Ü]/))
			{
				counter_to_check = counter_to_check + 2;
			}
			if (pw_to_check.match(/[a-z\ä\ö\ü\ß]/))
			{
				counter_to_check = counter_to_check + 1;
			}
			if (pw_to_check.match(/[0-9]/))
			{
				counter_to_check = counter_to_check + 2;
			}
            if (pw_to_check.match(/[\.\,\?\!\%\*\_\#\:\;\~\\&\$\§\€\@\/\=\+\-\(\)\[\]\|\<\>]/)) 
            { 
               counter_to_check = counter_to_check + 2; 
            } 
			if (pw_to_check == document.getElementsByName('username').username.value)
			{
				counter_to_check = 0;
			}
			if (pw_to_check == document.getElementsByName('email').email.value)
			{
				counter_to_check = 0;
			}

			if (counter_to_check <= 2)
			{
				document.getElementsByName('holder_pw')[0].style.backgroundColor = 'red';
				document.getElementsByName('holder_pw')[0].style.color = 'black';
				document.getElementsByName('holder_pw')[0].style.border = '1px solid black';
				document.getElementsByName('holder_pw')[0].value = '<?php echo isset($this->vars['L_PASSWORD_SECURITY_LEVEL1']) ? $this->vars['L_PASSWORD_SECURITY_LEVEL1'] : $this->lang('L_PASSWORD_SECURITY_LEVEL1'); ?>';
			}
			else if (counter_to_check <= 4)
			{
				document.getElementsByName('holder_pw')[0].style.backgroundColor = 'yellow';
				document.getElementsByName('holder_pw')[0].style.color = 'black';
				document.getElementsByName('holder_pw')[0].style.border = '1px solid black';
				document.getElementsByName('holder_pw')[0].value = '<?php echo isset($this->vars['L_PASSWORD_SECURITY_LEVEL2']) ? $this->vars['L_PASSWORD_SECURITY_LEVEL2'] : $this->lang('L_PASSWORD_SECURITY_LEVEL2'); ?>';
			}
			else if (counter_to_check <= 5)
			{
				document.getElementsByName('holder_pw')[0].style.backgroundColor = 'green';
				document.getElementsByName('holder_pw')[0].style.color = 'white';
				document.getElementsByName('holder_pw')[0].style.border = '1px solid black';
				document.getElementsByName('holder_pw')[0].value = '<?php echo isset($this->vars['L_PASSWORD_SECURITY_LEVEL3']) ? $this->vars['L_PASSWORD_SECURITY_LEVEL3'] : $this->lang('L_PASSWORD_SECURITY_LEVEL3'); ?>';
			}
			else if (counter_to_check <= 7)
			{
				document.getElementsByName('holder_pw')[0].style.backgroundColor = 'green';
				document.getElementsByName('holder_pw')[0].style.color = 'white';
				document.getElementsByName('holder_pw')[0].style.border = '1px solid black';
				document.getElementsByName('holder_pw')[0].value = '<?php echo isset($this->vars['L_PASSWORD_SECURITY_LEVEL4']) ? $this->vars['L_PASSWORD_SECURITY_LEVEL4'] : $this->lang('L_PASSWORD_SECURITY_LEVEL4'); ?>';
			}
			else if (counter_to_check == 8)
			{
				document.getElementsByName('holder_pw')[0].style.backgroundColor = 'green';
				document.getElementsByName('holder_pw')[0].style.color = 'white';
				document.getElementsByName('holder_pw')[0].style.border = '1px solid black';
				document.getElementsByName('holder_pw')[0].value = '<?php echo isset($this->vars['L_PASSWORD_SECURITY_LEVEL5']) ? $this->vars['L_PASSWORD_SECURITY_LEVEL5'] : $this->lang('L_PASSWORD_SECURITY_LEVEL5'); ?>';
			}
		}
		//-->
		</script>
		<input onkeyup="check_pw(this.value);" onfocus="check_pw(this.value);" type="password" class="post" style="width: 200px" name="new_password" size="25" maxlength="32" value="<?php echo isset($this->vars['NEW_PASSWORD']) ? $this->vars['NEW_PASSWORD'] : $this->lang('NEW_PASSWORD'); ?>" />
		<span class="gensmall"><a href="<?php echo isset($this->vars['U_FAQ']) ? $this->vars['U_FAQ'] : $this->lang('U_FAQ'); ?>#39" tabindex="98" target="_phpbbfaq"><?php echo isset($this->vars['L_PASSWORD_SECURITY_EXPLAIN']) ? $this->vars['L_PASSWORD_SECURITY_EXPLAIN'] : $this->lang('L_PASSWORD_SECURITY_EXPLAIN'); ?></a></span> <input tabindex="99" title="" readonly="readonly" type="text" class="post" style="width : 150px; text-align : center; border : 1px solid #DEE3E7; background-color : #DEE3E7;" name="holder_pw" size="25" value="" />

      </td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_CONFIRM_PASSWORD']) ? $this->vars['L_CONFIRM_PASSWORD'] : $this->lang('L_CONFIRM_PASSWORD'); ?>: * </span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_PASSWORD_CONFIRM_IF_CHANGED']) ? $this->vars['L_PASSWORD_CONFIRM_IF_CHANGED'] : $this->lang('L_PASSWORD_CONFIRM_IF_CHANGED'); ?></span></td>
      <td class="row2">
        <input type="password" class="post" style="width: 200px" name="password_confirm" size="25" maxlength="100" value="<?php echo isset($this->vars['PASSWORD_CONFIRM']) ? $this->vars['PASSWORD_CONFIRM'] : $this->lang('PASSWORD_CONFIRM'); ?>" />
      </td>
    </tr>
    <?php

} // END switch_ya_merge

if(isset($switch_ya_merge_item)) { unset($switch_ya_merge_item); } 

?>
    <?php

$switch_silent_password_count = ( isset($this->_tpldata['switch_silent_password.']) ) ?  sizeof($this->_tpldata['switch_silent_password.']) : 0;
for ($switch_silent_password_i = 0; $switch_silent_password_i < $switch_silent_password_count; $switch_silent_password_i++)
{
 $switch_silent_password_item = &$this->_tpldata['switch_silent_password.'][$switch_silent_password_i];
 $switch_silent_password_item['S_ROW_COUNT'] = $switch_silent_password_i;
 $switch_silent_password_item['S_NUM_ROWS'] = $switch_silent_password_count;

?>
    <input type="hidden" name="new_password" value="<?php echo isset($this->vars['NEW_PASSWORD']) ? $this->vars['NEW_PASSWORD'] : $this->lang('NEW_PASSWORD'); ?>" />
    <input type="hidden" name="password_confirm" value="<?php echo isset($this->vars['PASSWORD_CONFIRM']) ? $this->vars['PASSWORD_CONFIRM'] : $this->lang('PASSWORD_CONFIRM'); ?>" />
    <?php

} // END switch_silent_password

if(isset($switch_silent_password_item)) { unset($switch_silent_password_item); } 

?>
    <tr>
      <td class="catSides" colspan="2" height="28">&nbsp;</td>
    </tr>
    <tr>
      <th class="thSides" colspan="2" height="25" valign="middle"><?php echo isset($this->vars['L_PROFILE_INFO']) ? $this->vars['L_PROFILE_INFO'] : $this->lang('L_PROFILE_INFO'); ?></th>
    </tr>
    <tr> 
      <td class="row2" colspan="2"><span class="gensmall"><?php echo isset($this->vars['L_ITEMS_REQUIRED']) ? $this->vars['L_ITEMS_REQUIRED'] : $this->lang('L_ITEMS_REQUIRED'); ?></span></td>
    </tr>    
    <tr>
      <td class="row2" colspan="2"><span class="gensmall"><?php echo isset($this->vars['L_PROFILE_INFO_NOTICE']) ? $this->vars['L_PROFILE_INFO_NOTICE'] : $this->lang('L_PROFILE_INFO_NOTICE'); ?></span></td>
    </tr>
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_MYSPACE']) ? $this->vars['L_MYSPACE'] : $this->lang('L_MYSPACE'); ?>:</span></td>
	  <td class="row2">
		<input type="text" class="post"style="width: 200px"  name="myspace" size="25" maxlength="255" value="<?php echo isset($this->vars['MYSPACE']) ? $this->vars['MYSPACE'] : $this->lang('MYSPACE'); ?>" />
	  </td>
	</tr>  
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_FACEBOOK']) ? $this->vars['L_FACEBOOK'] : $this->lang('L_FACEBOOK'); ?>:</span></td>
	  <td class="row2">
		<input type="text" class="post"style="width: 200px"  name="facebook" size="25" maxlength="255" value="<?php echo isset($this->vars['FACEBOOK']) ? $this->vars['FACEBOOK'] : $this->lang('FACEBOOK'); ?>" />
	  </td>
	</tr>      
<?php

$xdata_count = ( isset($this->_tpldata['xdata.']) ) ?  sizeof($this->_tpldata['xdata.']) : 0;
for ($xdata_i = 0; $xdata_i < $xdata_count; $xdata_i++)
{
 $xdata_item = &$this->_tpldata['xdata.'][$xdata_i];
 $xdata_item['S_ROW_COUNT'] = $xdata_i;
 $xdata_item['S_NUM_ROWS'] = $xdata_count;

?>
<?php

$switch_is_icq_count = ( isset($xdata_item['switch_is_icq.']) ) ? sizeof($xdata_item['switch_is_icq.']) : 0;
for ($switch_is_icq_i = 0; $switch_is_icq_i < $switch_is_icq_count; $switch_is_icq_i++)
{
 $switch_is_icq_item = &$xdata_item['switch_is_icq.'][$switch_is_icq_i];
 $switch_is_icq_item['S_ROW_COUNT'] = $switch_is_icq_i;
 $switch_is_icq_item['S_NUM_ROWS'] = $switch_is_icq_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ICQ_NUMBER']) ? $this->vars['L_ICQ_NUMBER'] : $this->lang('L_ICQ_NUMBER'); ?>:</span></td>
      <td class="row2">
        <input type="text" name="icq" class="post" style="width: 100px"  size="10" maxlength="15" value="<?php echo isset($this->vars['ICQ']) ? $this->vars['ICQ'] : $this->lang('ICQ'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_icq

if(isset($switch_is_icq_item)) { unset($switch_is_icq_item); } 

?>
<?php

$switch_is_aim_count = ( isset($xdata_item['switch_is_aim.']) ) ? sizeof($xdata_item['switch_is_aim.']) : 0;
for ($switch_is_aim_i = 0; $switch_is_aim_i < $switch_is_aim_count; $switch_is_aim_i++)
{
 $switch_is_aim_item = &$xdata_item['switch_is_aim.'][$switch_is_aim_i];
 $switch_is_aim_item['S_ROW_COUNT'] = $switch_is_aim_i;
 $switch_is_aim_item['S_NUM_ROWS'] = $switch_is_aim_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_AIM']) ? $this->vars['L_AIM'] : $this->lang('L_AIM'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 150px"  name="aim" size="20" maxlength="255" value="<?php echo isset($this->vars['AIM']) ? $this->vars['AIM'] : $this->lang('AIM'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_aim

if(isset($switch_is_aim_item)) { unset($switch_is_aim_item); } 

?>
<?php

$switch_is_msn_count = ( isset($xdata_item['switch_is_msn.']) ) ? sizeof($xdata_item['switch_is_msn.']) : 0;
for ($switch_is_msn_i = 0; $switch_is_msn_i < $switch_is_msn_count; $switch_is_msn_i++)
{
 $switch_is_msn_item = &$xdata_item['switch_is_msn.'][$switch_is_msn_i];
 $switch_is_msn_item['S_ROW_COUNT'] = $switch_is_msn_i;
 $switch_is_msn_item['S_NUM_ROWS'] = $switch_is_msn_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_MESSENGER']) ? $this->vars['L_MESSENGER'] : $this->lang('L_MESSENGER'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 150px"  name="msn" size="20" maxlength="255" value="<?php echo isset($this->vars['MSN']) ? $this->vars['MSN'] : $this->lang('MSN'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_msn

if(isset($switch_is_msn_item)) { unset($switch_is_msn_item); } 

?>
<?php

$switch_is_yim_count = ( isset($xdata_item['switch_is_yim.']) ) ? sizeof($xdata_item['switch_is_yim.']) : 0;
for ($switch_is_yim_i = 0; $switch_is_yim_i < $switch_is_yim_count; $switch_is_yim_i++)
{
 $switch_is_yim_item = &$xdata_item['switch_is_yim.'][$switch_is_yim_i];
 $switch_is_yim_item['S_ROW_COUNT'] = $switch_is_yim_i;
 $switch_is_yim_item['S_NUM_ROWS'] = $switch_is_yim_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_YAHOO']) ? $this->vars['L_YAHOO'] : $this->lang('L_YAHOO'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 150px"  name="yim" size="20" maxlength="255" value="<?php echo isset($this->vars['YIM']) ? $this->vars['YIM'] : $this->lang('YIM'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_yim

if(isset($switch_is_yim_item)) { unset($switch_is_yim_item); } 

?>
<?php

$switch_is_website_count = ( isset($xdata_item['switch_is_website.']) ) ? sizeof($xdata_item['switch_is_website.']) : 0;
for ($switch_is_website_i = 0; $switch_is_website_i < $switch_is_website_count; $switch_is_website_i++)
{
 $switch_is_website_item = &$xdata_item['switch_is_website.'][$switch_is_website_i];
 $switch_is_website_item['S_ROW_COUNT'] = $switch_is_website_i;
 $switch_is_website_item['S_NUM_ROWS'] = $switch_is_website_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_WEBSITE']) ? $this->vars['L_WEBSITE'] : $this->lang('L_WEBSITE'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 200px"  name="website" size="25" maxlength="255" value="<?php echo isset($this->vars['WEBSITE']) ? $this->vars['WEBSITE'] : $this->lang('WEBSITE'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_website

if(isset($switch_is_website_item)) { unset($switch_is_website_item); } 

?>
<?php

$switch_is_location_count = ( isset($xdata_item['switch_is_location.']) ) ? sizeof($xdata_item['switch_is_location.']) : 0;
for ($switch_is_location_i = 0; $switch_is_location_i < $switch_is_location_count; $switch_is_location_i++)
{
 $switch_is_location_item = &$xdata_item['switch_is_location.'][$switch_is_location_i];
 $switch_is_location_item['S_ROW_COUNT'] = $switch_is_location_i;
 $switch_is_location_item['S_NUM_ROWS'] = $switch_is_location_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_LOCATION']) ? $this->vars['L_LOCATION'] : $this->lang('L_LOCATION'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 200px"  name="location" size="25" maxlength="100" value="<?php echo isset($this->vars['LOCATION']) ? $this->vars['LOCATION'] : $this->lang('LOCATION'); ?>" />
      </td>
    </tr>
<!-- FLAGHACK-start -->
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_FLAG']) ? $this->vars['L_FLAG'] : $this->lang('L_FLAG'); ?>:</span></td>
	  <td class="row2">
	  <span class="gensmall">
		<table>
		  <tr>
		    <td><?php echo isset($this->vars['FLAG_SELECT']) ? $this->vars['FLAG_SELECT'] : $this->lang('FLAG_SELECT'); ?>&nbsp;</td>
	  	    <td><img src="images/flags/<?php echo isset($this->vars['FLAG_START']) ? $this->vars['FLAG_START'] : $this->lang('FLAG_START'); ?>" width="16" height="11" name="user_flag" /></td>
		  </tr>
		</table>
	  </span>
	  </td>
	</tr>
<!-- FLAGHACK-end -->
<?php

} // END switch_is_location

if(isset($switch_is_location_item)) { unset($switch_is_location_item); } 

?>
<?php

$switch_is_occupation_count = ( isset($xdata_item['switch_is_occupation.']) ) ? sizeof($xdata_item['switch_is_occupation.']) : 0;
for ($switch_is_occupation_i = 0; $switch_is_occupation_i < $switch_is_occupation_count; $switch_is_occupation_i++)
{
 $switch_is_occupation_item = &$xdata_item['switch_is_occupation.'][$switch_is_occupation_i];
 $switch_is_occupation_item['S_ROW_COUNT'] = $switch_is_occupation_i;
 $switch_is_occupation_item['S_NUM_ROWS'] = $switch_is_occupation_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_OCCUPATION']) ? $this->vars['L_OCCUPATION'] : $this->lang('L_OCCUPATION'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 200px"  name="occupation" size="25" maxlength="100" value="<?php echo isset($this->vars['OCCUPATION']) ? $this->vars['OCCUPATION'] : $this->lang('OCCUPATION'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_occupation

if(isset($switch_is_occupation_item)) { unset($switch_is_occupation_item); } 

?>
<?php

$switch_is_interests_count = ( isset($xdata_item['switch_is_interests.']) ) ? sizeof($xdata_item['switch_is_interests.']) : 0;
for ($switch_is_interests_i = 0; $switch_is_interests_i < $switch_is_interests_count; $switch_is_interests_i++)
{
 $switch_is_interests_item = &$xdata_item['switch_is_interests.'][$switch_is_interests_i];
 $switch_is_interests_item['S_ROW_COUNT'] = $switch_is_interests_i;
 $switch_is_interests_item['S_NUM_ROWS'] = $switch_is_interests_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_INTERESTS']) ? $this->vars['L_INTERESTS'] : $this->lang('L_INTERESTS'); ?>:</span></td>
      <td class="row2">
        <input type="text" class="post" style="width: 200px"  name="interests" size="35" maxlength="150" value="<?php echo isset($this->vars['INTERESTS']) ? $this->vars['INTERESTS'] : $this->lang('INTERESTS'); ?>" />
      </td>
    </tr>
<?php

} // END switch_is_interests

if(isset($switch_is_interests_item)) { unset($switch_is_interests_item); } 

?>
<?php

$switch_is_signature_count = ( isset($xdata_item['switch_is_signature.']) ) ? sizeof($xdata_item['switch_is_signature.']) : 0;
for ($switch_is_signature_i = 0; $switch_is_signature_i < $switch_is_signature_count; $switch_is_signature_i++)
{
 $switch_is_signature_item = &$xdata_item['switch_is_signature.'][$switch_is_signature_i];
 $switch_is_signature_item['S_ROW_COUNT'] = $switch_is_signature_i;
 $switch_is_signature_item['S_NUM_ROWS'] = $switch_is_signature_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_EXTRA_INFO']) ? $this->vars['L_EXTRA_INFO'] : $this->lang('L_EXTRA_INFO'); ?></span></td>
      <td class="row2">
        <textarea wrap='virtual' class="post" cols='50' rows='5' name='extra_info' /><?php echo isset($this->vars['EXTRA_INFO']) ? $this->vars['EXTRA_INFO'] : $this->lang('EXTRA_INFO'); ?></textarea>
      </td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['SIG_DESC']) ? $this->vars['SIG_DESC'] : $this->lang('SIG_DESC'); ?>:</span></td>
      <td class="row2">
        <input type="button" value="<?php echo isset($this->vars['SIG_BUTTON_DESC']) ? $this->vars['SIG_BUTTON_DESC'] : $this->lang('SIG_BUTTON_DESC'); ?>" onclick="window.location.href='<?php echo isset($this->vars['SIG_EDIT_LINK']) ? $this->vars['SIG_EDIT_LINK'] : $this->lang('SIG_EDIT_LINK'); ?>'" />
      </td>
    </tr>
<?php

} // END switch_is_signature

if(isset($switch_is_signature_item)) { unset($switch_is_signature_item); } 

?>
    <?php

$switch_type_date_count = ( isset($xdata_item['switch_type_date.']) ) ? sizeof($xdata_item['switch_type_date.']) : 0;
for ($switch_type_date_i = 0; $switch_type_date_i < $switch_type_date_count; $switch_type_date_i++)
{
 $switch_type_date_item = &$xdata_item['switch_type_date.'][$switch_type_date_i];
 $switch_type_date_item['S_ROW_COUNT'] = $switch_type_date_i;
 $switch_type_date_item['S_NUM_ROWS'] = $switch_type_date_count;

?>
    <tr>
      <td class="row1">
        <span class="gen"><?php echo isset($xdata_item['NAME']) ? $xdata_item['NAME'] : ''; ?></span><br /><span class="gensmall"><?php echo isset($xdata_item['DESCRIPTION']) ? $xdata_item['DESCRIPTION'] : ''; ?></span>
      </td>
      <td class="row2">
        <input type="text" class="post"style="width: 200px" name="<?php echo isset($xdata_item['CODE_NAME']) ? $xdata_item['CODE_NAME'] : ''; ?>" size="35" maxlength="<?php echo isset($xdata_item['MAX_LENGTH']) ? $xdata_item['MAX_LENGTH'] : ''; ?>" value="<?php echo isset($xdata_item['VALUE']) ? $xdata_item['VALUE'] : ''; ?>" />
      </td>
    </tr>
    <?php

} // END switch_type_date

if(isset($switch_type_date_item)) { unset($switch_type_date_item); } 

?>
    <?php

$switch_type_text_count = ( isset($xdata_item['switch_type_text.']) ) ? sizeof($xdata_item['switch_type_text.']) : 0;
for ($switch_type_text_i = 0; $switch_type_text_i < $switch_type_text_count; $switch_type_text_i++)
{
 $switch_type_text_item = &$xdata_item['switch_type_text.'][$switch_type_text_i];
 $switch_type_text_item['S_ROW_COUNT'] = $switch_type_text_i;
 $switch_type_text_item['S_NUM_ROWS'] = $switch_type_text_count;

?>
    <tr>
      <td class="row1">
        <span class="gen"><?php echo isset($xdata_item['NAME']) ? $xdata_item['NAME'] : ''; ?></span><br /><span class="gensmall"><?php echo isset($xdata_item['DESCRIPTION']) ? $xdata_item['DESCRIPTION'] : ''; ?></span>
      </td>
      <td class="row2">
        <input type="text" class="post" style="width: 200px" name="<?php echo isset($xdata_item['CODE_NAME']) ? $xdata_item['CODE_NAME'] : ''; ?>" size="35" maxlength="<?php echo isset($xdata_item['MAX_LENGTH']) ? $xdata_item['MAX_LENGTH'] : ''; ?>" value="<?php echo isset($xdata_item['VALUE']) ? $xdata_item['VALUE'] : ''; ?>" />
      </td>
    </tr>
    <?php

} // END switch_type_text

if(isset($switch_type_text_item)) { unset($switch_type_text_item); } 

?>
    <?php

$switch_type_textarea_count = ( isset($xdata_item['switch_type_textarea.']) ) ? sizeof($xdata_item['switch_type_textarea.']) : 0;
for ($switch_type_textarea_i = 0; $switch_type_textarea_i < $switch_type_textarea_count; $switch_type_textarea_i++)
{
 $switch_type_textarea_item = &$xdata_item['switch_type_textarea.'][$switch_type_textarea_i];
 $switch_type_textarea_item['S_ROW_COUNT'] = $switch_type_textarea_i;
 $switch_type_textarea_item['S_NUM_ROWS'] = $switch_type_textarea_count;

?>
    <tr>
      <td class="row1">
        <span class="gen"><?php echo isset($xdata_item['NAME']) ? $xdata_item['NAME'] : ''; ?></span><br /><span class="gensmall"><?php echo isset($xdata_item['DESCRIPTION']) ? $xdata_item['DESCRIPTION'] : ''; ?></span>
      </td>
      <td class="row2">
        <textarea name="<?php echo isset($xdata_item['CODE_NAME']) ? $xdata_item['CODE_NAME'] : ''; ?>" style="width: 300px"  rows="6" cols="30" class="post"><?php echo isset($xdata_item['VALUE']) ? $xdata_item['VALUE'] : ''; ?></textarea>
      </td>
    </tr>
    <?php

} // END switch_type_textarea

if(isset($switch_type_textarea_item)) { unset($switch_type_textarea_item); } 

?>
    <?php

$switch_type_checkbox_count = ( isset($xdata_item['switch_type_checkbox.']) ) ? sizeof($xdata_item['switch_type_checkbox.']) : 0;
for ($switch_type_checkbox_i = 0; $switch_type_checkbox_i < $switch_type_checkbox_count; $switch_type_checkbox_i++)
{
 $switch_type_checkbox_item = &$xdata_item['switch_type_checkbox.'][$switch_type_checkbox_i];
 $switch_type_checkbox_item['S_ROW_COUNT'] = $switch_type_checkbox_i;
 $switch_type_checkbox_item['S_NUM_ROWS'] = $switch_type_checkbox_count;

?>
      	<td class="row1">
        	<span class="gen"><?php echo isset($xdata_item['NAME']) ? $xdata_item['NAME'] : ''; ?></span><br /><span class="gensmall"><?php echo isset($xdata_item['DESCRIPTION']) ? $xdata_item['DESCRIPTION'] : ''; ?></span>
	</td>
	<td class="row2">
		<input type="checkbox" name="<?php echo isset($xdata_item['CODE_NAME']) ? $xdata_item['CODE_NAME'] : ''; ?>" <?php echo isset($switch_type_checkbox_item['CHECKED']) ? $switch_type_checkbox_item['CHECKED'] : ''; ?> /><br>
	</td>
	<?php

} // END switch_type_checkbox

if(isset($switch_type_checkbox_item)) { unset($switch_type_checkbox_item); } 

?>
    <?php

$switch_type_select_count = ( isset($xdata_item['switch_type_select.']) ) ? sizeof($xdata_item['switch_type_select.']) : 0;
for ($switch_type_select_i = 0; $switch_type_select_i < $switch_type_select_count; $switch_type_select_i++)
{
 $switch_type_select_item = &$xdata_item['switch_type_select.'][$switch_type_select_i];
 $switch_type_select_item['S_ROW_COUNT'] = $switch_type_select_i;
 $switch_type_select_item['S_NUM_ROWS'] = $switch_type_select_count;

?>
    <tr>
      <td class="row1">
        <span class="gen"><?php echo isset($xdata_item['NAME']) ? $xdata_item['NAME'] : ''; ?></span><br /><span class="gensmall"><?php echo isset($xdata_item['DESCRIPTION']) ? $xdata_item['DESCRIPTION'] : ''; ?></span>
      </td>
      <td class="row2">
         <select name="<?php echo isset($xdata_item['CODE_NAME']) ? $xdata_item['CODE_NAME'] : ''; ?>">
           <?php

$options_count = ( isset($switch_type_select_item['options.']) ) ? sizeof($switch_type_select_item['options.']) : 0;
for ($options_i = 0; $options_i < $options_count; $options_i++)
{
 $options_item = &$switch_type_select_item['options.'][$options_i];
 $options_item['S_ROW_COUNT'] = $options_i;
 $options_item['S_NUM_ROWS'] = $options_count;

?>
           <option value="<?php echo isset($options_item['OPTION']) ? $options_item['OPTION'] : ''; ?>" <?php echo isset($options_item['SELECTED']) ? $options_item['SELECTED'] : ''; ?>><?php echo isset($options_item['OPTION']) ? $options_item['OPTION'] : ''; ?></option>
           <?php

} // END options

if(isset($options_item)) { unset($options_item); } 

?>
         </select>
      </td>
    </tr>
    <?php

} // END switch_type_select

if(isset($switch_type_select_item)) { unset($switch_type_select_item); } 

?>
    <?php

$switch_type_radio_count = ( isset($xdata_item['switch_type_radio.']) ) ? sizeof($xdata_item['switch_type_radio.']) : 0;
for ($switch_type_radio_i = 0; $switch_type_radio_i < $switch_type_radio_count; $switch_type_radio_i++)
{
 $switch_type_radio_item = &$xdata_item['switch_type_radio.'][$switch_type_radio_i];
 $switch_type_radio_item['S_ROW_COUNT'] = $switch_type_radio_i;
 $switch_type_radio_item['S_NUM_ROWS'] = $switch_type_radio_count;

?>
    <tr>
      <td class="row1">
        <span class="gen"><?php echo isset($xdata_item['NAME']) ? $xdata_item['NAME'] : ''; ?></span><br /><span class="gensmall"><?php echo isset($xdata_item['DESCRIPTION']) ? $xdata_item['DESCRIPTION'] : ''; ?></span>
      </td>
      <td class="row2">
         <?php

$options_count = ( isset($switch_type_radio_item['options.']) ) ? sizeof($switch_type_radio_item['options.']) : 0;
for ($options_i = 0; $options_i < $options_count; $options_i++)
{
 $options_item = &$switch_type_radio_item['options.'][$options_i];
 $options_item['S_ROW_COUNT'] = $options_i;
 $options_item['S_NUM_ROWS'] = $options_count;

?>
         <input type="radio" name="<?php echo isset($xdata_item['CODE_NAME']) ? $xdata_item['CODE_NAME'] : ''; ?>" value="<?php echo isset($options_item['OPTION']) ? $options_item['OPTION'] : ''; ?>" <?php echo isset($options_item['CHECKED']) ? $options_item['CHECKED'] : ''; ?> />
         <span class="gen"><?php echo isset($options_item['OPTION']) ? $options_item['OPTION'] : ''; ?></span><br />
         <?php

} // END options

if(isset($options_item)) { unset($options_item); } 

?>
      </td>
    </tr>
    <?php

} // END switch_type_radio

if(isset($switch_type_radio_item)) { unset($switch_type_radio_item); } 

?>
<?php

} // END xdata

if(isset($xdata_item)) { unset($xdata_item); } 

?>
    <tr>
      <td class="catSides" colspan="2" height="28">&nbsp;</td>
    </tr>
    <tr>
      <th class="thSides" colspan="2" height="25" valign="middle"><?php echo isset($this->vars['L_PREFERENCES']) ? $this->vars['L_PREFERENCES'] : $this->lang('L_PREFERENCES'); ?></th>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_GLANCE_SHOW']) ? $this->vars['L_GLANCE_SHOW'] : $this->lang('L_GLANCE_SHOW'); ?></span></td>
      <td class="row2"><?php echo isset($this->vars['GLANCE_SHOW']) ? $this->vars['GLANCE_SHOW'] : $this->lang('GLANCE_SHOW'); ?></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_HIDE_IMAGES']) ? $this->vars['L_HIDE_IMAGES'] : $this->lang('L_HIDE_IMAGES'); ?></span></td>
      <td class="row2">
        <input type="radio" name="hide_images" value="1" <?php echo isset($this->vars['HIDE_IMAGES_YES']) ? $this->vars['HIDE_IMAGES_YES'] : $this->lang('HIDE_IMAGES_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>
        <input type="radio" name="hide_images" value="0" <?php echo isset($this->vars['HIDE_IMAGES_NO']) ? $this->vars['HIDE_IMAGES_NO'] : $this->lang('HIDE_IMAGES_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span>
      </td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_PUBLIC_VIEW_EMAIL']) ? $this->vars['L_PUBLIC_VIEW_EMAIL'] : $this->lang('L_PUBLIC_VIEW_EMAIL'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="viewemail" value="1" <?php echo isset($this->vars['VIEW_EMAIL_YES']) ? $this->vars['VIEW_EMAIL_YES'] : $this->lang('VIEW_EMAIL_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="viewemail" value="0" <?php echo isset($this->vars['VIEW_EMAIL_NO']) ? $this->vars['VIEW_EMAIL_NO'] : $this->lang('VIEW_EMAIL_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_HIDE_USER']) ? $this->vars['L_HIDE_USER'] : $this->lang('L_HIDE_USER'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="hideonline" value="1" <?php echo isset($this->vars['HIDE_USER_YES']) ? $this->vars['HIDE_USER_YES'] : $this->lang('HIDE_USER_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="hideonline" value="0" <?php echo isset($this->vars['HIDE_USER_NO']) ? $this->vars['HIDE_USER_NO'] : $this->lang('HIDE_USER_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_BIRTHDAY_DISPLAY']) ? $this->vars['L_BIRTHDAY_DISPLAY'] : $this->lang('L_BIRTHDAY_DISPLAY'); ?>:</span></td>
	  <td class="row2"><span class="gen">
	    <select name="birthday_display">
	      <option value="<?php echo isset($this->vars['BIRTHDAY_ALL']) ? $this->vars['BIRTHDAY_ALL'] : $this->lang('BIRTHDAY_ALL'); ?>"<?php echo isset($this->vars['BIRTHDAY_ALL_SELECTED']) ? $this->vars['BIRTHDAY_ALL_SELECTED'] : $this->lang('BIRTHDAY_ALL_SELECTED'); ?>><?php echo isset($this->vars['L_BIRTHDAY_ALL']) ? $this->vars['L_BIRTHDAY_ALL'] : $this->lang('L_BIRTHDAY_ALL'); ?></option>
	      <option value="<?php echo isset($this->vars['BIRTHDAY_DATE']) ? $this->vars['BIRTHDAY_DATE'] : $this->lang('BIRTHDAY_DATE'); ?>"<?php echo isset($this->vars['BIRTHDAY_DATE_SELECTED']) ? $this->vars['BIRTHDAY_DATE_SELECTED'] : $this->lang('BIRTHDAY_DATE_SELECTED'); ?>><?php echo isset($this->vars['L_BIRTHDAY_YEAR']) ? $this->vars['L_BIRTHDAY_YEAR'] : $this->lang('L_BIRTHDAY_YEAR'); ?></option>
	      <option value="<?php echo isset($this->vars['BIRTHDAY_AGE']) ? $this->vars['BIRTHDAY_AGE'] : $this->lang('BIRTHDAY_AGE'); ?>"<?php echo isset($this->vars['BIRTHDAY_AGE_SELECTED']) ? $this->vars['BIRTHDAY_AGE_SELECTED'] : $this->lang('BIRTHDAY_AGE_SELECTED'); ?>><?php echo isset($this->vars['L_BIRTHDAY_AGE']) ? $this->vars['L_BIRTHDAY_AGE'] : $this->lang('L_BIRTHDAY_AGE'); ?></option>
	      <option value="<?php echo isset($this->vars['BIRTHDAY_NONE']) ? $this->vars['BIRTHDAY_NONE'] : $this->lang('BIRTHDAY_NONE'); ?>"<?php echo isset($this->vars['BIRTHDAY_NONE_SELECTED']) ? $this->vars['BIRTHDAY_NONE_SELECTED'] : $this->lang('BIRTHDAY_NONE_SELECTED'); ?>><?php echo isset($this->vars['L_BIRTHDAY_NONE']) ? $this->vars['L_BIRTHDAY_NONE'] : $this->lang('L_BIRTHDAY_NONE'); ?></option>
	    </select>
	  </td>
	</tr>
	<?php

$birthdays_greeting_count = ( isset($this->_tpldata['birthdays_greeting.']) ) ?  sizeof($this->_tpldata['birthdays_greeting.']) : 0;
for ($birthdays_greeting_i = 0; $birthdays_greeting_i < $birthdays_greeting_count; $birthdays_greeting_i++)
{
 $birthdays_greeting_item = &$this->_tpldata['birthdays_greeting.'][$birthdays_greeting_i];
 $birthdays_greeting_item['S_ROW_COUNT'] = $birthdays_greeting_i;
 $birthdays_greeting_item['S_NUM_ROWS'] = $birthdays_greeting_count;

?>
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_BDAY_SEND_GREETING']) ? $this->vars['L_BDAY_SEND_GREETING'] : $this->lang('L_BDAY_SEND_GREETING'); ?>:</span><br /><span class="gensmall"><?php echo isset($this->vars['L_BDAY_SEND_GREETING_EXPLAIN']) ? $this->vars['L_BDAY_SEND_GREETING_EXPLAIN'] : $this->lang('L_BDAY_SEND_GREETING_EXPLAIN'); ?></span></td>
	  <td class="row2"><span class="gen">
		  <input type="radio" name="bday_greeting" value="0" <?php echo isset($this->vars['BDAY_NONE_ENABLED']) ? $this->vars['BDAY_NONE_ENABLED'] : $this->lang('BDAY_NONE_ENABLED'); ?> /> <?php echo isset($this->vars['L_NONE']) ? $this->vars['L_NONE'] : $this->lang('L_NONE'); ?>&nbsp;&nbsp;
		  <?php

$birthdays_email_count = ( isset($birthdays_greeting_item['birthdays_email.']) ) ? sizeof($birthdays_greeting_item['birthdays_email.']) : 0;
for ($birthdays_email_i = 0; $birthdays_email_i < $birthdays_email_count; $birthdays_email_i++)
{
 $birthdays_email_item = &$birthdays_greeting_item['birthdays_email.'][$birthdays_email_i];
 $birthdays_email_item['S_ROW_COUNT'] = $birthdays_email_i;
 $birthdays_email_item['S_NUM_ROWS'] = $birthdays_email_count;

?>
		  <input type="radio" name="bday_greeting" value="<?php echo isset($this->vars['BDAY_EMAIL']) ? $this->vars['BDAY_EMAIL'] : $this->lang('BDAY_EMAIL'); ?>" <?php echo isset($this->vars['BDAY_EMAIL_ENABLED']) ? $this->vars['BDAY_EMAIL_ENABLED'] : $this->lang('BDAY_EMAIL_ENABLED'); ?> /> <?php echo isset($this->vars['L_EMAIL']) ? $this->vars['L_EMAIL'] : $this->lang('L_EMAIL'); ?>&nbsp;&nbsp;
		  <?php

} // END birthdays_email

if(isset($birthdays_email_item)) { unset($birthdays_email_item); } 

?>
		  <?php

$birthdays_pm_count = ( isset($birthdays_greeting_item['birthdays_pm.']) ) ? sizeof($birthdays_greeting_item['birthdays_pm.']) : 0;
for ($birthdays_pm_i = 0; $birthdays_pm_i < $birthdays_pm_count; $birthdays_pm_i++)
{
 $birthdays_pm_item = &$birthdays_greeting_item['birthdays_pm.'][$birthdays_pm_i];
 $birthdays_pm_item['S_ROW_COUNT'] = $birthdays_pm_i;
 $birthdays_pm_item['S_NUM_ROWS'] = $birthdays_pm_count;

?>
		  <input type="radio" name="bday_greeting" value="<?php echo isset($this->vars['BDAY_PM']) ? $this->vars['BDAY_PM'] : $this->lang('BDAY_PM'); ?>" <?php echo isset($this->vars['BDAY_PM_ENABLED']) ? $this->vars['BDAY_PM_ENABLED'] : $this->lang('BDAY_PM_ENABLED'); ?> /> <?php echo isset($this->vars['L_PM']) ? $this->vars['L_PM'] : $this->lang('L_PM'); ?>&nbsp;&nbsp;
		  <?php

} // END birthdays_pm

if(isset($birthdays_pm_item)) { unset($birthdays_pm_item); } 

?>
		  <?php

$birthdays_popup_count = ( isset($birthdays_greeting_item['birthdays_popup.']) ) ? sizeof($birthdays_greeting_item['birthdays_popup.']) : 0;
for ($birthdays_popup_i = 0; $birthdays_popup_i < $birthdays_popup_count; $birthdays_popup_i++)
{
 $birthdays_popup_item = &$birthdays_greeting_item['birthdays_popup.'][$birthdays_popup_i];
 $birthdays_popup_item['S_ROW_COUNT'] = $birthdays_popup_i;
 $birthdays_popup_item['S_NUM_ROWS'] = $birthdays_popup_count;

?>
		  <input type="radio" name="bday_greeting" value="<?php echo isset($this->vars['BDAY_POPUP']) ? $this->vars['BDAY_POPUP'] : $this->lang('BDAY_POPUP'); ?>" <?php echo isset($this->vars['BDAY_POPUP_ENABLED']) ? $this->vars['BDAY_POPUP_ENABLED'] : $this->lang('BDAY_POPUP_ENABLED'); ?> /> <?php echo isset($this->vars['L_POPUP']) ? $this->vars['L_POPUP'] : $this->lang('L_POPUP'); ?>&nbsp;&nbsp;
		  <?php

} // END birthdays_popup

if(isset($birthdays_popup_item)) { unset($birthdays_popup_item); } 

?>
	  </span></td>
	</tr>
	<?php

} // END birthdays_greeting

if(isset($birthdays_greeting_item)) { unset($birthdays_greeting_item); } 

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_NOTIFY_ON_REPLY']) ? $this->vars['L_NOTIFY_ON_REPLY'] : $this->lang('L_NOTIFY_ON_REPLY'); ?>:</span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_NOTIFY_ON_REPLY_EXPLAIN']) ? $this->vars['L_NOTIFY_ON_REPLY_EXPLAIN'] : $this->lang('L_NOTIFY_ON_REPLY_EXPLAIN'); ?></span></td>
      <td class="row2">
        <input type="radio" name="notifyreply" value="1" <?php echo isset($this->vars['NOTIFY_REPLY_YES']) ? $this->vars['NOTIFY_REPLY_YES'] : $this->lang('NOTIFY_REPLY_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="notifyreply" value="0" <?php echo isset($this->vars['NOTIFY_REPLY_NO']) ? $this->vars['NOTIFY_REPLY_NO'] : $this->lang('NOTIFY_REPLY_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_NOTIFY_ON_PRIVMSG']) ? $this->vars['L_NOTIFY_ON_PRIVMSG'] : $this->lang('L_NOTIFY_ON_PRIVMSG'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="notifypm" value="1" <?php echo isset($this->vars['NOTIFY_PM_YES']) ? $this->vars['NOTIFY_PM_YES'] : $this->lang('NOTIFY_PM_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="notifypm" value="0" <?php echo isset($this->vars['NOTIFY_PM_NO']) ? $this->vars['NOTIFY_PM_NO'] : $this->lang('NOTIFY_PM_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <!-- Start add - Custom mass PM MOD -->
    <?php

$switch_can_disable_mass_pm_count = ( isset($this->_tpldata['switch_can_disable_mass_pm.']) ) ?  sizeof($this->_tpldata['switch_can_disable_mass_pm.']) : 0;
for ($switch_can_disable_mass_pm_i = 0; $switch_can_disable_mass_pm_i < $switch_can_disable_mass_pm_count; $switch_can_disable_mass_pm_i++)
{
 $switch_can_disable_mass_pm_item = &$this->_tpldata['switch_can_disable_mass_pm.'][$switch_can_disable_mass_pm_i];
 $switch_can_disable_mass_pm_item['S_ROW_COUNT'] = $switch_can_disable_mass_pm_i;
 $switch_can_disable_mass_pm_item['S_NUM_ROWS'] = $switch_can_disable_mass_pm_count;

?>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ENABLE_MASS_PM']) ? $this->vars['L_ENABLE_MASS_PM'] : $this->lang('L_ENABLE_MASS_PM'); ?>:</span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_ENABLE_MASS_PM_EXPLAIN']) ? $this->vars['L_ENABLE_MASS_PM_EXPLAIN'] : $this->lang('L_ENABLE_MASS_PM_EXPLAIN'); ?></span></td>
        <td class="row2">
        <input type="radio" name="allow_mass_pm" value="4" <?php echo isset($this->vars['ALLOW_MASS_PM_NOTIFY_CHECKED']) ? $this->vars['ALLOW_MASS_PM_NOTIFY_CHECKED'] : $this->lang('ALLOW_MASS_PM_NOTIFY_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="allow_mass_pm" value="2" <?php echo isset($this->vars['ALLOW_MASS_PM_CHECKED']) ? $this->vars['ALLOW_MASS_PM_CHECKED'] : $this->lang('ALLOW_MASS_PM_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="allow_mass_pm" value="0" <?php echo isset($this->vars['DISABLE_MASS_PM_CHECKED']) ? $this->vars['DISABLE_MASS_PM_CHECKED'] : $this->lang('DISABLE_MASS_PM_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_NO_MASS_PM']) ? $this->vars['L_NO_MASS_PM'] : $this->lang('L_NO_MASS_PM'); ?></span></td>
    </tr>
    <?php

} // END switch_can_disable_mass_pm

if(isset($switch_can_disable_mass_pm_item)) { unset($switch_can_disable_mass_pm_item); } 

?>

    <?php

$switch_can_not_disable_mass_pm_count = ( isset($this->_tpldata['switch_can_not_disable_mass_pm.']) ) ?  sizeof($this->_tpldata['switch_can_not_disable_mass_pm.']) : 0;
for ($switch_can_not_disable_mass_pm_i = 0; $switch_can_not_disable_mass_pm_i < $switch_can_not_disable_mass_pm_count; $switch_can_not_disable_mass_pm_i++)
{
 $switch_can_not_disable_mass_pm_item = &$this->_tpldata['switch_can_not_disable_mass_pm.'][$switch_can_not_disable_mass_pm_i];
 $switch_can_not_disable_mass_pm_item['S_ROW_COUNT'] = $switch_can_not_disable_mass_pm_i;
 $switch_can_not_disable_mass_pm_item['S_NUM_ROWS'] = $switch_can_not_disable_mass_pm_count;

?>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ENABLE_MASS_PM']) ? $this->vars['L_ENABLE_MASS_PM'] : $this->lang('L_ENABLE_MASS_PM'); ?>:</span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_ENABLE_MASS_PM_EXPLAIN']) ? $this->vars['L_ENABLE_MASS_PM_EXPLAIN'] : $this->lang('L_ENABLE_MASS_PM_EXPLAIN'); ?></span></td>
        <td class="row2">
        <input type="radio" name="allow_mass_pm" value="4" <?php echo isset($this->vars['ALLOW_MASS_PM_NOTIFY_CHECKED']) ? $this->vars['ALLOW_MASS_PM_NOTIFY_CHECKED'] : $this->lang('ALLOW_MASS_PM_NOTIFY_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="allow_mass_pm" value="2" <?php echo isset($this->vars['ALLOW_MASS_PM_CHECKED']) ? $this->vars['ALLOW_MASS_PM_CHECKED'] : $this->lang('ALLOW_MASS_PM_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <?php

} // END switch_can_not_disable_mass_pm

if(isset($switch_can_not_disable_mass_pm_item)) { unset($switch_can_not_disable_mass_pm_item); } 

?>
    <!-- End add - Custom mass PM MOD -->
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_POPUP_ON_PRIVMSG']) ? $this->vars['L_POPUP_ON_PRIVMSG'] : $this->lang('L_POPUP_ON_PRIVMSG'); ?>:</span><br /><span class="gensmall"><?php echo isset($this->vars['L_POPUP_ON_PRIVMSG_EXPLAIN']) ? $this->vars['L_POPUP_ON_PRIVMSG_EXPLAIN'] : $this->lang('L_POPUP_ON_PRIVMSG_EXPLAIN'); ?></span></td>
      <td class="row2">
        <input type="radio" name="popup_pm" value="1" <?php echo isset($this->vars['POPUP_PM_YES']) ? $this->vars['POPUP_PM_YES'] : $this->lang('POPUP_PM_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="popup_pm" value="0" <?php echo isset($this->vars['POPUP_PM_NO']) ? $this->vars['POPUP_PM_NO'] : $this->lang('POPUP_PM_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ALWAYS_ADD_SIGNATURE']) ? $this->vars['L_ALWAYS_ADD_SIGNATURE'] : $this->lang('L_ALWAYS_ADD_SIGNATURE'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="attachsig" value="1" <?php echo isset($this->vars['ALWAYS_ADD_SIGNATURE_YES']) ? $this->vars['ALWAYS_ADD_SIGNATURE_YES'] : $this->lang('ALWAYS_ADD_SIGNATURE_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="attachsig" value="0" <?php echo isset($this->vars['ALWAYS_ADD_SIGNATURE_NO']) ? $this->vars['ALWAYS_ADD_SIGNATURE_NO'] : $this->lang('ALWAYS_ADD_SIGNATURE_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ALWAYS_ALLOW_BBCODE']) ? $this->vars['L_ALWAYS_ALLOW_BBCODE'] : $this->lang('L_ALWAYS_ALLOW_BBCODE'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="allowbbcode" value="1" <?php echo isset($this->vars['ALWAYS_ALLOW_BBCODE_YES']) ? $this->vars['ALWAYS_ALLOW_BBCODE_YES'] : $this->lang('ALWAYS_ALLOW_BBCODE_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="allowbbcode" value="0" <?php echo isset($this->vars['ALWAYS_ALLOW_BBCODE_NO']) ? $this->vars['ALWAYS_ALLOW_BBCODE_NO'] : $this->lang('ALWAYS_ALLOW_BBCODE_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ALWAYS_ALLOW_HTML']) ? $this->vars['L_ALWAYS_ALLOW_HTML'] : $this->lang('L_ALWAYS_ALLOW_HTML'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="allowhtml" value="1" <?php echo isset($this->vars['ALWAYS_ALLOW_HTML_YES']) ? $this->vars['ALWAYS_ALLOW_HTML_YES'] : $this->lang('ALWAYS_ALLOW_HTML_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="allowhtml" value="0" <?php echo isset($this->vars['ALWAYS_ALLOW_HTML_NO']) ? $this->vars['ALWAYS_ALLOW_HTML_NO'] : $this->lang('ALWAYS_ALLOW_HTML_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
	<?php

$birthday_optional_count = ( isset($this->_tpldata['birthday_optional.']) ) ?  sizeof($this->_tpldata['birthday_optional.']) : 0;
for ($birthday_optional_i = 0; $birthday_optional_i < $birthday_optional_count; $birthday_optional_i++)
{
 $birthday_optional_item = &$this->_tpldata['birthday_optional.'][$birthday_optional_i];
 $birthday_optional_item['S_ROW_COUNT'] = $birthday_optional_i;
 $birthday_optional_item['S_NUM_ROWS'] = $birthday_optional_count;

?>
	<tr>
	  <td class="row1"><span class="gen"><?php echo isset($this->vars['L_BIRTHDAY']) ? $this->vars['L_BIRTHDAY'] : $this->lang('L_BIRTHDAY'); ?>:</span></td>
	  <td class="row2"><?php echo isset($this->vars['BIRTHDAY_INTERFACE']) ? $this->vars['BIRTHDAY_INTERFACE'] : $this->lang('BIRTHDAY_INTERFACE'); ?></td>
	</tr>
	<?php

} // END birthday_optional

if(isset($birthday_optional_item)) { unset($birthday_optional_item); } 

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_ALWAYS_ALLOW_SMILIES']) ? $this->vars['L_ALWAYS_ALLOW_SMILIES'] : $this->lang('L_ALWAYS_ALLOW_SMILIES'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="allowsmilies" value="1" <?php echo isset($this->vars['ALWAYS_ALLOW_SMILIES_YES']) ? $this->vars['ALWAYS_ALLOW_SMILIES_YES'] : $this->lang('ALWAYS_ALLOW_SMILIES_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="allowsmilies" value="0" <?php echo isset($this->vars['ALWAYS_ALLOW_SMILIES_NO']) ? $this->vars['ALWAYS_ALLOW_SMILIES_NO'] : $this->lang('ALWAYS_ALLOW_SMILIES_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_SHOW_AVATARS']) ? $this->vars['L_SHOW_AVATARS'] : $this->lang('L_SHOW_AVATARS'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="showavatars" value="1" <?php echo isset($this->vars['SHOW_AVATARS_YES']) ? $this->vars['SHOW_AVATARS_YES'] : $this->lang('SHOW_AVATARS_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>
        <input type="radio" name="showavatars" value="0" <?php echo isset($this->vars['SHOW_AVATARS_NO']) ? $this->vars['SHOW_AVATARS_NO'] : $this->lang('SHOW_AVATARS_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_SHOW_SIGNATURES']) ? $this->vars['L_SHOW_SIGNATURES'] : $this->lang('L_SHOW_SIGNATURES'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="showsignatures" value="1" <?php echo isset($this->vars['SHOW_SIGNATURES_YES']) ? $this->vars['SHOW_SIGNATURES_YES'] : $this->lang('SHOW_SIGNATURES_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>
        <input type="radio" name="showsignatures" value="0" <?php echo isset($this->vars['SHOW_SIGNATURES_NO']) ? $this->vars['SHOW_SIGNATURES_NO'] : $this->lang('SHOW_SIGNATURES_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_NEWSLETTER']) ? $this->vars['L_NEWSLETTER'] : $this->lang('L_NEWSLETTER'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="newsletter" value="1" <?php echo isset($this->vars['NEWSLETTER_YES']) ? $this->vars['NEWSLETTER_YES'] : $this->lang('NEWSLETTER_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="newsletter" value="0" <?php echo isset($this->vars['NEWSLETTER_NO']) ? $this->vars['NEWSLETTER_NO'] : $this->lang('NEWSLETTER_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <?php

$force_word_wrapping_count = ( isset($this->_tpldata['force_word_wrapping.']) ) ?  sizeof($this->_tpldata['force_word_wrapping.']) : 0;
for ($force_word_wrapping_i = 0; $force_word_wrapping_i < $force_word_wrapping_count; $force_word_wrapping_i++)
{
 $force_word_wrapping_item = &$this->_tpldata['force_word_wrapping.'][$force_word_wrapping_i];
 $force_word_wrapping_item['S_ROW_COUNT'] = $force_word_wrapping_i;
 $force_word_wrapping_item['S_NUM_ROWS'] = $force_word_wrapping_count;

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_WORD_WRAP']) ? $this->vars['L_WORD_WRAP'] : $this->lang('L_WORD_WRAP'); ?>:</span><br /><span class="gensmall"><?php echo isset($this->vars['L_WORD_WRAP_EXPLAIN']) ? $this->vars['L_WORD_WRAP_EXPLAIN'] : $this->lang('L_WORD_WRAP_EXPLAIN'); ?></span></td>
      <td class="row2"><span class="gensmall"><input type="text" name="user_wordwrap" value="<?php echo isset($this->vars['WRAP_ROW']) ? $this->vars['WRAP_ROW'] : $this->lang('WRAP_ROW'); ?>" size="2" maxlength="2" class="post" /> <?php echo isset($this->vars['L_WORD_WRAP_EXTRA']) ? $this->vars['L_WORD_WRAP_EXTRA'] : $this->lang('L_WORD_WRAP_EXTRA'); ?></span></td>
    </tr>
    <?php

} // END force_word_wrapping

if(isset($force_word_wrapping_item)) { unset($force_word_wrapping_item); } 

?>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_BOARD_LANGUAGE']) ? $this->vars['L_BOARD_LANGUAGE'] : $this->lang('L_BOARD_LANGUAGE'); ?>:</span></td>
      <td class="row2"><span class="gensmall"><?php echo isset($this->vars['LANGUAGE_SELECT']) ? $this->vars['LANGUAGE_SELECT'] : $this->lang('LANGUAGE_SELECT'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_BOARD_STYLE']) ? $this->vars['L_BOARD_STYLE'] : $this->lang('L_BOARD_STYLE'); ?>:</span></td>
      <td class="row2"><span class="gensmall"><?php echo isset($this->vars['STYLE_SELECT']) ? $this->vars['STYLE_SELECT'] : $this->lang('STYLE_SELECT'); ?></span></td>
    </tr>
        <!-- Start replacement - Advanced time management MOD -->
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_TIME_MODE']) ? $this->vars['L_TIME_MODE'] : $this->lang('L_TIME_MODE'); ?>:</span><br />
            <span class="gensmall"><?php echo isset($this->vars['L_TIME_MODE_TEXT']) ? $this->vars['L_TIME_MODE_TEXT'] : $this->lang('L_TIME_MODE_TEXT'); ?></span></td>
        <td class="row2">
            <span class="gen"><?php echo isset($this->vars['L_TIME_MODE_AUTO']) ? $this->vars['L_TIME_MODE_AUTO'] : $this->lang('L_TIME_MODE_AUTO'); ?></span><br />
            <input type="radio" name="time_mode" value="6" <?php echo isset($this->vars['TIME_MODE_FULL_PC_CHECKED']) ? $this->vars['TIME_MODE_FULL_PC_CHECKED'] : $this->lang('TIME_MODE_FULL_PC_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_TIME_MODE_FULL_PC']) ? $this->vars['L_TIME_MODE_FULL_PC'] : $this->lang('L_TIME_MODE_FULL_PC'); ?></span>&nbsp;&nbsp;<br />
            <input type="radio" name="time_mode" value="4" <?php echo isset($this->vars['TIME_MODE_SERVER_PC_CHECKED']) ? $this->vars['TIME_MODE_SERVER_PC_CHECKED'] : $this->lang('TIME_MODE_SERVER_PC_CHECKED'); ?>/>
        <span class="gen"><?php echo isset($this->vars['L_TIME_MODE_SERVER_PC']) ? $this->vars['L_TIME_MODE_SERVER_PC'] : $this->lang('L_TIME_MODE_SERVER_PC'); ?></span>&nbsp;&nbsp;<br />
            <input type="radio" name="time_mode" value="3" <?php echo isset($this->vars['TIME_MODE_FULL_SERVER_CHECKED']) ? $this->vars['TIME_MODE_FULL_SERVER_CHECKED'] : $this->lang('TIME_MODE_FULL_SERVER_CHECKED'); ?>/>
            <span class="gen"><?php echo isset($this->vars['L_TIME_MODE_FULL_SERVER']) ? $this->vars['L_TIME_MODE_FULL_SERVER'] : $this->lang('L_TIME_MODE_FULL_SERVER'); ?></span>
            <br /><br />
            <span class="gen"><?php echo isset($this->vars['L_TIME_MODE_MANUAL']) ? $this->vars['L_TIME_MODE_MANUAL'] : $this->lang('L_TIME_MODE_MANUAL'); ?></span><br />
        <span class="gen">&nbsp;&nbsp;<?php echo isset($this->vars['L_TIME_MODE_DST']) ? $this->vars['L_TIME_MODE_DST'] : $this->lang('L_TIME_MODE_DST'); ?>:</span><input type="radio" name="time_mode" value="1" <?php echo isset($this->vars['TIME_MODE_MANUAL_DST_CHECKED']) ? $this->vars['TIME_MODE_MANUAL_DST_CHECKED'] : $this->lang('TIME_MODE_MANUAL_DST_CHECKED'); ?>/><span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?><?php echo isset($this->vars['L_TIME_MODE_DST_ON']) ? $this->vars['L_TIME_MODE_DST_ON'] : $this->lang('L_TIME_MODE_DST_ON'); ?></span>&nbsp;<input type="radio" name="time_mode" value="0" <?php echo isset($this->vars['TIME_MODE_MANUAL_CHECKED']) ? $this->vars['TIME_MODE_MANUAL_CHECKED'] : $this->lang('TIME_MODE_MANUAL_CHECKED'); ?>/><span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?><?php echo isset($this->vars['L_TIME_MODE_DST_OFF']) ? $this->vars['L_TIME_MODE_DST_OFF'] : $this->lang('L_TIME_MODE_DST_OFF'); ?></span>&nbsp;<input type="radio" name="time_mode" value="2" <?php echo isset($this->vars['TIME_MODE_SERVER_SWITCH_CHECKED']) ? $this->vars['TIME_MODE_SERVER_SWITCH_CHECKED'] : $this->lang('TIME_MODE_SERVER_SWITCH_CHECKED'); ?>/><span class="gen"><?php echo isset($this->vars['L_TIME_MODE_DST_SERVER']) ? $this->vars['L_TIME_MODE_DST_SERVER'] : $this->lang('L_TIME_MODE_DST_SERVER'); ?></span><br />
        <span class="gen">&nbsp;&nbsp;<?php echo isset($this->vars['L_TIME_MODE_DST_TIME_LAG']) ? $this->vars['L_TIME_MODE_DST_TIME_LAG'] : $this->lang('L_TIME_MODE_DST_TIME_LAG'); ?>: </span><input type="text" name="dst_time_lag" value="<?php echo isset($this->vars['DST_TIME_LAG']) ? $this->vars['DST_TIME_LAG'] : $this->lang('DST_TIME_LAG'); ?>" maxlength="3" size="3" class="post" /><span class="gen"><?php echo isset($this->vars['L_TIME_MODE_DST_MN']) ? $this->vars['L_TIME_MODE_DST_MN'] : $this->lang('L_TIME_MODE_DST_MN'); ?></span><br />
        <span class="gen">&nbsp;&nbsp;<?php echo isset($this->vars['L_TIME_MODE_TIMEZONE']) ? $this->vars['L_TIME_MODE_TIMEZONE'] : $this->lang('L_TIME_MODE_TIMEZONE'); ?>: </span><span class="gensmall"><?php echo isset($this->vars['TIMEZONE_SELECT']) ? $this->vars['TIMEZONE_SELECT'] : $this->lang('TIMEZONE_SELECT'); ?></span></td>
    </tr>
        <!-- End replacement - Advanced time management MOD -->
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_DATE_FORMAT']) ? $this->vars['L_DATE_FORMAT'] : $this->lang('L_DATE_FORMAT'); ?>:</span><br />
        <span class="gensmall"><?php echo isset($this->vars['L_DATE_FORMAT_EXPLAIN']) ? $this->vars['L_DATE_FORMAT_EXPLAIN'] : $this->lang('L_DATE_FORMAT_EXPLAIN'); ?></span></td>
      <td class="row2">
        <input type="text" name="dateformat" value="<?php echo isset($this->vars['DATE_FORMAT']) ? $this->vars['DATE_FORMAT'] : $this->lang('DATE_FORMAT'); ?>" maxlength="14" class="post" />
      </td>
    </tr>
    <tr>
      <td class="catSides" colspan="2"><span class="cattitle">&nbsp;</span></td>
    </tr>
    <tr>
      <th class="thSides" colspan="2" height="12" valign="middle"><?php echo isset($this->vars['L_QUICK_REPLY_PANEL']) ? $this->vars['L_QUICK_REPLY_PANEL'] : $this->lang('L_QUICK_REPLY_PANEL'); ?></th>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_SHOW_QUICK_REPLY']) ? $this->vars['L_SHOW_QUICK_REPLY'] : $this->lang('L_SHOW_QUICK_REPLY'); ?>:</span></td>
      <td class="row2"><?php echo isset($this->vars['QUICK_REPLY_SELECT']) ? $this->vars['QUICK_REPLY_SELECT'] : $this->lang('QUICK_REPLY_SELECT'); ?></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_QUICK_REPLY_MODE']) ? $this->vars['L_QUICK_REPLY_MODE'] : $this->lang('L_QUICK_REPLY_MODE'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="quickreply_mode" value="0" <?php echo isset($this->vars['QUICK_REPLY_MODE_BASIC']) ? $this->vars['QUICK_REPLY_MODE_BASIC'] : $this->lang('QUICK_REPLY_MODE_BASIC'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_QUICK_REPLY_MODE_BASIC']) ? $this->vars['L_QUICK_REPLY_MODE_BASIC'] : $this->lang('L_QUICK_REPLY_MODE_BASIC'); ?></span>&nbsp;&nbsp;
        <input type="radio" name="quickreply_mode" value="1" <?php echo isset($this->vars['QUICK_REPLY_MODE_ADVANCED']) ? $this->vars['QUICK_REPLY_MODE_ADVANCED'] : $this->lang('QUICK_REPLY_MODE_ADVANCED'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_QUICK_REPLY_MODE_ADVANCED']) ? $this->vars['L_QUICK_REPLY_MODE_ADVANCED'] : $this->lang('L_QUICK_REPLY_MODE_ADVANCED'); ?></span></td>
    </tr>
    <tr>
      <td class="row1"><span class="gen"><?php echo isset($this->vars['L_OPEN_QUICK_REPLY']) ? $this->vars['L_OPEN_QUICK_REPLY'] : $this->lang('L_OPEN_QUICK_REPLY'); ?>:</span></td>
      <td class="row2">
        <input type="radio" name="open_quickreply" value="1" <?php echo isset($this->vars['OPEN_QUICK_REPLY_YES']) ? $this->vars['OPEN_QUICK_REPLY_YES'] : $this->lang('OPEN_QUICK_REPLY_YES'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?></span>
        <input type="radio" name="open_quickreply" value="0" <?php echo isset($this->vars['OPEN_QUICK_REPLY_NO']) ? $this->vars['OPEN_QUICK_REPLY_NO'] : $this->lang('OPEN_QUICK_REPLY_NO'); ?> />
        <span class="gen"><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></span></td>
    </tr>
    <?php

$switch_avatar_block_count = ( isset($this->_tpldata['switch_avatar_block.']) ) ?  sizeof($this->_tpldata['switch_avatar_block.']) : 0;
for ($switch_avatar_block_i = 0; $switch_avatar_block_i < $switch_avatar_block_count; $switch_avatar_block_i++)
{
 $switch_avatar_block_item = &$this->_tpldata['switch_avatar_block.'][$switch_avatar_block_i];
 $switch_avatar_block_item['S_ROW_COUNT'] = $switch_avatar_block_i;
 $switch_avatar_block_item['S_NUM_ROWS'] = $switch_avatar_block_count;

?>
    <tr>
      <td class="catSides" colspan="2" height="28">&nbsp;</td>
    </tr>
    <tr>
      <th class="thSides" colspan="2" height="12" valign="middle"><?php echo isset($this->vars['L_AVATAR_PANEL']) ? $this->vars['L_AVATAR_PANEL'] : $this->lang('L_AVATAR_PANEL'); ?></th>
    </tr>
    <tr>
        <td class="row1" colspan="2"><table width="70%" cellspacing="2" cellpadding="0" border="0" align="center">
            <tr>
                <td width="65%"><span class="gensmall"><?php echo isset($this->vars['L_AVATAR_EXPLAIN']) ? $this->vars['L_AVATAR_EXPLAIN'] : $this->lang('L_AVATAR_EXPLAIN'); ?></span></td>
                <td align="center"><span class="gensmall"><?php echo isset($this->vars['L_CURRENT_IMAGE']) ? $this->vars['L_CURRENT_IMAGE'] : $this->lang('L_CURRENT_IMAGE'); ?></span><br /><?php echo isset($this->vars['AVATAR']) ? $this->vars['AVATAR'] : $this->lang('AVATAR'); ?><br /><input type="checkbox" name="avatardel" />&nbsp;<span class="gensmall"><?php echo isset($this->vars['L_DELETE_AVATAR']) ? $this->vars['L_DELETE_AVATAR'] : $this->lang('L_DELETE_AVATAR'); ?></span></td>
            </tr>
        </table></td>
    </tr>
    <?php

$switch_avatar_local_upload_count = ( isset($switch_avatar_block_item['switch_avatar_local_upload.']) ) ? sizeof($switch_avatar_block_item['switch_avatar_local_upload.']) : 0;
for ($switch_avatar_local_upload_i = 0; $switch_avatar_local_upload_i < $switch_avatar_local_upload_count; $switch_avatar_local_upload_i++)
{
 $switch_avatar_local_upload_item = &$switch_avatar_block_item['switch_avatar_local_upload.'][$switch_avatar_local_upload_i];
 $switch_avatar_local_upload_item['S_ROW_COUNT'] = $switch_avatar_local_upload_i;
 $switch_avatar_local_upload_item['S_NUM_ROWS'] = $switch_avatar_local_upload_count;

?>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_UPLOAD_AVATAR_FILE']) ? $this->vars['L_UPLOAD_AVATAR_FILE'] : $this->lang('L_UPLOAD_AVATAR_FILE'); ?>:</span></td>
        <td class="row2"><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo isset($this->vars['AVATAR_SIZE']) ? $this->vars['AVATAR_SIZE'] : $this->lang('AVATAR_SIZE'); ?>" /><input type="file" name="avatar" class="post" style="width:200px" /></td>
    </tr>
    <?php

} // END switch_avatar_local_upload

if(isset($switch_avatar_local_upload_item)) { unset($switch_avatar_local_upload_item); } 

?>
    <?php

$switch_avatar_remote_upload_count = ( isset($switch_avatar_block_item['switch_avatar_remote_upload.']) ) ? sizeof($switch_avatar_block_item['switch_avatar_remote_upload.']) : 0;
for ($switch_avatar_remote_upload_i = 0; $switch_avatar_remote_upload_i < $switch_avatar_remote_upload_count; $switch_avatar_remote_upload_i++)
{
 $switch_avatar_remote_upload_item = &$switch_avatar_block_item['switch_avatar_remote_upload.'][$switch_avatar_remote_upload_i];
 $switch_avatar_remote_upload_item['S_ROW_COUNT'] = $switch_avatar_remote_upload_i;
 $switch_avatar_remote_upload_item['S_NUM_ROWS'] = $switch_avatar_remote_upload_count;

?>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_UPLOAD_AVATAR_URL']) ? $this->vars['L_UPLOAD_AVATAR_URL'] : $this->lang('L_UPLOAD_AVATAR_URL'); ?>:</span><br /><span class="gensmall"><?php echo isset($this->vars['L_UPLOAD_AVATAR_URL_EXPLAIN']) ? $this->vars['L_UPLOAD_AVATAR_URL_EXPLAIN'] : $this->lang('L_UPLOAD_AVATAR_URL_EXPLAIN'); ?></span></td>
        <td class="row2"><input type="text" name="avatarurl" size="40" class="post" style="width:200px" /></td>
    </tr>
    <?php

} // END switch_avatar_remote_upload

if(isset($switch_avatar_remote_upload_item)) { unset($switch_avatar_remote_upload_item); } 

?>
    <?php

$switch_avatar_remote_link_count = ( isset($switch_avatar_block_item['switch_avatar_remote_link.']) ) ? sizeof($switch_avatar_block_item['switch_avatar_remote_link.']) : 0;
for ($switch_avatar_remote_link_i = 0; $switch_avatar_remote_link_i < $switch_avatar_remote_link_count; $switch_avatar_remote_link_i++)
{
 $switch_avatar_remote_link_item = &$switch_avatar_block_item['switch_avatar_remote_link.'][$switch_avatar_remote_link_i];
 $switch_avatar_remote_link_item['S_ROW_COUNT'] = $switch_avatar_remote_link_i;
 $switch_avatar_remote_link_item['S_NUM_ROWS'] = $switch_avatar_remote_link_count;

?>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_LINK_REMOTE_AVATAR']) ? $this->vars['L_LINK_REMOTE_AVATAR'] : $this->lang('L_LINK_REMOTE_AVATAR'); ?>:</span><br /><span class="gensmall"><?php echo isset($this->vars['L_LINK_REMOTE_AVATAR_EXPLAIN']) ? $this->vars['L_LINK_REMOTE_AVATAR_EXPLAIN'] : $this->lang('L_LINK_REMOTE_AVATAR_EXPLAIN'); ?></span></td>
        <td class="row2"><input type="text" name="avatarremoteurl" size="40" class="post" style="width:200px" /></td>
    </tr>
    <?php

} // END switch_avatar_remote_link

if(isset($switch_avatar_remote_link_item)) { unset($switch_avatar_remote_link_item); } 

?>
    <?php

$switch_avatar_local_gallery_count = ( isset($switch_avatar_block_item['switch_avatar_local_gallery.']) ) ? sizeof($switch_avatar_block_item['switch_avatar_local_gallery.']) : 0;
for ($switch_avatar_local_gallery_i = 0; $switch_avatar_local_gallery_i < $switch_avatar_local_gallery_count; $switch_avatar_local_gallery_i++)
{
 $switch_avatar_local_gallery_item = &$switch_avatar_block_item['switch_avatar_local_gallery.'][$switch_avatar_local_gallery_i];
 $switch_avatar_local_gallery_item['S_ROW_COUNT'] = $switch_avatar_local_gallery_i;
 $switch_avatar_local_gallery_item['S_NUM_ROWS'] = $switch_avatar_local_gallery_count;

?>
    <tr>
        <td class="row1"><span class="gen"><?php echo isset($this->vars['L_AVATAR_GALLERY']) ? $this->vars['L_AVATAR_GALLERY'] : $this->lang('L_AVATAR_GALLERY'); ?>:</span></td>
        <td class="row2"><input type="submit" name="avatargallery" value="<?php echo isset($this->vars['L_SHOW_GALLERY']) ? $this->vars['L_SHOW_GALLERY'] : $this->lang('L_SHOW_GALLERY'); ?>" class="liteoption" /></td>
    </tr>
    <?php

} // END switch_avatar_local_gallery

if(isset($switch_avatar_local_gallery_item)) { unset($switch_avatar_local_gallery_item); } 

?>
    <?php

} // END switch_avatar_block

if(isset($switch_avatar_block_item)) { unset($switch_avatar_block_item); } 

?>
    <tr>
        <td class="catBottom" colspan="2" align="center" height="28"><?php echo isset($this->vars['S_HIDDEN_FIELDS']) ? $this->vars['S_HIDDEN_FIELDS'] : $this->lang('S_HIDDEN_FIELDS'); ?><input type="submit" name="submit" value="<?php echo isset($this->vars['L_SUBMIT']) ? $this->vars['L_SUBMIT'] : $this->lang('L_SUBMIT'); ?>" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="<?php echo isset($this->vars['L_RESET']) ? $this->vars['L_RESET'] : $this->lang('L_RESET'); ?>" name="reset" class="liteoption" /></td>
    </tr>
</table>

</form>