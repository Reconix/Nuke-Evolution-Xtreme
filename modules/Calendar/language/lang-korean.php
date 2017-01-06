<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-korean.php,v 20.0 2004/08/23 13:36:25 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-korean.php
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

####### locale time-format variables #######
if (PHP_OS=="WINNT"||PHP_OS=="WIN32") {
    define("_CALLOCALE","ko"); # lokale Einstellungen z.B. Datumsformat f&uuml;r Windows System!!
    }
else {
    define("_CALLOCALE","ko_KR");        # lokale Einstellungen z.B. Datumsformat f&uuml;r Linux/Unix
    }
define("_CALSHORTDATEFORMAT","%y/%m/%d");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",0);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",1);// 1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);        # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","���&nbsp;���/����");  // desription of all Events (no colordot)
define("_CALSEND","��û");
define("_CALSUBMITEVENT", "���/���� ��û");
define("_CALSUBMITNAME", "���/���� ��û ���");
define("_CALNAME", "���/����");
define("_CALPREVIEW", "���/���� �̸�����");
define("_CALOK", "���/���� ��û");
define("_CALEVENTDATETEXT", "������");
define("_CALSUBSENT", "����� ���/������ �����Ǿ����ϴ�.");
define("_CALTHANKSSUB", "����� ��û�� ����帳�ϴ�!");
define("_CALSUBTEXT", "���� �� �ð��ȿ� ����� ��û�� Ȯ���ϰ�, �װ��� ����ְ� Ÿ���ϴٸ� �� ��ǥ�մϴ�.");
define("_CALSUBTEXTADMIN", "����� �׸��� �ٷ� ��ǥ�Ǿ����ϴ�.");
define("_CALWEHAVESUB", "���� ��ǥ�Ǳ⸦ ��ٸ���");
define("_CALWAITING", "���� ��û�� �ֽ��ϴ�.");
define("_CALEVENTDATEPREVIEW", "���/���� ��¥");
define("_CALCHECKSTORY", "����� ���/������ �����ϱ� ���� ��, ��ũ ���� Ȯ���ϼ���!");
define("_CALYOURNAME", "���̵�");
define("_CALLOGOUT", "�α׾ƿ�");
define("_CALSUBTITLE", "����");
define("_CALTOPIC", "����");
define("_CALSELECTTOPIC", "���� ����");
define("_CALARTICLETEXT", "����");
define("_CALHTMLISFINE", "HTML�� ��������, URL�� HTML �±׸� �� �� Ȯ���մϴ�!");
define("_CALNEWSUBPREVIEW", "���/���� ��û �̸�����");
define("_CALSTORYLOOK", "����� ���/������ ������ ���� ���̰� �˴ϴ�:");
define("_CALBEDESCRIPTIVE", "���� ����ϰ� ���");
define("_CALSUBPREVIEW", "�����ϱ� ���� ����� ���/������ �̸����� �ϼ���.");
define("_CALALLOWEDHTML", "���� HTML");
define("_CALSUBMISSIONSADMIN", "���/���� ����");
define("_CALNEWSUBMISSIONS", "�� ���/���� ����");
define("_CALNOSUBJECT", "������ �Էµ��� �ʾҽ��ϴ�!");
define("_CALNOSUBMISSIONS", "���ο� ��û�� �����ϴ�!");
define("_CALDELETE", "����");
define("_CALNAMEFIELD", "�̸�");
define("_CALDELETESTORY", "���/���� ����");
define("_CALPREVIEWSTORY", "���/���� �̸�����");
define("_CALPOSTSTORY", "���/���� ����");
define("_CALSUBMITADVICE1", "���� ��Ŀ� ����� �޷� ���/������ �����Ͻ� ���� ��û�� �� �� Ȯ���մϴ�.");
define("_CALSUBMITADVICE2", "<br />����� ������ ��� ��û�� ��ǥ���� �ʽ��ϴ�.<br />����� ��û�� �츮�� ���ܿ� ���� �� ���� �������� Ȯ�εǾ����� �����Ǿ� ���ϴ�.");
define("_CALPOSTEDBY","�۾��� : ");
define("_CALPOSTEDON","on");
define("_CALACCEPTEDBY"," ������ :");
define("_CALPREVIOUS","����");
define("_CALNEXT","����");
define("_CALSTARTTIME","���� �ð�");
define("_CALENDTIME","���� �ð�");
define("_CALALLDAYEVENT","�Ϸ� ����");
define("_CALTIMEIGNORED","����, ���� �ð��� ���õ˴ϴ�.");
define("_CALENDDATETEXT","������");
define("_CALENDDATEPREVIEW","������");
#define("_CALBARCOLORTEXT","�� ���/������ ���� ī�װ� ����");
define("_CALBARCOLORTEXT","ī�װ�");
define("_CALLOGIN","�α���");
define("_CALNO","�ƴϿ�");
define("_CALYES","��");
define("_CALREMOVETEST","�� ���/������ �����Ͻðڽ��ϱ�?");
define("_CALNOTAUTHORIZED1","�׸��� ����, ������ �� �ֵ��� �������� �ʾҽ��ϴ�");
define("_CALNOTAUTHORIZED2","� ������ �ִٸ� �ý��� �����ڿ��� �����ϼ���.");
define("_CALNOTAUTHORIZED3","�˼������� ����� �׸��� ����, ������ �� �ֵ��� �������� �ʾҽ��ϴ�!");
define("_CALTODAY","����");
define("_CALLISTDESCRIPTION1","����");
define("_CALLISTDESCRIPTION2","���/����");
define("_CALLISTSTART","since");
define("_CALLISTRANGE","to");
define("_CALHEADAPPOINTM","���");
define("_CALDAYEVENTS","���/����");
define("_CALDAYMORNING","��ħ");
define("_CALDAYEVENING","����");
define("_CALMORE","�� ���� ���/����");
define("_CAL1EVENT","���/����");
define("_CAL2EVENT","���/����");
define("_CAL0EVENTS", "�� ������ ���� ���/������ �����ϴ�");
define("_CAL0EVENTSBLOCK", "�˼������� ��밡���� ���� ���/������ �����ϴ�.");
define("_CALNOTODAYEVENTS","������ ���/������ �����ϴ�.");
define("_CALADDASARTICLE","���");
define("_CALADDASARTICLE2","�� ���/�������� ��� �߰�.");

