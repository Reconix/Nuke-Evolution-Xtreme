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
define("_CALDOTCOLORALL","Tous&nbsp;les&nbsp;événements");    // desription of all Events (no colordot)
define("_CALSEND","Soumettre");
define("_CALSUBMITEVENT", "Proposer un événement");
define("_CALSUBMITNAME", "Saisie d'un événement");
define("_CALNAME", "Calendrier");
define("_CALPREVIEW", "Prévisualiser l'événement");
define("_CALOK", "Soumettre l'événement");
define("_CALEVENTDATETEXT", "Date de l'événement");
define("_CALSUBSENT", "Votre événement a bien été reçu");
define("_CALTHANKSSUB", "Merci pour votre proposition!");
define("_CALSUBTEXT", "Nous vérifierons votre proposition dans les heures à venir, Si elle est interressante ou a du sens, nous la publierons au plus tôt.");
define("_CALSUBTEXTADMIN", "Votre saisie vient d'être directement publiée.");
define("_CALWEHAVESUB", "En ce moment, nous avons");
define("_CALWAITING", "propositions en attente de publication.");
define("_CALEVENTDATEPREVIEW", "Date de l'événement");
define("_CALCHECKSTORY", "S'il vous plait, vérifiez vos liens, votre texte, etc.... Avant d'envoyer votre événement!");
define("_CALYOURNAME", "Votre nom");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Titre");
define("_CALTOPIC", "Sujet");
define("_CALSELECTTOPIC", "Sélectionner un Sujet");
define("_CALARTICLETEXT", "Description");
define("_CALHTMLISFINE", "votre code HTML semble correct, mais vérifiez deux fois vos URLs et vos tags HTML!");
define("_CALNEWSUBPREVIEW", "Prévisualisation de l'événement soumis");
define("_CALSTORYLOOK", "Votre événement ressemblera à quelque chose comme ça:");
define("_CALBEDESCRIPTIVE", "Soyez concis, clair et simple");
define("_CALSUBPREVIEW", "Vous devez prévisualiser votre événement au moins une fois avant de le soumettre");
define("_CALALLOWEDHTML", "HTML autorisé");
define("_CALSUBMISSIONSADMIN", "Evénements proposés");
define("_CALNEWSUBMISSIONS", "Nouveaux événements proposés");
define("_CALNOSUBJECT", "Pas de sujet saisi!");
define("_CALNOSUBMISSIONS", "Il n'y a pas de proposition!");
define("_CALDELETE", "Détruire");
define("_CALNAMEFIELD", "Nom");
define("_CALDELETESTORY", "Détruire l'événement");
define("_CALPREVIEWSTORY", "Prévisualiser l'événement");
define("_CALPOSTSTORY", "Sauver l'événement");
define("_CALSUBMITADVICE1", "S'il vous plait, remplissez correctement votre événement ci-dessous et vérifiez le.");
define("_CALSUBMITADVICE2", "<br />Nous vous prévenons que votre proposition ne sera pas visible de suite.<br />Elle sera vérifiée et éditée si nécéssaire par notre équipe.");
define("_CALPOSTEDBY","Envoyé par");
define("_CALPOSTEDON","le");
define("_CALACCEPTEDBY"," et approuvé par");
define("_CALPREVIOUS","Prec");
define("_CALNEXT","Suiv");
define("_CALSTARTTIME","Heure de début");
define("_CALENDTIME","Heure de fin");
define("_CALALLDAYEVENT","Toute la journée");
define("_CALTIMEIGNORED","Les heures de départ et de fin seront ignorées.");
define("_CALENDDATETEXT","Date de début");
define("_CALENDDATEPREVIEW","Date de fin");
#define("_CALBARCOLORTEXT","Selectionner une catégorie pour cette événement");
define("_CALBARCOLORTEXT","Categorie");
define("_CALLOGIN","S'authentifier");
define("_CALNO","Non");
define("_CALYES","Oui");
define("_CALREMOVETEST","Etes vous sure de vouloir retirer cette événement?");
define("_CALNOTAUTHORIZED1","Vous n'êtes pas autorisé à éditer ou à supprimer cette entrée");
define("_CALNOTAUTHORIZED2","Contactez votre administrateur pour toutes les questions que vous pouvez avoir");
define("_CALNOTAUTHORIZED3","Désolé, vous n'êtes pas autorisé à éditer ou à supprimer cette entrée!");
define("_CALTODAY","Aujourd'hui");
define("_CALLISTDESCRIPTION1","Le(s)");
define("_CALLISTDESCRIPTION2","prochain(s) événement(s)");
define("_CALLISTSTART","Depuis");
define("_CALLISTRANGE","jusqu'à");
define("_CALHEADAPPOINTM","Rendez vous");
define("_CALDAYEVENTS","Evénements");
define("_CALDAYMORNING","Matin");
define("_CALDAYEVENING","Soirée");
define("_CALMORE","Plus d'événements");
define("_CAL1EVENT","Evénement");
define("_CAL2EVENT","Evénements");
define("_CAL0EVENTS", "Il n'y a pas d'événement pour cette requête");
define("_CAL0EVENTSBLOCK", "Désolé, nous n'avons pas d'événement actuellement.");
define("_CALNOTODAYEVENTS","Pas d'événement aujourd'hui.");
define("_CALADDASARTICLE","Article");
define("_CALADDASARTICLE2","Ajouter un article à partir de cet événement.");

