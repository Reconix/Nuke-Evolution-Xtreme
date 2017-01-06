<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-turkish.php,v 20.10 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-turkish.php
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

//// translation by: zazaeren (info at gencliginsesi dot net)    THX !!
///   NOT COMPLETE FOR VERSION 1.4 !!!!!!!

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","tr"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","tr_TR");      # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%y/%m/%d");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",0);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%Mh"); # ? AM/PM time
define("_CALWEEKBEGINN",0);      # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","T�m Etkinlikler");  // desription of all Events (no colordot)
define("_CALSEND","G�nder");
define("_CALSUBMITEVENT", "Etkinlik Ekle");
define("_CALSUBMITNAME", "Etkinlik Bildiri Formu");
define("_CALNAME", "Etkinlik Takvimi");
define("_CALPREVIEW", "G�ster");
define("_CALOK", "G�nder");
define("_CALEVENTDATETEXT", "Ba�lang�� Tarihi");
define("_CALSUBSENT", "G�ndermi� oldu�unuz olay sisteme eklendi.");
define("_CALTHANKSSUB", "Katk�n�z i�in te�ekk�r ederiz!");
define("_CALSUBTEXT", "G�ndermi� oldu�unuz Etkinlik teklifi kontrol edilecek, ilgin� ve konu ile ilgiliyse daha sonra yay�nlanacak.");
define("_CALSUBTEXTADMIN", "Y�netici giri�i yapt���n�z i�in �nerdi�iniz etkinlik direkt olarak yay�nland�.");
define("_CALWEHAVESUB", "�u anda sisteme kay�tl�");
define("_CALWAITING", "onaylanmay� bekleyen etkinlikler.");
define("_CALEVENTDATEPREVIEW", "Tarih");
define("_CALCHECKSTORY", "L�tfen yazm�� oldu�unuz etkinli�i g�ndermeden �nce kontrol ediniz.");
define("_CALYOURNAME", "�sminiz");
define("_CALLOGOUT", "��k��");
define("_CALSUBTITLE", "Ba�l�k");
define("_CALTOPIC", "Konular");
define("_CALSELECTTOPIC", "Konu Se�");
define("_CALARTICLETEXT", "A��klama");
define("_CALHTMLISFINE", "Yaz�n�zda HTML kodlar� kullanabilirsiniz.");
define("_CALNEWSUBPREVIEW", "Etkinlik �nizlemesi");
define("_CALSTORYLOOK", "�nermek �zere oldu�unuz etkinlik b�yle g�z�kecek:");
define("_CALBEDESCRIPTIVE", "A��klayici ve anla��l�r olun. D�zg�n bi dil kullan�n");
define("_CALSUBPREVIEW", "Etkinlik �nerinizi g�ndermeden �nce nas�l g�r�nd���ne �n izleme yaparak bir bak�n...");
define("_CALALLOWEDHTML", "�zin verilen HTML Kodlar�");
define("_CALSUBMISSIONSADMIN", "Takvim Y�neticisi");
define("_CALNEWSUBMISSIONS", "Yeni Ekinlik �nerisi");
define("_CALNOSUBJECT", "Ba�l�k girilmemi�!");
define("_CALNOSUBMISSIONS", "Etkinlik A��klamas� Yok!");
define("_CALDELETE", "S � L");
define("_CALNAMEFIELD", "�sim");
define("_CALDELETESTORY", "Etkinlik S�L");
define("_CALPREVIEWSTORY", "Etkinlik �nizle");
define("_CALPOSTSTORY", "Etkinlik G�nder");
define("_CALSUBMITADVICE1", "L�tfen a�a��daki formu doldurarak ve kontrol ederek Takvime Etkinlik �nerinizi yaz�n�z.");
define("_CALSUBMITADVICE2", "<br />Bilmelisiniz ki her bildirim yay�nlan�cak diye bi�i yoktur. �nce edit�rlerimiz taraf�ndan kontrol edilecek uygun g�r�l�r ise onaylanacak. Sokak, dili IRC dili, yada bol imla hatal� bildirimleriniz edit�rlerimiz taraf�ndan d�zenlenebilir, yada hi� onaylanmayabilir d�zenlemek zor gelirse o g�n :=) o y�zden siz d�zg�n yaz�n garanti olsun.");
define("_CALPOSTEDBY","G�nderen");
define("_CALPOSTEDON",", ");
define("_CALACCEPTEDBY"," onaylayan");
define("_CALPREVIOUS","Geri");
define("_CALNEXT","�leri");
define("_CALSTARTTIME","Ba�lang�� Zaman�");
define("_CALENDTIME","Biti� Zaman�");
define("_CALALLDAYEVENT","B�t�n G�n");
define("_CALTIMEIGNORED","Ba�lang�� ve biti� zamanlar� g�rmezden gelinir.");
define("_CALENDDATETEXT","Biti� Zaman�");
define("_CALENDDATEPREVIEW","Biti� Tarihi");
#define("_CALBARCOLORTEXT","Bu olay i�in bir  Kategori se�in");
define("_CALBARCOLORTEXT","Kategori");
define("_CALLOGIN","Giri�");
define("_CALNO","Hay�r");
define("_CALYES","Evet");
define("_CALREMOVETEST","Bu Etkinli�i silmek istedi�inizden emin misiniz?");
define("_CALNOTAUTHORIZED1","D�zenleme yapman�za izin verilmiyor.");
define("_CALNOTAUTHORIZED2","L�tfen site y�neticileriyle irtibat kurun");
define("_CALNOTAUTHORIZED3","�z�r dileriz, Bu i�lemi yapman�z i�in izniniz yok.!");
define("_CALTODAY","Bug�n");
define("_CALLISTDESCRIPTION1","Sonraki");
define("_CALLISTDESCRIPTION2","Etkinlik");
define("_CALLISTSTART",".:.");
define("_CALLISTRANGE","to");
define("_CALHEADAPPOINTM","Appointments");
define("_CALDAYEVENTS","Etkinlikler");
define("_CALDAYMORNING","Sabah");
define("_CALDAYEVENING","Ak�am");
define("_CALMORE","Di�er Etkinlikler");
define("_CAL1EVENT","Etkinlik");
define("_CAL2EVENT","Etkinlikler");
define("_CAL0EVENTS", "Bu kategoride etkinlik yok");
define("_CAL0EVENTSBLOCK", "Ge�erli Etkinlik yok.");
define("_CALNOTODAYEVENTS","Bug�n i�in etkinlik yok.");
define("_CALADDASARTICLE","Haber Olarak Ver");
define("_CALADDASARTICLE2","Bu etkinli�i ana sayfada haber yap.");

