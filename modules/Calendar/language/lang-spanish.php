<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-spanish.php,v 20.11 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-spanish.php
   Author        : See below
   Improved by   : LombudXa (Rodmar) (www.evolved-Systems.net)
   Version       : 1.4.0c (Based on KalenderMx 1.4b)
   Date          : 06/18/2005 (mm-dd-yyyy)

   Description   : Enhanced Calendar module with a lot of nice
                   features.
                   New Abstraction Layer and Nuke 7.6 Administration
                   System.
************************************************************************/

/************************************************************************/
/* KalenderMx v1.4                                                      */
/* ===================                                                  */
/*  Calendar Module for vkpMx 2.x / pragmaMx & phpNuke 5.5-7.6          */
/*  Copyright (c) 2004 by A.Ellsel (kalender@pragmamx.org)              */
/*  http://www.pragmamx.org & http://www.shiba-design.de                */
/* -------------------------------------------------------------------- */
/* KalenderMx is based on EventCalendar 2.0                             */
/*  Copyright (c) 2001 Originally by Rob Sutton                         */
/*  http://smart.xnettech.net (Nuke Site)                               */
/*  Development continued by Aleks A.-Lessmann                          */
/* Included some ideas and changes by:                                  */
/*  flobee, bulli-frank, kicks, kochloeffel, FrankySz, Jubilee          */
/* -------------------------------------------------------------------- */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 or a newer version.   */
/************************************************************************/

//  !!!!!!!!!! this file is not completely translated   !!!!!!
/// translated by:
/// CRISTIAN, :butumbaba@flashmail.com
///   NOT COMPLETE FOR VERSION 1.4 !!!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","en"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","en_EN");        # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d/%m/%y");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",0);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);        # el primer dia de la semana: 0 = Domingo, 1 = Lunes

####### main texts #######
define("_CALDOTCOLORALL","Todo&nbsp;eventos");  // desription of all Events (no colordot)
define("_CALSEND","Enviar");
define("_CALSUBMITEVENT", "Sugerí un evento");
define("_CALSUBMITNAME", "Formulario para el  envio de un evento");
define("_CALNAME", "Calendario de Eventos");
define("_CALPREVIEW", "Previsualizar el evento");
define("_CALOK", "Enviar evento");
define("_CALEVENTDATETEXT", "Fecha del evento");
define("_CALSUBSENT", "Tu evento ha sido recibido");
define("_CALTHANKSSUB", "Gracias por tu envio!");
define("_CALSUBTEXT", "revisaremos tu evento en las proximas horas,será publicado enseguida.");
define("_CALSUBTEXTADMIN", "Tu envio será publicado directamente.");
define("_CALWEHAVESUB", "hasta el momento tenemos");
define("_CALWAITING", "envios esperando ser publicados.");
define("_CALEVENTDATEPREVIEW", "Fecha del evento");
define("_CALCHECKSTORY", "Chequea los links y los textos, antes de enviar!");
define("_CALYOURNAME", "Tu Nombre");
define("_CALLOGOUT", "Salir");
define("_CALSUBTITLE", "Título");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Selecciona tema");
define("_CALARTICLETEXT", "Descripción");
define("_CALHTMLISFINE", "HTML esta permitido, pero revisa bien!");
define("_CALNEWSUBPREVIEW", "Previsualizar el evento");
define("_CALSTORYLOOK", "Tu evento se verá algo así:");
define("_CALBEDESCRIPTIVE", "Se descriptivo, claro y simple");
define("_CALSUBPREVIEW", "Debés previsualizar el evento antes de enviarlo");
define("_CALALLOWEDHTML", "Esta permitido HTML");
define("_CALSUBMISSIONSADMIN", "Administracion de eventos");
define("_CALNEWSUBMISSIONS", "Nuevos eventos enviados");
define("_CALNOSUBJECT", "No ingresaste el titulo!");
define("_CALNOSUBMISSIONS", "No se encontraron envios!");
define("_CALDELETE", "BORRAR");
define("_CALNAMEFIELD", "Nombre");
define("_CALDELETESTORY", "Borrar evento");
define("_CALPREVIEWSTORY", "Previsualizar evento");
define("_CALPOSTSTORY", "Enviar Evento");
define("_CALSUBMITADVICE1", "Por favor completá este formulario con tu evento");
define("_CALSUBMITADVICE2", "<br />Te comunicamos que no se publican todos los eventos.<br />Tu envio será revisado y corregido por el webmaster...");
define("_CALPOSTEDBY","Enviado por");
define("_CALPOSTEDON","el");
define("_CALACCEPTEDBY"," y aprovado por");
define("_CALVIEWEVENT","Evento");
define("_CALPREVIOUS","Anterior");
define("_CALNEXT","Próximo");
define("_CALSTARTTIME","Hora que comienza");
define("_CALENDTIME","Hora que termina");
define("_CALALLDAYEVENT","todo el día");
define("_CALTIMEIGNORED","la hora del comienzo y final del evento serán ignorados.");
define("_CALENDDATETEXT","Fecha que finaliza");
define("_CALENDDATEPREVIEW","Fecha que finaliza");
#define("_CALBARCOLORTEXT","Selecciona una categoría para este evento");
define("_CALBARCOLORTEXT","Categoría");
define("_CALLOGIN","Login");
define("_CALNO","No");
define("_CALYES","Si");
define("_CALREMOVETEST","Estas seguro que querés borrar el evento?");
define("_CALNOTAUTHORIZED1","NO estas autorizado a borrar o editar este evento");
define("_CALNOTAUTHORIZED2","Contacta al webmaster por cualquier duda");
define("_CALNOTAUTHORIZED3","NO estas autorizado a borrar o editar este evento");
define("_CALTODAY","Hoy");
define("_CALLISTDESCRIPTION1","El próximo");
define("_CALLISTDESCRIPTION2","Eventos");
define("_CALLISTSTART","desde");
define("_CALLISTRANGE","hasta");
define("_CALHEADAPPOINTM","Festivales");
define("_CALDAYEVENTS","Eventos");
define("_CALDAYMORNING","Mañana");
define("_CALDAYEVENING","Tarde");
define("_CALMORE","mas eventos");
define("_CAL1EVENT","Evento");
define("_CAL2EVENT","Eventos");
define("_CAL0EVENTS", "No hay eventos en esta búsqueda");
define("_CAL0EVENTSBLOCK", "No tenemos eventos disponibles.");
define("_CALNOTODAYEVENTS","Hoy no hay eventos.");
define("_CALADDASARTICLE","articulo");
define("_CALADDASARTICLE2","Agregar un artículo a este evento.");

