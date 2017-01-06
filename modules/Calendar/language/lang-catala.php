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
 * $Source: D:\\CVS/dev-Kalender/html/modules/Kalender/language/lang-catala.php,v $
 * $Revision: 3606 $
 * $Author: technocrat $
 * $Date: 2006-06-21 15:37:59 -0700 (Wed, 21 Jun 2006) $
 */

// Catalan translation by Joan Antoni C. <joanantoni@gmail.com>
// Traducció al català feta per Joan Antoni C. <joanantoni@gmail.com>

if (!defined("CAL_MODULE_NAME")) die ("You can't access this file directly...");

####### locale time-format variables #######
if (PHP_OS=="WINNT" || PHP_OS=="WIN32") {
	define("_CALLOCALE","ca");   # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
	}
else {
	define("_CALLOCALE","ca_ES");		# lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
	}
define("_CALSHORTDATEFORMAT","%d/%m/%y");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);    //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);  // 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",1);		# el primer dia de la semana: 0 = Domingo, 1 = Lunes

####### main texts #######
define("_CALDOTCOLORALL","Tots&nbsp;els&nbsp;esdeveniments");    // desription of all Events (no colordot)
define("_CALSEND","Enviar");
define("_CALSUBMITEVENT", "Suggerir un esdeveniment");
define("_CALSUBMITNAME", "Formulari per l'enviament d'un esdeveniment");
define("_CALNAME", "Calendari d'esdeveniments");
define("_CALPREVIEW", "Previsualitzar l'esdeveniment");
define("_CALOK", "Enviar esdeveniment");
define("_CALEVENTDATETEXT", "Data de l'esdeveniment");
define("_CALSUBSENT", "El teu esdeveniment s'ha rebut correctament");
define("_CALTHANKSSUB", "Gràcies per l'enviament!");
define("_CALSUBTEXT", "revisarem el teu esdeveniment en las properes hores, serà publicat el més aviat possible.");
define("_CALSUBTEXTADMIN", "El que ens has enviat no es publicarà directament.");
define("_CALWEHAVESUB", "fins al moment tenim");
define("_CALWAITING", "enviaments esperant ser publicats.");
define("_CALEVENTDATEPREVIEW", "Data de l'esdeveniment");
define("_CALCHECKSTORY", "Comprova els links i texts, abans d'enviar!");
define("_CALYOURNAME", "El teu nom");
define("_CALLOGOUT", "Sortir");
define("_CALSUBTITLE", "Títol");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Selecciona tema");
define("_CALARTICLETEXT", "Descripció");
define("_CALHTMLISFINE", "HTML està permès, però revisa-ho bé!");
define("_CALNEWSUBPREVIEW", "Previsualitzar l'esdeveniment");
define("_CALSTORYLOOK", "El teu esdeveniment es veurà així:");
define("_CALBEDESCRIPTIVE", "Sigues descriptiu, clar i senzill");
define("_CALSUBPREVIEW", "Has de previsualitzar l'esdeveniment abans d'enviar-ho");
define("_CALALLOWEDHTML", "Està permès HTML");
define("_CALSUBMISSIONSADMIN", "Administració d'esdeveniments");
define("_CALNEWSUBMISSIONS", "Nous esdeveniments enviats");
define("_CALNOSUBJECT", "No has introduït el títol!");
define("_CALNOSUBMISSIONS", "No s'han trobat esdeveniments!");
define("_CALDELETE", "ESBORRAR");
define("_CALNAMEFIELD", "Nom");
define("_CALDELETESTORY", "Esborrar esdeveniment");
define("_CALPREVIEWSTORY", "Previsualitzar esdeveniment");
define("_CALPOSTSTORY", "Enviar esdeveniment");
define("_CALSUBMITADVICE1", "Si us plau, completa aquest formulari amb el teu esdeveniment");
define("_CALSUBMITADVICE2", "<br />Et comuniquem que no es publiquen tots els esdeveniments.<br />El que ens has enviat serà revisat i corregit pel webmaster...");
define("_CALPOSTEDBY","Enviat per");
define("_CALPOSTEDON","el");
define("_CALACCEPTEDBY"," i aprovat per");
define("_CALPREVIOUS","Anterior");
define("_CALNEXT","Proper(s)");
define("_CALSTARTTIME","Hora d'inici");
define("_CALENDTIME","Hora de final");
define("_CALALLDAYEVENT","tot el dia");
define("_CALTIMEIGNORED","les hores d'inici i final de l'esdeveniment seran ignorades.");
define("_CALENDDATETEXT","Data de final");
define("_CALENDDATEPREVIEW","Data de final");
#define("_CALBARCOLORTEXT","Selecciona una categoria per a aquest esdeveniment");
define("_CALBARCOLORTEXT","Categoria");
define("_CALLOGIN","Login");
define("_CALNO","No");
define("_CALYES","Si");
define("_CALREMOVETEST","Estas segur de voler esborrar l'esdeveniment?");
define("_CALNOTAUTHORIZED1","NO estàs autoritzar a esborrar o editar aquest esdeveniment");
define("_CALNOTAUTHORIZED2","Contacta el webmaster davant qualsevol dubte");
define("_CALNOTAUTHORIZED3","NO estàs autoritzat a esborrar o editar aquest esdeveniment");
define("_CALTODAY","Avui");
define("_CALLISTDESCRIPTION1","Proper(s)");
define("_CALLISTDESCRIPTION2","esdeveniment(s)");
define("_CALLISTSTART","des de");
define("_CALLISTRANGE","fins a");
define("_CALHEADAPPOINTM","Festivals");
define("_CALDAYEVENTS","esdeveniments");
define("_CALDAYMORNING","Matí");
define("_CALDAYEVENING","Tarda");
define("_CALMORE","més esdeveniments");
define("_CAL1EVENT","Esdeveniment");
define("_CAL2EVENT","Esdeveniments");
define("_CAL0EVENTS", "No hi ha esdeveniments en aquesta cerca");
define("_CAL0EVENTSBLOCK", "No hi ha esdeveniments.");
define("_CALNOTODAYEVENTS","Avui no hi ha cap esdeveniment.");
define("_CALADDASARTICLE","article");
define("_CALADDASARTICLE2","Agregar un article a aquest esdeveniment.");

