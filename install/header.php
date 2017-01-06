<?php
/*=======================================================================
 Nuke-Evolution Xtreme: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Installer
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : header.php
   Author        : JeFFb68CAM (www.Evo-Mods.com)
   Version       : 1.0.0
   Date          : 11.05.2005 (mm.dd.yyyy)

   Notes         : You may NOT use this installer for your own
                   needs or script. It is written specifically
                   for Nuke-Evolution.
************************************************************************/

echo "<style type=\"text/css\">\n";
echo "<!--\n";
echo "body {\n";
echo "    margin-top:10px;\n";
echo "    margin-left:0px;\n";
echo "    margin-right:0px;\n";
echo "    margin-bottom:10px;\n";
echo "    text-align: center;\n";
echo "    background-color:#CCCCCC;\n";
echo "    height:100%;\n";
echo "}\n";
echo "#header {\n";
echo "    height:70px;\n";
echo "    background-color:#FFCC00;\n";
echo "    font-size:15px;\n";
echo "    font-weight:bold;\n";
echo " }\n";
echo "#rowHeading {\n";
echo "    height:25px;\n";
echo "    background-color:#FFCC00;\n";
echo "}\n";
echo "#logo {\n";
echo "    float:left;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:18px;\n";
echo "    font-weight:bold;\n";
echo "    color:#333333;\n";
echo "    margin-left:10px;\n";
echo "    margin-top:12px;\n";
echo "    padding:10px;\n";
echo "    text-align:center;\n";
echo "}\n";
echo "#container {\n";
echo "    margin: 0 auto 10px auto;\n";
echo "    width: 700px;\n";
echo "    text-align: left;\n";
echo "    border:1px solid black;\n";
echo "}\n";
echo "#nav {\n";
echo "    background-color:#333333;\n";
echo "    padding:3px;\n";
echo "    height:25px;\n";
echo "}\n";
echo "#nav_btn {\n";
echo "    padding:5px;\n";
echo "    text-align:center;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:11px;\n";
echo "    float:left;\n";
echo "}\n";
echo "a.nav {\n";
echo "    color:#FFCC00;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:11px;\n";
echo "    text-decoration: none;\n";
echo "    border-bottom:1px dotted grey;\n";
echo "}\n";
echo "a.nav:hover {\n";
echo "    color:#FFCC00;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:11px;\n";
echo "    border-bottom:none;\n";
echo "}\n";
echo "#body {\n";
echo "    background-color:#FFFFFF;\n";
echo "    min-height:100px;\n";
echo "    float:left;\n";
echo "    width:100%;\n";
echo "}\n";
echo "#content {\n";
echo "    padding:10px;\n";
echo "    margin: auto;\n";
echo "    text-align: left;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:11px;\n";
echo "    color:#000000;\n";
echo "    float:left;\n";
echo "    width:72%;\n";
echo "}\n";
echo "#sidebar {\n";
echo "    float:right;\n";
echo "    width:25%;\n";
echo "}\n";
echo "#menu {\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:12px;\n";
echo "    background-color:#E0E0E0;\n";
echo "    vertical-align:top;\n";
echo "    margin: 5px;\n";
echo "    padding: 8px;\n";
echo "}\n";
echo "table#menu {\n";
echo "    margin:-4px 0 0 -4px;\n";
echo "}\n";
echo "a.menu {\n";
echo "    color:#42659C;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:11px;\n";
echo "    text-decoration: none;\n";
echo "    border-bottom:1px dotted grey;\n";
echo "}\n";
echo "#footer {\n";
echo "    background-color:#000000;\n";
echo "    font-family:Verdana, Arial, Helvetica, sans-serif;\n";
echo "    font-size:11px;\n";
echo "    color:#666666;\n";
echo "    padding:8px;\n";
echo "    clear:both;\n";
echo "}\n";
echo "-->\n";
echo "</style></head>\n";
echo "<body>\n";
echo "\n";
echo "<div id=\"container\">\n";
echo "\n";
echo "<div id=\"header\">\n";
echo "\n";
echo "<div id=\"logo\">$nuke_name Installer</div>\n";
echo "\n";
echo "\n";
echo "</div>\n";
echo "\n";
echo "<div id=\"nav\">\n";
echo "<div id=\"nav_btn\"><a href=\"http://evolution-xtreme.com\" class=\"nav\">Evolution-Xtreme Home</a></div>\n";
echo "<div id=\"nav_btn\"><a href=\"http://evolution-xtreme.com\modules.php?name=Forums\" class=\"nav\">Evolution-Xtreme Support</a></div>\n";
echo "</div>\n";
echo "\n";
echo "<div id=\"body\">\n";
echo "\n";
echo "<div id=\"content\">\n";

?>