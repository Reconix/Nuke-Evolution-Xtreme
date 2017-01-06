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
define("_CALDOTCOLORALL","Tüm Etkinlikler");  // desription of all Events (no colordot)
define("_CALSEND","Gönder");
define("_CALSUBMITEVENT", "Etkinlik Ekle");
define("_CALSUBMITNAME", "Etkinlik Bildiri Formu");
define("_CALNAME", "Etkinlik Takvimi");
define("_CALPREVIEW", "Göster");
define("_CALOK", "Gönder");
define("_CALEVENTDATETEXT", "Baþlangýç Tarihi");
define("_CALSUBSENT", "Göndermiþ olduðunuz olay sisteme eklendi.");
define("_CALTHANKSSUB", "Katkýnýz için teþekkür ederiz!");
define("_CALSUBTEXT", "Göndermiþ olduðunuz Etkinlik teklifi kontrol edilecek, ilginç ve konu ile ilgiliyse daha sonra yayýnlanacak.");
define("_CALSUBTEXTADMIN", "Yönetici giriþi yaptýðýnýz için önerdiðiniz etkinlik direkt olarak yayýnlandý.");
define("_CALWEHAVESUB", "Þu anda sisteme kayýtlý");
define("_CALWAITING", "onaylanmayý bekleyen etkinlikler.");
define("_CALEVENTDATEPREVIEW", "Tarih");
define("_CALCHECKSTORY", "Lütfen yazmýþ olduðunuz etkinliði göndermeden önce kontrol ediniz.");
define("_CALYOURNAME", "Ýsminiz");
define("_CALLOGOUT", "Çýkýþ");
define("_CALSUBTITLE", "Baþlýk");
define("_CALTOPIC", "Konular");
define("_CALSELECTTOPIC", "Konu Seç");
define("_CALARTICLETEXT", "Açýklama");
define("_CALHTMLISFINE", "Yazýnýzda HTML kodlarý kullanabilirsiniz.");
define("_CALNEWSUBPREVIEW", "Etkinlik önizlemesi");
define("_CALSTORYLOOK", "Önermek üzere olduðunuz etkinlik böyle gözükecek:");
define("_CALBEDESCRIPTIVE", "Açýklayici ve anlaþýlýr olun. Düzgün bi dil kullanýn");
define("_CALSUBPREVIEW", "Etkinlik önerinizi göndermeden önce nasýl göründüðüne ön izleme yaparak bir bakýn...");
define("_CALALLOWEDHTML", "Ýzin verilen HTML Kodlarý");
define("_CALSUBMISSIONSADMIN", "Takvim Yöneticisi");
define("_CALNEWSUBMISSIONS", "Yeni Ekinlik Önerisi");
define("_CALNOSUBJECT", "Baþlýk girilmemiþ!");
define("_CALNOSUBMISSIONS", "Etkinlik Açýklamasý Yok!");
define("_CALDELETE", "S Ý L");
define("_CALNAMEFIELD", "Ýsim");
define("_CALDELETESTORY", "Etkinlik SÝL");
define("_CALPREVIEWSTORY", "Etkinlik Önizle");
define("_CALPOSTSTORY", "Etkinlik Gönder");
define("_CALSUBMITADVICE1", "Lütfen aþaðýdaki formu doldurarak ve kontrol ederek Takvime Etkinlik önerinizi yazýnýz.");
define("_CALSUBMITADVICE2", "<br />Bilmelisiniz ki her bildirim yayýnlanýcak diye biþi yoktur. Önce editörlerimiz tarafýndan kontrol edilecek uygun görülür ise onaylanacak. Sokak, dili IRC dili, yada bol imla hatalý bildirimleriniz editörlerimiz tarafýndan düzenlenebilir, yada hiç onaylanmayabilir düzenlemek zor gelirse o gün :=) o yüzden siz düzgün yazýn garanti olsun.");
define("_CALPOSTEDBY","Gönderen");
define("_CALPOSTEDON",", ");
define("_CALACCEPTEDBY"," onaylayan");
define("_CALPREVIOUS","Geri");
define("_CALNEXT","Ýleri");
define("_CALSTARTTIME","Baþlangýç Zamaný");
define("_CALENDTIME","Bitiþ Zamaný");
define("_CALALLDAYEVENT","Bütün Gün");
define("_CALTIMEIGNORED","Baþlangýç ve bitiþ zamanlarý görmezden gelinir.");
define("_CALENDDATETEXT","Bitiþ Zamaný");
define("_CALENDDATEPREVIEW","Bitiþ Tarihi");
#define("_CALBARCOLORTEXT","Bu olay için bir  Kategori seçin");
define("_CALBARCOLORTEXT","Kategori");
define("_CALLOGIN","Giriþ");
define("_CALNO","Hayýr");
define("_CALYES","Evet");
define("_CALREMOVETEST","Bu Etkinliði silmek istediðinizden emin misiniz?");
define("_CALNOTAUTHORIZED1","Düzenleme yapmanýza izin verilmiyor.");
define("_CALNOTAUTHORIZED2","Lütfen site yöneticileriyle irtibat kurun");
define("_CALNOTAUTHORIZED3","Özür dileriz, Bu iþlemi yapmanýz için izniniz yok.!");
define("_CALTODAY","Bugün");
define("_CALLISTDESCRIPTION1","Sonraki");
define("_CALLISTDESCRIPTION2","Etkinlik");
define("_CALLISTSTART",".:.");
define("_CALLISTRANGE","to");
define("_CALHEADAPPOINTM","Appointments");
define("_CALDAYEVENTS","Etkinlikler");
define("_CALDAYMORNING","Sabah");
define("_CALDAYEVENING","Akþam");
define("_CALMORE","Diðer Etkinlikler");
define("_CAL1EVENT","Etkinlik");
define("_CAL2EVENT","Etkinlikler");
define("_CAL0EVENTS", "Bu kategoride etkinlik yok");
define("_CAL0EVENTSBLOCK", "Geçerli Etkinlik yok.");
define("_CALNOTODAYEVENTS","Bugün için etkinlik yok.");
define("_CALADDASARTICLE","Haber Olarak Ver");
define("_CALADDASARTICLE2","Bu etkinliði ana sayfada haber yap.");