####### LINKS ########
define("_CALEVENTLINK","Crea un esdeveniment");
define("_CALAPPTLINK","Crea una trobada");
define("_CALTASKLINK","Afegeix una tasca");
define("_CALDAYLINK","Veure dia");
define("_CALMONTHLINK","Veure mes");
define("_CALYEARLINK","Veure any");
define("_CALJUMPTOTEXT","Vés als propers");
define("_CALJUMPBUTTON","Vés!");
define("_CALLISTLINK","propers esdeveniments");

####### MONTHS ########
define("_CALJAN","Gener");
define("_CALFEB","Febrer");
define("_CALMAR","Març");
define("_CALAPR","Abril");
define("_CALMAY","Maig");
define("_CALJUN","Juny");
define("_CALJUL","Juliol");
define("_CALAUG","Augost");
define("_CALSEP","Septembre");
define("_CALOCT","Octubre");
define("_CALNOV","Novembre");
define("_CALDEC","Desembre");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Dg");
define("_CALSECONDDAY","Dl");
define("_CALTHIRDDAY","Dm");
define("_CALFOURTHDAY","Dx");
define("_CALFIFTHDAY","Dj");
define("_CALSIXTHDAY","Dv");
define("_CALSEVENTHDAY","Ds");
define("_CALLONGFIRSTDAY","Diumenge");
define("_CALLONGSECONDDAY","Dilluns");
define("_CALLONGTHIRDDAY","Dimarts");
define("_CALLONGFOURTHDAY","Dimecres");
define("_CALLONGFIFTHDAY","Dijous");
define("_CALLONGSIXTHDAY","Divendres");
define("_CALLONGSEVENTHDAY","Dissabte");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","S'han trobat erros intentant validar un esdeveniment!");
define("_CALVALIDFIXMSG","Si us plau, corregeix aquests errors abans de previsualitzar o enviar l'esdeveniment.");
define("_CALVALIDSUBJECT","T'has oblidat el títol.");
define("_CALVALIDENDDATE","La data de finalització no és vàlida.");
define("_CALVALIDEVENTDATE","La data de l'esdeveniment no és vàlida.");
define("_CALVALIDDATES","La data de finalització ha de ser igual o posterior a la de l'esdeveniment!.");
define("_CALVALIDTIMES","l'hora de finalització ha de ser posterior a la d'inici!.");
define("_CALVALIDTOPIC", "Selecciona un tema.");

