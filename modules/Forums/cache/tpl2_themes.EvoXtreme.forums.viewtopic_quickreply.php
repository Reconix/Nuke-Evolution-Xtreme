<?php

// eXtreme Styles mod cache. Generated on Tue, 29 Apr 2014 22:52:06 -0600 (time=1398833526)

?><script src="modules/Forums/bbcode_box/bbcode_box.js" type="text/javascript" >
</script>

<?php

$switch_open_qr_yes_count = ( isset($this->_tpldata['switch_open_qr_yes.']) ) ?  sizeof($this->_tpldata['switch_open_qr_yes.']) : 0;
for ($switch_open_qr_yes_i = 0; $switch_open_qr_yes_i < $switch_open_qr_yes_count; $switch_open_qr_yes_i++)
{
 $switch_open_qr_yes_item = &$this->_tpldata['switch_open_qr_yes.'][$switch_open_qr_yes_i];
 $switch_open_qr_yes_item['S_ROW_COUNT'] = $switch_open_qr_yes_i;
 $switch_open_qr_yes_item['S_NUM_ROWS'] = $switch_open_qr_yes_count;

?>
<div id="sqr" style="display: block; position: relative; ">
<?php

} // END switch_open_qr_yes

if(isset($switch_open_qr_yes_item)) { unset($switch_open_qr_yes_item); } 

?>
<?php

$switch_open_qr_no_count = ( isset($this->_tpldata['switch_open_qr_no.']) ) ?  sizeof($this->_tpldata['switch_open_qr_no.']) : 0;
for ($switch_open_qr_no_i = 0; $switch_open_qr_no_i < $switch_open_qr_no_count; $switch_open_qr_no_i++)
{
 $switch_open_qr_no_item = &$this->_tpldata['switch_open_qr_no.'][$switch_open_qr_no_i];
 $switch_open_qr_no_item['S_ROW_COUNT'] = $switch_open_qr_no_i;
 $switch_open_qr_no_item['S_NUM_ROWS'] = $switch_open_qr_no_count;

?>
<div id="sqr" style="display: none; position: relative; ">
<?php

} // END switch_open_qr_no

if(isset($switch_open_qr_no_item)) { unset($switch_open_qr_no_item); } 

?>
  <form action="<?php echo isset($this->vars['S_POST_ACTION']) ? $this->vars['S_POST_ACTION'] : $this->lang('S_POST_ACTION'); ?>" method="post" name="post" onsubmit="return checkForm(this)">
    <table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
      <tr>
        <th class="thHead" colspan="2" height="25"><strong><?php echo isset($this->vars['L_QUICK_REPLY']) ? $this->vars['L_QUICK_REPLY'] : $this->lang('L_QUICK_REPLY'); ?></strong></th>
      </tr>
      <?php

$switch_username_select_count = ( isset($this->_tpldata['switch_username_select.']) ) ?  sizeof($this->_tpldata['switch_username_select.']) : 0;
for ($switch_username_select_i = 0; $switch_username_select_i < $switch_username_select_count; $switch_username_select_i++)
{
 $switch_username_select_item = &$this->_tpldata['switch_username_select.'][$switch_username_select_i];
 $switch_username_select_item['S_ROW_COUNT'] = $switch_username_select_i;
 $switch_username_select_item['S_NUM_ROWS'] = $switch_username_select_count;

?>
      <tr>
        <td class="row1"><span class="gen"><strong><?php echo isset($this->vars['L_USERNAME']) ? $this->vars['L_USERNAME'] : $this->lang('L_USERNAME'); ?></strong></span></td>
        <td class="row2"><span class="genmed"> <input type="text" class="post" tabindex="1" name="username" size="25" maxlength="25" value="<?php echo isset($this->vars['USERNAME']) ? $this->vars['USERNAME'] : $this->lang('USERNAME'); ?>" />
          </span></td>
      </tr>
      <?php

} // END switch_username_select

if(isset($switch_username_select_item)) { unset($switch_username_select_item); } 

?>
      <tr>
        <td class="row1" width="22%"><span class="gen"><strong><?php echo isset($this->vars['L_SUBJECT']) ? $this->vars['L_SUBJECT'] : $this->lang('L_SUBJECT'); ?></strong></span></td>
        <td class="row2" width="78%"> <span class="gen">
        <input type="text" name="subject" size="45" maxlength="60" style="width:450px" tabindex="2" class="post" value="<?php echo isset($this->vars['SUBJECT']) ? $this->vars['SUBJECT'] : $this->lang('SUBJECT'); ?>" />
          </span> </td>
      </tr>
      <tr>
        <td class="row1" valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
              <td><span class="gen"><strong><?php echo isset($this->vars['L_MESSAGE_BODY']) ? $this->vars['L_MESSAGE_BODY'] : $this->lang('L_MESSAGE_BODY'); ?></strong></span> </td>
            </tr>
            <?php

