<?php

// eXtreme Styles mod cache. Generated on Wed, 30 Apr 2014 09:34:25 -0600 (time=1398872065)

?><script language="Javascript" type="text/javascript">
    //
    // Should really check the browser to stop this whining ...
    //
    function select_switch(status)
    {
        for (i = 0; i < document.privmsg_list.length; i++)
        {
            document.privmsg_list.elements[i].checked = status;
        }
    }
</script>

<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">

  <tr> 
  <td align="right"> 
      <?php

$switch_box_size_notice_count = ( isset($this->_tpldata['switch_box_size_notice.']) ) ?  sizeof($this->_tpldata['switch_box_size_notice.']) : 0;
for ($switch_box_size_notice_i = 0; $switch_box_size_notice_i < $switch_box_size_notice_count; $switch_box_size_notice_i++)
{
 $switch_box_size_notice_item = &$this->_tpldata['switch_box_size_notice.'][$switch_box_size_notice_i];
 $switch_box_size_notice_item['S_ROW_COUNT'] = $switch_box_size_notice_i;
 $switch_box_size_notice_item['S_NUM_ROWS'] = $switch_box_size_notice_count;

?>
      <table width="175" cellspacing="1" cellpadding="2" border="0" class="bodyline">
        <tr> 
          <td colspan="3" width="175" class="row1" nowrap="nowrap"><span class="gensmall"><?php echo isset($this->vars['ATTACH_BOX_SIZE_STATUS']) ? $this->vars['ATTACH_BOX_SIZE_STATUS'] : $this->lang('ATTACH_BOX_SIZE_STATUS'); ?></span></td>
        </tr>
        <tr> 
          <td colspan="3" width="175" class="row2">
            <table cellspacing="0" cellpadding="1" border="0">
              <tr> 
                 <td>
                   <img src="<?php echo isset($this->vars['LCAP_IMG']) ? $this->vars['LCAP_IMG'] : $this->lang('LCAP_IMG'); ?>" width="4" height="13" alt="" /><img src="<?php echo isset($this->vars['MAINBAR_IMG']) ? $this->vars['MAINBAR_IMG'] : $this->lang('MAINBAR_IMG'); ?>" width="<?php echo isset($this->vars['ATTACHBOX_LIMIT_IMG_WIDTH']) ? $this->vars['ATTACHBOX_LIMIT_IMG_WIDTH'] : $this->lang('ATTACHBOX_LIMIT_IMG_WIDTH'); ?>" height="13" alt="<?php echo isset($this->vars['ATTACH_LIMIT_PERCENT']) ? $this->vars['ATTACH_LIMIT_PERCENT'] : $this->lang('ATTACH_LIMIT_PERCENT'); ?>" /><img src="<?php echo isset($this->vars['RCAP_IMG']) ? $this->vars['RCAP_IMG'] : $this->lang('RCAP_IMG'); ?>" width="4" height="13" alt="" />
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td width="33%" class="row1"><span class="gensmall">0%</span></td>
          <td width="34%" align="center" class="row1"><span class="gensmall">50%</span></td>
          <td width="33%" align="right" class="row1"><span class="gensmall">100%</span></td>
        </tr>
      </table>
      <?php

} // END switch_box_size_notice

if(isset($switch_box_size_notice_item)) { unset($switch_box_size_notice_item); } 

?>
    </td>
    <td valign="top" align="center" width="100%">
    <table height="40" cellspacing="2" cellpadding="2" border="0">
      <tr valign="middle">
        <td><?php echo isset($this->vars['INBOX_IMG']) ? $this->vars['INBOX_IMG'] : $this->lang('INBOX_IMG'); ?></td>
        <td><span class="cattitle"><?php echo isset($this->vars['INBOX']) ? $this->vars['INBOX'] : $this->lang('INBOX'); ?>&nbsp;(<?php echo isset($this->vars['TOTAL_INBOX']) ? $this->vars['TOTAL_INBOX'] : $this->lang('TOTAL_INBOX'); ?>)</span></td>
        <td><?php echo isset($this->vars['SENTBOX_IMG']) ? $this->vars['SENTBOX_IMG'] : $this->lang('SENTBOX_IMG'); ?></td>
        <td><span class="cattitle"><?php echo isset($this->vars['SENTBOX']) ? $this->vars['SENTBOX'] : $this->lang('SENTBOX'); ?>&nbsp;(<?php echo isset($this->vars['TOTAL_SENTBOX']) ? $this->vars['TOTAL_SENTBOX'] : $this->lang('TOTAL_SENTBOX'); ?>)</span></td>
      </tr>
      <tr>
        <td><?php echo isset($this->vars['OUTBOX_IMG']) ? $this->vars['OUTBOX_IMG'] : $this->lang('OUTBOX_IMG'); ?></td>
        <td><span class="cattitle"><?php echo isset($this->vars['OUTBOX']) ? $this->vars['OUTBOX'] : $this->lang('OUTBOX'); ?>&nbsp;(<?php echo isset($this->vars['TOTAL_OUTBOX']) ? $this->vars['TOTAL_OUTBOX'] : $this->lang('TOTAL_OUTBOX'); ?>)</span></td>
        <td><?php echo isset($this->vars['SAVEBOX_IMG']) ? $this->vars['SAVEBOX_IMG'] : $this->lang('SAVEBOX_IMG'); ?></td>
        <td><span class="cattitle"><?php echo isset($this->vars['SAVEBOX']) ? $this->vars['SAVEBOX'] : $this->lang('SAVEBOX'); ?>&nbsp;(<?php echo isset($this->vars['TOTAL_SAVEBOX']) ? $this->vars['TOTAL_SAVEBOX'] : $this->lang('TOTAL_SAVEBOX'); ?>)</span></td>
      </tr>
    </table>
    </td>
    <td align="right"> 
      <?php