####### LINKS ########
define("_CALEVENTLINK","Créer un événement");
define("_CALAPPTLINK","Créer un rendez vous");
define("_CALTASKLINK","Ajouter une nouvelle tache");
define("_CALDAYLINK","Vue journalière");
define("_CALMONTHLINK","Vue mensuelle");
define("_CALYEARLINK","Vue annuelle");
define("_CALJUMPTOTEXT","Aller à la vue suivante");
define("_CALJUMPBUTTON","Aller!");
define("_CALLISTLINK","prochains Evénements");

####### MONTHS ########
define("_CALJAN","Janvier");
define("_CALFEB","Février");
define("_CALMAR","Mars");
define("_CALAPR","Avril");
define("_CALMAY","Mai");
define("_CALJUN","Juin");
define("_CALJUL","Juillet");
define("_CALAUG","Aout");
define("_CALSEP","Septembre");
define("_CALOCT","Octobre");
define("_CALNOV","Novembre");
define("_CALDEC","Décembre");

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
define("_CALVALIDERRORMSG","Des erreurs ont été trouvées pendant la validation de votre proposition !");
define("_CALVALIDFIXMSG","S'il vous plait, corrigez ces erreurs avant de la prévisualiser ou de la soumettre.");
define("_CALVALIDSUBJECT","Le sujet est un champ obligatoire.");
define("_CALVALIDENDDATE","La 'Date de fin' n'est pas une date valide.");
define("_CALVALIDEVENTDATE","La 'Date de l'événement' n'est pas une date valide.");
define("_CALVALIDDATES","La 'Date de fin' doit être supérieure ou égale à la 'Date de l'événement'.");
define("_CALVALIDTIMES","L' 'Heure de fin' doit être supérieure à l' 'Heure de début'.");
define("_CALVALIDTOPIC", "S'il vous plait, Sélectionnez un Sujet.");

define("_CALINDEX", "Afficher bloc droit");  
define("_CALTEXTEVENTS", "Barres d'image pour les événements multijours");  
define("_CALADDARTICLEBOX", "Création automatique d'article autorisée");  
define("_CALPOSTUSERS","Les utilisateurs enregistrés peuvent proposer un événement");
define("_CALUSETOPICS", "Utilisation des Sujets des articles");  
define("_CALUSETOPICS1", "Oui, mais pas nécéssairement");  
define("_CALUSETOPICS2", "Oui, Obligatoire");  
define("_CALDEFAULTVIEW", "Vue d'affichage par défaut");  
define("_CALMINUTERANGE", "Pas d'incrémentation des minutes pour la sélection de l'heure");  
define("_CALADMINEDITALL", "Les administrateurs ne peuvent travailler que sur leurs événements");  
define("_CALADMINMENUSHOW", "Utiliser le menu d'administration normal du CMS");  
define("_CALADMINTYPE", "Quels Administrateurs pourront travailler sur les événements");  
define("_CALLISTCOUNT", "Nombre d'entrées dans liste de visualisation");  
define("_CALLISTSHOWSTART", "Heure de départ dans la liste de visualisation");  
define("_CALLISTENDDATE", "Date de fin dans la liste de visualisation");  
define("_CALLISTENDTIME", "Heure de fin dans la liste de visualisation");  
define("_CALLISTENDDATE2", "Date de fin, Si égale à la date de démarrage");  
define("_CALLISTBR", "Ligne de démarcation entre la date et l'heure dans la liste de visualisation");  
define("_CALDAYTIMEARRAY", "Intervals de temps dans la vue journalière");  
define("_CALALLOWABLEHTML", "tag HTML autorisés dans la description de la date");  
define("_CALONLYWEN", "(Seulement si la date de fin est indiquée)"); 
define("_CALSHOWLINKS","Afficher la date en tant que lien dans la vue journalière");  
define("_CALCALENDARCONFIG", "Configuration du calendrier");  
define("_CALCONF1", "Les paramètres n'ont pas pu être sauvés!");  
define("_CALCONF2", "Les paramètres ont été sauvés!");  
define("_CALCONF3", "le fichier");  
define("_CALCONF4", "est protégé en écriture, <br />les paramètres ne peuvent pas être sauvés!");  
define("_CALACTIV", "Activé");
define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Nombre de colones dans la liste des catégories");

