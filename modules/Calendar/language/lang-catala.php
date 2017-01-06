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
// Traducci� al catal� feta per Joan Antoni C. <joanantoni@gmail.com>

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
define("_CALTHANKSSUB", "Gr�cies per l'enviament!");
define("_CALSUBTEXT", "revisarem el teu esdeveniment en las properes hores, ser� publicat el m�s aviat possible.");
define("_CALSUBTEXTADMIN", "El que ens has enviat no es publicar� directament.");
define("_CALWEHAVESUB", "fins al moment tenim");
define("_CALWAITING", "enviaments esperant ser publicats.");
define("_CALEVENTDATEPREVIEW", "Data de l'esdeveniment");
define("_CALCHECKSTORY", "Comprova els links i texts, abans d'enviar!");
define("_CALYOURNAME", "El teu nom");
define("_CALLOGOUT", "Sortir");
define("_CALSUBTITLE", "T�tol");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Selecciona tema");
define("_CALARTICLETEXT", "Descripci�");
define("_CALHTMLISFINE", "HTML est� perm�s, per� revisa-ho b�!");
define("_CALNEWSUBPREVIEW", "Previsualitzar l'esdeveniment");
define("_CALSTORYLOOK", "El teu esdeveniment es veur� aix�:");
define("_CALBEDESCRIPTIVE", "Sigues descriptiu, clar i senzill");
define("_CALSUBPREVIEW", "Has de previsualitzar l'esdeveniment abans d'enviar-ho");
define("_CALALLOWEDHTML", "Est� perm�s HTML");
define("_CALSUBMISSIONSADMIN", "Administraci� d'esdeveniments");
define("_CALNEWSUBMISSIONS", "Nous esdeveniments enviats");
define("_CALNOSUBJECT", "No has introdu�t el t�tol!");
define("_CALNOSUBMISSIONS", "No s'han trobat esdeveniments!");
define("_CALDELETE", "ESBORRAR");
define("_CALNAMEFIELD", "Nom");
define("_CALDELETESTORY", "Esborrar esdeveniment");
define("_CALPREVIEWSTORY", "Previsualitzar esdeveniment");
define("_CALPOSTSTORY", "Enviar esdeveniment");
define("_CALSUBMITADVICE1", "Si us plau, completa aquest formulari amb el teu esdeveniment");
define("_CALSUBMITADVICE2", "<br />Et comuniquem que no es publiquen tots els esdeveniments.<br />El que ens has enviat ser� revisat i corregit pel webmaster...");
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
define("_CALNOTAUTHORIZED1","NO est�s autoritzar a esborrar o editar aquest esdeveniment");
define("_CALNOTAUTHORIZED2","Contacta el webmaster davant qualsevol dubte");
define("_CALNOTAUTHORIZED3","NO est�s autoritzat a esborrar o editar aquest esdeveniment");
define("_CALTODAY","Avui");
define("_CALLISTDESCRIPTION1","Proper(s)");
define("_CALLISTDESCRIPTION2","esdeveniment(s)");
define("_CALLISTSTART","des de");
define("_CALLISTRANGE","fins a");
define("_CALHEADAPPOINTM","Festivals");
define("_CALDAYEVENTS","esdeveniments");
define("_CALDAYMORNING","Mat�");
define("_CALDAYEVENING","Tarda");
define("_CALMORE","m�s esdeveniments");
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
define("_CALJUMPTOTEXT","V�s als propers");
define("_CALJUMPBUTTON","V�s!");
define("_CALLISTLINK","propers esdeveniments");

####### MONTHS ########
define("_CALJAN","Gener");
define("_CALFEB","Febrer");
define("_CALMAR","Mar�");
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
define("_CALVALIDSUBJECT","T'has oblidat el t�tol.");
define("_CALVALIDENDDATE","La data de finalitzaci� no �s v�lida.");
define("_CALVALIDEVENTDATE","La data de l'esdeveniment no �s v�lida.");
define("_CALVALIDDATES","La data de finalitzaci� ha de ser igual o posterior a la de l'esdeveniment!.");
define("_CALVALIDTIMES","l'hora de finalitzaci� ha de ser posterior a la d'inici!.");
define("_CALVALIDTOPIC", "Selecciona un tema.");

