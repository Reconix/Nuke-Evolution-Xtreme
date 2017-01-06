<?php

/********************************************************************

                  CZUser Info V5 Universal Block
				  
	(c) 2002 - 2004 by Codezwiz Network - http://www.codezwiz.com		 	
	(c) 2007 - 2008 by DarkForgeGFX - http://www.darkforgegfx.com
	  (c) 2007 - 2008 by FutureNuke - http://www.futurenuke.com
	  
	 Special Thanks To Technocrat - http://www.nuke-evolution.com
			
		Modified For Use With Platinum Genesis 7.6.b.5 ONLY!!
		
********************************************************************/

/********************************************************************
		
			           Modifications Include
		
 [ Advanced Member Image Control              Last updated 29/07/07]  			   
 [ Enhanced Security GFX Check                Last updated 29/07/07] 
 [ Ip Display                                 Last updated 29/07/07] 
 [ Post Count Display						  Last updated 29/07/07] 
 [ Page View/Hits Display					  Last updated 29/07/07] 
 [ Guest & Bots Display						  Last updated 05/08/07]
 [ Tooltip MouseOver Feature				  Last updated 04/08/07]
 [ Advanced Username Color					  Last updated 29/07/07]
 [ Audio Private Message Alert				  Last updated 29/07/07] 
 [ BBForum group Display					  Last updated 29/07/07]
 [ Chopped Usernames                          Last updated 29/07/07]
 
********************************************************************/

	switch($op) {
		case 'czuser':
		case 'cz_add_member':
		case 'cz_update_staff':
		case 'cz_img_settings':
		case 'cz_settings':
		case 'cz_edit_member':
		case 'cz_upload_catimage':
		case 'cz_del_catimage':
		case 'cz_del_member':	
    		include('admin/modules/czuser.php');
		break;
}

?>