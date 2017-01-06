<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Server Info Administration
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : rank.php
   Author(s)     : Technocrat (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 05.19.2005 (mm.dd.yyyy)

   Notes         : Evo User Block User Rank Module
************************************************************************/

if(!defined('NUKE_EVO')) {
   die ("Illegal File Access");
}

global $evouserinfo_rank;

function evouserinfo_rank () {
   global $evouserinfo_addons, $db, $prefix, $userinfo, $evouserinfo_rank;
    
   $evouserinfo_rank = "<div align=\"center\">";
   $result_rank = $db->sql_query("SELECT * FROM ".$prefix."_bbranks ORDER BY rank_special, rank_min");
   $ranksrow = array();
   while ( $row = $db->sql_fetchrow($result_rank) ) {
           $ranksrow[] = $row;
   }
   $db->sql_freeresult($result_rank);
   $rank_image = '';
   $poster_rank = '';

   if ($userinfo['user_rank']) {
       for($j = 0, $maxj = count($ranksrow); $j < $maxj; $j++) {
         if ($userinfo['user_rank'] == $ranksrow[$j]['rank_id'] && $ranksrow[$j]['rank_special']) {
             $poster_rank = $ranksrow[$j]['rank_title'];
             $rank_image = ($ranksrow[$j]['rank_image']) ? '<img src="modules/Forums/'.$ranksrow[$j]['rank_image'].'" alt="'.$poster_rank.'" title="'.$poster_rank.'" border="0"><br />' : '';
      }
    }
   } else {
    for($j = 0, $maxj = count($ranksrow); $j < $maxj; $j++) {
        if ($userinfo['user_posts'] >= $ranksrow[$j]['rank_min'] && !$ranksrow[$j]['rank_special']) {
            $poster_rank = $ranksrow[$j]['rank_title'];
            $rank_image = ($ranksrow[$j]['rank_image']) ? '<img src="modules/Forums/'.$ranksrow[$j]['rank_image'].'" alt="'.$poster_rank.'" title="'.$poster_rank.'" border="0"><br />' : '';
        }
    }
   }
   if (empty($rank_image) && empty($poster_rank)) {
        $evouserinfo_rank = '';
   } else {
        $evouserinfo_rank .= $rank_image.$poster_rank;
        $evouserinfo_rank .= "</div><br />";
   }
}

if (is_user()) {
    evouserinfo_rank();
} else {
    $evouserinfo_rank = '';
}
?>