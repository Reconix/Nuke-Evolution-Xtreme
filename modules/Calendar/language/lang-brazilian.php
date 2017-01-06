<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-brazilian.php,v 20.4 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-brazilian.php
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

/************************************************************************/
/* Tradução para Portugês do Brasil - Antonio Andrade                   */
/* NukeBrasil.org - http://www.nukebrasil.org - nuke@nukebrasil.org     */
/************************************************************************/

//  !!!!!!!!!! this file is not completely translated   !!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","en"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","en_EN");      # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%d/%m/%y");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",1);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);      # el primer dia de la semana: 0 = Domingo, 1 = Lunes

####### main texts #######
define("_CALDOTCOLORALL","Todo&nbsp;eventos");  // desription of all Events (no colordot)
define("_CALSEND","Enviar");
define("_CALSUBMITEVENT", "Adicionar um evento");
define("_CALSUBMITNAME", "Formulario para adicionar um evento");
define("_CALNAME", "Calendario de Eventos");
define("_CALPREVIEW", "Previsualizar");
define("_CALOK", "Enviar");
define("_CALEVENTDATETEXT", "Adicionar Texto");
define("_CALSUBSENT", "Sua indicação foi recebida com sucesso");
define("_CALTHANKSSUB", "Desde já agradecemos por sua contribuição!");
define("_CALSUBTEXT", "O evento adicionado será revisado pela adminitração do portal e em seguida será publicada. Lembramos quem nem todos os eventos poderão ser publicados.");
define("_CALSUBTEXTADMIN", "O evento adicionado será publicado sem revisão da administração.");
define("_CALWEHAVESUB", "até o presente momento temos");
define("_CALWAITING", "eventos para serem publicados.");
define("_CALEVENTDATEPREVIEW", "Texto do evento");
define("_CALCHECKSTORY", "Favor revisar o artigo antes de enviar para publicação!");
define("_CALYOURNAME", "Seu Nome");
define("_CALLOGOUT", "Sair");
define("_CALSUBTITLE", "Título");
define("_CALTOPIC", "Tema");
define("_CALSELECTTOPIC", "Selecionar um tema");
define("_CALARTICLETEXT", "Descrição");
define("_CALHTMLISFINE", "Uso de HTML esta permitido, favor verificar se o codigo esat correto!");
define("_CALNEWSUBPREVIEW", "Previsualizar");
define("_CALSTORYLOOK", "Seu evento será publicado assim:");
define("_CALBEDESCRIPTIVE", "Seja descritivo, claro e simples");
define("_CALSUBPREVIEW", "Deve Previsualizar o evento antes de enviar");
define("_CALALLOWEDHTML", "Esta permitido HTML");
define("_CALSUBMISSIONSADMIN", "Administração");
define("_CALNEWSUBMISSIONS", "Novos eventos");
define("_CALNOSUBJECT", "Você esqueceu de adicionar um titúlo!");
define("_CALNOSUBMISSIONS", "No ha novos envios!");
define("_CALDELETE", "Apagar");
define("_CALNAMEFIELD", "Nome");
define("_CALDELETESTORY", "Apagar Evento");
define("_CALPREVIEWSTORY", "Previsualizar");
define("_CALPOSTSTORY", "Enviar Evento");
define("_CALSUBMITADVICE1", "Por favor preencha este formulario para envio do seu evento");
define("_CALSUBMITADVICE2", "<br />Te comunicamos que nem todos os eventos serão publicados.<br />A indicação do evento será analizada pela adminitração do portal e poderá ou não ser publicada...");
define("_CALPOSTEDBY","Enviado por");
define("_CALPOSTEDON","por");
define("_CALACCEPTEDBY"," foi aprovado por");
define("_CALVIEWEVENT","Evento");
define("_CALPREVIOUS","Anterior");
define("_CALNEXT","Próximo");
define("_CALSTARTTIME","Horário de início");
define("_CALENDTIME","Horário de termino");
define("_CALALLDAYEVENT","Durante todo o dia");
define("_CALTIMEIGNORED","A hora de início e termino do evento será ignorada.");
define("_CALENDDATETEXT","Texto Final");
define("_CALENDDATEPREVIEW","Texto Final");
#define("_CALBARCOLORTEXT","Selecione una categoría para este evento");
define("_CALBARCOLORTEXT","Categoría");
define("_CALLOGIN","Login");
define("_CALNO","Não");
define("_CALYES","Sim");
define("_CALREMOVETEST","Tem certeza que quer apagar este evento?");
define("_CALNOTAUTHORIZED1","Você não tem autorização par apagar eventos");
define("_CALNOTAUTHORIZED2","Caso tenha alguma duvida favor contactar o adminitrador do portal");
define("_CALNOTAUTHORIZED3","Você não tem autorização para editar este evento");
define("_CALTODAY","Hoje");
define("_CALLISTDESCRIPTION1","Próximo");
define("_CALLISTDESCRIPTION2","Eventos");
define("_CALLISTSTART","desde");
define("_CALLISTRANGE","todos");
define("_CALHEADAPPOINTM","Festival");
define("_CALDAYEVENTS","Eventos");
define("_CALDAYMORNING","Manhã");
define("_CALDAYEVENING","Tarde");
define("_CALMORE","mais eventos");
define("_CAL1EVENT","Evento");
define("_CAL2EVENT","Eventos");
define("_CAL0EVENTS", "Não existe eventos para esta pesquisa");
define("_CAL0EVENTSBLOCK", "Não ha programação disponível.");
define("_CALNOTODAYEVENTS","Hoje não tem nenum evento programado.");
define("_CALADDASARTICLE","Artigo");
define("_CALADDASARTICLE2","Adiconar um artigo a este evento.");

