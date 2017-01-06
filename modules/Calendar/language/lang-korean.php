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
define("_CALDOTCOLORALL","모든&nbsp;행사/일정");  // desription of all Events (no colordot)
define("_CALSEND","요청");
define("_CALSUBMITEVENT", "행사/일정 요청");
define("_CALSUBMITNAME", "행사/일정 요청 양식");
define("_CALNAME", "행사/일정");
define("_CALPREVIEW", "행사/일정 미리보기");
define("_CALOK", "행사/일정 요청");
define("_CALEVENTDATETEXT", "시작일");
define("_CALSUBSENT", "당신의 행사/일정은 접수되었습니다.");
define("_CALTHANKSSUB", "당신의 요청에 감사드립니다!");
define("_CALSUBTEXT", "다음 몇 시간안에 당신의 요청을 확인하고, 그것이 흥미있고 타당하다면 곧 발표합니다.");
define("_CALSUBTEXTADMIN", "당신의 항목은 바로 발표되었습니다.");
define("_CALWEHAVESUB", "현재 발표되기를 기다리는");
define("_CALWAITING", "개의 요청이 있습니다.");
define("_CALEVENTDATEPREVIEW", "행사/일정 날짜");
define("_CALCHECKSTORY", "당신의 행사/일정를 전송하기 전에 글, 링크 등을 확인하세요!");
define("_CALYOURNAME", "아이디");
define("_CALLOGOUT", "로그아웃");
define("_CALSUBTITLE", "제목");
define("_CALTOPIC", "토픽");
define("_CALSELECTTOPIC", "토픽 선택");
define("_CALARTICLETEXT", "설명");
define("_CALHTMLISFINE", "HTML은 괜찮지만, URL과 HTML 태그를 두 번 확인합니다!");
define("_CALNEWSUBPREVIEW", "행사/일정 요청 미리보기");
define("_CALSTORYLOOK", "당신의 행사/일정은 다음과 같이 보이게 됩니다:");
define("_CALBEDESCRIPTIVE", "간단 명료하게 기술");
define("_CALSUBPREVIEW", "제출하기 전에 당신의 행사/일정을 미리보기 하세요.");
define("_CALALLOWEDHTML", "허용된 HTML");
define("_CALSUBMISSIONSADMIN", "행사/일정 승인");
define("_CALNEWSUBMISSIONS", "새 행사/일정 승인");
define("_CALNOSUBJECT", "제목이 입력되지 않았습니다!");
define("_CALNOSUBMISSIONS", "새로운 요청이 없습니다!");
define("_CALDELETE", "삭제");
define("_CALNAMEFIELD", "이름");
define("_CALDELETESTORY", "행사/일정 삭제");
define("_CALPREVIEWSTORY", "행사/일정 미리보기");
define("_CALPOSTSTORY", "행사/일정 저장");
define("_CALSUBMITADVICE1", "다음 양식에 당신의 달력 행사/일정을 기입하신 다음 요청을 두 번 확인합니다.");
define("_CALSUBMITADVICE2", "<br />당신이 제안한 모든 요청이 발표되지 않습니다.<br />당신의 요청은 우리의 스텝에 의해 더 낳은 문장으로 확인되어지며 수정되어 집니다.");
define("_CALPOSTEDBY","글쓴이 : ");
define("_CALPOSTEDON","on");
define("_CALACCEPTEDBY"," 승인자 :");
define("_CALPREVIOUS","이전");
define("_CALNEXT","다음");
define("_CALSTARTTIME","시작 시간");
define("_CALENDTIME","종료 시간");
define("_CALALLDAYEVENT","하루 종일");
define("_CALTIMEIGNORED","시작, 종료 시간이 무시됩니다.");
define("_CALENDDATETEXT","종료일");
define("_CALENDDATEPREVIEW","종료일");
#define("_CALBARCOLORTEXT","이 행사/일정을 위한 카테고리 선택");
define("_CALBARCOLORTEXT","카테고리");
define("_CALLOGIN","로그인");
define("_CALNO","아니요");
define("_CALYES","예");
define("_CALREMOVETEST","이 행사/일정을 삭제하시겠습니까?");
define("_CALNOTAUTHORIZED1","항목을 삭제, 수정할 수 있도록 인증받지 않았습니다");
define("_CALNOTAUTHORIZED2","어떤 질문이 있다면 시스템 관리자에게 접촉하세요.");
define("_CALNOTAUTHORIZED3","죄송하지만 당신은 항목을 삭제, 수정할 수 있도록 인증받지 않았습니다!");
define("_CALTODAY","오늘");
define("_CALLISTDESCRIPTION1","다음");
define("_CALLISTDESCRIPTION2","행사/일정");
define("_CALLISTSTART","since");
define("_CALLISTRANGE","to");
define("_CALHEADAPPOINTM","약속");
define("_CALDAYEVENTS","행사/일정");
define("_CALDAYMORNING","아침");
define("_CALDAYEVENING","저녁");
define("_CALMORE","더 많은 행사/일정");
define("_CAL1EVENT","행사/일정");
define("_CAL2EVENT","행사/일정");
define("_CAL0EVENTS", "이 쿼리에 대한 행사/일정이 없습니다");
define("_CAL0EVENTSBLOCK", "죄송하지만 사용가능한 현재 행사/일정이 없습니다.");
define("_CALNOTODAYEVENTS","오늘은 행사/일정이 없습니다.");
define("_CALADDASARTICLE","기사");
define("_CALADDASARTICLE2","이 행사/일정에서 기사 추가.");

