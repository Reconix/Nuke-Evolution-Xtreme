<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_PRIVATE_MESSAGING']) ? $this->vars['L_PRIVATE_MESSAGING'] : $this->lang('L_PRIVATE_MESSAGING'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_DISABLE_PRIVATE_MESSAGING']) ? $this->vars['L_DISABLE_PRIVATE_MESSAGING'] : $this->lang('L_DISABLE_PRIVATE_MESSAGING'); ?></td>
        <td class="row2"><input type="radio" name="privmsg_disable" value="0" <?php echo isset($this->vars['S_PRIVMSG_ENABLED']) ? $this->vars['S_PRIVMSG_ENABLED'] : $this->lang('S_PRIVMSG_ENABLED'); ?> /><?php echo isset($this->vars['L_ENABLED']) ? $this->vars['L_ENABLED'] : $this->lang('L_ENABLED'); ?> <input type="radio" name="privmsg_disable" value="1" <?php echo isset($this->vars['S_PRIVMSG_DISABLED']) ? $this->vars['S_PRIVMSG_DISABLED'] : $this->lang('S_PRIVMSG_DISABLED'); ?> /><?php echo isset($this->vars['L_DISABLED']) ? $this->vars['L_DISABLED'] : $this->lang('L_DISABLED'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_WELCOME_PM']) ? $this->vars['L_WELCOME_PM'] : $this->lang('L_WELCOME_PM'); ?></td>
        <td class="row2"><input type="radio" name="welcome_pm" value="1" <?php echo isset($this->vars['S_WELCOME_PM_ENABLED']) ? $this->vars['S_WELCOME_PM_ENABLED'] : $this->lang('S_WELCOME_PM_ENABLED'); ?> /><?php echo isset($this->vars['L_ENABLED']) ? $this->vars['L_ENABLED'] : $this->lang('L_ENABLED'); ?> <input type="radio" name="welcome_pm" value="0" <?php echo isset($this->vars['S_WELCOME_PM_DISABLED']) ? $this->vars['S_WELCOME_PM_DISABLED'] : $this->lang('S_WELCOME_PM_DISABLED'); ?> /><?php echo isset($this->vars['L_DISABLED']) ? $this->vars['L_DISABLED'] : $this->lang('L_DISABLED'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_PM_ALLOW_THRESHOLD']) ? $this->vars['L_PM_ALLOW_THRESHOLD'] : $this->lang('L_PM_ALLOW_THRESHOLD'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_PM_ALLOW_TRHESHOLD_EXPLAIN']) ? $this->vars['L_PM_ALLOW_TRHESHOLD_EXPLAIN'] : $this->lang('L_PM_ALLOW_TRHESHOLD_EXPLAIN'); ?></span></td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="pm_allow_threshold" value="<?php echo isset($this->vars['PM_ALLOW_THRESHOLD']) ? $this->vars['PM_ALLOW_THRESHOLD'] : $this->lang('PM_ALLOW_THRESHOLD'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_INBOX_LIMIT']) ? $this->vars['L_INBOX_LIMIT'] : $this->lang('L_INBOX_LIMIT'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_inbox_privmsgs" value="<?php echo isset($this->vars['INBOX_LIMIT']) ? $this->vars['INBOX_LIMIT'] : $this->lang('INBOX_LIMIT'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_SENTBOX_LIMIT']) ? $this->vars['L_SENTBOX_LIMIT'] : $this->lang('L_SENTBOX_LIMIT'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_sentbox_privmsgs" value="<?php echo isset($this->vars['SENTBOX_LIMIT']) ? $this->vars['SENTBOX_LIMIT'] : $this->lang('SENTBOX_LIMIT'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_SAVEBOX_LIMIT']) ? $this->vars['L_SAVEBOX_LIMIT'] : $this->lang('L_SAVEBOX_LIMIT'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="4" size="4" name="max_savebox_privmsgs" value="<?php echo isset($this->vars['SAVEBOX_LIMIT']) ? $this->vars['SAVEBOX_LIMIT'] : $this->lang('SAVEBOX_LIMIT'); ?>" /></td>
    </tr>
</table>
</span>