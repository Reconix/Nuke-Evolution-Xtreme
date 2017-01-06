<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

// $Id: lang-english.php,v 20.12 2004/04/15 16:58:47 EllselAn Exp $

/************************************************************************
   Nuke-Evolution: KalenderMx Port
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : lang-english.php
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
    define("_CALLOCALE","en"); # local settings ie. date format for Windows system
    }
else {
    define("_CALLOCALE","en_EN");        # local settings ie. date format for Linux/Unix system
    }
define("_CALSHORTDATEFORMAT","%m/%d/%Y");
define("_CALLONGDATEFORMAT","%A, %B %d, %Y");
define("_CALMONTHDATEFORMAT","%B %Y");
define("_CALINTERNATIONALDATES",0);  //0 = mm/dd/yyyy, 1 = dd/mm/yyyy
define("_CALTIME24HOUR",0);  //1 = 24 hour time... 0 = AM/PM time
define("_CALTIMEFORMAT","%I:%M %p"); # ? AM/PM time
define("_CALWEEKBEGINN",0);        # the First Day in the Week: 0 = Sunday, 1 = Monday

####### main texts #######
define("_CALDOTCOLORALL","All&nbsp;Events");    // desription of all Events (no colordot)
define("_CALSEND","Submit");
define("_CALSUBMITEVENT", "Submit an Event");
define("_CALSUBMITNAME", "Calendar Event Submission Form");
define("_CALNAME", "Event Calendar");
define("_CALPREVIEW", "Preview Event");
define("_CALOK", "Submit Event");
define("_CALEVENTDATETEXT","Start Date");
define("_CALSUBSENT", "Your event has been received");
define("_CALTHANKSSUB", "Thanks for your submission!");
define("_CALSUBTEXT", "We will check your submission in the next few hours, if it is interesting and relevant we will publish it soon.");
define("_CALSUBTEXTADMIN", "Your entry was published directly.");
define("_CALWEHAVESUB", "At this moment we have");
define("_CALWAITING", "submissions waiting to be published.");
define("_CALEVENTDATEPREVIEW", "Event Date");
define("_CALCHECKSTORY","Please check text, links, etc. before you submit your event!");
define("_CALYOURNAME", "Your Name");
define("_CALLOGOUT", "Logout");
define("_CALSUBTITLE", "Subject");
define("_CALTOPIC", "Topic");
define("_CALSELECTTOPIC", "Select Topic");
define("_CALARTICLETEXT", "Description");
define("_CALHTMLISFINE", "HTML is fine, but double check those URLs and HTML tags!");
define("_CALNEWSUBPREVIEW", "Event Submission Preview");
define("_CALSTORYLOOK", "Your event will look something like this:");
define("_CALBEDESCRIPTIVE", "Be descriptive, clear and simple");
define("_CALSUBPREVIEW", "You must preview your event once before you can submit");
define("_CALALLOWEDHTML", "Allowed HTML");
define("_CALSUBMISSIONSADMIN", "Event Submissions");
define("_CALNEWSUBMISSIONS", "New Event Submissions");
define("_CALNOSUBJECT", "No Subject Entered!");
define("_CALNOSUBMISSIONS", "There are no new Submissions!");
define("_CALDELETE", "Delete");
define("_CALNAMEFIELD", "Name");
define("_CALDELETESTORY", "Delete Event");
define("_CALPREVIEWSTORY", "Preview Event");
define("_CALPOSTSTORY", "Save Event");
define("_CALSUBMITADVICE1","Please use the following form to submit your event. Be sure and <i>Preview</i> your event before submitting.");
define("_CALSUBMITADVICE2","<br />You're advised that not all submission will be posted.<br />Your submission will be checked for proper grammar and maybe edited by our staff.");
define("_CALPOSTEDBY","Posted by");
define("_CALPOSTEDON","on");
define("_CALACCEPTEDBY"," and approved by");
define("_CALPREVIOUS","Prev");
define("_CALNEXT","Next");
define("_CALSTARTTIME","Start Time");
define("_CALENDTIME","Ending Time");
define("_CALALLDAYEVENT","All Day");
define("_CALTIMEIGNORED","The start and end times are ignored.");
define("_CALENDDATETEXT","End Date");
define("_CALENDDATEPREVIEW","End Date");
//define("_CALBARCOLORTEXT","Select a category for this event");
define("_CALBARCOLORTEXT","Category");
define("_CALLOGIN","Login");
define("_CALNO","No");
define("_CALYES","Yes");
define("_CALREMOVETEST","Are you sure, you want to remove this event?");
define("_CALNOTAUTHORIZED1","You are not authorized to remove, or edit that entry");
define("_CALNOTAUTHORIZED2","Contact your system administrator for any questions you may have");
define("_CALNOTAUTHORIZED3","Sorry, You are not authorized to remove or edit entries!");
define("_CALTODAY","Today");
define("_CALLISTDESCRIPTION1","The next");
define("_CALLISTDESCRIPTION2","Events");
define("_CALLISTSTART","since");
define("_CALLISTRANGE","to");
define("_CALHEADAPPOINTM","Appointments");
define("_CALDAYEVENTS","Events");
define("_CALDAYMORNING","Morning");
define("_CALDAYEVENING","Evening");
define("_CALMORE","more Events");
define("_CAL1EVENT","Event");
define("_CAL2EVENT","Events");
define("_CAL0EVENTS", "There are no events for this query");
define("_CAL0EVENTSBLOCK", "Sorry, we have no current events available.");
define("_CALNOTODAYEVENTS","No events today.");
define("_CALADDASARTICLE","article");
define("_CALADDASARTICLE2","Add an article from this event.");

####### LINKS ########
define("_CALEVENTLINK","Create an Event");
define("_CALAPPTLINK","Create an Appointment");
define("_CALTASKLINK","Add a new Task");
define("_CALDAYLINK","Day View");
define("_CALMONTHLINK","Month View");
define("_CALYEARLINK","Year View");
define("_CALJUMPTOTEXT","Jump to the following view");
define("_CALJUMPBUTTON","Jump!");
define("_CALLISTLINK","Next Events");

####### MONTHS ########
define("_CALJAN","January");
define("_CALFEB","February");
define("_CALMAR","March");
define("_CALAPR","April");
define("_CALMAY","May");
define("_CALJUN","June");
define("_CALJUL","July");
define("_CALAUG","August");
define("_CALSEP","September");
define("_CALOCT","October");
define("_CALNOV","November");
define("_CALDEC","December");

####### DAYS OF THE WEEK ########
define("_CALFIRSTDAY","Sun");
define("_CALSECONDDAY","Mon");
define("_CALTHIRDDAY","Tues");
define("_CALFOURTHDAY","Wed");
define("_CALFIFTHDAY","Thurs");
define("_CALSIXTHDAY","Fri");
define("_CALSEVENTHDAY","Sat");
define("_CALLONGFIRSTDAY","Sunday");
define("_CALLONGSECONDDAY","Monday");
define("_CALLONGTHIRDDAY","Tuesday");
define("_CALLONGFOURTHDAY","Wednesday");
define("_CALLONGFIFTHDAY","Thursday");
define("_CALLONGSIXTHDAY","Friday");
define("_CALLONGSEVENTHDAY","Saturday");

####### FIELD VALIDATION STRINGS ########
define("_CALVALIDERRORMSG","Errors were found when attempting to validate this entry!");
define("_CALVALIDFIXMSG","Please correct these errors before you preview or submit the entry.");
define("_CALVALIDSUBJECT","The 'Subject' is a required field.");
define("_CALVALIDENDDATE","The 'End Date' is not a valid date.");
define("_CALVALIDEVENTDATE","The 'Event Date' is not a valid date.");
define("_CALVALIDDATES","The 'End Date' must be after or equal to the 'Event Date'.");
define("_CALVALIDTIMES","The 'End Time' must be after the 'Start Time'.");
define("_CALVALIDTOPIC", "Please select a topic.");

#### TRANSLATE ??????????? #######################################################################
define("_CALINDEX","Show CMS right blocks, if not using current CMS Admin view");
define("_CALTEXTEVENTS","Use image bar for multiday Events");
define("_CALADDARTICLEBOX","Automatically post Events as News articles");
define("_CALPOSTUSERS","Allow Registered Users to create Events");
define("_CALUSETOPICS","Use News-Topics when creating Events");
define("_CALUSETOPICS1","Yes, but not required");
define("_CALUSETOPICS2","Yes, required");
define("_CALDEFAULTVIEW","Default Calendar view");
define("_CALMINUTERANGE","Time interval, in minutes, to use with Event date time selection");
define("_CALADMINEDITALL","Admins can modify Events submitted by other Admins");
define("_CAL_ADMIN_HEADER","Nuke-Evolution CalendarMx :: Modules Admin Panel");
define("_CAL_RETURNMAIN","Return to Main Administration");
define("_CALADMINMENUSHOW","Use the current CMS Admin view for Calendar Admin Console");
define("_CALADMINTYPE","Which Admin group is allowed to moderate Events");  
define("_CALLISTCOUNT","Max. number of Events to display in list-view");
define("_CALLISTSHOWSTART","Display Event start time in list-view");
define("_CALLISTENDDATE","Display Event end date in list-view");
define("_CALLISTENDTIME","Display Event end time in list-view");
define("_CALLISTENDDATE2","Display Event end date in list-view, if equal the Event start date");
define("_CALLISTBR","Use line breaks between date and time in list-view");
define("_CALDAYTIMEARRAY", "Time intervals in daily view");
define("_CALALLOWABLEHTML","HTML tags permitted for use in the Event Description field");
define("_CALONLYWEN","(only if Event end date is used)");
define("_CALSHOWLINKS","Display dates as links in day-view");
define("_CALCALENDARCONFIG", "Calendar Configuration");
define("_CALCONF1", "The settings could not be stored!");
define("_CALCONF2", "The settings were stored!");
define("_CALCONF3","the file");
define("_CALCONF4","is write protected, <br />settings can not be stored!");
define("_CALACTIV","Make Active");

define("_CALMENUROWS","Columns");
define("_CALMENUROWS2","Number of columns to use in Categories-List");

define("_CALERREVENTNOTEXIST","Event doesn't exist in our database.");
define("_CALERRSQLERROR","Database-Error!");
define("_CALONLYDEACTIVATE","Only deactivate");
define("_CALDEACTIVATED","Deactivated Events");
define("_CALNODEACTIVATED","No Deactivated Events");
define("_CALNAVIPREV","Previous Events");
define("_CALNAVINEXT","Next Events");

/// ab 1.3
define("_CALPRINTER1","Print Page");
define("_CALPRINTER2","Send this page to printer");
define("_CALPOSTANONYMOUS","Allow Anonymous Users to create Events");  
define("_CALUSERSAUTOPOST","Publish Events created by Registered Users immediately");
define("_CALANONYAUTOPOST","Publish Events created by Anonymous Users immediately");
define("_CALCATEGORIESADMIN","Category Configuration");
define("_CALCATEGORIESLANG","Select Language");
define("_CALADMINMENU","Administration Menu");
define("_CALSHOWPOPS","Use Java Popup for Event Description");
define("_CALSOURCE","Source");
define("_CALGOAL","Goal");

/// ab 1.4
define('_CALHOURS','hours');
define('_CALMINUTES','minutes');
define('_CALDAYS','days');
define('_CALMONTHS','months');
define('_CALYEARS','years');
define("_CALPLSLOGIN","Please Log-In first");
define("_CALSAVESETT", "Save");

define('_CALALLWORDS','All words [ALL]');
define('_CALANYWORDS','Any words[OR]');
define('_CALSEARCH','Search');
define('_CALSEARCHEVENT','Search Event');
define('_CALFOR','for');
define('_CALSEARCHTITLE','Search in Event Calendar');
define('_CALCQUEUE','Your search results');
define('_CALTOMUCH1','There is more than ');
define('_CALTOMUCH2',' search results present. Please limit the search conditions.');
define("_CALSEARCHCOUNT","Max. number of Event search results to display");  
define('_CALSEARCHTOPICS','Search in News-Topics');
define('_CALMOREOPTIONINF','You can find additional configuration options for the calendar in the file:');
define('_CALSEFROMDATE','from Date');
define('_CALSELCATEGORY','select Category');
define('_CALINTHIS','in');
define("_CALNOTOPICS", "There are no topics available");
define('_CALGOTOEDIT','edit again');
define('_CALGOTOADMIN','then goto Admin Menu');
define('_CALGOTOCALENDAR','then goto Calendar View');
define('_CALCONFVIEW1','Authorizations &amp; Security');
define('_CALCONFVIEW2','Opinions &amp; Optics');
define('_CALCONFVIEW3','News-Articles &amp; -Topics');
define("_CALLISTSHOWLINKS","Display dates as links in list-view");  

?>