$switch_box_size_notice_count = ( isset($this->_tpldata['switch_box_size_notice.']) ) ?  sizeof($this->_tpldata['switch_box_size_notice.']) : 0;
for ($switch_box_size_notice_i = 0; $switch_box_size_notice_i < $switch_box_size_notice_count; $switch_box_size_notice_i++)
{
 $switch_box_size_notice_item = &$this->_tpldata['switch_box_size_notice.'][$switch_box_size_notice_i];
 $switch_box_size_notice_item['S_ROW_COUNT'] = $switch_box_size_notice_i;
 $switch_box_size_notice_item['S_NUM_ROWS'] = $switch_box_size_notice_count;

?>
      <table width="175" cellspacing="1" cellpadding="2" border="0" class="bodyline">
        <tr> 
          <td colspan="3" width="100%" class="row1" nowrap="nowrap"><span class="gensmall"><?php echo isset($this->vars['BOX_SIZE_STATUS']) ? $this->vars['BOX_SIZE_STATUS'] : $this->lang('BOX_SIZE_STATUS'); ?></span></td>
        </tr>
        <tr> 
          <td colspan="3" width="100%" class="row2">
            <table cellspacing="0" cellpadding="1" border="0">
              <tr> 
                 <td>
                    <img src="<?php echo isset($this->vars['LCAP_IMG']) ? $this->vars['LCAP_IMG'] : $this->lang('LCAP_IMG'); ?>" width="4" height="13" alt="" /><img src="<?php echo isset($this->vars['MAINBAR_IMG']) ? $this->vars['MAINBAR_IMG'] : $this->lang('MAINBAR_IMG'); ?>" width="<?php echo isset($this->vars['INBOX_LIMIT_IMG_WIDTH']) ? $this->vars['INBOX_LIMIT_IMG_WIDTH'] : $this->lang('INBOX_LIMIT_IMG_WIDTH'); ?>" height="13" alt="<?php echo isset($this->vars['INBOX_LIMIT_PERCENT']) ? $this->vars['INBOX_LIMIT_PERCENT'] : $this->lang('INBOX_LIMIT_PERCENT'); ?>" /><img src="<?php echo isset($this->vars['RCAP_IMG']) ? $this->vars['RCAP_IMG'] : $this->lang('RCAP_IMG'); ?>" width="4" height="13" alt="" />
                 </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr> 
          <td width="33%" class="row1"><span class="gensmall">0%</span></td>
          <td width="34%" align="center" class="row1"><span class="gensmall">50%</span></td>
          <td width="33%" align="right" class="row1"><span class="gensmall">100%</span></td>
        </tr>
      </table>
      <?php

} // END switch_box_size_notice

if(isset($switch_box_size_notice_item)) { unset($switch_box_size_notice_item); } 

?>
    </td>
  </tr>
</table>

<br />

