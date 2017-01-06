<?php
/**
 * KalenderMx v1.4
 * Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)
 * http://www.pragmamx.org & http://www.shiba-design.de
 * 
 * KalenderMx was based on EventCalendar 2.0
 * Copyright (c) 2001 Originally by Rob Sutton
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * $Source: D:\\CVS/dev-Kalender/html/modules/Kalender/language/lang-french.php,v $
 * $Revision: 3606 $
 * $Author: technocrat $
 * $Date: 2006-06-21 15:37:59 -0700 (Wed, 21 Jun 2006) $
 */

// translation by Louis Lecaroz ( http://www.le-resistant.com )

if (!defined("CAL_MODULE_NAME")) die ("You can't access this file directly...");


####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
	define("_CALLOCALE","fr");   # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
	}
else {
	define("_CALLOCALE","fr_FR");		# lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
	}
define("_CALSHORTDATEFORMAT","%y/%m/%d");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",0);    //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",0);  // 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);		# the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","Tous&nbsp;les&nbsp;�v�nements");    // desription of all Events (no colordot)
define("_CALSEND","Soumettre");
define("_CALSUBMITEVENT", "Proposer un �v�nement");
define("_CALSUBMITNAME", "Saisie d'un �v�nement");
define("_CALNAME", "Calendrier");
define("_CALPREVIEW", "Pr�visualiser l'�v�nement");
define("_CALOK", "Soumettre l'�v�nement");
define("_CALEVENTDATETEXT", "Date de l'�v�nement");
define("_CALSUBSENT", "Votre �v�nement a bien �t� re�u");
define("_CALTHANKSSUB", "Merci pour votre proposition!");
define("_CALSUBTEXT", "Nous v�rifierons votre proposition dans les heures � venir, Si elle est interressante ou a du sens, nous la publierons au plus t�t.");
define("_CALSUBTEXTADMIN", "Votre saisie vient d'�tre directement publi�e.");
define("_CALWEHAVESUB", "En ce moment, nous avons");
define("_CALWAITING", "propositions en attente de publication.");
define("_CALEVENTDATEPREVIEW", "Date de l'�v�nement");
define("_CALCHECKSTORY", "S'il vous plait, v�rifiez vos liens, votre texte, etc.... Avant d'envoyer votre �v�nement!");
define("_CALYOURNAME", "Votre nom");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Titre");
define("_CALTOPIC", "Sujet");
define("_CALSELECTTOPIC", "S�lectionner un Sujet");
define("_CALARTICLETEXT", "Description");
define("_CALHTMLISFINE", "votre code HTML semble correct, mais v�rifiez deux fois vos URLs et vos tags HTML!");
define("_CALNEWSUBPREVIEW", "Pr�visualisation de l'�v�nement soumis");
define("_CALSTORYLOOK", "Votre �v�nement ressemblera � quelque chose comme �a:");
define("_CALBEDESCRIPTIVE", "Soyez concis, clair et simple");
define("_CALSUBPREVIEW", "Vous devez pr�visualiser votre �v�nement au moins une fois avant de le soumettre");
define("_CALALLOWEDHTML", "HTML autoris�");
define("_CALSUBMISSIONSADMIN", "Ev�nements propos�s");
define("_CALNEWSUBMISSIONS", "Nouveaux �v�nements propos�s");
define("_CALNOSUBJECT", "Pas de sujet saisi!");
define("_CALNOSUBMISSIONS", "Il n'y a pas de proposition!");
define("_CALDELETE", "D�truire");
define("_CALNAMEFIELD", "Nom");
define("_CALDELETESTORY", "D�truire l'�v�nement");
define("_CALPREVIEWSTORY", "Pr�visualiser l'�v�nement");
define("_CALPOSTSTORY", "Sauver l'�v�nement");
define("_CALSUBMITADVICE1", "S'il vous plait, remplissez correctement votre �v�nement ci-dessous et v�rifiez le.");
define("_CALSUBMITADVICE2", "<br />Nous vous pr�venons que votre proposition ne sera pas visible de suite.<br />Elle sera v�rifi�e et �dit�e si n�c�ssaire par notre �quipe.");
define("_CALPOSTEDBY","Envoy� par");
define("_CALPOSTEDON","le");
define("_CALACCEPTEDBY"," et approuv� par");
define("_CALPREVIOUS","Prec");
define("_CALNEXT","Suiv");
define("_CALSTARTTIME","Heure de d�but");
define("_CALENDTIME","Heure de fin");
define("_CALALLDAYEVENT","Toute la journ�e");
define("_CALTIMEIGNORED","Les heures de d�part et de fin seront ignor�es.");
define("_CALENDDATETEXT","Date de d�but");
define("_CALENDDATEPREVIEW","Date de fin");
#define("_CALBARCOLORTEXT","Selectionner une cat�gorie pour cette �v�nement");
define("_CALBARCOLORTEXT","Categorie");
define("_CALLOGIN","S'authentifier");
define("_CALNO","Non");
define("_CALYES","Oui");
define("_CALREMOVETEST","Etes vous sure de vouloir retirer cette �v�nement?");
define("_CALNOTAUTHORIZED1","Vous n'�tes pas autoris� � �diter ou � supprimer cette entr�e");
define("_CALNOTAUTHORIZED2","Contactez votre administrateur pour toutes les questions que vous pouvez avoir");
define("_CALNOTAUTHORIZED3","D�sol�, vous n'�tes pas autoris� � �diter ou � supprimer cette entr�e!");
define("_CALTODAY","Aujourd'hui");
define("_CALLISTDESCRIPTION1","Le(s)");
define("_CALLISTDESCRIPTION2","prochain(s) �v�nement(s)");
define("_CALLISTSTART","Depuis");
define("_CALLISTRANGE","jusqu'�");
define("_CALHEADAPPOINTM","Rendez vous");
define("_CALDAYEVENTS","Ev�nements");
define("_CALDAYMORNING","Matin");
define("_CALDAYEVENING","Soir�e");
define("_CALMORE","Plus d'�v�nements");
define("_CAL1EVENT","Ev�nement");
define("_CAL2EVENT","Ev�nements");
define("_CAL0EVENTS", "Il n'y a pas d'�v�nement pour cette requ�te");
define("_CAL0EVENTSBLOCK", "D�sol�, nous n'avons pas d'�v�nement actuellement.");
define("_CALNOTODAYEVENTS","Pas d'�v�nement aujourd'hui.");
define("_CALADDASARTICLE","Article");
define("_CALADDASARTICLE2","Ajouter un article � partir de cet �v�nement.");

