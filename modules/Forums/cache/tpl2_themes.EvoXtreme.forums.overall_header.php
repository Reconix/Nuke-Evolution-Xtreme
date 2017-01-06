<?php

// eXtreme Styles mod cache. Generated on Tue, 29 Apr 2014 22:52:01 -0600 (time=1398833521)

?><?php echo isset($this->vars['META']) ? $this->vars['META'] : $this->lang('META'); ?>

<script type="text/javascript">
function postThank(method){
	(function($){
		var showThank = (method == 'show') ? 'block' : 'none';
		var hideThank = (method == 'show') ? 'none' : 'block';
		
		$('#show_thank').css('display', showThank);
		$('#hide_thank').css('display', hideThank);
	})(jQuery);
}

/**
 * @doDMarquee
 * 
 * Code updated to use jQuery by SgtLegend
 * Updated: 30/12/2010
 */
var oMarquees = [], oMrunning,
oMInterv    = 20,     // interval between increments
oMStep      = 1,      // number of pixels to move between increments
oMDirection = 'left'; // 'left' for LTR text, 'right' for RTL text

/***     Do not edit anything after here     ***/

function doDMarquee(){ 
	(function($){
		if (oMarquees.length) return;
		
		var divList = $('div'), oDiv, oSide;
		
		for(var i=0; i<divList.length; i++){
			oDiv = $(divList[i]), oSide = {whiteSpace: 'nowrap', position: 'absolute', top: 0};

			if (oDiv.hasClass('dmarquee')){
				var children = oDiv.find('div');
				$(children[0]).css({overflow: 'hidden', position: 'relative', height: oDiv.height()});
				
				oSide[oMDirection] = oDiv.width();
				$(children[1]).css(oSide);
				
				oDiv.bind({
					mouseover: function(){
						$(children[1]).css(oMDirection, $(children[1]).css('left'));
						clearInterval(oMrunning);
					},
					mouseout: function(){
						oMrunning = setInterval('aniMarquee()', oMInterv);
					}
				});

				oMarquees[oMarquees.length] = oDiv;
				i += 2;
			}
		}
	})(jQuery);

	oMrunning = setInterval('aniMarquee()', oMInterv); 
}

function aniMarquee(){
	(function($){
		var oDiv, oPos;
		
		for(var i=0; i<oMarquees.length; i++){
			oDiv = oMarquees[i].find('div'), oDiv = $(oDiv[1]), oPos = parseInt(oDiv.css(oMDirection));
			(oPos <= -1 * oDiv.width()) ? oDiv.css(oMDirection, oMarquees[i].width()) : oDiv.css(oMDirection, (oPos - oMStep));
		}
	})(jQuery)
}

nuke_jq(window).load(function(){
	doDMarquee();
});
</script>

<!-- start mod : Resize Posted Images Based on Max Width -->
<script type="text/javascript">
//<![CDATA[
<!--

var rmw_max_width = <?php echo isset($this->vars['IMAGE_RESIZE_WIDTH']) ? $this->vars['IMAGE_RESIZE_WIDTH'] : $this->lang('IMAGE_RESIZE_WIDTH'); ?>; // you can change this number, this is the max width in pixels for posted images
var rmw_max_height = <?php echo isset($this->vars['IMAGE_RESIZE_HEIGHT']) ? $this->vars['IMAGE_RESIZE_HEIGHT'] : $this->lang('IMAGE_RESIZE_HEIGHT'); ?>; // you can change this number, this is the max height in pixels for posted images
var rmw_border_1 = '1px solid <?php echo isset($this->vars['T_BODY_LINK']) ? $this->vars['T_BODY_LINK'] : $this->lang('T_BODY_LINK'); ?>';
var rmw_border_2 = '2px dotted <?php echo isset($this->vars['T_BODY_LINK']) ? $this->vars['T_BODY_LINK'] : $this->lang('T_BODY_LINK'); ?>';
var rmw_image_title = '<?php echo isset($this->vars['L_RMW_IMAGE_TITLE']) ? $this->vars['L_RMW_IMAGE_TITLE'] : $this->lang('L_RMW_IMAGE_TITLE'); ?>';