####### LINKS ########
define("_CALEVENTLINK","Crear un evento");
define("_CALAPPTLINK","Crear un encuentro");
define("_CALTASKLINK","Agregar una tarea");
define("_CALDAYLINK","Ver día");
define("_CALMONTHLINK","Ver mes");
define("_CALYEARLINK","Ver año");
define("_CALJUMPTOTEXT","Ir a los próximos");
define("_CALJUMPBUTTON","Ir!");
define("_CALLISTLINK","próximos eventos");

####### MONTHS ########
define("_CALJAN","Enero");
define("_CALFEB","Febrero");
define("_CALMAR","Marzo");
define("_CALAPR","Abril");
define("_CALMAY","Mayo");
define("_CALJUN","Junio");
define("_CALJUL","Julio");
define("_CALAUG","Augosto");
define("_CALSEP","Septiembre");
define("_CALOCT","Octubre");
define("_CALNOV","Noviembre");
define("_CALDEC","Deciembre");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Dom");
define("_CALSECONDDAY","Lun");
define("_CALTHIRDDAY","Mar");
define("_CALFOURTHDAY","Mie");
define("_CALFIFTHDAY","Jue");
define("_CALSIXTHDAY","Vie");
define("_CALSEVENTHDAY","Sáb");
define("_CALLONGFIRSTDAY","Domingo");
define("_CALLONGSECONDDAY","Lunes");
define("_CALLONGTHIRDDAY","Martes");
define("_CALLONGFOURTHDAY","Miércoles");
define("_CALLONGFIFTHDAY","Jueves");
define("_CALLONGSIXTHDAY","Viernes");
define("_CALLONGSEVENTHDAY","Sábado");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Se encontraron errores intentando validar un evento!");
define("_CALVALIDFIXMSG","Por favor corrige estos errores antes de previsualizar o enviar el evento.");
define("_CALVALIDSUBJECT","Te olvidaste el Título.");
define("_CALVALIDENDDATE","No es una fecha válida la de finalización.");
define("_CALVALIDEVENTDATE","No es una fecha válida la del evento.");
define("_CALVALIDDATES","La fecha de finalización debe ser igual o posterior a la del evento!.");
define("_CALVALIDTIMES","La hora de finalización debe ser posterior a la del comienzo!.");
define("_CALVALIDTOPIC", "Selecciona un tema.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "show right blocks");
define("_CALTEXTEVENTS", "image Bars for multiday events");
define("_CALADDARTICLEBOX", "automatic News article permit");
define("_CALPOSTUSERS","registered Users allow events announce");
define("_CALUSETOPICS", "News-topics use");
define("_CALUSETOPICS1", "Yes, but not necessarily");
define("_CALUSETOPICS2", "Yes, necessarily");
define("_CALDEFAULTVIEW", "Defaultview");
define("_CALMINUTERANGE", "distance of the minutes with date time selection");
define("_CALADMINEDITALL", "Admins may work on only own events");
define("_CALADMINMENUSHOW", "use normal CMS Adminmenue");
define("_CALADMINTYPE", "Admintype, which Admins may work on events");
define("_CALLISTCOUNT", "number of entries in list-view");
define("_CALLISTSHOWSTART", "starting time in list-view indicate");
define("_CALLISTENDDATE", "final date in list-view indicate");
define("_CALLISTENDTIME", "final time in list-view indicate");
define("_CALLISTENDDATE2", "final date in indicate, if equal the starting date");
define("_CALLISTBR", "line-makeup between date and time in list-view");
define("_CALDAYTIMEARRAY", "time intervalls in daily view");
define("_CALALLOWABLEHTML", "permitted HTML tags in description of date");
define("_CALONLYWEN", "(only if final date indicated)"); 
define("_CALSHOWLINKS","show date in day-view as link");
define("_CALCALENDARCONFIG", "calendar configuration");
define("_CALCONF1", "the settings could not be stored!");
define("_CALCONF2", "the settings were stored!");
define("_CALCONF3", "the file");
define("_CALCONF4", "is write protected, <br />settings can not be stored!");
define("_CALACTIV", "status actively");

define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Count of Columns in Categories-List");

define("_CALERREVENTNOTEXIST","Event doesn't exist in our database.");
define("_CALERRSQLERROR","Database-Error!");
define("_CALONLYDEACTIVATE","only deactivate");
define("_CALDEACTIVATED","deactivated events");
define("_CALNODEACTIVATED","no deactivated events");
define("_CALNAVIPREV","Events back");
define("_CALNAVINEXT","next Events");

/// ab 1.3
define("_CALPRINTER1","print page");
define("_CALPRINTER2","send this page to printer");
define("_CALPOSTANONYMOUS", "anonymous allow events announce");
define("_CALUSERSAUTOPOST","publish announced events from announced users immediately");
define("_CALANONYAUTOPOST","publish announced events from anonymous users immediately");
define("_CALCATEGORIESADMIN","Category-Configuration");
define("_CALCATEGORIESLANG","select language");
define("_CALADMINMENU","Administration Menu");
define("_CALSHOWPOPS","popup for eventdescription");
define("_CALSOURCE","Source");
define("_CALGOAL","Goal");

/// ab 1.4
define('_CALHOURS','hours');
define('_CALMINUTES','minutes');
define('_CALDAYS','days');
define('_CALMONTHS','months');
define('_CALYEARS','years');
define("_CALPLSLOGIN","Please Log-In first");
define("_CALSAVESETT", "Enviar");

define('_CALALLWORDS','All words [ALL]');
define('_CALANYWORDS','Any words[OR]');
define('_CALSEARCH','Search');
define('_CALSEARCHEVENT','Search Event');
define('_CALFOR','for');
define('_CALSEARCHTITLE','Search in Eventcalendar');
define('_CALCQUEUE','Your search results');
define('_CALTOMUCH1','There is more than ');
define('_CALTOMUCH2',' search results present. Please limit the search conditions.');
define("_CALSEARCHCOUNT", "max. number of search results");
define('_CALSEARCHTOPICS','search in News-Topics');
define('_CALMOREOPTIONINF','You find further options for the optical configuration of the calendar in the file:');
define('_CALSEFROMDATE','from Date');
define('_CALSELCATEGORY','select Category');
define('_CALINTHIS','in');
define("_CALNOTOPICS", "There are no topics available");
define('_CALGOTOEDIT','edit again');
define('_CALGOTOADMIN','then goto Adminmenue');
define('_CALGOTOCALENDAR','then goto Calendarview');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","show date in list-view as link");

?>