$switch_advanced_qr_count = ( isset($this->_tpldata['switch_advanced_qr.']) ) ?  sizeof($this->_tpldata['switch_advanced_qr.']) : 0;
for ($switch_advanced_qr_i = 0; $switch_advanced_qr_i < $switch_advanced_qr_count; $switch_advanced_qr_i++)
{
 $switch_advanced_qr_item = &$this->_tpldata['switch_advanced_qr.'][$switch_advanced_qr_i];
 $switch_advanced_qr_item['S_ROW_COUNT'] = $switch_advanced_qr_i;
 $switch_advanced_qr_item['S_NUM_ROWS'] = $switch_advanced_qr_count;

?>
            <tr>
              <td valign="middle" align="center"> <br />
              <table width="100" border="0" cellspacing="0" cellpadding="5">
                  <tr align="center">
                    <td colspan="<?php echo isset($this->vars['S_SMILIES_COLSPAN']) ? $this->vars['S_SMILIES_COLSPAN'] : $this->lang('S_SMILIES_COLSPAN'); ?>" class="gensmall"><strong><?php echo isset($this->vars['L_EMOTICONS']) ? $this->vars['L_EMOTICONS'] : $this->lang('L_EMOTICONS'); ?></strong></td>
                  </tr>
                  <?php

} // END switch_advanced_qr

if(isset($switch_advanced_qr_item)) { unset($switch_advanced_qr_item); } 

?>
                  <?php

$smilies_row_count = ( isset($this->_tpldata['smilies_row.']) ) ?  sizeof($this->_tpldata['smilies_row.']) : 0;
for ($smilies_row_i = 0; $smilies_row_i < $smilies_row_count; $smilies_row_i++)
{
 $smilies_row_item = &$this->_tpldata['smilies_row.'][$smilies_row_i];
 $smilies_row_item['S_ROW_COUNT'] = $smilies_row_i;
 $smilies_row_item['S_NUM_ROWS'] = $smilies_row_count;

?>
                  <tr align="center" valign="middle">
                    <?php

$smilies_col_count = ( isset($smilies_row_item['smilies_col.']) ) ? sizeof($smilies_row_item['smilies_col.']) : 0;
for ($smilies_col_i = 0; $smilies_col_i < $smilies_col_count; $smilies_col_i++)
{
 $smilies_col_item = &$smilies_row_item['smilies_col.'][$smilies_col_i];
 $smilies_col_item['S_ROW_COUNT'] = $smilies_col_i;
 $smilies_col_item['S_NUM_ROWS'] = $smilies_col_count;

?>
                    <!-- <td><a href="javascript:emoticon('<?php echo isset($smilies_col_item['SMILEY_CODE']) ? $smilies_col_item['SMILEY_CODE'] : ''; ?>')"><img src="<?php echo isset($smilies_col_item['SMILEY_IMG']) ? $smilies_col_item['SMILEY_IMG'] : ''; ?>" border="0" alt="<?php echo isset($smilies_col_item['SMILEY_DESC']) ? $smilies_col_item['SMILEY_DESC'] : ''; ?>" title="<?php echo isset($smilies_col_item['SMILEY_DESC']) ? $smilies_col_item['SMILEY_DESC'] : ''; ?>" /></a></td>-->
                    <td><img src="<?php echo isset($smilies_col_item['SMILEY_IMG']) ? $smilies_col_item['SMILEY_IMG'] : ''; ?>" border="0" onmouseover="this.style.cursor='pointer';" onclick="emoticon('<?php echo isset($smilies_col_item['SMILEY_CODE']) ? $smilies_col_item['SMILEY_CODE'] : ''; ?>');" alt="<?php echo isset($smilies_col_item['SMILEY_DESC']) ? $smilies_col_item['SMILEY_DESC'] : ''; ?>" title="<?php echo isset($smilies_col_item['SMILEY_DESC']) ? $smilies_col_item['SMILEY_DESC'] : ''; ?>" /></td>
                    <?php

} // END smilies_col

if(isset($smilies_col_item)) { unset($smilies_col_item); } 

?>
                  </tr>
                  <?php

} // END smilies_row

if(isset($smilies_row_item)) { unset($smilies_row_item); } 

?>
                  <?php

$switch_smilies_extra_count = ( isset($this->_tpldata['switch_smilies_extra.']) ) ?  sizeof($this->_tpldata['switch_smilies_extra.']) : 0;
for ($switch_smilies_extra_i = 0; $switch_smilies_extra_i < $switch_smilies_extra_count; $switch_smilies_extra_i++)
{
 $switch_smilies_extra_item = &$this->_tpldata['switch_smilies_extra.'][$switch_smilies_extra_i];
 $switch_smilies_extra_item['S_ROW_COUNT'] = $switch_smilies_extra_i;
 $switch_smilies_extra_item['S_NUM_ROWS'] = $switch_smilies_extra_count;

?>
                  <tr align="center">
                    <td colspan="<?php echo isset($this->vars['S_SMILIES_COLSPAN']) ? $this->vars['S_SMILIES_COLSPAN'] : $this->lang('S_SMILIES_COLSPAN'); ?>"><span  class="nav"><a href="<?php echo isset($this->vars['U_MORE_SMILIES']) ? $this->vars['U_MORE_SMILIES'] : $this->lang('U_MORE_SMILIES'); ?>" onclick="window.open('<?php echo isset($this->vars['U_MORE_SMILIES']) ? $this->vars['U_MORE_SMILIES'] : $this->lang('U_MORE_SMILIES'); ?>', '_phpbbsmilies', 'HEIGHT=300,resizable=yes,scrollbars=yes,WIDTH=500');return false;" target="_phpbbsmilies" class="nav"><?php echo isset($this->vars['L_MORE_SMILIES']) ? $this->vars['L_MORE_SMILIES'] : $this->lang('L_MORE_SMILIES'); ?></a></span></td>
                  </tr>
                  <?php

} // END switch_smilies_extra

