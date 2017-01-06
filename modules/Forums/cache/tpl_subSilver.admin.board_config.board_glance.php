<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_GLANCE_TITLE']) ? $this->vars['L_GLANCE_TITLE'] : $this->lang('L_GLANCE_TITLE'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_SHOW']) ? $this->vars['L_GLANCE_SHOW'] : $this->lang('L_GLANCE_SHOW'); ?></td>
        <td class="row2"><?php echo isset($this->vars['GLANCE_SELECT']) ? $this->vars['GLANCE_SELECT'] : $this->lang('GLANCE_SELECT'); ?><br /><small><?php echo isset($this->vars['L_GLANCE_OVERRIDE_TITLE']) ? $this->vars['L_GLANCE_OVERRIDE_TITLE'] : $this->lang('L_GLANCE_OVERRIDE_TITLE'); ?></small><br /><input type="radio" name="glance_show_override" value="1" <?php echo isset($this->vars['GLANCE_SHOW_OVERRIDE_YES']) ? $this->vars['GLANCE_SHOW_OVERRIDE_YES'] : $this->lang('GLANCE_SHOW_OVERRIDE_YES'); ?> /> <?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?> <input type="radio" name="glance_show_override" value="0" <?php echo isset($this->vars['GLANCE_SHOW_OVERRIDE_NO']) ? $this->vars['GLANCE_SHOW_OVERRIDE_NO'] : $this->lang('GLANCE_SHOW_OVERRIDE_NO'); ?> /> <?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_NEWS_EXPLAIN']) ? $this->vars['L_GLANCE_NEWS_EXPLAIN'] : $this->lang('L_GLANCE_NEWS_EXPLAIN'); ?></td>
        <td class="row2"><input class="post" type="text" name="glance_news_id" size="10" maxlength="20" value="<?php echo isset($this->vars['GLANCE_NEWS_ID']) ? $this->vars['GLANCE_NEWS_ID'] : $this->lang('GLANCE_NEWS_ID'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_NUM_NEWS_EXPLAIN']) ? $this->vars['L_GLANCE_NUM_NEWS_EXPLAIN'] : $this->lang('L_GLANCE_NUM_NEWS_EXPLAIN'); ?></td>
        <td class="row2"><input class="post" type="text" name="glance_num_news" size="10" maxlength="20" value="<?php echo isset($this->vars['GLANCE_NUM_NEWS']) ? $this->vars['GLANCE_NUM_NEWS'] : $this->lang('GLANCE_NUM_NEWS'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_NUM_EXPLAIN']) ? $this->vars['L_GLANCE_NUM_EXPLAIN'] : $this->lang('L_GLANCE_NUM_EXPLAIN'); ?></td>
        <td class="row2"><input class="post" type="text" name="glance_num" size="10" maxlength="20" value="<?php echo isset($this->vars['GLANCE_NUM']) ? $this->vars['GLANCE_NUM'] : $this->lang('GLANCE_NUM'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_IGNORE_FORUMS']) ? $this->vars['L_GLANCE_IGNORE_FORUMS'] : $this->lang('L_GLANCE_IGNORE_FORUMS'); ?></td>
        <td class="row2"><input class="post" type="text" name="glance_ignore_forums" size="10" maxlength="20" value="<?php echo isset($this->vars['GLANCE_IGNORE_FORUMS']) ? $this->vars['GLANCE_IGNORE_FORUMS'] : $this->lang('GLANCE_IGNORE_FORUMS'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_TABLE_WIDTH']) ? $this->vars['L_GLANCE_TABLE_WIDTH'] : $this->lang('L_GLANCE_TABLE_WIDTH'); ?></td>
        <td class="row2"><input class="post" type="text" name="glance_table_width" size="10" maxlength="10" value="<?php echo isset($this->vars['GLANCE_TABLE_WIDTH']) ? $this->vars['GLANCE_TABLE_WIDTH'] : $this->lang('GLANCE_TABLE_WIDTH'); ?>" /></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_AUTH_READ_EXPLAIN']) ? $this->vars['L_GLANCE_AUTH_READ_EXPLAIN'] : $this->lang('L_GLANCE_AUTH_READ_EXPLAIN'); ?></td>
        <td class="row2"><input type="radio" name="glance_auth_read" value="1" <?php echo isset($this->vars['GLANCE_AUTH_READ_YES']) ? $this->vars['GLANCE_AUTH_READ_YES'] : $this->lang('GLANCE_AUTH_READ_YES'); ?> /> <?php echo isset($this->vars['L_YES']) ? $this->vars['L_YES'] : $this->lang('L_YES'); ?> <input type="radio" name="glance_auth_read" value="0" <?php echo isset($this->vars['GLANCE_AUTH_READ_NO']) ? $this->vars['GLANCE_AUTH_READ_NO'] : $this->lang('GLANCE_AUTH_READ_NO'); ?> /> <?php echo isset($this->vars['L_NO']) ? $this->vars['L_NO'] : $this->lang('L_NO'); ?></td>
    </tr>
    <tr>
        <td class="row1"><?php echo isset($this->vars['L_GLANCE_TOPIC_LENGTH_EXPLAIN']) ? $this->vars['L_GLANCE_TOPIC_LENGTH_EXPLAIN'] : $this->lang('L_GLANCE_TOPIC_LENGTH_EXPLAIN'); ?></td>
        <td class="row2"><input class="post" type="text" name="glance_topic_length" size="10" maxlength="10" value="<?php echo isset($this->vars['GLANCE_TOPIC_LENGTH']) ? $this->vars['GLANCE_TOPIC_LENGTH'] : $this->lang('GLANCE_TOPIC_LENGTH'); ?>" /></td>
    </tr>
</table>
</span>