####### LINKS ########
define("_CALEVENTLINK","행사/일정 생성");
define("_CALAPPTLINK","약속 생성");
define("_CALTASKLINK","새로운 작업 추가");
define("_CALDAYLINK","일별 보기");
define("_CALMONTHLINK","월별 보기");
define("_CALYEARLINK","년별 보기");
define("_CALJUMPTOTEXT","다음 보기로 점프");
define("_CALJUMPBUTTON","점프!");
define("_CALLISTLINK","다음 행사/일정");

####### MONTHS ########
define("_CALJAN","01월");
define("_CALFEB","02월");
define("_CALMAR","03월");
define("_CALAPR","04월");
define("_CALMAY","05월");
define("_CALJUN","06월");
define("_CALJUL","07월");
define("_CALAUG","08월");
define("_CALSEP","09월");
define("_CALOCT","10월");
define("_CALNOV","11월");
define("_CALDEC","12월");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","일");
define("_CALSECONDDAY","월");
define("_CALTHIRDDAY","화");
define("_CALFOURTHDAY","수");
define("_CALFIFTHDAY","목");
define("_CALSIXTHDAY","금");
define("_CALSEVENTHDAY","토");
define("_CALLONGFIRSTDAY","일요일");
define("_CALLONGSECONDDAY","월요일");
define("_CALLONGTHIRDDAY","화요일");
define("_CALLONGFOURTHDAY","수요일");
define("_CALLONGFIFTHDAY","목요일");
define("_CALLONGSIXTHDAY","금요일");
define("_CALLONGSEVENTHDAY","토요일");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","이 항목을 검증할 때 에러가 발견되었습니다");
define("_CALVALIDFIXMSG","항목을 미리보기 또는 제출하기 전에 이 에러를 수정하세요.");
define("_CALVALIDSUBJECT","'제목'은 필수 항목입니다.");
define("_CALVALIDENDDATE","'종료일'이 정확한 날짜가 아닙니다.");
define("_CALVALIDEVENTDATE","'시작일'이 정확한 날짜가 아닙니다.");
define("_CALVALIDDATES","'종료일'은 '시작일'과 같거나 이후이어야 합니다.");
define("_CALVALIDTIMES","'종료시간'은 '시작시간' 이후이어야 합니다.");
define("_CALVALIDTOPIC", "토픽을 선택하세요.");