if(isset($switch_smilies_extra_item)) { unset($switch_smilies_extra_item); } 

?>
                  <?php

$switch_advanced_qr_count = ( isset($this->_tpldata['switch_advanced_qr.']) ) ?  sizeof($this->_tpldata['switch_advanced_qr.']) : 0;
for ($switch_advanced_qr_i = 0; $switch_advanced_qr_i < $switch_advanced_qr_count; $switch_advanced_qr_i++)
{
 $switch_advanced_qr_item = &$this->_tpldata['switch_advanced_qr.'][$switch_advanced_qr_i];
 $switch_advanced_qr_item['S_ROW_COUNT'] = $switch_advanced_qr_i;
 $switch_advanced_qr_item['S_NUM_ROWS'] = $switch_advanced_qr_count;

?>
                </table>
                </td>
            </tr>
            <?php

} // END switch_advanced_qr

if(isset($switch_advanced_qr_item)) { unset($switch_advanced_qr_item); } 

?>
          </table>
      </td>
	<td class="row2" valign="top"><span class="gen"><span class="genmed"></span> 
		<table id="posttable" width="100%" border="1" bordercolor="#C0C0C0" style="border-collapse: collapse;" cellspacing="0" cellpadding="0" valign="top">
		<?php

$switch_advanced_qr_count = ( isset($this->_tpldata['switch_advanced_qr.']) ) ?  sizeof($this->_tpldata['switch_advanced_qr.']) : 0;
for ($switch_advanced_qr_i = 0; $switch_advanced_qr_i < $switch_advanced_qr_count; $switch_advanced_qr_i++)
{
 $switch_advanced_qr_item = &$this->_tpldata['switch_advanced_qr.'][$switch_advanced_qr_i];
 $switch_advanced_qr_item['S_ROW_COUNT'] = $switch_advanced_qr_i;
 $switch_advanced_qr_item['S_NUM_ROWS'] = $switch_advanced_qr_count;

?>
		  <tr align="right" valign="middle"> 
			<td valign="center">
				<table width="100%" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
					<tr>
                        <!--<td class="row2" valign="middle"><img src="modules/Forums/bbcode_box/images/dots.gif" style="padding-left: 4px;"></td>-->
                        <td class="row2">
							<table cellpadding="0" cellspacing="0" border="0" width="100%">
								<tr>
									<td align="left" width="70%">
                                        <select name="addbbcode19" style="height: 20px;" onchange="bbfontstyle('[font=' + this.form.addbbcode19.options[this.form.addbbcode19.selectedIndex].value + ']', '[/font]');this.selectedIndex=0;" onMouseOver="helpline('ft')">
											<option style="font-weight : bold;" selected="selected">Font type</option>
											<option value="Arial">Default font</option>
											<option style="font-family: Arial;" value="Arial" class="genmed">Arial</option> 
											<option style="font-family: Arial Black;" value="Arial Black" class="genmed">Arial Black</option> 
											<option style="font-family: Century Gothic;" value="Century Gothic" class="genmed">Century Gothic</option>
											<option style="font-family: Comic Sans MS;" value="Comic Sans MS" class="genmed">Comic Sans MS</option> 
											<option style="font-family: Courier New;" value="Courier New" class="genmed">Courier New</option>
											<option style="font-family: Georgia;" value="Georgia" class="genmed">Georgia</option> 
											<option style="font-family: Lucida Console;"value="Lucida Console">Lucida Console</option>
											<option style="font-family: Microsoft Sans Serif;" value="Microsoft Sans Serif" class="genmed">Microsoft Sans Serif</option> 
											<option style="font-family: Symbol;" value="Symbol" class="genmed">Symbol</option> 
											<option style="font-family: Tahoma;" value="Tahoma" class="genmed">Tahoma</option>
											<option style="font-family: Trebuchet;" value="Trebuchet" class="genmed">Trebuchet</option> 
											<option style="font-family: Times New Roman;" value="Times New Roman" class="genmed">Times New Roman</option> 
											<option style="font-family: Verdana;" value="Verdana" class="genmed">Verdana</option> 
										</select>
                                        <select name="addbbcode20" style="height: 20px;" onchange="bbfontstyle('[size=' + this.form.addbbcode20.options[this.form.addbbcode20.selectedIndex].value + ']', '[/size]');this.selectedIndex=0;" onMouseOver="helpline('fs')">
											<option style="font-weight : bold;" selected="selected">Font Size</option>
											<option style="font-size: 8px;" value="8" class="genmed"><?php echo isset($this->vars['L_FONT_TINY']) ? $this->vars['L_FONT_TINY'] : $this->lang('L_FONT_TINY'); ?></option>
											<option style="font-size: 10px;" value="10" class="genmed"><?php echo isset($this->vars['L_FONT_SMALL']) ? $this->vars['L_FONT_SMALL'] : $this->lang('L_FONT_SMALL'); ?></option>
											<option style="font-size: 12px;" value="12" class="genmed"><?php echo isset($this->vars['L_FONT_NORMAL']) ? $this->vars['L_FONT_NORMAL'] : $this->lang('L_FONT_NORMAL'); ?></option>
											<option style="font-size: 18px;" value="18" class="genmed"><?php echo isset($this->vars['L_FONT_LARGE']) ? $this->vars['L_FONT_LARGE'] : $this->lang('L_FONT_LARGE'); ?></option>
											<option style="font-size: 24px;" value="24" class="genmed"><?php echo isset($this->vars['L_FONT_HUGE']) ? $this->vars['L_FONT_HUGE'] : $this->lang('L_FONT_HUGE'); ?></option>
										</select>
                                        <select name="addbbcode18" style="height: 20px;" onchange="bbfontstyle('[color=' + this.form.addbbcode18.options[this.form.addbbcode18.selectedIndex].value + ']', '[/color]');this.selectedIndex=0;" onMouseOver="helpline('fc')">
											<option style="font-weight : bold;" selected="selected">Font Color</option>
											<option style="color:black;" value="<?php echo isset($this->vars['T_FONTCOLOR1']) ? $this->vars['T_FONTCOLOR1'] : $this->lang('T_FONTCOLOR1'); ?>"><?php echo isset($this->vars['L_COLOR_DEFAULT']) ? $this->vars['L_COLOR_DEFAULT'] : $this->lang('L_COLOR_DEFAULT'); ?></option>
											<option value="darkred"><?php echo isset($this->vars['L_COLOR_DARK_RED']) ? $this->vars['L_COLOR_DARK_RED'] : $this->lang('L_COLOR_DARK_RED'); ?></option>
											<option style="color:red; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="red" class="genmed"><?php echo isset($this->vars['L_COLOR_RED']) ? $this->vars['L_COLOR_RED'] : $this->lang('L_COLOR_RED'); ?></option>
											<option style="color:orange; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="orange" class="genmed"><?php echo isset($this->vars['L_COLOR_ORANGE']) ? $this->vars['L_COLOR_ORANGE'] : $this->lang('L_COLOR_ORANGE'); ?></option>
											<option style="color:brown; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="brown" class="genmed"><?php echo isset($this->vars['L_COLOR_BROWN']) ? $this->vars['L_COLOR_BROWN'] : $this->lang('L_COLOR_BROWN'); ?></option>
											<option style="color:yellow; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="yellow" class="genmed"><?php echo isset($this->vars['L_COLOR_YELLOW']) ? $this->vars['L_COLOR_YELLOW'] : $this->lang('L_COLOR_YELLOW'); ?></option>
											<option style="color:green; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="green" class="genmed"><?php echo isset($this->vars['L_COLOR_GREEN']) ? $this->vars['L_COLOR_GREEN'] : $this->lang('L_COLOR_GREEN'); ?></option>
											<option style="color:olive; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="olive" class="genmed"><?php echo isset($this->vars['L_COLOR_OLIVE']) ? $this->vars['L_COLOR_OLIVE'] : $this->lang('L_COLOR_OLIVE'); ?></option>
											<option style="color:cyan; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="cyan" class="genmed"><?php echo isset($this->vars['L_COLOR_CYAN']) ? $this->vars['L_COLOR_CYAN'] : $this->lang('L_COLOR_CYAN'); ?></option>
											<option style="color:blue; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="blue" class="genmed"><?php echo isset($this->vars['L_COLOR_BLUE']) ? $this->vars['L_COLOR_BLUE'] : $this->lang('L_COLOR_BLUE'); ?></option>
											<option style="color:darkblue; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="darkblue" class="genmed"><?php echo isset($this->vars['L_COLOR_DARK_BLUE']) ? $this->vars['L_COLOR_DARK_BLUE'] : $this->lang('L_COLOR_DARK_BLUE'); ?></option>
											<option style="color:indigo; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="indigo" class="genmed"><?php echo isset($this->vars['L_COLOR_INDIGO']) ? $this->vars['L_COLOR_INDIGO'] : $this->lang('L_COLOR_INDIGO'); ?></option>
											<option style="color:violet; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="violet" class="genmed"><?php echo isset($this->vars['L_COLOR_VIOLET']) ? $this->vars['L_COLOR_VIOLET'] : $this->lang('L_COLOR_VIOLET'); ?></option>
											<option style="color:white; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="white" class="genmed"><?php echo isset($this->vars['L_COLOR_WHITE']) ? $this->vars['L_COLOR_WHITE'] : $this->lang('L_COLOR_WHITE'); ?></option>
											<option style="color:black; background-color: <?php echo isset($this->vars['T_TD_COLOR1']) ? $this->vars['T_TD_COLOR1'] : $this->lang('T_TD_COLOR1'); ?>" value="black" class="genmed"><?php echo isset($this->vars['L_COLOR_BLACK']) ? $this->vars['L_COLOR_BLACK'] : $this->lang('L_COLOR_BLACK'); ?></option>
										</select>
									</td>
									<td align="right" width="30%"><a href="http://hvmdesign.com/" class="gensmall" title="Advanced BBCode Box v5.0.0 MOD - by Disturbed One - www.HVMDesign.com" target="blank">&copy;</a></td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr height="28">
                        <!--<td class="row2" valign="middle"><img src="modules/Forums/bbcode_box/images/dots.gif" style="padding-left: 4px;"></td>-->
                        <td class="row2" valign="middle">
                            <img src="modules/Forums/bbcode_box/images/justify.gif" class="postimage" name="justify" type="image" onClick="BBCjustify()" onMouseOver="helpline('justify')" alt="justify"><img border="0" src="modules/Forums/bbcode_box/images/right.gif" name="right" type="image" onClick="BBCright()" onMouseOver="helpline('right')" class="postimage" alt="right"><img border="0" src="modules/Forums/bbcode_box/images/center.gif" name="center" type="image" onClick="BBCcenter()" onMouseOver="helpline('center')" class="postimage" alt="center"><img border="0" src="modules/Forums/bbcode_box/images/left.gif" name="left" type="image" onClick="BBCleft()" onMouseOver="helpline('left')" class="postimage" alt="left"><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/sup.gif" class="postimage" name="supscript" type="image" onClick="BBCsup()" onMouseOver="helpline('sup')" alt="" /><img border="0" src="modules/Forums/bbcode_box/images/sub.gif" name="subs" class="postimage" type="image" onClick="BBCsub()" onMouseOver="helpline('sub')" alt="" /><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/bold.gif" name="bold" type="image" onClick="BBCbold()" onMouseOver="helpline('b')" class="postimage" alt="bold"><img border="0" src="modules/Forums/bbcode_box/images/italic.gif" name="italic" type="image" onClick="BBCitalic()" onMouseOver="helpline('i')" class="postimage" alt="italic"><img border="0" src="modules/Forums/bbcode_box/images/under.gif" name="under" type="image" onClick="BBCunder()" onMouseOver="helpline('u')" class="postimage" alt="under line"><img border="0" src="modules/Forums/bbcode_box/images/strike.gif" class="postimage" name="strik" type="image" onClick="BBCstrike()" onMouseOver="helpline('strike')" alt="" /><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/fade.gif" name="fade" type="image" onClick="BBCfade()" onMouseOver="helpline('fade')" class="postimage" alt="fade"><img border="0" src="modules/Forums/bbcode_box/images/grad.gif" name="grad" type="image" onClick="BBCgrad()" onMouseOver="helpline('grad')" class="postimage" alt="gradient"><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/rtl.gif" name="dirrtl" type="image" onClick="BBCdir('rtl')" onMouseOver="helpline('rtl')" class="postimage" alt="Right to Left"><img border="0" src="modules/Forums/bbcode_box/images/ltr.gif" name="dirltr" type="image" onClick="BBCdir('ltr')" onMouseOver="helpline('ltr')" class="postimage" alt="Left to Right"><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/marqd.gif" name="marqd" type="image" onClick="BBCmarqd()" onMouseOver="helpline('marqd')" class="postimage" alt="Marque to down"><img border="0" src="modules/Forums/bbcode_box/images/marqu.gif" name="marqu" type="image" onClick="BBCmarqu()" onMouseOver="helpline('marqu')" class="postimage" alt="Marque to up"><img border="0" src="modules/Forums/bbcode_box/images/marql.gif" name="marql" type="image" onClick="BBCmarql()" onMouseOver="helpline('marql')" class="postimage" alt="Marque to left"><img border="0" src="modules/Forums/bbcode_box/images/marqr.gif" name="marqr" type="image" onClick="BBCmarqr()" onMouseOver="helpline('marqr')" class="postimage" alt="Marque to right">
                        </td>
                    </tr>
                    <tr height="28">
                        <!--<td class="row2" valign="middle"><img src="modules/Forums/bbcode_box/images/dots.gif" style="padding-left: 4px;"></td>-->
                        <td class="row2" valign="middle">
                            <img border="0" src="modules/Forums/bbcode_box/images/code.gif" name="code" type="image" onClick="BBCcode()" onMouseOver="helpline('code')" class="postimage" alt="Code"><img border="0" src="modules/Forums/bbcode_box/images/php.gif" name="php" type="image" onClick="BBCphp()" onMouseOver="helpline('php')" class="postimage" alt="Php"><img border="0" src="modules/Forums/bbcode_box/images/quote.gif" name="quote" type="image" onClick="BBCquote()" onMouseOver="helpline('quote')" class="postimage" alt="Quote"><img border="0" src="modules/Forums/bbcode_box/images/spoil.gif" class="postimage" name="spoil" type="image" onClick="BBCspoil()" onMouseOver="helpline('spoil')" alt="" /><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/url.gif" name="url" type="image" onClick="BBCurl()" onMouseOver="helpline('url')" class="postimage" alt="URL"><img border="0" src="modules/Forums/bbcode_box/images/email.gif" name="email" type="image" onClick="BBCmail()" onMouseOver="helpline('mail')" class="postimage" alt="Email"><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="20" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/img.gif" name="img" type="image" onClick="BBCimg()" onMouseOver="helpline('img')" class="postimage" alt="Image"><img border="0" src="modules/Forums/bbcode_box/images/lytebox.gif" name="img" type="image" onClick="BBClytebox()" onMouseOver="helpline('lytebox')" class="postimage" alt="Lytebox"><img border="0" src="modules/Forums/bbcode_box/images/hide.gif" name="hide" type="image" onClick="BBChide()" onMouseOver="helpline('h')" class="postimage"alt="Image"><img border="0" src="modules/Forums/bbcode_box/images/flash.gif" name="flash" type="image" onClick="BBCflash()" onMouseOver="helpline('flash')" class="postimage" alt="Flash"><img border="0" src="modules/Forums/bbcode_box/images/video.gif" name="video" type="image" onClick="BBCvideo()" onMouseOver="helpline('video')" class="postimage" alt="Video"><img border="0" src="modules/Forums/bbcode_box/images/sound.gif" name="stream" type="image" onClick="BBCstream()" onMouseOver="helpline('stream')" class="postimage" alt="Stream"><img border="0" src="modules/Forums/bbcode_box/images/ram.gif" name="ram" type="image" onClick="BBCram()" onMouseOver="helpline('ram')" class="postimage" alt="Real Media"><img border="0" src="modules/Forums/bbcode_box/images/googlevid.gif" name="GVideo" type="image" onClick="BBCGVideo()" onMouseOver="helpline('googlevid')" class="postimage" alt="GoogleVid"><img border="0" src="modules/Forums/bbcode_box/images/youtube.gif" name="youtube" type="image" onClick="BBCyoutube()" onMouseOver="helpline('youtube')" class="postimage" alt="Youtube"><img border="0" src="modules/Forums/bbcode_box/images/photohost.gif" name="photohost" type="image" onClick="BBCphotohost()" onMouseOver="helpline('photohost')" class="postimage" alt="Photo Host"><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/list.gif" name="listdf" type="image" onClick="BBClist()" onMouseOver="helpline('list')" class="postimage" alt="List" /><img border="0" src="modules/Forums/bbcode_box/images/hr.gif" name="hr" type="image" onClick="BBChr()" onMouseOver="helpline('hr')" class="postimage" alt="H-Line"><img style="padding-left: 5px; padding-right: 5px;" src="modules/Forums/bbcode_box/images/blackdot.gif" width="1" height="100%" border="0" alt=""><img border="0" src="modules/Forums/bbcode_box/images/plain.gif" name="plain" type="image" onClick="BBCplain()" onMouseOver="helpline('plain')" class="postimage" alt="Remove BBcode">
                        </td> 
                    </tr>
                </table>
			</td>
		  </tr>
		  <tr> 
			<td colspan="9"><span class="gensmall"> 
			  <input type="text" name="helpbox" size="45" maxlength="100" style="width:100%; font-size:10px" class="helpline" value="<?php echo isset($this->vars['L_STYLES_TIP']) ? $this->vars['L_STYLES_TIP'] : $this->lang('L_STYLES_TIP'); ?>" /></span>
			 </td>
		  </tr>
		  <?php

} // END switch_advanced_qr