####### LINKS ########
define("_CALEVENTLINK","Etkinlik Ekle");
define("_CALAPPTLINK","Randevu Ekle");
define("_CALTASKLINK","Görev Ekle");
define("_CALDAYLINK","Bugünkü etkinlikler");
define("_CALMONTHLINK","Bir Aylýk etkinlikler");
define("_CALYEARLINK","Bir Yýllýk etkinlikler");
define("_CALJUMPTOTEXT","Belirlediðiniz tarih ve gündeki etkinlikleri görüntüler");
define("_CALJUMPBUTTON","Göster!");
define("_CALLISTLINK","Etkinlikler Listesi");

####### MONTHS ########
define("_CALJAN","Ocak");
define("_CALFEB","Þubat");
define("_CALMAR","Mart");
define("_CALAPR","Nisan");
define("_CALMAY","Mayýs");
define("_CALJUN","Haziran");
define("_CALJUL","Temmuz");
define("_CALAUG","Aðustos");
define("_CALSEP","Eylül");
define("_CALOCT","Ekim");
define("_CALNOV","Kasým");
define("_CALDEC","Aralýk");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Pzr");
define("_CALSECONDDAY","Pts");
define("_CALTHIRDDAY","Salý");
define("_CALFOURTHDAY","Çrþ.");
define("_CALFIFTHDAY","Prþ.");
define("_CALSIXTHDAY","Cuma");
define("_CALSEVENTHDAY","Cts.");
define("_CALLONGFIRSTDAY","Pazar");
define("_CALLONGSECONDDAY","Pazartesi");
define("_CALLONGTHIRDDAY","Salý");
define("_CALLONGFOURTHDAY","Çarþamba");
define("_CALLONGFIFTHDAY","Perþembe");
define("_CALLONGSIXTHDAY","Cuma");
define("_CALLONGSEVENTHDAY","Cumartesi");



####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","HATA! Geçersiz iþlem");
define("_CALVALIDFIXMSG","Lütfen formu eksiksiz doldurup tekrar deneyin....");
define("_CALVALIDSUBJECT","Baþlýk yazmadýnýz.");
define("_CALVALIDENDDATE","Bitiþ tarihi geçersiz.");
define("_CALVALIDEVENTDATE","Etkinlik tarihi geçersiz.");
define("_CALVALIDDATES","Bitiþ tarihi ile etkinlik tarihi arasýnda bir uyumsuzluk var.");
define("_CALVALIDTIMES","Baþlangýç saati ile bitiþ saati arasýnda bir  dengesizlik var.");
define("_CALVALIDTOPIC", "Lütfen konu seçin.");

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
define("_CALACTIV", "Aktifleþtir");

define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Count of Columns in Categories-List");

define("_CALERREVENTNOTEXIST","Bu etkinlik Veri Taban&#305;m&#305;zda bulunuyor zaten.");
define("_CALERRSQLERROR","Bilgi Koruma Hatas&#305;!");
define("_CALONLYDEACTIVATE","Sadece pasifle&#351;tir");
define("_CALDEACTIVATED","Pasif Etkinlikler");
define("_CALNODEACTIVATED","Pasif Etkinlik Bulunmuyor");
define("_CALNAVIPREV","Etkinlik Öncesi");
define("_CALNAVINEXT","Etkinlik Sonras&#305;");

/// ab 1.3
define("_CALPRINTER1","Seite drucken");
define("_CALPRINTER2","diese Seite ausdrucken");
define("_CALPOSTANONYMOUS","anonyme dürfen Termine melden");
define("_CALUSERSAUTOPOST","gemeldete Termine von angemeldeten Benutzern sofort freischalten");
define("_CALANONYAUTOPOST","gemeldete Termine von anonymen Benutzern sofort freischalten");
define("_CALCATEGORIESADMIN","Kategorie-Konfiguration");
define("_CALCATEGORIESLANG","Andere Sprachen wählen");
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
define("_CALPLSLOGIN","Lütfen Önce Giriþ Yap");
define("_CALSAVESETT", "Gönder");

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
define("_CALNOTOPICS", "Þu An Herhangi Bir Aktif Konu Bulunmuyor");
define('_CALGOTOEDIT','edit again');
define('_CALGOTOADMIN','then goto Adminmenue');
define('_CALGOTOCALENDAR','then goto Calendarview');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","show date in list-view as link");

?>