//-->
//]]>
</script>
<script type="text/javascript" src="<?php echo isset($this->vars['U_RMW_JSLIB']) ? $this->vars['U_RMW_JSLIB'] : $this->lang('U_RMW_JSLIB'); ?>"></script>
<!-- fin mod : Resize Posted Images Based on Max Width -->

<?php

$switch_enable_pm_popup_count = ( isset($this->_tpldata['switch_enable_pm_popup.']) ) ?  sizeof($this->_tpldata['switch_enable_pm_popup.']) : 0;
for ($switch_enable_pm_popup_i = 0; $switch_enable_pm_popup_i < $switch_enable_pm_popup_count; $switch_enable_pm_popup_i++)
{
 $switch_enable_pm_popup_item = &$this->_tpldata['switch_enable_pm_popup.'][$switch_enable_pm_popup_i];
 $switch_enable_pm_popup_item['S_ROW_COUNT'] = $switch_enable_pm_popup_i;
 $switch_enable_pm_popup_item['S_NUM_ROWS'] = $switch_enable_pm_popup_count;

?>
<script type="text/javascript">
<!--
    if ( <?php echo isset($this->vars['PRIVATE_MESSAGE_NEW_FLAG']) ? $this->vars['PRIVATE_MESSAGE_NEW_FLAG'] : $this->lang('PRIVATE_MESSAGE_NEW_FLAG'); ?> )
    {
        window.open('<?php echo isset($this->vars['U_PRIVATEMSGS_POPUP']) ? $this->vars['U_PRIVATEMSGS_POPUP'] : $this->lang('U_PRIVATEMSGS_POPUP'); ?>', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
    }
//-->
</script>
<?php

} // END switch_enable_pm_popup

if(isset($switch_enable_pm_popup_item)) { unset($switch_enable_pm_popup_item); } 

?>
<!-- Start add - Advanced time management MOD -->
<?php

$switch_send_pc_dateTime_count = ( isset($this->_tpldata['switch_send_pc_dateTime.']) ) ?  sizeof($this->_tpldata['switch_send_pc_dateTime.']) : 0;
for ($switch_send_pc_dateTime_i = 0; $switch_send_pc_dateTime_i < $switch_send_pc_dateTime_count; $switch_send_pc_dateTime_i++)
{
 $switch_send_pc_dateTime_item = &$this->_tpldata['switch_send_pc_dateTime.'][$switch_send_pc_dateTime_i];
 $switch_send_pc_dateTime_item['S_ROW_COUNT'] = $switch_send_pc_dateTime_i;
 $switch_send_pc_dateTime_item['S_NUM_ROWS'] = $switch_send_pc_dateTime_count;

?>
<script type="text/javascript">
//<![CDATA[
<!-- Start Replace - window.onload = send_pc_dateTime -->
send_pc_dateTime();
<!-- End Replace - window.onload = send_pc_dateTime -->

function send_pc_dateTime() {
    var pc_dateTime = new Date()
    pc_timezoneOffset = pc_dateTime.getTimezoneOffset()*(-60);
    pc_date = pc_dateTime.getFullYear()*10000 + (pc_dateTime.getMonth()+1)*100 + pc_dateTime.getDate();
    pc_time = pc_dateTime.getHours()*3600 + pc_dateTime.getMinutes()*60 + pc_dateTime.getSeconds();

    for ( i = 0; document.links.length > i; i++ ) {
        with ( document.links[i] ) {
            if ( href.indexOf('<?php echo isset($this->vars['U_SELF']) ? $this->vars['U_SELF'] : $this->lang('U_SELF'); ?>') == 0 ) {
                textLink = '' + document.links[i].firstChild.data
                if ( textLink.indexOf('http://') != 0 && textLink.indexOf('www.') != 0 && (textLink.indexOf('@') == -1 || textLink.indexOf('@') == 0 || textLink.indexOf('@') == textLink.length-1 )) {
                    if ( href.indexOf('?') == -1 ) {
                        pc_data = '?pc_tzo=' + pc_timezoneOffset + '&pc_d=' + pc_date + '&pc_t=' + pc_time;
                    } else {
                        pc_data = '&pc_tzo=' + pc_timezoneOffset + '&pc_d=' + pc_date + '&pc_t=' + pc_time;
                    }
                    if ( href.indexOf('#') == -1 ) {
                        href += pc_data;
                    } else {
                        href = href.substring(0, href.indexOf('#')) + pc_data + href.substring(href.indexOf('#'), href.length);
                    }
                }
            }
        }
    }
}
//]]>
</script>
<?php

} // END switch_send_pc_dateTime

if(isset($switch_send_pc_dateTime_item)) { unset($switch_send_pc_dateTime_item); } 

?>
<!-- End add - Advanced time management MOD -->

<a name="top"></a>
<div align ="center">
<a href="<?php echo isset($this->vars['U_INDEX']) ? $this->vars['U_INDEX'] : $this->lang('U_INDEX'); ?>" class="mainmenu"><?php echo isset($this->vars['L_MINI_INDEX']) ? $this->vars['L_MINI_INDEX'] : $this->lang('L_MINI_INDEX'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_SEARCH']) ? $this->vars['U_SEARCH'] : $this->lang('U_SEARCH'); ?>" class="mainmenu"><?php echo isset($this->vars['L_SEARCH']) ? $this->vars['L_SEARCH'] : $this->lang('L_SEARCH'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_GROUP_CP']) ? $this->vars['U_GROUP_CP'] : $this->lang('U_GROUP_CP'); ?>" class="mainmenu"><?php echo isset($this->vars['L_USERGROUPS']) ? $this->vars['L_USERGROUPS'] : $this->lang('L_USERGROUPS'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_PROFILE']) ? $this->vars['U_PROFILE'] : $this->lang('U_PROFILE'); ?>" class="mainmenu"><?php echo isset($this->vars['L_PROFILE']) ? $this->vars['L_PROFILE'] : $this->lang('L_PROFILE'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_MEMBERLIST']) ? $this->vars['U_MEMBERLIST'] : $this->lang('U_MEMBERLIST'); ?>" class="mainmenu"><?php echo isset($this->vars['L_MEMBERLIST']) ? $this->vars['L_MEMBERLIST'] : $this->lang('L_MEMBERLIST'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_PRIVATEMSGS']) ? $this->vars['U_PRIVATEMSGS'] : $this->lang('U_PRIVATEMSGS'); ?>" class="mainmenu"><?php echo isset($this->vars['PRIVATE_MESSAGE_INFO']) ? $this->vars['PRIVATE_MESSAGE_INFO'] : $this->lang('PRIVATE_MESSAGE_INFO'); ?></a>
<br />
<a href="<?php echo isset($this->vars['U_ARCADE']) ? $this->vars['U_ARCADE'] : $this->lang('U_ARCADE'); ?>" class="mainmenu"><?php echo isset($this->vars['L_ARCADE']) ? $this->vars['L_ARCADE'] : $this->lang('L_ARCADE'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_RANKS']) ? $this->vars['U_RANKS'] : $this->lang('U_RANKS'); ?>" class="mainmenu"><?php echo isset($this->vars['L_RANKS']) ? $this->vars['L_RANKS'] : $this->lang('L_RANKS'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_STAFF']) ? $this->vars['U_STAFF'] : $this->lang('U_STAFF'); ?>" class="mainmenu"><?php echo isset($this->vars['L_STAFF']) ? $this->vars['L_STAFF'] : $this->lang('L_STAFF'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_STATISTICS']) ? $this->vars['U_STATISTICS'] : $this->lang('U_STATISTICS'); ?>" class="mainmenu"><?php echo isset($this->vars['L_STATISTICS']) ? $this->vars['L_STATISTICS'] : $this->lang('L_STATISTICS'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_RULES']) ? $this->vars['U_RULES'] : $this->lang('U_RULES'); ?>" class="mainmenu"><?php echo isset($this->vars['L_RULES']) ? $this->vars['L_RULES'] : $this->lang('L_RULES'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_FAQ']) ? $this->vars['U_FAQ'] : $this->lang('U_FAQ'); ?>" class="mainmenu"><?php echo isset($this->vars['L_FAQ']) ? $this->vars['L_FAQ'] : $this->lang('L_FAQ'); ?></a>
&nbsp;&middot;&nbsp;&nbsp;<a href="<?php echo isset($this->vars['U_LOGIN_LOGOUT']) ? $this->vars['U_LOGIN_LOGOUT'] : $this->lang('U_LOGIN_LOGOUT'); ?>" class="mainmenu"><?php echo isset($this->vars['L_LOGIN_LOGOUT']) ? $this->vars['L_LOGIN_LOGOUT'] : $this->lang('L_LOGIN_LOGOUT'); ?></a>
</div>
	
