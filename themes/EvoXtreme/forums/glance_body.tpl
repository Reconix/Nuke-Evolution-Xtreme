<span class="gen"><br /></span>
<table width="{GLANCE_TABLE_WIDTH}" cellpadding="2" cellspacing="1" border="0" class="forumline" align="center">
    <!-- BEGIN switch_glance_news -->
    <tr>
        <th class="thCornerL" height="28" align="center" width="30">
            +
        </th>
        <th class="thCornerL" height="28" align="center" width="30">
		&nbsp;
        </th>
        <th class="thTop" height="28" align="left">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr><td align="left">
                {NEWS_HEADING}
                </td>
                <td align="right">
                    {switch_glance_news.PREV_URL}&nbsp;&nbsp;{switch_glance_news.NEXT_URL}&nbsp;&nbsp;
                </td>
            </tr>
            </table>
        </th>
        <th class="thTop" width="100" align="center" nowrap="nowrap">&nbsp;{L_FORUM}&nbsp;</th>
        <th class="thTop" width="100" align="center" nowrap="nowrap">&nbsp;{L_AUTHOR}&nbsp;</th>
        <th class="thTop" width="50" align="center" nowrap="nowrap">&nbsp;{L_REPLIES}&nbsp;</th>
        <th class="thCornerR" width="180" align="center" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
    </tr>

    <!-- BEGIN switch_news_on -->
    <tbody id="phpbbGlance_news" style="display: ;">
    <!-- END switch_news_on -->
    <!-- BEGIN switch_news_off -->
    <tbody id="phpbbGlance_news" style="display: none;">
    <!-- END switch_news_off -->  

    <!-- END switch_glance_news -->
    <!-- BEGIN news -->
    <tr>
        <td nowrap="nowrap" valign="middle" class="row1" align="center" width="30"><a href="{news.TOPIC_LINK}">{news.BULLET}</a></td>
        <td nowrap="nowrap" valign="middle" class="row1" align="center">{news.ICON}</td>
        <td valign="middle" class="row1" onmouseover="this.style.backgroundColor='#cccccc'" onmouseout="this.style.backgroundColor='#e0e0e0'"><span class="genmed"><a href="{news.TOPIC_LINK}" class="genmed">{news.TOPIC_TITLE}</a></span></td>
        <td valign="middle" class="row2" nowrap="nowrap" align="center"><span class="genmed"><a href="{news.FORUM_LINK}" class="genmed">{news.FORUM_TITLE}</a></span></td>
        <td valign="middle" class="row3" nowrap="nowrap" align="center"><span class="genmed">{news.TOPIC_POSTER}</span></td>
        <td valign="middle" class="row2" nowrap="nowrap" align="center"><span class="genmed">{news.TOPIC_REPLIES}</span></td>
        <td valign="middle" class="row3" nowrap="nowrap" align="center"><span class="genmed">{news.TOPIC_TIME}<br />{news.LAST_POSTER}</span></td>
    </tr>
    <!-- END news -->

    <tr> 
        <td class="spaceRow" colspan="7" height="1"><img src="modules/Forums/templates/subSilver/images/spacer.gif" alt="" width="1" height="1" /></td>
    </tr>

    <!-- BEGIN switch_glance_recent -->
    <tr>
        <th class="thCornerL" height="28" align="center" width="30">
		&nbsp;
        </th>
        <th class="thCornerL" height="28" align="center" width="30">
		&nbsp;
        </th>
        <th class="thTop" height="28" align="left">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr><td align="left">
                {RECENT_HEADING}
                </td>
                <td align="right">
                    {switch_glance_recent.PREV_URL}&nbsp;&nbsp;{switch_glance_recent.NEXT_URL}&nbsp;&nbsp;
                </td>
            </tr>
            </table>
        </th>
        <th class="thTop" width="100" align="center" nowrap="nowrap">&nbsp;{L_FORUM}&nbsp;</th>
        <th class="thTop" width="100" align="center" nowrap="nowrap">&nbsp;{L_AUTHOR}&nbsp;</th>
        <th class="thTop" width="50" align="center" nowrap="nowrap">&nbsp;{L_REPLIES}&nbsp;</th>
        <th class="thCornerR" width="120" align="center" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
    </tr>

    <!-- BEGIN switch_recent_on -->
    <tbody id="phpbbGlance_recent" style="display: ;">
    <!-- END switch_recent_on -->
    <!-- BEGIN switch_recent_off -->
    <tbody id="phpbbGlance_recent" style="display: none;">
    <!-- END switch_recent_off -->  

    <!-- END switch_glance_recent -->

    <!-- BEGIN recent -->
    <tr>
        <td nowrap="nowrap" valign="middle" class="row1" align="center" width="30"><a href="{recent.TOPIC_LINK}">{recent.BULLET}</a></td>
        <td nowrap="nowrap" valign="middle" class="row1" align="center">{recent.ICON}</td>
        <td valign="middle" class="row1" onmouseover="this.style.backgroundColor='#cccccc'" onmouseout="this.style.backgroundColor='#e0e0e0'"><span class="genmed"><a href="{recent.TOPIC_LINK}" class="genmed">{recent.TOPIC_TITLE}</a></span></td>
        <td valign="middle" class="row2" nowrap="nowrap" align="center"><span class="genmed"><a href="{recent.FORUM_LINK}" class="genmed">{recent.FORUM_TITLE}</a></span></td>
        <td valign="middle" class="row3" nowrap="nowrap" align="center"><span class="genmed">{recent.TOPIC_POSTER}</span></td>
        <td valign="middle" class="row2" nowrap="nowrap" align="center"><span class="genmed">{recent.TOPIC_REPLIES}</span></td>
        <td valign="middle" class="row3" nowrap="nowrap" align="center"><span class="genmed">{recent.LAST_POST_TIME}<br />{recent.LAST_POSTER}</span></td>
    </tr>
    <!-- END recent -->
</table>
<span class="gen"><br /></span>