<form method="post" name="privmsg_list" action="<?php echo isset($this->vars['S_PRIVMSGS_ACTION']) ? $this->vars['S_PRIVMSGS_ACTION'] : $this->lang('S_PRIVMSGS_ACTION'); ?>">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
    <tr> 
      <td align="left" valign="middle"><?php echo isset($this->vars['POST_PM_IMG']) ? $this->vars['POST_PM_IMG'] : $this->lang('POST_PM_IMG'); ?></td>
      <!-- Start add - Custom mass PM MOD -->
      <td align="left" valign="middle"><?php echo isset($this->vars['MASS_PM_IMG']) ? $this->vars['MASS_PM_IMG'] : $this->lang('MASS_PM_IMG'); ?></td>
      <!-- End add - Custom mass PM MOD -->
      <td align="left" width="100%"><span class="nav"><a href="<?php echo isset($this->vars['U_INDEX']) ? $this->vars['U_INDEX'] : $this->lang('U_INDEX'); ?>" class="nav"><?php echo isset($this->vars['L_INDEX']) ? $this->vars['L_INDEX'] : $this->lang('L_INDEX'); ?></a></span></td>
      <td align="right" nowrap="nowrap"><span class="gensmall"><?php echo isset($this->vars['L_DISPLAY_MESSAGES']) ? $this->vars['L_DISPLAY_MESSAGES'] : $this->lang('L_DISPLAY_MESSAGES'); ?>: 
        <select name="msgdays"><?php echo isset($this->vars['S_SELECT_MSG_DAYS']) ? $this->vars['S_SELECT_MSG_DAYS'] : $this->lang('S_SELECT_MSG_DAYS'); ?>
        </select>
        <input type="submit" value="<?php echo isset($this->vars['L_GO']) ? $this->vars['L_GO'] : $this->lang('L_GO'); ?>" name="submit_msgdays" class="liteoption" />
        </span></td>
    </tr>
  </table>

  <table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
    <tr> 
      <th width="5%" height="25" class="thCornerL" nowrap="nowrap"><?php echo isset($this->vars['L_FLAG']) ? $this->vars['L_FLAG'] : $this->lang('L_FLAG'); ?></th>
      <th width="55%" class="thTop" nowrap="nowrap"><?php echo isset($this->vars['L_SUBJECT']) ? $this->vars['L_SUBJECT'] : $this->lang('L_SUBJECT'); ?></th>
      <th width="20%" class="thTop" nowrap="nowrap"><?php echo isset($this->vars['L_FROM_OR_TO']) ? $this->vars['L_FROM_OR_TO'] : $this->lang('L_FROM_OR_TO'); ?></th>
      <th width="15%" class="thTop" nowrap="nowrap"><?php echo isset($this->vars['L_DATE']) ? $this->vars['L_DATE'] : $this->lang('L_DATE'); ?></th>
      <th width="5%" class="thCornerR" nowrap="nowrap"><?php echo isset($this->vars['L_MARK']) ? $this->vars['L_MARK'] : $this->lang('L_MARK'); ?></th>
    </tr>
    <?php

$listrow_count = ( isset($this->_tpldata['listrow.']) ) ?  sizeof($this->_tpldata['listrow.']) : 0;
for ($listrow_i = 0; $listrow_i < $listrow_count; $listrow_i++)
{
 $listrow_item = &$this->_tpldata['listrow.'][$listrow_i];
 $listrow_item['S_ROW_COUNT'] = $listrow_i;
 $listrow_item['S_NUM_ROWS'] = $listrow_count;

?>
    <tr> 
      <td class="<?php echo isset($listrow_item['ROW_CLASS']) ? $listrow_item['ROW_CLASS'] : ''; ?>" width="5%" align="center" valign="middle"><img src="<?php echo isset($listrow_item['PRIVMSG_FOLDER_IMG']) ? $listrow_item['PRIVMSG_FOLDER_IMG'] : ''; ?>" alt="<?php echo isset($listrow_item['L_PRIVMSG_FOLDER_ALT']) ? $listrow_item['L_PRIVMSG_FOLDER_ALT'] : ''; ?>" title="<?php echo isset($listrow_item['L_PRIVMSG_FOLDER_ALT']) ? $listrow_item['L_PRIVMSG_FOLDER_ALT'] : ''; ?>" /></td>
      <td width="55%" valign="middle" class="<?php echo isset($listrow_item['ROW_CLASS']) ? $listrow_item['ROW_CLASS'] : ''; ?>"><?php echo isset($listrow_item['PRIVMSG_ATTACHMENTS_IMG']) ? $listrow_item['PRIVMSG_ATTACHMENTS_IMG'] : ''; ?><span class="topictitle"><a href="<?php echo isset($listrow_item['U_READ']) ? $listrow_item['U_READ'] : ''; ?>" class="topictitle"><?php echo isset($listrow_item['SUBJECT']) ? $listrow_item['SUBJECT'] : ''; ?></a></span></td>
      <td width="20%" valign="middle" align="center" class="<?php echo isset($listrow_item['ROW_CLASS']) ? $listrow_item['ROW_CLASS'] : ''; ?>"><span class="name"><a href="<?php echo isset($listrow_item['U_FROM_USER_PROFILE']) ? $listrow_item['U_FROM_USER_PROFILE'] : ''; ?>" class="name"><?php echo isset($listrow_item['FROM']) ? $listrow_item['FROM'] : ''; ?></a></span></td>
      <td width="15%" align="center" valign="middle" class="<?php echo isset($listrow_item['ROW_CLASS']) ? $listrow_item['ROW_CLASS'] : ''; ?>"><span class="postdetails"><?php echo isset($listrow_item['DATE']) ? $listrow_item['DATE'] : ''; ?></span></td>
      <td width="5%" align="center" valign="middle" class="<?php echo isset($listrow_item['ROW_CLASS']) ? $listrow_item['ROW_CLASS'] : ''; ?>"><span class="postdetails"> 
        <input type="checkbox" name="mark[]2" value="<?php echo isset($listrow_item['S_MARK_ID']) ? $listrow_item['S_MARK_ID'] : ''; ?>" />
        </span></td>
    </tr>
    <?php

} // END listrow

