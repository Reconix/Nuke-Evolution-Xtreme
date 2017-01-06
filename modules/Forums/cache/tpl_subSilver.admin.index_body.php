<?php

// eXtreme Styles mod cache. Generated on Tue, 29 Apr 2014 22:41:45 -0600 (time=1398832905)

?><h1><?php echo isset($this->vars['L_WELCOME']) ? $this->vars['L_WELCOME'] : $this->lang('L_WELCOME'); ?></h1>

<p><?php echo isset($this->vars['L_ADMIN_INTRO']) ? $this->vars['L_ADMIN_INTRO'] : $this->lang('L_ADMIN_INTRO'); ?></p>
<h1><?php echo isset($this->vars['L_FORUM_STATS']) ? $this->vars['L_FORUM_STATS'] : $this->lang('L_FORUM_STATS'); ?></h1>

<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
  <tr>
    <th width="25%" nowrap height="25" class="thCornerL" colspan="3"><?php echo isset($this->vars['L_STATISTIC']) ? $this->vars['L_STATISTIC'] : $this->lang('L_STATISTIC'); ?></th>
    <th width="25%" height="25" class="thTop"><?php echo isset($this->vars['L_VALUE']) ? $this->vars['L_VALUE'] : $this->lang('L_VALUE'); ?></th>
    <th width="25%" nowrap height="25" class="thTop"><?php echo isset($this->vars['L_STATISTIC']) ? $this->vars['L_STATISTIC'] : $this->lang('L_STATISTIC'); ?></th>
    <th width="25%" height="25" class="thCornerR"><?php echo isset($this->vars['L_VALUE']) ? $this->vars['L_VALUE'] : $this->lang('L_VALUE'); ?></th>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_ADMIN_IP_LOCK']) ? $this->vars['L_ADMIN_IP_LOCK'] : $this->lang('L_ADMIN_IP_LOCK'); ?>:</td>
    <td class="row2" colspan="3"><img src="<?php echo isset($this->vars['ADMIN_IP_LOCK_IMAGE']) ? $this->vars['ADMIN_IP_LOCK_IMAGE'] : $this->lang('ADMIN_IP_LOCK_IMAGE'); ?>" alt='' width='10' height='10' />&nbsp;<?php echo isset($this->vars['ADMIN_IP_LOCK_ED']) ? $this->vars['ADMIN_IP_LOCK_ED'] : $this->lang('ADMIN_IP_LOCK_ED'); ?></td>
  </tr>
  <tr>
     <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_PHPBB_VERSION']) ? $this->vars['L_PHPBB_VERSION'] : $this->lang('L_PHPBB_VERSION'); ?>:</td>
    <td class="row2" colspan="3"><strong><?php echo isset($this->vars['VERSION_INFO']) ? $this->vars['VERSION_INFO'] : $this->lang('VERSION_INFO'); ?></strong></td>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_PHP_VERSION']) ? $this->vars['L_PHP_VERSION'] : $this->lang('L_PHP_VERSION'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['PHP_VERSION']) ? $this->vars['PHP_VERSION'] : $this->lang('PHP_VERSION'); ?></strong></td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_MYSQL_VERSION']) ? $this->vars['L_MYSQL_VERSION'] : $this->lang('L_MYSQL_VERSION'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['MYSQL_VERSION']) ? $this->vars['MYSQL_VERSION'] : $this->lang('MYSQL_VERSION'); ?></strong></td>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_BOARD_STARTED']) ? $this->vars['L_BOARD_STARTED'] : $this->lang('L_BOARD_STARTED'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['START_DATE']) ? $this->vars['START_DATE'] : $this->lang('START_DATE'); ?></strong></td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_AVATAR_DIR_SIZE']) ? $this->vars['L_AVATAR_DIR_SIZE'] : $this->lang('L_AVATAR_DIR_SIZE'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['AVATAR_DIR_SIZE']) ? $this->vars['AVATAR_DIR_SIZE'] : $this->lang('AVATAR_DIR_SIZE'); ?></strong></td>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_DB_SIZE']) ? $this->vars['L_DB_SIZE'] : $this->lang('L_DB_SIZE'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['DB_SIZE']) ? $this->vars['DB_SIZE'] : $this->lang('DB_SIZE'); ?></strong></td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_GZIP_COMPRESSION']) ? $this->vars['L_GZIP_COMPRESSION'] : $this->lang('L_GZIP_COMPRESSION'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['GZIP_COMPRESSION']) ? $this->vars['GZIP_COMPRESSION'] : $this->lang('GZIP_COMPRESSION'); ?></strong></td>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_NUMBER_POSTS']) ? $this->vars['L_NUMBER_POSTS'] : $this->lang('L_NUMBER_POSTS'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['NUMBER_OF_POSTS']) ? $this->vars['NUMBER_OF_POSTS'] : $this->lang('NUMBER_OF_POSTS'); ?></strong></td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_POSTS_PER_DAY']) ? $this->vars['L_POSTS_PER_DAY'] : $this->lang('L_POSTS_PER_DAY'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['POSTS_PER_DAY']) ? $this->vars['POSTS_PER_DAY'] : $this->lang('POSTS_PER_DAY'); ?></strong></td>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_NUMBER_TOPICS']) ? $this->vars['L_NUMBER_TOPICS'] : $this->lang('L_NUMBER_TOPICS'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['NUMBER_OF_TOPICS']) ? $this->vars['NUMBER_OF_TOPICS'] : $this->lang('NUMBER_OF_TOPICS'); ?></strong></td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_TOPICS_PER_DAY']) ? $this->vars['L_TOPICS_PER_DAY'] : $this->lang('L_TOPICS_PER_DAY'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['TOPICS_PER_DAY']) ? $this->vars['TOPICS_PER_DAY'] : $this->lang('TOPICS_PER_DAY'); ?></strong></td>
  </tr>
  <tr>
    <td class="row1" nowrap colspan="3"><?php echo isset($this->vars['L_NUMBER_USERS']) ? $this->vars['L_NUMBER_USERS'] : $this->lang('L_NUMBER_USERS'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['NUMBER_OF_USERS']) ? $this->vars['NUMBER_OF_USERS'] : $this->lang('NUMBER_OF_USERS'); ?></strong></td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_USERS_PER_DAY']) ? $this->vars['L_USERS_PER_DAY'] : $this->lang('L_USERS_PER_DAY'); ?>:</td>
    <td class="row2"><strong><?php echo isset($this->vars['USERS_PER_DAY']) ? $this->vars['USERS_PER_DAY'] : $this->lang('USERS_PER_DAY'); ?></strong></td>
  </tr>
  <tr>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row1" nowrap colspan="2"><?php echo isset($this->vars['L_NUMBER_DEACTIVATED_USERS']) ? $this->vars['L_NUMBER_DEACTIVATED_USERS'] : $this->lang('L_NUMBER_DEACTIVATED_USERS'); ?>:</td>
    <td class="row2" colspan="3"><?php echo isset($this->vars['NUMBER_OF_DEACTIVATED_USERS']) ? $this->vars['NUMBER_OF_DEACTIVATED_USERS'] : $this->lang('NUMBER_OF_DEACTIVATED_USERS'); ?></td>
  </tr>
  <tr>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_NAME_DEACTIVATED_USERS']) ? $this->vars['L_NAME_DEACTIVATED_USERS'] : $this->lang('L_NAME_DEACTIVATED_USERS'); ?>:</td>
    <td class="row2"  colspan="3"><?php echo isset($this->vars['NAMES_OF_DEACTIVATED']) ? $this->vars['NAMES_OF_DEACTIVATED'] : $this->lang('NAMES_OF_DEACTIVATED'); ?></td>
  </tr>
  <tr>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row1" nowrap colspan="2"><?php echo isset($this->vars['L_NUMBER_MODERATORS']) ? $this->vars['L_NUMBER_MODERATORS'] : $this->lang('L_NUMBER_MODERATORS'); ?>:</td>
    <td class="row2" colspan="3"><?php echo isset($this->vars['NUMBER_OF_MODERATORS']) ? $this->vars['NUMBER_OF_MODERATORS'] : $this->lang('NUMBER_OF_MODERATORS'); ?></td>
  </tr>
  <tr>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_NAME_MODERATORS']) ? $this->vars['L_NAME_MODERATORS'] : $this->lang('L_NAME_MODERATORS'); ?>:</td>
    <td class="row2"  colspan="3"><?php echo isset($this->vars['NAMES_OF_MODERATORS']) ? $this->vars['NAMES_OF_MODERATORS'] : $this->lang('NAMES_OF_MODERATORS'); ?></td>
  </tr>
  <tr>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row1" nowrap colspan="2"><?php echo isset($this->vars['L_NUMBER_ADMINISTRATORS']) ? $this->vars['L_NUMBER_ADMINISTRATORS'] : $this->lang('L_NUMBER_ADMINISTRATORS'); ?>:</td>
    <td class="row2"  colspan="3"><?php echo isset($this->vars['NUMBER_OF_ADMINISTRATORS']) ? $this->vars['NUMBER_OF_ADMINISTRATORS'] : $this->lang('NUMBER_OF_ADMINISTRATORS'); ?></td>
  </tr>
  <tr>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row3" nowrap width="10">&nbsp;</td>
    <td class="row1" nowrap><?php echo isset($this->vars['L_NAME_ADMINISTRATORS']) ? $this->vars['L_NAME_ADMINISTRATORS'] : $this->lang('L_NAME_ADMINISTRATORS'); ?>:</td>
    <td class="row2"  colspan="3"><?php echo isset($this->vars['NAMES_OF_ADMINISTRATORS']) ? $this->vars['NAMES_OF_ADMINISTRATORS'] : $this->lang('NAMES_OF_ADMINISTRATORS'); ?></td>
  </tr>
 </table>