####### LINKS ########
define("_CALEVENTLINK","Criar um Evento");
define("_CALAPPTLINK","Criar um Compromisso");
define("_CALTASKLINK","Adicionar uma nova tarefa");
define("_CALDAYLINK","Ver día");
define("_CALMONTHLINK","Ver mes");
define("_CALYEARLINK","Ver ano");
define("_CALJUMPTOTEXT","Ir para os próximos");
define("_CALJUMPBUTTON","Ir!");
define("_CALLISTLINK","próximos eventos");

####### MONTHS ########
define("_CALJAN","Janeiro");
define("_CALFEB","Fevereiro");
define("_CALMAR","Março");
define("_CALAPR","Abril");
define("_CALMAY","Maio");
define("_CALJUN","Junho");
define("_CALJUL","Julho");
define("_CALAUG","Agosto");
define("_CALSEP","Setembro");
define("_CALOCT","Outubro");
define("_CALNOV","Novembro");
define("_CALDEC","Dezembro");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Dom");
define("_CALSECONDDAY","Seg");
define("_CALTHIRDDAY","Ter");
define("_CALFOURTHDAY","Qua");
define("_CALFIFTHDAY","Qui");
define("_CALSIXTHDAY","Sex");
define("_CALSEVENTHDAY","Sab");
define("_CALLONGFIRSTDAY","Domingo");
define("_CALLONGSECONDDAY","Segunda Feira");
define("_CALLONGTHIRDDAY","Terça Feira");
define("_CALLONGFOURTHDAY","Quarta Feira");
define("_CALLONGFIFTHDAY","Quinta Feira");
define("_CALLONGSIXTHDAY","Sexta Feira");
define("_CALLONGSEVENTHDAY","Sabado");


####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Existe erro na validação do evento!");
define("_CALVALIDFIXMSG","Por favor corriga estes erros antes de previsualizar e enviar o evento.");

define("_CALVALIDSUBJECT","O Assunto é um campo exigido.");
define("_CALVALIDENDDATE","A Data de Fim não é uma data válida.");
define("_CALVALIDEVENTDATE","A Data de Evento não é uma data válida.");
define("_CALVALIDDATES","A Data de Fim deve estar depois ou tem que igualar a Data de Inicio do Evento!.");
define("_CALVALIDTIMES","O Horário de termino deve estar depois do Horário de Início!.");
define("_CALVALIDTOPIC", "Selecione un tema.");


#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "ver blocos");
define("_CALTEXTEVENTS", "imagems para multiplos eventos");
define("_CALADDARTICLEBOX", "permitir publicação atuomatica de eventos");
define("_CALPOSTUSERS","somente usuários registrados podem enviar eventos");
define("_CALUSETOPICS", "Usar topicos");
define("_CALUSETOPICS1", "Sim, mas não necessariamente");
define("_CALUSETOPICS2", "Sim, necessariamente");
define("_CALDEFAULTVIEW", "Ver padrão");
define("_CALMINUTERANGE", "distancia de tempo em minutos entre um eventoe outro");
define("_CALADMINEDITALL", "Adminitração so pode alterar seus proprios eventos");
define("_CALADMINMENUSHOW", "use normal CMS");
define("_CALADMINTYPE", "Admintype, which Admins may work on events");
define("_CALLISTCOUNT", "número de entradas para ser vista na lista");
define("_CALLISTSHOWSTART", "indicar o horario de início de cada evento");
define("_CALLISTENDDATE", "ver data final de cada eventoe");
define("_CALLISTENDTIME", "ver horario de finalização de cadas evento"); 
 
define("_CALLISTENDDATE2", "informar se data de finalização do evento é igual a data de início");
define("_CALLISTBR", "marcador entre a data e horario dos eventos na lista");
define("_CALDAYTIMEARRAY", "ver por intervalos de tempo");
define("_CALALLOWABLEHTML", "permitir uso de html para informação de horario");
define("_CALONLYWEN", "(somente se você indicar o horário de termino)"); 
define("_CALSHOWLINKS","ver data de cada link");
define("_CALCALENDARCONFIG", "configuração do calendário");
define("_CALCONF1", "as colocações não puderam ser armazenadas!");
define("_CALCONF2", "as colocações foram armazenadas!");
define("_CALCONF3", "o arquivo");
define("_CALCONF4", "é escrever protegido, <br />não pode ser armazenado!");
define("_CALACTIV", "Status Ativado");


define("_CALMENUROWS","Colunas");
define("_CALMENUROWS2","Numero de colunas para esta lista");

define("_CALERREVENTNOTEXIST","Este evento não exite na base de dados.");
define("_CALERRSQLERROR","Erro no banco de dados!");
define("_CALONLYDEACTIVATE","Esat desativado");
define("_CALDEACTIVATED","desativar eventos");
define("_CALNODEACTIVATED","não desativar eventos");
define("_CALNAVIPREV","Voltar");
define("_CALNAVINEXT","Próximo");

/// ab 1.3
define("_CALPRINTER1","imprima página");
define("_CALPRINTER2","envie esta página a impressora");
define("_CALPOSTANONYMOUS", "usuário anônimo tambem pode enviar eventos");
define("_CALUSERSAUTOPOST","Todos os usuários podem enviar eventos e os mesmos serão publicados automaticamente");
define("_CALCATEGORIESADMIN","Categoria-configuração");
define("_CALCATEGORIESLANG","selecioanar idioma");
define("_CALADMINMENU","Administração");
define("_CALSHOWPOPS","popup para descrição do evento");
define("_CALSOURCE","Fonte");
define("_CALGOAL","Meta");

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