if(isset($listrow_item)) { unset($listrow_item); } 

?>
    <?php

$switch_no_messages_count = ( isset($this->_tpldata['switch_no_messages.']) ) ?  sizeof($this->_tpldata['switch_no_messages.']) : 0;
for ($switch_no_messages_i = 0; $switch_no_messages_i < $switch_no_messages_count; $switch_no_messages_i++)
{
 $switch_no_messages_item = &$this->_tpldata['switch_no_messages.'][$switch_no_messages_i];
 $switch_no_messages_item['S_ROW_COUNT'] = $switch_no_messages_i;
 $switch_no_messages_item['S_NUM_ROWS'] = $switch_no_messages_count;

?>
    <tr> 
      <td class="row1" colspan="5" align="center" valign="middle"><span class="gen"><?php echo isset($this->vars['L_NO_MESSAGES']) ? $this->vars['L_NO_MESSAGES'] : $this->lang('L_NO_MESSAGES'); ?></span></td>
    </tr>
    <?php

} // END switch_no_messages

if(isset($switch_no_messages_item)) { unset($switch_no_messages_item); } 

?>
    <tr> 
      <td class="catBottom" colspan="5" height="28" align="right"> <?php echo isset($this->vars['S_HIDDEN_FIELDS']) ? $this->vars['S_HIDDEN_FIELDS'] : $this->lang('S_HIDDEN_FIELDS'); ?> 
        <input type="submit" name="save" value="<?php echo isset($this->vars['L_SAVE_MARKED']) ? $this->vars['L_SAVE_MARKED'] : $this->lang('L_SAVE_MARKED'); ?>" class="mainoption" />
        <input type="submit" name="delete" value="<?php echo isset($this->vars['L_DELETE_MARKED']) ? $this->vars['L_DELETE_MARKED'] : $this->lang('L_DELETE_MARKED'); ?>" class="liteoption" />
        <input type="submit" name="deleteall" value="<?php echo isset($this->vars['L_DELETE_ALL']) ? $this->vars['L_DELETE_ALL'] : $this->lang('L_DELETE_ALL'); ?>" class="liteoption" />
      </td>
    </tr>
  </table>

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
    <tr> 
      <td align="left" valign="middle"><span class="nav"><?php echo isset($this->vars['POST_PM_IMG']) ? $this->vars['POST_PM_IMG'] : $this->lang('POST_PM_IMG'); ?></span></td>
      <!-- Start add - Custom mass PM MOD -->
      <td align="left" valign="middle"><span class="nav"><?php echo isset($this->vars['MASS_PM_IMG']) ? $this->vars['MASS_PM_IMG'] : $this->lang('MASS_PM_IMG'); ?></span></td>
      <!-- End add - Custom mass PM MOD -->
      <td align="left" valign="middle" width="100%"><?php echo isset($this->vars['PAGE_NUMBER']) ? $this->vars['PAGE_NUMBER'] : $this->lang('PAGE_NUMBER'); ?></td>
      <td align="right" valign="top" nowrap="nowrap"><strong><span class="gensmall"><a href="javascript:select_switch(true);" class="gensmall"><?php echo isset($this->vars['L_MARK_ALL']) ? $this->vars['L_MARK_ALL'] : $this->lang('L_MARK_ALL'); ?></a> :: <a href="javascript:select_switch(false);" class="gensmall"><?php echo isset($this->vars['L_UNMARK_ALL']) ? $this->vars['L_UNMARK_ALL'] : $this->lang('L_UNMARK_ALL'); ?></a></span></strong><br /><?php echo isset($this->vars['PAGINATION']) ? $this->vars['PAGINATION'] : $this->lang('PAGINATION'); ?><br /><span class="gensmall"><?php echo isset($this->vars['S_TIMEZONE']) ? $this->vars['S_TIMEZONE'] : $this->lang('S_TIMEZONE'); ?></span></td>
    </tr>
  </table>
</form>

<table width="100%" border="0">
  <tr> 
    <td align="right" valign="top"><?php echo isset($this->vars['JUMPBOX']) ? $this->vars['JUMPBOX'] : $this->lang('JUMPBOX'); ?></td>
  </tr>
</table>