<h1><?php echo isset($this->vars['L_WHO_IS_ONLINE']) ? $this->vars['L_WHO_IS_ONLINE'] : $this->lang('L_WHO_IS_ONLINE'); ?></h1>

<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
  <tr>
    <th width="20%" class="thCornerL" height="25"><?php echo isset($this->vars['L_USERNAME']) ? $this->vars['L_USERNAME'] : $this->lang('L_USERNAME'); ?></th>
    <th width="20%" height="25" class="thTop"><?php echo isset($this->vars['L_STARTED']) ? $this->vars['L_STARTED'] : $this->lang('L_STARTED'); ?></th>
    <th width="20%" class="thTop"><?php echo isset($this->vars['L_LAST_UPDATE']) ? $this->vars['L_LAST_UPDATE'] : $this->lang('L_LAST_UPDATE'); ?></th>
    <th width="20%" class="thCornerR"><?php echo isset($this->vars['L_FORUM_LOCATION']) ? $this->vars['L_FORUM_LOCATION'] : $this->lang('L_FORUM_LOCATION'); ?></th>
    <th width="20%" height="25" class="thCornerR"><?php echo isset($this->vars['L_IP_ADDRESS']) ? $this->vars['L_IP_ADDRESS'] : $this->lang('L_IP_ADDRESS'); ?></th>
  </tr>
  <?php

