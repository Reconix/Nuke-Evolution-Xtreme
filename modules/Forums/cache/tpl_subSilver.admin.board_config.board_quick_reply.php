<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_ROPM_QUICK_REPLY']) ? $this->vars['L_ROPM_QUICK_REPLY'] : $this->lang('L_ROPM_QUICK_REPLY'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ENABLE_ROPM_QUICK_REPLY']) ? $this->vars['L_ENABLE_ROPM_QUICK_REPLY'] : $this->lang('L_ENABLE_ROPM_QUICK_REPLY'); ?></td>
        <td class="row2"><input type="radio" name="ropm_quick_reply" value="1" <?php echo isset($this->vars['ROPM_QUICK_REPLY_YES']) ? $this->vars['ROPM_QUICK_REPLY_YES'] : $this->lang('ROPM_QUICK_REPLY_YES'); ?> /> <?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?> <input type="radio" name="ropm_quick_reply" value="0" <?php echo isset($this->vars['ROPM_QUICK_REPLY_NO']) ? $this->vars['ROPM_QUICK_REPLY_NO'] : $this->lang('ROPM_QUICK_REPLY_NO'); ?> /> <?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ROPM_QUICK_REPLY_BBC']) ? $this->vars['L_ROPM_QUICK_REPLY_BBC'] : $this->lang('L_ROPM_QUICK_REPLY_BBC'); ?></td>
        <td class="row2"><input type="radio" name="ropm_quick_reply_bbc" value="1" <?php echo isset($this->vars['ROPM_QUICK_REPLY_BBC_YES']) ? $this->vars['ROPM_QUICK_REPLY_BBC_YES'] : $this->lang('ROPM_QUICK_REPLY_BBC_YES'); ?> /> <?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?> <input type="radio" name="ropm_quick_reply_bbc" value="0" <?php echo isset($this->vars['ROPM_QUICK_REPLY_BBC_NO']) ? $this->vars['ROPM_QUICK_REPLY_BBC_NO'] : $this->lang('ROPM_QUICK_REPLY_BBC_NO'); ?> /> <?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ROPM_QUICK_REPLY_SMILIES']) ? $this->vars['L_ROPM_QUICK_REPLY_SMILIES'] : $this->lang('L_ROPM_QUICK_REPLY_SMILIES'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_ROPM_QUICK_REPLY_SMILIES_INFO']) ? $this->vars['L_ROPM_QUICK_REPLY_SMILIES_INFO'] : $this->lang('L_ROPM_QUICK_REPLY_SMILIES_INFO'); ?></span></td>
        <td class="row2"><input class="post" type="text" name="ropm_quick_reply_smilies" size="4" maxlength="4" value="<?php echo isset($this->vars['ROPM_QUICK_REPLY_SMILIES']) ? $this->vars['ROPM_QUICK_REPLY_SMILIES'] : $this->lang('ROPM_QUICK_REPLY_SMILIES'); ?>" /></td>
    </tr>
</table>
</span>