if(isset($switch_advanced_qr_item)) { unset($switch_advanced_qr_item); } 

?>
		  <tr> 
			<td colspan="9">
				<span class="gen"><textarea name="message" rows="15" cols="35" style="width:100%; border: 0px;" tabindex="3" class="post" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);"><?php echo isset($this->vars['MESSAGE']) ? $this->vars['MESSAGE'] : $this->lang('MESSAGE'); ?></textarea></span>
			</td>
		  </tr>
			
          </table>
          </span></td>
      </tr>
      <?php

$switch_advanced_qr_count = ( isset($this->_tpldata['switch_advanced_qr.']) ) ?  sizeof($this->_tpldata['switch_advanced_qr.']) : 0;
for ($switch_advanced_qr_i = 0; $switch_advanced_qr_i < $switch_advanced_qr_count; $switch_advanced_qr_i++)
{
 $switch_advanced_qr_item = &$this->_tpldata['switch_advanced_qr.'][$switch_advanced_qr_i];
 $switch_advanced_qr_item['S_ROW_COUNT'] = $switch_advanced_qr_i;
 $switch_advanced_qr_item['S_NUM_ROWS'] = $switch_advanced_qr_count;

?>
      <tr>
        <td class="row1" valign="top"><span class="gen"><strong><?php echo isset($this->vars['L_OPTIONS']) ? $this->vars['L_OPTIONS'] : $this->lang('L_OPTIONS'); ?></strong></span><br /><span class="gensmall"><?php echo isset($this->vars['HTML_STATUS']) ? $this->vars['HTML_STATUS'] : $this->lang('HTML_STATUS'); ?><br /><?php echo isset($this->vars['BBCODE_STATUS']) ? $this->vars['BBCODE_STATUS'] : $this->lang('BBCODE_STATUS'); ?><br /><?php echo isset($this->vars['SMILIES_STATUS']) ? $this->vars['SMILIES_STATUS'] : $this->lang('SMILIES_STATUS'); ?></span></td>
        <td class="row2"><span class="gen"> </span>
        <table cellspacing="0" cellpadding="1" border="0">
          <?php

$switch_html_checkbox_count = ( isset($switch_advanced_qr_item['switch_html_checkbox.']) ) ? sizeof($switch_advanced_qr_item['switch_html_checkbox.']) : 0;
for ($switch_html_checkbox_i = 0; $switch_html_checkbox_i < $switch_html_checkbox_count; $switch_html_checkbox_i++)
{
 $switch_html_checkbox_item = &$switch_advanced_qr_item['switch_html_checkbox.'][$switch_html_checkbox_i];
 $switch_html_checkbox_item['S_ROW_COUNT'] = $switch_html_checkbox_i;
 $switch_html_checkbox_item['S_NUM_ROWS'] = $switch_html_checkbox_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="disable_html" <?php echo isset($this->vars['S_HTML_CHECKED']) ? $this->vars['S_HTML_CHECKED'] : $this->lang('S_HTML_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_DISABLE_HTML']) ? $this->vars['L_DISABLE_HTML'] : $this->lang('L_DISABLE_HTML'); ?></span></td>
          </tr>
          <?php

} // END switch_html_checkbox

