<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td><img src="themes/DW-Abyss/images/TBL/table_19.jpg" width="44" height="38" alt=""></td>
		<td background="themes/DW-Abyss/images/TBL/table_20.jpg" width="100%" height="38" alt=""></td>
		<td><img src="themes/DW-Abyss/images/TBL/table_21.jpg" width="43" height="38" alt=""></td>
	</tr>
	<tr>
		<td background="themes/DW-Abyss/images/TBL/table_24.jpg" width="44" height="100%" alt=""></td>
                <td background="themes/DW-Abyss/images/TBL/table_25.jpg" width="100%" height="100%" alt="">
<form method="post" action="{S_MODE_ACTION}" name="post">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
    <tr> 
      <td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
      <td align="right" nowrap="nowrap"><span class="genmed">{L_SELECT_SORT_METHOD}:&nbsp;{S_MODE_SELECT}&nbsp;&nbsp;{L_ORDER}&nbsp;{S_ORDER_SELECT}&nbsp;&nbsp; 
        <input type="submit" name="submit" value="{L_SUBMIT}" class="liteoption" />
        </span></td>
    </tr>
<tr> 
      <td align="left"><span class="nav">&nbsp;</span></td>
      <td align="right" nowrap="nowrap"><span class="genmed">
      <input type="text"  class="post" name="username" maxlength="25" size="25" tabindex="1" value="" />&nbsp;<input type="submit" name="submituser" value="{L_LOOK_UP}" class="mainoption" />&nbsp;<input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" />
      </span></td>
    </tr>    
  </table>
  <table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
    <tr> 
      <th height="25" class="thCornerL" nowrap="nowrap">#</th>
      <th class="thTop" nowrap="nowrap"><strong>PM</strong></th>
      <th class="thTop" nowrap="nowrap">{L_USERNAME}</th>
      <th class="thTop" nowrap="nowrap">{L_EMAIL}</th>
      <th class="thTop" nowrap="nowrap">{L_FROM}</th>
	  <th class="thTop" nowrap="nowrap">{L_AGE}</th>
      <th class="thTop" nowrap="nowrap">{L_JOINED}</th>
      <th class="thTop" nowrap="nowrap">{L_ONLINE_STATUS}</th>
      <th class="thTop" nowrap="nowrap">{L_POSTS}</th>
      <th class="thCornerR" nowrap="nowrap">{L_WEBSITE}</th>
    </tr>
    <!-- BEGIN no_username -->
    <tr> 
      <td class="row1" align="center" colspan="9"><span class="gen">&nbsp;{no_username.NO_USER_ID_SPECIFIED}&nbsp;</span></td>
    </tr>
    <!-- END no_username -->
    <!-- BEGIN memberrow -->
    <tr> 
      <td class="{memberrow.ROW_CLASS}" align="center"><span class="gen">&nbsp;{memberrow.ROW_NUMBER}&nbsp;</span></td>
      <td class="{memberrow.ROW_CLASS}" align="center">&nbsp;{memberrow.PM_IMG}&nbsp;</td>
      <td class="{memberrow.ROW_CLASS}" align="center"><span class="gen"><a href="{memberrow.U_VIEWPROFILE}" class="gen">{memberrow.USERNAME}</a></span></td>
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle">&nbsp;{memberrow.EMAIL_IMG}&nbsp;</td>
      <!-- FLAGHACK-start -->
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle">
        <table class="gen">
          <tr>
            <td align="center" width="100%">{memberrow.FROM}</td>
            <td align="right">{memberrow.FLAG}</td>
          </tr>
        </table>
      </td>
      <!-- FLAGHACK-end -->
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{memberrow.AGE}</span></td>
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gensmall">{memberrow.JOINED}</span></td>
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gen">{memberrow.ONLINE_STATUS}</span></td>
      <td class="{memberrow.ROW_CLASS}" align="center" valign="middle"><span class="gen">{memberrow.POSTS}</span></td>
      <td class="{memberrow.ROW_CLASS}" align="center">&nbsp;{memberrow.WWW_IMG}&nbsp;</td>
    </tr>
    <!-- END memberrow -->
    <tr> 
      <td class="catbottom" colspan="10" height="28">&nbsp;</td>
    </tr>
  </table>
  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
    <tr> 
      <td align="right" valign="top"></td>
    </tr>
  </table>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tr> 
    <td><span class="nav">{PAGE_NUMBER}</span></td>
    <td align="right"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span></td>
  </tr>
</table></form>
	</td>
		<td background="themes/DW-Abyss/images/TBL/table_26.jpg" width="43" height="100%" alt=""></td>
	</tr>
	<tr>
		<td><img src="themes/DW-Abyss/images/TBL/table_34.jpg" width="44" height="39" alt=""></td>
		<td background="themes/DW-Abyss/images/TBL/table_35.jpg" width="100%" height="39" alt=""></td>
		<td><img src="themes/DW-Abyss/images/TBL/table_36.jpg" width="43" height="39" alt=""></td>
	</tr>
</table>

<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
    <td valign="top" align="right">{JUMPBOX}</td>
  </tr>
</table>