define("_CALERREVENTNOTEXIST","L'Evénement n'existe pas dans notre base de données.");
define("_CALERRSQLERROR","Database-Error!");
define("_CALONLYDEACTIVATE","désactiver seulement");
define("_CALDEACTIVATED","événements désactivés");
define("_CALNODEACTIVATED","Pas d'événement désactivé");
define("_CALNAVIPREV","Evénements précédents");
define("_CALNAVINEXT","Evénements suivants");

/// ab 1.3
define("_CALPRINTER1","Imprimer la page");
define("_CALPRINTER2","Envoyer cette page à l'imprimante");
define("_CALPOSTANONYMOUS", "Les propositions des utilisateurs anonymes sont autorisées");  
define("_CALUSERSAUTOPOST","Publier directement les propositions des utilisateurs enregistrés");
define("_CALANONYAUTOPOST","Publier directement les propositions des utilisateurs anonymes");
define("_CALCATEGORIESADMIN","Configuration des catégories");
define("_CALCATEGORIESLANG","Selectionner la langue");
define("_CALADMINMENU","Menu d'administration");
define("_CALSHOWPOPS","Fenêtre Pop-up pour la description de l'événement");
define("_CALSOURCE","Source");
define("_CALGOAL","Goal");

/// ab 1.4
define('_CALHOURS','heures');
define('_CALMINUTES','minutes');
define('_CALDAYS','jours');
define('_CALMONTHS','mois');
define('_CALYEARS','années');
define("_CALPLSLOGIN","S'il vous plait, authentifiez vous d'abord");
define("_CALSAVESETT", "Sauver");

define('_CALALLWORDS','Tous les  mots [ALL]');
define("_CALANYWORDS","n'importe quel mot [OR]");
define('_CALSEARCH','Rechercher');
define('_CALSEARCHEVENT','Rechercher un événement');
define('_CALFOR','pour');
define('_CALSEARCHTITLE','Recherche dans les événements du calendrier');
define('_CALCQUEUE','Votre résultat de recherche');
define('_CALTOMUCH1','Il y a plus de  ');
define("_CALTOMUCH2"," réponses. S'il vous plait, limitez vos conditions de recherche.");
define("_CALSEARCHCOUNT", "Nombre Max. de résultats à la recherche");  
define('_CALSEARCHTOPICS','Recherche dans les Articles/Sujets');
define("_CALMOREOPTIONINF","Vous trouverez d'autres options pour la configuration visuelle du calendrier dans ce fichier:");
define('_CALSEFROMDATE','De la date');
define('_CALSELCATEGORY','Selectionnez une catégorie');
define('_CALINTHIS','dans');
define("_CALNOTOPICS", "Il n'y a pas de sujet disponnible");
define('_CALGOTOEDIT','puis Ajouter encore');
define("_CALGOTOADMIN","puis aller au menu d'Administration");
define('_CALGOTOCALENDAR','puis aller à la vue du Calendrier');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","Afficher la date dans la liste de visualisation en tant que lien");  

/// ab 1.4.c
define('_CAL_WYSIWYG_ACTIVE','Activer WYSIWYG - Editeur ');
