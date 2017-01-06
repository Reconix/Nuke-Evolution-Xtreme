<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_COOKIE_SETTINGS']) ? $this->vars['L_COOKIE_SETTINGS'] : $this->lang('L_COOKIE_SETTINGS'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row2" colspan="2"><span class="gensmall"><?php echo isset($this->vars['L_COOKIE_SETTINGS_EXPLAIN']) ? $this->vars['L_COOKIE_SETTINGS_EXPLAIN'] : $this->lang('L_COOKIE_SETTINGS_EXPLAIN'); ?></span></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_COOKIE_DOMAIN']) ? $this->vars['L_COOKIE_DOMAIN'] : $this->lang('L_COOKIE_DOMAIN'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="cookie_domain" value="<?php echo isset($this->vars['COOKIE_DOMAIN']) ? $this->vars['COOKIE_DOMAIN'] : $this->lang('COOKIE_DOMAIN'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_COOKIE_NAME']) ? $this->vars['L_COOKIE_NAME'] : $this->lang('L_COOKIE_NAME'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="cookie_name" value="<?php echo isset($this->vars['COOKIE_NAME']) ? $this->vars['COOKIE_NAME'] : $this->lang('COOKIE_NAME'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_COOKIE_PATH']) ? $this->vars['L_COOKIE_PATH'] : $this->lang('L_COOKIE_PATH'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="255" name="cookie_path" value="<?php echo isset($this->vars['COOKIE_PATH']) ? $this->vars['COOKIE_PATH'] : $this->lang('COOKIE_PATH'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_COOKIE_SECURE']) ? $this->vars['L_COOKIE_SECURE'] : $this->lang('L_COOKIE_SECURE'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_COOKIE_SECURE_EXPLAIN']) ? $this->vars['L_COOKIE_SECURE_EXPLAIN'] : $this->lang('L_COOKIE_SECURE_EXPLAIN'); ?></span></td>
        <td class="row2"><input type="radio" name="cookie_secure" value="0" <?php echo isset($this->vars['S_COOKIE_SECURE_DISABLED']) ? $this->vars['S_COOKIE_SECURE_DISABLED'] : $this->lang('S_COOKIE_SECURE_DISABLED'); ?> /><?php echo isset($this->vars['L_DISABLED']) ? $this->vars['L_DISABLED'] : $this->lang('L_DISABLED'); ?>  <input type="radio" name="cookie_secure" value="1" <?php echo isset($this->vars['S_COOKIE_SECURE_ENABLED']) ? $this->vars['S_COOKIE_SECURE_ENABLED'] : $this->lang('S_COOKIE_SECURE_ENABLED'); ?> /><?php echo isset($this->vars['L_ENABLED']) ? $this->vars['L_ENABLED'] : $this->lang('L_ENABLED'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_SESSION_LENGTH']) ? $this->vars['L_SESSION_LENGTH'] : $this->lang('L_SESSION_LENGTH'); ?></td>
        <td class="row2"><input class="post" type="text" maxlength="5" size="5" name="session_length" value="<?php echo isset($this->vars['SESSION_LENGTH']) ? $this->vars['SESSION_LENGTH'] : $this->lang('SESSION_LENGTH'); ?>" /></td>
    </tr>
</table>
</span>