####### LINKS ########
define("_CALEVENTLINK","Etkinlik Ekle");
define("_CALAPPTLINK","Randevu Ekle");
define("_CALTASKLINK","G�rev Ekle");
define("_CALDAYLINK","Bug�nk� etkinlikler");
define("_CALMONTHLINK","Bir Ayl�k etkinlikler");
define("_CALYEARLINK","Bir Y�ll�k etkinlikler");
define("_CALJUMPTOTEXT","Belirledi�iniz tarih ve g�ndeki etkinlikleri g�r�nt�ler");
define("_CALJUMPBUTTON","G�ster!");
define("_CALLISTLINK","Etkinlikler Listesi");

####### MONTHS ########
define("_CALJAN","Ocak");
define("_CALFEB","�ubat");
define("_CALMAR","Mart");
define("_CALAPR","Nisan");
define("_CALMAY","May�s");
define("_CALJUN","Haziran");
define("_CALJUL","Temmuz");
define("_CALAUG","A�ustos");
define("_CALSEP","Eyl�l");
define("_CALOCT","Ekim");
define("_CALNOV","Kas�m");
define("_CALDEC","Aral�k");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Pzr");
define("_CALSECONDDAY","Pts");
define("_CALTHIRDDAY","Sal�");
define("_CALFOURTHDAY","�r�.");
define("_CALFIFTHDAY","Pr�.");
define("_CALSIXTHDAY","Cuma");
define("_CALSEVENTHDAY","Cts.");
define("_CALLONGFIRSTDAY","Pazar");
define("_CALLONGSECONDDAY","Pazartesi");
define("_CALLONGTHIRDDAY","Sal�");
define("_CALLONGFOURTHDAY","�ar�amba");
define("_CALLONGFIFTHDAY","Per�embe");
define("_CALLONGSIXTHDAY","Cuma");
define("_CALLONGSEVENTHDAY","Cumartesi");