$reg_user_row_count = ( isset($this->_tpldata['reg_user_row.']) ) ?  sizeof($this->_tpldata['reg_user_row.']) : 0;
for ($reg_user_row_i = 0; $reg_user_row_i < $reg_user_row_count; $reg_user_row_i++)
{
 $reg_user_row_item = &$this->_tpldata['reg_user_row.'][$reg_user_row_i];
 $reg_user_row_item['S_ROW_COUNT'] = $reg_user_row_i;
 $reg_user_row_item['S_NUM_ROWS'] = $reg_user_row_count;

?>
  <tr>
    <td width="20%" class="<?php echo isset($reg_user_row_item['ROW_CLASS']) ? $reg_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><a href="<?php echo isset($reg_user_row_item['U_USER_PROFILE']) ? $reg_user_row_item['U_USER_PROFILE'] : ''; ?>" class="gen"><?php echo isset($reg_user_row_item['USERNAME']) ? $reg_user_row_item['USERNAME'] : ''; ?></a></span></td>
    <td width="20%" align="center" class="<?php echo isset($reg_user_row_item['ROW_CLASS']) ? $reg_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><?php echo isset($reg_user_row_item['STARTED']) ? $reg_user_row_item['STARTED'] : ''; ?></span></td>
    <td width="20%" align="center" nowrap="nowrap" class="<?php echo isset($reg_user_row_item['ROW_CLASS']) ? $reg_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><?php echo isset($reg_user_row_item['LASTUPDATE']) ? $reg_user_row_item['LASTUPDATE'] : ''; ?></span></td>
    <td width="20%" class="<?php echo isset($reg_user_row_item['ROW_CLASS']) ? $reg_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><a href="<?php echo isset($reg_user_row_item['U_FORUM_LOCATION']) ? $reg_user_row_item['U_FORUM_LOCATION'] : ''; ?>" class="gen"><?php echo isset($reg_user_row_item['FORUM_LOCATION']) ? $reg_user_row_item['FORUM_LOCATION'] : ''; ?></a></span></td>
    <td width="20%" class="<?php echo isset($reg_user_row_item['ROW_CLASS']) ? $reg_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><a href="<?php echo isset($reg_user_row_item['U_WHOIS_IP']) ? $reg_user_row_item['U_WHOIS_IP'] : ''; ?>" class="gen" target="_phpbbwhois"><?php echo isset($reg_user_row_item['IP_ADDRESS']) ? $reg_user_row_item['IP_ADDRESS'] : ''; ?></a></span></td>
  </tr>
  <?php

} // END reg_user_row

