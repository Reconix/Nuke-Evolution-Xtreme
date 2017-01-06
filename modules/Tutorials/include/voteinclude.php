<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/* Tutorials Module v.1.1.2                                   COPYRIGHT */
/*                                                                      */
/* Copyright (c) 2004 - 2006 by http://www.techgfx.com                  */
/*     Techgfx - Graeme Allan                       (goose@techgfx.com) */
/*                                                                      */
/* Copyright (c) 2002 - 2006 by http://www.portedmods.com               */
/*     Mighty_Y - Yannick Reekmans             (mighty_y@portedmods.com)*/
/*                                                                      */
/* See TechGFX.com for detailed information on the Tutorials Module     */
/*                                                                      */
/* TechGFX: Your dreams, Our imagination                                */
/************************************************************************/

$outsidevotes = 0;
$anonvotes = 0;
$outsidevoteval = 0;
$anonvoteval = 0;
$regvoteval = 0;	
$truecomments = $totalvotesDB;
while(list($ratingDB, $ratinguserDB, $ratingcommentsDB)=$db->sql_fetchrow($voteresult)) {
    if ($ratingcommentsDB=="") $truecomments--;
    if ($ratinguserDB==$anonymous) {
	$anonvotes++;
	$anonvoteval += $ratingDB;
    }
    if ($useoutsidevoting == 1) {
    	if ($ratinguserDB=='outside') {
	    $outsidevotes++;
	    $outsidevoteval += $ratingDB;
	}
    } else { 
	$outsidevotes = 0;
    }
    if ($ratinguserDB!=$anonymous && $ratinguserDB!="outside") { 
	$regvoteval += $ratingDB;
    }
}
$regvotes = $totalvotesDB - $anonvotes - $outsidevotes;
if ($totalvotesDB == 0) { 
    $finalrating = 0;
} else if ($anonvotes == 0 && $regvotes == 0) {
    /* Figure Outside Only Vote */
    $finalrating = $outsidevoteval / $outsidevotes;
    $finalrating = number_format($finalrating, 4); 
} else if ($outsidevotes == 0 && $regvotes == 0) {
    /* Figure Anon Only Vote */
    $finalrating = $anonvoteval / $anonvotes;	     	 	
    $finalrating = number_format($finalrating, 4); 
} else if ($outsidevotes == 0 && $anonvotes == 0) {
    /* Figure Reg Only Vote */
    $finalrating = $regvoteval / $regvotes;	     	 	
    $finalrating = number_format($finalrating, 4); 	     	 	
} else if ($regvotes == 0 && $useoutsidevoting == 1 && $outsidevotes != 0 && $anonvotes != 0 ) {
    /* Figure Reg and Anon Mix */
    $avgAU = $anonvoteval / $anonvotes;
    $avgOU = $outsidevoteval / $outsidevotes;	 	 	
    if ($anonweight > $outsideweight ) {
	/* Anon is 'standard weight' */
	$newimpact = $anonweight / $outsideweight;
	$impactAU = $anonvotes;
	$impactOU = $outsidevotes / $newimpact;
	$finalrating = ((($avgOU * $impactOU) + ($avgAU * $impactAU)) / ($impactAU + $impactOU));
	$finalrating = number_format($finalrating, 4); 
    } else {
	/* Outside is 'standard weight' */
	$newimpact = $outsideweight / $anonweight;
	$impactOU = $outsidevotes;
	$impactAU = $anonvotes / $newimpact;
	$finalrating = ((($avgOU * $impactOU) + ($avgAU * $impactAU)) / ($impactAU + $impactOU));
	$finalrating = number_format($finalrating, 4); 
    }       		         	
} else {
    /* Registered User vs. Anonymous vs. Outside User Weight Calutions */
    $impact = $anonweight;
    $outsideimpact = $outsideweight;
    if ($regvotes == 0) {
	$regvotes = 0;
    } else { 
	$avgRU = $regvoteval / $regvotes;
    }
    if ($anonvotes == 0) {
	$avgAU = 0;
    } else {
	$avgAU = $anonvoteval / $anonvotes;
    }
    if ($outsidevotes == 0 ) {
	$avgOU = 0;
    } else {
	$avgOU = $outsidevoteval / $outsidevotes;
    }
    $impactRU = $regvotes;
    $impactAU = $anonvotes / $impact;
    $impactOU = $outsidevotes / $outsideimpact;
    $finalrating = (($avgRU * $impactRU) + ($avgAU * $impactAU) + ($avgOU * $impactOU)) / ($impactRU + $impactAU + $impactOU);
    $finalrating = number_format($finalrating, 4); 
}

?>
