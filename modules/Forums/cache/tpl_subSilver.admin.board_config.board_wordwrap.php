<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_WRAP_TITLE']) ? $this->vars['L_WRAP_TITLE'] : $this->lang('L_WRAP_TITLE'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ENABLE_WRAP']) ? $this->vars['L_ENABLE_WRAP'] : $this->lang('L_ENABLE_WRAP'); ?></td>
        <td class="row2"><input type="radio" name="wrap_enable" value="1" <?php echo isset($this->vars['WRAP_ENABLE']) ? $this->vars['WRAP_ENABLE'] : $this->lang('WRAP_ENABLE'); ?> /> <?php echo isset($this->vars['L_ENABLED']) ? $this->vars['L_ENABLED'] : $this->lang('L_ENABLED'); ?> <input type="radio" name="wrap_enable" value="0" <?php echo isset($this->vars['WRAP_DISABLE']) ? $this->vars['WRAP_DISABLE'] : $this->lang('WRAP_DISABLE'); ?> /> <?php echo isset($this->vars['L_DISABLED']) ? $this->vars['L_DISABLED'] : $this->lang('L_DISABLED'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_WRAP_MIN']) ? $this->vars['L_WRAP_MIN'] : $this->lang('L_WRAP_MIN'); ?></td>
        <td class="row2"><input class="post" type="text" size="3" maxlength="3" name="wrap_min" value="<?php echo isset($this->vars['WRAP_MIN']) ? $this->vars['WRAP_MIN'] : $this->lang('WRAP_MIN'); ?>" /> <?php echo isset($this->vars['L_WRAP_UNITS']) ? $this->vars['L_WRAP_UNITS'] : $this->lang('L_WRAP_UNITS'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_WRAP_DEF']) ? $this->vars['L_WRAP_DEF'] : $this->lang('L_WRAP_DEF'); ?></td>
        <td class="row2"><input class="post" type="text" size="3" maxlength="3" name="wrap_def" value="<?php echo isset($this->vars['WRAP_DEF']) ? $this->vars['WRAP_DEF'] : $this->lang('WRAP_DEF'); ?>" /> <?php echo isset($this->vars['L_WRAP_UNITS']) ? $this->vars['L_WRAP_UNITS'] : $this->lang('L_WRAP_UNITS'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_WRAP_MAX']) ? $this->vars['L_WRAP_MAX'] : $this->lang('L_WRAP_MAX'); ?></td>
        <td class="row2"><input class="post" type="text" size="3" maxlength="3" name="wrap_max" value="<?php echo isset($this->vars['WRAP_MAX']) ? $this->vars['WRAP_MAX'] : $this->lang('WRAP_MAX'); ?>" /> <?php echo isset($this->vars['L_WRAP_UNITS']) ? $this->vars['L_WRAP_UNITS'] : $this->lang('L_WRAP_UNITS'); ?></td>
    </tr>
</table>
</span>