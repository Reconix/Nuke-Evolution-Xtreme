<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_COPPA_SETTINGS']) ? $this->vars['L_COPPA_SETTINGS'] : $this->lang('L_COPPA_SETTINGS'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_COPPA_FAX']) ? $this->vars['L_COPPA_FAX'] : $this->lang('L_COPPA_FAX'); ?></td>
        <td class="row2"><input class="post" type="text" size="25" maxlength="100" name="coppa_fax" value="<?php echo isset($this->vars['COPPA_FAX']) ? $this->vars['COPPA_FAX'] : $this->lang('COPPA_FAX'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_COPPA_MAIL']) ? $this->vars['L_COPPA_MAIL'] : $this->lang('L_COPPA_MAIL'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_COPPA_MAIL_EXPLAIN']) ? $this->vars['L_COPPA_MAIL_EXPLAIN'] : $this->lang('L_COPPA_MAIL_EXPLAIN'); ?></span></td>
        <td class="row2"><textarea name="coppa_mail" rows="5" cols="30"><?php echo isset($this->vars['COPPA_MAIL']) ? $this->vars['COPPA_MAIL'] : $this->lang('COPPA_MAIL'); ?></textarea></td>
    </tr>
</table>
</span>