<?php

$boarddisabled_count = ( isset($this->_tpldata['boarddisabled.']) ) ?  sizeof($this->_tpldata['boarddisabled.']) : 0;
for ($boarddisabled_i = 0; $boarddisabled_i < $boarddisabled_count; $boarddisabled_i++)
{
 $boarddisabled_item = &$this->_tpldata['boarddisabled.'][$boarddisabled_i];
 $boarddisabled_item['S_ROW_COUNT'] = $boarddisabled_i;
 $boarddisabled_item['S_NUM_ROWS'] = $boarddisabled_count;

?>
  <br /><div align="center"><span class="gen"><strong><?php echo isset($this->vars['L_BOARD_CURRENTLY_DISABLED']) ? $this->vars['L_BOARD_CURRENTLY_DISABLED'] : $this->lang('L_BOARD_CURRENTLY_DISABLED'); ?></strong></span></div><br />
<?php

} // END boarddisabled

if(isset($boarddisabled_item)) { unset($boarddisabled_item); } 

?>
<!-- Quick Search -->
<?php

$switch_quick_search_count = ( isset($this->_tpldata['switch_quick_search.']) ) ?  sizeof($this->_tpldata['switch_quick_search.']) : 0;
for ($switch_quick_search_i = 0; $switch_quick_search_i < $switch_quick_search_count; $switch_quick_search_i++)
{
 $switch_quick_search_item = &$this->_tpldata['switch_quick_search.'][$switch_quick_search_i];
 $switch_quick_search_item['S_ROW_COUNT'] = $switch_quick_search_i;
 $switch_quick_search_item['S_NUM_ROWS'] = $switch_quick_search_count;

?>
<br /><script type="text/javascript">
<!--
function checkSearch()
{
    <?php echo isset($switch_quick_search_item['CHECKSEARCH']) ? $switch_quick_search_item['CHECKSEARCH'] : ''; ?>
    else
    {
        return true;
    }
}
//-->
</script>

<center>
<form name="search_block" method="post" action="<?php echo isset($this->vars['U_SEARCH']) ? $this->vars['U_SEARCH'] : $this->lang('U_SEARCH'); ?>" onsubmit="return checkSearch()">
<input type="hidden" name="search_fields" value="all" />
<input type="hidden" name="show_results" value="topics" />
<table width="100%" cellpadding="2" cellspacing="1" border="0">
  <tr>
    <td align="center"><span class="gensmall">
    <?php echo isset($switch_quick_search_item['L_QUICK_SEARCH_FOR']) ? $switch_quick_search_item['L_QUICK_SEARCH_FOR'] : ''; ?> <input class="post" type="text" name="search_keywords" size="15" /> <?php echo isset($switch_quick_search_item['L_QUICK_SEARCH_AT']) ? $switch_quick_search_item['L_QUICK_SEARCH_AT'] : ''; ?> <select class="post" name="site_search"><?php echo isset($switch_quick_search_item['SEARCHLIST']) ? $switch_quick_search_item['SEARCHLIST'] : ''; ?></select>
    <input class="mainoption" type="submit" value="<?php echo isset($this->vars['L_SEARCH']) ? $this->vars['L_SEARCH'] : $this->lang('L_SEARCH'); ?>" /></span></td>
  </tr>
  <tr>
    <td align="center"><a href="<?php echo isset($this->vars['U_SEARCH']) ? $this->vars['U_SEARCH'] : $this->lang('U_SEARCH'); ?>" class="gensmall"><?php echo isset($switch_quick_search_item['L_ADVANCED_FORUM_SEARCH']) ? $switch_quick_search_item['L_ADVANCED_FORUM_SEARCH'] : ''; ?></a></td>
  </tr>
</table>
</form>
</center>
<?php

} // END switch_quick_search

if(isset($switch_quick_search_item)) { unset($switch_quick_search_item); } 

?>
<br />