if(isset($reg_user_row_item)) { unset($reg_user_row_item); } 

?>
  <tr>
    <td colspan="5" height="1" class="row3"><img src="../templates/subSilver/images/spacer.gif" width="1" height="1" alt="."></td>
  </tr>
  <?php

$guest_user_row_count = ( isset($this->_tpldata['guest_user_row.']) ) ?  sizeof($this->_tpldata['guest_user_row.']) : 0;
for ($guest_user_row_i = 0; $guest_user_row_i < $guest_user_row_count; $guest_user_row_i++)
{
 $guest_user_row_item = &$this->_tpldata['guest_user_row.'][$guest_user_row_i];
 $guest_user_row_item['S_ROW_COUNT'] = $guest_user_row_i;
 $guest_user_row_item['S_NUM_ROWS'] = $guest_user_row_count;

?>
  <tr>
    <td width="20%" class="<?php echo isset($guest_user_row_item['ROW_CLASS']) ? $guest_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><?php echo isset($guest_user_row_item['USERNAME']) ? $guest_user_row_item['USERNAME'] : ''; ?></span></td>
    <td width="20%" align="center" class="<?php echo isset($guest_user_row_item['ROW_CLASS']) ? $guest_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><?php echo isset($guest_user_row_item['STARTED']) ? $guest_user_row_item['STARTED'] : ''; ?></span></td>
    <td width="20%" align="center" nowrap="nowrap" class="<?php echo isset($guest_user_row_item['ROW_CLASS']) ? $guest_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><?php echo isset($guest_user_row_item['LASTUPDATE']) ? $guest_user_row_item['LASTUPDATE'] : ''; ?></span></td>
    <td width="20%" class="<?php echo isset($guest_user_row_item['ROW_CLASS']) ? $guest_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><a href="<?php echo isset($guest_user_row_item['U_FORUM_LOCATION']) ? $guest_user_row_item['U_FORUM_LOCATION'] : ''; ?>" class="gen"><?php echo isset($guest_user_row_item['FORUM_LOCATION']) ? $guest_user_row_item['FORUM_LOCATION'] : ''; ?></a></span></td>
    <td width="20%" class="<?php echo isset($guest_user_row_item['ROW_CLASS']) ? $guest_user_row_item['ROW_CLASS'] : ''; ?>"><span class="gen"><a href="<?php echo isset($guest_user_row_item['U_WHOIS_IP']) ? $guest_user_row_item['U_WHOIS_IP'] : ''; ?>" target="_phpbbwhois"><?php echo isset($guest_user_row_item['IP_ADDRESS']) ? $guest_user_row_item['IP_ADDRESS'] : ''; ?></a></span></td>
  </tr>
  <?php

} // END guest_user_row

if(isset($guest_user_row_item)) { unset($guest_user_row_item); } 

?>
</table>

<br />