if(isset($switch_html_checkbox_item)) { unset($switch_html_checkbox_item); } 

?>
          <?php

$switch_bbcode_checkbox_count = ( isset($switch_advanced_qr_item['switch_bbcode_checkbox.']) ) ? sizeof($switch_advanced_qr_item['switch_bbcode_checkbox.']) : 0;
for ($switch_bbcode_checkbox_i = 0; $switch_bbcode_checkbox_i < $switch_bbcode_checkbox_count; $switch_bbcode_checkbox_i++)
{
 $switch_bbcode_checkbox_item = &$switch_advanced_qr_item['switch_bbcode_checkbox.'][$switch_bbcode_checkbox_i];
 $switch_bbcode_checkbox_item['S_ROW_COUNT'] = $switch_bbcode_checkbox_i;
 $switch_bbcode_checkbox_item['S_NUM_ROWS'] = $switch_bbcode_checkbox_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="disable_bbcode" <?php echo isset($this->vars['S_BBCODE_CHECKED']) ? $this->vars['S_BBCODE_CHECKED'] : $this->lang('S_BBCODE_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_DISABLE_BBCODE']) ? $this->vars['L_DISABLE_BBCODE'] : $this->lang('L_DISABLE_BBCODE'); ?></span></td>
          </tr>
          <?php

} // END switch_bbcode_checkbox

