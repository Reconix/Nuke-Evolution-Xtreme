<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-galego.php,v 20.0 2004/08/23 13:36:25 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : block-Calendar_centerlist.php
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

//  !!!!!!!!!! this file is completely translated   !!!!!!
/// Galego translated by:
/// Pedro Telmo, p.telmo@valminor.info
///   COMPLETE FOR VERSION 1.4 !!!!!!!

####### VARIABLES DE FORMATO DE TEMPO LOCAL #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","es"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","es_ES");      # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d/%m/%y");
define("_CALLONGDATEFORMAT","%A, %d %B %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/aaaa, 1 = dd/mm/aaaa
define("_CALTIME24HOUR",1);// 1 = formato 24 horas... 0 = formato AM/PM
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",1);      # o primeiro dia da sem�n: 0 = Domingo, 1 = Luns

####### TESTOS PRINCIPAIS #######
define("_CALDOTCOLORALL","Todos os eventos");  // desription of all Events (no colordot)
define("_CALSEND","Enviar");
define("_CALSUBMITEVENT", "Enviar un evento");
define("_CALSUBMITNAME", "Formulario para o envio dun evento");
define("_CALNAME", "Calendario de Eventos");
define("_CALPREVIEW", "Previsualizar o evento");
define("_CALOK", "Engadir un evento");
define("_CALEVENTDATETEXT", "Data do evento");
define("_CALSUBSENT", "O teu evento foi recibido");
define("_CALTHANKSSUB", "Gracias polo teu envio!");
define("_CALSUBTEXT", "revisaremos o teu evento nas pr�ximas horas,ser� publicado deseguida.");
define("_CALSUBTEXTADMIN", "O teu env�o ser� publicado directamente.");
define("_CALWEHAVESUB", "ata o momento tenemos");
define("_CALWAITING", "envios esperando ser publicados.");
define("_CALEVENTDATEPREVIEW", "Data do evento");
define("_CALCHECKSTORY", "Chequea as ligaz�ns e os textos, antes de enviar!");
define("_CALYOURNAME", "O teu Nome");
define("_CALLOGOUT", "Sair");
define("_CALSUBTITLE", "T�tulo");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Seleccionar tema");
define("_CALARTICLETEXT", "Descripci�n");
define("_CALHTMLISFINE", "HTML esta permitido, pero revisao ben!");
define("_CALNEWSUBPREVIEW", "Previsualizar o evento");
define("_CALSTORYLOOK", "O teu evento verase as�:");
define("_CALBEDESCRIPTIVE", "Se descriptivo, claro e simple");
define("_CALSUBPREVIEW", "Deb�s previsualizar o evento antes de envialo");
define("_CALALLOWEDHTML", "Est� permitido o HTML");
define("_CALSUBMISSIONSADMIN", "Administraci�n de eventos");
define("_CALNEWSUBMISSIONS", "Novos eventos enviados");
define("_CALNOSUBJECT", "Non engadiches o t�tulo!");
define("_CALNOSUBMISSIONS", "Non se atoparon envios!");
define("_CALDELETE", "Riscar");
define("_CALNAMEFIELD", "Nome");
define("_CALDELETESTORY", "Riscar evento");
define("_CALPREVIEWSTORY", "Previsualizar evento");
define("_CALPOSTSTORY", "Enviar Evento");
define("_CALSUBMITADVICE1", "Por favor completa este formulario co teu evento");
define("_CALSUBMITADVICE2", "<br />Comunic�mosche que non se publican todos os eventos.<br />O teu envio ser� revisado e correxido polo webmaster...");
define("_CALPOSTEDBY","Enviado por");
define("_CALPOSTEDON","o");
define("_CALACCEPTEDBY"," e aprobado por");
define("_CALVIEWEVENT","Evento");
define("_CALPREVIOUS","Anterior");
define("_CALNEXT","Seguintes");
define("_CALSTARTTIME","Hora de comezo");
define("_CALENDTIME","Hora de remate");
define("_CALALLDAYEVENT","todo o d�a");
define("_CALTIMEIGNORED","a hora de comezo e final do evento ser�n ignorados.");
define("_CALENDDATETEXT","Data que finaliza");
define("_CALENDDATEPREVIEW","Data que finaliza");
#define("_CALBARCOLORTEXT","Selecciona unha categor�a para este evento");
define("_CALBARCOLORTEXT","Categor�a");
define("_CALLOGIN","Acceso");
define("_CALNO","Non");
define("_CALYES","Si");
define("_CALREMOVETEST","�Est�s seguro que queres riscar o evento?");
define("_CALNOTAUTHORIZED1","Non est�s autorizado a borrar ou editar este evento");
define("_CALNOTAUTHORIZED2","Contacta c� webmaster para calquera d�bida");
define("_CALNOTAUTHORIZED3","NON est�s autorizado a riscar ou editar este evento");
define("_CALTODAY","Hoxe");
define("_CALLISTDESCRIPTION1","Os pr�ximos");
define("_CALLISTDESCRIPTION2","eventos");
define("_CALLISTSTART","dende");
define("_CALLISTRANGE","ata");
define("_CALHEADAPPOINTM","Festas");
define("_CALDAYEVENTS","Eventos");
define("_CALDAYMORNING","Ma��");
define("_CALDAYEVENING","Ser�n");
define("_CALMORE","m�is eventos");
define("_CAL1EVENT","Evento");
define("_CAL2EVENT","Eventos");
define("_CAL0EVENTS", "Non hai eventos nesta procura");
define("_CAL0EVENTSBLOCK", "Non tenemos eventos dispo�ibles.");
define("_CALNOTODAYEVENTS","Hoxe non hai eventos.");
define("_CALADDASARTICLE","artigo");
define("_CALADDASARTICLE2","Agregar un art�go a este evento.");

####### LIGAZONS ########
define("_CALEVENTLINK","Crear un evento");
define("_CALAPPTLINK","Crear un encontro");
define("_CALTASKLINK","Agregar una tarefa");
define("_CALDAYLINK","Ver d�a");
define("_CALMONTHLINK","Ver mes");
define("_CALYEARLINK","Ver ano");
define("_CALJUMPTOTEXT","Ver os pr�ximos");
define("_CALJUMPBUTTON","Ver");
define("_CALLISTLINK","pr�ximos eventos");

####### MESES ########
define("_CALJAN","Xaneiro");
define("_CALFEB","Febreiro");
define("_CALMAR","Marzo");
define("_CALAPR","Abril");
define("_CALMAY","Maio");
define("_CALJUN","Xu�o");
define("_CALJUL","Xullo");
define("_CALAUG","Agosto");
define("_CALSEP","Septembro");
define("_CALOCT","Outubro");
define("_CALNOV","Noviembro");
define("_CALDEC","Decembro");

####### DIAS DA SEMAN ########
define("_CALFIRSTDAY","Dom");
define("_CALSECONDDAY","Luns");
define("_CALTHIRDDAY","Mar");
define("_CALFOURTHDAY","Mer");
define("_CALFIFTHDAY","Xov");
define("_CALSIXTHDAY","Ven");
define("_CALSEVENTHDAY","S�b");
define("_CALLONGFIRSTDAY","Domingo");
define("_CALLONGSECONDDAY","Luns");
define("_CALLONGTHIRDDAY","Martes");
define("_CALLONGFOURTHDAY","M�rcores");
define("_CALLONGFIFTHDAY","Xoves");
define("_CALLONGSIXTHDAY","Venres");
define("_CALLONGSEVENTHDAY","S�bado");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Atop�ronse erros intentando validar o evento!");
define("_CALVALIDFIXMSG","Por favor corrixe estos erros antes de previsualizar ou enviar o evento.");
define("_CALVALIDSUBJECT","Olvidaches o T�tulo.");
define("_CALVALIDENDDATE","A data finalizaci�n do evento non � v�lida.");
define("_CALVALIDEVENTDATE","A data do evento non � v�lida.");
define("_CALVALIDDATES","A data finalizaci�n debe ser igual ou posterior � data do evento!.");
define("_CALVALIDTIMES","A hora de finalizaci�n debe ser posterior � de comezo!.");
define("_CALVALIDTOPIC", "Selecciona un tema.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "Ver bloques da dereita");
define("_CALTEXTEVENTS", "Barra de imaxe para varios d�as");
define("_CALADDARTICLEBOX", "Permitir artigo de noticias autom�ticas");
define("_CALPOSTUSERS","Os usuarios rexistrados poden enviar eventos");
define("_CALUSETOPICS", "Utilizar Novas-Temas");
define("_CALUSETOPICS1", "Si, pero non necesariamente");
define("_CALUSETOPICS2", "Si, � necesario");
define("_CALDEFAULTVIEW", "Vista por defecto");
define("_CALMINUTERANGE", "diferencia en minutos coa hora dos eventos");
define("_CALADMINEDITALL", "Os administradores s� poden modificar os seus eventos");
define("_CALADMINMENUSHOW", "utilizar o Men� de administraci�n CMS normal");
define("_CALADMINTYPE", "Que usuario pode administrar os eventos");
define("_CALLISTCOUNT", "N�mero de evento a visualizar na lista");
define("_CALLISTSHOWSTART", "Indicar a hora de comezo na lista");
define("_CALLISTENDDATE", "Indicar a data de remate na lista");
define("_CALLISTENDTIME", "Indicar a hora de remate na lista");
define("_CALLISTENDDATE2", "indicar a data de remate, se � igual que a data de comezo");
define("_CALLISTBR", "a li�a da lista estar� composta coa data e a hora");
define("_CALDAYTIMEARRAY", "intervalos de tempo na vista diaria");
define("_CALALLOWABLEHTML", "permitir c�digo HTML na descripci�n da data");
define("_CALONLYWEN", "(s� se a data final foi indicada)"); 
define("_CALSHOWLINKS","Mostrar data na vista diaria como ligaz�ns");
define("_CALCALENDARCONFIG", "Configuraci�n do calendario");
define("_CALCONF1", "As preferencias non puideron ser gardadas!");
define("_CALCONF2", "As preferencias foron gardadas!");
define("_CALCONF3", "O ficheiro");
define("_CALCONF4", "est� protexido contra escritura, <br />Non pode ser gardada a configuraci�n!");
define("_CALACTIV", "Activar");

define("_CALMENUROWS","Columnas");
define("_CALMENUROWS2","N�mero de columnas na lista de categor�as");

define("_CALERREVENTNOTEXIST","Non existe ese evento na base de datos.");
define("_CALERRSQLERROR","Error da base de datos!");
define("_CALONLYDEACTIVATE","S� desactivar");
define("_CALDEACTIVATED","Desactivar eventos");
define("_CALNODEACTIVATED","Non hai eventos desactivados");
define("_CALNAVIPREV","Eventos anteriores");
define("_CALNAVINEXT","Seguintes eventos");

/// ab 1.3
define("_CALPRINTER1","Imprimir p�xina");
define("_CALPRINTER2","Imprimir esta p�xina");
define("_CALPOSTANONYMOUS", "Permitir enviar evento an�nimos");
define("_CALUSERSAUTOPOST","Publicar os eventos dos usuarios de forma autom�tica");
define("_CALANONYAUTOPOST","Publicar os eventos dos usuarios de forma autom�tica");
define("_CALCATEGORIESADMIN","Configuraci�n de Categor�as");
define("_CALCATEGORIESLANG","Seleccionar o idioma");
define("_CALADMINMENU","Men� de Administraci�n");
define("_CALSHOWPOPS","Ventana emerxente para descripci�n de eventos");
define("_CALSOURCE","Fonte");
define("_CALGOAL","Meta");

/// ab 1.4
define('_CALHOURS','horas');
define('_CALMINUTES','minutos');
define('_CALDAYS','d�as');
define('_CALMONTHS','meses');
define('_CALYEARS','anos');
define("_CALPLSLOGIN","Por favor indentif�cate primeiro");
define("_CALSAVESETT", "Enviar");

define('_CALALLWORDS','Todas as palabras [ALL]');
define('_CALANYWORDS','Nig�nha palabra[OR]');
define('_CALSEARCH','Buscar');
define('_CALSEARCHEVENT','Buscar evento');
define('_CALFOR','para');
define('_CALSEARCHTITLE','Buscar na axenda');
define('_CALCQUEUE','REsultados da s�a pesquisa');
define('_CALTOMUCH1','Hai m�is de ');
define('_CALTOMUCH2',' search results present. Por favor limite as condici�ns de b�squeda.');
define("_CALSEARCHCOUNT", "N�mero m�ximo de resultados");
define('_CALSEARCHTOPICS','buscar nos temas das noticias');
define('_CALMOREOPTIONINF','Pode atopar a configuraci�n das opci�ns avanzadas do aspecto do calendario no ficheiro :');
define('_CALSEFROMDATE','da data');
define('_CALSELCATEGORY','seleccionar Categor�a');
define('_CALINTHIS','en');
define("_CALNOTOPICS", "Non hai temas dispo�ibles");
define('_CALGOTOEDIT','Editar outra vez');
define('_CALGOTOADMIN','Despois saltar ao men� de aministraci�n');
define('_CALGOTOCALENDAR','Despois saltar � vista previa do calendario');
define('_CALCONFVIEW1','Autorizaci�ns e Seguridade');
define('_CALCONFVIEW2','Opci�ns de visualizaci�n');
define('_CALCONFVIEW3','Novas-Artigos &amp; -Temas');
define("_CALLISTSHOWLINKS","ver a data na lista como unha ligaz�n");

?>