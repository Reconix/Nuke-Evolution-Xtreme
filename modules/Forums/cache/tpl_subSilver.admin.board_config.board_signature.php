<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_SIG_TITLE']) ? $this->vars['L_SIG_TITLE'] : $this->lang('L_SIG_TITLE'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <!-- Advanced Signature Divider Control -->
    <tr> 
              <td class="row1"><?php echo isset($this->vars['L_SIG_INPUT']) ? $this->vars['L_SIG_INPUT'] : $this->lang('L_SIG_INPUT'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_SIG_EXPLAIN']) ? $this->vars['L_SIG_EXPLAIN'] : $this->lang('L_SIG_EXPLAIN'); ?></span></td> 
             <td class="row2"><input type="text" maxlength="255" name="sig_line" value="<?php echo isset($this->vars['SIG_DIVIDERS']) ? $this->vars['SIG_DIVIDERS'] : $this->lang('SIG_DIVIDERS'); ?>" /></td> 
       </tr> 
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_MAX_SIG_LENGTH']) ? $this->vars['L_MAX_SIG_LENGTH'] : $this->lang('L_MAX_SIG_LENGTH'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_MAX_SIG_LENGTH_EXPLAIN']) ? $this->vars['L_MAX_SIG_LENGTH_EXPLAIN'] : $this->lang('L_MAX_SIG_LENGTH_EXPLAIN'); ?></span></td>
        <td class="row2"><input class="post" type="text" size="5" maxlength="4" name="max_sig_chars" value="<?php echo isset($this->vars['SIG_SIZE']) ? $this->vars['SIG_SIZE'] : $this->lang('SIG_SIZE'); ?>" /></td>
    </tr>
    <!-- Advanced Signature Divider Control -->
    <tr>
</table>
</span>