if(isset($switch_bbcode_checkbox_item)) { unset($switch_bbcode_checkbox_item); } 

?>
          <?php

$switch_smilies_checkbox_count = ( isset($switch_advanced_qr_item['switch_smilies_checkbox.']) ) ? sizeof($switch_advanced_qr_item['switch_smilies_checkbox.']) : 0;
for ($switch_smilies_checkbox_i = 0; $switch_smilies_checkbox_i < $switch_smilies_checkbox_count; $switch_smilies_checkbox_i++)
{
 $switch_smilies_checkbox_item = &$switch_advanced_qr_item['switch_smilies_checkbox.'][$switch_smilies_checkbox_i];
 $switch_smilies_checkbox_item['S_ROW_COUNT'] = $switch_smilies_checkbox_i;
 $switch_smilies_checkbox_item['S_NUM_ROWS'] = $switch_smilies_checkbox_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="disable_smilies" <?php echo isset($this->vars['S_SMILIES_CHECKED']) ? $this->vars['S_SMILIES_CHECKED'] : $this->lang('S_SMILIES_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_DISABLE_SMILIES']) ? $this->vars['L_DISABLE_SMILIES'] : $this->lang('L_DISABLE_SMILIES'); ?></span></td>
          </tr>
          <?php

} // END switch_smilies_checkbox

