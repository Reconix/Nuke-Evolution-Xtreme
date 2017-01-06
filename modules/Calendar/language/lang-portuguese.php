<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-portuguese.php,v 20.2 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-portuguese.php
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
/*Translation by:                                                       */
/*                                                                      */
/*  Djamilo 'PacKiT0' Jacinto (packito@iol.pt) - www.maxibim.net        */
/*  Lisbon, April 2004                                                  */
/************************************************************************/

####### locale time-format variables #######
define("_CALSHORTDATEFORMAT","%y/%m/%d");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",0);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALLOCALE","pt_PT");
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);      # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","todos eventos");  // desription of all Events (no colordot)
define("_CALSEND","Enviar");
define("_CALSUBMITEVENT", "Anunciar evento");
define("_CALSUBMITNAME", "Formulário de Envio de Eventos");
define("_CALNAME", "Eventos");
define("_CALPREVIEW", "Pré-Visualizar Evento");
define("_CALOK", "Sugerir Evento");
define("_CALEVENTDATETEXT", "Data Início");
define("_CALSUBSENT", "O seu envio foi recebido.");
define("_CALTHANKSSUB", "Obrigado pela sua participação!");
define("_CALSUBTEXT", "Iremos verificar o seu envio nas próximas horas; se considerarmos interessante e relevante iremos publicá-lo brevemente.");
define("_CALSUBTEXTADMIN", "A sua sugestão foi publicada directamente.");
define("_CALWEHAVESUB", "Neste momento temos");
define("_CALWAITING", "eventos sugeridos a aguardar aprovação/publicação.");
define("_CALEVENTDATEPREVIEW", "Data Evento");
define("_CALCHECKSTORY", "Por favor confirme o seu texto, links, etc, antes de enviar o seu evento!");
define("_CALYOURNAME", "Seu nome");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Assunto");
define("_CALTOPIC", "Tópico");
define("_CALSELECTTOPIC", "Seleccione Tópico");
define("_CALARTICLETEXT", "Descrição");
define("_CALHTMLISFINE", "Pode usar HTML, mas confirme os URLs e o código HTML!");
define("_CALNEWSUBPREVIEW", "Pré-visualizar sugestão");
define("_CALSTORYLOOK", "O seu evento será semelhante a isto:");
define("_CALBEDESCRIPTIVE", "Seja conciso(a), claro(a) e simples!");
define("_CALSUBPREVIEW", "Deve pré-visualizar o seu evento uma vez antes de o poder enviar");
define("_CALALLOWEDHTML", "Código HTML permitido");
define("_CALSUBMISSIONSADMIN", "Gestão de Eventos");
define("_CALNEWSUBMISSIONS", "Novos eventos enviados");
define("_CALNOSUBJECT", "Não indicou o assunto!");
define("_CALNOSUBMISSIONS", "Não existem novas submissões!");
define("_CALDELETE", "Apagar");
define("_CALNAMEFIELD", "Nome");
define("_CALDELETESTORY", "Apagar Evento");
define("_CALPREVIEWSTORY", "Pré-visualizar");
define("_CALPOSTSTORY", "Anunciar");
define("_CALSUBMITADVICE1", "Anuncie o seu evento usando o formulário seguinte e confirmando no final a informação inserida.");
define("_CALSUBMITADVICE2", "<br />Informamos que nem todos os eventos serão afixados.<br />O seu anúncio será gramaticalmente analisado e poderá ser editado pela nossa equipa.");
define("_CALPOSTEDBY","Enviado por");
define("_CALPOSTEDON","a");
define("_CALACCEPTEDBY"," e aprovado por");
define("_CALcalViewEvent","Calendário de Eventos");
define("_CALPREVIOUS","Recuar");
define("_CALNEXT","Avançar");
define("_CALSTARTTIME","Hora Início");
define("_CALENDTIME","Hora Fim");
define("_CALALLDAYEVENT","todo o dia");
define("_CALTIMEIGNORED","(as horas de início e fim serão ignoradas)");
define("_CALENDDATETEXT","Data Fim");
define("_CALENDDATEPREVIEW","Data Fim");
#define("_CALBARCOLORTEXT","Select a category for this event");
define("_CALBARCOLORTEXT","Categoria");
define("_CALLOGIN","Login");
define("_CALNO","Não");
define("_CALYES","Sim");
define("_CALREMOVETEST","Tem a certeza que deseja remover este evento?");
define("_CALNOTAUTHORIZED1","Não está autorizado(a) a remover ou editar esta entrada!");
define("_CALNOTAUTHORIZED2","Contacte o administrador do site para esclarecer qualquer dúvida.");
define("_CALNOTAUTHORIZED3","Lamentamos, mas não está autorizado(a) a remover ou editar entradas!");
define("_CALTODAY","Hoje");
define("_CALLISTDESCRIPTION1","Próximos");
define("_CALLISTDESCRIPTION2","Eventos");
define("_CALLISTSTART","desde");
define("_CALLISTRANGE","até");
define("_CALHEADAPPOINTM","Compromissos");
define("_CALDAYEVENTS","Eventos");
define("_CALDAYMORNING","Manhãs");
define("_CALDAYEVENING","Tardes");
define("_CALMORE","mais eventos");
define("_CAL1EVENT","Evento");
define("_CAL2EVENT","Eventos");
define("_CAL0EVENTS", "Não estão agendados eventos dessa categoria.");
define("_CAL0EVENTSBLOCK", "Não há eventos agendados.");
define("_CALNOTODAYEVENTS","Hoje não há eventos.");
define("_CALADDASARTICLE","artigo");
define("_CALADDASARTICLE2","Associar um artigo a este evento.");