####### LINKS ########
define("_CALEVENTLINK","Cr�er un �v�nement");
define("_CALAPPTLINK","Cr�er un rendez vous");
define("_CALTASKLINK","Ajouter une nouvelle tache");
define("_CALDAYLINK","Vue journali�re");
define("_CALMONTHLINK","Vue mensuelle");
define("_CALYEARLINK","Vue annuelle");
define("_CALJUMPTOTEXT","Aller � la vue suivante");
define("_CALJUMPBUTTON","Aller!");
define("_CALLISTLINK","prochains Ev�nements");

####### MONTHS ########
define("_CALJAN","Janvier");
define("_CALFEB","F�vrier");
define("_CALMAR","Mars");
define("_CALAPR","Avril");
define("_CALMAY","Mai");
define("_CALJUN","Juin");
define("_CALJUL","Juillet");
define("_CALAUG","Aout");
define("_CALSEP","Septembre");
define("_CALOCT","Octobre");
define("_CALNOV","Novembre");
define("_CALDEC","D�cembre");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Dimanche");
define("_CALSECONDDAY","Lundi");
define("_CALTHIRDDAY","Mardi");
define("_CALFOURTHDAY","Mercredi");
define("_CALFIFTHDAY","Jeudi");
define("_CALSIXTHDAY","Vendredi");
define("_CALSEVENTHDAY","Samedi");
define("_CALLONGFIRSTDAY","Dimanche");
define("_CALLONGSECONDDAY","Lundi");
define("_CALLONGTHIRDDAY","Mardi");
define("_CALLONGFOURTHDAY","Mercredi");
define("_CALLONGFIFTHDAY","Jeudi");
define("_CALLONGSIXTHDAY","Vendredi");
define("_CALLONGSEVENTHDAY","Samedi");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Des erreurs ont �t� trouv�es pendant la validation de votre proposition !");
define("_CALVALIDFIXMSG","S'il vous plait, corrigez ces erreurs avant de la pr�visualiser ou de la soumettre.");
define("_CALVALIDSUBJECT","Le sujet est un champ obligatoire.");
define("_CALVALIDENDDATE","La 'Date de fin' n'est pas une date valide.");
define("_CALVALIDEVENTDATE","La 'Date de l'�v�nement' n'est pas une date valide.");
define("_CALVALIDDATES","La 'Date de fin' doit �tre sup�rieure ou �gale � la 'Date de l'�v�nement'.");
define("_CALVALIDTIMES","L' 'Heure de fin' doit �tre sup�rieure � l' 'Heure de d�but'.");
define("_CALVALIDTOPIC", "S'il vous plait, S�lectionnez un Sujet.");