if(isset($switch_smilies_checkbox_item)) { unset($switch_smilies_checkbox_item); } 

?>
          <?php

$switch_signature_checkbox_count = ( isset($switch_advanced_qr_item['switch_signature_checkbox.']) ) ? sizeof($switch_advanced_qr_item['switch_signature_checkbox.']) : 0;
for ($switch_signature_checkbox_i = 0; $switch_signature_checkbox_i < $switch_signature_checkbox_count; $switch_signature_checkbox_i++)
{
 $switch_signature_checkbox_item = &$switch_advanced_qr_item['switch_signature_checkbox.'][$switch_signature_checkbox_i];
 $switch_signature_checkbox_item['S_ROW_COUNT'] = $switch_signature_checkbox_i;
 $switch_signature_checkbox_item['S_NUM_ROWS'] = $switch_signature_checkbox_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="attach_sig" <?php echo isset($this->vars['S_SIGNATURE_CHECKED']) ? $this->vars['S_SIGNATURE_CHECKED'] : $this->lang('S_SIGNATURE_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_ATTACH_SIGNATURE']) ? $this->vars['L_ATTACH_SIGNATURE'] : $this->lang('L_ATTACH_SIGNATURE'); ?></span></td>
          </tr>
          <?php

} // END switch_signature_checkbox

