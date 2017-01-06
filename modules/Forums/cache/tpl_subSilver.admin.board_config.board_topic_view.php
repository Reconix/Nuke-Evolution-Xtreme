<?php

// eXtreme Styles mod cache. Generated on Sat, 03 May 2014 00:36:56 -0600 (time=1399099016)

?><table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr <?php echo isset($this->vars['DHTML_HAND']) ? $this->vars['DHTML_HAND'] : $this->lang('DHTML_HAND'); ?> <?php echo isset($this->vars['DHTML_ONCLICK']) ? $this->vars['DHTML_ONCLICK'] : $this->lang('DHTML_ONCLICK'); ?>"show(<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>)">
        <th  height="25" class="menu" colspan="2"><?php echo isset($this->vars['L_TOPIC_VIEW_SETTINGS']) ? $this->vars['L_TOPIC_VIEW_SETTINGS'] : $this->lang('L_TOPIC_VIEW_SETTINGS'); ?></th>
    </tr>
</table>
<span id="<?php echo isset($this->vars['DHTML_ID']) ? $this->vars['DHTML_ID'] : $this->lang('DHTML_ID'); ?>" <?php echo isset($this->vars['DHTML_DISPLAY']) ? $this->vars['DHTML_DISPLAY'] : $this->lang('DHTML_DISPLAY'); ?>>
<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
    <tr>
        <td class="row2" height="19" colspan="2"><center><?php echo isset($this->vars['L_LOCKED']) ? $this->vars['L_LOCKED'] : $this->lang('L_LOCKED'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_TOPIC_EXPLAIN']) ? $this->vars['L_TOPIC_EXPLAIN'] : $this->lang('L_TOPIC_EXPLAIN'); ?></span></center></td>
    </tr>
    <tr>
        <td class="row1" height="19"><?php echo isset($this->vars['L_CURRENT']) ? $this->vars['L_CURRENT'] : $this->lang('L_CURRENT'); ?><p>
            <span class="gensmall"><?php echo isset($this->vars['L_CURRENT_EXPLAIN']) ? $this->vars['L_CURRENT_EXPLAIN'] : $this->lang('L_CURRENT_EXPLAIN'); ?></span></td>
        <td class="row2" height="19"><?php echo isset($this->vars['LOCKED_CURRENT']) ? $this->vars['LOCKED_CURRENT'] : $this->lang('LOCKED_CURRENT'); ?></td>
    </tr>
    <tr>
        <td class="row1" height="22"><?php echo isset($this->vars['L_TAG']) ? $this->vars['L_TAG'] : $this->lang('L_TAG'); ?></td>
        <td class="row2" height="22">
            <input class="post" type="text" size="15" maxlength="100" name="locked_view_open" value="<?php echo isset($this->vars['LOCKED_VIEW_OPEN']) ? $this->vars['LOCKED_VIEW_OPEN'] : $this->lang('LOCKED_VIEW_OPEN'); ?>" /> 
            <?php echo isset($this->vars['L_TOPIC_TITLE']) ? $this->vars['L_TOPIC_TITLE'] : $this->lang('L_TOPIC_TITLE'); ?>
            <input class="post" type="text" size="15" maxlength="100" name="locked_view_close" value="<?php echo isset($this->vars['LOCKED_VIEW_CLOSE']) ? $this->vars['LOCKED_VIEW_CLOSE'] : $this->lang('LOCKED_VIEW_CLOSE'); ?>" /></td>
    </tr>
    <tr>
        <td class="row2" height="19" colspan="2"><center><?php echo isset($this->vars['L_STICKY']) ? $this->vars['L_STICKY'] : $this->lang('L_STICKY'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_TOPIC_EXPLAIN']) ? $this->vars['L_TOPIC_EXPLAIN'] : $this->lang('L_TOPIC_EXPLAIN'); ?></span></center></td>
    </tr>
    <tr>
        <td class="row1" height="19"><?php echo isset($this->vars['L_CURRENT']) ? $this->vars['L_CURRENT'] : $this->lang('L_CURRENT'); ?><p>
            <span class="gensmall"><?php echo isset($this->vars['L_CURRENT_EXPLAIN']) ? $this->vars['L_CURRENT_EXPLAIN'] : $this->lang('L_CURRENT_EXPLAIN'); ?></span></td>
        <td class="row2" height="19"><?php echo isset($this->vars['STICKY_CURRENT']) ? $this->vars['STICKY_CURRENT'] : $this->lang('STICKY_CURRENT'); ?></td>
    </tr>
    <tr>
        <td class="row1" height="22"><?php echo isset($this->vars['L_TAG']) ? $this->vars['L_TAG'] : $this->lang('L_TAG'); ?></td>
        <td class="row2" height="22">
            <input class="post" type="text" size="15" maxlength="100" name="sticky_view_open" value="<?php echo isset($this->vars['STICKY_VIEW_OPEN']) ? $this->vars['STICKY_VIEW_OPEN'] : $this->lang('STICKY_VIEW_OPEN'); ?>" /> 
            <?php echo isset($this->vars['L_TOPIC_TITLE']) ? $this->vars['L_TOPIC_TITLE'] : $this->lang('L_TOPIC_TITLE'); ?>
            <input class="post" type="text" size="15" maxlength="100" name="sticky_view_close" value="<?php echo isset($this->vars['STICKY_VIEW_CLOSE']) ? $this->vars['STICKY_VIEW_CLOSE'] : $this->lang('STICKY_VIEW_CLOSE'); ?>" /></td>
    </tr>
    <tr>
        <td class="row2" height="19" colspan="2"><center><?php echo isset($this->vars['L_ANNOUNCE']) ? $this->vars['L_ANNOUNCE'] : $this->lang('L_ANNOUNCE'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_TOPIC_EXPLAIN']) ? $this->vars['L_TOPIC_EXPLAIN'] : $this->lang('L_TOPIC_EXPLAIN'); ?></span></center></td>
    </tr>
    <tr>
        <td class="row1" height="19"><?php echo isset($this->vars['L_CURRENT']) ? $this->vars['L_CURRENT'] : $this->lang('L_CURRENT'); ?><p>
            <span class="gensmall"><?php echo isset($this->vars['L_CURRENT_EXPLAIN']) ? $this->vars['L_CURRENT_EXPLAIN'] : $this->lang('L_CURRENT_EXPLAIN'); ?></span></td>
        <td class="row2" height="19"><?php echo isset($this->vars['ANNOUNCE_CURRENT']) ? $this->vars['ANNOUNCE_CURRENT'] : $this->lang('ANNOUNCE_CURRENT'); ?></td>
    </tr>
    <tr>
        <td class="row1" height="22"><?php echo isset($this->vars['L_TAG']) ? $this->vars['L_TAG'] : $this->lang('L_TAG'); ?></td>
        <td class="row2" height="22">
            <input class="post" type="text" size="15" maxlength="100" name="announce_view_open" value="<?php echo isset($this->vars['ANNOUNCE_VIEW_OPEN']) ? $this->vars['ANNOUNCE_VIEW_OPEN'] : $this->lang('ANNOUNCE_VIEW_OPEN'); ?>" /> 
            <?php echo isset($this->vars['L_TOPIC_TITLE']) ? $this->vars['L_TOPIC_TITLE'] : $this->lang('L_TOPIC_TITLE'); ?>
            <input class="post" type="text" size="15" maxlength="100" name="announce_view_close" value="<?php echo isset($this->vars['ANNOUNCE_VIEW_CLOSE']) ? $this->vars['ANNOUNCE_VIEW_CLOSE'] : $this->lang('ANNOUNCE_VIEW_CLOSE'); ?>" /></td>
    </tr>
    <tr>
        <td class="row2" height="19" colspan="2"><center><?php echo isset($this->vars['L_GLOBAL']) ? $this->vars['L_GLOBAL'] : $this->lang('L_GLOBAL'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_TOPIC_EXPLAIN']) ? $this->vars['L_TOPIC_EXPLAIN'] : $this->lang('L_TOPIC_EXPLAIN'); ?></span></center></td>
    </tr>
    <tr>
        <td class="row1" height="19"><?php echo isset($this->vars['L_CURRENT']) ? $this->vars['L_CURRENT'] : $this->lang('L_CURRENT'); ?><p>
            <span class="gensmall"><?php echo isset($this->vars['L_CURRENT_EXPLAIN']) ? $this->vars['L_CURRENT_EXPLAIN'] : $this->lang('L_CURRENT_EXPLAIN'); ?></span></td>
        <td class="row2" height="19"><?php echo isset($this->vars['GLOBAL_CURRENT']) ? $this->vars['GLOBAL_CURRENT'] : $this->lang('GLOBAL_CURRENT'); ?></td>
    </tr>
    <tr>
        <td class="row1" height="22"><?php echo isset($this->vars['L_TAG']) ? $this->vars['L_TAG'] : $this->lang('L_TAG'); ?></td>
        <td class="row2" height="22">
            <input class="post" type="text" size="15" maxlength="100" name="global_view_open" value="<?php echo isset($this->vars['GLOBAL_VIEW_OPEN']) ? $this->vars['GLOBAL_VIEW_OPEN'] : $this->lang('GLOBAL_VIEW_OPEN'); ?>" /> 
            <?php echo isset($this->vars['L_TOPIC_TITLE']) ? $this->vars['L_TOPIC_TITLE'] : $this->lang('L_TOPIC_TITLE'); ?>
            <input class="post" type="text" size="15" maxlength="100" name="global_view_close" value="<?php echo isset($this->vars['GLOBAL_VIEW_CLOSE']) ? $this->vars['GLOBAL_VIEW_CLOSE'] : $this->lang('GLOBAL_VIEW_CLOSE'); ?>" /></td>
    </tr>
    <tr>
        <td class="row2" height="19" colspan="2"><center><?php echo isset($this->vars['L_MOVED']) ? $this->vars['L_MOVED'] : $this->lang('L_MOVED'); ?><br /><span class="gensmall"><?php echo isset($this->vars['L_TOPIC_EXPLAIN']) ? $this->vars['L_TOPIC_EXPLAIN'] : $this->lang('L_TOPIC_EXPLAIN'); ?></span></center></td>
    </tr>
        <tr>
        <td class="row1" height="19"><?php echo isset($this->vars['L_CURRENT']) ? $this->vars['L_CURRENT'] : $this->lang('L_CURRENT'); ?><p>
            <span class="gensmall"><?php echo isset($this->vars['L_CURRENT_EXPLAIN']) ? $this->vars['L_CURRENT_EXPLAIN'] : $this->lang('L_CURRENT_EXPLAIN'); ?></span></td>
        <td class="row2" height="19"><?php echo isset($this->vars['MOVED_CURRENT']) ? $this->vars['MOVED_CURRENT'] : $this->lang('MOVED_CURRENT'); ?></td>
    </tr>
    <tr>
        <td class="row1" height="22"><?php echo isset($this->vars['L_TAG']) ? $this->vars['L_TAG'] : $this->lang('L_TAG'); ?></td>
        <td class="row2" height="22">
            <input class="post" type="text" size="15" maxlength="100" name="moved_view_open" value="<?php echo isset($this->vars['MOVED_VIEW_OPEN']) ? $this->vars['MOVED_VIEW_OPEN'] : $this->lang('MOVED_VIEW_OPEN'); ?>" /> 
            <?php echo isset($this->vars['L_TOPIC_TITLE']) ? $this->vars['L_TOPIC_TITLE'] : $this->lang('L_TOPIC_TITLE'); ?>
            <input class="post" type="text" size="15" maxlength="100" name="moved_view_close" value="<?php echo isset($this->vars['MOVED_VIEW_CLOSE']) ? $this->vars['MOVED_VIEW_CLOSE'] : $this->lang('MOVED_VIEW_CLOSE'); ?>" /></td>
    </tr>
</table>
</span>