#### TRANSLATE  #######################################################################
define("_CALINDEX", "오른쪽 블럭 보이기");
define("_CALTEXTEVENTS", "여러날에 걸친 행사/일정을 위한 이미지 바");
define("_CALADDARTICLEBOX", "자동 뉴스 기사 허용");
define("_CALPOSTUSERS","회원 날짜 공지 허용");
define("_CALUSETOPICS", "새-토픽 사용");
define("_CALUSETOPICS1", "예, 필수는 아닙니다");
define("_CALUSETOPICS2", "예, 필수");
define("_CALDEFAULTVIEW", "기본 보기");
define("_CALMINUTERANGE", "날짜 시간 선택시 분 간격");
define("_CALADMINEDITALL", "관리자는 행사/일정에서만 활동");
define("_CALADMINMENUSHOW", "보통 CMS 관리자메뉴 사용");
define("_CALADMINTYPE", "관리자 타입, 행사/일정에서 활동할 관리자");
define("_CALLISTCOUNT", "목록보기의 항목 수");
define("_CALLISTSHOWSTART", "제시된 목록 보기에서 시작 시간");
define("_CALLISTENDDATE", "제시된 목록 보기에서 종료 날짜");
define("_CALLISTENDTIME", "제시된 목록 보기에서 종료 시간");
define("_CALLISTENDDATE2", "시작일과 같으면 제시에서 종료 날짜");
define("_CALLISTBR", "목록보기에서 날짜 시간 사이에 줄 생성");
define("_CALDAYTIMEARRAY", "일별보기에서 시간 간격");
define("_CALALLOWABLEHTML", "날짜의 설명에서 허용된 HTML 태그");
define("_CALONLYWEN", "(제시된 종료날짜에만)"); 
define("_CALSHOWLINKS","날짜보기에서 링크처럼 날짜 보이기");
define("_CALCALENDARCONFIG", "행사/일정 설정");
define("_CALCONF1", "설정이 저장되지 않았습니다!");
define("_CALCONF2", "설정 저장됨!");
define("_CALCONF3", "파일");
define("_CALCONF4", "가 쓰기 금지되어 있어, <br />설정이 저장될 수 없습니다!");
define("_CALACTIV", "상태 활성화");

define("_CALMENUROWS","열");
define("_CALMENUROWS2","카테고리 목록에서 열의 수");

define("_CALERREVENTNOTEXIST","데이터베이스에 행사/일정가 존재하지 않습니다.");
define("_CALERRSQLERROR","데이터베이스 에러!");
define("_CALONLYDEACTIVATE","비활성화만");
define("_CALDEACTIVATED","비활성화된 행사/일정");
define("_CALNODEACTIVATED","비활성화된 행사/일정 없음");
define("_CALNAVIPREV","이전 행사/일정");
define("_CALNAVINEXT","다음 행사/일정");

/// ab 1.3
define("_CALPRINTER1","프린트");
define("_CALPRINTER2","프린터로 이 페이지 전송");
define("_CALPOSTANONYMOUS", "손님 날짜 공지 허용");
define("_CALUSERSAUTOPOST","회원의 요청 바로 승인");
define("_CALANONYAUTOPOST","손님의 요청 바로 승인");
define("_CALCATEGORIESADMIN","카테고리-설정");
define("_CALCATEGORIESLANG","언어 선택");
define("_CALADMINMENU","관리자 메뉴");
define("_CALSHOWPOPS","행사/일정 설명을 위한 팝업");
define("_CALSOURCE","원본");
define("_CALGOAL","목표");

/// ab 1.4
define('_CALHOURS','시');
define('_CALMINUTES','분');
define('_CALDAYS','일');
define('_CALMONTHS','월');
define('_CALYEARS','년');
define("_CALPLSLOGIN","먼저 로그인하세요");
define("_CALSAVESETT", "저장");

define('_CALALLWORDS','모든 단어[ALL]');
define('_CALANYWORDS','어떤 단어[OR]');
define('_CALSEARCH','검색');
define('_CALSEARCHEVENT','행사/일정 검색');
define('_CALFOR','');
define('_CALSEARCHTITLE','행사/일정에서 검색');
define('_CALCQUEUE','검색 결과');
define('_CALTOMUCH1','');
define('_CALTOMUCH2','개의 결과가 검색되었습니다. 검색 조건을 제한하세요.');
define("_CALSEARCHCOUNT", "검색 결과의 최대값");
define('_CALSEARCHTOPICS','뉴스-토픽에서 검색');
define('_CALMOREOPTIONINF','당신은 행사/일정의 보이기 설정을 다음의 파일에서 다양하게 조절하실 수 있습니다 :');
define('_CALSEFROMDATE','날짜로 검색');
define('_CALSELCATEGORY','카테고리 선택');
define('_CALINTHIS','');
define("_CALNOTOPICS", "가능한 토픽이 없습니다");
define('_CALGOTOEDIT','다시 수정');
define('_CALGOTOADMIN','관리자메뉴로 가기');
define('_CALGOTOCALENDAR','행사일정보기로 가기');
define('_CALCONFVIEW1','권한과 보안');
define('_CALCONFVIEW2','의견과 보이기');
define('_CALCONFVIEW3','뉴스기사와 토픽');
define("_CALLISTSHOWLINKS","목록보기에서 링크처럼 날짜 보이기");

?>