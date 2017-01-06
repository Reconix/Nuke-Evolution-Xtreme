<?php
/*=======================================================================
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
 =======================================================================*/

/************************************************************************
   Nuke-Evolution: Advanced Downloads Module
   ============================================
   Copyright (c) 2005 by The Nuke-Evolution Team

   Filename      : pathhelp.php
   Author        : Quake (www.Nuke-Evolution.com)
   Version       : 1.0.0
   Date          : 11.21.2005 (mm.dd.yyyy)

   Notes         : Advanced Downloads module with BBGroups Integration
                   based on NSN GR Downloads.
************************************************************************/

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
echo '<html>
    <head>
    <title>Path Help</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <style type="text/css">
        h1.myclass {font-size: 20pt; font-weight: bold; color: blue; text-align: center}
        h1.myclass2 {font-size: 11pt; font-style: normal; text-align: left}
    </style>
    </head>';

echo'<body>
        <table border="0" width="100%">
            <tr><td>
                <h1 class="myclass">
                    Path Help
                </h1>
            </td></tr>
        </table>';

echo '    <table border="0" width="100%">
            <tr><td>
                <h1 class="myclass2">
                Your path is going to start with modules/Downloads/files/ then finish with the file name<br />For example: modules/Downloads/files/test.zip is valid
                </h1>
            </td></tr>';
echo '    </table>';


echo '        </table>
    </body>
</html>';

?>