define("_CALINDEX", "mostrar els blocs de la dreta");  
define("_CALTEXTEVENTS", "Veure barres als events de més d'un dia de durada");  
define("_CALADDARTICLEBOX", "permetre la creació d'articles automàticament");  
define("_CALPOSTUSERS","Permetre suggerir events a usuaris registrats");
define("_CALUSETOPICS", "News-topics use");  
define("_CALUSETOPICS1", "Sí, però no necessàriament");  
define("_CALUSETOPICS2", "Sí, necessàriament");  
define("_CALDEFAULTVIEW", "Visualització per defecte");  
define("_CALMINUTERANGE", "Interval entre minuts a la selecció de l'hora");   
define("_CALADMINEDITALL", "Els administradors poden modificar només els seus esdeveniments");  
define("_CALADMINMENUSHOW", "Utilitzar el menú d'administració normal CMS");  
define("_CALADMINTYPE", "Administradors que poden modificar esdeveniments");  
define("_CALLISTCOUNT", "nombre d'esdeveniments en la visualització de llista");  
define("_CALLISTSHOWSTART", "indica l'hora d'inici a la llista");  
define("_CALLISTENDDATE", "indica la data de finalització a la llista");  
define("_CALLISTENDTIME", "indica l'hora de finalització a la llista");  
define("_CALLISTENDDATE2", "indica la data de finalització, si és igual a la d'inici");  
define("_CALLISTBR", "tipus de línia entre data - hora a la llista");  
define("_CALDAYTIMEARRAY", "intervals de temps en visualització de dia");  
define("_CALALLOWABLEHTML", "HTML tags permeses a la descripció");  
define("_CALONLYWEN", "(només si la data de finalització s'ha indicat)"); 
define("_CALSHOWLINKS","mostrar la data com a link en visualització de dia");  
define("_CALCALENDARCONFIG", "Configuració del calendari");  
define("_CALCONF1", "la configuració NO s'ha pogut guardar!");  
define("_CALCONF2", "la configuració s'ha aplicat!");  
define("_CALCONF3", "el fitxer");  
define("_CALCONF4", "no té permisos d'escriptura, <br />la configuració no es pot guardar!");  
define("_CALACTIV", "status actively"); //TODO 
define("_CALMENUROWS","Columnes");
define("_CALMENUROWS2","Nombre de columnes al visualitzar categories");

define("_CALERREVENTNOTEXIST","l'esdeveniment no existeix.");
define("_CALERRSQLERROR","Problema a la base de dades!");
define("_CALONLYDEACTIVATE","només desactiva'l");
define("_CALDEACTIVATED","esdeveniments desactivats");
define("_CALNODEACTIVATED","no hi ha esdeveniments desactivats");
define("_CALNAVIPREV","esdeveniments anteriors");
define("_CALNAVINEXT","propers esdeveniments");

/// ab 1.3
define("_CALPRINTER1","imprimir pàgina");
define("_CALPRINTER2","enviar aquesta pàgina a l'impresora");
define("_CALPOSTANONYMOUS", "permetre suggerir esdeveniments a usuaris anònims");  
define("_CALUSERSAUTOPOST","publicar esdeveniments suggerits per usuaris registrats immediatament");
define("_CALANONYAUTOPOST","publicar esdeveniments suggerits per usuaris registrats immediatament");
define("_CALCATEGORIESADMIN","Configuració de categories");
define("_CALCATEGORIESLANG","escull ");
define("_CALADMINMENU","Menú d'administració");
define("_CALSHOWPOPS","popup de descripció de l'esdeveniment");
define("_CALSOURCE","Font");
define("_CALGOAL","Destí");

/// ab 1.4
define('_CALHOURS',"hores");
define('_CALMINUTES',"minuts");
define('_CALDAYS',"dies");
define('_CALMONTHS',"mesos");
define('_CALYEARS',"any");
define("_CALPLSLOGIN","Si us plau, identifica't primer");
define("_CALSAVESETT", "Enviar");

define('_CALALLWORDS',"Totes les paraules [ALL]");
define('_CALANYWORDS',"Qualsevol paraula [OR]");
define('_CALSEARCH',"Cerca");
define('_CALSEARCHEVENT',"Cerca esdeveniment");
define('_CALFOR',"durant");
define('_CALSEARCHTITLE',"Cerca al calendari");
define('_CALCQUEUE',"Fesultats de la cerca");
define('_CALTOMUCH1',"Hi ha més de ");
define('_CALTOMUCH2'," resultats. Si us plau, limita les condicions de cerca.");
define("_CALSEARCHCOUNT", "nombre màxim de resultats");  
define('_CALSEARCHTOPICS',"cerca a Notícies-Temes");
define('_CALMOREOPTIONINF',"Trobaràs més paràmetres de configuració de l'aspecte del calendari al fitxer:");
define('_CALSEFROMDATE',"des de Data");
define('_CALSELCATEGORY',"escull la cagegoria");
define('_CALINTHIS',"en");
define("_CALNOTOPICS", "No hi ha cap tema disponible");
define('_CALGOTOEDIT',"editar un altre cop");
define('_CALGOTOADMIN',"i vés al menú d'Administració");
define('_CALGOTOCALENDAR',"i vés al calendari");
define('_CALCONFVIEW1',"Authoritzacions &amp; Seguritat");
define('_CALCONFVIEW2',"Opinions &amp; Aspecte");
define('_CALCONFVIEW3',"Notícies-Articles &amp; -Temes");
define("_CALLISTSHOWLINKS","mostrar la data com a link a la llista");  

#### TRANSLATE ??????????? #######################################################################
/// ab 1.4.c
define('_CAL_WYSIWYG_ACTIVE','WYSIWYG - Editor activate');