####### LINKS ########
define("_CALEVENTLINK","���/���� ����");
define("_CALAPPTLINK","��� ����");
define("_CALTASKLINK","���ο� �۾� �߰�");
define("_CALDAYLINK","�Ϻ� ����");
define("_CALMONTHLINK","���� ����");
define("_CALYEARLINK","�⺰ ����");
define("_CALJUMPTOTEXT","���� ����� ����");
define("_CALJUMPBUTTON","����!");
define("_CALLISTLINK","���� ���/����");

####### MONTHS ########
define("_CALJAN","01��");
define("_CALFEB","02��");
define("_CALMAR","03��");
define("_CALAPR","04��");
define("_CALMAY","05��");
define("_CALJUN","06��");
define("_CALJUL","07��");
define("_CALAUG","08��");
define("_CALSEP","09��");
define("_CALOCT","10��");
define("_CALNOV","11��");
define("_CALDEC","12��");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","��");
define("_CALSECONDDAY","��");
define("_CALTHIRDDAY","ȭ");
define("_CALFOURTHDAY","��");
define("_CALFIFTHDAY","��");
define("_CALSIXTHDAY","��");
define("_CALSEVENTHDAY","��");
define("_CALLONGFIRSTDAY","�Ͽ���");
define("_CALLONGSECONDDAY","������");
define("_CALLONGTHIRDDAY","ȭ����");
define("_CALLONGFOURTHDAY","������");
define("_CALLONGFIFTHDAY","�����");
define("_CALLONGSIXTHDAY","�ݿ���");
define("_CALLONGSEVENTHDAY","�����");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","�� �׸��� ������ �� ������ �߰ߵǾ����ϴ�");
define("_CALVALIDFIXMSG","�׸��� �̸����� �Ǵ� �����ϱ� ���� �� ������ �����ϼ���.");
define("_CALVALIDSUBJECT","'����'�� �ʼ� �׸��Դϴ�.");
define("_CALVALIDENDDATE","'������'�� ��Ȯ�� ��¥�� �ƴմϴ�.");
define("_CALVALIDEVENTDATE","'������'�� ��Ȯ�� ��¥�� �ƴմϴ�.");
define("_CALVALIDDATES","'������'�� '������'�� ���ų� �����̾�� �մϴ�.");
define("_CALVALIDTIMES","'����ð�'�� '���۽ð�' �����̾�� �մϴ�.");
define("_CALVALIDTOPIC", "������ �����ϼ���.");