define("_CALINDEX", "mostrar els blocs de la dreta");  
define("_CALTEXTEVENTS", "Veure barres als events de m�s d'un dia de durada");  
define("_CALADDARTICLEBOX", "permetre la creaci� d'articles autom�ticament");  
define("_CALPOSTUSERS","Permetre suggerir events a usuaris registrats");
define("_CALUSETOPICS", "News-topics use");  
define("_CALUSETOPICS1", "S�, per� no necess�riament");  
define("_CALUSETOPICS2", "S�, necess�riament");  
define("_CALDEFAULTVIEW", "Visualitzaci� per defecte");  
define("_CALMINUTERANGE", "Interval entre minuts a la selecci� de l'hora");   
define("_CALADMINEDITALL", "Els administradors poden modificar nom�s els seus esdeveniments");  
define("_CALADMINMENUSHOW", "Utilitzar el men� d'administraci� normal CMS");  
define("_CALADMINTYPE", "Administradors que poden modificar esdeveniments");  
define("_CALLISTCOUNT", "nombre d'esdeveniments en la visualitzaci� de llista");  
define("_CALLISTSHOWSTART", "indica l'hora d'inici a la llista");  
define("_CALLISTENDDATE", "indica la data de finalitzaci� a la llista");  
define("_CALLISTENDTIME", "indica l'hora de finalitzaci� a la llista");  
define("_CALLISTENDDATE2", "indica la data de finalitzaci�, si �s igual a la d'inici");  
define("_CALLISTBR", "tipus de l�nia entre data - hora a la llista");  
define("_CALDAYTIMEARRAY", "intervals de temps en visualitzaci� de dia");  
define("_CALALLOWABLEHTML", "HTML tags permeses a la descripci�");  
define("_CALONLYWEN", "(nom�s si la data de finalitzaci� s'ha indicat)"); 
define("_CALSHOWLINKS","mostrar la data com a link en visualitzaci� de dia");  
define("_CALCALENDARCONFIG", "Configuraci� del calendari");  
define("_CALCONF1", "la configuraci� NO s'ha pogut guardar!");  
define("_CALCONF2", "la configuraci� s'ha aplicat!");  
define("_CALCONF3", "el fitxer");  
define("_CALCONF4", "no t� permisos d'escriptura, <br />la configuraci� no es pot guardar!");  
define("_CALACTIV", "status actively"); //TODO 
define("_CALMENUROWS","Columnes");
define("_CALMENUROWS2","Nombre de columnes al visualitzar categories");

define("_CALERREVENTNOTEXIST","l'esdeveniment no existeix.");
define("_CALERRSQLERROR","Problema a la base de dades!");
define("_CALONLYDEACTIVATE","nom�s desactiva'l");
define("_CALDEACTIVATED","esdeveniments desactivats");
define("_CALNODEACTIVATED","no hi ha esdeveniments desactivats");
define("_CALNAVIPREV","esdeveniments anteriors");
define("_CALNAVINEXT","propers esdeveniments");

/// ab 1.3
define("_CALPRINTER1","imprimir p�gina");
define("_CALPRINTER2","enviar aquesta p�gina a l'impresora");
define("_CALPOSTANONYMOUS", "permetre suggerir esdeveniments a usuaris an�nims");  
define("_CALUSERSAUTOPOST","publicar esdeveniments suggerits per usuaris registrats immediatament");
define("_CALANONYAUTOPOST","publicar esdeveniments suggerits per usuaris registrats immediatament");
define("_CALCATEGORIESADMIN","Configuraci� de categories");
define("_CALCATEGORIESLANG","escull ");
define("_CALADMINMENU","Men� d'administraci�");
define("_CALSHOWPOPS","popup de descripci� de l'esdeveniment");
define("_CALSOURCE","Font");
define("_CALGOAL","Dest�");

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
define('_CALTOMUCH1',"Hi ha m�s de ");
define('_CALTOMUCH2'," resultats. Si us plau, limita les condicions de cerca.");
define("_CALSEARCHCOUNT", "nombre m�xim de resultats");  
define('_CALSEARCHTOPICS',"cerca a Not�cies-Temes");
define('_CALMOREOPTIONINF',"Trobar�s m�s par�metres de configuraci� de l'aspecte del calendari al fitxer:");
define('_CALSEFROMDATE',"des de Data");
define('_CALSELCATEGORY',"escull la cagegoria");
define('_CALINTHIS',"en");
define("_CALNOTOPICS", "No hi ha cap tema disponible");
define('_CALGOTOEDIT',"editar un altre cop");
define('_CALGOTOADMIN',"i v�s al men� d'Administraci�");
define('_CALGOTOCALENDAR',"i v�s al calendari");
define('_CALCONFVIEW1',"Authoritzacions &amp; Seguritat");
define('_CALCONFVIEW2',"Opinions &amp; Aspecte");
define('_CALCONFVIEW3',"Not�cies-Articles &amp; -Temes");
define("_CALLISTSHOWLINKS","mostrar la data com a link a la llista");  

#### TRANSLATE ??????????? #######################################################################
/// ab 1.4.c
define('_CAL_WYSIWYG_ACTIVE','WYSIWYG - Editor activate');