####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","HATA! Ge�ersiz i�lem");
define("_CALVALIDFIXMSG","L�tfen formu eksiksiz doldurup tekrar deneyin....");
define("_CALVALIDSUBJECT","Ba�l�k yazmad�n�z.");
define("_CALVALIDENDDATE","Biti� tarihi ge�ersiz.");
define("_CALVALIDEVENTDATE","Etkinlik tarihi ge�ersiz.");
define("_CALVALIDDATES","Biti� tarihi ile etkinlik tarihi aras�nda bir uyumsuzluk var.");
define("_CALVALIDTIMES","Ba�lang�� saati ile biti� saati aras�nda bir  dengesizlik var.");
define("_CALVALIDTOPIC", "L�tfen konu se�in.");

#### TRANSLATE !!!!! #######################################################################
define("_CALINDEX", "show right blocks");
define("_CALTEXTEVENTS", "image Bars for multiday events");
define("_CALADDARTICLEBOX", "automatic News article permit");
define("_CALUSETOPICS", "News-topics use");
define("_CALUSETOPICS1", "Yes, but not necessarily");
define("_CALUSETOPICS2", "Yes, necessarily");
define("_CALDEFAULTVIEW", "Defaultview");
define("_CALMINUTERANGE", "distance of the minutes with date time selection");
define("_CALADMINEDITALL", "Admins may work on only own events");
define("_CALADMINMENUSHOW", "normal Nuke Adminmenue use");
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
define("_CALACTIV", "Aktifle�tir");

define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Count of Columns in Categories-List");

define("_CALERREVENTNOTEXIST","Bu etkinlik Veri Taban&#305;m&#305;zda bulunuyor zaten.");
define("_CALERRSQLERROR","Bilgi Koruma Hatas&#305;!");
define("_CALONLYDEACTIVATE","Sadece pasifle&#351;tir");
define("_CALDEACTIVATED","Pasif Etkinlikler");
define("_CALNODEACTIVATED","Pasif Etkinlik Bulunmuyor");
define("_CALNAVIPREV","Etkinlik �ncesi");
define("_CALNAVINEXT","Etkinlik Sonras&#305;");

/// ab 1.3
define("_CALPRINTER1","Seite drucken");
define("_CALPRINTER2","diese Seite ausdrucken");
define("_CALPOSTANONYMOUS","anonyme d�rfen Termine melden");
define("_CALUSERSAUTOPOST","gemeldete Termine von angemeldeten Benutzern sofort freischalten");
define("_CALANONYAUTOPOST","gemeldete Termine von anonymen Benutzern sofort freischalten");
define("_CALCATEGORIESADMIN","Kategorie-Konfiguration");
define("_CALCATEGORIESLANG","Andere Sprachen w�hlen");
define("_CALADMINMENU","Administrationsmen&uuml;");
define("_CALSHOWPOPS","Terminbeschreibung als Popup");
define("_CALSOURCE","Quelle");
define("_CALGOAL","Ziel");

/// ab 1.4
define('_CALHOURS','hours');
define('_CALMINUTES','minutes');
define('_CALDAYS','days');
define('_CALMONTHS','months');
define('_CALYEARS','years');
define("_CALPLSLOGIN","L�tfen �nce Giri� Yap");
define("_CALSAVESETT", "G�nder");

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
define("_CALNOTOPICS", "�u An Herhangi Bir Aktif Konu Bulunmuyor");
define('_CALGOTOEDIT','edit again');
define('_CALGOTOADMIN','then goto Adminmenue');
define('_CALGOTOCALENDAR','then goto Calendarview');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","show date in list-view as link");

?>