#### TRANSLATE  #######################################################################
define("_CALINDEX", "������ �� ���̱�");
define("_CALTEXTEVENTS", "�������� ��ģ ���/������ ���� �̹��� ��");
define("_CALADDARTICLEBOX", "�ڵ� ���� ��� ���");
define("_CALPOSTUSERS","ȸ�� ��¥ ���� ���");
define("_CALUSETOPICS", "��-���� ���");
define("_CALUSETOPICS1", "��, �ʼ��� �ƴմϴ�");
define("_CALUSETOPICS2", "��, �ʼ�");
define("_CALDEFAULTVIEW", "�⺻ ����");
define("_CALMINUTERANGE", "��¥ �ð� ���ý� �� ����");
define("_CALADMINEDITALL", "�����ڴ� ���/���������� Ȱ��");
define("_CALADMINMENUSHOW", "���� CMS �����ڸ޴� ���");
define("_CALADMINTYPE", "������ Ÿ��, ���/�������� Ȱ���� ������");
define("_CALLISTCOUNT", "��Ϻ����� �׸� ��");
define("_CALLISTSHOWSTART", "���õ� ��� ���⿡�� ���� �ð�");
define("_CALLISTENDDATE", "���õ� ��� ���⿡�� ���� ��¥");
define("_CALLISTENDTIME", "���õ� ��� ���⿡�� ���� �ð�");
define("_CALLISTENDDATE2", "�����ϰ� ������ ���ÿ��� ���� ��¥");
define("_CALLISTBR", "��Ϻ��⿡�� ��¥ �ð� ���̿� �� ����");
define("_CALDAYTIMEARRAY", "�Ϻ����⿡�� �ð� ����");
define("_CALALLOWABLEHTML", "��¥�� ������ ���� HTML �±�");
define("_CALONLYWEN", "(���õ� ���ᳯ¥����)"); 
define("_CALSHOWLINKS","��¥���⿡�� ��ũó�� ��¥ ���̱�");
define("_CALCALENDARCONFIG", "���/���� ����");
define("_CALCONF1", "������ ������� �ʾҽ��ϴ�!");
define("_CALCONF2", "���� �����!");
define("_CALCONF3", "����");
define("_CALCONF4", "�� ���� �����Ǿ� �־�, <br />������ ����� �� �����ϴ�!");
define("_CALACTIV", "���� Ȱ��ȭ");

define("_CALMENUROWS","��");
define("_CALMENUROWS2","ī�װ� ��Ͽ��� ���� ��");

define("_CALERREVENTNOTEXIST","�����ͺ��̽��� ���/������ �������� �ʽ��ϴ�.");
define("_CALERRSQLERROR","�����ͺ��̽� ����!");
define("_CALONLYDEACTIVATE","��Ȱ��ȭ��");
define("_CALDEACTIVATED","��Ȱ��ȭ�� ���/����");
define("_CALNODEACTIVATED","��Ȱ��ȭ�� ���/���� ����");
define("_CALNAVIPREV","���� ���/����");
define("_CALNAVINEXT","���� ���/����");

/// ab 1.3
define("_CALPRINTER1","����Ʈ");
define("_CALPRINTER2","�����ͷ� �� ������ ����");
define("_CALPOSTANONYMOUS", "�մ� ��¥ ���� ���");
define("_CALUSERSAUTOPOST","ȸ���� ��û �ٷ� ����");
define("_CALANONYAUTOPOST","�մ��� ��û �ٷ� ����");
define("_CALCATEGORIESADMIN","ī�װ�-����");
define("_CALCATEGORIESLANG","��� ����");
define("_CALADMINMENU","������ �޴�");
define("_CALSHOWPOPS","���/���� ������ ���� �˾�");
define("_CALSOURCE","����");
define("_CALGOAL","��ǥ");

/// ab 1.4
define('_CALHOURS','��');
define('_CALMINUTES','��');
define('_CALDAYS','��');
define('_CALMONTHS','��');
define('_CALYEARS','��');
define("_CALPLSLOGIN","���� �α����ϼ���");
define("_CALSAVESETT", "����");

define('_CALALLWORDS','��� �ܾ�[ALL]');
define('_CALANYWORDS','� �ܾ�[OR]');
define('_CALSEARCH','�˻�');
define('_CALSEARCHEVENT','���/���� �˻�');
define('_CALFOR','');
define('_CALSEARCHTITLE','���/�������� �˻�');
define('_CALCQUEUE','�˻� ���');
define('_CALTOMUCH1','');
define('_CALTOMUCH2','���� ����� �˻��Ǿ����ϴ�. �˻� ������ �����ϼ���.');
define("_CALSEARCHCOUNT", "�˻� ����� �ִ밪");
define('_CALSEARCHTOPICS','����-���ȿ��� �˻�');
define('_CALMOREOPTIONINF','����� ���/������ ���̱� ������ ������ ���Ͽ��� �پ��ϰ� �����Ͻ� �� �ֽ��ϴ� :');
define('_CALSEFROMDATE','��¥�� �˻�');
define('_CALSELCATEGORY','ī�װ� ����');
define('_CALINTHIS','');
define("_CALNOTOPICS", "������ ������ �����ϴ�");
define('_CALGOTOEDIT','�ٽ� ����');
define('_CALGOTOADMIN','�����ڸ޴��� ����');
define('_CALGOTOCALENDAR','������������ ����');
define('_CALCONFVIEW1','���Ѱ� ����');
define('_CALCONFVIEW2','�ǰ߰� ���̱�');
define('_CALCONFVIEW3','�������� ����');
define("_CALLISTSHOWLINKS","��Ϻ��⿡�� ��ũó�� ��¥ ���̱�");

?>