define("_CALINDEX", "Afficher bloc droit");  
define("_CALTEXTEVENTS", "Barres d'image pour les �v�nements multijours");  
define("_CALADDARTICLEBOX", "Cr�ation automatique d'article autoris�e");  
define("_CALPOSTUSERS","Les utilisateurs enregistr�s peuvent proposer un �v�nement");
define("_CALUSETOPICS", "Utilisation des Sujets des articles");  
define("_CALUSETOPICS1", "Oui, mais pas n�c�ssairement");  
define("_CALUSETOPICS2", "Oui, Obligatoire");  
define("_CALDEFAULTVIEW", "Vue d'affichage par d�faut");  
define("_CALMINUTERANGE", "Pas d'incr�mentation des minutes pour la s�lection de l'heure");  
define("_CALADMINEDITALL", "Les administrateurs ne peuvent travailler que sur leurs �v�nements");  
define("_CALADMINMENUSHOW", "Utiliser le menu d'administration normal du CMS");  
define("_CALADMINTYPE", "Quels Administrateurs pourront travailler sur les �v�nements");  
define("_CALLISTCOUNT", "Nombre d'entr�es dans liste de visualisation");  
define("_CALLISTSHOWSTART", "Heure de d�part dans la liste de visualisation");  
define("_CALLISTENDDATE", "Date de fin dans la liste de visualisation");  
define("_CALLISTENDTIME", "Heure de fin dans la liste de visualisation");  
define("_CALLISTENDDATE2", "Date de fin, Si �gale � la date de d�marrage");  
define("_CALLISTBR", "Ligne de d�marcation entre la date et l'heure dans la liste de visualisation");  
define("_CALDAYTIMEARRAY", "Intervals de temps dans la vue journali�re");  
define("_CALALLOWABLEHTML", "tag HTML autoris�s dans la description de la date");  
define("_CALONLYWEN", "(Seulement si la date de fin est indiqu�e)"); 
define("_CALSHOWLINKS","Afficher la date en tant que lien dans la vue journali�re");  
define("_CALCALENDARCONFIG", "Configuration du calendrier");  
define("_CALCONF1", "Les param�tres n'ont pas pu �tre sauv�s!");  
define("_CALCONF2", "Les param�tres ont �t� sauv�s!");  
define("_CALCONF3", "le fichier");  
define("_CALCONF4", "est prot�g� en �criture, <br />les param�tres ne peuvent pas �tre sauv�s!");  
define("_CALACTIV", "Activ�");
define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Nombre de colones dans la liste des cat�gories");

define("_CALERREVENTNOTEXIST","L'Ev�nement n'existe pas dans notre base de donn�es.");
define("_CALERRSQLERROR","Database-Error!");
define("_CALONLYDEACTIVATE","d�sactiver seulement");
define("_CALDEACTIVATED","�v�nements d�sactiv�s");
define("_CALNODEACTIVATED","Pas d'�v�nement d�sactiv�");
define("_CALNAVIPREV","Ev�nements pr�c�dents");
define("_CALNAVINEXT","Ev�nements suivants");

/// ab 1.3
define("_CALPRINTER1","Imprimer la page");
define("_CALPRINTER2","Envoyer cette page � l'imprimante");
define("_CALPOSTANONYMOUS", "Les propositions des utilisateurs anonymes sont autoris�es");  
define("_CALUSERSAUTOPOST","Publier directement les propositions des utilisateurs enregistr�s");
define("_CALANONYAUTOPOST","Publier directement les propositions des utilisateurs anonymes");
define("_CALCATEGORIESADMIN","Configuration des cat�gories");
define("_CALCATEGORIESLANG","Selectionner la langue");
define("_CALADMINMENU","Menu d'administration");
define("_CALSHOWPOPS","Fen�tre Pop-up pour la description de l'�v�nement");
define("_CALSOURCE","Source");
define("_CALGOAL","Goal");

/// ab 1.4
define('_CALHOURS','heures');
define('_CALMINUTES','minutes');
define('_CALDAYS','jours');
define('_CALMONTHS','mois');
define('_CALYEARS','ann�es');
define("_CALPLSLOGIN","S'il vous plait, authentifiez vous d'abord");
define("_CALSAVESETT", "Sauver");

define('_CALALLWORDS','Tous les  mots [ALL]');
define("_CALANYWORDS","n'importe quel mot [OR]");
define('_CALSEARCH','Rechercher');
define('_CALSEARCHEVENT','Rechercher un �v�nement');
define('_CALFOR','pour');
define('_CALSEARCHTITLE','Recherche dans les �v�nements du calendrier');
define('_CALCQUEUE','Votre r�sultat de recherche');
define('_CALTOMUCH1','Il y a plus de  ');
define("_CALTOMUCH2"," r�ponses. S'il vous plait, limitez vos conditions de recherche.");
define("_CALSEARCHCOUNT", "Nombre Max. de r�sultats � la recherche");  
define('_CALSEARCHTOPICS','Recherche dans les Articles/Sujets');
define("_CALMOREOPTIONINF","Vous trouverez d'autres options pour la configuration visuelle du calendrier dans ce fichier:");
define('_CALSEFROMDATE','De la date');
define('_CALSELCATEGORY','Selectionnez une cat�gorie');
define('_CALINTHIS','dans');
define("_CALNOTOPICS", "Il n'y a pas de sujet disponnible");
define('_CALGOTOEDIT','puis Ajouter encore');
define("_CALGOTOADMIN","puis aller au menu d'Administration");
define('_CALGOTOCALENDAR','puis aller � la vue du Calendrier');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","Afficher la date dans la liste de visualisation en tant que lien");  

/// ab 1.4.c
define('_CAL_WYSIWYG_ACTIVE','Activer WYSIWYG - Editeur ');
