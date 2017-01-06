<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_SQR_SETTINGS']) ? $this->vars['L_SQR_SETTINGS'] : $this->lang('L_SQR_SETTINGS'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
    <table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ALLOW_QUICK_REPLY']) ? $this->vars['L_ALLOW_QUICK_REPLY'] : $this->lang('L_ALLOW_QUICK_REPLY'); ?></td>
        <td class="row2"><input type="radio" name="allow_quickreply" value="1" <?php echo isset($this->vars['QUICKREPLY_YES']) ? $this->vars['QUICKREPLY_YES'] : $this->lang('QUICKREPLY_YES'); ?> /> <?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?> <input type="radio" name="allow_quickreply" value="0" <?php echo isset($this->vars['QUICKREPLY_NO']) ? $this->vars['QUICKREPLY_NO'] : $this->lang('QUICKREPLY_NO'); ?> /> <?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ANONYMOUS_SHOW_SQR']) ? $this->vars['L_ANONYMOUS_SHOW_SQR'] : $this->lang('L_ANONYMOUS_SHOW_SQR'); ?></td>
        <td class="row2"><?php echo isset($this->vars['ANONYMOUS_SQR_SELECT']) ? $this->vars['ANONYMOUS_SQR_SELECT'] : $this->lang('ANONYMOUS_SQR_SELECT'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ANONYMOUS_SQR_MODE']) ? $this->vars['L_ANONYMOUS_SQR_MODE'] : $this->lang('L_ANONYMOUS_SQR_MODE'); ?></td>
        <td class="row2"><input type="radio" name="anonymous_sqr_mode" value="0" <?php echo isset($this->vars['ANONYMOUS_SQR_MODE_BASIC']) ? $this->vars['ANONYMOUS_SQR_MODE_BASIC'] : $this->lang('ANONYMOUS_SQR_MODE_BASIC'); ?> /><?php echo isset($this->vars['L_ANONYMOUS_SQR_MODE_BASIC']) ? $this->vars['L_ANONYMOUS_SQR_MODE_BASIC'] : $this->lang('L_ANONYMOUS_SQR_MODE_BASIC'); ?> <input type="radio" name="anonymous_sqr_mode" value="1" <?php echo isset($this->vars['ANONYMOUS_SQR_MODE_ADVANCED']) ? $this->vars['ANONYMOUS_SQR_MODE_ADVANCED'] : $this->lang('ANONYMOUS_SQR_MODE_ADVANCED'); ?> /><?php echo isset($this->vars['L_ANONYMOUS_SQR_MODE_ADVANCED']) ? $this->vars['L_ANONYMOUS_SQR_MODE_ADVANCED'] : $this->lang('L_ANONYMOUS_SQR_MODE_ADVANCED'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_ANONYMOUS_OPEN_SQR']) ? $this->vars['L_ANONYMOUS_OPEN_SQR'] : $this->lang('L_ANONYMOUS_OPEN_SQR'); ?></td>
        <td class="row2"><input type="radio" name="anonymous_open_sqr" value="1" <?php echo isset($this->vars['ANONYMOUS_OPEN_SQR_YES']) ? $this->vars['ANONYMOUS_OPEN_SQR_YES'] : $this->lang('ANONYMOUS_OPEN_SQR_YES'); ?> /><?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?> <input type="radio" name="anonymous_open_sqr" value="0" <?php echo isset($this->vars['ANONYMOUS_OPEN_SQR_NO']) ? $this->vars['ANONYMOUS_OPEN_SQR_NO'] : $this->lang('ANONYMOUS_OPEN_SQR_NO'); ?> /><?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></td>
    </tr>
</table>
</span>