if(isset($switch_signature_checkbox_item)) { unset($switch_signature_checkbox_item); } 

?>
          <?php

$switch_notify_checkbox_count = ( isset($switch_advanced_qr_item['switch_notify_checkbox.']) ) ? sizeof($switch_advanced_qr_item['switch_notify_checkbox.']) : 0;
for ($switch_notify_checkbox_i = 0; $switch_notify_checkbox_i < $switch_notify_checkbox_count; $switch_notify_checkbox_i++)
{
 $switch_notify_checkbox_item = &$switch_advanced_qr_item['switch_notify_checkbox.'][$switch_notify_checkbox_i];
 $switch_notify_checkbox_item['S_ROW_COUNT'] = $switch_notify_checkbox_i;
 $switch_notify_checkbox_item['S_NUM_ROWS'] = $switch_notify_checkbox_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="notify" <?php echo isset($this->vars['S_NOTIFY_CHECKED']) ? $this->vars['S_NOTIFY_CHECKED'] : $this->lang('S_NOTIFY_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_NOTIFY_ON_REPLY']) ? $this->vars['L_NOTIFY_ON_REPLY'] : $this->lang('L_NOTIFY_ON_REPLY'); ?></span></td>
          </tr>
          <?php

} // END switch_notify_checkbox

if(isset($switch_notify_checkbox_item)) { unset($switch_notify_checkbox_item); } 

?>
          <?php

$switch_lock_topic_count = ( isset($switch_advanced_qr_item['switch_lock_topic.']) ) ? sizeof($switch_advanced_qr_item['switch_lock_topic.']) : 0;
for ($switch_lock_topic_i = 0; $switch_lock_topic_i < $switch_lock_topic_count; $switch_lock_topic_i++)
{
 $switch_lock_topic_item = &$switch_advanced_qr_item['switch_lock_topic.'][$switch_lock_topic_i];
 $switch_lock_topic_item['S_ROW_COUNT'] = $switch_lock_topic_i;
 $switch_lock_topic_item['S_NUM_ROWS'] = $switch_lock_topic_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="lock" <?php echo isset($this->vars['S_LOCK_CHECKED']) ? $this->vars['S_LOCK_CHECKED'] : $this->lang('S_LOCK_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_LOCK_TOPIC']) ? $this->vars['L_LOCK_TOPIC'] : $this->lang('L_LOCK_TOPIC'); ?></span></td>
          </tr>
          <?php

} // END switch_lock_topic

if(isset($switch_lock_topic_item)) { unset($switch_lock_topic_item); } 

?>
          <?php

$switch_unlock_topic_count = ( isset($switch_advanced_qr_item['switch_unlock_topic.']) ) ? sizeof($switch_advanced_qr_item['switch_unlock_topic.']) : 0;
for ($switch_unlock_topic_i = 0; $switch_unlock_topic_i < $switch_unlock_topic_count; $switch_unlock_topic_i++)
{
 $switch_unlock_topic_item = &$switch_advanced_qr_item['switch_unlock_topic.'][$switch_unlock_topic_i];
 $switch_unlock_topic_item['S_ROW_COUNT'] = $switch_unlock_topic_i;
 $switch_unlock_topic_item['S_NUM_ROWS'] = $switch_unlock_topic_count;

?>
          <tr> 
            <td> 
              <input type="checkbox" name="unlock" <?php echo isset($this->vars['S_UNLOCK_CHECKED']) ? $this->vars['S_UNLOCK_CHECKED'] : $this->lang('S_UNLOCK_CHECKED'); ?> value="ON" />
            </td>
            <td><span class="gen"><?php echo isset($this->vars['L_UNLOCK_TOPIC']) ? $this->vars['L_UNLOCK_TOPIC'] : $this->lang('L_UNLOCK_TOPIC'); ?></span></td>
          </tr>        

          <?php

} // END switch_unlock_topic

if(isset($switch_unlock_topic_item)) { unset($switch_unlock_topic_item); } 

?>

          </table></td>
      </tr>
      <?php

} // END switch_advanced_qr

if(isset($switch_advanced_qr_item)) { unset($switch_advanced_qr_item); } 

?>
    <tr> 
      <td class="catBottom" colspan="2" align="center" height="28"><?php echo isset($this->vars['S_HIDDEN_FORM_FIELDS']) ? $this->vars['S_HIDDEN_FORM_FIELDS'] : $this->lang('S_HIDDEN_FORM_FIELDS'); ?><input type="submit" tabindex="5" name="preview" class="mainoption" value="<?php echo isset($this->vars['L_PREVIEW']) ? $this->vars['L_PREVIEW'] : $this->lang('L_PREVIEW'); ?>" />&nbsp;&nbsp;<input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="<?php echo isset($this->vars['L_SUBMIT']) ? $this->vars['L_SUBMIT'] : $this->lang('L_SUBMIT'); ?>" /></td>
    </tr>
  </table>

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
    <tr> 
      <td align="right" valign="top"><span class="gensmall"><?php echo isset($this->vars['S_TIMEZONE']) ? $this->vars['S_TIMEZONE'] : $this->lang('S_TIMEZONE'); ?></span></td>
    </tr>
  </table>
</form>
</div>