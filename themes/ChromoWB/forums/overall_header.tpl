{META}

<!-- start mod : Resize Posted Images Based on Max Width -->
<script type="text/javascript">
//<![CDATA[
<!--

var rmw_max_width = {IMAGE_RESIZE_WIDTH}; // you can change this number, this is the max width in pixels for posted images
var rmw_max_height = {IMAGE_RESIZE_HEIGHT}; // you can change this number, this is the max height in pixels for posted images
var rmw_border_1 = '1px solid {T_BODY_LINK}';
var rmw_border_2 = '2px dotted {T_BODY_LINK}';
var rmw_image_title = '{L_RMW_IMAGE_TITLE}';

//-->
//]]>
</script>

<script type="text/javascript" src="{U_RMW_JSLIB}"></script>
<!-- fin mod : Resize Posted Images Based on Max Width -->
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
<!-- BEGIN switch_enable_pm_popup -->
<script type="text/javascript">
<!--
    if ( {PRIVATE_MESSAGE_NEW_FLAG} )
    {
        window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
    }
//-->
</script>
<!-- END switch_enable_pm_popup -->
<!-- Start add - Advanced time management MOD -->
<!-- BEGIN switch_send_pc_dateTime -->
<script type="text/javascript">
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
            if ( href.indexOf('{U_SELF}') == 0 ) {
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
</script>
<!-- END switch_send_pc_dateTime -->
<!-- End add - Advanced time management MOD -->

<a name="top"></a>
<center><table width="826" height="109" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<img src="themes/ChromoWB/forums/images/forumnav_01.png" width="13" height="109" alt=""></td>
		<td width="800" height="109" style="background-image: url(themes/ChromoWB/forums/images/forumnav_02.png)">

<div align="center">
&nbsp;<a href="{U_INDEX}" class="fheader">{L_MINI_INDEX}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_SEARCH}" class="fheader">{L_SEARCH}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_GROUP_CP}" class="fheader">{L_USERGROUPS}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_PROFILE}" class="fheader">{L_PROFILE}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_MEMBERLIST}" class="fheader">{L_MEMBERLIST}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_PRIVATEMSGS}" class="fheader">{PRIVATE_MESSAGE_INFO}</a>
&nbsp;<br />
&nbsp;<a href="{U_ARCADE}" class="fheader">{L_ARCADE}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_RANKS}" class="fheader">{L_RANKS}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_STAFF}" class="fheader">{L_STAFF}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_STATISTICS}" class="fheader">{L_STATISTICS}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_RULES}" class="fheader">{L_RULES}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_FAQ}" class="fheader">{L_FAQ}</a>
<span style="color:#ffffff">&nbsp;&middot;&nbsp;&nbsp;</span><a href="{U_LOGIN_LOGOUT}" class="fheader">{L_LOGIN_LOGOUT}</a>&nbsp;</div>

        </td>
<td>
			<img src="themes/ChromoWB/forums/images/forumnav_03.png" width="13" height="109" alt=""></td>
	</tr>
</table></center>
<br />
<!-- BEGIN boarddisabled -->
  <br /><div align="center"><span class="gen"><strong>{L_BOARD_CURRENTLY_DISABLED}</strong></span></div><br />
<!-- END boarddisabled -->
<!-- Quick Search -->
<!-- BEGIN switch_quick_search -->
<br /><script type="text/javascript">
<!--
function checkSearch()
{
    {switch_quick_search.CHECKSEARCH}
    else
    {
        return true;
    }
}
//-->
</script>

<center>
<form name="search_block" method="post" action="{U_SEARCH}" onsubmit="return checkSearch()">
<table width="100%" cellpadding="2" cellspacing="1" border="0">
  <tr>
    <td align="center"><span class="gensmall">
    {switch_quick_search.L_QUICK_SEARCH_FOR} <input class="post" type="text" name="search_keywords" size="15"> {switch_quick_search.L_QUICK_SEARCH_AT} <select class="post" name="site_search">{switch_quick_search.SEARCHLIST}</select>
    <input class="mainoption" type="submit" value="{L_SEARCH}"></span></td>
  </tr>
  <tr>
    <td align="center"><a href="{U_SEARCH}" class="gensmall">{switch_quick_search.L_ADVANCED_FORUM_SEARCH}</a></td>
  </tr>
<input type="hidden" name="search_fields" value="all">
<input type="hidden" name="show_results" value="topics">
</table>
</form>
</center>
<!-- END switch_quick_search -->
<br />