####### LINKS ########
define("_CALEVENTLINK","Criar um evento");
define("_CALAPPTLINK","Criar um compromisso");
define("_CALTASKLINK","Adicionar uma tarefa");
define("_CALDAYLINK","Vista Diária");
define("_CALMONTHLINK","Vista Mensal");
define("_CALYEARLINK","Vista Anual");
define("_CALJUMPTOTEXT","Modo de Visualização");
define("_CALJUMPBUTTON","Ver!");
define("_CALLISTLINK","Próximos Eventos");

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
define("_CALFIRSTDAY","Dom.");
define("_CALSECONDDAY","Seg.");
define("_CALTHIRDDAY","Ter.");
define("_CALFOURTHDAY","Quar.");
define("_CALFIFTHDAY","Quin.");
define("_CALSIXTHDAY","Sex.");
define("_CALSEVENTHDAY","Sab.");
define("_CALLONGFIRSTDAY","Domingo");
define("_CALLONGSECONDDAY","Segunda");
define("_CALLONGTHIRDDAY","Terça");
define("_CALLONGFOURTHDAY","Quarta");
define("_CALLONGFIFTHDAY","Quinta");
define("_CALLONGSIXTHDAY","Sexta");
define("_CALLONGSEVENTHDAY","Sábado");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Foram encontrados erros na validação deste evento!");
define("_CALVALIDFIXMSG","Por favor corriga os erros antes de prever ou enviar este evento.");
define("_CALVALIDSUBJECT","O campo 'Tema' deve ser preenchido.");
define("_CALVALIDENDDATE","A 'Data Fim' não é uma data válida.");
define("_CALVALIDEVENTDATE","A 'Data Evento' não é uma data válida.");
define("_CALVALIDDATES","A 'Data Fim' deve ser a mesma ou posterior à 'Data Evento'.");
define("_CALVALIDTIMES","A 'Hora Final' deve ser posterior à 'Hora Início'.");
define("_CALVALIDTOPIC", "Por favor escolha um tópico.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX", "Exibir blocos do lado direito");
define("_CALTEXTEVENTS", "Barra de imagem para eventos multidiários");
define("_CALADDARTICLEBOX", "automatic News article permit");
define("_CALPOSTUSERS","Utilizadores registados podem anunciar eventos");
define("_CALUSETOPICS", "Usar tópicos de notícias");
define("_CALUSETOPICS1", "Sim, não necessário");
define("_CALUSETOPICS2", "Sim, necessário");
define("_CALDEFAULTVIEW", "Vista padrão");
define("_CALMINUTERANGE", "distance of the minutes with date time selection");
define("_CALADMINEDITALL", "Admins. só podem gerir eventos próprios");
define("_CALADMINMENUSHOW", "Exibir menu de Administração CMS no topo");
define("_CALADMINTYPE", "Administradores que podem gerir eventos:");
define("_CALLISTCOUNT", "Número de entradas na listagem de eventos");
define("_CALLISTSHOWSTART", "Exibir hora de início na listagem de eventos");
define("_CALLISTENDDATE", "Exibir data final na listagem de eventos");
define("_CALLISTENDTIME", "Exibir hora final na listagem de eventos");
define("_CALLISTENDDATE2", "Exibir data final, se igual à data inicial");
define("_CALLISTBR", "line-makeup between date and time in list-view");
define("_CALDAYTIMEARRAY", "Intervalos de tempo na vista diária");
define("_CALALLOWABLEHTML", "Código HTML permitido na descrição do evento");
define("_CALONLYWEN", "(apenas se for indicada data final)"); 
define("_CALSHOWLINKS","Exibir data, na vista por data, como link");
define("_CALCALENDARCONFIG", "Configurar calendário");
define("_CALCONF1", "Não foi possível guardar as definições!");
define("_CALCONF2", "As definições foram gravadas!");
define("_CALCONF3", "O ficheiro");
define("_CALCONF4", "está protegido contra escrita, <br />as definições nao podem ser gravadas!");
define("_CALACTIV", "status actively");

define("_CALMENUROWS","Colunas");
define("_CALMENUROWS2","Contagem de colunas na lista de Categorias");

define("_CALERREVENTNOTEXIST","Evento não existe na nossa Base de Dados.");
define("_CALERRSQLERROR","Erro na Base de Dados!");
define("_CALONLYDEACTIVATE","desactivar apenas");
define("_CALDEACTIVATED","eventos desactivados");
define("_CALNODEACTIVATED","sem eventos desactivados");
define("_CALNAVIPREV","eventos anteriores");
define("_CALNAVINEXT","eventos seguintes");

/// ab 1.3
define("_CALPRINTER1","Imprimir");
define("_CALPRINTER2","Imprimir esta página");
define("_CALPOSTANONYMOUS", "publicação automática de eventos de utilizadores anónimos");
define("_CALUSERSAUTOPOST","publicação automática de eventos de utilizadores registados");
define("_CALANONYAUTOPOST","gemeldete Termine von anonymen Benutzern sofort freischalten");
define("_CALCATEGORIESADMIN","Configurar categorias");
define("_CALCATEGORIESLANG","escolher língua");
define("_CALADMINMENU","Menu de Administração");
define("_CALSHOWPOPS","Popup de descrição de evento");
define("_CALSOURCE","Fonte");
define("_CALGOAL","Goal");
define("_CALSAVE","Salvar");

#### TRANSLATE ??????????? #######################################################################
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